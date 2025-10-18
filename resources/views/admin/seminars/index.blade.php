@extends('layouts.admin')

@section('title', 'Kelola Seminar')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Kelola Seminar</h1>
        <a href="{{ route('admin.seminars.create') }}" class="btn btn-pink">
            <i class="fas fa-plus me-2"></i>Tambah Seminar
        </a>
    </div>

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

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Jenis</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Peserta</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seminars as $seminar)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $seminar->title }}</td>
                            <td>
                                <span class="badge bg-{{ $seminar->type == 'skripsi' ? 'primary' : ($seminar->type == 'workshop' ? 'success' : 'info') }}">
                                    {{ ucfirst($seminar->type) }}
                                </span>
                            </td>
                            <td>{{ $seminar->location }}</td>
                            <td>{{ $seminar->datetime->format('d M Y, H:i') }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $seminar->registrations_count ?? 0 }}</span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.seminars.show', $seminar) }}" class="btn btn-sm btn-info" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.seminars.edit', $seminar) }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.seminars.destroy', $seminar) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus seminar ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-center mt-4">
                {{ $seminars->links() }}
            </div>
        </div>
    </div>
</div>
@endsection