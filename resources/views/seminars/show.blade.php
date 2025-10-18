@extends('layouts.app')

@section('title', $seminar->title)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('seminars.index') }}">Seminar</a></li>
                    <li class="breadcrumb-item active">{{ Str::limit($seminar->title, 50) }}</li>
                </ol>
            </nav>

            <div class="card shadow-sm mb-4">
                @if($seminar->photo)
                <img src="{{ asset('storage/' . $seminar->photo) }}" class="card-img-top" alt="{{ $seminar->title }}" style="height: 400px; object-fit: cover;">
                @else
                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
                    <i class="fas fa-calendar-alt fa-5x text-pink"></i>
                </div>
                @endif
                
                <div class="card-body">
                    <span class="badge bg-pink mb-3">{{ ucfirst($seminar->type) }}</span>
                    <h1 class="card-title h2 mb-3">{{ $seminar->title }}</h1>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-map-marker-alt text-pink me-3 fa-lg"></i>
                                <div>
                                    <small class="text-muted">Lokasi</small>
                                    <div class="fw-semibold">{{ $seminar->location ?? 'Online' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-calendar text-pink me-3 fa-lg"></i>
                                <div>
                                    <small class="text-muted">Tanggal & Waktu</small>
                                    <div class="fw-semibold">
                                        @if($seminar->datetime instanceof \Carbon\Carbon)
                                            {{ $seminar->datetime->format('d F Y, H:i') }}
                                        @else
                                            {{ \Carbon\Carbon::parse($seminar->datetime)->format('d F Y, H:i') }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($seminar->description)
                    <div class="mb-4">
                        <h5 class="text-dark">Deskripsi Seminar</h5>
                        <p class="card-text">{{ $seminar->description }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm sticky-top" style="top: 100px;">
                <div class="card-header bg-pink text-white text-center">
                    <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i>Daftar Seminar</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('seminars.register', $seminar) }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" 
                                   id="nim" name="nim" value="{{ old('nim') }}">
                            @error('nim')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prodi" class="form-label">Program Studi</label>
                            <input type="text" class="form-control @error('prodi') is-invalid @enderror" 
                                   id="prodi" name="prodi" value="{{ old('prodi') }}">
                            @error('prodi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-pink btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Daftar Sekarang
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <small class="text-muted">
                                Dengan mendaftar, Anda menyetujui syarat dan ketentuan yang berlaku.
                            </small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection