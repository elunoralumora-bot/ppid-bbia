<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;

class PermohonanController extends Controller
{
    public function index()
    {
        $permohonans = Permohonan::latest()->paginate(10);
        return view('admin.permohonan', compact('permohonans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemohon' => 'required|string|max:255',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'informasi_diminta' => 'required|string',
            'tujuan' => 'required|string',
            'cara_perolehan' => 'required|string',
        ]);

        Permohonan::create([
            'nama_pemohon' => $request->nama_pemohon,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'informasi_diminta' => $request->informasi_diminta,
            'tujuan' => $request->tujuan,
            'cara_perolehan' => $request->cara_perolehan,
            'status' => 'baru',
            'tanggal_permohonan' => now(),
        ]);

        return redirect()->back()->with('success', 'Permohonan berhasil dikirim!');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:baru,diproses,selesai,ditolak',
            'catatan' => 'nullable|string',
        ]);

        $permohonan = Permohonan::findOrFail($id);
        $permohonan->status = $request->status;
        $permohonan->catatan = $request->catatan;

        if ($request->status == 'diproses') {
            $permohonan->tanggal_proses = now();
        } elseif ($request->status == 'selesai' || $request->status == 'ditolak') {
            $permohonan->tanggal_selesai = now();
        }

        $permohonan->save();

        return redirect()->back()->with('success', 'Status permohonan berhasil diperbarui!');
    }

    public function show($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        return view('admin.permohonan-detail', compact('permohonan'));
    }
}