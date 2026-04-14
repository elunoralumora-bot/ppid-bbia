<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilController extends Controller
{
    public function index()
    {
        $profils = Profil::orderBy('kategori')->orderBy('urutan')->get();
        return view('admin.profil.profil', compact('profils'));
    }

    public function create()
    {
        return view('admin.profil.profil-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'urutan' => 'required|integer|min:0',
        ]);

        Profil::create($request->all());
        return redirect()->route('admin.profil')->with('success', 'Profil berhasil ditambahkan');
    }

    public function edit($id)
    {
        $profil = Profil::findOrFail($id);
        return view('admin.profil.profil-edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'urutan' => 'required|integer|min:0',
        ]);

        $profil = Profil::findOrFail($id);
        $profil->update($request->all());
        return redirect()->route('admin.profil')->with('success', 'Profil berhasil diperbarui');
    }

    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);
        $profil->delete();
        return redirect()->route('admin.profil')->with('success', 'Profil berhasil dihapus');
    }

    // Edit Pages Methods
    public function editTentangPPID()
    {
        $profils = Profil::where('is_active', true)
            ->where('kategori', '!=', 'Pengantar')
            ->orderBy('kategori')
            ->orderBy('urutan')
            ->get()
            ->groupBy('kategori');
        
        $pengantarDb = Profil::where('kategori', 'Pengantar')->where('judul', 'Tentang PPID')->first();
        $pengantar = $pengantarDb ? $pengantarDb->konten : "Pejabat Pengelola Informasi dan Dokumentasi (PPID) adalah pejabat yang bertanggung jawab atas penyediaan layanan dan informasi publik di lingkungan Balai Besar Industri Agro (BBIA). PPID BBIA berfungsi sebagai jembatan antara institusi dengan masyarakat dalam hal akses informasi publik.";
        
        return view('admin.profil.tentang-ppid', compact('profils', 'pengantar'));
    }

    public function updateTentangPPID(Request $request)
    {
        // Update pengantar
        $pengantarText = $request->input('pengantar');
        if ($pengantarText) {
            $pengantarDb = Profil::firstOrCreate(
                ['kategori' => 'Pengantar', 'judul' => 'Tentang PPID'],
                ['urutan' => 0, 'is_active' => true, 'konten' => $pengantarText]
            );
            if (!$pengantarDb->wasRecentlyCreated) {
                $pengantarDb->konten = $pengantarText;
                $pengantarDb->save();
            }
        }

        // Update all profil items
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'profil_') === 0) {
                $profilId = str_replace('profil_', '', $key);
                $profil = Profil::find($profilId);
                if ($profil) {
                    $profil->konten = $value;
                    $profil->save();
                }
            }
        }

        return redirect()->route('admin.tentang-ppid')->with('success', 'Halaman Tentang PPID berhasil diperbarui');
    }

    public function editTugasDanFungsi()
    {
        $profils = Profil::where('is_active', true)
            ->where('kategori', 'Tugas dan Fungsi')
            ->orderBy('urutan')
            ->get();
        
        return view('admin.profil.tugas-dan-fungsi', compact('profils'));
    }

    public function updateTugasDanFungsi(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'konten_') === 0) {
                $profilId = str_replace('konten_', '', $key);
                $profil = Profil::find($profilId);
                if ($profil) {
                    $profil->konten = $value;
                    $profil->save();
                }
            }
        }

        return redirect()->route('admin.tugas-dan-fungsi')->with('success', 'Halaman Tugas dan Fungsi berhasil diperbarui');
    }

    public function editStrukturOrganisasi()
    {
        $profils = Profil::where('is_active', true)
            ->where('kategori', 'Struktur Organisasi')
            ->orderBy('urutan')
            ->get();
        
        return view('admin.profil.struktur-organisasi', compact('profils'));
    }

    public function updateStrukturOrganisasi(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'konten_') === 0) {
                $profilId = str_replace('konten_', '', $key);
                $profil = Profil::find($profilId);
                if ($profil) {
                    $profil->konten = $value;
                    $profil->save();
                }
            }
        }

        return redirect()->route('admin.struktur-organisasi')->with('success', 'Halaman Struktur Organisasi berhasil diperbarui');
    }


    public function editVisiMisi()
    {
        $profils = Profil::where('is_active', true)
            ->where('kategori', 'Visi Misi')
            ->orderBy('urutan')
            ->get();
        
        return view('admin.profil.visi-misi', compact('profils'));
    }

    public function updateVisiMisi(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'konten_') === 0) {
                $profilId = str_replace('konten_', '', $key);
                $profil = Profil::find($profilId);
                if ($profil) {
                    $profil->konten = $value;
                    $profil->save();
                }
            }
        }

        return redirect()->route('admin.visi-misi')->with('success', 'Halaman Visi dan Misi berhasil diperbarui');
    }

    public function editKontakPPID()
    {
        $profils = Profil::where('is_active', true)
            ->where('kategori', 'Kontak PPID')
            ->orderBy('urutan')
            ->get();
        
        return view('admin.profil.kontak-ppid', compact('profils'));
    }

    public function updateKontakPPID(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'konten_') === 0) {
                $profilId = str_replace('konten_', '', $key);
                $profil = Profil::find($profilId);
                if ($profil) {
                    $profil->konten = $value;
                    $profil->save();
                }
            }
        }

        return redirect()->route('admin.kontak-ppid')->with('success', 'Halaman Kontak PPID berhasil diperbarui');
    }
}
