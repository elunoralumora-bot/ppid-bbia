<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prosedur;

class ProsedurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Prosedur Permohonan Informasi
        Prosedur::create([
            'kategori' => 'Prosedur Permohonan Informasi',
            'judul' => 'Pengisian Formulir Permohonan',
            'konten' => '<p>Pemohon mengisi formulir permohonan informasi publik secara lengkap dan benar:</p>
            <ul>
                <li>Formulir dapat diisi secara online melalui website PPID BBIA</li>
                <li>Formulir dapat diisi langsung di kantor PPID BBIA</li>
                <li>Formulir dapat diunduh dan diisi kemudian dikirim via email</li>
            </ul>
            <h4>Dokumen yang Diperlukan:</h4>
            <ul>
                <li>Fotokopi KTP/SIM/Paspor yang masih berlaku</li>
                <li>Surat kuasa (jika diwakilkan)</li>
                <li>Dokumen pendukung lainnya (jika diperlukan)</li>
            </ul>',
            'urutan' => 1,
            'is_active' => true,
        ]);

        Prosedur::create([
            'kategori' => 'Prosedur Permohonan Informasi',
            'judul' => 'Verifikasi dan Registrasi',
            'konten' => '<p>PPID BBIA akan melakukan verifikasi terhadap permohonan yang masuk:</p>
            <ul>
                <li>Kelengkapan dokumen persyaratan</li>
                <li>Kesesuaian format permohonan</li>
                <li>Kejelasan identitas pemohon</li>
            </ul>
            <p><strong>Waktu proses:</strong> Maksimal 10 hari kerja sejak diterimanya permohonan lengkap.</p>',
            'urutan' => 2,
            'is_active' => true,
        ]);

        Prosedur::create([
            'kategori' => 'Prosedur Permohonan Informasi',
            'judul' => 'Proses Pencarian Informasi',
            'konten' => '<p>Setelah permohonan dinyatakan lengkap dan valid:</p>
            <ul>
                <li>PPID BBIA melakukan pencarian informasi yang diminta</li>
                <li>Konsultasi dengan unit terkait jika diperlukan</li>
                <li>Evaluasi apakah informasi dapat diakses publik</li>
            </ul>',
            'urutan' => 3,
            'is_active' => true,
        ]);

        Prosedur::create([
            'kategori' => 'Prosedur Permohonan Informasi',
            'judul' => 'Penyampaian Hasil',
            'konten' => '<p>Hasil permohonan akan disampaikan kepada pemohon:</p>
            <ul>
                <li><strong>Informasi tersedia:</strong> Disampaikan dalam bentuk hardcopy/softcopy</li>
                <li><strong>Informasi sebagian:</strong> Disampaikan bagian yang dapat diakses</li>
                <li><strong>Informasi ditolak:</strong> Disertai alasan penolakan yang jelas</li>
            </ul>
            <p><strong>Biaya:</strong> Sesuai dengan peraturan yang berlaku (jika ada).</p>',
            'urutan' => 4,
            'is_active' => true,
        ]);

        // Prosedur Pengajuan Keberatan
        Prosedur::create([
            'kategori' => 'Prosedur Pengajuan Keberatan',
            'judul' => 'Alasan Pengajuan Keberatan',
            'konten' => '<p>Keberatan dapat diajukan karena alasan-alasan berikut:</p>
            <div class="reason-options">
                <div class="reason-item">
                    <h4>1. Lewat Waktu</h4>
                    <p>Permohonan informasi tidak ditanggapi dalam waktu 10 hari kerja</p>
                </div>
                <div class="reason-item">
                    <h4>2. Ditolak</h4>
                    <p>Permohonan informasi ditolak tanpa alasan yang jelas</p>
                </div>
                <div class="reason-item">
                    <h4>3. Tidak Sesuai</h4>
                    <p>Informasi yang diberikan tidak sesuai dengan yang diminta</p>
                </div>
                <div class="reason-item">
                    <h4>4. Biaya Tidak Wajar</h4>
                    <p>Biaya yang dibebankan tidak sesuai dengan ketentuan</p>
                </div>
            </div>
            <p><strong>Catatan:</strong> Keberatan diajukan paling lambat 30 hari setelah menerima pemberitahuan hasil permohonan.</p>',
            'urutan' => 1,
            'is_active' => true,
        ]);

        Prosedur::create([
            'kategori' => 'Prosedur Pengajuan Keberatan',
            'judul' => 'Tata Cara Pengajuan Keberatan',
            'konten' => '<p>Pengajuan keberatan dilakukan dengan cara:</p>
            <ol>
                <li>Mengisi formulir keberatan yang tersedia</li>
                <li>Melampirkan dokumen pendukung (KTP, surat permohonan asli, dll)</li>
                <li>Menyertakan alasan keberatan secara jelas</li>
                <li>Mengajukan secara langsung atau melalui media elektronik</li>
            </ol>
            <p><strong>Tempat pengajuan:</strong> PPID BBIA di Ruang CSO Jl. Ir. H. Juanda No. 11, Bogor.</p>',
            'urutan' => 2,
            'is_active' => true,
        ]);

        Prosedur::create([
            'kategori' => 'Prosedur Pengajuan Keberatan',
            'judul' => 'Proses Penanganan Keberatan',
            'konten' => '<p>Proses penanganan keberatan:</p>
            <ul>
                <li><strong>Penerimaan:</strong> Keberatan dicatat dan diberi nomor registrasi</li>
                <li><strong>Verifikasi:</strong> Kelengkapan dokumen dan keabsahan pengajuan</li>
                <li><strong>Evaluasi:</strong> Analisis alasan keberatan dan dokumen pendukung</li>
                <li><strong>Keputusan:</strong> Ditetapkan oleh Atasan PPID</li>
            </ul>
            <p><strong>Waktu proses:</strong> Maksimal 30 hari kerja sejak diterimanya keberatan.</p>',
            'urutan' => 3,
            'is_active' => true,
        ]);

        Prosedur::create([
            'kategori' => 'Prosedur Pengajuan Keberatan',
            'judul' => 'Hasil Keputusan Keberatan',
            'konten' => '<p>Hasil keputusan keberatan dapat berupa:</p>
            <ul>
                <li><strong>Diterima:</strong> Informasi disediakan sesuai permohonan awal</li>
                <li><strong>Diterima Sebagian:</strong> Informasi disediakan sebagian yang dapat diakses</li>
                <li><strong>Ditolak:</strong> Disertai alasan hukum yang jelas</li>
            </ul>',
            'urutan' => 4,
            'is_active' => true,
        ]);
    }
}
