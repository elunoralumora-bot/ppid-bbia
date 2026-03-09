<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('admin.berita', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'tanggal_publikasi' => 'nullable|date',
        ]);

        $data = $request->except('gambar');
        $data['slug'] = Str::slug($request->judul);
        
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/berita'), $imageName);
            $data['gambar'] = 'images/berita/' . $imageName;
        }

        Berita::create($data);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita-show', compact('berita'));
    }

    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita-edit', compact('berita'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'tanggal_publikasi' => 'nullable|date',
        ]);

        $berita = Berita::findOrFail($id);
        $data = $request->except('gambar');
        $data['slug'] = Str::slug($request->judul);
        
        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($berita->gambar && file_exists(public_path($berita->gambar))) {
                unlink(public_path($berita->gambar));
            }
            
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/berita'), $imageName);
            $data['gambar'] = 'images/berita/' . $imageName;
        }

        $berita->update($data);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);
        
        // Delete image
        if ($berita->gambar && file_exists(public_path($berita->gambar))) {
            unlink(public_path($berita->gambar));
        }
        
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus');
    }

    public function showPublic(string $slug)
    {
        $berita = Berita::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('detail-berita', compact('berita'));
    }
}