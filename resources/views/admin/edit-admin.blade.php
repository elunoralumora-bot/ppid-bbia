@extends('admin.layout')

@section('title', 'Edit Admin - PPID BBIA')
@section('page-title', 'Edit Admin')

@section('content')
<div class="table-container">
    <div style="padding: 1.5rem;">
        <div style="margin-bottom: 1.5rem;">
            <a href="{{ route('admin.users') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; color: #64748b; text-decoration: none;">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Daftar Admin
            </a>
        </div>

        <div style="background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                <h2 style="margin: 0; color: #0f2338; font-size: 1.5rem; font-weight: 700; display: flex; align-items: center; gap: 0.75rem;">
                    <i class="fas fa-user-shield" style="color: #d97706;"></i>
                    Edit Admin
                </h2>
                @if($admin->id == 1)
                    <span class="badge badge-warning">Admin Utama</span>
                @endif
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

            @if($errors->any())
                <div style="background: #fee2e2; border: 1px solid #ef4444; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                        <i class="fas fa-exclamation-circle"></i>
                        <strong>Terdapat kesalahan:</strong>
                    </div>
                    <ul style="margin: 0; padding-left: 1.5rem;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.update', $admin->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div style="display: grid; gap: 1.5rem; max-width: 600px;">
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">ID Admin</label>
                        <input type="text" value="#{{ $admin->id }}" disabled style="padding: 0.75rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; width: 100%; background: #f1f5f9; color: #64748b;">
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Nama Lengkap *</label>
                        <input type="text" name="name" value="{{ old('name', $admin->name) }}" class="form-control" required style="padding: 0.75rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; width: 100%;">
                        @if($errors->has('name'))
                            <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Email *</label>
                        <input type="email" name="email" value="{{ old('email', $admin->email) }}" class="form-control" required style="padding: 0.75rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; width: 100%;">
                        @if($errors->has('email'))
                            <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Password Baru</label>
                        <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password" style="padding: 0.75rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; width: 100%;">
                        <small style="color: #64748b; font-size: 0.75rem; display: block; margin-top: 0.25rem;">Minimal 6 karakter. Kosongkan jika tidak ingin mengubah password.</small>
                        @if($errors->has('password'))
                            <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password baru" style="padding: 0.75rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; width: 100%;">
                        @if($errors->has('password_confirmation'))
                            <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>

                    <div style="display: flex; gap: 1rem; margin-top: 1rem; padding-top: 1.5rem; border-top: 1px solid #e2e8f0; align-items: center;">
                        <a href="{{ route('admin.users') }}" class="btn btn-outline" style="padding: 0.75rem 1.5rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; text-decoration: none; color: #374151; min-width: 120px; height: 44px; display: inline-flex; align-items: center; justify-content: center; box-sizing: border-box; margin-top: -2px;">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-primary" style="padding: 0.75rem 1.5rem; display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; min-width: 120px; height: 44px; box-sizing: border-box;">
                            <i class="fas fa-save"></i>
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div style="margin-top: 2rem; background: rgba(245, 158, 11, 0.05); border-radius: 12px; padding: 1.5rem; border: 1px solid rgba(245, 158, 11, 0.1);">
            <h3 style="margin: 0 0 0.75rem 0; color: #d97706; font-size: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-info-circle"></i>
                Informasi
            </h3>
            <ul style="margin: 0; padding-left: 1.5rem; color: #374151; font-size: 0.875rem; line-height: 1.6;">
                <li>Field password bersifat opsional. Kosongkan jika tidak ingin mengubah password admin.</li>
                <li>Jika mengubah password, pastikan untuk memasukkan password yang sama pada field konfirmasi.</li>
                <li>Email harus unik dan tidak boleh sama dengan admin lain.</li>
            </ul>
        </div>
    </div>
</div>
@endsection
