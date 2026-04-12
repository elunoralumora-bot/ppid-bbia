<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;
use App\Models\Permohonan;
use App\Models\Keberatan;

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
        $users = User::paginate(10);
        return view('admin.users', compact('users'));
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

    // Management for regular users
    public function manageUsers()
    {
        $users = User::paginate(10);
        return view('admin.manage-users', compact('users'));
    }

    public function createUser()
    {
        return view('admin.create-user');
    }

    public function storeRegularUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.manage-users')->with('success', 'User berhasil ditambahkan');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit-user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        
        $user->save();

        return redirect()->route('admin.manage-users')->with('success', 'User berhasil diperbarui');
    }

    public function destroyRegularUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.manage-users')->with('success', 'User berhasil dihapus');
    }

    // Management for Permohonan
    public function managePermohonan()
    {
        $permohonan = Permohonan::with('user')->paginate(10);
        return view('admin.manage-permohonan', compact('permohonan'));
    }

    public function showPermohonan($id)
    {
        $permohonan = Permohonan::with('user')->findOrFail($id);
        return view('admin.show-permohonan', compact('permohonan'));
    }

    public function updatePermohonanStatus(Request $request, $id)
    {
        $permohonan = Permohonan::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,proses,selesai,ditolak',
            'catatan' => 'nullable|string'
        ]);

        $permohonan->status = $request->status;
        $permohonan->catatan = $request->catatan;
        
        if ($request->status == 'proses') {
            $permohonan->tanggal_proses = now();
        } elseif ($request->status == 'selesai' || $request->status == 'ditolak') {
            $permohonan->tanggal_selesai = now();
        }
        
        $permohonan->save();

        return redirect()->route('admin.manage-permohonan')->with('success', 'Status permohonan berhasil diperbarui');
    }

    public function destroyPermohonan($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->delete();
        return redirect()->route('admin.manage-permohonan')->with('success', 'Permohonan berhasil dihapus');
    }

    // Management for Keberatan
    public function manageKeberatan()
    {
        $keberatan = Keberatan::with(['user', 'permohonan'])->paginate(10);
        return view('admin.manage-keberatan', compact('keberatan'));
    }

    public function showKeberatan($id)
    {
        $keberatan = Keberatan::with(['user', 'permohonan'])->findOrFail($id);
        return view('admin.show-keberatan', compact('keberatan'));
    }

    public function updateKeberatanStatus(Request $request, $id)
    {
        $keberatan = Keberatan::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,proses,selesai,ditolak',
            'catatan' => 'nullable|string'
        ]);

        $keberatan->status = $request->status;
        $keberatan->catatan = $request->catatan;
        
        if ($request->status == 'proses') {
            $keberatan->tanggal_proses = now();
        } elseif ($request->status == 'selesai' || $request->status == 'ditolak') {
            $keberatan->tanggal_selesai = now();
        }
        
        $keberatan->save();

        return redirect()->route('admin.manage-keberatan')->with('success', 'Status keberatan berhasil diperbarui');
    }

    public function destroyKeberatan($id)
    {
        $keberatan = Keberatan::findOrFail($id);
        $keberatan->delete();
        return redirect()->route('admin.manage-keberatan')->with('success', 'Keberatan berhasil dihapus');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function reports()
    {
        return view('admin.reports');
    }
}
