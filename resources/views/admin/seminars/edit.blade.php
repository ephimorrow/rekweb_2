@extends('layouts.admin')

@section('title', 'Edit Seminar')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Edit Seminar: {{ $seminar->title }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.seminars.update', $seminar) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Seminar <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title', $seminar->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="4">{{ old('description', $seminar->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="location" class="form-label">Lokasi</label>
                                            <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                                   id="location" name="location" value="{{ old('location', $seminar->location) }}">
                                            @error('location')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="type" class="form-label">Jenis <span class="text-danger">*</span></label>
                                            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                                <option value="">Pilih Jenis</option>
                                                <option value="skripsi" {{ old('type', $seminar->type) == 'skripsi' ? 'selected' : '' }}>Skripsi</option>
                                                <option value="umum" {{ old('type', $seminar->type) == 'umum' ? 'selected' : '' }}>Umum</option>
                                                <option value="workshop" {{ old('type', $seminar->type) == 'workshop' ? 'selected' : '' }}>Workshop</option>
                                            </select>
                                            @error('type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="datetime" class="form-label">Tanggal & Waktu <span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control @error('datetime') is-invalid @enderror" 
                                           id="datetime" name="datetime" value="{{ old('datetime', $seminar->datetime->format('Y-m-d\TH:i')) }}" required>
                                    @error('datetime')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Foto Seminar</label>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror" 
                                           id="photo" name="photo" accept="image/*">
                                    @error('photo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Biarkan kosong jika tidak ingin mengubah foto.</div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Preview</h6>
                                        <div id="photoPreview" class="text-center p-3 border rounded">
                                            @if($seminar->photo)
                                                <img src="{{ asset('storage/' . $seminar->photo) }}" class="img-fluid rounded" alt="Current Photo">
                                                <p class="small text-muted mt-2 mb-0">Foto saat ini</p>
                                            @else
                                                <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                                <p class="small text-muted mb-0">Belum ada foto</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.seminars.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-pink">Update Seminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('photo').addEventListener('change', function(e) {
        const preview = document.getElementById('photoPreview');
        const file = e.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded" alt="Preview">`;
            }
            reader.readAsDataURL(file);
        } else {
            // Kembali ke foto lama jika ada
            @if($seminar->photo)
                preview.innerHTML = `
                    <img src="{{ asset('storage/' . $seminar->photo) }}" class="img-fluid rounded" alt="Current Photo">
                    <p class="small text-muted mt-2 mb-0">Foto saat ini</p>
                `;
            @else
                preview.innerHTML = `
                    <i class="fas fa-image fa-3x text-muted mb-2"></i>
                    <p class="small text-muted mb-0">Belum ada foto</p>
                `;
            @endif
        }
    });
</script>
@endpush
@endsection