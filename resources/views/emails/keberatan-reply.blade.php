<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balasan Pengajuan Keberatan - PPID BBIA</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #0f2338 0%, #2c5282 35%, #1a3a5f 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
        }
        .info-box {
            background: #f8f9fa;
            border-left: 4px solid #dc2626;
            padding: 15px;
            margin: 20px 0;
        }
        .info-box strong {
            color: #1a3a5f;
        }
        .message-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .message-box h3 {
            margin-top: 0;
            color: #dc2626;
        }
        .footer {
            background: #1a3a5f;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 12px;
        }
        .btn {
            display: inline-block;
            background: #2c5282;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>PPID BBIA</h1>
            <p>Badan Pengawas Tenaga Nuklir</p>
        </div>
        
        <div class="content">
            <h2>Balasan Pengajuan Keberatan</h2>
            <p>Kepada Yth. {{ $keberatan->nama_pemohon }}</p>
            
            <div class="info-box">
                <p><strong>Nomor Tiket:</strong> #{{ $keberatan->id }}</p>
                <p><strong>Tanggal Keberatan:</strong> {{ $keberatan->tanggal_keberatan ? $keberatan->tanggal_keberatan->format('d F Y') : '-' }}</p>
                <p><strong>Alasan Keberatan:</strong> {{ $keberatan->alasan_keberatan }}</p>
            </div>
            
            <div class="message-box">
                <h3>Pesan Balasan:</h3>
                <p>{!! nl2br($pesan) !!}</p>
            </div>
            
            <p>Jika Anda memiliki pertanyaan lebih lanjut, silakan hubungi kami.</p>
            
            <div class="info-box">
                <p><strong>Email:</strong> ppid.bbia@kemenperin.go.id</p>
                <p><strong>Telepon:</strong> (0251) 8323880</p>
                <p><strong>Alamat:</strong> Jl. Ir. H. Juanda No. 11, Bogor</p>
            </div>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} PPID BBIA - Badan Pengawas Tenaga Nuklir</p>
            <p>Halaman ini dikirim secara otomatis, mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>
</html>
