{{-- resources/views/pages/about.blade.php --}}
@extends('layouts.app')
@section('title', 'Hakkımızda')
@section('content')
    <section class="position-relative overflow-hidden">
            <img src="{{ asset('images/banner-hakkimizda.webp') }}" alt="Banner" class="img-fluid w-100">

            <div class="bg-dark bg-opacity-50 h-100 d-flex align-items-center">
            </div>

            <div class="position-absolute bottom-0 end-0 p-3">
                <small style="text-decoration: none !important;" class="text-white opacity-75"></small>
            </div>

    </section>


    <section class="py-5" style="background-color: #f8f9fa;">
        <div class="container text-center">
<br>
            <div class="mb-5">
                <h4 class="fw-semibold text-secondary">Deneyimlerin Paylaşıldığı Bir Platform</h4>
                <p class="text-muted">
                    Çalışanların firmalarda çalışırken yaşadıkları <strong>iyi ya da kötü deneyimleri</strong> paylaşabilecekleri, firmaların kendi personel deneyimlerini inceleyebilecekleri bir fırsat sunuyoruz.
                </p>
                <p class="text-muted">
                    FirmaCV, <strong>firmalar ve çalışanlar arasında köprü</strong> görevi gören bir çözüm platformudur.
                </p>
            </div>

            <div class="mb-5">
                <h4 class="fw-semibold text-secondary">Personeller İçin FirmaCV</h4>
                <p class="text-muted">
                    Personeller artık <strong>CV'lerini göndermeden önce</strong>, başvurmayı düşündükleri firmanın geçmiş personel deneyimlerini detaylı bir şekilde inceleyebilirler.
                </p>
                <p class="text-muted">
                    Bu sayede, potansiyel işverenlerinin çalışanlarına sunduğu ortamı ve kültürü önceden değerlendirme fırsatı bulurlar.
                </p>
                <p class="text-muted">
                    Ayrıca, çalıştıkları veya çalışacakları firmalardaki deneyimlerini <strong>şeffaf bir şekilde paylaşarak</strong> seslerini kamuoyuna, firmalara ve yeni adaylara duyurabilirler.
                </p>
            </div>

            <div class="mb-5">
                <h4 class="fw-semibold text-secondary">Firmalar İçin FirmaCV</h4>
                <p class="text-muted">
                    Firmalar, <strong>eski personel deneyimlerini memnuniyete</strong> dönüştürerek <strong>doğru personel kitlesine</strong> ulaşabilir.
                </p>
                <p class="text-muted">
                    Geri bildirimlere kulak vererek kurumsal gelişim sağlayabilir, işveren markasını güçlendirebilir.
                </p>
            </div>

            <div>
                <h4 class="fw-semibold text-secondary">Karşılıklı Faydaya Dayalı Yapı</h4>
                <p class="text-muted">
                    FirmaCV, hem çalışanlar hem de işverenler için <strong>şeffaflık, farkındalık ve gelişim</strong> sunan bir ortam oluşturur. Personeller firmalar hakkında araştırma yaparak daha bilinçli kararlar verirken, firmalar da kendilerini geliştirme fırsatı yakalar.
                </p>
            </div>
        </div>
    </section>



    <section class="py-5 bg-white">
        <div class="container text-center">
            <div class="row justify-content-center gy-4">
                <div class="col-6 col-md-3">
                    <div class="mb-3">
                        <img src="{{ asset('images/icon-(1).svg') }}" alt="Üye Sayısı" class="stat-icon" style="width: 150px; height: 150px;">
                    </div>
                    <h6 class="text-secondary">Bireysel Üye Sayısı</h6>
                    <h3 class="fw-bold">12.909.536</h3>
                </div>

                <div class="col-6 col-md-3">
                    <div class="mb-3">
                        <img src="{{ asset('images/icon-(2).svg') }}" alt="Kayıtlı Firma" class="stat-icon" style="width: 150px; height: 150px;">
                    </div>
                    <h6 class="text-secondary">Kayıtlı Firma</h6>
                    <h3 class="fw-bold">226.825</h3>
                </div>

                <div class="col-6 col-md-3">
                    <div class="mb-3">
                        <img src="{{ asset('images/icon-(3).svg') }}" alt="Çözülen Şikayet" class="stat-icon" style="width: 150px; height: 150px;">
                    </div>
                    <h6 class="text-secondary">Çözülen Personel Şikayeti</h6>
                    <h3 class="fw-bold">3.658.600</h3>
                </div>

                <div class="col-6 col-md-3">
                    <div class="mb-3">
                        <img src="{{ asset('images/icon-(4).svg') }}" alt="Son 30 Günde Ziyaretçi" class="stat-icon" style="width: 150px; height: 150px;">
                    </div>
                    <h6 class="text-secondary">Son 30 Günde Ziyaretçi</h6>
                    <h3 class="fw-bold">26.337.007</h3>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5" style="background-color: #292836;height: 450px;">
        <div class="container text-center" style="margin-top: 40px;">
            <div class="mb-4">
                <img src="{{ asset('images/about-section-icon-1.png') }}" alt="Icon" width="100"  style="color: #16b46e !important; background-color:#16b46e!important; " class="bg-success rounded-circle p-2">
            </div>
            <h4 class="fw-normal mb-3" style="pointer-events: none !important; text-decoration: none !important;color: white;">
                Bir firmaya işe başlamadan önce FirmaCv'de ki<br>
                deneyimleri okuyanların oranı
            </h4> <br>
            <br>
            <h1  style="color: #16b46e !important;" class="fw-bold">%95</h1>

        </div>
    </section>
