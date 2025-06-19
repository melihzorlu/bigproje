<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content p-4 p-lg-5 rounded-4">
            <div class="d-flex justify-content-between mb-3">
                <h5 class="modal-title fw-bold" id="registerModalLabel">Üye Ol</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>

            <form method="POST" action="/register">
                @csrf

                <div class="mb-3">
                    <input type="text" name="first_name" class="form-control" placeholder="Ad" required>
                </div>

                <div class="mb-3">
                    <input type="text" name="last_name" class="form-control" placeholder="Soyad" required>
                </div>

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="E-posta" required>
                </div>

                <div class="mb-3">
                    <input type="text" name="phone" class="form-control" placeholder="Telefon" required>
                </div>

                <div class="mb-3">
                    <input type="text" name="tc_no" class="form-control" placeholder="T.C. Kimlik No" required>
                </div>

                <div class="mb-3">
                    <input type="date" name="birth_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Şifre" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Şifre (Tekrar)" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Üye Ol</button>
            </form>
        </div>
    </div>
</div>
