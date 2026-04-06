@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Waktu & Biaya Layanan</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Waktu dan Biaya Layanan Informasi Publik</h2>
        <p>Berikut adalah informasi lengkap mengenai waktu dan biaya layanan informasi publik PPID BBIA sesuai dengan Peraturan Komisi Informasi Nomor 1 Tahun 2010.</p>
            
            <div class="time-cost-grid">
                <div class="info-card">
                    <h3>⏰ Waktu Layanan</h3>
                    <div class="time-list">
                        <div class="time-item">
                            <strong>Penerimaan Permohonan:</strong>
                            <ul>
                                <li>Senin - Kamis: 08:00 - 16:00 WIB</li>
                                <li>Jumat: 08:00 - 15:30 WIB</li>
                                <li>Sabtu - Minggu: Tutup</li>
                            </ul>
                        </div>
                        
                        <div class="time-item">
                            <strong>Proses Permohonan:</strong>
                            <ul>
                                <li>Maksimal: 10 hari kerja</li>
                                <li>Perpanjangan: Maksimal 7 hari kerja</li>
                                <li>Penyelesaian: Sesuai kesepakatan</li>
                            </ul>
                        </div>
                        
                        <div class="time-item">
                            <strong>Keberatan:</strong>
                            <ul>
                                <li>Biasa: 20 hari kerja</li>
                                <li>Sederhana: 10 hari kerja</li>
                                <li>Cepat: 5 hari kerja</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="info-card">
                    <h3>💰 Biaya Layanan</h3>
                    <div class="cost-list">
                        <div class="cost-item">
                            <strong>Permohonan Informasi:</strong>
                            <ul>
                                <li><strong>Gratis</strong> - Tidak dipungut biaya</li>
                                <li><strong>Salinan Informasi:</strong> Rp 200/halaman</li>
                                <li><strong>Penyimpanan Digital:</strong> Rp 5.000/MB</li>
                                <li><strong>Penyiriman:</strong> Sesuai tarif jasa</li>
                            </ul>
                        </div>
                        
                        <div class="cost-item">
                            <strong>Penggandaan:</strong>
                            <ul>
                                <li><strong>Gratis</strong> - Tidak dipungut biaya</li>
                                <li><strong>Salinan Informasi:</strong> Rp 200/halaman</li>
                                <li><strong>Penyimpanan Digital:</strong> Rp 5.000/MB</li>
                                <li><strong>Penyiriman:</strong> Sesuai tarif jasa</li>
                            </ul>
                        </div>
                        
                        <div class="cost-item">
                            <strong>Keberatan:</strong>
                            <ul>
                                <li><strong>Gratis</strong> - Tidak dipungut biaya</li>
                                <li><strong>Salinan Informasi:</strong> Rp 200/halaman</li>
                                <li><strong>Penyimpanan Digital:</strong> Rp 5.000/MB</li>
                                <li><strong>Penyiriman:</strong> Sesuai tarif jasa</li>
                            </ul>
                        </div>
                    </div>
                </div>
            
            <h2>Informasi Tambahan</h2>
            <div class="info-box">
                <h3>📖 Keterangan</h3>
                <ul>
                    <li>Biaya sewaktu-waktu dapat berubah sesuai dengan peraturan yang berlaku</li>
                    <li>Biaya penyimpanan digital tidak termasuk biaya media penyimpanan</li>
                    <li>Untuk informasi yang tidak tersedia, dapat mengajukan permohonan informasi</li>
                    <li>Biaya layanan dapat dibebaskan atau dikurangi bagi masyarakat kurang mampu</li>
                    <li>Setiap transaksi akan diberikan bukti pembayaran yang sah</li>
                </ul>
            </div>
            
            <h2>Kontak Informasi</h2>
            <div class="contact-box">
                <p>Untuk informasi lebih lanjut mengenai waktu dan biaya layanan, hubungi:</p>
                <ul>
                    <li><strong>Telepon:</strong> (0251) 8324068</li>
                    <li><strong>Email:</strong> ppid@bbia.go.id</li>
                    <li><strong>WhatsApp:</strong> +62 812-3456-7890</li>
                    <li><strong>Alamat:</strong> Jl. Ir. H. Juanda No. 11, Bogor</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
.page-header {
    background: linear-gradient(135deg, #0f2338 0%, #2c5282 35%, #1a3a5f 100%);
    color: white;
    padding: 40px 0;
    margin: 0 0 40px 0;
    width: 100%;
    left: 0;
    right: 0;
}

.page-header-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 60px;
}

.page-header h1 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 10px;
}

.breadcrumb {
    font-size: 14px;
    opacity: 0.8;
}

.breadcrumb a {
    color: white;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

.content-section {
    width: 100%;
    padding: 0 20px;
    min-height: 60vh;
}

.content-full {
    max-width: 1200px;
    margin: 0 auto;
    padding: 60px 40px;
    background: transparent;
}

.content-full h2 {
    color: #1a3a5f;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 20px;
    margin-top: 40px;
}

.content-full h2:first-child {
    margin-top: 0;
}

.content-full p {
    color: #333;
    line-height: 1.8;
    margin-bottom: 20px;
    font-size: 16px;
}

.time-cost-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin: 30px 0;
}

.info-card {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
}

.info-card h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
}

.time-list {
    margin-bottom: 0;
}

.time-item {
    margin-bottom: 20px;
}

.time-item strong {
    color: #1a3a5f;
}

.time-item ul {
    color: #333;
    line-height: 1.6;
    margin-bottom: 0;
    padding-left: 20px;
}

.time-item li {
    margin-bottom: 5px;
}

.cost-list {
    margin-bottom: 0;
}

.cost-item {
    margin-bottom: 20px;
}

.cost-item strong {
    color: #1a3a5f;
}

.cost-item ul {
    color: #333;
    line-height: 1.6;
    margin-bottom: 0;
    padding-left: 20px;
}

.cost-item li {
    margin-bottom: 5px;
}

.info-box {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
    margin: 20px 0;
}

.info-box h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
}

.info-box ul {
    color: #333;
    line-height: 1.6;
    margin-bottom: 0;
}

.info-box li {
    margin-bottom: 8px;
}

.contact-box {
    background: #1a3a5f;
    color: white;
    border-radius: 10px;
    padding: 25px;
    margin: 20px 0;
}

.contact-box p {
    color: white;
    margin-bottom: 15px;
}

.contact-box ul {
    color: white;
}

.contact-box li {
    margin-bottom: 8px;
}

.contact-box li strong {
    color: rgba(255, 255, 255, 0.8);
}
</style>

@endsection
