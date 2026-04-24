<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use Illuminate\Support\Facades\Mail;

class PermohonanController extends Controller
{
    public function index(Request $request)
    {
        $query = Permohonan::latest();
        
        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        // Filter berdasarkan pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_pemohon', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('informasi_diminta', 'like', '%' . $search . '%');
            });
        }
        
        $permohonans = $query->paginate(10);
        
        // Hitung statistik semua status (tidak terpengaruh filter)
        $permohonanStats = [
            'baru' => Permohonan::where('status', 'baru')->count(),
            'diproses' => Permohonan::where('status', 'diproses')->count(),
            'selesai' => Permohonan::where('status', 'selesai')->count(),
            'ditolak' => Permohonan::where('status', 'ditolak')->count(),
        ];
        
        return view('admin.permohonan.permohonan', compact('permohonans', 'permohonanStats'))->with('request', $request);
    }

    public function store(Request $request)
    {
        try {
            \Log::info('Permohonan submission attempt', $request->all());
            
            $request->validate([
                'nama_pemohon' => 'required|string|max:255',
                'email' => 'required|email',
                'telepon' => 'required|string|max:20',
                'alamat' => 'required|string',
                'usia' => 'required|integer|min:1|max:120',
                'pendidikan_terakhir' => 'required|string|max:255',
                'pekerjaan' => 'required|string|max:255',
                'informasi_diminta' => 'required|string',
                'tujuan' => 'required|string',
                'cara_perolehan' => 'required|string',
            ]);

            $permohonan = Permohonan::create([
                'nama_pemohon' => $request->nama_pemohon,
                'usia' => $request->usia,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'pekerjaan' => $request->pekerjaan,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'informasi_diminta' => $request->informasi_diminta,
                'tujuan' => $request->tujuan,
                'cara_perolehan' => $request->cara_perolehan,
                'status' => 'baru',
                'tanggal_permohonan' => now(),
            ]);

            \Log::info('Permohonan created successfully', ['id' => $permohonan->id]);

            return redirect()->back()->with('success', 'Permohonan berhasil dikirim! Nomor tiket: ' . $permohonan->id);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation failed', ['errors' => $e->errors()]);
            return redirect()->back()
                ->withErrors($e->errors())
                ->with('error', 'Validasi gagal. Silakan periksa kembali formulir Anda.')
                ->withInput();
        } catch (\Exception $e) {
            \Log::error('Permohonan submission failed', ['error' => $e->getMessage()]);
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:baru,diproses,selesai,ditolak',
            'message' => 'nullable|string',
            'subject' => 'nullable|string',
        ]);

        $permohonan = Permohonan::findOrFail($id);
        $permohonan->status = $request->status;

        if ($request->status == 'diproses') {
            $permohonan->tanggal_proses = now();
        } elseif ($request->status == 'selesai' || $request->status == 'ditolak') {
            $permohonan->tanggal_selesai = now();
            
            // Kirim email notifikasi
            if ($request->message && $request->subject) {
                try {
                    Mail::send('emails.permohonan-reply', [
                        'permohonan' => $permohonan,
                        'pesan' => $request->message,
                    ], function ($message) use ($permohonan, $request) {
                        $message->to($permohonan->email, $permohonan->nama_pemohon)
                                ->subject($request->subject);
                    });
                } catch (\Exception $e) {
                    // Log error tapi tetap lanjutkan proses
                    \Log::error('Email gagal dikirim: ' . $e->getMessage());
                }
            }
        }

        $permohonan->save();

        return redirect()->back()->with('success', 'Status permohonan berhasil diperbarui!');
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
        ]);

        $permohonan = Permohonan::findOrFail($id);

        try {
            $attachment = null;
            if ($request->hasFile('attachment')) {
                $attachment = $request->file('attachment');
            }

            Mail::send('emails.permohonan-reply', [
                'permohonan' => $permohonan,
                'pesan' => $request->message,
                'attachment' => $attachment,
            ], function ($message) use ($permohonan, $request, $attachment) {
                $message->to($permohonan->email, $permohonan->nama_pemohon)
                        ->subject($request->subject);
                
                if ($attachment) {
                    $message->attach($attachment->getRealPath(), [
                        'as' => $attachment->getClientOriginalName(),
                        'mime' => $attachment->getMimeType(),
                    ]);
                }
            });

            return redirect()->back()->with('success', 'Email balasan berhasil dikirim!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengirim email: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        return view('admin.permohonan.permohonan-detail', compact('permohonan'));
    }

    public function cekStatus(Request $request)
    {
        $request->validate([
            'nomor_tiket_permohonan' => 'required|string',
            'email_pemohon_permohonan' => 'required|email',
        ]);

        // Cari permohonan berdasarkan ID (nomor tiket) dan email
        $permohonan = Permohonan::where('id', $request->nomor_tiket_permohonan)
                                ->where('email', $request->email_pemohon_permohonan)
                                ->first();

        if (!$permohonan) {
            return redirect()->back()->with('error', 'Data permohonan tidak ditemukan. Periksa kembali nomor tiket dan email Anda.');
        }

        return redirect()->back()->with('success', 'Status permohonan ditemukan!')->with('permohonan', $permohonan);
    }
}
