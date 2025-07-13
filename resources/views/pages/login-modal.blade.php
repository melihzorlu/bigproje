<!-- LOGIN MODAL -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content d-flex flex-lg-row flex-column p-0 rounded-4 overflow-hidden" style="font-family: 'Segoe UI', sans-serif;">

            <!-- Sol Görsel Alanı -->
            <div class="w-100 w-lg-50 d-none d-lg-block" style="background: url('{{ asset('images/uyelik-login.svg') }}') center center / cover no-repeat;">
            </div>

            <!-- Sağ Form Alanı -->
            <div class="w-100 w-lg-50 p-4 p-lg-5">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="modal-title fw-bold" id="loginModalLabel">Giriş Yap</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
                </div>

                <!-- Üye Ol -->
                <div class="mb-3 text-end">
                    <a href="#" class="register-highlight" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">
                        <i class="fas fa-user-plus me-1"></i> Üye Ol
                    </a>
                </div>

                <!-- Sosyal Giriş Butonları -->
                <div class="d-grid gap-2 mb-4">
                    <a href="{{ route('social.redirect', 'google') }}" class="btn btn-danger w-100">
                        <i class="fab fa-google me-1"></i> Google ile Giriş Yap
                    </a>
                    <a href="{{ route('social.redirect', 'facebook') }}" class="btn btn-primary w-100">
                        <i class="fab fa-facebook-f me-1"></i> Facebook ile Giriş Yap
                    </a>
                    <a href="{{ route('social.redirect', 'linkedin') }}" class="btn btn-info text-white w-100">
                        <i class="fab fa-linkedin-in me-1"></i> LinkedIn ile Giriş Yap
                    </a>
                </div>

                <div class="text-center my-3 text-muted">veya</div>

                <!-- Giriş Formu -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="hidden" name="source" value="loginModal">

                    @if ($errors->has('email') && (old('source') === 'loginModal' || session('modal') === 'loginModal'))
                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                    @endif

                    <div class="mb-3">
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="E-posta veya GSM No" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3 position-relative">
                        <input type="password" name="password" id="login-password" class="form-control" placeholder="Şifre (En az 6 Karakter)" required>
                        <button type="button" class="btn btn-sm position-absolute top-50 end-0 translate-middle-y me-3" onclick="togglePassword('login-password')">👁</button>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Beni Hatırla</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-decoration-none small">Şifremi Unuttum</a>
                    </div>

                    <!-- Sahte güvenlik alanı -->
                    <div class="mb-3 form-check d-flex align-items-center gap-2">
                        <input class="form-check-input" type="checkbox" id="verifyHuman" required>
                        <label class="form-check-label" for="verifyHuman">Gerçek kişi olduğunuzu doğrulayın</label>
                        <img src="{{ asset('images/cloudflare-placeholder.png') }}" alt="Cloudflare" height="30">
                    </div>

                    <button type="submit" class="btn btn-success w-100 py-2 fw-semibold">Giriş Yap</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- CSS -->
<style>
    .register-highlight {
        display: inline-block;
        padding: 0.5rem 1.2rem;
        background: linear-gradient(135deg, #20c997, #198754);
        color: white !important;
        font-weight: 600;
        font-size: 0.95rem;
        border-radius: 50px;
        box-shadow: 0 0 10px rgba(25, 135, 84, 0.4);
        transition: all 0.3s ease-in-out;
        text-decoration: none;
    }

    .register-highlight:hover {
        background: linear-gradient(135deg, #198754, #695ce7);
        box-shadow: 0 0 14px rgba(105, 92, 231, 1);
        transform: scale(1.05);
        color: #fff !important;
    }
</style>

<!-- JS -->
<script>
    function togglePassword(id) {
        const input = document.getElementById(id);
        if (input) {
            input.type = input.type === "password" ? "text" : "password";
        }
    }

    // Giriş hatası varsa loginModal otomatik açılır
    document.addEventListener('DOMContentLoaded', function () {
        @if ($errors->any() && (old('source') === 'loginModal' || session('modal') === 'loginModal'))
        const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
        @endif
    });
</script>
