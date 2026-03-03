@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Informasi Publik</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <div class="service-detail">
            <div class="service-icon-large">
                <img src="{{ asset('images/informasi publik.png') }}" alt="Informasi Publik">
            </div>
                            <li>Memperoleh informasi tanpa biaya (untuk informasi dasar)</li>
                        </ul>
                    </div>
                    
                    <div class="info-box">
                        <h3>Kewajiban PPID:</h3>
                        <ul>
                            <li>Menyediakan dan memberikan akses informasi publik</li>
                            <li>Melakukan pemutakhiran informasi secara berkala</li>
                            <li>Memberikan pelayanan prima kepada pemohon</li>
                            <li>Menjaga keamanan dan kerahasiaan informasi tertentu</li>
                        </ul>
                    </div>
                    
                    <div class="action-buttons">
                        <a href="{{ url('/daftar-informasi-publik') }}" class="btn btn-primary">Daftar Informasi Lengkap</a>
                        <a href="{{ url('/prosedur-permohonan') }}" class="btn btn-outline">Prosedur Permohonan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
