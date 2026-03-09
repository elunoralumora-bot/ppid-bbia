@extends('admin.layout')

@section('title', 'Pengguna - PPID BBIA')
@section('page-title', 'Pengguna')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2 style="margin: 0;">Daftar Admin</h2>
        <button class="btn btn-primary" onclick="showAddAdminModal()"><i class="fas fa-plus"></i> Tambah Admin</button>
    </div>
    
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
            {{ session('error') }}
        </div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Dibuat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $admins = App\Models\Admin::orderBy('created_at', 'desc')->get();
            @endphp
            
            @forelse($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->created_at->format('d/m/Y') }}</td>
                    <td>
                        <span class="btn btn-success">Aktif</span>
                    </td>
                    <td>
                        @if($admins->count() > 1)
                            <button class="btn btn-warning" style="margin-right: 0.5rem;" onclick="editAdmin({{ $admin->id }})"><i class="fas fa-edit"></i> Edit</button>
                            @if($admin->id !== 1)
                                <button class="btn btn-danger" onclick="deleteAdmin({{ $admin->id }}, '{{ $admin->name }}')"><i class="fas fa-trash"></i> Hapus</button>
                            @endif
                        @else
                            <span style="color: #666; font-size: 0.9rem;">Admin utama</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 2rem; color: #666;">
                        Belum ada admin. Silakan tambahkan admin pertama.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-top: 2rem; padding: 1rem; background: #f8f9fa; border-radius: 5px;">
        <h4 style="margin: 0 0 0.5rem 0;">Total Admin: {{ $admins->count() }}</h4>
        <p style="margin: 0; color: #666; font-size: 0.9rem;">
            Semua admin memiliki akses penuh ke sistem. Admin utama (ID: 1) tidak dapat dihapus.
        </p>
    </div>
</div>

<!-- Modal Tambah Admin -->
<div id="addAdminModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 2rem; border-radius: 8px; width: 90%; max-width: 500px;">
        <h3 style="margin: 0 0 1.5rem 0;">Tambah Admin Baru</h3>
        
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div style="display: grid; gap: 1rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Nama Lengkap *</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Email *</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Password *</label>
                    <input type="password" name="password" class="form-control" required>
                    <small style="color: #666;">Minimal 6 karakter</small>
                </div>
                
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Konfirmasi Password *</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                
                <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-outline" onclick="hideAddAdminModal()">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function showAddAdminModal() {
    document.getElementById('addAdminModal').style.display = 'block';
}

function hideAddAdminModal() {
    document.getElementById('addAdminModal').style.display = 'none';
}

function editAdmin(id) {
    // TODO: Implement edit admin functionality
    alert('Fitur edit admin akan segera tersedia');
}

function deleteAdmin(id, name) {
    if (confirm('Apakah Anda yakin ingin menghapus admin "' + name + '"?')) {
        // Create form for delete
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route('admin.users.destroy', ':id') }}'.replace(':id', id);
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = csrfToken;
        
        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';
        
        form.appendChild(csrfInput);
        form.appendChild(methodInput);
        document.body.appendChild(form);
        form.submit();
    }
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('addAdminModal');
    if (event.target == modal) {
        hideAddAdminModal();
    }
}
</script>
@endsection