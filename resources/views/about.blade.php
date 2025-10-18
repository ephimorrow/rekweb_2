@extends('layouts.app')

@section('title', 'Tentang Kami - Seminar Management')

@section('content')
<div class="container py-5">
    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-left">
            <x-back-button url="{{ route('home') }}" />
            <div class="page-header-content">
                <h1 class="page-title">Tentang Kami</h1>
                <p class="page-subtitle">Tentang SeminarKu Platform</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-pink mb-4">Visi & Misi SeminarKu</h3>
                    <p class="mb-4">SeminarKu hadir untuk memudahkan institusi pendidikan dan organisasi dalam mengelola acara seminar, workshop, dan presentasi akademik secara digital.</p>
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="feature-box h-100">
                                <i class="fas fa-bullseye fa-2x text-pink mb-3"></i>
                                <h5>Visi</h5>
                                <p class="text-muted">Menjadi platform terdepan dalam transformasi digital event management di Indonesia.</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="feature-box h-100">
                                <i class="fas fa-flag fa-2x text-pink mb-3"></i>
                                <h5>Misi</h5>
                                <p class="text-muted">Menyediakan solusi teknologi yang inovatif untuk kemudahan pengelolaan dan partisipasi dalam event akademik.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
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
    </div>
</div>
@endsection