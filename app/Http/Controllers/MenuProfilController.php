<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuProfil;

class MenuProfilController extends Controller
{
    public function index()
    {
        $menus = MenuProfil::orderBy('urutan', 'asc')->get();
        return view('admin.menu-profil', compact('menus'));
    }

    public function create()
    {
        return view('admin.menu-profil-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'urutan' => 'required|integer|min:0',
        ]);

        MenuProfil::create($request->all());
        return redirect()->route('admin.menu-profil')->with('success', 'Menu profil berhasil ditambahkan');
    }

    public function edit($id)
    {
        $menu = MenuProfil::findOrFail($id);
        return view('admin.menu-profil-edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'urutan' => 'required|integer|min:0',
        ]);

        $menu = MenuProfil::findOrFail($id);
        $menu->update($request->all());
        return redirect()->route('admin.menu-profil')->with('success', 'Menu profil berhasil diperbarui');
    }

    public function destroy($id)
    {
        $menu = MenuProfil::findOrFail($id);
        $menu->delete();
        return redirect()->route('admin.menu-profil')->with('success', 'Menu profil berhasil dihapus');
    }

    public function toggleStatus($id)
    {
        $menu = MenuProfil::findOrFail($id);
        $menu->is_active = !$menu->is_active;
        $menu->save();
        
        $status = $menu->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('admin.menu-profil')->with('success', "Menu profil berhasil {$status}");
    }

    public function updateOrder(Request $request)
    {
        $orders = $request->input('orders', []);
        
        foreach ($orders as $order) {
            MenuProfil::where('id', $order['id'])->update(['urutan' => $order['urutan']]);
        }
        
        return response()->json(['success' => true]);
    }

    public function getNextOrder()
    {
        $maxOrder = MenuProfil::max('urutan');
        return response()->json(['next_order' => $maxOrder + 1]);
    }
}
