<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KontenWeb;

class KontenWebController extends Controller
{
    // Profil Methods
    public function profilIndex()
    {
        $kontens = KontenWeb::profil()->latest()->paginate(10);
        return view('admin.profil.index', compact('kontens'));
    }

    public function profilCreate()
    {
        return view('admin.profil.create');
    }

    public function profilStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:konten_webs,slug',
            'konten' => 'required|string',
            'meta_data' => 'nullable|array',
        ]);

        KontenWeb::create([
            'jenis_konten' => 'profil',
            'judul' => $request->judul,
            'slug' => $request->slug,
            'konten' => $request->konten,
            'meta_data' => $request->meta_data,
        ]);

        return redirect()->route('admin.profil.index')->with('success', 'Konten profil berhasil ditambahkan');
    }

    public function profilEdit($id)
    {
        $konten = KontenWeb::findOrFail($id);
        return view('admin.profil.edit', compact('konten'));
    }

    public function profilUpdate(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:konten_webs,slug,'.$id,
            'konten' => 'required|string',
            'meta_data' => 'nullable|array',
        ]);

        $konten = KontenWeb::findOrFail($id);
        $konten->update([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'konten' => $request->konten,
            'meta_data' => $request->meta_data,
        ]);

        return redirect()->route('admin.profil.index')->with('success', 'Konten profil berhasil diperbarui');
    }

    public function profilDestroy($id)
    {
        $konten = KontenWeb::findOrFail($id);
        $konten->delete();
        return redirect()->route('admin.profil.index')->with('success', 'Konten profil berhasil dihapus');
    }

    // Informasi Publik Methods
    public function informasiPublikIndex()
    {
        $kontens = KontenWeb::informasiPublik()->latest()->paginate(10);
        return view('admin.informasi-publik.index', compact('kontens'));
    }

    public function informasiPublikCreate()
    {
        return view('admin.informasi-publik.create');
    }

    public function informasiPublikStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:konten_webs,slug',
            'konten' => 'required|string',
            'meta_data' => 'nullable|array',
        ]);

        KontenWeb::create([
            'jenis_konten' => 'informasi_publik',
            'judul' => $request->judul,
            'slug' => $request->slug,
            'konten' => $request->konten,
            'meta_data' => $request->meta_data,
        ]);

        return redirect()->route('admin.informasi-publik.index')->with('success', 'Konten informasi publik berhasil ditambahkan');
    }

    public function informasiPublikEdit($id)
    {
        $konten = KontenWeb::findOrFail($id);
        return view('admin.informasi-publik.edit', compact('konten'));
    }

    public function informasiPublikUpdate(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:konten_webs,slug,'.$id,
            'konten' => 'required|string',
            'meta_data' => 'nullable|array',
        ]);

        $konten = KontenWeb::findOrFail($id);
        $konten->update([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'konten' => $request->konten,
            'meta_data' => $request->meta_data,
        ]);

        return redirect()->route('admin.informasi-publik.index')->with('success', 'Konten informasi publik berhasil diperbarui');
    }

    public function informasiPublikDestroy($id)
    {
        $konten = KontenWeb::findOrFail($id);
        $konten->delete();
        return redirect()->route('admin.informasi-publik.index')->with('success', 'Konten informasi publik berhasil dihapus');
    }

    // Standar Layanan Methods
    public function standarLayananIndex()
    {
        $kontens = KontenWeb::standarLayanan()->latest()->paginate(10);
        return view('admin.standar-layanan.index', compact('kontens'));
    }

    public function standarLayananCreate()
    {
        return view('admin.standar-layanan.create');
    }

    public function standarLayananStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:konten_webs,slug',
            'konten' => 'required|string',
            'meta_data' => 'nullable|array',
        ]);

        KontenWeb::create([
            'jenis_konten' => 'standar_layanan',
            'judul' => $request->judul,
            'slug' => $request->slug,
            'konten' => $request->konten,
            'meta_data' => $request->meta_data,
        ]);

        return redirect()->route('admin.standar-layanan.index')->with('success', 'Konten standar layanan berhasil ditambahkan');
    }

    public function standarLayananEdit($id)
    {
        $konten = KontenWeb::findOrFail($id);
        return view('admin.standar-layanan.edit', compact('konten'));
    }

    public function standarLayananUpdate(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:konten_webs,slug,'.$id,
            'konten' => 'required|string',
            'meta_data' => 'nullable|array',
        ]);

        $konten = KontenWeb::findOrFail($id);
        $konten->update([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'konten' => $request->konten,
            'meta_data' => $request->meta_data,
        ]);

        return redirect()->route('admin.standar-layanan.index')->with('success', 'Konten standar layanan berhasil diperbarui');
    }

    public function standarLayananDestroy($id)
    {
        $konten = KontenWeb::findOrFail($id);
        $konten->delete();
        return redirect()->route('admin.standar-layanan.index')->with('success', 'Konten standar layanan berhasil dihapus');
    }

    // Laporan Methods
    public function laporanIndex()
    {
        $kontens = KontenWeb::laporan()->latest()->paginate(10);
        return view('admin.laporan.index', compact('kontens'));
    }

    public function laporanCreate()
    {
        return view('admin.laporan.create');
    }

    public function laporanStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:konten_webs,slug',
            'konten' => 'required|string',
            'meta_data' => 'nullable|array',
        ]);

        KontenWeb::create([
            'jenis_konten' => 'laporan',
            'judul' => $request->judul,
            'slug' => $request->slug,
            'konten' => $request->konten,
            'meta_data' => $request->meta_data,
        ]);

        return redirect()->route('admin.laporan.index')->with('success', 'Konten laporan berhasil ditambahkan');
    }

    public function laporanEdit($id)
    {
        $konten = KontenWeb::findOrFail($id);
        return view('admin.laporan.edit', compact('konten'));
    }

    public function laporanUpdate(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:konten_webs,slug,'.$id,
            'konten' => 'required|string',
            'meta_data' => 'nullable|array',
        ]);

        $konten = KontenWeb::findOrFail($id);
        $konten->update([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'konten' => $request->konten,
            'meta_data' => $request->meta_data,
        ]);

        return redirect()->route('admin.laporan.index')->with('success', 'Konten laporan berhasil diperbarui');
    }

    public function laporanDestroy($id)
    {
        $konten = KontenWeb::findOrFail($id);
        $konten->delete();
        return redirect()->route('admin.laporan.index')->with('success', 'Konten laporan berhasil dihapus');
    }
}
