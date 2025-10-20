@extends('layouts.app')

@section('title', 'Tentang Web - Seminar Management')

@section('content')
<div class="container py-5">
    <!-- Tombol Back -->
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ url('/') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-5 fw-bold text-primary mb-3">Tentang Kami</h1>
            <p class="lead text-muted">Website ini dibuat untuk memenuhi tugas mata kuliah Rekayasa Web</p>
        </div>
    </div>

    <!-- Biodata Developer -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white py-4">
                    <h3 class="card-title mb-0 text-center">
                        <i class="fas fa-user-circle me-2"></i>
                        Biodata Mahasiswa
                    </h3>
                </div>
                <div class="card-body p-5">
                    <div class="row align-items-center">
                        <div class="col-lg-4 text-center mb-4 mb-lg-0">
                            <div class="position-relative d-inline-block">
                                <div class="rounded-circle bg-light border border-4 border-primary d-flex align-items-center justify-content-center mx-auto" style="width: 180px; height: 180px;">
                                    @if(isset($profilePicture) && $profilePicture)
                                        <img src="{{ asset('storage/' . $profilePicture) }}" alt="Foto Profil" class="rounded-circle w-100 h-100 object-fit-cover" id="profileImage">
                                    @else
                                        <i class="fas fa-user-graduate fa-4x text-primary"></i>
                                    @endif
                                </div>
                                <button type="button" class="btn btn-primary rounded-circle position-absolute bottom-0 end-0" data-bs-toggle="modal" data-bs-target="#uploadModal" style="width: 45px; height: 45px;">
                                    <i class="fas fa-camera"></i>
                                </button>
                            </div>
                            <div id="uploadStatus" class="mt-3"></div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="d-flex align-items-center p-3 bg-light rounded">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Nama Lengkap</small>
                                            <p class="h6 mb-0">Syarifatul Azkiya Alganjari</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex align-items-center p-3 bg-light rounded">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">NIM</small>
                                            <p class="h6 mb-0">241011701321</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex align-items-center p-3 bg-light rounded">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                            <i class="fas fa-university"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Program Studi</small>
                                            <p class="h6 mb-0">Sistem Informasi</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex align-items-center p-3 bg-light rounded">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                            <i class="fas fa-book"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Mata Kuliah</small>
                                            <p class="h6 mb-0">Rekayasa Web</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex align-items-center p-3 bg-light rounded">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Dosen Pengampu</small>
                                            <p class="h6 mb-0">Ibu Mega Permata Sapani, S.Kom., M.Kom.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Upload Foto -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="uploadModalLabel">
                        <i class="fas fa-camera me-2"></i>
                        Upload Foto Profil
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="uploadForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="profile_picture" class="form-label fw-semibold">Pilih Foto</label>
                            <input class="form-control" type="file" id="profile_picture" name="profile_picture" accept="image/*" required>
                            <div class="form-text text-muted">
                                Format yang didukung: JPG, PNG, GIF. Maksimal ukuran: 2MB.
                            </div>
                        </div>
                        
                        <!-- Preview Foto -->
                        <div class="mb-4 text-center">
                            <div class="border border-2 border-dashed rounded p-4 bg-light">
                                <img id="imagePreview" src="#" alt="Preview" class="img-fluid rounded d-none" style="max-height: 200px;">
                                <div id="imagePlaceholder" class="text-muted">
                                    <i class="fas fa-cloud-upload-alt fa-3x mb-2"></i>
                                    <p class="mb-0">Preview akan muncul di sini</p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>
                        Batal
                    </button>
                    <button type="button" class="btn btn-primary" id="uploadButton">
                        <i class="fas fa-upload me-2"></i>
                        Upload Foto
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Deskripsi Tugas -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light py-4">
                    <h3 class="card-title mb-0 text-center text-dark">
                        <i class="fas fa-tasks me-2 text-primary"></i>
                        Deskripsi Tugas
                    </h3>
                </div>
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="d-flex align-items-start p-4 bg-white rounded shadow-sm h-100">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-4" style="width: 70px; height: 70px;">
                                    <i class="fas fa-laptop-code fa-2x"></i>
                                </div>
                                <div>
                                    <h5 class="text-dark mb-3">Aplikasi Web Seminar</h5>
                                    <p class="text-muted mb-0">
                                        Membangun website manajemen seminar menggunakan framework Laravel 
                                        dengan fitur CRUD lengkap dan authentication.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="d-flex align-items-start p-4 bg-white rounded shadow-sm h-100">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-4" style="width: 70px; height: 70px;">
                                    <i class="fas fa-database fa-2x"></i>
                                </div>
                                <div>
                                    <h5 class="text-dark mb-3">Database Management</h5>
                                    <p class="text-muted mb-0">
                                        Implementasi database relational dengan MySQL dan Eloquent ORM 
                                        untuk manajemen data seminar dan peserta.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="d-flex align-items-start p-4 bg-white rounded shadow-sm h-100">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-4" style="width: 70px; height: 70px;">
                                    <i class="fas fa-mobile-alt fa-2x"></i>
                                </div>
                                <div>
                                    <h5 class="text-dark mb-3">Responsive Design</h5>
                                    <p class="text-muted mb-0">
                                        Mendesain interface yang responsive dan user-friendly 
                                        menggunakan Bootstrap 5 dan CSS custom.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="d-flex align-items-start p-4 bg-white rounded shadow-sm h-100">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-4" style="width: 70px; height: 70px;">
                                    <i class="fas fa-shield-alt fa-2x"></i>
                                </div>
                                <div>
                                    <h5 class="text-dark mb-3">Security & Validation</h5>
                                    <p class="text-muted mb-0">
                                        Penerapan keamanan web dan validasi data 
                                        untuk mencegah serangan dan kesalahan input.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Teknologi yang Digunakan -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light py-4">
                    <h3 class="card-title mb-0 text-center text-dark">
                        <i class="fas fa-cogs me-2 text-primary"></i>
                        Teknologi yang Digunakan
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-lg-2 col-md-4 col-6 mb-4">
                            <div class="p-4 bg-white rounded shadow-sm">
                                <i class="fab fa-laravel fa-3x text-primary mb-3"></i>
                                <h6 class="text-dark mb-1">Laravel</h6>
                                <small class="text-muted">PHP Framework</small>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-4">
                            <div class="p-4 bg-white rounded shadow-sm">
                                <i class="fab fa-bootstrap fa-3x text-primary mb-3"></i>
                                <h6 class="text-dark mb-1">Bootstrap 5</h6>
                                <small class="text-muted">CSS Framework</small>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-4">
                            <div class="p-4 bg-white rounded shadow-sm">
                                <i class="fas fa-database fa-3x text-primary mb-3"></i>
                                <h6 class="text-dark mb-1">MySQL</h6>
                                <small class="text-muted">Database</small>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-4">
                            <div class="p-4 bg-white rounded shadow-sm">
                                <i class="fab fa-js-square fa-3x text-primary mb-3"></i>
                                <h6 class="text-dark mb-1">JavaScript</h6>
                                <small class="text-muted">Client-side</small>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-4">
                            <div class="p-4 bg-white rounded shadow-sm">
                                <i class="fab fa-html5 fa-3x text-primary mb-3"></i>
                                <h6 class="text-dark mb-1">HTML5</h6>
                                <small class="text-muted">Markup</small>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-4">
                            <div class="p-4 bg-white rounded shadow-sm">
                                <i class="fab fa-css3-alt fa-3x text-primary mb-3"></i>
                                <h6 class="text-dark mb-1">CSS3</h6>
                                <small class="text-muted">Styling</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Preview gambar sebelum upload
    const profilePictureInput = document.getElementById('profile_picture');
    const imagePreview = document.getElementById('imagePreview');
    const imagePlaceholder = document.getElementById('imagePlaceholder');
    
    profilePictureInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            // Validasi ukuran file (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimal 2MB.');
                this.value = '';
                return;
            }
            
            // Validasi tipe file
            const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                alert('Format file tidak didukung. Gunakan JPG, PNG, atau GIF.');
                this.value = '';
                return;
            }
            
            const reader = new FileReader();
            
            reader.addEventListener('load', function() {
                imagePreview.src = reader.result;
                imagePreview.classList.remove('d-none');
                imagePlaceholder.classList.add('d-none');
            });
            
            reader.readAsDataURL(file);
        } else {
            imagePreview.classList.add('d-none');
            imagePlaceholder.classList.remove('d-none');
        }
    });
    
    // Upload foto
    const uploadButton = document.getElementById('uploadButton');
    const uploadForm = document.getElementById('uploadForm');
    const uploadStatus = document.getElementById('uploadStatus');
    const uploadModal = new bootstrap.Modal(document.getElementById('uploadModal'));
    
    uploadButton.addEventListener('click', function() {
        const fileInput = document.getElementById('profile_picture');
        const file = fileInput.files[0];
        
        if (!file) {
            uploadStatus.innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Pilih foto terlebih dahulu.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
            return;
        }
        
        const formData = new FormData(uploadForm);
        
        // Tampilkan indikator loading
        uploadButton.disabled = true;
        uploadButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span>Mengupload...';
        
        // Simulasi upload
        setTimeout(() => {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Update foto profil
                const profileImage = document.getElementById('profileImage');
                const avatarContainer = document.querySelector('.rounded-circle.bg-light');
                
                if (profileImage) {
                    profileImage.src = e.target.result;
                } else {
                    // Hapus ikon dan ganti dengan gambar
                    avatarContainer.innerHTML = '';
                    const newImage = document.createElement('img');
                    newImage.src = e.target.result;
                    newImage.alt = 'Foto Profil';
                    newImage.className = 'rounded-circle w-100 h-100 object-fit-cover';
                    newImage.id = 'profileImage';
                    avatarContainer.appendChild(newImage);
                }
                
                // Tampilkan pesan sukses
                uploadStatus.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">Foto profil berhasil diupload!<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
                
                // Tutup modal dan reset
                uploadModal.hide();
                uploadForm.reset();
                imagePreview.classList.add('d-none');
                imagePlaceholder.classList.remove('d-none');
                resetUploadButton();
                
                // Hapus pesan status setelah 3 detik
                setTimeout(() => {
                    uploadStatus.innerHTML = '';
                }, 3000);
            };
            reader.readAsDataURL(file);
        }, 1500);
    });
    
    function resetUploadButton() {
        uploadButton.disabled = false;
        uploadButton.innerHTML = '<i class="fas fa-upload me-2"></i>Upload Foto';
    }
    
    // Reset form saat modal ditutup
    document.getElementById('uploadModal').addEventListener('hidden.bs.modal', function() {
        uploadForm.reset();
        imagePreview.classList.add('d-none');
        imagePlaceholder.classList.remove('d-none');
        uploadStatus.innerHTML = '';
        resetUploadButton();
    });
});
</script>
@endsection