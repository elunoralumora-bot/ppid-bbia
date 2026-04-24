<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan PPID BBIA - {{ $currentYear }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png?v=' . time()) }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: white;
        }
        .kop-surat {
            margin-bottom: 40px;
            border-bottom: 3px double #333;
            padding-bottom: 20px;
        }
        .kop-header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        .logo-kemenperin {
            width: 120px;
            height: 120px;
            margin-right: 20px;
            object-fit: contain;
        }
        .kop-text {
            flex: 1;
            text-align: center;
        }
        .kop-text h1 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            color: #000;
            line-height: 1.2;
        }
        .kop-text h2 {
            margin: 5px 0;
            font-size: 14px;
            font-weight: bold;
            color: #000;
            line-height: 1.2;
        }
        .kop-text h3 {
            margin: 5px 0;
            font-size: 13px;
            font-weight: bold;
            color: #000;
            line-height: 1.2;
        }
        .kop-info {
            font-size: 11px;
            color: #333;
            line-height: 1.4;
            margin-top: 10px;
        }
        .report-header {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 30px;
        }
        .report-header h1 {
            margin: 0;
            color: #0f2338;
            font-size: 20px;
            font-weight: bold;
        }
        .report-header h2 {
            margin: 10px 0 0 0;
            color: #64748b;
            font-size: 14px;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
        }
        .stat-card .number {
            font-size: 28px;
            font-weight: bold;
            color: #0f2338;
        }
        .stat-card .label {
            font-size: 14px;
            color: #64748b;
            margin-top: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th {
            background: #0f2338;
            color: white;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }
        table td {
            border: 1px solid #e2e8f0;
            padding: 10px;
            font-size: 13px;
        }
        table tr.total-row {
            background: #f1f5f9;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            font-size: 12px;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="kop">
        <table style="border-collapse: collapse; border: none;">
            <tr>
                <td width="15%" style="vertical-align: middle; text-align:center; padding-left:20px; border: none;">
    <img src="{{ asset('images/Kemenperin.png') }}" 
         style="height: 80px; display:block; margin:auto;">
</td>

                <td style="text-align:center; border: none;">
                    <div style="font-size:16px;"
                        <b>BADAN STANDARDISASI DAN KEBIJAKAN JASA INDUSTRI</b><br>
                        <b>BALAI BESAR STANDARDISASI</b><br>
                        <b>DAN PELAYANAN JASA INDUSTRI AGRO</b>
                    </div>

                    <div style="font-size:12px; margin-top:6px;">
                        Jl. Ir. H. Juanda No. 11, Bogor 16122<br>
                        Telp: (0251) 8324080, 8323530 &nbsp; Fax: (0251) 8323330<br>
                        Website: www.bbia.go.id &nbsp; Email: cabi@bbia.go.id
                    </div>
                </td>
            </tr>
        </table>

        <!-- GARIS DOUBLE -->
        <hr style="border:1px solid black; margin-top:8px;">
        <hr style="border:2px solid black; margin-top:2px;">
    </div>

    <!-- Header Laporan -->
    <div class="report-header">
        <h1>LAPORAN ADMINISTRASI PPID</h1>
        <h2>Balai Besar Standardisasi dan Pelayanan Jasa Industri Agro - Tahun {{ $currentYear }}</h2>
    </div>

    <div class="stats">
        <div class="stat-card">
            <div class="number">{{ \App\Models\Permohonan::count() }}</div>
            <div class="label">Total Permohonan</div>
        </div>
        <div class="stat-card">
            <div class="number">{{ \App\Models\Permohonan::where('status', 'baru')->count() }}</div>
            <div class="label">Permohonan Baru</div>
        </div>
        <div class="stat-card">
            <div class="number">{{ \App\Models\Permohonan::where('status', 'diproses')->count() }}</div>
            <div class="label">Sedang Diproses</div>
        </div>
        <div class="stat-card">
            <div class="number">{{ \App\Models\Permohonan::where('status', 'selesai')->count() }}</div>
            <div class="label">Selesai</div>
        </div>
        <div class="stat-card">
            <div class="number">{{ \App\Models\Permohonan::where('status', 'ditolak')->count() }}</div>
            <div class="label">Ditolak</div>
        </div>
        <div class="stat-card">
            <div class="number">{{ \App\Models\Keberatan::count() }}</div>
            <div class="label">Total Keberatan</div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Permohonan Baru</th>
                <th>Sedang Diproses</th>
                <th>Selesai</th>
                <th>Ditolak</th>
                <th>Keberatan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row['bulan'] }}</td>
                <td>{{ $row['permohonan_baru'] }}</td>
                <td>{{ $row['diproses'] }}</td>
                <td>{{ $row['selesai'] }}</td>
                <td>{{ $row['ditolak'] }}</td>
                <td>{{ $row['keberatan'] }}</td>
                <td><strong>{{ $row['total'] }}</strong></td>
            </tr>
            @endforeach
            
            <tr class="total-row">
                <td>{{ $totalRow['bulan'] }}</td>
                <td>{{ $totalRow['permohonan_baru'] }}</td>
                <td>{{ $totalRow['diproses'] }}</td>
                <td>{{ $totalRow['selesai'] }}</td>
                <td>{{ $totalRow['ditolak'] }}</td>
                <td>{{ $totalRow['keberatan'] }}</td>
                <td><strong>{{ $totalRow['total'] }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Laporan ini dihasilkan secara otomatis oleh Sistem PPID BBIA</p>
        <p>Tanggal cetak: {{ date('d F Y H:i:s') }}</p>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
