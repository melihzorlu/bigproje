@extends('layouts.app')

@section('title', 'Deneyimini Yazarak Anlat')

@section('content')
    <style>
        .step-wrapper {
            max-width: 700px;
            margin: 0 auto;
            padding: 60px 20px;
            min-height: 100vh;
        }
        .step-wrapper h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        .step {
            display: none;
        }
        .step.active {
            display: block;
        }
    </style>

    <div class="step-wrapper">
        <h2>Deneyimini Paylaş</h2>

        <form method="POST" action="{{ route('deneyim.yaz.kaydet') }}" enctype="multipart/form-data">
            @csrf

            <!-- Step 1: Firma -->
            <div class="step step-1 active">
                <label for="firma" class="form-label">Deneyim yaşadığınız firmanın adını yazın</label>
                <input type="text" id="firma" name="firma" class="form-control mb-4" required>
                <button type="button" class="btn btn-primary next">İleri</button>
            </div>

            <!-- Step 2: Şikayet -->
            <div class="step step-2">
                <label for="detay" class="form-label">Yaşadığınız deneyimi detaylıca anlatın</label>
                <textarea id="detay" name="detay" class="form-control mb-4" rows="6" required></textarea>
                <button type="button" class="btn btn-secondary back">Geri</button>
                <button type="button" class="btn btn-primary next">İleri</button>
            </div>

            <!-- Step 3: Belgeler -->
            <div class="step step-3">
                <label for="belgeler" class="form-label">Belge veya fotoğraf yükleyin</label>
                <input type="file" id="belgeler" name="belgeler[]" class="form-control mb-4" multiple>

                <button type="button" class="btn btn-secondary back">Geri</button>
                <button type="submit" class="btn btn-success">Tamamla</button>
            </div>
        </form>
    </div>

    <script>
        const steps = document.querySelectorAll('.step');
        let currentStep = 0;

        document.querySelectorAll('.next').forEach(btn => {
            btn.addEventListener('click', () => {
                steps[currentStep].classList.remove('active');
                currentStep++;
                steps[currentStep].classList.add('active');
            });
        });

        document.querySelectorAll('.back').forEach(btn => {
            btn.addEventListener('click', () => {
                steps[currentStep].classList.remove('active');
                currentStep--;
                steps[currentStep].classList.add('active');
            });
        });
    </script>
@endsection
