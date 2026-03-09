<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StandarLayanan;

class StandarLayananController extends Controller
{
    public function index()
    {
        $standars = StandarLayanan::where('is_active', true)->orderBy('urutan')->get();
        return view('admin.standar-layanan', compact('standars'));
    }

    public function create()
    {
        return view('admin.standar-layanan-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string|max:255',
            'waktu' => 'required|string|max:255',
            'biaya' => 'required|string|max:255',
            'produk' => 'required|string|max:255',
            'prosedur' => 'required',
            'urutan' => 'required|integer|min:0',
        ]);

        StandarLayanan::create($request->all());
        return redirect()->route('admin.standar-layanan')->with('success', 'Standar layanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $standar = StandarLayanan::findOrFail($id);
        return view('admin.standar-layanan-edit', compact('standar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required|string|max:255',
            'waktu' => 'required|string|max:255',
            'biaya' => 'required|string|max:255',
            'produk' => 'required|string|max:255',
            'prosedur' => 'required',
            'urutan' => 'required|integer|min:0',
        ]);

        $standar = StandarLayanan::findOrFail($id);
        $standar->update($request->all());
        return redirect()->route('admin.standar-layanan')->with('success', 'Standar layanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $standar = StandarLayanan::findOrFail($id);
        $standar->delete();
        return redirect()->route('admin.standar-layanan')->with('success', 'Standar layanan berhasil dihapus');
    }
}