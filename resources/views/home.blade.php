@extends('layouts.app')

@section('title', 'Home - Seminar Management')

@section('content')
<!-- Hero Section -->
<div class="hero-section bg-pink-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-gradient mb-4">Temukan Seminar Terbaik untuk Pengembangan Diri</h1>
                <p class="lead mb-4">Jelajahi berbagai seminar, workshop, dan presentasi akademik yang akan memperkaya pengetahuan dan keterampilan Anda.</p>
                <a href="{{ route('seminars.index') }}" class="btn btn-pink btn-lg">
                    <i class="fas fa-search me-2"></i>Jelajahi Seminar
                </a>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <i class="fas fa-graduation-cap fa-8x text-gradient"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Seminars -->
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h2 class="section-title">Seminar Mendatang</h2>
            <p class="text-muted">Jangan lewatkan kesempatan untuk belajar dan berkembang</p>
        </div>
    </div>

    <div class="row">
        @forelse($featuredSeminars as $seminar)
        <div class="col-md-4 mb-4">
            <div class="card seminar-card h-100">
                <div class="card-body">
                    <span class="badge bg-pink mb-2">{{ ucfirst($seminar->type) }}</span>
                    <h5 class="card-title">{{ $seminar->title }}</h5>
                    <p class="card-text text-muted small">{{ Str::limit($seminar->description, 100) }}</p>
                    <div class="seminar-info">
                        <p class="mb-1"><i class="fas fa-map-marker-alt text-pink me-2"></i>{{ $seminar->location ?? 'Online' }}</p>
                        <p class="mb-0"><i class="fas fa-calendar text-pink me-2"></i>{{ $seminar->formatted_datetime }}</p>
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('seminars.show', $seminar) }}" class="btn btn-outline-pink btn-sm">Detail & Daftar</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                Tidak ada seminar yang tersedia saat ini.
            </div>
        </div>
        @endforelse
    </div>

    @if($featuredSeminars->count() > 0)
    <div class="row mt-5">
        <div class="col-12 text-center">
            <a href="{{ route('seminars.index') }}" class="btn btn-pink">Lihat Semua Seminar</a>
        </div>
    </div>
    @endif
</div>

<!-- Features Section -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center mb-4">
                <div class="feature-icon">
                    <i class="fas fa-calendar-check fa-3x text-pink mb-3"></i>
                    <h4>Pendaftaran Mudah</h4>
                    <p class="text-muted">Daftar seminar dengan cepat dan mudah melalui platform online kami</p>
                </div>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="feature-icon">
                    <i class="fas fa-chalkboard-teacher fa-3x text-pink mb-3"></i>
                    <h4>Pembicara Berpengalaman</h4>
                    <p class="text-muted">Belajar dari para ahli dan praktisi di bidangnya masing-masing</p>
                </div>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="feature-icon">
                    <i class="fas fa-certificate fa-3x text-pink mb-3"></i>
                    <h4>Sertifikat Peserta</h4>
                    <p class="text-muted">Dapatkan sertifikat keikutsertaan untuk setiap seminar yang dihadiri</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection