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
            ->where('kategori', 'Tentang PPID')
            ->orderBy('urutan')
            ->get();
        
        return view('admin.profil.tentang-ppid', compact('profils'));
    }

    public function updateTentangPPID(Request $request)
    {
        // Update existing structures
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'tentang_') === 0) {
                $profilId = str_replace('tentang_', '', $key);
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
        $request->validate([
            'kepala_bbia' => 'required|string',
            'ppid' => 'required|string',
            'koordinator' => 'required|string',
            'staf' => 'required|string',
        ]);

        // Data struktur organisasi yang akan diupdate/created
        $strukturData = [
            [
                'kategori' => 'Struktur Organisasi',
                'judul' => 'Kepala BBIA',
                'konten' => $request->kepala_bbia,
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'kategori' => 'Struktur Organisasi',
                'judul' => 'Pejabat Pengelola Informasi dan Dokumentasi',
                'konten' => $request->ppid,
                'urutan' => 2,
                'is_active' => true,
            ],
            [
                'kategori' => 'Struktur Organisasi',
                'judul' => 'Koordinator PPID',
                'konten' => $request->koordinator,
                'urutan' => 3,
                'is_active' => true,
            ],
            [
                'kategori' => 'Struktur Organisasi',
                'judul' => 'Staf PPID',
                'konten' => $request->staf,
                'urutan' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($strukturData as $data) {
            // Update atau create data struktur organisasi
            Profil::updateOrCreate(
                ['kategori' => $data['kategori'], 'judul' => $data['judul']],
                $data
            );
        }

        return redirect()->route('admin.struktur-organisasi')->with('success', 'Halaman Struktur Organisasi berhasil diperbarui');
    }

    public function updateUnitPelaksana(Request $request)
    {
        $request->validate([
            'unit_pelaksana' => 'required|string',
        ]);

        // Data unit pelaksana yang akan diupdate/created
        $unitData = [
            [
                'kategori' => 'Unit Pelaksana',
                'judul' => 'Unit Pelaksana PPID',
                'konten' => $request->unit_pelaksana,
                'urutan' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($unitData as $data) {
            // Update atau create data unit pelaksana
            Profil::updateOrCreate(
                ['kategori' => $data['kategori'], 'judul' => $data['judul']],
                $data
            );
        }

        return redirect()->route('admin.struktur-organisasi')->with('success', 'Unit Pelaksana PPID berhasil diperbarui');
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
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        // Data visi misi yang akan diupdate/created
        $visiMisiData = [
            [
                'kategori' => 'Visi Misi',
                'judul' => 'Visi',
                'konten' => $request->visi,
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'kategori' => 'Visi Misi',
                'judul' => 'Misi',
                'konten' => $request->misi,
                'urutan' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($visiMisiData as $data) {
            // Update atau create data visi misi
            Profil::updateOrCreate(
                ['kategori' => $data['kategori'], 'judul' => $data['judul']],
                $data
            );
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
        $request->validate([
            'telepon' => 'required|string',
            'email' => 'required|string',
            'alamat' => 'required|string',
        ]);

        // Data kontak yang akan diupdate/created
        $kontakData = [
            [
                'kategori' => 'Kontak PPID',
                'judul' => 'Telepon',
                'konten' => $request->telepon,
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'kategori' => 'Kontak PPID',
                'judul' => 'Email',
                'konten' => $request->email,
                'urutan' => 2,
                'is_active' => true,
            ],
            [
                'kategori' => 'Kontak PPID',
                'judul' => 'Alamat',
                'konten' => $request->alamat,
                'urutan' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($kontakData as $data) {
            // Update atau create data kontak
            Profil::updateOrCreate(
                ['kategori' => $data['kategori'], 'judul' => $data['judul']],
                $data
            );
        }

        return redirect()->route('admin.kontak-ppid')->with('success', 'Halaman Kontak PPID berhasil diperbarui');
    }
}
