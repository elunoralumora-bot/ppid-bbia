<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GaleriFoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GaleriFotoController extends Controller
{
    public function index()
    {
        $galeri = GaleriFoto::orderBy('kategori')->orderBy('urutan')->get();
        $stats = [
            'total' => GaleriFoto::count(),
            'active' => GaleriFoto::where('is_active', true)->count(),
            'inactive' => GaleriFoto::where('is_active', false)->count(),
        ];
        
        return view('admin.galeri.index', compact('galeri', 'stats'));
    }

    public function create()
    {
        $categories = GaleriFoto::distinct()->pluck('kategori')->filter();
        return view('admin.galeri.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
            'kategori' => 'required|string|max:100',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'urutan' => 'required|integer|min:0|max:999',
            'is_active' => 'boolean',
        ]);

        try {
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $fileName = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
                
                // Get file info before moving
                $fileSize = $file->getSize();
                $mimeType = $file->getMimeType();
                
                // Create directory if not exists
                $uploadPath = public_path('images/galeri');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                
                // Upload original image
                $file->move($uploadPath, $fileName);
                $filePath = 'images/galeri/' . $fileName;
                
                // Create thumbnail
                $thumbnailPath = public_path('images/galeri/thumbnails');
                if (!file_exists($thumbnailPath)) {
                    mkdir($thumbnailPath, 0755, true);
                }
                
                // Copy original image as thumbnail (basic approach)
                copy($uploadPath . '/' . $fileName, $thumbnailPath . '/' . $fileName);
                
                GaleriFoto::create([
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'kategori' => $request->kategori,
                    'file_path' => $filePath,
                    'file_name' => $fileName,
                    'file_size' => $fileSize,
                    'mime_type' => $mimeType,
                    'urutan' => $request->urutan,
                    'is_active' => $request->boolean('is_active', true),
                ]);
                
                return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil ditambahkan ke galeri');
            }
            
            return back()->with('error', 'Gagal mengupload foto');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $foto = GaleriFoto::findOrFail($id);
        $categories = GaleriFoto::distinct()->pluck('kategori')->filter();
        return view('admin.galeri.edit', compact('foto', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $foto = GaleriFoto::findOrFail($id);
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
            'kategori' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'urutan' => 'required|integer|min:0|max:999',
            'is_active' => 'boolean',
        ]);

        try {
            $updateData = [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'kategori' => $request->kategori,
                'urutan' => $request->urutan,
                'is_active' => $request->boolean('is_active', $foto->is_active),
            ];

            // Update photo if new one uploaded
            if ($request->hasFile('foto')) {
                // Delete old photo and thumbnail
                if ($foto->file_path && file_exists(public_path($foto->file_path))) {
                    unlink(public_path($foto->file_path));
                }
                
                $thumbnailPath = str_replace('/images/galeri/', '/images/galeri/thumbnails/', $foto->file_path);
                if (file_exists(public_path($thumbnailPath))) {
                    unlink(public_path($thumbnailPath));
                }
                
                $file = $request->file('foto');
                $fileName = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
                
                // Get file info before moving
                $fileSize = $file->getSize();
                $mimeType = $file->getMimeType();
                
                $uploadPath = public_path('images/galeri');
                $file->move($uploadPath, $fileName);
                $filePath = 'images/galeri/' . $fileName;
                
                // Create new thumbnail
                copy($uploadPath . '/' . $fileName, public_path('images/galeri/thumbnails/' . $fileName));
                
                $updateData['file_path'] = $filePath;
                $updateData['file_name'] = $fileName;
                $updateData['file_size'] = $fileSize;
                $updateData['mime_type'] = $mimeType;
            }

            $foto->update($updateData);
            
            return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil diperbarui');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $foto = GaleriFoto::findOrFail($id);
        
        try {
            // Delete photo and thumbnail
            if ($foto->file_path && file_exists(public_path($foto->file_path))) {
                unlink(public_path($foto->file_path));
            }
            
            $thumbnailPath = str_replace('/images/galeri/', '/images/galeri/thumbnails/', $foto->file_path);
            if (file_exists(public_path($thumbnailPath))) {
                unlink(public_path($thumbnailPath));
            }
            
            $foto->delete();
            
            return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil dihapus');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function toggleStatus($id)
    {
        $foto = GaleriFoto::findOrFail($id);
        $foto->is_active = !$foto->is_active;
        $foto->save();
        
        $status = $foto->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Foto berhasil {$status}");
    }

    public function bulkAction(Request $request)
    {
        $action = $request->action;
        $selectedIds = $request->selected_ids;
        
        // Convert comma-separated string to array
        if (is_string($selectedIds)) {
            $selectedIds = explode(',', $selectedIds);
        }
        
        if (empty($selectedIds)) {
            return back()->with('error', 'Pilih minimal satu foto');
        }

        try {
            switch ($action) {
                case 'activate':
                    GaleriFoto::whereIn('id', $selectedIds)->update(['is_active' => true]);
                    $message = count($selectedIds) . ' foto berhasil diaktifkan';
                    break;
                    
                case 'deactivate':
                    GaleriFoto::whereIn('id', $selectedIds)->update(['is_active' => false]);
                    $message = count($selectedIds) . ' foto berhasil dinonaktifkan';
                    break;
                    
                case 'delete':
                    foreach ($selectedIds as $id) {
                        $this->destroy($id);
                    }
                    $message = count($selectedIds) . ' foto berhasil dihapus';
                    break;
                    
                default:
                    return back()->with('error', 'Aksi tidak valid');
            }
            
            return back()->with('success', $message);
            
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
