@extends('layouts.app')

@section('title', 'Kurumsal Üyelik')

@section('content')

    <!-- İçerik Alanı -->
    <section class="corporate-membership-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Sol Kısım: Yazılar -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold" style="font-size: 30px;">Çalışanlarınızın olumsuz deneyimlerini memnuniyete dönüştürelim.</h2>
                    <p class="mt-3" style="font-size: 20px; ">
                        Firmanızda daha verimli, mutlu ve sürdürülebilir bir çalışma ortamı oluşturmak için birlikte çalışalım.
                    </p>
                    <a href="#" class="btn mt-4 px-4 py-2" style="background-color: #18ad74; color: white; font-size: 16px;">Hemen Üye Ol</a>

                </div>

                <!-- Sağ Kısım: Görsel Alanı -->
                <div class="col-lg-6 text-center">
                    <!-- Görsel Linkini Sen Ekleyeceksin -->
                    <img src="{{ asset('images/kurumsal1.webp') }}" alt="Kurumsal Üyelik Görseli" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </section>


    <section class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center">

                <!-- Sol Kısım: Görsel -->
                <div class="col-lg-6 text-center mb-4 mb-lg-0">
                    <img src="{{ asset('images/kurumsal2.webp') }}" alt="İletişim Görseli" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>

                <!-- Sağ Kısım: Metin -->
                <div class="col-lg-6">
                    <h3 class="fw-bold mb-3" style="font-size: 25px;">Personelinizle Doğrudan ve<br>Etkin İletişim Kurun</h3>
                    <p style="font-size: 19px; color: #333;">
                        Firma CV, yaşadıkları deneyimleri paylaşan personellerden iletişim bilgilerini firmanızla paylaşmak üzere onay alır ve tarafınıza iletir. Bu sayede personelinizle doğrudan iletişim kurarak yaşanan sorunlara hızlı ve etkili çözümler üretebilir, çalışma ortamınızı daha sağlıklı ve verimli hale getirebilirsiniz.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">

                <!-- Sol Kısım: İkon + Başlık + Açıklama -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <!-- İkon Alanı -->
                    <div class="mb-3">
                        <img src="{{ asset('images/pro-icon.svg') }}" alt="Pro İkon" style="height: 75px; ">
                    </div>
                    <!-- Metin Alanı -->
                    <h3 class="fw-bold mb-3" style="font-size: 22px;">
                        Firmanıza Özel Reklam Alanı Oluşturun
                    </h3>
                    <p style="font-size: 17px; color: #444;">
                        Firma CV’de hedef kitlenize kolayca ulaşın. Firma sayfanızdaki reklam alanlarını dilediğiniz gibi yönetin.
                    </p>
                </div>

                <!-- Sağ Kısım: Görsel Alanı -->
                <div class="col-lg-6 text-center">
                    <div class="shadow rounded p-2 bg-white">
                        <img src="{{ asset('images/reklam-alani.svg') }}" alt="Reklam Alanı Görseli" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

