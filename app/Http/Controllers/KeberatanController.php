<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keberatan;

class KeberatanController extends Controller
{
    public function index()
    {
        $keberatans = Keberatan::latest()->paginate(10);
        return view('admin.keberatan', compact('keberatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemohon' => 'required|string|max:255',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'alasan_keberatan' => 'required|string',
            'permohonan_id' => 'nullable|integer',
        ]);

        Keberatan::create([
            'nama_pemohon' => $request->nama_pemohon,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'alasan_keberatan' => $request->alasan_keberatan,
            'permohonan_id' => $request->permohonan_id,
            'status' => 'baru',
            'tanggal_keberatan' => now(),
        ]);

        return redirect()->back()->with('success', 'Pengajuan keberatan berhasil dikirim!');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:baru,diproses,diterima,ditolak',
            'catatan' => 'nullable|string',
        ]);

        $keberatan = Keberatan::findOrFail($id);
        $keberatan->status = $request->status;
        $keberatan->catatan = $request->catatan;

        if ($request->status == 'diproses') {
            $keberatan->tanggal_proses = now();
        } elseif ($request->status == 'diterima' || $request->status == 'ditolak') {
            $keberatan->tanggal_selesai = now();
        }

        $keberatan->save();

        return redirect()->back()->with('success', 'Status keberatan berhasil diperbarui!');
    }

    public function show($id)
    {
        $keberatan = Keberatan::findOrFail($id);
        return view('admin.keberatan-detail', compact('keberatan'));
    }
}