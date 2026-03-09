<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiPublik;

class InformasiPublikController extends Controller
{
    public function index()
    {
        $informasis = InformasiPublik::orderBy('kategori')->orderBy('urutan')->get();
        return view('admin.informasi-publik', compact('informasis'));
    }

    public function create()
    {
        return view('admin.informasi-publik-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'urutan' => 'required|integer|min:0',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $data = $request->except('file_path');
        
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/informasi'), $filename);
            $data['file_path'] = 'files/informasi/' . $filename;
        }

        InformasiPublik::create($data);
        return redirect()->route('admin.informasi-publik')->with('success', 'Informasi publik berhasil ditambahkan');
    }

    public function edit($id)
    {
        $informasi = InformasiPublik::findOrFail($id);
        return view('admin.informasi-publik-edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'urutan' => 'required|integer|min:0',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $informasi = InformasiPublik::findOrFail($id);
        $data = $request->except('file_path');
        
        if ($request->hasFile('file_path')) {
            // Delete old file
            if ($informasi->file_path && file_exists(public_path($informasi->file_path))) {
                unlink(public_path($informasi->file_path));
            }
            
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/informasi'), $filename);
            $data['file_path'] = 'files/informasi/' . $filename;
        }

        $informasi->update($data);
        return redirect()->route('admin.informasi-publik')->with('success', 'Informasi publik berhasil diperbarui');
    }

    public function destroy($id)
    {
        $informasi = InformasiPublik::findOrFail($id);
        
        // Delete file
        if ($informasi->file_path && file_exists(public_path($informasi->file_path))) {
            unlink(public_path($informasi->file_path));
        }
        
        $informasi->delete();
        return redirect()->route('admin.informasi-publik')->with('success', 'Informasi publik berhasil dihapus');
    }
}