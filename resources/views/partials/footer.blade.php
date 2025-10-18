<footer class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h4 class="fw-bold text-pink mb-3">
                    <i class="fas fa-graduation-cap me-2"></i>SeminarKu
                </h4>
                <p class="text-light">Platform terdepan untuk manajemen dan pendaftaran seminar dengan pengalaman terbaik bagi peserta dan penyelenggara.</p>
                <div class="social-links mt-3">
                    <a href="#" class="btn btn-outline-light btn-sm me-2">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm me-2">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm me-2">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="text-pink mb-3">Menu</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-light text-decoration-none">Home</a></li>
                    <li class="mb-2"><a href="{{ route('seminars.index') }}" class="text-light text-decoration-none">Seminar</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-light text-decoration-none">Tentang</a></li>
                    <li class="mb-2"><a href="{{ route('login') }}" class="text-light text-decoration-none">Login</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-pink mb-3">Kontak</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-envelope me-2 text-pink"></i>
                        <span class="text-light">info@seminarku.com</span>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-phone me-2 text-pink"></i>
                        <span class="text-light">+62 21 1234 5678</span>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-map-marker-alt me-2 text-pink"></i>
                        <span class="text-light">Jakarta, Indonesia</span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 mb-4">
                <h5 class="text-pink mb-3">Newsletter</h5>
                <p class="text-light">Dapatkan update seminar terbaru langsung ke email Anda.</p>
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="Email Anda">
                    <button class="btn btn-pink" type="button">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
        <hr class="my-4 border-pink">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-light mb-0">&copy; 2024 SeminarKu. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-light text-decoration-none me-3">Privacy Policy</a>
                <a href="#" class="text-light text-decoration-none">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>