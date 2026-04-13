@extends('admin.layout')

@section('title', 'Pengguna - PPID BBIA')
@section('page-title', 'Admin')

@section('content')
<div class="table-container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; padding: 1.5rem 1.5rem 0;">
        <h2 style="margin: 0; color: #0f2338; font-size: 1.25rem; font-weight: 700;">Daftar Admin</h2>
        <button class="btn btn-primary" onclick="showAddAdminModal()">
            <i class="fas fa-user-shield"></i>
            Tambah Admin
        </button>
    </div>
    
    <!-- Statistics Cards -->
    <div style="padding: 0 1.5rem 1.5rem;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1.5rem;">
            <div style="background: linear-gradient(135deg, #fef3c7 0%, #fed7aa 100%); border-radius: 12px; padding: 1rem; text-align: center;">
                <div style="font-size: 1.5rem; font-weight: 700; color: #92400e;">{{ \App\Models\Admin::count() }}</div>
                <div style="font-size: 0.875rem; color: #78350f;">Total Admin</div>
                <div style="font-size: 0.75rem; color: #92400e; margin-top: 0.25rem;">Terdaftar</div>
            </div>
            <div style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); border-radius: 12px; padding: 1rem; text-align: center;">
                <div style="font-size: 1.5rem; font-weight: 700; color: #1e40af;">{{ \App\Models\Admin::count() }}</div>
                <div style="font-size: 0.875rem; color: #1e3a8a;">Aktif</div>
                <div style="font-size: 0.75rem; color: #1e40af; margin-top: 0.25rem;">Semua admin</div>
            </div>
        </div>
    </div>
    
    <!-- Info Section -->
    <div style="padding: 0 1.5rem 1.5rem;">
        <div style="background: rgba(245, 158, 11, 0.05); border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; border: 1px solid rgba(245, 158, 11, 0.1);">
            <h3 style="margin: 0 0 1rem 0; color: #d97706; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-user-shield"></i>
                Tentang Admin Management
            </h3>
            <p style="margin: 0; color: #374151; line-height: 1.6; font-size: 0.9rem;">
                Semua admin memiliki akses penuh ke sistem PPID BBIA. Admin utama (ID: 1) tidak dapat dihapus untuk menjaga keamanan sistem.
            </p>
        </div>
    </div>
    
    @if(session('success'))
        <div style="background: #d1fae5; border: 1px solid #10b981; color: #065f46; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif
    
    @if(session('error'))
        <div style="background: #fee2e2; border: 1px solid #ef4444; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        </div>
    @endif
    
    <div style="padding: 0 1.5rem 1.5rem;">
        <table>
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
                    $admins = \App\Models\Admin::orderBy('created_at', 'desc')->get();
                @endphp
                
                @forelse($admins as $admin)
                    <tr>
                        <td>
                            <div style="font-weight: 600; color: #374151;">#{{ $admin->id }}</div>
                        </td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <div style="width: 32px; height: 32px; background: linear-gradient(135deg, #fef3c7 0%, #fed7aa 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-user-shield" style="color: #92400e; font-size: 0.875rem;"></i>
                                </div>
                                <div>
                                    <div style="font-weight: 600; color: #374151;">{{ $admin->name }}</div>
                                    @if($admin->id == 1)
                                        <div style="font-size: 0.75rem; color: #d97706;">Admin Utama</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="color: #64748b; font-size: 0.875rem;">{{ $admin->email }}</div>
                        </td>
                        <td>
                            <div style="color: #64748b; font-size: 0.875rem;">{{ $admin->created_at->format('d F Y') }}</div>
                        </td>
                        <td>
                            <span class="badge badge-success">Aktif</span>
                        </td>
                        <td>
                            @if($admins->count() > 1)
                                <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                                    <button class="btn btn-sm btn-info" onclick="editAdmin({{ $admin->id }})" style="display: inline-flex; align-items: center; gap: 0.35rem;">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                    @if($admin->id !== 1)
                                        <button class="btn btn-sm btn-danger" onclick="deleteAdmin({{ $admin->id }}, '{{ $admin->name }}')" style="display: inline-flex; align-items: center; gap: 0.35rem;">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    @endif
                                </div>
                            @else
                                <span style="color: #64748b; font-size: 0.875rem;">Admin Utama</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 2rem; color: #64748b;">
                            <i class="fas fa-user-shield" style="font-size: 2rem; margin-bottom: 0.5rem; opacity: 0.3;"></i>
                            <div style="margin-bottom: 1rem;">Belum ada admin</div>
                            <button class="btn btn-primary" onclick="showAddAdminModal()">
                                <i class="fas fa-user-shield"></i>
                                Tambah Admin Pertama
                            </button>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Admin -->
<div id="addAdminModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 2rem; border-radius: 12px; width: 90%; max-width: 500px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <h3 style="margin: 0; color: #0f2338; font-size: 1.25rem; font-weight: 700; display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-user-shield" style="color: #d97706;"></i>
                Tambah Admin Baru
            </h3>
            <button type="button" onclick="hideAddAdminModal()" style="background: none; border: none; font-size: 1.5rem; color: #64748b; cursor: pointer; padding: 0.25rem;">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div style="display: grid; gap: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Nama Lengkap *</label>
                    <input type="text" name="name" class="form-control" required style="padding: 0.75rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; width: 100%;">
                </div>
                
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Email *</label>
                    <input type="email" name="email" class="form-control" required style="padding: 0.75rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; width: 100%;">
                </div>
                
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Password *</label>
                    <input type="password" name="password" class="form-control" required style="padding: 0.75rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; width: 100%;">
                    <small style="color: #64748b; font-size: 0.75rem; display: block; margin-top: 0.25rem;">Minimal 6 karakter</small>
                </div>
                
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Konfirmasi Password *</label>
                    <input type="password" name="password_confirmation" class="form-control" required style="padding: 0.75rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; width: 100%;">
                </div>
                
                <div style="display: flex; gap: 1rem; margin-top: 1rem; justify-content: flex-end;">
                    <button type="button" class="btn btn-outline" onclick="hideAddAdminModal()" style="padding: 0.75rem 1.5rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem;">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary" style="padding: 0.75rem 1.5rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
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
