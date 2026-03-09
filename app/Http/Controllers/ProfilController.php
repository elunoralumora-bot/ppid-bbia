<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilController extends Controller
{
    public function index()
    {
        $profils = Profil::orderBy('kategori')->orderBy('urutan')->get();
        return view('admin.profil', compact('profils'));
    }

    public function create()
    {
        return view('admin.profil-create');
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
        return view('admin.profil-edit', compact('profil'));
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
}