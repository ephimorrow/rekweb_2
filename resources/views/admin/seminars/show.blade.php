@extends('layouts.admin')

@section('title', 'Detail Seminar')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h2">Detail Seminar</h1>
                <div>
                    <a href="{{ route('admin.seminars.edit', $seminar) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.seminars.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Informasi Seminar</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Judul Seminar</label>
                                        <p>{{ $seminar->title }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Jenis</label>
                                        <p>
                                            <span class="badge bg-{{ $seminar->type == 'skripsi' ? 'primary' : ($seminar->type == 'workshop' ? 'success' : 'info') }}">
                                                {{ ucfirst($seminar->type) }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Lokasi</label>
                                        <p>{{ $seminar->location ?? '-' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Tanggal & Waktu</label>
                                        <p>{{ $seminar->datetime->format('d F Y, H:i') }}</p>
                                    </div>
                                </div>
                            </div>

                            @if($seminar->description)
                            <div class="mb-3">
                                <label class="form-label fw-bold">Deskripsi</label>
                                <p>{{ $seminar->description }}</p>
                            </div>
                            @endif

                            @if($seminar->photo)
                            <div class="mb-3">
                                <label class="form-label fw-bold">Foto</label>
                                <div>
                                    <img src="{{ asset('storage/' . $seminar->photo) }}" alt="{{ $seminar->title }}" class="img-fluid rounded" style="max-height: 300px;">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Statistik</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <h3 class="text-pink">{{ $seminar->registrations->count() }}</h3>
                                <p class="text-muted">Total Pendaftar</p>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm mt-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Peserta Terdaftar</h5>
                        </div>
                        <div class="card-body">
                            @if($seminar->registrations->count() > 0)
                                <div class="list-group list-group-flush">
                                    @foreach($seminar->registrations as $registration)
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1">{{ $registration->participant->name }}</h6>
                                                <small class="text-muted">
                                                    {{ $registration->participant->nim }} | {{ $registration->participant->prodi }}
                                                </small>
                                            </div>
                                            <span class="badge bg-{{ $registration->status == 'terdaftar' ? 'success' : 'secondary' }}">
                                                {{ $registration->status }}
                                            </span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted text-center mb-0">Belum ada peserta yang terdaftar</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection