<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content p-4 p-lg-5 rounded-4 shadow-sm border-0">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="modal-title fw-bold text-dark" id="registerModalLabel">👤 Üye Ol</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>

            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf
                <input type="hidden" name="source" value="registerModal">

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any() && (old('source') === 'registerModal' || session('modal') === 'registerModal'))
                    <div class="alert alert-danger">Lütfen aşağıdaki hataları düzeltin.</div>
                @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" name="first_name" class="form-control form-control-lg @error('first_name') is-invalid @enderror" placeholder="Ad" value="{{ old('first_name') }}" required>
                        @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="last_name" class="form-control form-control-lg @error('last_name') is-invalid @enderror" placeholder="Soyad" value="{{ old('last_name') }}" required>
                        @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="E-posta" value="{{ old('email') }}" required autocomplete="email">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="phone" id="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" placeholder="Telefon" value="{{ old('phone') }}" required>
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="tc_no" id="tc_no" class="form-control form-control-lg @error('tc_no') is-invalid @enderror" placeholder="T.C. Kimlik No" value="{{ old('tc_no') }}" required>
                        @error('tc_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="date" name="birth_date" id="birth_date" class="form-control form-control-lg @error('birth_date') is-invalid @enderror" value="{{ old('birth_date') }}" required>
                        @error('birth_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 position-relative">
                        <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Şifre" required>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <button type="button" class="btn btn-sm position-absolute top-50 end-0 translate-middle-y me-3" onclick="togglePassword('password')">👁</button>
                    </div>

                    <div class="col-md-6 position-relative">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg" placeholder="Şifre (Tekrar)" required>
                        <button type="button" class="btn btn-sm position-absolute top-50 end-0 translate-middle-y me-3" onclick="togglePassword('password_confirmation')">👁</button>
                    </div>
                </div>

                <div class="form-check mt-4">
                    <input class="form-check-input @error('contract_accepted') is-invalid @enderror" type="checkbox" id="agreement" name="contract_accepted" {{ old('contract_accepted') ? 'checked' : '' }}>
                    <label class="form-check-label" for="agreement">
                        <a href="/bireysel-uyelik-sozlesmesi" target="_blank" class="text-decoration-underline text-dark">Üyelik Sözleşmesi</a>'ni okudum ve kabul ediyorum.
                    </label>
                    @error('contract_accepted') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success w-100 py-3 fw-semibold">✅ Üye Ol</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const phoneInput = document.getElementById("phone");
        const birthDateInput = document.getElementById("birth_date");

        // Telefon maskeleme
        phoneInput.addEventListener("input", () => {
            let value = phoneInput.value.replace(/\D/g, "").substring(0, 11);
            let formatted = "";
            if (value.length > 0) formatted += value.substring(0, 4);
            if (value.length >= 5) formatted += " " + value.substring(4, 7);
            if (value.length >= 8) formatted += " " + value.substring(7, 9);
            if (value.length >= 10) formatted += " " + value.substring(9, 11);
            phoneInput.value = formatted;
        });

        // Şifre göster/gizle
        window.togglePassword = function (id) {
            const input = document.getElementById(id);
            input.type = input.type === "password" ? "text" : "password";
        };

        // Maksimum doğum tarihi = 18 yaş
        const today = new Date();
        const year = today.getFullYear() - 18;
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        birthDateInput.max = `${year}-${month}-${day}`;
    });
</script>

@if ($errors->any() && (old('source') === 'registerModal' || session('modal') === 'registerModal'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = new bootstrap.Modal(document.getElementById('registerModal'));
            modal.show();
        });
    </script>
@endif
