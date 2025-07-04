@extends('layouts.app')

@section('title', 'Kariyer Geliştirme Merkezi')

@section('content')

    <!-- Kapsayıcı -->
    <section class="career-wrapper">

        <!-- Hero Bölüm -->
        <section class="career-hero text-white text-center d-flex align-items-center justify-content-center">
            <div class="container">
                <h1>Kariyerinizi Bir Sonraki Seviyeye Taşıyın</h1>
                <p class="lead">Uzman destek hizmetleriyle iş hayatına hazırlanın.</p>
            </div>
        </section>

        <!-- Genel Bilgilendirme -->
        <section class="career-section">
            <div class="container">
                <div class="row align-items-center gy-4">
                    <div class="col-md-6">
                        <img src="{{ asset('images/career-center1.svg') }}" class="img-fluid rounded" alt="Uzman Destek">
                    </div>
                    <div class="col-md-6">
                        <h2 class="section-title">Uzman Destek Hizmetlerimiz</h2>
                        <p>
                            Kariyer Geliştirme Merkezimizde, birebir İK kariyer danışmanlarımızla profesyonel CV hazırlama, LinkedIn profil güncelleme ve demo mülakatlarla size özel rehberlik sunuyoruz.
                        </p>
                        <p>
                            İş görüşmelerinde güçlü ve eksik yönlerinizi tespit ederek, kariyer yolculuğunuzda güvenle ilerlemenizi sağlıyoruz.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CV Hazırlama -->
        <section class="career-section alt-bg">
            <div class="container">
                <div class="row align-items-center gy-4 flex-md-row-reverse">
                    <div class="col-md-6">
                        <img src="{{ asset('images/career-center2.svg') }}" class="img-fluid rounded" alt="CV Hazırlama">
                    </div>
                    <div class="col-md-6">
                        <h2 class="section-title">Profesyonel CV Hazırlama ve Geliştirme</h2>
                        <p>
                            İlk izlenim her şeydir. Danışmanlarımız modern ve etkili bir CV hazırlamanız için güçlü yönlerinizi ön plana çıkararak eksiklerinizi giderme konusunda size birebir destek verir.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Demo Mülakat -->
        <section class="career-section">
            <div class="container">
                <div class="row align-items-center gy-4">
                    <div class="col-md-6">
                        <img src="{{ asset('images/career-center3.svg') }}" class="img-fluid rounded" alt="Demo Mülakat">
                    </div>
                    <div class="col-md-6">
                        <h2 class="section-title">İK Kariyer Danışmanlarımız ile Demo Mülakat</h2>
                        <p>
                            Gerçek mülakatlar öncesi prova yapma imkanı sunuyoruz. Demo mülakat sonrası detaylı geri bildirim ile performansınızı artırıyor ve özgüven kazandırıyoruz.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- LinkedIn -->
        <section class="career-section alt-bg">
            <div class="container">
                <div class="row align-items-center gy-4 flex-md-row-reverse">
                    <div class="col-md-6">
                        <img src="{{ asset('images/career-center4.svg') }}" class="img-fluid rounded" alt="LinkedIn Güncelleme">
                    </div>
                    <div class="col-md-6">
                        <h2 class="section-title">Profesyonel LinkedIn Hesap Güncelleme</h2>
                        <p>
                            LinkedIn profilinizin profesyonel görünmesi, doğru anahtar kelimelerle iş fırsatlarına ulaşmanızda büyük rol oynar. Danışmanlarımız sizinle birlikte bu süreci yönetir.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Üyelik Planları -->
        <section class="career-section plans-section text-center">
            <div class="container">
                <h2 class="section-title mb-4">Kariyer Geliştirme Merkezi Üyelik Planı</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>Hizmetler</th>
                            <th>Başlangıç</th>
                            <th>Gelişmiş</th>
                            <th>Standart</th>
                            <th>Kurumsal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Profesyonel CV Hazırlama</td>
                            <td>✔</td><td>✔</td><td>✔</td><td>✔</td>
                        </tr>
                        <tr>
                            <td>Sunum Yapmayı Öğrenme</td>
                            <td>–</td><td>✔</td><td>✔</td><td>✔</td>
                        </tr>
                        <tr>
                            <td>LinkedIn Güncelleme</td>
                            <td>–</td><td>–</td><td>✔</td><td>✔</td>
                        </tr>
                        <tr>
                            <td>Demo IK Görüşmesi</td>
                            <td>–</td><td>–</td><td>–</td><td>✔</td>
                        </tr>
                        <tr>
                            <td><strong>Fiyat</strong></td>
                            <td>10.000 ₺</td><td>15.000 ₺</td><td>20.000 ₺</td><td>30.000 ₺</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </section>

@endsection
<style>
    .career-wrapper {
        font-family: 'Segoe UI', sans-serif;
    }

    .career-hero {
        min-height: 60vh;
        background: linear-gradient(to right, #6c63ff, #00c98d);
        padding: 60px 20px;
    }

    .career-section {
        padding: 60px 0;
        background-color: #ffffff;
    }

    .career-section.alt-bg {
        background-color: #f8f9fa;
    }

    .section-title {
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .plans-section table {
        margin-top: 30px;
        font-size: 15px;
    }
</style>
