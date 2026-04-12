@extends('admin.layout')

@section('title', 'Kelola User - PPID BBIA')
@section('page-title', 'Kelola User')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2 style="margin: 0;">Daftar User</h2>
        <a href="{{ route('admin.create-user') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah User</a>
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
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    <td>
                        <span class="btn btn-success">Aktif</span>
                    </td>
                    <td>
                        <a href="{{ route('admin.edit-user', $user->id) }}" class="btn btn-warning" style="margin-right: 0.5rem;"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.destroy-user', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 2rem; color: #666;">
                        Belum ada user. Silakan tambahkan user pertama.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-top: 2rem; padding: 1rem; background: #f8f9fa; border-radius: 5px;">
        <h4 style="margin: 0 0 0.5rem 0;">Total User: {{ $users->count() }}</h4>
        <p style="margin: 0; color: #666; font-size: 0.9rem;">
            User dapat mengajukan permohonan informasi dan keberatan melalui website.
        </p>
    </div>
</div>
@endsection
