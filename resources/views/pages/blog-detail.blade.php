@extends('layouts.app')
@section('title', 'İşçinin Yıllık İzin Süreleri')
@section('content')

    <section class="info-section py-5">
        <div class="container text-center">
            <div class="icon-group d-flex justify-content-center mb-3 gap-2">
                <span class="triangle-yellow"></span>
                <span class="circle-green"></span>
                <span class="circle-gray"></span>
                <span class="circle-blue"></span>
            </div>

            <h2 class="fw-bold display-5">İşçinin Yıllık İzin Süreleri</h2>
        </div>
    </section>

    <section class="image-section py-3">
        <div class="container text-center">
            <img src="{{ asset('images/iscinin-izin-haklari.jpg  ') }}" alt="Kargo Dolandırıcılığı" class="img-fluid rounded shadow-sm">
        </div>
    </section>

    <section class="content-section py-5">
        <div class="container">
            <h2>Çalışanların Yıllık İzin Hakları</h2>
            <p>Çalışanların en temel haklarından biri, belirli bir çalışma süresini tamamladıktan sonra yıllık izin hakkı kazanmasıdır. İş Kanunu’na göre her çalışanın yıllık ücretli izin kullanma hakkı bulunmaktadır. İşçinin senelik izin hakkı işveren tarafından engellenemez ve yasalar çerçevesinde güvence altına alınmıştır.</p>

            <h3>Yıllık İzin Hakları Sürelere Göre</h3>
            <ul>
                <li><strong>1 yılını dolduran işçi:</strong> İşyerde en az 1 yıl çalışmış olan işçi, yıllık izin hakkı kazanır.</li>
                <li><strong>10 yıl çalışan:</strong> İşyerde 10 yıl ve üzeri çalışmış işçiler için yıllık izin süresi artmaktadır.</li>
                <li><strong>Engelli çalışanlar:</strong> Engelli bireyler için özel izin hakları bulunmaktadır.</li>
                <li><strong>Part time çalışanlar:</strong> Kısmi süreli çalışanlar da yıllık izin hakkından faydalanabilirler.</li>
            </ul>


        </div>
    </section>

    <section class="related-blogs py-5" style="background-color: #f6f7fc;">
        <div class="container position-relative">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold mb-0" style="color: #1f1f36; font-size: 22px;">
                    İlginizi çekebilecek diğer makaleler
                </h2>
                <div class="swiper-buttons d-flex gap-2">
                    <div class="swiper-button-next custom-swiper-btn">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <div class="swiper-button-prev custom-swiper-btn">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div>

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($otherBlogs as $item)
                        <div class="swiper-slide">
                            <a href="{{ route('blog.show', $item->slug) }}" class="text-decoration-none text-dark">
                                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                                    <img src="{{ asset($item->image_path) }}"
                                         alt="{{ $item->title }}"
                                         class="card-img-top"
                                         style="height: 180px; object-fit: cover;">
                                    <div class="card-body p-3">
                                    <span class="badge px-2 py-1 mb-2"
                                          style="font-size: 13px; background-color: #eae6fc; color: #6c4ccf; border-radius: 8px;">
                                        {{ $item->category }}
                                    </span>
                                        <h6 class="fw-semibold" style="font-size: 16px; line-height: 1.4;">
                                            {{ Str::limit($item->title, 80) }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <style>
        .swiper-buttons {
            position: relative;
            top: 0;
            right: 0;
        }

        .custom-swiper-btn {
            width: 32px;
            height: 32px;
            background-color: #fff;
            border-radius: 50%;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        .custom-swiper-btn i {
            font-size: 14px;
            color: #333;
        }

        .custom-swiper-btn:hover {
            background-color: #f0f0f0;
        }

        @media (max-width: 576px) {
            .swiper-buttons {
                display: none;
            }
        }

        /* Swiper varsayılan ikonlarını gizle */
        .swiper-button-prev::after,
        .swiper-button-next::after {
            display: none;
        }
    </style>
    <!-- Swiper CSS + JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- FontAwesome (ok ikonları için) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <script>
        const swiper = new Swiper(".mySwiper", {
            slidesPerView: 1.2,
            spaceBetween: 20,
            navigation: {
                prevEl: ".swiper-button-prev",
                nextEl: ".swiper-button-next",

            },
            breakpoints: {
                576: {
                    slidesPerView: 2.2,
                },
                768: {
                    slidesPerView: 3.2,
                },
                992: {
                    slidesPerView: 4.2,
                },
            },
        });
    </script>


@endsection
