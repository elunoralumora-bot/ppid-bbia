<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanPublik;

class LaporanPublikController extends Controller
{
    public function index()
    {
        $laporans = LaporanPublik::orderBy('tahun', 'desc')->orderBy('kategori')->orderBy('judul')->get();
        return view('admin.laporan-publik', compact('laporans'));
    }

    public function create()
    {
        return view('admin.laporan-publik-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|string|max:10',
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'file_path' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $data = $request->except('file_path');
        
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/laporan'), $filename);
            $data['file_path'] = 'files/laporan/' . $filename;
        }

        LaporanPublik::create($data);
        return redirect()->route('admin.laporan-publik')->with('success', 'Laporan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $laporan = LaporanPublik::findOrFail($id);
        return view('admin.laporan-publik-edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|string|max:10',
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $laporan = LaporanPublik::findOrFail($id);
        $data = $request->except('file_path');
        
        if ($request->hasFile('file_path')) {
            // Delete old file
            if ($laporan->file_path && file_exists(public_path($laporan->file_path))) {
                unlink(public_path($laporan->file_path));
            }
            
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/laporan'), $filename);
            $data['file_path'] = 'files/laporan/' . $filename;
        }

        $laporan->update($data);
        return redirect()->route('admin.laporan-publik')->with('success', 'Laporan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $laporan = LaporanPublik::findOrFail($id);
        
        // Delete file
        if ($laporan->file_path && file_exists(public_path($laporan->file_path))) {
            unlink(public_path($laporan->file_path));
        }
        
        $laporan->delete();
        return redirect()->route('admin.laporan-publik')->with('success', 'Laporan berhasil dihapus');
    }
}