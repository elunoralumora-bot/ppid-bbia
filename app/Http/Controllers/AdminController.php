<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function berita()
    {
        return view('admin.berita');
    }

    public function permohonan()
    {
        return view('admin.permohonan');
    }

    public function keberatan()
    {
        return view('admin.keberatan');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users')->with('success', 'Admin berhasil ditambahkan');
    }

    public function destroyUser($id)
    {
        $admin = Admin::findOrFail($id);
        
        // Cegah hapus admin utama (ID: 1)
        if ($admin->id == 1) {
            return redirect()->route('admin.users')->with('error', 'Admin utama tidak dapat dihapus');
        }

        // Cegah hapus jika hanya tersisa 1 admin
        if (Admin::count() <= 1) {
            return redirect()->route('admin.users')->with('error', 'Tidak dapat menghapus admin terakhir');
        }

        $admin->delete();
        return redirect()->route('admin.users')->with('success', 'Admin berhasil dihapus');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function reports()
    {
        return view('admin.reports');
    }

    public function profil()
    {
        return view('admin.profil');
    }

    public function informasiPublik()
    {
        return view('admin.informasi-publik');
    }

    public function standarLayanan()
    {
        return view('admin.standar-layanan');
    }

    public function laporanPublik()
    {
        return view('admin.laporan-publik');
    }
}