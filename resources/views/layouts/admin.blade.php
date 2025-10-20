<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Seminar Management')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-light">
    @include('partials.nav')
    
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ms-sm-auto px-md-4 py-4">
                <!-- Tombol Back yang bisa di-override di section -->
                @hasSection('back-button')
                    @yield('back-button')
                @else
                    <div class="mb-4">
                        <a href="javascript:history.back()" class="btn-back">
                            <i class="fas fa-arrow-left me-2"></i>
                            Kembali
                        </a>
                    </div>
                @endif
                
                <div class="fade-in">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>