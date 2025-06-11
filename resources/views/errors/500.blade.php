<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunucu Hatası</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-color: #f9fafb;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }
        .error-container {
            max-width: 90%;
            width: 500px;
        }
        .error-container img {
            width: 100%;
            height: auto;
        }
        .home-link {
            margin-top: 20px;
            display: inline-block;
            padding: 12px 24px;
            background-color: #ef4444;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .home-link:hover {
            background-color: #dc2626;
        }
    </style>
</head>
<body>
<div class="error-container">
    <img src="{{ asset('images/404.svg') }}" alt="Sunucu Hatası">
    <a href="{{ url('/') }}" class="home-link">Anasayfaya Dön</a>
</div>
</body>
</html>
