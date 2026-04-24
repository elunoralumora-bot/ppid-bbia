<?php

namespace App\Http\Controllers;

use App\Models\KontenWeb;
use App\Models\InformasiPublik;
use App\Models\Profil;
use App\Models\Prosedur;

class PublikController extends Controller
{
    public function tentangPpid()
    {
        $profils = \App\Models\Profil::where('is_active', true)
            ->where('kategori', 'Tentang PPID')
            ->orderBy('urutan')
            ->get();
        
        return view('tentang-ppid', compact('profils'));
    }

    public function informasiPublik()
    {
        $konten = KontenWeb::informasiPublik()->where('slug', 'informasi-publik')->active()->first();
        return view('informasi-publik', compact('konten'));
    }

    public function standarLayanan()
    {
        $konten = KontenWeb::standarLayanan()->where('slug', 'standar-layanan')->active()->first();
        return view('standar-layanan', compact('konten'));
    }

    public function laporanTahunan()
    {
        $kontens = KontenWeb::laporan()
            ->where('slug', 'like', 'laporan-tahunan-ppid%')
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('laporan-tahunan', compact('kontens'));
    }

    public function visiMisi()
    {
        $profils = \App\Models\Profil::where('is_active', true)
            ->where('kategori', 'Visi Misi')
            ->orderBy('urutan')
            ->get();
        
        return view('visi-misi', compact('profils'));
    }

    public function strukturOrganisasi()
    {
        $profils = \App\Models\Profil::where('is_active', true)
            ->where('kategori', 'Struktur Organisasi')
            ->orderBy('urutan')
            ->get();
        
        return view('struktur-organisasi', compact('profils'));
    }

    
    public function kontakPpid()
    {
        $profils = Profil::where('is_active', true)
            ->where('kategori', 'Kontak PPID')
            ->orderBy('urutan')
            ->get();
        
        return view('kontak-ppid', compact('profils'));
    }

    public function informasiBerkala()
    {
        $kontens = InformasiPublik::where('kategori', 'Informasi Berkala')
            ->orWhere('kategori', 'Laporan Keuangan')
            ->orWhere('kategori', 'Program Kerja')
            ->orWhere('kategori', 'Lainnya')
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('informasi-berkala', compact('kontens'));
    }

    public function informasiSertaMerta()
    {
        $kontens = InformasiPublik::where('kategori', 'Informasi Serta Merta')
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('informasi-serta-merta', compact('kontens'));
    }

    public function informasiSetiapSaat()
    {
        $kontens = InformasiPublik::where('kategori', 'Informasi Setiap Saat')
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('informasi-setiap-saat', compact('kontens'));
    }

    public function daftarInformasiPublik()
    {
        $kontens = KontenWeb::informasiPublik()->where('slug', 'like', 'daftar-informasi-publik%')->active()->get();
        return view('daftar-informasi-publik', compact('kontens'));
    }

    public function regulasi()
    {
        $konten = KontenWeb::standarLayanan()->where('slug', 'regulasi')->active()->first();
        return view('regulasi', compact('konten'));
    }

    public function prosedurPermohonan()
    {
        $prosedurPermohonan = Prosedur::byKategori('Prosedur Permohonan Informasi')->aktif()->ordered()->get();
        return view('prosedur-permohonan', compact('prosedurPermohonan'));
    }

    public function prosedurKeberatan()
    {
        $prosedurKeberatan = Prosedur::byKategori('Prosedur Pengajuan Keberatan')->aktif()->ordered()->get();
        return view('prosedur-keberatan', compact('prosedurKeberatan'));
    }

    public function sopPpid()
    {
        $konten = KontenWeb::standarLayanan()->where('slug', 'sop-ppid')->active()->first();
        return view('sop-ppid', compact('konten'));
    }

    public function kanalLayanan()
    {
        $konten = KontenWeb::standarLayanan()->where('slug', 'kanal-layanan')->active()->first();
        return view('kanal-layanan', compact('konten'));
    }

    public function waktuBiayaLayanan()
    {
        $konten = KontenWeb::standarLayanan()->where('slug', 'waktu-biaya-layanan')->active()->first();
        return view('waktu-biaya-layanan', compact('konten'));
    }

    public function maklumatInformasiPublik()
    {
        $konten = KontenWeb::standarLayanan()->where('slug', 'maklumat-informasi-publik')->active()->first();
        return view('maklumat-informasi-publik', compact('konten'));
    }

    public function surveyKepuasanMasyarakat()
    {
        $kontens = KontenWeb::laporan()
            ->where('slug', 'like', 'survey-kepuasan-masyarakat%')
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('survey-kepuasan-masyarakat', compact('kontens'));
    }

    public function statistikLayanan()
    {
        $kontens = KontenWeb::laporan()
            ->where('slug', 'like', 'statistik-layanan-informasi%')
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('statistik-layanan', compact('kontens'));
    }
}
