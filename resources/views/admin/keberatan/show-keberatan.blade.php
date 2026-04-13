@extends('admin.layout')

@section('title', 'Detail Keberatan - PPID BBIA')
@section('page-title', 'Detail Keberatan')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2 style="margin: 0;">Detail Keberatan #{{ $keberatan->id }}</h2>
        <a href="{{ route('admin.manage-keberatan') }}" class="btn btn-outline"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                    <td style="padding: 0.5rem 0;">{{ $keberatan->nama_pemohon }}</td>
                </tr>
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500;">Email</td>
                    <td style="padding: 0.5rem 0;">{{ $keberatan->email }}</td>
                </tr>
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500;">Telepon</td>
                    <td style="padding: 0.5rem 0;">{{ $keberatan->telepon }}</td>
                </tr>
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500; vertical-align: top;">Alamat</td>
                    <td style="padding: 0.5rem 0;">{{ $keberatan->alamat }}</td>
                </tr>
            </table>
        </div>
        
        <div>
            <h3 style="margin-bottom: 1rem;">Informasi Keberatan</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500;">Tanggal Keberatan</td>
                    <td style="padding: 0.5rem 0;">{{ $keberatan->tanggal_keberatan->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500;">Status</td>
                    <td style="padding: 0.5rem 0;">
                        @switch($keberatan->status)
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
                                <span class="btn btn-outline">{{ $keberatan->status }}</span>
                        @endswitch
                    </td>
                </tr>
                @if($keberatan->tanggal_proses)
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500;">Tanggal Proses</td>
                    <td style="padding: 0.5rem 0;">{{ $keberatan->tanggal_proses->format('d/m/Y') }}</td>
                </tr>
                @endif
                @if($keberatan->tanggal_selesai)
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500;">Tanggal Selesai</td>
                    <td style="padding: 0.5rem 0;">{{ $keberatan->tanggal_selesai->format('d/m/Y') }}</td>
                </tr>
                @endif
                @if($keberatan->permohonan)
                <tr>
                    <td style="padding: 0.5rem 0; font-weight: 500;">ID Permohonan</td>
                    <td style="padding: 0.5rem 0;">
                        <a href="{{ route('admin.show-permohonan', $keberatan->permohonan->id) }}" class="btn btn-outline btn-sm">
                            #{{ $keberatan->permohonan->id }}
                        </a>
                    </td>
                </tr>
                @endif
            </table>
        </div>
    </div>
    
    <div style="margin-top: 2rem;">
        <h3 style="margin-bottom: 1rem;">Rincian Keberatan</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 0.5rem 0; font-weight: 500; vertical-align: top; width: 150px;">Alasan Keberatan</td>
                <td style="padding: 0.5rem 0;">{{ $keberatan->alasan_keberatan }}</td>
            </tr>
            @if($keberatan->catatan)
            <tr>
                <td style="padding: 0.5rem 0; font-weight: 500; vertical-align: top;">Catatan</td>
                <td style="padding: 0.5rem 0;">{{ $keberatan->catatan }}</td>
            </tr>
            @endif
        </table>
    </div>
    
    <div style="margin-top: 2rem;">
        <h3 style="margin-bottom: 1rem;">Update Status</h3>
        <form action="{{ route('admin.update-keberatan-status', $keberatan->id) }}" method="POST">
            @csrf
            <div style="display: grid; gap: 1rem; max-width: 500px;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="pending" {{ $keberatan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="proses" {{ $keberatan->status == 'proses' ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai" {{ $keberatan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="ditolak" {{ $keberatan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
                
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Catatan</label>
                    <textarea name="catatan" class="form-control" rows="4" placeholder="Tambahkan catatan jika diperlukan">{{ $keberatan->catatan }}</textarea>
                </div>
                
                <div style="display: flex; gap: 1rem;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Status</button>
                    <form action="{{ route('admin.destroy-keberatan', $keberatan->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus keberatan ini?')"><i class="fas fa-trash"></i> Hapus</button>
                    </form>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
