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

                <div class="mb-3 text-end">
                    <small>
                        Hesabınız yok mu?
                        <a href="#" class="text-decoration-none fw-semibold" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Üye Ol</a>
                    </small>
                </div>

                <!-- 🔐 Sosyal Giriş Butonları -->
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

                <!-- E-Posta & Şifre Formu -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="email" class="form-control" placeholder="E-posta veya GSM No" required>
                    </div>

                    <div class="mb-3 position-relative">
                        <input type="password" name="password" class="form-control" placeholder="Şifre (En az 6 Karakter)" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Beni Hatırla</label>
                        </div>
                        <a href="#" class="text-decoration-none small">Şifremi Unuttum</a>
                    </div>

                    <!-- Sahte Güvenlik Kutucuğu -->
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
