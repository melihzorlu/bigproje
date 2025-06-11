@extends('layouts.app')

@section('title', 'Anasayfa')

@section('content')
    <section class="banner py-5" style="background-color: #f7f7fc; margin-top: -48px !important;">
        <div class="container-fluid px-0">
            <div class="row align-items-center g-0">

                <div class="col-lg-6 pe-0">
                    <div class="position-relative">
                        <img style="z-index: 100; top: 30px;" src="{{ asset('images/anasayfa-section-1.png') }}" class="img-fluid w-100" alt="section-1">
                    </div>
                </div>
                <div style="margin-top:1.5rem !important; " class="col-lg-6 text-lg-start ps-5">
                    <h1 style="font-family: 'Metropolis', sans-serif; font-size: 55px;
    font-weight: 500 !important;" class="fw-bold display-4">Çözüm için</h1>
                    <h2 style="font-family: 'Metropolis', sans-serif; font-size: 35px;
    font-weight: 400 !important;"  class="text-dark fw-semibold">Firma CV</h2>
                    <form  style="padding-right: 30px; !important;" class="mt-4 d-flex justify-content-center" style="margin-bottom: 1.5rem !important;" id="banner-search-form">
                        <div class="input-group shadow-sm" style="border-radius: 50px; overflow: hidden; max-width: 700px; width: 100%;">
                            <span class="input-group-text bg-white border-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" class="form-control border-0" placeholder="Firma, sektör, şirket ara" aria-label="Search" style="border-radius: 0;">
                            <button class="btn px-4 text-white" type="submit" style=" background-color: #00b46c; border-radius: 0;">Ara</button>
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
                            <span class="view-count">👁️ {{ number_format($complaint->view_count ?? 0, 0, ',', '.') }}</span>
                            <span class="date">{{ $complaint->created_at->diffForHumans() }}</span>
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
                            <span class="view-count">👁️ {{ number_format($complaint->view_count ?? 0, 0, ',', '.') }}</span>
                            <span class="date">{{ $complaint->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="trending-section py-5 text-center">
        <h2 class="section-title mb-4">Çok Konuşulanlar</h2>
        <div class="trending-container px-3">
            <button class="slide-btn left" onclick="slideLeft()">&#10094;</button>
            <div class="trending-wrapper" id="trendingWrapper">
                <!-- Card 1 -->
                <div class="trending-card white-card">
                    <img src="profile1.jpg" alt="User" class="profile-img">
                    <div class="card-content text-start">
                        <strong>Adem</strong>
                        <span class="views">👁️ 453</span>
                        <p>Saraç Store Siteye Erişim Sağlanmıyor!</p>
                        <a href="#" class="category">🔗 Saraç Store</a>
                    </div>
                    <span class="comments text-start">💬 14 Yorum</span>
                </div>

                <!-- Card 2 -->
                <div class="trending-card purple-card">
                    <img src="profile2.jpg" alt="User" class="profile-img">
                    <div class="card-content text-start">
                        <strong>Esra</strong>
                        <span class="views">👁️ 797</span>
                        <p>Garanti Bankası'nın Hesabıma Bilgi Vermeden Bloke Koyması</p>
                        <a href="#" class="category text-white">🔗 Garanti BBVA</a>
                    </div>
                    <span class="comments">💬 12 Yorum</span>
                </div>

                <!-- Card 3 -->
                <div class="trending-card purple-card">
                    <img src="profile2.jpg" alt="User" class="profile-img">
                    <div class="card-content text-start">
                        <strong>Esra</strong>
                        <span class="views">👁️ 797</span>
                        <p>Garanti Bankası'nın Hesabıma Bilgi Vermeden Bloke Koyması</p>
                        <a href="#" class="category text-white">🔗 Garanti BBVA</a>
                    </div>
                    <span class="comments">💬 12 Yorum</span>
                </div>
                <div class="trending-card purple-card">
                    <img src="profile2.jpg" alt="User" class="profile-img">
                    <div class="card-content text-start">
                        <strong>Esra</strong>
                        <span class="views">👁️ 797</span>
                        <p>Garanti Bankası'nın Hesabıma Bilgi Vermeden Bloke Koyması</p>
                        <a href="#" class="category text-white">🔗 Garanti BBVA</a>
                    </div>
                    <span class="comments">💬 12 Yorum</span>
                </div>


                <div class="trending-card purple-card">
                    <img src="profile2.jpg" alt="User" class="profile-img">
                    <div class="card-content text-start">
                        <strong>Esra</strong>
                        <span class="views">👁️ 797</span>
                        <p>Garanti Bankası'nın Hesabıma Bilgi Vermeden Bloke Koyması</p>
                        <a href="#" class="category text-white">🔗 Garanti BBVA</a>
                    </div>
                    <span class="comments">💬 12 Yorum</span>
                </div>
            </div>
            <button class="slide-btn right" onclick="slideRight()">&#10095;</button>
        </div>
    </section>

    <section class="py-5 position-relative overflow-hidden">
        <div class="container">
            <div class="row align-items-center">

                <!-- Yazı Alanı -->
                <div class="col-md-5">
                    <h2 class="text-secondary fw-bold">FirmaCv<br><span class="text-dark"></span></h2>
                    <p class="text-secondary mt-4">
FirmaCv kuruluş amacı olarak lorem ipsum dolar sit amet
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

        <style>
            .shape {
                position: absolute;
                border-radius: 50%;
                opacity: 0.15;
                z-index: -1;
            }

            .shape1 {
                width: 120px;
                height: 120px;
                background-color: #5a8dee;
                top: -20px;
                right: 0;
            }

            .shape2 {
                width: 160px;
                height: 160px;
                background-color: #28c76f;
                bottom: -50px;
                right: 15%;
            }

            .shape3 {
                width: 200px;
                height: 200px;
                background-color: #7367f0;
                bottom: 20px;
                right: -60px;
            }

            .shape4 {
                width: 100px;
                height: 100px;
                background-color: #ff9f43;
                bottom: -30px;
                left: 10%;
            }
        </style>
    </section>

    <style>
        .trending-section {
            padding: 40px;
            background: #f7f7fc;
            text-align: center;
        }
        .section-title {
            font-size: 24px;
            font-weight: bold;
            color: #555;
            margin-bottom: 20px;
        }
        .trending-container {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .trending-wrapper {
            display: flex;
            gap: 20px;
            overflow: hidden;
            width: 80%;
        }
        .trending-card {
            width: 300px;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        .white-card {
            background: white;
        }
        .purple-card {
            background: #6c5ce7;
            color: white;
            border: 1px solid white;
        }
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        .card-content {
            margin-top: 10px;
        }
        .category {
            display: block;
            color: inherit;
            font-weight: bold;
        }
        .comments {
            font-size: 14px;
            color: gray;
            margin-top: 10px;
        }
        .slide-btn {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            padding: 10px;
            position: absolute;
        }
        .left { left: 10px; }
        .right { right: 10px; }

        /*GÜNDEMDEKİ PERSONEL DENEYİMLERİ CSS*/
       .trending-complaints {
           background-color: #f7f7fc;
           padding: 40px 0;
       }

       .complaint-row {
           overflow: hidden;
           padding: 15px 0;
       }

       .complaint-track {
           display: flex;
           gap: 20px;
           width: max-content;
       }

       .complaint-card {
           background: #fff;
           border-radius: 12px;
           box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
           min-width: 400px;
           max-width: 400px;
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

       /* Animasyonlar */
        .left-scroll .complaint-track {
            animation: scroll-left 60s linear infinite;
        }

        .right-scroll .complaint-track {
            animation: scroll-right 60s linear infinite;
        }

        @keyframes scroll-left {
            0% {
                transform: translateX(0%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        @keyframes scroll-right {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(0%);
            }
        }
        /*GÜNDEMDEKİ PERSONEL DENEYİMLERİ CSS*/
    </style>

    <script>
        const wrapper = document.getElementById("trendingWrapper");
        let scrollAmount = 0;

        function slideLeft() {
            scrollAmount = Math.max(scrollAmount - 320, 0);
            wrapper.style.transform = `translateX(-${scrollAmount}px)`;
        }

        function slideRight() {
            const maxScroll = wrapper.scrollWidth - wrapper.clientWidth;
            scrollAmount = Math.min(scrollAmount + 320, maxScroll);
            wrapper.style.transform = `translateX(-${scrollAmount}px)`;
        }
    </script>
@endsection
