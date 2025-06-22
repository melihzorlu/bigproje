<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'FirmaCv')</title>

    <!-- Vendor CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>

<!-- Sticky Header -->
<header class="desktop-header sticky-header bg-white shadow-sm py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a href="/" class="logo">
            <img src="{{ asset('images/fimracvlogo.svg') }}" alt="FirmaCv" class="logo-img">
        </a>

        <!-- Mobil: Deneyimi Yaz Butonu -->
        <a href="{{ auth()->check() ? route('deneyim.yaz') : '#' }}"
           class="btn btn-purple d-md-none {{ auth()->check() ? '' : 'trigger-login-warning' }}">
            + Deneyimi Yaz
        </a>

        <!-- Mobil: Hamburger Menü -->
        <button class="hamburger-menu d-md-none border-0 bg-transparent fs-2" id="menuToggle">&#9776;</button>

        <!-- Masaüstü: Butonlar -->
        <div class="d-none d-md-flex align-items-center gap-3">
            @auth
                <!-- Profil avatarı -->
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; font-weight: bold;">
                    {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}
                </div>

                <!-- Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/profilim">Profilim</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Çıkış Yap</button>
                            </form>
                        </li>
                    </ul>
                </div>

                <!-- Deneyim Butonu -->
                <a href="{{ route('deneyim.yaz') }}" class="btn btn-purple">+ Deneyimi Yaz</a>
            @else
                <a href="#" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Giriş Yap / Üye Ol
                </a>
                <a href="#" class="btn btn-purple trigger-login-warning">+ Deneyimi Yaz</a>
            @endauth
        </div>

        <!-- Mobil Menü -->
        <div class="mobile-menu position-fixed top-0 end-0 bg-white shadow p-4 d-none" id="mobileMenu" style="width: 80%; height: 100vh; z-index: 9999;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0">Menü</h5>
                <button id="menuClose" class="btn-close"></button>
            </div>

            @auth
                <p class="fw-bold mb-2">{{ Auth::user()->name }}</p>
                <a href="/profilim" class="btn btn-outline-secondary w-100 mb-2">Profilim</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-danger w-100 mb-3" type="submit">Çıkış Yap</button>
                </form>
            @else
                <a href="#" class="btn btn-outline-success w-100 mb-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Giriş Yap / Üye Ol
                </a>
            @endauth

            <input type="text" class="form-control mb-3" placeholder="Ara...">
            <a href="{{ auth()->check() ? route('deneyim.yaz') : '#' }}" class="btn btn-purple w-100 {{ auth()->check() ? '' : 'trigger-login-warning' }}">+ Deneyimi Yaz</a>
        </div>
    </div>
</header>

<!-- Giriş Gerekli Modal -->
<div class="modal fade" id="loginRequiredModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4 text-center">
            <h5 class="modal-title">Devam Etmek İçin Giriş Yapmalısınız</h5>
            <div class="mt-3">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">
                    Giriş Yap
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Vendor JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script>
    document.querySelectorAll('.trigger-login-warning').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            var loginModal = new bootstrap.Modal(document.getElementById('loginRequiredModal'));
            loginModal.show();
        });
    });
</script>

@include('pages.login-modal')
@include('pages.register-modal')

@stack('scripts')
</body>
</html>
