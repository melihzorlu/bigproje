<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deneyimini Yaz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff;
            font-family: 'Segoe UI', sans-serif;
        }
        .experience-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            position: relative;
            text-align: center;
            padding: 1rem;
        }
        .experience-logo {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        .experience-logo img {
            height: 60px;
            margin-right: 8px;
        }
        .experience-logo strong {
            font-size: 18px;
            color: #000;
        }
        .experience-home {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 22px;
            color: #000;
            text-decoration: none;
        }
        .experience-question {
            font-size: 22px;
            margin-bottom: 2rem;
        }
        .experience-options {
            display: flex;
            flex-direction: row;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        .experience-option {
            width: 180px;
            height: 180px;
            background-color: #7f67f8;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 30px;
            text-decoration: none;
            transition: transform 0.2s;
        }
        .experience-option:hover {
            transform: scale(1.05);
        }
        .experience-option img {
            height: 72px;
            margin-bottom: 12px;
        }
        .experience-option span {
            font-weight: bold;
            font-size: 16px;
        }
        @media (max-width: 576px) {
            .experience-option {
                width: 150px;
                height: 150px;
            }
            .experience-option img {
                height: 64px;
            }
            .experience-option span {
                font-size: 14px;
            }
            .experience-question {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
<div class="experience-wrapper">
    <a href="/" class="experience-home" title="Ana Sayfa">
        <i class="fa-solid fa-house"></i>
    </a>
    <a href="/" class="experience-logo">
        <img src="{{ asset('images/fimracvlogo.svg') }}" alt="Firma CV">
    </a>

    <div class="experience-question">Deneyiminizi nasıl iletmek istersiniz?</div>

    <div class="experience-options">
        <a href="{{ route('deneyim.yaz.video') }}" class="experience-option">
            <img src="{{ asset('images/video-cam.svg') }}" alt="Video ile anlat">
            <span>Video ile anlat</span>
        </a>
        <a href="{{ route('deneyim.yaz.yazarak') }}" class="experience-option">
            <img  src="{{ asset('images/write-pencil.svg') }}" alt="Yazarak anlat">
            <span>Yazarak anlat</span>
        </a>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
