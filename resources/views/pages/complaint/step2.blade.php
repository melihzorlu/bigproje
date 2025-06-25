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
        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
        }
        .form-control {
            border-radius: 15px;
            padding: 12px 16px;
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
            <li class="active"><strong>2.</strong> Firma</li>
            <li><strong>3.</strong> Belge</li>
        </ul>
    </div>

    <!-- Sağ Panel -->
    <div class="right-panel">
        <form action="{{ route('complaints.store.step2', $complaint->id) }}" method="POST">
            @csrf
            <label for="company_id" class="form-label">Çalıştığınız Firmayı Seçin</label>
            <select name="company_id" id="company_id" class="form-control" required>
                <option value="">Firma Seçiniz</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
            <a href="{{ route('deneyim.yaz.yazarak') }}" class="btn-back">  Geri</a>
            <button type="submit" class="btn-next">Devam Et →</button>
        </form>
    </div>
</div>

</body>
</html>
