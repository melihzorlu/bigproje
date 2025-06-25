<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kategori ve Detay - Deneyim Yaz</title>
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

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            border-radius: 15px;
            padding: 12px 16px;
        }

        .btn-next {
            background: #3ddc84;
            color: white;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 30px;
            border: none;
            margin-top: 20px;
        }

        .btn-back {
            background: #ddd;
            color: black;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 30px;
            border: none;
            margin-top: 20px;
            margin-right: 10px;
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
            <li><strong>1.</strong> Şikayet Detayı</li>
            <li><strong>2.</strong> Firma</li>
            <li class="active"><strong>3.</strong> Belge / Kategori</li>
        </ul>
    </div>

    <!-- Sağ Panel -->
    <div class="right-panel">
        <div class="form-box">
            <h4 class="mb-4">Lütfen şikayetinizle ilgili kategoriyi ve detayları belirtin</h4>

            <form method="POST" action="{{ route('complaints.step3.store', $complaint->id) }}">
                @csrf

                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori Seçin</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        <option value="">Kategori seçin...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="details" class="form-label">Ek Detaylar</label>
                    <textarea name="details" id="details" class="form-control" rows="5" placeholder="Eklemek istediğiniz detaylar..."></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('complaints.step2', $complaint->id) }}" class="btn-back">Geri</a>
                    <button type="submit" class="btn-next">Tamamla</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
