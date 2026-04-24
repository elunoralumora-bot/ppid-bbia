<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keberatan;
use Illuminate\Support\Facades\Mail;

class KeberatanController extends Controller
{
    public function index(Request $request)
    {
        $query = Keberatan::latest();
        
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
                  ->orWhere('alasan_keberatan', 'like', '%' . $search . '%');
            });
        }
        
        $keberatans = $query->paginate(10);
        
        // Hitung statistik semua status (tidak terpengaruh filter)
        $keberatanStats = [
            'baru' => Keberatan::where('status', 'baru')->count(),
            'diproses' => Keberatan::where('status', 'diproses')->count(),
            'diterima' => Keberatan::where('status', 'diterima')->count(),
            'ditolak' => Keberatan::where('status', 'ditolak')->count(),
        ];
        
        return view('admin.keberatan.keberatan', compact('keberatans', 'keberatanStats'))->with('request', $request);
    }

    public function store(Request $request)
    {
        try {
            \Log::info('Keberatan submission attempt', $request->all());
            
            $request->validate([
                'nama_pemohon' => 'required|string|max:255',
                'email' => 'required|email',
                'telepon' => 'required|string|max:20',
                'alamat' => 'required|string',
                'usia' => 'required|integer|min:1|max:120',
                'pendidikan_terakhir' => 'required|string|max:255',
                'pekerjaan' => 'required|string|max:255',
                'alasan_keberatan' => 'required|string',
                'permohonan_id' => 'nullable|integer',
            ]);

            $keberatan = Keberatan::create([
                'nama_pemohon' => $request->nama_pemohon,
                'usia' => $request->usia,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'pekerjaan' => $request->pekerjaan,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'alasan_keberatan' => $request->alasan_keberatan,
                'permohonan_id' => $request->permohonan_id ?: null,
                'status' => 'baru',
                'tanggal_keberatan' => now(),
            ]);

            \Log::info('Keberatan created successfully', ['id' => $keberatan->id]);

            return redirect()->back()->with('success', 'Pengajuan keberatan berhasil dikirim! Nomor tiket: ' . $keberatan->id);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Keberatan validation failed', ['errors' => $e->errors()]);
            return redirect()->back()
                ->withErrors($e->errors())
                ->with('error', 'Validasi gagal. Silakan periksa kembali formulir Anda.')
                ->withInput();
        } catch (\Exception $e) {
            \Log::error('Keberatan submission failed', ['error' => $e->getMessage()]);
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:baru,diproses,diterima,ditolak',
            'message' => 'nullable|string',
            'subject' => 'nullable|string',
        ]);

        $keberatan = Keberatan::findOrFail($id);
        $keberatan->status = $request->status;

        if ($request->status == 'diproses') {
            $keberatan->tanggal_proses = now();
        } elseif ($request->status == 'diterima' || $request->status == 'ditolak') {
            $keberatan->tanggal_selesai = now();
            
            // Kirim email notifikasi
            if ($request->message && $request->subject) {
                try {
                    Mail::send('emails.keberatan-reply', [
                        'keberatan' => $keberatan,
                        'pesan' => $request->message,
                    ], function ($message) use ($keberatan, $request) {
                        $message->to($keberatan->email, $keberatan->nama_pemohon)
                                ->subject($request->subject);
                    });
                } catch (\Exception $e) {
                    // Log error tapi tetap lanjutkan proses
                    \Log::error('Email gagal dikirim: ' . $e->getMessage());
                }
            }
        }

        $keberatan->save();

        return redirect()->back()->with('success', 'Status keberatan berhasil diperbarui!');
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
        ]);

        $keberatan = Keberatan::findOrFail($id);

        try {
            $attachment = null;
            if ($request->hasFile('attachment')) {
                $attachment = $request->file('attachment');
            }

            Mail::send('emails.keberatan-reply', [
                'keberatan' => $keberatan,
                'pesan' => $request->message,
                'attachment' => $attachment,
            ], function ($message) use ($keberatan, $request, $attachment) {
                $message->to($keberatan->email, $keberatan->nama_pemohon)
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
        $keberatan = Keberatan::with('permohonan')->findOrFail($id);
        return view('admin.keberatan.keberatan-detail', compact('keberatan'));
    }

    public function cekStatus(Request $request)
    {
        $request->validate([
            'nomor_tiket_keberatan' => 'required|string',
            'email_pemohon_keberatan' => 'required|email',
        ]);

        // Cari keberatan berdasarkan ID (nomor tiket) dan email
        $keberatan = Keberatan::where('id', $request->nomor_tiket_keberatan)
                              ->where('email', $request->email_pemohon_keberatan)
                              ->first();

        if (!$keberatan) {
            return redirect()->back()->with('error', 'Data keberatan tidak ditemukan. Periksa kembali nomor tiket dan email Anda.');
        }

        return redirect()->back()->with('success', 'Status keberatan ditemukan!')->with('keberatan', $keberatan);
    }
}
