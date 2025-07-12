<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Firma Seç</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: #f5f6fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .experience-container {
            display: flex;
            min-height: 100vh;
        }
        .left-panel {
            width: 280px;
            background: #272635;
            color: white;
            padding: 40px 20px;
            border-top-right-radius: 40px;
            border-bottom-right-radius: 40px;
        }
        .left-panel img {
            height: 40px;
            margin-bottom: 40px;
        }
        .left-panel h5 {
            font-size: 20px;
            font-weight: bold;
        }
        .left-panel ul {
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }
        .left-panel li {
            margin-bottom: 15px;
            font-size: 15px;
        }
        .left-panel li.active {
            color: #3ddc84;
            font-weight: bold;
        }

        .right-panel {
            flex: 1;
            padding: 80px 60px;
            background: linear-gradient(to bottom right, #f7f8fd, #f5f6fa);
            border-top-right-radius: 40px;
            border-bottom-right-radius: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-box {
            background-color: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        @media (max-width: 768px) {
            .experience-container {
                flex-direction: column;
            }
            .left-panel {
                width: 100%;
                border-radius: 0;
                text-align: center;
            }
            .right-panel {
                border-radius: 0;
                padding: 40px 20px;
            }
        }
    </style>
</head>
<body>
<div class="experience-container">
    <!-- Sol Panel -->
    <div class="left-panel">
        <a href="/" class="logo">
            <img width="175px" src="{{ asset('images/fimracvlogo.svg') }}" alt="FirmaCv" class="logo-img">
        </a>
        <h5> Deneyim Yaz</h5>
        <ul>
            <li><strong>1.</strong> Video Kaydet</li>
            <li><strong>2.</strong> Açıklama</li>
            <li class="active"><strong>3.</strong> Firma Seçimi</li>
        </ul>
    </div>

    <!-- Sağ Panel -->
    <div class="right-panel">
        <div class="form-box">
            <h4 class="mb-4 text-center">Hangi firmayla sorun yaşadınız?</h4>

            <form method="POST" action="{{ route('complaints.video.complete', $complaint->id) }}">
                @csrf

                {{-- Firma Seçimi --}}
                <div class="form-group mb-3">
                    <label for="company_id">Firma Seçiniz</label>
                    <select name="company_id" id="company_id" class="form-select" required>
                        <option value="">Firma seçiniz</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ $complaint->company_id == $company->id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                        <option value="new">+ Yeni Firma Ekle</option>
                    </select>
                </div>

                {{-- Şube Seçimi --}}
                <div id="branch-area" class="form-group mb-3" style="display: none;">
                    <label for="branch_id">Şube Seçiniz</label>
                    <select name="branch_id" id="branch_id" class="form-select">
                        <option value="">Şube seçiniz</option>
                    </select>
                </div>

                {{-- Yeni Firma Alanı --}}
                <div id="new-company-fields" style="display: none;">
                    <div class="mb-2">
                        <label>Firma Adı</label>
                        <input type="text" name="new_name" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label>Adres</label>
                        <input type="text" name="new_address" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label>Vergi Numarası</label>
                        <input type="text" name="new_tax_number" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label>MERSİS Numarası (Opsiyonel)</label>
                        <input type="text" name="new_mersis_no" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label>Şube Adı</label>
                        <input type="text" name="new_branch_name" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label>Şube Adresi</label>
                        <input type="text" name="new_branch_address" class="form-control">
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-success">Tamamla</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const companySelect = document.getElementById('company_id');
        const newFields = document.getElementById('new-company-fields');
        const branchArea = document.getElementById('branch-area');
        const branchSelect = document.getElementById('branch_id');

        companySelect.addEventListener('change', function () {
            const selectedValue = this.value;

            if (selectedValue === 'new') {
                newFields.style.display = 'block';
                branchArea.style.display = 'none';
                branchSelect.innerHTML = '';
            } else if (selectedValue !== '') {
                newFields.style.display = 'none';
                branchArea.style.display = 'block';

                fetch(`/branches/by-company/${selectedValue}`)
                    .then(response => response.json())
                    .then(data => {
                        branchSelect.innerHTML = '<option value="">Şube seçiniz</option>';
                        data.forEach(branch => {
                            branchSelect.innerHTML += `<option value="${branch.id}">${branch.name}</option>`;
                        });
                    });
            } else {
                newFields.style.display = 'none';
                branchArea.style.display = 'none';
                branchSelect.innerHTML = '';
            }
        });

        if (companySelect.value && companySelect.value !== 'new') {
            companySelect.dispatchEvent(new Event('change'));
        }
    });
</script>
</body>
</html>
