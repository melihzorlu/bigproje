<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Şikayet Açıklaması</title>
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
            padding: 60px;
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
                padding: 30px 20px;
                border-radius: 0;
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
        <h5>Deneyim Yaz</h5>
        <ul>
            <li><strong>1.</strong> Video ile Anlat</li>
            <li class="active"><strong>2.</strong> Açıklama</li>
            <li><strong>3.</strong> Firma / Kategori</li>
        </ul>
    </div>

    <!-- Sağ Panel -->
    <div class="right-panel">
        <div class="form-box">
            <h4 class="mb-4 text-center">Şikayet Açıklaması</h4>
            <form method="POST" action="{{ route('complaints.video.step2.store', $complaint->id) }}">
                @csrf
                <div class="form-group mb-3">
                    <textarea name="description" class="form-control" rows="8" placeholder="Yaşadığınız sorunu detaylıca anlatınız..." required>{{ old('description', $complaint->description) }}</textarea>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success">Devam Et →</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
