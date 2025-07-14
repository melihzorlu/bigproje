@extends('layouts.app')

@section('title', 'Anasayfa')
<style src="{{ asset('css/app.css') }}?v={{ time() }}"></style>
<script src="{{ asset('js/app.js') }}?v={{ time()}}"></script>
@section('content')
    <section class="banner py-5" style="background-color: #f7f7fc; margin-top: -48px !important;">
        <div class="container-fluid px-0">
            <div class="row align-items-center g-0">

                <div class="col-lg-6 pe-0">
                    <div class="position-relative">
                        <img style="z-index: 100; top: 30px;" src="{{ asset('images/anasayfa-section-1.webp') }}" class="img-fluid w-100" alt="home-section">
                    </div>
                </div>
                <div class="col-lg-6 ps-5" style="margin-top:1.5rem; ">
                    <h1 style="font-family: 'Metropolis', sans-serif; font-size: 55px; font-weight: 500;" class="fw-bold display-4">Çözüm için</h1>
                    <h2 style="font-family: 'Metropolis', sans-serif; font-size: 35px; font-weight: 400;" class="text-dark fw-semibold">Firma CV</h2>

                    <form class="mt-4 d-flex justify-content-start" style="padding-right: 30px; margin-bottom: 1.5rem;" id="banner-search-form">
                        <div class="input-group shadow-sm" style="border-radius: 50px; overflow: hidden; max-width: 700px; width: 100%;">
                            <span class="input-group-text bg-white border-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" class="form-control border-0" placeholder="Firma, sektör,şirket ara" aria-label="Search" style="border-radius: 0;">
                            <button class="btn px-4 text-white" type="submit" style="background-color: #00b46c; border-radius: 0;">Ara</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- Kayan Kutucuklar Bölümü -->
    <section class="trending-complaints">
        <h2 class="text-dark text-center fw-semibold" style="color: #85878e !important; font-weight: lighter !important;">
            Gündemdeki Personel Deneyimleri
        </h2>

        @php
            $half = ceil($complaints->count() / 2);
            $topComplaints = $complaints->take($half);
            $bottomComplaints = $complaints->slice($half);
        @endphp


        <!-- ÜST SIRA - sola kayanlar -->
        <!-- ÜST SIRA - sola kayanlar -->
        <div class="complaint-row left-scroll">
            <div class="complaint-track">
                @foreach ($topComplaints as $complaint)
                    <a href="{{ route('complaint.show', $complaint->slug) }}" class="text-decoration-none text-dark">
                        <div class="complaint-card">
                            <div class="user-info">
                                <img src="{{ asset('images/orn-sikayet.jpg') }}" alt="User">
                                <div class="meta">
                                    <strong>{{ $complaint->user->name ?? 'Anonim' }}</strong>
                                    <span>{{ $complaint->company->name ?? 'Şirket Yok' }}</span>
                                </div>
                            </div>
                            <p class="complaint-text">{{ Str::limit($complaint->description, 100) }}</p>
                            <div class="card-footer">
<span class="view-count" style="display: inline-flex; align-items: center; font-size: 0.85rem; color: #777;">
    <img src="{{ asset('images/review-icon.svg') }}"
         alt="Görüntüleme"
         style="width: 40px; height: 40px; ">
    {{ number_format($complaint->view_count ?? 0, 0, ',', '.') }}
