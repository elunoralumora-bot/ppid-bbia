<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;
use App\Models\Permohonan;
use App\Models\Keberatan;
use App\Models\KontenWeb;
use App\Models\Prosedur;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function getRealTimeActivity()
    {
        // Ambil aktivitas terkini dari berbagai sumber
        $activities = collect();
        
        // Permohonan terbaru
        $permohonanTerbaru = \App\Models\Permohonan::latest()->take(3)->get();
        foreach ($permohonanTerbaru as $permohonan) {
            $activities->push([
                'type' => 'permohonan',
                'icon' => 'fa-file-alt',
                'title' => 'Permohonan baru dari ' . $permohonan->nama_pemohon,
                'description' => 'ID: ' . $permohonan->id . ' - Status: ' . ucfirst($permohonan->status),
                'time' => $permohonan->created_at->diffForHumans(),
                'timestamp' => $permohonan->created_at->timestamp,
                'url' => route('admin.permohonan.show', $permohonan->id)
            ]);
        }
        
        // Berita terbaru
        $beritaTerbaru = \App\Models\Berita::latest()->take(3)->get();
        foreach ($beritaTerbaru as $berita) {
            $activities->push([
                'type' => 'berita',
                'icon' => 'fa-newspaper',
                'title' => 'Berita "' . $berita->judul . '" ' . ($berita->status == 'published' ? 'dipublikasikan' : 'dibuat'),
                'description' => 'Status: ' . ucfirst($berita->status),
                'time' => $berita->created_at->diffForHumans(),
                'timestamp' => $berita->created_at->timestamp,
                'url' => route('admin.berita.edit', $berita->id)
            ]);
        }
        
        // Keberatan terbaru
        $keberatanTerbaru = \App\Models\Keberatan::latest()->take(3)->get();
        foreach ($keberatanTerbaru as $keberatan) {
            $activities->push([
                'type' => 'keberatan',
                'icon' => 'fa-exclamation-triangle',
                'title' => 'Keberatan dari ' . $keberatan->nama_pemohon,
                'description' => 'ID: ' . $keberatan->id . ' - Status: ' . ucfirst($keberatan->status),
                'time' => $keberatan->created_at->diffForHumans(),
                'timestamp' => $keberatan->created_at->timestamp,
                'url' => route('admin.keberatan.show', $keberatan->id)
            ]);
        }
        
        // Update status permohonan
        $permohonanUpdate = \App\Models\Permohonan::whereNotNull('tanggal_proses')
            ->orWhereNotNull('tanggal_selesai')
            ->latest('updated_at')
            ->take(2)
            ->get();
            
        foreach ($permohonanUpdate as $permohonan) {
            $activities->push([
                'type' => 'status_update',
                'icon' => 'fa-sync',
                'title' => 'Status permohonan ' . $permohonan->nama_pemohon . ' diperbarui',
                'description' => 'Status: ' . ucfirst($permohonan->status),
                'time' => $permohonan->updated_at->diffForHumans(),
                'timestamp' => $permohonan->updated_at->timestamp,
                'url' => route('admin.permohonan.show', $permohonan->id)
            ]);
        }
        
        // Update status keberatan
        $keberatanUpdate = \App\Models\Keberatan::whereNotNull('tanggal_proses')
            ->orWhereNotNull('tanggal_selesai')
            ->latest('updated_at')
            ->take(2)
            ->get();
            
        foreach ($keberatanUpdate as $keberatan) {
            $activities->push([
                'type' => 'status_update',
                'icon' => 'fa-sync',
                'title' => 'Status keberatan ' . $keberatan->nama_pemohon . ' diperbarui',
                'description' => 'Status: ' . ucfirst($keberatan->status),
                'time' => $keberatan->updated_at->diffForHumans(),
                'timestamp' => $keberatan->updated_at->timestamp,
                'url' => route('admin.keberatan.show', $keberatan->id)
            ]);
        }
        
        // Sort by timestamp
        $activities = $activities->sortByDesc('timestamp')->take(10)->values();
        
        return response()->json([
            'activities' => $activities,
            'stats' => [
                'total_berita' => \App\Models\Berita::count(),
                'berita_published' => \App\Models\Berita::where('status', 'published')->count(),
                'berita_draft' => \App\Models\Berita::where('status', 'draft')->count(),
                'total_permohonan' => \App\Models\Permohonan::count(),
                'permohonan_baru' => \App\Models\Permohonan::where('status', 'baru')->count(),
                'permohonan_diproses' => \App\Models\Permohonan::where('status', 'diproses')->count(),
                'total_keberatan' => \App\Models\Keberatan::count(),
                'keberatan_baru' => \App\Models\Keberatan::where('status', 'baru')->count(),
                'keberatan_diproses' => \App\Models\Keberatan::where('status', 'diproses')->count(),
                'total_foto' => \App\Models\GaleriFoto::count(),
                'foto_aktif' => \App\Models\GaleriFoto::where('is_active', true)->count(),
                'foto_tidak_aktif' => \App\Models\GaleriFoto::where('is_active', false)->count()
            ]
        ]);
    }

    public function berita()
    {
        return view('admin.berita');
    }

    public function permohonan()
    {
        return view('admin.permohonan');
    }

    public function keberatan()
    {
        return view('admin.keberatan');
    }

    public function users()
    {
        $users = User::paginate(10);
        return view('admin.users', compact('users'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users')->with('success', 'Admin berhasil ditambahkan');
    }

    public function destroyUser($id)
    {
        $admin = Admin::findOrFail($id);
        
        // Cegah hapus admin utama (ID: 1)
        if ($admin->id == 1) {
            return redirect()->route('admin.users')->with('error', 'Admin utama tidak dapat dihapus');
        }

        // Cegah hapus jika hanya tersisa 1 admin
        if (Admin::count() <= 1) {
            return redirect()->route('admin.users')->with('error', 'Tidak dapat menghapus admin terakhir');
        }

        $admin->delete();
        return redirect()->route('admin.users')->with('success', 'Admin berhasil dihapus');
    }

    public function editAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit-admin', compact('admin'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,'.$id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        
        $admin->save();

        return redirect()->route('admin.users')->with('success', 'Admin berhasil diperbarui');
    }

    // Management for regular users
    public function manageUsers()
    {
        $users = User::paginate(10);
        return view('admin.manage-users', compact('users'));
    }

    public function createUser()
    {
        return view('admin.create-user');
    }

    public function storeRegularUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.manage-users')->with('success', 'User berhasil ditambahkan');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit-user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        
        $user->save();

        return redirect()->route('admin.manage-users')->with('success', 'User berhasil diperbarui');
    }

    public function destroyRegularUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.manage-users')->with('success', 'User berhasil dihapus');
    }

    // Management for Permohonan
    public function managePermohonan()
    {
        $permohonan = Permohonan::latest()->paginate(10);
        return view('admin.permohonan.manage-permohonan', compact('permohonan'));
    }

    public function showPermohonan($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        return view('admin.permohonan.show-permohonan', compact('permohonan'));
    }

    public function updatePermohonanStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,proses,selesai,ditolak',
            'catatan' => 'nullable|string'
        ]);

        $permohonan = Permohonan::findOrFail($id);
        $permohonan->status = $request->status;
        $permohonan->catatan = $request->catatan;
        
        if ($request->status == 'proses') {
            $permohonan->tanggal_proses = now();
        } elseif ($request->status == 'selesai' || $request->status == 'ditolak') {
            $permohonan->tanggal_selesai = now();
        }
        
        $permohonan->save();

        return redirect()->route('admin.manage-permohonan')->with('success', 'Status permohonan berhasil diperbarui');
    }

    public function destroyPermohonan($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->delete();
        return redirect()->route('admin.manage-permohonan')->with('success', 'Permohonan berhasil dihapus');
    }

    // Management for Keberatan
    public function manageKeberatan()
    {
        $keberatan = Keberatan::latest()->paginate(10);
        return view('admin.keberatan.manage-keberatan', compact('keberatan'));
    }

    public function showKeberatan($id)
    {
        $keberatan = Keberatan::findOrFail($id);
        return view('admin.keberatan.show-keberatan', compact('keberatan'));
    }

    public function updateKeberatanStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,proses,selesai,ditolak',
            'catatan' => 'nullable|string'
        ]);

        $keberatan = Keberatan::findOrFail($id);
        $keberatan->status = $request->status;
        $keberatan->catatan = $request->catatan;
        
        if ($request->status == 'proses') {
            $keberatan->tanggal_proses = now();
        } elseif ($request->status == 'selesai' || $request->status == 'ditolak') {
            $keberatan->tanggal_selesai = now();
        }
        
        $keberatan->save();

        return redirect()->route('admin.manage-keberatan')->with('success', 'Status keberatan berhasil diperbarui');
    }

    public function destroyKeberatan($id)
    {
        $keberatan = Keberatan::findOrFail($id);
        $keberatan->delete();
        return redirect()->route('admin.manage-keberatan')->with('success', 'Keberatan berhasil dihapus');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function reports()
    {
        return view('admin.reports');
    }

    public function exportPDF()
    {
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $currentYear = date('Y');
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthName = $months[$i-1];
            $permohonanBaru = \App\Models\Permohonan::whereMonth('tanggal_permohonan', $i)->whereYear('tanggal_permohonan', $currentYear)->count();
            $diproses = \App\Models\Permohonan::where('status', 'diproses')->whereMonth('tanggal_proses', $i)->whereYear('tanggal_proses', $currentYear)->count();
            $selesai = \App\Models\Permohonan::where('status', 'selesai')->whereMonth('tanggal_selesai', $i)->whereYear('tanggal_selesai', $currentYear)->count();
            $ditolak = \App\Models\Permohonan::where('status', 'ditolak')->whereMonth('tanggal_selesai', $i)->whereYear('tanggal_selesai', $currentYear)->count();
            $keberatan = \App\Models\Keberatan::whereMonth('tanggal_keberatan', $i)->whereYear('tanggal_keberatan', $currentYear)->count();
            $total = $permohonanBaru;

            $data[] = [
                'bulan' => $monthName,
                'permohonan_baru' => $permohonanBaru,
                'diproses' => $diproses,
                'selesai' => $selesai,
                'ditolak' => $ditolak,
                'keberatan' => $keberatan,
                'total' => $total
            ];
        }

        $totalRow = [
            'bulan' => 'TOTAL',
            'permohonan_baru' => \App\Models\Permohonan::whereYear('tanggal_permohonan', $currentYear)->count(),
            'diproses' => \App\Models\Permohonan::where('status', 'diproses')->whereYear('tanggal_proses', $currentYear)->count(),
            'selesai' => \App\Models\Permohonan::where('status', 'selesai')->whereYear('tanggal_selesai', $currentYear)->count(),
            'ditolak' => \App\Models\Permohonan::where('status', 'ditolak')->whereYear('tanggal_selesai', $currentYear)->count(),
            'keberatan' => \App\Models\Keberatan::whereYear('tanggal_keberatan', $currentYear)->count(),
            'total' => \App\Models\Permohonan::whereYear('tanggal_permohonan', $currentYear)->count()
        ];

        return view('admin.export-pdf', compact('data', 'totalRow', 'currentYear'));
    }

    public function exportExcel()
    {
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $currentYear = date('Y');

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="laporan_ppid_' . $currentYear . '.csv"',
        ];

        $callback = function() use ($months, $currentYear) {
            $file = fopen('php://output', 'w');
            
            // Header CSV
            fputcsv($file, ['Bulan', 'Permohonan Baru', 'Sedang Diproses', 'Selesai', 'Ditolak', 'Keberatan', 'Total']);

            // Data per bulan
            for ($i = 1; $i <= 12; $i++) {
                $monthName = $months[$i-1];
                $permohonanBaru = \App\Models\Permohonan::whereMonth('tanggal_permohonan', $i)->whereYear('tanggal_permohonan', $currentYear)->count();
                $diproses = \App\Models\Permohonan::where('status', 'diproses')->whereMonth('tanggal_proses', $i)->whereYear('tanggal_proses', $currentYear)->count();
                $selesai = \App\Models\Permohonan::where('status', 'selesai')->whereMonth('tanggal_selesai', $i)->whereYear('tanggal_selesai', $currentYear)->count();
                $ditolak = \App\Models\Permohonan::where('status', 'ditolak')->whereMonth('tanggal_selesai', $i)->whereYear('tanggal_selesai', $currentYear)->count();
                $keberatan = \App\Models\Keberatan::whereMonth('tanggal_keberatan', $i)->whereYear('tanggal_keberatan', $currentYear)->count();
                $total = $permohonanBaru;

                fputcsv($file, [$monthName, $permohonanBaru, $diproses, $selesai, $ditolak, $keberatan, $total]);
            }

            // Total row
            fputcsv($file, [
                'TOTAL',
                \App\Models\Permohonan::whereYear('tanggal_permohonan', $currentYear)->count(),
                \App\Models\Permohonan::where('status', 'diproses')->whereYear('tanggal_proses', $currentYear)->count(),
                \App\Models\Permohonan::where('status', 'selesai')->whereYear('tanggal_selesai', $currentYear)->count(),
                \App\Models\Permohonan::where('status', 'ditolak')->whereYear('tanggal_selesai', $currentYear)->count(),
                \App\Models\Keberatan::whereYear('tanggal_keberatan', $currentYear)->count(),
                \App\Models\Permohonan::whereYear('tanggal_permohonan', $currentYear)->count()
            ]);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function galeri()
    {
        return view('admin.profil.galeri');
    }

    // Informasi Publik Methods
    public function informasiBerkala()
    {
        $informasiBerkala = \App\Models\InformasiPublik::where('kategori', 'Informasi Berkala')
            ->orWhere('kategori', 'Laporan Keuangan')
            ->orWhere('kategori', 'Program Kerja')
            ->orWhere('kategori', 'Lainnya')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('admin.informasi-publik.informasi-berkala', compact('informasiBerkala'));
    }

    public function createInformasiBerkala()
    {
        return view('admin.informasi-publik.informasi-berkala-create');
    }

    public function storeInformasiBerkala(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'isi' => 'nullable|string',
            'kategori' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'tanggal_publikasi' => 'nullable|date',
            'status' => 'required|in:draft,published,archived',
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->isi ?? '',
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status' => $request->status,
            'urutan' => 0,
            'is_active' => $request->status == 'published' ? 1 : 0,
        ];

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/informasi'), $filename);
            $data['file_path'] = 'files/informasi/' . $filename;
        }

        // Create the informasi publik record
        $informasi = \App\Models\InformasiPublik::create($data);

        return redirect()->route('admin.informasi-berkala')->with('success', 'Informasi berkala berhasil ditambahkan');
    }

    public function editInformasiBerkala($id)
    {
        $informasi = \App\Models\InformasiPublik::findOrFail($id);
        return view('admin.informasi-publik.informasi-berkala-edit', compact('informasi'));
    }

    public function updateInformasiBerkala(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'isi' => 'nullable|string',
            'kategori' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'tanggal_publikasi' => 'nullable|date',
            'status' => 'required|in:draft,published,archived',
        ]);

        $informasi = \App\Models\InformasiPublik::findOrFail($id);
        
        $data = [
            'judul' => $request->judul,
            'konten' => $request->isi ?? '',
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status' => $request->status,
            'is_active' => $request->status == 'published' ? 1 : 0,
        ];

        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file
            if ($informasi->file_path && file_exists(public_path($informasi->file_path))) {
                unlink(public_path($informasi->file_path));
            }
            
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/informasi'), $filename);
            $data['file_path'] = 'files/informasi/' . $filename;
        }

        $informasi->update($data);
        return redirect()->route('admin.informasi-berkala')->with('success', 'Informasi berkala berhasil diperbarui');
    }

    public function destroyInformasiBerkala($id)
    {
        $informasi = \App\Models\InformasiPublik::findOrFail($id);
        
        // Delete file if exists
        if ($informasi->file_path && file_exists(public_path($informasi->file_path))) {
            unlink(public_path($informasi->file_path));
        }
        
        $informasi->delete();
        return redirect()->route('admin.informasi-berkala')->with('success', 'Informasi berkala berhasil dihapus');
    }

    public function informasiSertaMerta()
    {
        $informasiSertaMerta = \App\Models\InformasiPublik::where('kategori', 'Informasi Serta Merta')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('admin.informasi-publik.informasi-serta-merta', compact('informasiSertaMerta'));
    }

    public function createInformasiSertaMerta()
    {
        return view('admin.informasi-publik.informasi-serta-merta-create');
    }

    public function storeInformasiSertaMerta(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'isi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'tanggal_publikasi' => 'nullable|date',
            'status' => 'required|in:draft,published,archived',
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->isi ?? '',
            'kategori' => 'Informasi Serta Merta',
            'deskripsi' => $request->deskripsi,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status' => $request->status,
            'urutan' => 0,
            'is_active' => $request->status == 'published' ? 1 : 0,
        ];

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/informasi'), $filename);
            $data['file_path'] = 'files/informasi/' . $filename;
        }

        // Create the informasi publik record
        $informasi = \App\Models\InformasiPublik::create($data);

        return redirect()->route('admin.informasi-serta-merta')->with('success', 'Informasi serta merta berhasil ditambahkan');
    }

    public function editInformasiSertaMerta($id)
    {
        $informasi = \App\Models\InformasiPublik::findOrFail($id);
        return view('admin.informasi-publik.informasi-serta-merta-edit', compact('informasi'));
    }

    public function updateInformasiSertaMerta(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'isi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'tanggal_publikasi' => 'nullable|date',
            'status' => 'required|in:draft,published,archived',
        ]);

        $informasi = \App\Models\InformasiPublik::findOrFail($id);
        
        $data = [
            'judul' => $request->judul,
            'konten' => $request->isi ?? '',
            'kategori' => 'Informasi Serta Merta',
            'deskripsi' => $request->deskripsi,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status' => $request->status,
            'is_active' => $request->status == 'published' ? 1 : 0,
        ];

        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file
            if ($informasi->file_path && file_exists(public_path($informasi->file_path))) {
                unlink(public_path($informasi->file_path));
            }
            
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/informasi'), $filename);
            $data['file_path'] = 'files/informasi/' . $filename;
        }

        $informasi->update($data);
        return redirect()->route('admin.informasi-serta-merta')->with('success', 'Informasi serta merta berhasil diperbarui');
    }

    public function destroyInformasiSertaMerta($id)
    {
        // Implementasi delete logic
        return redirect()->route('admin.informasi-serta-merta')->with('success', 'Informasi serta merta berhasil dihapus');
    }

    public function informasiSetiapSaat()
    {
        $informasiSetiapSaat = \App\Models\InformasiPublik::where('kategori', 'Informasi Setiap Saat')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('admin.informasi-publik.informasi-setiap-saat', compact('informasiSetiapSaat'));
    }

    public function createInformasiSetiapSaat()
    {
        return view('admin.informasi-publik.informasi-setiap-saat-create');
    }

    public function storeInformasiSetiapSaat(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'isi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'tanggal_publikasi' => 'nullable|date',
            'status' => 'required|in:draft,published,archived',
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->isi ?? '',
            'kategori' => 'Informasi Setiap Saat',
            'deskripsi' => $request->deskripsi,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status' => $request->status,
            'urutan' => 0,
            'is_active' => $request->status == 'published' ? 1 : 0,
        ];

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/informasi'), $filename);
            $data['file_path'] = 'files/informasi/' . $filename;
        }

        // Create the informasi publik record
        $informasi = \App\Models\InformasiPublik::create($data);

        return redirect()->route('admin.informasi-setiap-saat')->with('success', 'Informasi setiap saat berhasil ditambahkan');
    }

    public function editInformasiSetiapSaat($id)
    {
        $informasi = \App\Models\InformasiPublik::findOrFail($id);
        return view('admin.informasi-publik.informasi-setiap-saat-edit', compact('informasi'));
    }

    public function updateInformasiSetiapSaat(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'isi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'tanggal_publikasi' => 'nullable|date',
            'status' => 'required|in:draft,published,archived',
        ]);

        $informasi = \App\Models\InformasiPublik::findOrFail($id);
        
        $data = [
            'judul' => $request->judul,
            'konten' => $request->isi ?? '',
            'kategori' => 'Informasi Setiap Saat',
            'deskripsi' => $request->deskripsi,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status' => $request->status,
            'is_active' => $request->status == 'published' ? 1 : 0,
        ];

        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file
            if ($informasi->file_path && file_exists(public_path($informasi->file_path))) {
                unlink(public_path($informasi->file_path));
            }
            
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/informasi'), $filename);
            $data['file_path'] = 'files/informasi/' . $filename;
        }

        $informasi->update($data);
        return redirect()->route('admin.informasi-setiap-saat')->with('success', 'Informasi setiap saat berhasil diperbarui');
    }

    public function destroyInformasiSetiapSaat($id)
    {
        // Implementasi delete logic
        return redirect()->route('admin.informasi-setiap-saat')->with('success', 'Informasi setiap saat berhasil dihapus');
    }

    public function daftarInformasiPublikOnline()
    {
        return view('admin.informasi-publik.daftar-informasi-publik-online');
    }

    public function createDaftarInformasiPublikOnline()
    {
        return view('admin.informasi-publik.daftar-informasi-publik-online-create');
    }

    public function storeDaftarInformasiPublikOnline(Request $request)
    {
        // Implementasi store logic
        return redirect()->route('admin.daftar-informasi-publik-online')->with('success', 'Daftar informasi publik online berhasil ditambahkan');
    }

    public function editDaftarInformasiPublikOnline($id)
    {
        return view('admin.informasi-publik.daftar-informasi-publik-online-edit', compact('id'));
    }

    public function updateDaftarInformasiPublikOnline(Request $request, $id)
    {
        // Implementasi update logic
        return redirect()->route('admin.daftar-informasi-publik-online')->with('success', 'Daftar informasi publik online berhasil diperbarui');
    }

    public function destroyDaftarInformasiPublikOnline($id)
    {
        // Implementasi delete logic
        return redirect()->route('admin.daftar-informasi-publik-online')->with('success', 'Daftar informasi publik online berhasil dihapus');
    }

    // Standar Layanan Methods
    public function regulasi()
    {
        return view('admin.standar-layanan.regulasi');
    }

    public function createRegulasi()
    {
        return view('admin.standar-layanan.regulasi-create');
    }

    public function storeRegulasi(Request $request)
    {
        // Implementasi store logic
        return redirect()->route('admin.regulasi')->with('success', 'Regulasi berhasil ditambahkan');
    }

    public function editRegulasi($id)
    {
        return view('admin.standar-layanan.regulasi-edit', compact('id'));
    }

    public function updateRegulasi(Request $request, $id)
    {
        // Implementasi update logic
        return redirect()->route('admin.regulasi')->with('success', 'Regulasi berhasil diperbarui');
    }

    public function destroyRegulasi($id)
    {
        // Implementasi delete logic
        return redirect()->route('admin.regulasi')->with('success', 'Regulasi berhasil dihapus');
    }

    public function prosedurPermohonanInformasi()
    {
        $prosedurPermohonan = Prosedur::byKategori('Prosedur Permohonan Informasi')->aktif()->ordered()->get();
        return view('admin.standar-layanan.prosedur-permohonan-informasi', compact('prosedurPermohonan'));
    }

    public function createProsedurPermohonanInformasi()
    {
        return view('admin.standar-layanan.prosedur-permohonan-informasi-create');
    }

    public function storeProsedurPermohonanInformasi(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $maxUrutan = Prosedur::byKategori('Prosedur Permohonan Informasi')->max('urutan') ?? 0;

        $prosedur = Prosedur::create([
            'kategori' => 'Prosedur Permohonan Informasi',
            'judul' => $request->judul,
            'konten' => $request->konten,
            'urutan' => $maxUrutan + 1,
            'is_active' => true,
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images'), $gambarName);
            $prosedur->gambar = $gambarName;
            $prosedur->save();
        }

        return redirect()->route('admin.prosedur-permohonan-informasi')->with('success', 'Prosedur permohonan informasi berhasil ditambahkan');
    }

    public function editProsedurPermohonanInformasi($id)
    {
        $prosedur = Prosedur::findOrFail($id);
        return view('admin.standar-layanan.prosedur-permohonan-informasi-edit', compact('prosedur'));
    }

    public function updateProsedurPermohonanInformasi(Request $request)
    {
        try {
            $prosedurData = $request->input('prosedur', []);
            
            // Simpan ke file atau database sesuai kebutuhan
            // Untuk sekarang, kita simpan ke file JSON sebagai contoh
            $dataFile = public_path('data/prosedur_permohonan.json');
            $dataDir = dirname($dataFile);
            
            if (!is_dir($dataDir)) {
                mkdir($dataDir, 0755, true);
            }
            
            file_put_contents($dataFile, json_encode($prosedurData, JSON_PRETTY_PRINT));
            
            return redirect()->route('admin.prosedur-permohonan-informasi')->with('success', 'Prosedur permohonan informasi berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->route('admin.prosedur-permohonan-informasi')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroyProsedurPermohonanInformasi($id)
    {
        $prosedur = Prosedur::findOrFail($id);
        
        // Hapus gambar jika ada
        if ($prosedur->gambar && file_exists(public_path('images/' . $prosedur->gambar))) {
            unlink(public_path('images/' . $prosedur->gambar));
        }
        
        $prosedur->delete();
        
        return redirect()->route('admin.prosedur-permohonan-informasi')->with('success', 'Prosedur permohonan informasi berhasil dihapus');
    }

    public function prosedurPengajuanKeberatan()
    {
        $prosedurKeberatan = Prosedur::byKategori('Prosedur Pengajuan Keberatan')->aktif()->ordered()->get();
        return view('admin.standar-layanan.prosedur-pengajuan-keberatan', compact('prosedurKeberatan'));
    }

    public function createProsedurPengajuanKeberatan()
    {
        return view('admin.standar-layanan.prosedur-pengajuan-keberatan-create');
    }

    public function storeProsedurPengajuanKeberatan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $maxUrutan = Prosedur::byKategori('Prosedur Pengajuan Keberatan')->max('urutan') ?? 0;

        $prosedur = Prosedur::create([
            'kategori' => 'Prosedur Pengajuan Keberatan',
            'judul' => $request->judul,
            'konten' => $request->konten,
            'urutan' => $maxUrutan + 1,
            'is_active' => true,
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images'), $gambarName);
            $prosedur->gambar = $gambarName;
            $prosedur->save();
        }

        return redirect()->route('admin.prosedur-pengajuan-keberatan')->with('success', 'Prosedur pengajuan keberatan berhasil ditambahkan');
    }

    public function editProsedurPengajuanKeberatan($id)
    {
        $prosedur = Prosedur::findOrFail($id);
        return view('admin.standar-layanan.prosedur-pengajuan-keberatan-edit', compact('prosedur'));
    }

    public function updateProsedurPengajuanKeberatan(Request $request)
    {
        try {
            $prosedurData = $request->input('prosedur', []);
            
            // Simpan ke file JSON
            $dataFile = public_path('data/prosedur_keberatan.json');
            $dataDir = dirname($dataFile);
            
            if (!is_dir($dataDir)) {
                mkdir($dataDir, 0755, true);
            }
            
            file_put_contents($dataFile, json_encode($prosedurData, JSON_PRETTY_PRINT));
            
            return redirect()->route('admin.prosedur-pengajuan-keberatan')->with('success', 'Prosedur pengajuan keberatan berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->route('admin.prosedur-pengajuan-keberatan')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroyProsedurPengajuanKeberatan($id)
    {
        $prosedur = Prosedur::findOrFail($id);
        
        // Hapus gambar jika ada
        if ($prosedur->gambar && file_exists(public_path('images/' . $prosedur->gambar))) {
            unlink(public_path('images/' . $prosedur->gambar));
        }
        
        $prosedur->delete();
        
        return redirect()->route('admin.prosedur-pengajuan-keberatan')->with('success', 'Prosedur pengajuan keberatan berhasil dihapus');
    }

    public function sopPpid()
    {
        return view('admin.standar-layanan.sop-ppid');
    }

    public function createSopPpid()
    {
        return view('admin.standar-layanan.sop-ppid-create');
    }

    public function storeSopPpid(Request $request)
    {
        // Implementasi store logic
        return redirect()->route('admin.sop-ppid')->with('success', 'SOP PPID berhasil ditambahkan');
    }

    public function editSopPpid($id)
    {
        return view('admin.standar-layanan.sop-ppid-edit', compact('id'));
    }

    public function updateSopPpid(Request $request, $id)
    {
        // Implementasi update logic
        return redirect()->route('admin.sop-ppid')->with('success', 'SOP PPID berhasil diperbarui');
    }

    public function destroySopPpid($id)
    {
        // Implementasi delete logic
        return redirect()->route('admin.sop-ppid')->with('success', 'SOP PPID berhasil dihapus');
    }

    public function kanalLayananInformasi()
    {
        return view('admin.standar-layanan.kanal-layanan-informasi');
    }

    public function createKanalLayananInformasi()
    {
        return view('admin.standar-layanan.kanal-layanan-informasi-create');
    }

    public function storeKanalLayananInformasi(Request $request)
    {
        // Implementasi store logic
        return redirect()->route('admin.kanal-layanan-informasi')->with('success', 'Kanal layanan informasi berhasil ditambahkan');
    }

    public function editKanalLayananInformasi($id)
    {
        return view('admin.standar-layanan.kanal-layanan-informasi-edit', compact('id'));
    }

    public function updateKanalLayananInformasi(Request $request, $id)
    {
        // Implementasi update logic
        return redirect()->route('admin.kanal-layanan-informasi')->with('success', 'Kanal layanan informasi berhasil diperbarui');
    }

    public function destroyKanalLayananInformasi($id)
    {
        // Implementasi delete logic
        return redirect()->route('admin.kanal-layanan-informasi')->with('success', 'Kanal layanan informasi berhasil dihapus');
    }

    public function waktuBiayaLayanan()
    {
        return view('admin.standar-layanan.waktu-biaya-layanan');
    }

    public function createWaktuBiayaLayanan()
    {
        return view('admin.standar-layanan.waktu-biaya-layanan-create');
    }

    public function storeWaktuBiayaLayanan(Request $request)
    {
        // Implementasi store logic
        return redirect()->route('admin.waktu-biaya-layanan')->with('success', 'Waktu & biaya layanan berhasil ditambahkan');
    }

    public function editWaktuBiayaLayanan($id)
    {
        return view('admin.standar-layanan.waktu-biaya-layanan-edit', compact('id'));
    }

    public function updateWaktuBiayaLayanan(Request $request, $id)
    {
        // Implementasi update logic
        return redirect()->route('admin.waktu-biaya-layanan')->with('success', 'Waktu & biaya layanan berhasil diperbarui');
    }

    public function destroyWaktuBiayaLayanan($id)
    {
        // Implementasi delete logic
        return redirect()->route('admin.waktu-biaya-layanan')->with('success', 'Waktu & biaya layanan berhasil dihapus');
    }

    public function maklumatInformasiPublik()
    {
        $konten = \App\Models\KontenWeb::standarLayanan()->where('slug', 'maklumat-informasi-publik')->first();
        return view('admin.standar-layanan.maklumat-informasi-publik', compact('konten'));
    }

    public function updateMaklumatImage(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $konten = \App\Models\KontenWeb::standarLayanan()->where('slug', 'maklumat-informasi-publik')->first();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = 'maklumat-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);

            // Hapus gambar lama jika ada
            if ($konten && $konten->gambar && file_exists(public_path('images/' . $konten->gambar))) {
                unlink(public_path('images/' . $konten->gambar));
            }

            if ($konten) {
                $konten->gambar = $filename;
                $konten->save();
            } else {
                \App\Models\KontenWeb::create([
                    'jenis_konten' => 'standar_layanan',
                    'slug' => 'maklumat-informasi-publik',
                    'judul' => 'Maklumat Informasi Publik',
                    'konten' => '',
                    'gambar' => $filename,
                    'is_active' => true,
                ]);
            }
        }

        return redirect()->route('admin.maklumat-informasi-publik')->with('success', 'Gambar maklumat berhasil diperbarui');
    }

    // Laporan Methods
    public function laporanTahunanPpid()
    {
        $laporanTahunan = KontenWeb::laporan()
            ->where('slug', 'like', 'laporan-tahunan-ppid%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('admin.laporan.laporan-tahunan-ppid', compact('laporanTahunan'));
    }

    public function createLaporanTahunanPpid()
    {
        return view('admin.laporan.laporan-tahunan-ppid-create');
    }

    public function storeLaporanTahunanPpid(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
            'file' => 'required|file|mimes:pdf|max:20480',
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = 'laporan-tahunan-' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('laporan/tahunan', $fileName, 'public');
        }

        // Create slug
        $slug = 'laporan-tahunan-ppid-' . time();

        // Prepare meta data
        $metaData = [
            'tahun' => $request->tahun,
            'deskripsi' => $request->deskripsi,
            'ringkasan' => $request->ringkasan,
            'file_path' => $filePath,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status' => $request->status ?? 'draft',
        ];

        // Create content
        $konten = "<h2>" . $request->judul . "</h2>";
        $konten .= "<p><strong>Tahun:</strong> " . $request->tahun . "</p>";
        if ($request->deskripsi) {
            $konten .= "<p><strong>Deskripsi:</strong> " . $request->deskripsi . "</p>";
        }
        if ($request->ringkasan) {
            $konten .= "<p><strong>Ringkasan:</strong> " . $request->ringkasan . "</p>";
        }

        KontenWeb::create([
            'jenis_konten' => 'laporan',
            'slug' => $slug,
            'judul' => $request->judul,
            'konten' => $konten,
            'meta_data' => $metaData,
            'is_active' => true,
        ]);

        return redirect()->route('admin.laporan-tahunan-ppid')->with('success', 'Laporan tahunan PPID berhasil ditambahkan');
    }

    public function editLaporanTahunanPpid($id)
    {
        $laporan = KontenWeb::findOrFail($id);
        return view('admin.laporan.laporan-tahunan-ppid-edit', compact('id', 'laporan'));
    }

    public function updateLaporanTahunanPpid(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        $laporan = KontenWeb::findOrFail($id);

        // Handle file upload
        $filePath = $laporan->meta_data['file_path'] ?? null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = 'laporan-tahunan-' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('laporan/tahunan', $fileName, 'public');
        }

        // Prepare meta data
        $metaData = [
            'tahun' => $request->tahun,
            'deskripsi' => $request->deskripsi,
            'ringkasan' => $request->ringkasan,
            'file_path' => $filePath,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status' => $request->status ?? 'draft',
        ];

        // Update content
        $konten = "<h2>" . $request->judul . "</h2>";
        $konten .= "<p><strong>Tahun:</strong> " . $request->tahun . "</p>";
        if ($request->deskripsi) {
            $konten .= "<p><strong>Deskripsi:</strong> " . $request->deskripsi . "</p>";
        }
        if ($request->ringkasan) {
            $konten .= "<p><strong>Ringkasan:</strong> " . $request->ringkasan . "</p>";
        }

        $laporan->update([
            'judul' => $request->judul,
            'konten' => $konten,
            'meta_data' => $metaData,
        ]);

        return redirect()->route('admin.laporan-tahunan-ppid')->with('success', 'Laporan tahunan PPID berhasil diperbarui');
    }

    public function destroyLaporanTahunanPpid($id)
    {
        $laporan = KontenWeb::findOrFail($id);
        $laporan->delete();
        return redirect()->route('admin.laporan-tahunan-ppid')->with('success', 'Laporan tahunan PPID berhasil dihapus');
    }

    public function laporanSurveyKepuasan()
    {
        $laporanSurvey = KontenWeb::laporan()
            ->where('slug', 'like', 'survey-kepuasan-masyarakat%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('admin.laporan.laporan-survey-kepuasan', compact('laporanSurvey'));
    }

    public function createLaporanSurveyKepuasan()
    {
        return view('admin.laporan.laporan-survey-kepuasan-create');
    }

    public function storeLaporanSurveyKepuasan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
            'file' => 'required|file|mimes:pdf|max:20480',
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = 'survey-kepuasan-' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('laporan/survey', $fileName, 'public');
        }

        // Create slug
        $slug = 'survey-kepuasan-masyarakat-' . time();

        // Prepare meta data
        $metaData = [
            'tahun' => $request->tahun,
            'periode' => $request->periode,
            'deskripsi' => $request->deskripsi,
            'ringkasan' => $request->ringkasan,
            'kesimpulan' => $request->kesimpulan,
            'responden' => $request->responden,
            'nilai_kepuasan' => $request->nilai_kepuasan,
            'file_path' => $filePath,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status' => $request->status ?? 'draft',
        ];

        // Create content
        $konten = "<h2>" . $request->judul . "</h2>";
        $konten .= "<p><strong>Tahun:</strong> " . $request->tahun . "</p>";
        if ($request->periode) {
            $konten .= "<p><strong>Periode:</strong> " . $request->periode . "</p>";
        }
        if ($request->deskripsi) {
            $konten .= "<p><strong>Deskripsi:</strong> " . $request->deskripsi . "</p>";
        }
        if ($request->ringkasan) {
            $konten .= "<p><strong>Ringkasan Hasil:</strong> " . $request->ringkasan . "</p>";
        }
        if ($request->kesimpulan) {
            $konten .= "<p><strong>Kesimpulan:</strong> " . $request->kesimpulan . "</p>";
        }
        if ($request->responden) {
            $konten .= "<p><strong>Jumlah Responden:</strong> " . $request->responden . "</p>";
        }
        if ($request->nilai_kepuasan) {
            $konten .= "<p><strong>Nilai Kepuasan:</strong> " . $request->nilai_kepuasan . "%</p>";
        }

        KontenWeb::create([
            'jenis_konten' => 'laporan',
            'slug' => $slug,
            'judul' => $request->judul,
            'konten' => $konten,
            'meta_data' => $metaData,
            'is_active' => true,
        ]);

        return redirect()->route('admin.laporan-survey-kepuasan')->with('success', 'Laporan survey kepuasan berhasil ditambahkan');
    }

    public function editLaporanSurveyKepuasan($id)
    {
        $laporan = KontenWeb::findOrFail($id);
        return view('admin.laporan.laporan-survey-kepuasan-edit', compact('id', 'laporan'));
    }

    public function updateLaporanSurveyKepuasan(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        $laporan = KontenWeb::findOrFail($id);

        // Handle file upload
        $filePath = $laporan->meta_data['file_path'] ?? null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = 'survey-kepuasan-' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('laporan/survey', $fileName, 'public');
        }

        // Prepare meta data
        $metaData = [
            'tahun' => $request->tahun,
            'periode' => $request->periode,
            'deskripsi' => $request->deskripsi,
            'ringkasan' => $request->ringkasan,
            'kesimpulan' => $request->kesimpulan,
            'responden' => $request->responden,
            'nilai_kepuasan' => $request->nilai_kepuasan,
            'file_path' => $filePath,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status' => $request->status ?? 'draft',
        ];

        // Update content
        $konten = "<h2>" . $request->judul . "</h2>";
        $konten .= "<p><strong>Tahun:</strong> " . $request->tahun . "</p>";
        if ($request->periode) {
            $konten .= "<p><strong>Periode:</strong> " . $request->periode . "</p>";
        }
        if ($request->deskripsi) {
            $konten .= "<p><strong>Deskripsi:</strong> " . $request->deskripsi . "</p>";
        }
        if ($request->ringkasan) {
            $konten .= "<p><strong>Ringkasan Hasil:</strong> " . $request->ringkasan . "</p>";
        }
        if ($request->kesimpulan) {
            $konten .= "<p><strong>Kesimpulan:</strong> " . $request->kesimpulan . "</p>";
        }
        if ($request->responden) {
            $konten .= "<p><strong>Jumlah Responden:</strong> " . $request->responden . "</p>";
        }
        if ($request->nilai_kepuasan) {
            $konten .= "<p><strong>Nilai Kepuasan:</strong> " . $request->nilai_kepuasan . "%</p>";
        }

        $laporan->update([
            'judul' => $request->judul,
            'konten' => $konten,
            'meta_data' => $metaData,
        ]);

        return redirect()->route('admin.laporan-survey-kepuasan')->with('success', 'Laporan survey kepuasan berhasil diperbarui');
    }

    public function destroyLaporanSurveyKepuasan($id)
    {
        $laporan = KontenWeb::findOrFail($id);
        $laporan->delete();
        return redirect()->route('admin.laporan-survey-kepuasan')->with('success', 'Laporan survey kepuasan berhasil dihapus');
    }

    public function statistikLayananInformasi()
    {
        $statistikLayanan = KontenWeb::laporan()
            ->where('slug', 'like', 'statistik-layanan-informasi%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('admin.laporan.statistik-layanan-informasi', compact('statistikLayanan'));
    }

    public function createStatistikLayananInformasi()
    {
        return view('admin.laporan.statistik-layanan-informasi-create');
    }

    public function storeStatistikLayananInformasi(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
            'file' => 'required|file|mimes:pdf|max:20480',
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = 'statistik-' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('laporan/statistik', $fileName, 'public');
        }

        // Create slug
        $slug = 'statistik-layanan-informasi-' . time();

        // Prepare meta data
        $metaData = [
            'tahun' => $request->tahun,
            'periode' => $request->periode,
            'deskripsi' => $request->deskripsi,
            'ringkasan' => $request->ringkasan,
            'analisis' => $request->analisis,
            'total_permohonan' => $request->total_permohonan,
            'total_disetujui' => $request->total_disetujui,
            'total_ditolak' => $request->total_ditolak,
            'file_path' => $filePath,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status' => $request->status ?? 'draft',
        ];

        // Create content
        $konten = "<h2>" . $request->judul . "</h2>";
        $konten .= "<p><strong>Tahun:</strong> " . $request->tahun . "</p>";
        if ($request->periode) {
            $konten .= "<p><strong>Periode:</strong> " . $request->periode . "</p>";
        }
        if ($request->deskripsi) {
            $konten .= "<p><strong>Deskripsi:</strong> " . $request->deskripsi . "</p>";
        }
        if ($request->ringkasan) {
            $konten .= "<p><strong>Ringkasan:</strong> " . $request->ringkasan . "</p>";
        }
        if ($request->analisis) {
            $konten .= "<p><strong>Analisis:</strong> " . $request->analisis . "</p>";
        }
        if ($request->total_permohonan) {
            $konten .= "<p><strong>Total Permohonan:</strong> " . $request->total_permohonan . "</p>";
        }
        if ($request->total_disetujui) {
            $konten .= "<p><strong>Total Disetujui:</strong> " . $request->total_disetujui . "</p>";
        }
        if ($request->total_ditolak) {
            $konten .= "<p><strong>Total Ditolak:</strong> " . $request->total_ditolak . "</p>";
        }

        KontenWeb::create([
            'jenis_konten' => 'laporan',
            'slug' => $slug,
            'judul' => $request->judul,
            'konten' => $konten,
            'meta_data' => $metaData,
            'is_active' => true,
        ]);

        return redirect()->route('admin.statistik-layanan-informasi')->with('success', 'Statistik layanan informasi berhasil ditambahkan');
    }

    public function editStatistikLayananInformasi($id)
    {
        $statistik = KontenWeb::findOrFail($id);
        return view('admin.laporan.statistik-layanan-informasi-edit', compact('statistik'));
    }

    public function updateStatistikLayananInformasi(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        $statistik = KontenWeb::findOrFail($id);

        // Handle file upload
        $filePath = $statistik->meta_data['file_path'] ?? null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = 'statistik-' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('laporan/statistik', $fileName, 'public');
        }

        // Prepare meta data
        $metaData = [
            'tahun' => $request->tahun,
            'periode' => $request->periode,
            'deskripsi' => $request->deskripsi,
            'ringkasan' => $request->ringkasan,
            'analisis' => $request->analisis,
            'total_permohonan' => $request->total_permohonan,
            'total_disetujui' => $request->total_disetujui,
            'total_ditolak' => $request->total_ditolak,
            'file_path' => $filePath,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'status' => $request->status ?? 'draft',
        ];

        // Update content
        $konten = "<h2>" . $request->judul . "</h2>";
        $konten .= "<p><strong>Tahun:</strong> " . $request->tahun . "</p>";
        if ($request->periode) {
            $konten .= "<p><strong>Periode:</strong> " . $request->periode . "</p>";
        }
        if ($request->deskripsi) {
            $konten .= "<p><strong>Deskripsi:</strong> " . $request->deskripsi . "</p>";
        }
        if ($request->ringkasan) {
            $konten .= "<p><strong>Ringkasan:</strong> " . $request->ringkasan . "</p>";
        }
        if ($request->analisis) {
            $konten .= "<p><strong>Analisis:</strong> " . $request->analisis . "</p>";
        }
        if ($request->total_permohonan) {
            $konten .= "<p><strong>Total Permohonan:</strong> " . $request->total_permohonan . "</p>";
        }
        if ($request->total_disetujui) {
            $konten .= "<p><strong>Total Disetujui:</strong> " . $request->total_disetujui . "</p>";
        }
        if ($request->total_ditolak) {
            $konten .= "<p><strong>Total Ditolak:</strong> " . $request->total_ditolak . "</p>";
        }

        $statistik->update([
            'judul' => $request->judul,
            'konten' => $konten,
            'meta_data' => $metaData,
        ]);

        return redirect()->route('admin.statistik-layanan-informasi')->with('success', 'Statistik layanan informasi berhasil diperbarui');
    }

    public function destroyStatistikLayananInformasi($id)
    {
        $statistik = KontenWeb::findOrFail($id);
        $statistik->delete();
        return redirect()->route('admin.statistik-layanan-informasi')->with('success', 'Statistik layanan informasi berhasil dihapus');
    }
}
