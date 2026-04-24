<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KomentarBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KomentarBeritaController extends Controller
{
    /**
     * Store a newly created comment in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'berita_id' => 'required|exists:beritas,id',
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'komentar' => 'required|string|min:3|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Create the comment
            $komentar = KomentarBerita::create([
                'berita_id' => $request->berita_id,
                'nama' => $request->nama,
                'email' => $request->email,
                'komentar' => $request->komentar,
                'status' => 'approved', // Comments appear immediately
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Komentar berhasil dikirim!',
                'data' => $komentar
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan komentar.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get comments for a specific berita
     */
    public function getByBerita($beritaId)
    {
        $berita = Berita::findOrFail($beritaId);
        
        $komentars = $berita->approvedComments()
            ->latest()
            ->get()
            ->map(function ($komentar) {
                return [
                    'id' => $komentar->id,
                    'nama' => $komentar->nama,
                    'komentar' => $komentar->komentar,
                    'tanggal' => $komentar->created_at->format('d M Y H:i')
                ];
            });

        return response()->json([
            'success' => true,
            'data' => $komentars,
            'total' => $komentars->count()
        ]);
    }
}
