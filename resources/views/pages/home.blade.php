@extends('layouts.app')

@section('title', 'Anasayfa')
<style src="{{ asset('css/app.css') }}?v={{ time() }}"></style>
<script src="{{ asset('js/app.js') }}?v={{ time() }}"></script>
@section('content')
    <section class="banner py-5" style="background-color: #f7f7fc; margin-top: -48px !important;">
        <div class="container-fluid px-0">
            <div class="row align-items-center g-0">

                <div class="col-lg-6 pe-0">
                    <div class="position-relative">
                        <img style="z-index: 100; top: 30px;" src="{{ asset('images/anasayfa-section-1.png') }}" class="img-fluid w-100" alt="home-section">
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
                                <span class="view-count">👁️ {{ number_format($complaint->view_count ?? 0, 0, ',', '.') }}</span>
                                <span class="date">{{ $complaint->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>


        <!-- HTML -->
        <section class="ck-slider-section py-5 text-center position-relative overflow-hidden">
            <h2 class="ck-section-title mb-4">
                <span class="ck-title-text">Çok Konuşulanlar</span>
            </h2>

            <div class="ck-slider-container">
                <button class="ck-slide-btn left">&#10094;</button>

                <div class="ck-slider-viewport" id="ckSliderViewport">
                    <div class="ck-slider-track" id="ckSliderTrack">
                        @foreach($complaints as $index => $complaint)
                            <div class="ck-slide-card"
                                 data-index="{{ $index }}">
                                @if(isset($complaint->user->profile_image))
                                    <img src="{{ asset('storage/' . $complaint->user->profile_image) }}" alt="User" class="ck-profile-img">
                                @else
                                    <div class="ck-profile-circle ck-bg-purple">
                                        {{ strtoupper(mb_substr($complaint->user->name ?? 'U', 0, 1)) }}
                                    </div>
                                @endif

                                <div class="ck-card-content text-start">
                                    <strong>{{ $complaint->user->name ?? 'Anonim' }}</strong>
                                    <span class="ck-views">👁️{{ $complaint->view_count ?? 5 }}</span>
                                    <a href="{{ route('complaint.show', $complaint->slug) }}" class="text-decoration-none">
                                        <p>{{ \Illuminate\Support\Str::limit($complaint->title, 80) }}</p>
                                    </a>
                                    <a href="{{ route('complaint.show', $complaint->slug) }}" class="ck-category">
                                        🔗 {{ $complaint->company->name ?? 'Bilinmeyen Şirket' }}
                                    </a>
                                </div>

                                <span class="ck-comments">
                            💬 {{ $complaint->comment_count ?? 0 }} Yorum
                        </span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button class="ck-slide-btn right">&#10095;</button>
            </div>
        </section>
       <style>
           /* === GENEL BÖLÜM === */
           .ck-slider-section {
               height: 500px;
               background-image: url("{{ asset('images/cok-konusulanlar.svg') }}");
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

           /* === SLIDER ALANI === */
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

           /* === SLIDER İÇİ === */
           .ck-slider-track {
               display: flex;
               gap: 2rem;
               transition: transform 0.5s ease-in-out;
               will-change: transform;
               padding: 1rem 2rem;
           }

           /* === SLIDE KART === */
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

           /* === AKTİF SLIDE === */
           .ck-slide-card.active {
               transform: scale(1);
               opacity: 1;
               z-index: 2;
           }

           /* === Renkli Kartlar === */
           .purple-card {
               background-color: #6c63ff;
               color: white;
           }
           .white-card {
               background-color: white;
               color: #333;
           }

           /* === Profil Görseli / Harfli Circle === */
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
           .ck-bg-orange {
               background-color: #ff6f00;
           }
           .ck-bg-purple {
               background-color: #6c63ff;
           }

           /* === Kart içeriği === */
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

           /* === SLIDE BUTONLARI === */
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
           .ck-slide-btn.left {
               left: 0.5rem;
           }
           .ck-slide-btn.right {
               right: 0.5rem;
           }

           /* === MOBİL UYUMLULUK === */
           @media (max-width: 768px) {
               .ck-slide-card {
                   width: 90vw;
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
           }
       </style>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const track = document.getElementById("ckSliderTrack");
                const cards = Array.from(track.children);
                const viewport = document.getElementById("ckSliderViewport");
                let index = 0;

                function getCardWidth() {
                    const card = cards[0];
                    if (!card) return 0;
                    const style = window.getComputedStyle(card);
                    const marginRight = parseFloat(style.marginRight || 0);
                    const marginLeft = parseFloat(style.marginLeft || 0);
                    return card.offsetWidth + marginLeft + marginRight + 32; // gap için ekstra boşluk
                }

                function updateSlide() {
                    const cardWidth = getCardWidth();
                    const containerWidth = viewport.offsetWidth;
                    const offset = Math.max(0, (cardWidth * index) - ((containerWidth - cardWidth) / 2));
                    track.style.transform = `translateX(-${offset}px)`;

                    cards.forEach((card, i) => {
                        card.classList.toggle("active", i === index);
                    });
                }

                function slideLeft() {
                    index = index > 0 ? index - 1 : cards.length - 1;
                    updateSlide();
                }

                function slideRight() {
                    index = index < cards.length - 1 ? index + 1 : 0;
                    updateSlide();
                }

                // Butonlarla kaydırma
                document.querySelector(".ck-slide-btn.left").addEventListener("click", slideLeft);
                document.querySelector(".ck-slide-btn.right").addEventListener("click", slideRight);

                // Başlangıçta ortalama ve otomatik kayma başlat
                updateSlide();
                let autoSlideTimer = setInterval(slideRight, 2500); // mobil + masaüstü

                // Dokununca otomatik kaydırmayı durdur (isteğe bağlı)
                viewport.addEventListener("touchstart", () => {
                    clearInterval(autoSlideTimer);
                });
            });
        </script>        <section class="py-5 position-relative overflow-hidden">
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
                transform: translateX(0%);
            }
            100% {
                transform: translateX(100%);
            }
        }
        .right-scroll .complaint-track
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

    <!-- HTML KARTLAR... -->

    <!-- En sonda script -->
    <script>
        const wrapper = document.getElementById("trendingWrapper");

        document.getElementById("slideRightBtn").onclick = function () {
            wrapper.scrollLeft += wrapper.scrollWidth;
        };

        document.getElementById("slideLeftBtn").onclick = function () {
            wrapper.scrollLeft -= wrapper.scrollWidth;
        };
    </script>

@endsection
