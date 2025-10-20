@extends('layouts.app')

@section('title', 'Daftar Seminar - Seminar Management')

@section('content')
<div class="container py-5">
    <!-- Tombol Back dengan Multiple Options -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ url('/') }}" class="btn-back">
                    <i class="fas fa-home me-2"></i>
                    Beranda
                </a>
                <a href="javascript:history.back()" class="btn-back btn-back-outline">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="btn-back btn-back-primary">
                            <i class="fas fa-tachometer-alt me-2"></i>
                            Dashboard Admin
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-5 fw-bold text-dark mb-3">Daftar Seminar</h1>
            <p class="lead text-muted">Temukan seminar yang sesuai dengan minat dan kebutuhan Anda</p>
        </div>
    </div>

    <div class="row">
        @foreach($seminars as $seminar)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card seminar-card h-100 shadow-sm">
                @if($seminar->photo)
                <img src="{{ asset('storage/' . $seminar->photo) }}" class="card-img-top" alt="{{ $seminar->title }}" style="height: 200px; object-fit: cover;">
                @else
                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                    <i class="fas fa-calendar-alt fa-3x text-pink"></i>
                </div>
                @endif
                
                <div class="card-body">
                    <span class="badge bg-pink mb-2">{{ ucfirst($seminar->type) }}</span>
                    <h5 class="card-title">{{ $seminar->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($seminar->description, 120) }}</p>
                    
                    <div class="seminar-meta">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-map-marker-alt text-pink me-2"></i>
                            <span class="small">{{ $seminar->location ?? 'Online' }}</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar text-pink me-2"></i>
                            <span class="small">
                                @if($seminar->datetime instanceof \Carbon\Carbon)
                                    {{ $seminar->datetime->format('d M Y, H:i') }}
                                @else
                                    {{ \Carbon\Carbon::parse($seminar->datetime)->format('d M Y, H:i') }}
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-transparent">
                    <div class="d-grid">
                        <a href="{{ route('seminars.show', $seminar) }}" class="btn btn-pink">Detail & Daftar</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($seminars->isEmpty())
    <div class="row">
        <div class="col-12 text-center">
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                Tidak ada seminar yang tersedia saat ini.
            </div>
        </div>
    </div>
    @endif

    <div class="row mt-4">
        <div class="col-12 d-flex justify-content-center">
            {{ $seminars->links() }}
        </div>
    </div>
</div>
@endsection