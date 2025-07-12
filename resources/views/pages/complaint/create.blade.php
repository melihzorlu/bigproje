<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Deneyim Yaz</title>
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

        .right-panel {
            flex: 1;
            padding: 80px 60px;
            background: linear-gradient(to bottom right, #f7f8fd, #f5f6fa);
            border-top-right-radius: 40px;
            border-bottom-right-radius: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow-y: auto;
            max-height: 100vh;
        }

        .custom-input {
            background-color: white;
            border-radius: 20px;
            border: none;
            width: 100%;
            padding: 20px;
            font-size: 16px;
            margin-bottom: 20px;
        }

        textarea.custom-input {
            height: 180px;
            resize: none;
        }

        .file-upload-box {
            margin-top: 10px;
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

        .btn-next {
            background-color: #3ddc84;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 30px;
            font-weight: bold;
            margin-top: 30px;
            align-self: flex-end;
        }

        #file-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
            justify-content: flex-start;
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

        .char-counter {
            font-size: 14px;
            color: #888;
            text-align: right;
            margin-top: -15px;
            margin-bottom: 15px;
        }

        .form-check {
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .experience-container {
                flex-direction: column;
            }

            .left-panel {
                width: 100%;
                border-radius: 0;
                text-align: center;
                padding: 20px 15px;
            }

            .right-panel {
                border-radius: 0;
                padding: 30px 20px;
            }

            .custom-input {
                padding: 16px;
                font-size: 15px;
            }

            textarea.custom-input {
                height: 150px;
            }

            .file-upload-box {
                padding: 20px 15px;
            }

            .preview-item {
                width: 80px;
                height: 80px;
            }

            .remove-btn {
                width: 20px;
                height: 20px;
                font-size: 12px;
                top: -6px;
                right: -6px;
            }

            .btn-next {
                width: 100%;
                align-self: center;
                text-align: center;
                margin-top: 20px;
            }

            .char-counter {
                margin-top: -10px;
                margin-bottom: 10px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>

<div class="experience-container">
    <div class="left-panel">
        <a href="/" class="logo">
            <img width="175px" src="{{ asset('images/fimracvlogo.svg') }}" alt="FirmaCv" class="logo-img">
        </a>
        <h5> Deneyim Yaz</h5>
        <ul>
            <li><strong>1.</strong> Şikayet Detayı</li>
            <li><strong>2.</strong> Firma</li>
            <li><strong>3.</strong> Belge</li>
        </ul>
    </div>

    <div class="right-panel">
        <form id="experienceForm" action="{{ route('complaints.store.step1') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" id="title" class="custom-input" placeholder="Deneyeminize bir başlık verin" required>
            <textarea name="description" id="description" minlength="270" class="custom-input" placeholder="Lütfen bizimle deneyiminizi paylaşın..." required></textarea>
            <div class="char-counter"><span id="char-count">0</span> karakter </div>
            <div class="file-upload-box mt-3">
                <input type="file" name="files[]" id="files" accept=".jpg,.jpeg,.png,.webp,.pdf" multiple style="display: none;">
                <label for="files" class="btn-upload">+ Görsel/PDF Ekle</label>
                <div id="file-preview" class="mt-3"></div>
            </div>
            <div class="form-check mt-4">
                <input class="form-check-input" type="checkbox" value="1" id="confirmationCheckbox">
                <label class="form-check-label" for="confirmationCheckbox">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#infoModal">Yukarıdaki koşulları anladım ve gerekli belgeleri yükleyeceğimi onaylıyorum.</a>
                </label>
            </div>
            <button type="submit" class="btn-next">Devam Et →</button>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel">Onaylamadan Devam Edemezsiniz</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>
            <div class="modal-body">
                Deneyim girişi yapmadan önce lütfen aşağıdaki maddeyi dikkatlice okuyunuz ve onaylayınız.<br><br>
                Deneyimlerinizin sistemimizde yayınlanabilmesi için girmiş olduğunuz çalışma dönemine ait geçerli bir belge sunmanız gerekmektedir.<br><br>
                <ul>
                    <li><strong>Sigortalı çalışma durumunda:</strong> SGK hizmet dökümü veya benzeri resmi belge.</li>
                    <li><strong>Sigortasız çalışma durumunda:</strong> İşveren yazısı, maaş bordrosu, iş yeri belgesi, görsel materyal vb.</li>
                </ul>
                Belirtilen belgelerin yüklenmemesi durumunda deneyiminiz yayınlanmayacaktır.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('description').addEventListener('input', function () {
        document.getElementById('char-count').textContent = this.value.length;
    });

    document.getElementById('experienceForm').addEventListener('submit', function (e) {
        if (!document.getElementById('confirmationCheckbox').checked) {
            e.preventDefault();
            new bootstrap.Modal(document.getElementById('infoModal')).show();
        }
    });

    document.getElementById('files').addEventListener('change', function (e) {
        const previewArea = document.getElementById('file-preview');
        previewArea.innerHTML = '';

        const files = Array.from(e.target.files);
        const title = document.getElementById('title').value || 'baslik';
        const userId = {{ auth()->id() ?? 0 }};
        const dateStr = new Date().toISOString().split('T')[0];

        files.forEach((file, index) => {
            if (file.size > 5 * 1024 * 1024) {
                previewArea.innerHTML += `<div style="color:red">${file.name} 5MB'den büyük!</div>`;
                return;
            }

            const ext = file.name.split('.').pop();
            const newFileName = `${userId}_${dateStr}_${slugify(title)}_${index}.${ext}`;

            const wrapper = document.createElement('div');
            wrapper.classList.add('preview-item');

            const removeBtn = document.createElement('button');
            removeBtn.classList.add('remove-btn');
            removeBtn.innerHTML = '&times;';
            removeBtn.onclick = () => wrapper.remove();

            if (file.type.startsWith('image/')) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                wrapper.appendChild(img);
            } else {
                const fileBox = document.createElement('div');
                fileBox.className = 'file-box';
                fileBox.innerText = ext.toUpperCase();
                wrapper.appendChild(fileBox);
            }

            wrapper.appendChild(removeBtn);
            previewArea.appendChild(wrapper);
        });

        function slugify(str) {
            return str.toString().toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-')
                .replace(/^-+/, '')
                .replace(/-+$/, '');
        }
    });
</script>

</body>
</html>
