@extends('layouts.app')

@section('title', 'Edit About - Admin Panel')

@section('content')
<div class="container py-5">
    <!-- Tombol Back -->
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ url('/admin/dashboard') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>
                Kembali ke Dashboard
            </a>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-5 fw-bold text-primary mb-3">Edit Halaman About</h1>
            <p class="lead text-muted">Kelola foto profil untuk halaman tentang kami</p>
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
                                    @if($profilePicture)
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
                            
                            @if($profilePicture)
                            <div class="mt-3">
                                <button type="button" class="btn btn-outline-danger btn-sm" id="removePhotoBtn">
                                    <i class="fas fa-trash me-1"></i> Hapus Foto
                                </button>
                            </div>
                            @endif
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
                                            <p class="h6 mb-0">Pemrograman Web</p>
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
                                            <p class="h6 mb-0">Ibu Mega Permata Sapani, S.Kom., M.T.</p>
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
    const removePhotoBtn = document.getElementById('removePhotoBtn');
    
    uploadButton.addEventListener('click', function() {
        const fileInput = document.getElementById('profile_picture');
        const file = fileInput.files[0];
        
        if (!file) {
            showAlert('Pilih foto terlebih dahulu.', 'warning');
            return;
        }
        
        const formData = new FormData(uploadForm);
        
        // Tampilkan indikator loading
        uploadButton.disabled = true;
        uploadButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span>Mengupload...';
        
        // Upload ke server
        fetch('{{ route("admin.about.upload-photo") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update foto profil
                updateProfileImage(data.path);
                showAlert(data.message, 'success');
                uploadModal.hide();
                
                // Tampilkan tombol hapus foto
                if (!removePhotoBtn) {
                    location.reload();
                }
            } else {
                showAlert(data.message, 'danger');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('Terjadi kesalahan saat mengupload foto.', 'danger');
        })
        .finally(() => {
            resetUploadButton();
        });
    });
    
    // Hapus foto
    if (removePhotoBtn) {
        removePhotoBtn.addEventListener('click', function() {
            if (!confirm('Apakah Anda yakin ingin menghapus foto profil?')) {
                return;
            }
            
            removePhotoBtn.disabled = true;
            removePhotoBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Menghapus...';
            
            fetch('{{ route("admin.about.remove-photo") }}', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Hapus gambar dan tampilkan placeholder
                    const profileImage = document.getElementById('profileImage');
                    const avatarContainer = document.querySelector('.rounded-circle.bg-light');
                    
                    avatarContainer.innerHTML = '<i class="fas fa-user-graduate fa-4x text-primary"></i>';
                    showAlert(data.message, 'success');
                    
                    // Sembunyikan tombol hapus
                    removePhotoBtn.remove();
                } else {
                    showAlert(data.message, 'danger');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('Terjadi kesalahan saat menghapus foto.', 'danger');
            })
            .finally(() => {
                removePhotoBtn.disabled = false;
                removePhotoBtn.innerHTML = '<i class="fas fa-trash me-1"></i> Hapus Foto';
            });
        });
    }
    
    function updateProfileImage(path) {
        const profileImage = document.getElementById('profileImage');
        const avatarContainer = document.querySelector('.rounded-circle.bg-light');
        
        if (profileImage) {
            profileImage.src = '{{ asset("storage/") }}/' + path;
        } else {
            avatarContainer.innerHTML = '';
            const newImage = document.createElement('img');
            newImage.src = '{{ asset("storage/") }}/' + path;
            newImage.alt = 'Foto Profil';
            newImage.className = 'rounded-circle w-100 h-100 object-fit-cover';
            newImage.id = 'profileImage';
            avatarContainer.appendChild(newImage);
        }
    }
    
    function resetUploadButton() {
        uploadButton.disabled = false;
        uploadButton.innerHTML = '<i class="fas fa-upload me-2"></i>Upload Foto';
    }
    
    function showAlert(message, type) {
        uploadStatus.innerHTML = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
        
        // Hapus pesan status setelah 5 detik
        setTimeout(() => {
            const alert = uploadStatus.querySelector('.alert');
            if (alert) {
                alert.remove();
            }
        }, 5000);
    }
    
    // Reset form saat modal ditutup
    document.getElementById('uploadModal').addEventListener('hidden.bs.modal', function() {
        uploadForm.reset();
        imagePreview.classList.add('d-none');
        imagePlaceholder.classList.remove('d-none');
        resetUploadButton();
    });
});
</script>
@endsection