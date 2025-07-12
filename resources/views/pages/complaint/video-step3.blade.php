<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Firma Seç</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap --><!-- Bootstrap JS ve Popper.js (modal için gerekli) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
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

        .file-upload-box {
            margin-top: 30px;
            border: 2px dashed #a58fff;
            border-radius: 16px;
            padding: 30px;
            text-align: center;
        }

        .btn-upload {
            background: #7f67f8;
            color: #fff;
            padding: 8px 25px;
            border: none;
            border-radius: 30px;
            font-weight: bold;
            cursor: pointer;
            display: inline-block;
        }

        #file-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }

        .preview-item {
            position: relative;
            width: 100px;
            height: 100px;
        }

        .preview-item img, .file-box {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .remove-btn {
            position: absolute;
            top: -8px;
            right: -8px;
            background: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            text-align: center;
            line-height: 20px;
            font-size: 14px;
            cursor: pointer;
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

            <form method="POST" action="{{ route('complaints.video.complete', $complaint->id) }}" enctype="multipart/form-data">
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

                {{-- Dosya Yükleme Alanı --}}
                <div class="file-upload-box">
                    <input type="file" name="files[]" id="files" accept=".jpg,.jpeg,.png,.webp,.pdf" multiple style="display: none;">
                    <label for="files" class="btn-upload">+ Görsel/PDF Ekle</label>
                    <div id="file-preview" class="mt-3"></div>
                </div>
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="approvalCheckbox" required>
                    <label class="form-check-label" for="approvalCheckbox" data-bs-toggle="modal" data-bs-target="#approvalModal">
                        Yukarıdaki koşulları anladığımı ve gerekli belgeleri yükleyeceğimi onaylıyorum.
                    </label>
                </div>
                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-success">Tamamla</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="approvalModal" tabindex="-1" aria-labelledby="approvalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approvalModalLabel">Deneyim Girişi Öncesi Bilgilendirme</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>
            <div class="modal-body">
                <p>Deneyim girişi yapmadan önce lütfen aşağıdaki maddeyi dikkatlice okuyunuz ve onaylayınız:</p>
                <ul>
                    <li>Deneyimlerinizin sistemimizde yayınlanabilmesi için girmiş olduğunuz çalışma dönemine ait geçerli bir belge sunmanız gerekmektedir.</li>
                    <li><strong>Sigortalı çalışma durumunda:</strong> İlgili döneme ait SGK hizmet dökümü veya benzeri resmi bir sigortalılık belgesi yüklemeniz zorunludur.</li>
                    <li><strong>Sigortasız çalışma durumunda:</strong> Çalıştığınızı kanıtlayan (işveren yazısı, maaş bordrosu, işyerine ait antetli belge, çalışma ortamına ait görsel materyaller vb.) niteliğinde bir belge veya fotoğraf yüklemeniz gerekmektedir.</li>
                </ul>
                <p>Belirtilen belgelerin yüklenmemesi durumunda, girmiş olduğunuz deneyim sistemimiz tarafından yayınlanmayacaktır.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Anladım</button>
            </div>
        </div>
    </div>
</div>

<<!-- ...head içeriği aynı kalıyor... -->

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

        // ==== Dosya Seçimi ve Önizleme ====
        const filesInput = document.getElementById('files');
        const previewArea = document.getElementById('file-preview');
        let allFiles = [];

        filesInput.addEventListener('change', function () {
            const newFiles = Array.from(this.files);

            newFiles.forEach(file => {
                if (file.size > 15 * 1024 * 1024) {
                    alert(`${file.name} 15MB'den büyük!`);
                    return;
                }

                if (allFiles.find(f => f.name === file.name && f.size === file.size)) return;

                allFiles.push(file);

                const wrapper = document.createElement('div');
                wrapper.classList.add('preview-item');

                const removeBtn = document.createElement('button');
                removeBtn.classList.add('remove-btn');
                removeBtn.innerHTML = '&times;';
                removeBtn.onclick = () => {
                    wrapper.remove();
                    allFiles = allFiles.filter(f => f !== file);
                    updateFileList();
                };

                if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    wrapper.appendChild(img);
                } else {
                    const fileBox = document.createElement('div');
                    fileBox.className = 'file-box';
                    fileBox.innerText = file.name.split('.').pop().toUpperCase();
                    wrapper.appendChild(fileBox);
                }

                wrapper.appendChild(removeBtn);
                previewArea.appendChild(wrapper);
            });

            updateFileList();
            filesInput.value = '';
        });

        function updateFileList() {
            const dataTransfer = new DataTransfer();
            allFiles.forEach(f => dataTransfer.items.add(f));
            filesInput.files = dataTransfer.files;
        }

        // Onay kutusu kontrolü
        document.querySelector('form').addEventListener('submit', function (e) {
            const checkbox = document.getElementById('approvalCheckbox');
            if (!checkbox.checked) {
                e.preventDefault();
                alert("Lütfen onay kutusunu işaretleyiniz.");
            }
        });
    });
</script>
</body>
</html>