<section class="py-5 bg-white">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12 text-center">
                <h2 class="fw-light">
                    <span class="text-primary">Personeli</span> FirmaCv'ye<br>
                    Çeken Nedenler
                </h2>
            </div>
        </div>

        <!-- Alt başlıkları aynı hizada, ortalı ve yan yana getirmek için flexbox eklendi -->
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-4 d-flex flex-column align-items-center">
                <h5 class="fw-bold">Harekete Geçirici Nitelik</h5>
                <p class="text-secondary">
                    Gerçek çalışanlar tarafından yazılan personel deneyimleri, sürece dair memnuniyet puanları ve çözüme istinaden firmaların personel deneyimlerini en doğru şekilde yönetmeye teşvik etmektedir.
                </p>
            </div>
            <div class="col-md-4 d-flex flex-column align-items-center">
                <h5 class="fw-bold">Personel Referans Sitesi</h5>
                <p class="text-secondary">
                    Günde yüzlerce deneyim yazılan, gerçek personel tecrübelerinin yer aldığı FirmaCv, personellerin işe alım/giriş sürecinde en önemli referans kaynağıdır. FirmaCv; deneyimlerin en kısa ve en kolay yoldan, ücretsiz olarak firmalara iletildiği online platformdur.
                </p>
            </div>
        </div>
    </div>


    <hr>

            <div class="row my-5">
                <div class="col-lg-12 text-center">
                    <h2 class="fw-light">
                        FirmaCv<br>
                        <span class="text-primary">Personellere </span> Ne Sağlar?
                    </h2>
                </div>
            </div>

    <div class="container">
        <div class="row justify-content-center text-center mb-5 align-items-start">
            <div class="col-md-4 d-flex flex-column align-items-center">
                <h5 class="fw-bold">Firma/Sektör Analizleri</h5>
                <p class="text-secondary">
                    İşverenler, personel deneyimlerindeki başarı ya da başarısızlıklarını görebilmelerini ve bu veriler ışığında doğru stratejiler belirleyebilmelerini sağlar.
                </p>
            </div>

            <div class="col-md-4 d-flex flex-column align-items-center">
                <h5 class="fw-bold">Mutsuz Personelleri Geri Kazanma</h5>
                <p class="text-secondary">
                    FirmaCv, edinilen deneyimler doğrultusunda iş ve personel yönetimi süreçlerini objektif bir bakış açısıyla değerlendirerek, yapılan hatalardan öğrenilmesini ve yönetim sürecinin iyileştirilmesini sağlar.
                </p>
            </div>
        </div>
    </div>


    </section>


@endsection
