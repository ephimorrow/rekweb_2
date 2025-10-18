@extends('layouts.app')

@section('title', 'Tentang Kami - Seminar Management')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-dark mb-4">Tentang SeminarKu</h1>
                <p class="lead text-muted">Platform terdepan untuk manajemen dan pendaftaran seminar</p>
            </div>

            <div class="card shadow-sm mb-5">
                <div class="card-body p-5">
                    <h3 class="h4 text-pink mb-4">Visi & Misi</h3>
                    <p class="mb-4">SeminarKu hadir untuk memudahkan institusi pendidikan dan organisasi dalam mengelola acara seminar, workshop, dan presentasi akademik secara digital.</p>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h5 class="text-dark"><i class="fas fa-bullseye text-pink me-2"></i>Visi</h5>
                            <p class="text-muted">Menjadi platform terdepan dalam transformasi digital event management di Indonesia.</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5 class="text-dark"><i class="fas fa-flag text-pink me-2"></i>Misi</h5>
                            <p class="text-muted">Menyediakan solusi teknologi yang inovatif untuk kemudahan pengelolaan dan partisipasi dalam event akademik.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <div class="feature-box">
                        <i class="fas fa-rocket fa-2x text-pink mb-3"></i>
                        <h5>Inovatif</h5>
                        <p class="text-muted">Teknologi terkini untuk pengalaman terbaik</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="feature-box">
                        <i class="fas fa-shield-alt fa-2x text-pink mb-3"></i>
                        <h5>Aman</h5>
                        <p class="text-muted">Data dan transaksi terjamin keamanannya</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="feature-box">
                        <i class="fas fa-headset fa-2x text-pink mb-3"></i>
                        <h5>Support 24/7</h5>
                        <p class="text-muted">Tim support siap membantu kapan saja</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection