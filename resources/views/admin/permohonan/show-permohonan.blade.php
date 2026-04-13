@extends('admin.layout')

@section('title', 'Detail Permohonan - PPID BBIA')
@section('page-title', 'Detail Permohonan')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2 style="margin: 0;">Detail Permohonan #{{ $permohonan->id }}</h2>
        <a href="{{ route('admin.manage-permohonan') }}" class="btn btn-outline"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
    
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif
    
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
        <div>
            <h3 style="margin-bottom: 1rem;">Informasi Pemohon</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500;">Nama Lengkap</td>
                    <td style="padding: 0.5rem 0;">{{ $permohonan->nama_pemohon }}</td>
                </tr>
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500;">Email</td>
                    <td style="padding: 0.5rem 0;">{{ $permohonan->email }}</td>
                </tr>
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500;">Telepon</td>
                    <td style="padding: 0.5rem 0;">{{ $permohonan->telepon }}</td>
                </tr>
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500; vertical-align: top;">Alamat</td>
                    <td style="padding: 0.5rem 0;">{{ $permohonan->alamat }}</td>
                </tr>
            </table>
        </div>
        
        <div>
            <h3 style="margin-bottom: 1rem;">Informasi Permohonan</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500;">Tanggal Permohonan</td>
                    <td style="padding: 0.5rem 0;">{{ $permohonan->tanggal_permohonan->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500;">Status</td>
                    <td style="padding: 0.5rem 0;">
                        @switch($permohonan->status)
                            @case('pending')
                                <span class="btn btn-warning">Pending</span>
                                @break
                            @case('proses')
                                <span class="btn btn-info">Diproses</span>
                                @break
                            @case('selesai')
                                <span class="btn btn-success">Selesai</span>
                                @break
                            @case('ditolak')
                                <span class="btn btn-danger">Ditolak</span>
                                @break
                            @default
                                <span class="btn btn-outline">{{ $permohonan->status }}</span>
                        @endswitch
                    </td>
                </tr>
                @if($permohonan->tanggal_proses)
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500;">Tanggal Proses</td>
                    <td style="padding: 0.5rem 0;">{{ $permohonan->tanggal_proses->format('d/m/Y') }}</td>
                </tr>
                @endif
                @if($permohonan->tanggal_selesai)
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500;">Tanggal Selesai</td>
                    <td style="padding: 0.5rem 0;">{{ $permohonan->tanggal_selesai->format('d/m/Y') }}</td>
                </tr>
                @endif
            </table>
        </div>
    </div>
    
    <div style="margin-top: 2rem;">
        <h3 style="margin-bottom: 1rem;">Rincian Permohonan</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 0.5rem 0; font-weight: 500; vertical-align: top; width: 150px;">Informasi Diminta</td>
                <td style="padding: 0.5rem 0;">{{ $permohonan->informasi_diminta }}</td>
            </tr>
            <tr>
                <td style="padding: 0.5rem 0; font-weight: 500; vertical-align: top;">Tujuan</td>
                <td style="padding: 0.5rem 0;">{{ $permohonan->tujuan }}</td>
            </tr>
            <tr>
                <td style="padding: 0.5rem 0; font-weight: 500; vertical-align: top;">Cara Perolehan</td>
                <td style="padding: 0.5rem 0;">{{ $permohonan->cara_perolehan }}</td>
            </tr>
            @if($permohonan->catatan)
            <tr>
                <td style="padding: 0.5rem 0; font-weight: 500; vertical-align: top;">Catatan</td>
                <td style="padding: 0.5rem 0;">{{ $permohonan->catatan }}</td>
            </tr>
            @endif
        </table>
    </div>
    
    <div style="margin-top: 2rem;">
        <h3 style="margin-bottom: 1rem;">Update Status</h3>
        <form action="{{ route('admin.update-permohonan-status', $permohonan->id) }}" method="POST">
            @csrf
            <div style="display: grid; gap: 1rem; max-width: 500px;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="pending" {{ $permohonan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="proses" {{ $permohonan->status == 'proses' ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai" {{ $permohonan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="ditolak" {{ $permohonan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
                
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Catatan</label>
                    <textarea name="catatan" class="form-control" rows="4" placeholder="Tambahkan catatan jika diperlukan">{{ $permohonan->catatan }}</textarea>
                </div>
                
                <div style="display: flex; gap: 1rem;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Status</button>
                    <form action="{{ route('admin.destroy-permohonan', $permohonan->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus permohonan ini?')"><i class="fas fa-trash"></i> Hapus</button>
                    </form>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
