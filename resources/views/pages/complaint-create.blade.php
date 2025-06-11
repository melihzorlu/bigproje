<!-- resources/views/complaint/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="card shadow rounded-4">
            <div class="card-body p-4">
                <h4 class="mb-4 fw-bold">Deneyim Oluştur</h4>
                <ul class="nav nav-pills mb-4" id="steps-nav">
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="pill" href="#step1">1. Deneyim Detayı</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#step2">2. Anket</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#step3">3. Kurum Bilgileri</a></li>
                </ul>

                <form id="complaintForm" enctype="multipart/form-data">
                    <div class="tab-content">
                        <!-- Step 1 -->
                        <div class="tab-pane fade show active" id="step1">
                            <div class="mb-3">
                                <label class="form-label">Deneyiminiz</label>
                                <textarea name="complaint_detail" class="form-control" rows="5" required></textarea>
                                <small class="text-warning">Deneyiminizin anlaşılır olması için uzun cümlelerden kaçının.</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Görsel veya Belge Ekle</label>
                                <input type="file" name="attachments[]" class="form-control" multiple accept="image/*,.pdf">
                            </div>

                            <button type="button" class="btn btn-success" onclick="nextStep(2)">Devam Et</button>
                        </div>

                        <!-- Step 2 -->
                        <div class="tab-pane fade" id="step2">
                            <div class="mb-3">
                                <label class="form-label">Size nasıl yardımcı olalım?</label>
                                <select name="support_option" class="form-select" required>
                                    <option value="">Seçiniz</option>
                                    <option value="call">Telefonla aransın</option>
                                    <option value="email">E-posta ile dönüş yapılsın</option>
                                </select>
                            </div>

                            <button type="button" class="btn btn-secondary me-2" onclick="goToStep(1)">Geri</button>
                            <button type="button" class="btn btn-success" onclick="nextStep(3)">Devam Et</button>
                        </div>

                        <!-- Step 3 -->
                        <div class="tab-pane fade" id="step3">
                            <div class="mb-3">
                                <label class="form-label">Kurum Adı</label>
                                <input type="text" name="company_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Şube Adı (Varsa)</label>
                                <input type="text" name="branch_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vergi Kimlik Numarası</label>
                                <input type="text" name="tax_number" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Firma E-Posta Adresi</label>
                                <input type="email" name="company_email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Açık Adres</label>
                                <textarea name="company_address" class="form-control" required></textarea>
                            </div>

                            <button type="button" class="btn btn-secondary me-2" onclick="goToStep(2)">Geri</button>
                            <button type="submit" class="btn btn-primary">Gönder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function nextStep(step) {
            const currentStep = step - 1;
            const currentFields = document.querySelector(`#step${currentStep}`).querySelectorAll('input, textarea, select');
            for (const field of currentFields) {
                if (!field.checkValidity()) {
                    field.reportValidity();
                    return;
                }
            }
            goToStep(step);
        }

        function goToStep(step) {
            const navLinks = document.querySelectorAll('#steps-nav .nav-link');
            const tabs = document.querySelectorAll('.tab-pane');

            navLinks.forEach(link => link.classList.remove('active'));
            tabs.forEach(tab => tab.classList.remove('show', 'active'));

            document.querySelector(`#steps-nav .nav-link[href='#step${step}']`).classList.add('active');
            document.querySelector(`#step${step}`).classList.add('show', 'active');
        }
    </script>

    <style>
        #steps-nav {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 2rem;
        }
        #steps-nav .nav-link {
            flex: 1;
            text-align: center;
            border-radius: 1rem;
            margin: 0 4px;
            background-color: #f1f1f1;
            color: #333;
            padding: 12px;
            font-weight: bold;
            border: 1px solid transparent;
            transition: all 0.3s ease;
        }
        #steps-nav .nav-link.active {
            background-color: #0d6efd;
            color: #fff;
            border-color: #0d6efd;
        }
        .tab-pane {
            animation: fadeIn 0.3s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>

@endsection
