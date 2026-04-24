@extends('admin.layout')

@section('title', 'Detail Keberatan - PPID BBIA')
@section('page-title', 'Detail Pengajuan Keberatan')

@section('content')
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
<div class="form-card">
    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
        <div style="width: 48px; height: 48px; background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.1)); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
            <i class="fas fa-exclamation-triangle" style="color: #ef4444; font-size: 1.25rem;"></i>
        </div>
        <div>
            <h2 style="margin: 0; color: #0f2338; font-size: 1.5rem; font-weight: 700;">Detail Pengajuan Keberatan</h2>
            <p style="margin: 0.25rem 0 0 0; color: #64748b; font-size: 0.875rem;">Informasi lengkap pengajuan keberatan #{{ $keberatan->id ?? '' }}</p>
        </div>
    </div>

    <!-- Status Badge -->
    <div style="margin-bottom: 2rem;">
        @if(isset($keberatan) && $keberatan->status == 'baru')
            <span class="badge badge-warning" style="font-size: 1rem; padding: 0.5rem 1rem;">Baru</span>
        @elseif(isset($keberatan) && $keberatan->status == 'diproses')
            <span class="badge badge-info" style="font-size: 1rem; padding: 0.5rem 1rem;">Sedang Diproses</span>
        @elseif(isset($keberatan) && $keberatan->status == 'diterima')
            <span class="badge badge-success" style="font-size: 1rem; padding: 0.5rem 1rem;">Diterima</span>
        @elseif(isset($keberatan) && $keberatan->status == 'ditolak')
            <span class="badge badge-danger" style="font-size: 1rem; padding: 0.5rem 1rem;">Ditolak</span>
        @endif
    </div>

    <!-- Informasi Pemohon -->
    <div style="background: rgba(26, 82, 130, 0.05); border-radius: 12px; padding: 1.5rem; margin-bottom: 2rem; border: 1px solid rgba(26, 82, 130, 0.1);">
        <h3 style="margin: 0 0 1.5rem 0; color: #1a3a5f; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-user"></i>
            Informasi Pemohon
        </h3>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
            <div>
                <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Nama Lengkap</label>
                <div style="color: #1f2937; font-size: 1rem;">{{ $keberatan->nama_pemohon ?? '-' }}</div>
            </div>
            <div>
                <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Email</label>
                <div style="color: #1f2937; font-size: 1rem;">{{ $keberatan->email ?? '-' }}</div>
            </div>
            <div>
                <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">No. Telepon</label>
                <div style="color: #1f2937; font-size: 1rem;">{{ $keberatan->telepon ?? '-' }}</div>
            </div>
            <div>
                <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Alamat</label>
                <div style="color: #1f2937; font-size: 1rem;">{{ $keberatan->alamat ?? '-' }}</div>
            </div>
            <div>
                <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Usia</label>
                <div style="color: #1f2937; font-size: 1rem;">{{ $keberatan->usia ? $keberatan->usia . ' Tahun' : '-' }}</div>
            </div>
            <div>
                <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Pendidikan Terakhir</label>
                <div style="color: #1f2937; font-size: 1rem;">{{ $keberatan->pendidikan_terakhir ?? '-' }}</div>
            </div>
            <div>
                <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Pekerjaan</label>
                <div style="color: #1f2937; font-size: 1rem;">{{ $keberatan->pekerjaan ?? '-' }}</div>
            </div>
        </div>
    </div>

    <!-- Informasi Keberatan -->
    <div style="background: rgba(16, 185, 129, 0.05); border-radius: 12px; padding: 1.5rem; margin-bottom: 2rem; border: 1px solid rgba(16, 185, 129, 0.1);">
        <h3 style="margin: 0 0 1.5rem 0; color: #059669; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-info-circle"></i>
            Informasi Keberatan
        </h3>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
            <div>
                <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Tanggal Keberatan</label>
                <div style="color: #1f2937; font-size: 1rem;">
                    {{ isset($keberatan->tanggal_keberatan) ? $keberatan->tanggal_keberatan->format('d F Y') : '-' }}
                </div>
            </div>
            <div>
                <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">No. Register Keberatan</label>
                <div style="color: #1f2937; font-size: 1rem;">{{ $keberatan->no_register ?? '-' }}</div>
            </div>
        </div>
        
        <div style="margin-top: 1.5rem;">
            <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Alasan Keberatan</label>
            <div style="background: white; border-radius: 8px; padding: 1rem; border: 1px solid #e2e8f0; color: #1f2937; line-height: 1.6;">
                {{ $keberatan->alasan_keberatan ?? '-' }}
            </div>
        </div>

        <div style="margin-top: 1.5rem;">
            <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Uraian Keberatan</label>
            <div style="background: white; border-radius: 8px; padding: 1rem; border: 1px solid #e2e8f0; color: #1f2937; line-height: 1.6;">
                {{ $keberatan->uraian_keberatan ?? '-' }}
            </div>
        </div>
    </div>

    <!-- Informasi Permohonan Terkait -->
    @if($keberatan->permohonan)
    <div style="background: rgba(245, 158, 11, 0.05); border-radius: 12px; padding: 1.5rem; margin-bottom: 2rem; border: 1px solid rgba(245, 158, 11, 0.1);">
        <h3 style="margin: 0 0 1.5rem 0; color: #d97706; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-link"></i>
            Permohonan Terkait
        </h3>
        
        <div style="background: white; border-radius: 8px; padding: 1rem; border: 1px solid #e2e8f0;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                <div>
                    <div style="font-weight: 600; color: #374151;">Permohonan #{{ $keberatan->permohonan->id }}</div>
                    <div style="font-size: 0.875rem; color: #64748b;">{{ $keberatan->permohonan->tanggal_permohonan->format('d F Y') }}</div>
                </div>
                <a href="{{ route('admin.permohonan.show', $keberatan->permohonan->id) }}" class="btn btn-sm btn-info">
                    <i class="fas fa-eye"></i>
                    Lihat Detail
                </a>
            </div>
            <div style="color: #1f2937; font-size: 0.875rem; line-height: 1.4;">
                <strong>Informasi Diminta:</strong> {{ Str::limit($keberatan->permohonan->informasi_diminta, 150) }}
            </div>
        </div>
    </div>
    @endif

    <!-- Dokumen Lampiran -->
    <div style="background: rgba(139, 92, 246, 0.05); border-radius: 12px; padding: 1.5rem; margin-bottom: 2rem; border: 1px solid rgba(139, 92, 246, 0.1);">
        <h3 style="margin: 0 0 1.5rem 0; color: #7c3aed; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-paperclip"></i>
            Dokumen Lampiran
        </h3>
        
        @if($keberatan->file_path)
            <div style="background: white; border-radius: 8px; padding: 1rem; border: 1px solid #e2e8f0;">
                <a href="{{ asset($keberatan->file_path) }}" target="_blank" class="btn btn-info" style="display: inline-flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-download"></i>
                    Download Dokumen Keberatan
                </a>
            </div>
        @else
            <div style="background: white; border-radius: 8px; padding: 1rem; border: 1px solid #e2e8f0; color: #64748b;">
                Tidak ada dokumen lampiran
            </div>
        @endif
    </div>

    <!-- Status & Timeline -->
    <div style="background: rgba(245, 158, 11, 0.05); border-radius: 12px; padding: 1.5rem; margin-bottom: 2rem; border: 1px solid rgba(245, 158, 11, 0.1);">
        <h3 style="margin: 0 0 1.5rem 0; color: #d97706; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-history"></i>
            Status & Timeline
        </h3>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
            <div>
                <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Status Saat Ini</label>
                <div style="color: #1f2937; font-size: 1rem; font-weight: 600;">
                    {{ ucfirst($keberatan->status ?? '-') }}
                </div>
            </div>
            @if($keberatan->tanggal_proses)
            <div>
                <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Tanggal Proses</label>
                <div style="color: #1f2937; font-size: 1rem;">
                    {{ $keberatan->tanggal_proses->format('d F Y H:i') }}
                </div>
            </div>
            @endif
            @if($keberatan->tanggal_selesai)
            <div>
                <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Tanggal Selesai</label>
                <div style="color: #1f2937; font-size: 1rem;">
                    {{ $keberatan->tanggal_selesai->format('d F Y H:i') }}
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Form Balasan Email -->
    <div style="background: rgba(239, 68, 68, 0.05); border-radius: 12px; padding: 1.5rem; margin-bottom: 2rem; border: 1px solid rgba(239, 68, 68, 0.1);">
        <h3 style="margin: 0 0 1.5rem 0; color: #ef4444; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-envelope"></i>
            Balas Keberatan via Email
        </h3>
        
        <form action="{{ route('admin.keberatan.reply', $keberatan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: grid; gap: 1.5rem;">
                <div>
                    <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Email Tujuan</label>
                    <div style="background: white; border-radius: 8px; padding: 1rem; border: 1px solid #e2e8f0; color: #64748b;">
                        <i class="fas fa-user" style="margin-right: 0.5rem;"></i>
                        {{ $keberatan->email }}
                    </div>
                </div>
                
                <div>
                    <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Subjek Email</label>
                    <input type="text" name="subject" value="Balasan Pengajuan Keberatan #{{ $keberatan->id }}" style="width: 100%; padding: 0.75rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem;" required>
                </div>
                
                <div>
                    <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Isi Balasan</label>
                    <textarea name="message" rows="6" style="width: 100%; padding: 0.75rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; resize: vertical;" placeholder="Tulis balasan Anda di sini..." required></textarea>
                </div>
                
                <div>
                    <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Lampiran (Opsional)</label>
                    <input type="file" name="attachment" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" style="width: 100%; padding: 0.75rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem;">
                    <div style="font-size: 0.75rem; color: #64748b; margin-top: 0.25rem;">Format: PDF, DOC, DOCX, JPG, JPEG, PNG (Max: 5MB)</div>
                </div>
                
                <div style="display: flex; gap: 1rem;">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i>
                        Kirim Email
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="clearReplyForm()">
                        <i class="fas fa-eraser"></i>
                        Reset
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Action Buttons -->
    <div style="display: flex; gap: 1rem; justify-content: space-between; padding-top: 2rem; border-top: 1px solid #e2e8f0;">
        <a href="{{ route('admin.keberatan') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
        
        @if($keberatan->status == 'baru')
            <form action="{{ route('admin.keberatan.updateStatus', $keberatan->id) }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="status" value="diproses">
                <button type="submit" class="btn btn-warning" onclick="return confirm('Proses keberatan ini?')">
                    <i class="fas fa-play"></i>
                    Proses Keberatan
                </button>
            </form>
        @elseif($keberatan->status == 'diproses')
            <div style="display: flex; gap: 1rem;">
                <form action="{{ route('admin.keberatan.updateStatus', $keberatan->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <input type="hidden" name="status" value="diterima">
                    <input type="hidden" name="message" id="acceptMessage" value="">
                    <input type="hidden" name="subject" id="acceptSubject" value="Pengajuan Keberatan Diterima - #{{ $keberatan->id }}">
                    <button type="submit" class="btn btn-success" onclick="showAcceptDialog(); return false;">
                        <i class="fas fa-check"></i>
                        Terima
                    </button>
                </form>
                <form action="{{ route('admin.keberatan.updateStatus', $keberatan->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <input type="hidden" name="status" value="ditolak">
                    <input type="hidden" name="message" id="rejectMessage" value="">
                    <input type="hidden" name="subject" id="rejectSubject" value="Pengajuan Keberatan Ditolak - #{{ $keberatan->id }}">
                    <button type="submit" class="btn btn-danger" onclick="showRejectDialog(); return false;">
                        <i class="fas fa-times"></i>
                        Tolak
                    </button>
                </form>
            </div>
        @endif
    </div>

    <!-- Modal untuk Dialog Accept/Reject -->
    <div id="dialogModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
        <div style="background: white; border-radius: 12px; padding: 2rem; max-width: 500px; width: 90%; max-height: 80vh; overflow-y: auto;">
            <h3 id="dialogTitle" style="margin: 0 0 1.5rem 0; color: #0f2338;"></h3>
            <div style="margin-bottom: 1.5rem;">
                <label style="font-weight: 600; color: #374151; font-size: 0.875rem; margin-bottom: 0.5rem;">Alasan/Pesan</label>
                <textarea id="dialogMessage" rows="4" style="width: 100%; padding: 0.75rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; resize: vertical;" placeholder="Tulis alasan atau pesan Anda..."></textarea>
            </div>
            <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                <button type="button" class="btn btn-secondary" onclick="closeDialog()">Batal</button>
                <button id="dialogSubmit" type="button" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </div>

    <script>
    function clearReplyForm() {
        document.querySelector('textarea[name="message"]').value = '';
        document.querySelector('input[name="attachment"]').value = '';
    }

    function showAcceptDialog() {
        document.getElementById('dialogTitle').textContent = 'Terima Keberatan';
        document.getElementById('dialogMessage').placeholder = 'Tulis pesan pemberitahuan penerimaan keberatan...';
        document.getElementById('dialogModal').style.display = 'flex';
        document.getElementById('dialogSubmit').onclick = function() {
            const message = document.getElementById('dialogMessage').value;
            document.getElementById('acceptMessage').value = message;
            document.getElementById('acceptSubject').value = 'Pengajuan Keberatan Diterima - #' + {{ $keberatan->id }};
            document.getElementById('dialogModal').style.display = 'none';
            // Submit form
            this.form.submit();
        };
    }

    function showRejectDialog() {
        document.getElementById('dialogTitle').textContent = 'Tolak Keberatan';
        document.getElementById('dialogMessage').placeholder = 'Tulis alasan penolakan keberatan...';
        document.getElementById('dialogModal').style.display = 'flex';
        document.getElementById('dialogSubmit').onclick = function() {
            const message = document.getElementById('dialogMessage').value;
            document.getElementById('rejectMessage').value = message;
            document.getElementById('rejectSubject').value = 'Pengajuan Keberatan Ditolak - #' + {{ $keberatan->id }};
            document.getElementById('dialogModal').style.display = 'none';
            // Submit form
            this.form.submit();
        };
    }

    function closeDialog() {
        document.getElementById('dialogModal').style.display = 'none';
        document.getElementById('dialogMessage').value = '';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('dialogModal');
        if (event.target == modal) {
            closeDialog();
        }
    }
    </script>
</div>
@endsection