</span>                                    <span class="date">{{ $complaint->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>


        <!-- ALT SIRA - sağa kayanlar -->
        <div class="complaint-row right-scroll">
            <div class="complaint-track">
                @foreach ($bottomComplaints as $complaint)
                    <a href="{{ route('complaint.show', $complaint->slug) }}" class="text-decoration-none text-dark">
                        <div class="complaint-card">
                            <div class="user-info">
                                <img src="{{ asset('images/orn-sikayet.jpg') }}" alt="User">
                                <div class="meta">
                                    <strong>{{ $complaint->user->name ?? 'Anonim' }}</strong>
                                    <span>{{ $complaint->company->name ?? 'Şirket Yok' }}</span>
                                </div>
                            </div>
                            <p class="complaint-text">{{ Str::limit($complaint->description, 100) }}</p>
                            <div class="card-footer">
<span class="view-count" style="display: inline-flex; align-items: center; font-size: 0.85rem; color: #777;">
    <img src="{{ asset('images/review-icon.svg') }}"
         alt="Görüntüleme"
         style="width: 40px; height: 40px; ">
    {{ number_format($complaint->view_count ?? 0, 0, ',', '.') }}
</span>                                <span class="date">{{ $complaint->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>


        <!-- HTML -->
        <section class="ck-slider-section py-5 text-center position-relative overflow-hidden">
            <h2 class="ck-section-title mb-4" style="margin-right: 25px !important; margin-bottom: 35px !important;">
                <span class="ck-title-text">Çok Konuşulanlar</span>
            </h2>

            <div class="ck-slider-container d-flex align-items-center">
                <button class="ck-slide-btn left">&#10094;</button>

                <div class="ck-slider-viewport flex-grow-1" id="ckSliderViewport">
                    <div class="ck-slider-track d-flex" id="ckSliderTrack">
                        @foreach($complaints as $index => $complaint)
                            <div class="ck-slide-card" data-index="{{ $index }}">
                                {{-- Kullanıcı Görseli veya Baş Harfi --}}
                                @if(isset($complaint->user->profile_image))
                                    <img src="{{ asset('storage/' . $complaint->user->profile_image) }}" alt="User" class="ck-profile-img">
                                @else
                                    <div class="ck-profile-circle ck-bg-purple">
                                        {{ strtoupper(mb_substr($complaint->user->name ?? 'U', 0, 1)) }}
                                    </div>
                                @endif

                                <div class="ck-card-content text-start">
                                    {{-- Kullanıcı İsmi --}}
                                    <strong class="d-block mb-1">{{ $complaint->user->name ?? 'Anonim' }}</strong>

                                    <a href="{{ route('complaint.show', $complaint->slug) }}" class="text-decoration-none">
                                        <p class="fw-semibold mb-1">
                                            {{ \Illuminate\Support\Str::limit($complaint->title, 80) }}
                                        </p>
                                    </a>

                                    <p class="text-muted small" style="font-size: 0.875rem;">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($complaint->description), 100) }}
                                    </p>

                                    {{-- Şirket Adı --}}
                                    <a href="{{ route('complaint.show', $complaint->slug) }}"
                                       class="ck-category d-inline-flex align-items-center gap-1 text-decoration-none text-dark">
                                        <img src="{{ asset('images/short-link.svg') }}" alt="Şirket Linki" style="width: 20px; height: 20px;">
                                        {{ $complaint->company->name ?? 'Bilinmeyen Şirket' }}
                                    </a>

                                    {{-- Görüntülenme Sayısı --}}
                                    <span class="view-count d-inline-flex align-items-center mt-2" style="font-size: 0.85rem; color: #777;">
                                <img src="{{ asset('images/review-icon.svg') }}" alt="Yorum" style="width: 18px; height: 18px; margin-right: 4px;">
                                {{ number_format($complaint->view_count ?? 0, 0, ',', '.') }}
                            </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button class="ck-slide-btn right">&#10095;</button>
            </div>
        </section>



        <section class="career-center-section text-white text-center d-flex align-items-center">
            <div class="container py-5">
                <h2 class="fw-semibold mb-4">FirmaCV Kariyer Geliştirme Merkezi</h2>
                <p class="lead fs-6">
                    FirmaCV olarak, deneyimlerinizi paylaşmanızın yanı sıra, kariyerinizde ilerlemeniz için size özel bir
                    Kariyer Geliştirme Merkezi sunuyoruz. Merkezimizde görev alan İnsan Kaynakları (İK) kariyer danışmanlarımız,
                    potansiyelinizi ortaya çıkarmanız ve eksiklerinizi gidermeniz için size birebir destek sağlıyor.
                </p>
                <p class="lead fs-6">
                    Demo iş mülakatları aracılığıyla kendinizi geliştirme fırsatı bulacak, danışmanlarımızla yapacağınız birebir
                    görüşmelerle profesyonel CV hazırlama, LinkedIn hesabınızı optimize etme ve etkili sunum teknikleri gibi
                    konularda kapsamlı rehberlik alacaksınız. Kariyer yolculuğunuzda size eşlik ederek, başarıya ulaşmanız için
                    gerekli tüm araçları sunuyoruz.
                </p>
                <a href="/kariyer-gelistirme-merkezi" class="btn btn-success px-4 py-2 mt-3">Kariyer Geliştirme Merkezi’ne Üye Ol</a>
            </div>
        </section>
        <section class="py-5 position-relative overflow-hidden">
        <div class="container">
            <div class="row align-items-center">

                <!-- Yazı Alanı -->
                <div class="col-md-5">
                    <h2 class="text-secondary fw-bold"> FirmaCV Deneyim Paylaşım Platformuna Katılım Rehberi<br><span class="text-dark"></span></h2>
                    <p class="text-secondary mt-4">


                        FirmaCV’ye üye olarak iş hayatındaki deneyimlerinizi güvenle paylaşabilir ve geniş bir topluluğun parçası olabilirsiniz.
                    </p>
                </div>

                <!-- Video Alanı -->
                <div class="col-md-7 text-center position-relative">
                    <div class="ratio ratio-16x9 shadow rounded">
                        <iframe class="rounded" src="https://www.youtube.com/embed/QghRNIBNz6k?si=oPOqBarGLPNrIdRh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>

                    <!-- Arkaplan şekilleri -->
                    <div class="shape shape1"></div>
                    <div class="shape shape2"></div>
                    <div class="shape shape3"></div>
                    <div class="shape shape4"></div>
                </div>

            </div>
        </div>


    </section>
    <section class="py-5 text-center custom-experience-section" style="background-color: #695ce6; color: white; ">
        <div class="container" >
            <h4 class="display-5 fw-bold mb-4 ">İyi Bir Personel Deneyimi Şirketinizin İtibarını Artırır</h4>

            <p class="lead mb-4">
                Olumsuz deneyimler çalışanlar bu düşüncelerini sosyal medyada paylaşmaktan çekinmezler.<br> Personel odaklı bir kültür,
                mutlu çalışanlar demektir; mutlu çalışanlar ise şirketin başarısının anahtarıdır.
            </p>
            <br>
            <a href="/kurumsal-uyelik" class="btn btn-light btn-lg rounded-pill custom-btn-hover">
                Birlikte Çalışalım
            </a>
        </div>
    </section>

        <!-- Başarı Modalı -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg rounded-4 text-center">
                    <div class="modal-body p-5">
                        <div class="text-success mb-3" style="font-size: 3rem;">
                            🎉
                        </div>
                        <h5 class="modal-title fw-semibold mb-3 text-dark" id="successModalLabel">Tebrikler!</h5>
                        <p class="text-muted mb-4">
                            Deneyiminiz başarıyla kaydedilmiştir.<br>İncelendikten sonra yayınlanacaktır.
                        </p>
                        <button type="button" class="btn btn-success px-4 rounded-pill" data-bs-dismiss="modal">
                            Tamam
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Geri Bildirim Modalı -->
        <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form method="POST" action="{{ route('feedback.send') }}" class="w-100">
                    @csrf
                    <div class="modal-content border-0 shadow-lg rounded-4">
                        <div class="modal-header border-0 pb-0 bg-white">
                            <h5 class="modal-title text-dark fw-semibold" id="feedbackModalLabel">
                                💬 Geri Bildiriminiz Var mı?
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
                        </div>

                        <div class="modal-body pt-2">
                    <textarea
                        class="form-control shadow-sm rounded-3 border-light-subtle"
                        name="feedback_message"
                        rows="5"
                        placeholder="Deneyim yazarken karşılaştığınız bir problem ya da öneriniz var mı?"></textarea>
                        </div>

                        <div class="modal-footer border-0 bg-white d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Kapat</button>
                            <button type="submit" class="btn btn-primary rounded-pill px-4">Gönder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modalları Otomatik Aç -->
        @if(session('complaint_success'))
            <script>
                window.addEventListener('DOMContentLoaded', function () {
                    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                    const feedbackModal = new bootstrap.Modal(document.getElementById('feedbackModal'));

                    successModal.show();

                    setTimeout(() => {
                        successModal.hide();
                        setTimeout(() => {
                            feedbackModal.show();
                        }, 500);
                    }, 3000); // 3 saniye sonra feedback modal açılır
                });
            </script>
        @endif


        @if(session('success'))
            <div id="successPopup" class="position-fixed top-0 start-50 translate-middle-x mt-5 p-4 bg-success text-white rounded shadow" style="z-index:9999; display: none; max-width: 90%;">
                {{ session('success') }}
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const popup = document.getElementById('successPopup');
                    if (popup) {
                        popup.style.display = 'block';
                        setTimeout(() => {
                            popup.style.display = 'none';
                        }, 4000); // 4 saniye sonra kapanır
                    }
                });
            </script>
        @endif

        <style>

            .career-center-section {
                min-height: 100vh;
                background-image: url("{{ asset('images/career-center-home2.svg') }}");
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                position: relative;
                padding: 60px 20px;
                z-index: 1;
            }

            .career-center-section::before {
                content: "";
                position: absolute;
                top: 0; left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
            }
            @media (max-width: 768px) {
                .career-center-section {
                    background-size: contain;
                    background-repeat: no-repeat;
                    background-position: center top;
                }
            }
            .career-center-section h2,
            .career-center-section p {
                color: #000000;
            }

            .career-center-section .btn {
                font-weight: 500;
                border-radius: 8px;
            }
            @media (max-width: 768px) {
                .modal-dialog {
                    margin: 1.25rem auto;
                }
            }

            .modal-content {
                border-radius: 1.5rem;
                border: none;
            }

            .modal-title {
                font-size: 1.4rem;
            }

            .btn-success {
                background-color: #28a745;
                border: none;
            }

            .btn-success:hover {
                background-color: #218838;
            }
            @media (max-width: 768px) {
                .modal-dialog {
                    margin: 1.5rem auto;
                }
            }

            .modal-content {
                background: #fff;
                border-radius: 1.25rem;
            }

            .modal-title {
                font-size: 1.25rem;
            }

            textarea.form-control {
                resize: vertical;
                font-size: 1rem;
            }

            .btn-primary {
                background-color: #7f67f8;
                border: none;
            }

            .btn-primary:hover {
                background-color: #6e58e0;
            }
            /* ========== 1. Banner Bölümü ========== */
            .banner {
                background-color: #f7f7fc;
                margin-top: -48px !important;
            }
            .banner h1,
            .banner h2 {
                font-family: 'Metropolis', sans-serif;
            }
            .banner h1 {
                font-size: 55px;
                font-weight: 500;
            }
            .banner h2 {
                font-size: 35px;
                font-weight: 400;
            }

            /* ========== 2. Arama Formu ========== */
            #banner-search-form .input-group {
                border-radius: 50px;
                overflow: hidden;
                max-width: 700px;
                width: 100%;
            }
            #banner-search-form .input-group-text {
                background-color: white;
                border: 0;
            }
            #banner-search-form .form-control {
                border: 0;
                border-radius: 0;
            }
            #banner-search-form .btn {
                background-color: #00b46c;
                color: white;
                border-radius: 0;
            }

            /* ========== 3. Gündemdeki Personel Deneyimleri ========== */
            .trending-complaints {
                background-color: #f7f7fc;
                padding: 2rem 0;
            }
            .complaint-row {
                overflow: hidden;
                padding: 15px 0;
                position: relative;
            }
            .complaint-track {
                display: flex;
                gap: 20px;
                width: max-content;
                animation-duration: 60s;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
            }
            .left-scroll .complaint-track {
                animation-name: scroll-left;
            }
            .right-scroll .complaint-track {
                animation-name: scroll-right;
            }
            @keyframes scroll-left {
                0% { transform: translateX(0%); }
                100% { transform: translateX(-50%); }
            }
            @keyframes scroll-right {
                0% { transform: translateX(-50%); }
                100% { transform: translateX(0%); }
            }
            .complaint-card {
                background: #fff;
                border-radius: 12px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
                min-width: 450px;
                max-width: 450px;
                height: 190px;
                padding: 20px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
            .user-info {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 10px;
            }
            .user-info img {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                object-fit: cover;
            }
            .meta strong {
                font-size: 16px;
                color: #333;
                font-weight: 600;
                display: block;
            }
            .meta span {
                font-size: 14px;
                color: #777;
            }
            .complaint-text {
                font-size: 15px;
                color: #444;
                margin-bottom: 15px;
                line-height: 1.4;
            }
            .card-footer {
                display: flex;
                justify-content: space-between;
                font-size: 13px;
                color: #999;
            }

            /* ========== 4. Çok Konuşulanlar Slider ========== */
            .ck-slider-section {
                height: 500px;
                background-image: url("{{ asset('images/cok-konusulanlar21.svg') }}");
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-color: #f5f6fa;
                border-radius: 8px;
                margin-top: 60px;
                padding: 0 1rem;
                position: relative;
                z-index: 1;
            }
            .ck-section-title {
                color: #85878e;
                font-weight: lighter;
                font-size: 1.75rem;
                margin-bottom: 2rem;
            }
            .ck-slider-container {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
            }
            .ck-slider-viewport {
                overflow: hidden;
                scroll-behavior: smooth;
                width: 100%;
                max-width: 1200px;
                position: relative;
            }
            .ck-slider-track {
                display: flex;
                gap: 2rem;
                transition: transform 0.5s ease-in-out;
                will-change: transform;
                padding: 1rem 2rem;
            }
            .ck-slide-card {
                flex: 0 0 auto;
                width: 400px;
                background: #fff;
                padding: 1.5rem;
                border-radius: 20px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                transform: scale(0.85);
                opacity: 0.4;
                transition: transform 0.5s ease, opacity 0.5s ease;
            }
            .ck-slide-card.active {
                transform: scale(1);
                opacity: 1;
                z-index: 2;
            }
            .ck-profile-img,
            .ck-profile-circle {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                margin-bottom: 0.5rem;
                object-fit: cover;
            }
            .ck-profile-circle {
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                color: white;
            }
            .ck-bg-purple { background-color: #6c63ff; }
            .ck-card-content {
                display: flex;
                flex-direction: column;
                gap: 0.3rem;
            }
            .ck-views {
                margin-left: 0.5rem;
                font-size: 0.85rem;
                opacity: 0.7;
            }
            .ck-category {
                font-size: 0.9rem;
                text-decoration: none;
                color: inherit;
            }
            .ck-comments {
                font-size: 0.9rem;
                margin-top: 0.5rem;
                display: block;
                color: #2e7d32;
            }
            .ck-slide-btn {
                background: #fff;
                border: 1px solid #ccc;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                z-index: 10;
                box-shadow: 0 2px 6px rgba(0,0,0,0.1);
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .ck-slide-btn.left { left: 0.5rem; }
            .ck-slide-btn.right { right: 0.5rem; }

            /* ========== 5. Arka Plan Şekilleri ========== */
            .shape {
                position: absolute;
                border-radius: 50%;
                opacity: 0.15;
                z-index: -1;
            }
            .shape1 { width: 120px; height: 120px; background-color: #5a8dee; top: -20px; right: 0; }
            .shape2 { width: 160px; height: 160px; background-color: #28c76f; bottom: -50px; right: 15%; }
            .shape3 { width: 200px; height: 200px; background-color: #7367f0; bottom: 20px; right: -60px; }
            .shape4 { width: 100px; height: 100px; background-color: #ff9f43; bottom: -30px; left: 10%; }

            /* ========== 6. Custom Experience Section ========== */
            .custom-experience-section {
                background-color: #695ce6;
                color: white;
            }

            /* ========== 7. Mobil Uyumluluk ========== */
            @media (max-width: 768px) {
                .complaint-card,
                .ck-slide-card {
                    width: 90vw;
                    min-width: 90vw;
                    transform: scale(1) !important;
                    opacity: 1 !important;
                }

                .ck-slider-viewport {
                    overflow-x: auto;
                    scroll-snap-type: x mandatory;
                    -webkit-overflow-scrolling: touch;
                }

                .ck-slider-track {
                    padding: 0 1rem;
                }

                .ck-slide-btn {
                    display: none;
                }

                .complaint-track {
                    animation-duration: 60s;
                }
            }
        </style>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                /* === 1. GÜNDEMDEKİ PERSONEL DENEYİMLERİ (Kayan Kartlar) === */
                const complaintRows = document.querySelectorAll(".complaint-row");
                complaintRows.forEach(row => {
                    const track = row.querySelector(".complaint-track");
                    const cards = Array.from(track.children);

                    // Kartları iki kez çoğaltarak sonsuz scroll animasyonuna uygun hale getir
                    cards.forEach(card => {
                        const clone = card.cloneNode(true);
                        track.appendChild(clone);
                    });
                });

                /* === 2. ÇOK KONUŞULANLAR SLIDER === */
                const sliderTrack = document.getElementById("ckSliderTrack");
                const sliderCards = Array.from(sliderTrack?.children || []);
                const viewport = document.getElementById("ckSliderViewport");
                let index = 0;

                function getCardWidth() {
                    const card = sliderCards[0];
                    if (!card) return 0;
                    const style = window.getComputedStyle(card);
                    const marginRight = parseFloat(style.marginRight || 0);
                    const marginLeft = parseFloat(style.marginLeft || 0);
                    return card.offsetWidth + marginLeft + marginRight + 32;
                }

                function updateSlide() {
                    const cardWidth = getCardWidth();
                    const containerWidth = viewport.offsetWidth;
                    const offset = Math.max(0, (cardWidth * index) - ((containerWidth - cardWidth) / 2));
                    sliderTrack.style.transform = `translateX(-${offset}px)`;

                    sliderCards.forEach((card, i) => {
                        card.classList.toggle("active", i === index);
                    });
                }

                function slideLeft() {
                    index = index > 0 ? index - 1 : sliderCards.length - 1;
                    updateSlide();
                }

                function slideRight() {
                    index = index < sliderCards.length - 1 ? index + 1 : 0;
                    updateSlide();
                }

                // Slider butonlarına event
                const btnLeft = document.querySelector(".ck-slide-btn.left");
                const btnRight = document.querySelector(".ck-slide-btn.right");

                if (btnLeft) btnLeft.addEventListener("click", slideLeft);
                if (btnRight) btnRight.addEventListener("click", slideRight);

                // Sayfa yüklendiğinde ortala
                updateSlide();

                // Otomatik kayma (her 2.5 saniyede bir sağa)
                let autoSlideTimer = setInterval(slideRight, 2500);

                // Mobilde kullanıcı dokunursa otomatik scroll durdur
                if (viewport) {
                    viewport.addEventListener("touchstart", () => {
                        clearInterval(autoSlideTimer);
                    });
                }
            });
        </script>
@endsection
