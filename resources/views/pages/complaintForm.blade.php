@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="card shadow p-4">
            <h2 class="mb-4">Şikayet Oluştur</h2>

            <form id="complaintForm" enctype="multipart/form-data">
                <div id="step-1" class="step">
                    <h5>1. Şikayet Detayı</h5>
                    <div class="mb-3">
                        <label for="complaint" class="form-label">Şikayetiniz</label>
                        <textarea class="form-control" id="complaint" name="complaint" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">Belge veya Görsel Yükle</label>
                        <input type="file" class="form-control" name="attachments[]" id="file" multiple>
                    </div>
                    <button type="button" class="btn btn-primary next-step">Devam Et</button>
                </div>

                <div id="step-2" class="step d-none">
                    <h5>2. Anket Soruları</h5>
                    <div class="mb-3">
                        <label class="form-label">Hizmetten memnun kaldınız mı?</label>
                        <select class="form-select" name="satisfaction">
                            <option value="">Seçiniz</option>
                            <option value="yes">Evet</option>
                            <option value="no">Hayır</option>
                        </select>
                    </div>

                    <button type="button" class="btn btn-secondary prev-step">Geri</button>
                    <button type="button" class="btn btn-primary next-step">Devam Et</button>
                </div>

                <div id="step-3" class="step d-none">
                    <h5>3. Kurum Bilgileri</h5>
                    <div class="mb-3">
                        <label class="form-label">Kurum Adı</label>
                        <input type="text" class="form-control" name="company_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Şube Adı (Opsiyonel)</label>
                        <input type="text" class="form-control" name="branch_name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Vergi Kimlik Numarası</label>
                        <input type="text" class="form-control" name="tax_id" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Firma Mail Adresi</label>
                        <input type="email" class="form-control" name="company_email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Açık Adres</label>
                        <textarea class="form-control" name="address" required></textarea>
                    </div>

                    <button type="button" class="btn btn-secondary prev-step">Geri</button>
                    <button type="submit" class="btn btn-success">Gönder</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        let currentStep = 1;

        function showStep(step) {
            document.querySelectorAll('.step').forEach(div => div.classList.add('d-none'));
            document.getElementById(`step-${step}`).classList.remove('d-none');
            currentStep = step;
        }

        document.querySelectorAll('.next-step').forEach(btn => {
            btn.addEventListener('click', () => {
                if (currentStep === 1) {
                    const complaint = document.getElementById('complaint').value.trim();
                    if (!complaint) {
                        alert("Lütfen şikayetinizi yazınız.");
                        return;
                    }
                }
                showStep(currentStep + 1);
            });
        });

        document.querySelectorAll('.prev-step').forEach(btn => {
            btn.addEventListener('click', () => {
                showStep(currentStep - 1);
            });
        });

        document.getElementById('complaintForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert("Şikayet başarıyla gönderildi!");
            // Form post işlemleri burada yapılabilir.
        });
    </script>
@endpush
