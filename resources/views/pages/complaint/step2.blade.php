<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Firma Seçimi - Deneyim Yaz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            overflow: hidden;
        }

        .left-panel {
            width: 280px;
            background: #272635;
            color: white;
            padding: 40px 20px;
            border-top-right-radius: 40px;
            border-bottom-right-radius: 40px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
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
            width: 100%;
        }

        .left-panel li {
            margin-bottom: 15px;
            font-size: 15px;
            font-weight: 500;
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
            overflow-y: auto;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border-radius: 15px;
            padding: 12px 16px;
            font-size: 15px;
        }

        .btn-back {
            background: #ddd;
            color: black;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 30px;
            border: none;
            margin-top: 20px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-next {
            background: #3ddc84;
            color: white;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 30px;
            border: none;
            margin-top: 20px;
            align-self: flex-end;
        }

        @media (max-width: 768px) {
            .experience-container {
                flex-direction: column;
                min-height: auto;
            }

            .left-panel {
                width: 100%;
                border-radius: 0;
                text-align: center;
                align-items: center;
                padding: 40px 20px 30px 20px;
            }

            .left-panel h5 {
                font-size: 22px;
            }

            .left-panel ul {
                margin-top: 20px;
            }

            .left-panel li {
                font-size: 16px;
            }

            .right-panel {
                border-radius: 0;
                padding: 30px 20px;
            }

            .btn-next,
            .btn-back {
                width: 100%;
                text-align: center;
            }

            .form-control,
            .form-select {
                font-size: 14px;
                padding: 10px 14px;
            }
        }
    </style>
</head>
<body>
<div class="experience-container">
    <!-- Sol Panel -->
    <div class="left-panel">
        <a href="/" class="logo">
            <img width="175px" src="{{ asset('images/fimracvlogo.svg') }}" alt="FirmaCv">
        </a>
        <h5>Deneyim Yaz</h5>
        <ul>
            <li><strong>1.</strong> Şikayet Detayı</li>
            <li class="active"><strong>2.</strong> Firma</li>
            <li><strong>3.</strong> Belge</li>
        </ul>
    </div>

    <!-- Sağ Panel -->
    <div class="right-panel">
        <form action="{{ route('complaints.store.step2', $complaint->id) }}" method="POST">
            @csrf

            <!-- Firma Seçimi -->
            <label for="company_id" class="form-label">Çalıştığınız Firmayı Seçin</label>
            <select name="company_id" id="company_id" class="form-control mb-3" required>
                <option value="">Firma Seçiniz</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
                <option value="new">+ Yeni Firma Ekle</option>
            </select>

            <!-- Şube Seçimi -->
            <!-- Şube Seçimi -->
            <div id="branch-area" class="mb-3" style="{{ old('company_id', $complaint->company_id) === 'new' ? 'display:none;' : '' }}">
                <label for="branch_id">Şube Seçiniz</label>
                <select name="branch_id" id="branch_id" class="form-select"  data-selected="{{ old('branch_id', $complaint->branch_id) }}">                    <option value="">Şube seçiniz</option>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}" {{ old('branch_id', $complaint->branch_id) == $branch->id ? 'selected' : '' }}>
                            {{ $branch->name }} - {{ $branch->address }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Yeni Firma ve Şube Alanları -->
            <div id="new-company-fields" style="display: none;">
                <div class="mb-2">
                    <label for="new_name" class="form-label">Firma Adı</label>
                    <input type="text" name="new_name" id="new_name" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="new_address" class="form-label">Adres</label>
                    <input type="text" name="new_address" id="new_address" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="new_tax_number" class="form-label">Vergi Numarası</label>
                    <input type="text" name="new_tax_number" id="new_tax_number" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="new_mersis_no" class="form-label">MERSİS Numarası</label>
                    <input type="text" name="new_mersis_no" id="new_mersis_no" class="form-control">
                </div>

                <hr>
                <h6>Şube Bilgileri</h6>
                <div class="mb-2">
                    <label for="new_branch_name" class="form-label">Şube Adı</label>
                    <input type="text" name="new_branch_name" id="new_branch_name" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="new_branch_address" class="form-label">Şube Adresi</label>
                    <input type="text" name="new_branch_address" id="new_branch_address" class="form-control">
                </div>
            </div>

            <a href="{{ route('deneyim.yaz.yazarak') }}" class="btn-back">Geri</a>
            <button type="submit" class="btn-next">Devam Et →</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const companySelect = document.getElementById('company_id');
        const newCompanyFields = document.getElementById('new-company-fields');
        const branchArea = document.getElementById('branch-area');
        const branchSelect = document.getElementById('branch_id');
        const selectedBranchId = branchSelect.dataset.selected;

        function fetchBranches(companyId, selectedId = null) {
            fetch(`/branches/by-company/${companyId}`)
                .then(response => response.json())
                .then(data => {
                    branchSelect.innerHTML = '<option value="">Şube Seçiniz</option>';
                    data.forEach(branch => {
                        const option = document.createElement('option');
                        option.value = branch.id;
                        option.textContent = branch.name + ' - ' + branch.address;

                        if (selectedId && selectedId == branch.id) {
                            option.selected = true;
                        }

                        branchSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error("Şube getirme hatası:", error);
                });
        }

        function updateBranchFields(companyId) {
            if (companyId === 'new') {
                newCompanyFields.style.display = 'block';
                branchArea.style.display = 'none';
            } else if (companyId) {
                newCompanyFields.style.display = 'none';
                branchArea.style.display = 'block';
                fetchBranches(companyId);
            } else {
                newCompanyFields.style.display = 'none';
                branchArea.style.display = 'none';
            }
        }

        // Firma seçimi değiştiğinde
        companySelect.addEventListener('change', function () {
            const selected = this.value;
            updateBranchFields(selected);
        });

        // Sayfa ilk yüklendiğinde
        const initialCompanyId = companySelect.value;
        if (initialCompanyId && initialCompanyId !== 'new') {
            newCompanyFields.style.display = 'none';
            branchArea.style.display = 'block';
            fetchBranches(initialCompanyId, selectedBranchId);
        } else if (initialCompanyId === 'new') {
            newCompanyFields.style.display = 'block';
            branchArea.style.display = 'none';
        } else {
            newCompanyFields.style.display = 'none';
            branchArea.style.display = 'none';
        }
    });
</script>
</body>
</html>
