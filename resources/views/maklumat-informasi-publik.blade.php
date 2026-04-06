@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Maklumat Informasi Publik</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Maklumat Informasi Publik PPID BBIA</h2>
        <p>Berikut adalah maklumat informasi publik PPID BBIA yang disusun sesuai dengan Peraturan Komisi Informasi Nomor 1 Tahun 2010 dan Peraturan Komisi Informasi Nomor 1 Tahun 2013.</p>
            
            <div class="motto-grid">
                <div class="motto-item">
                    <div class="motto-icon">🔍</div>
                    <div class="motto-content">
                        <h3>Visi</h3>
                        <p>Menyediakan informasi publik yang cepat, tepat, dan akuntabel untuk mendukung good governance.</p>
                    </div>
                </div>
                
                <div class="motto-item">
                    <div class="motto-icon">🎯</div>
                    <div class="motto-content">
                        <h3>Misi</h3>
                        <p>Melayani masyarakat dengan profesionalisme dan integritas dalam penyediaan informasi publik.</p>
                    </div>
                </div>
                
                <div class="motto-item">
                    <div class="motto-icon">⚖️</div>
                    <div class="motto-content">
                        <h3>Motto</h3>
                        <p>Transparansi, Akuntabilitas, dan Profesionalisme dalam Pelayanan Informasi Publik.</p>
                    </div>
                </div>
            </div>
            
            <h2>Prinsip-Prinsip Layanan</h2>
            <div class="principles-grid">
                <div class="principle-item">
                    <h4>🔍 Transparansi</h4>
                    <p>Informasi publik dapat diakses oleh siapa saja dengan mudah dan cepat.</p>
                </div>
                
                <div class="principle-item">
                    <h4>⚖️ Akuntabilitas</h4>
                    <p>Setiap informasi yang disediakan akurat dan dapat dipertanggungjawabkan.</p>
                </div>
                
                <div class="principle-item">
                    <h4>🤝 Profesionalisme</h4>
                    <p>Pelayanan informasi publik dilaksanakan dengan cara yang sopan dan ramah.</p>
                </div>
                
                <div class="principle-item">
                    <h4>⚖️ Keadilan</h4>
                    <p>Setiap pemohon diperlakukan sama tanpa diskriminasi.</p>
                </div>
                
                <div class="principle-item">
                    <h4>🎯 Efektivitas</h4>
                    <p>Informasi publik yang disediakan bermanfaat dan sesuai kebutuhan masyarakat.</p>
                </div>
            </div>
            
            <h2>Jaminan Layanan</h2>
            <div class="guarantee-grid">
                <div class="guarantee-item">
                    <h4>✅ Ketersediaan</h4>
                    <p>Informasi publik tersedia 24/7 melalui berbagai kanal layanan.</p>
                </div>
                
                <div class="guarantee-item">
                    <h4>✅ Kebenaran</h4>
                    <p>Informasi yang disediakan akurat dan terkini.</p>
                </div>
                
                <div class="guarantee-item">
                    <h4>✅ Kelengkapan</h4>
                    <p>Informasi publik yang disediakan lengkap dan komprehensif.</p>
                </div>
                
                <div class="guarantee-item">
                    <h4>✅ Kemudahan Akses</h4>
                    <p>Informasi publik mudah diakses oleh seluruh lapisan masyarakat.</p>
                </div>
                
                <div class="guarantee-item">
                    <h4>✅ Keamanan</h4>
                    <p>Informasi publik dilindungi keamanan dan kerahasiaannya terjamin.</p>
                </div>
            </div>
            
            <h2>Informasi Kontak</h2>
            <div class="contact-box">
                <p>Untuk informasi lebih lanjut mengenai maklumat informasi publik, hubungi:</p>
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

.motto-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin: 30px 0;
}

.motto-item {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 30px;
    display: flex;
    gap: 20px;
    align-items: center;
}

.motto-icon {
    width: 60px;
    height: 60px;
    background: #1a3a5f;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.motto-content {
    flex: 1;
}

.motto-content h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.motto-content p {
    color: #333;
    font-size: 14px;
    line-height: 1.5;
    margin: 0;
}

.principles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.principle-item {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
    text-align: center;
}

.principle-item h4 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.principle-item p {
    color: #333;
    font-size: 14px;
    line-height: 1.5;
    margin: 0;
}

.guarantee-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.guarantee-item {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
    text-align: center;
}

.guarantee-item h4 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.guarantee-item p {
    color: #333;
    font-size: 14px;
    line-height: 1.5;
    margin: 0;
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
