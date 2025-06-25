@extends('layouts.app') {{-- header/footer olmayan özel layout --}}
@section('title', 'Deneyim Yaz')

@section('content')
    <style>
        body {
            background-color: #f5f6fa;
            margin: 0;
            padding: 0;
        }
        .experience-layout {
            display: flex;
            height: 100vh;
        }
        .experience-sidebar {
            background-color: #1c1c2e;
            width: 280px;
            color: white;
            padding: 2rem 1rem;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            border-top-left-radius: 32px;
            border-bottom-left-radius: 32px;
        }
        .experience-sidebar img {
            height: 40px;
            margin-bottom: 2rem;
        }
        .experience-sidebar .step {
            font-size: 16px;
            margin: 0.8rem 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .experience-content {
            flex-grow: 1;
            padding: 3rem;
            background-color: #f5f6fa;
            border-top-right-radius: 32px;
            border-bottom-right-radius: 32px;
        }
        .experience-box {
            background: #ffffff;
            border-radius: 24px;
            padding: 2rem;
        }
        textarea {
            width: 100%;
            border-radius: 16px;
            border: none;
            padding: 1rem;
            height: 160px;
            resize: none;
            background-color: #f8f9fb;
        }
        .upload-box {
            border: 2px dashed #9f8efc;
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            margin-top: 1.5rem;
        }
        .upload-box button {
            background-color: #7f67f8;
            color: white;
            padding: 0.6rem 2rem;
            border-radius: 30px;
            border: none;
            font-weight: bold;
        }
        .continue-btn {
            margin-top: 2rem;
            text-align: right;
        }
        .continue-btn button {
            background-color: #4ccc84;
            color: white;
            border: none;
            padding: 0.6rem 2rem;
            border-radius: 30px;
            font-weight: bold;
        }
    </style>

    <div class="experience-layout">
        <div class="experience-sidebar">
            <img src="{{ asset('images/fimracvlogo.svg') }}" alt="Logo">
            <div class="text-white fw-bold fs-5 mb-4">Deneyim Yaz</div>
            <div class="step"><span>1</span> Şikayet Detayı</div>
            <div class="step"><span>2</span> Firma</div>
            <div class="step"><span>3</span> Belge</div>
        </div>
        <div class="experience-content">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="experience-box">
                    <textarea name="description" placeholder="Ürün veya hizmetle ilgili nasıl bir sorun yaşadınız?" required></textarea>

                    <div class="upload-box">
                        <button type="button" onclick="document.getElementById('images').click()">+ Görsel Ekle</button>
                        <input type="file" name="images[]" id="images" multiple hidden accept="image/*">
                    </div>

                    <div class="continue-btn">
                        <button type="submit">Devam Et →</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
