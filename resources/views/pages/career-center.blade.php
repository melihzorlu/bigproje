@extends('layouts.app')

@section('title', 'Kariyer Geliştirme Merkezi')

@section('content')

    <section class="pt-5 bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <!-- Görsel (Solda) -->
                <div class="col-lg-5 text-center mb-4 mb-lg-0">
                    <img src="{{ asset('images/career-center1.svg') }}" alt="Görsel" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>

                <!-- Yazı (Ortalanmış Şekilde Sağda) -->
                <div class="col-lg-7 d-flex flex-column align-items-center text-center">
                    <h2 class="fw-bold text-secondary mb-4" style="font-size: 26px; max-width: 600px;">
                        Kariyerinizi Bir Sonraki Seviyeye Taşıyın: <br> Uzman Destek Hizmetlerimiz
                    </h2>
                    <br>
                    <p class="text-secondary" style="font-size: 18px; line-height: 1.7; max-width: 600px;">
                        Kariyer Geliştirme Merkezimizde, iş arama sürecinizde size kapsamlı destek sunuyoruz.
                        İnsan Kaynakları (İK) kariyer danışmanlarımızla birebir çalışarak, demo İK görüşmeleriyle sunum yapma,
                        profesyonel CV hazırlama, LinkedIn hesabınızı güncelleme ve daha fazlası gibi konularda size rehberlik ediyoruz.
                    </p>
                    <p class="text-secondary mt-4" style="font-size: 18px; line-height: 1.7; max-width: 600px;">
                        İK Kariyer danışmanlarımızla yapacağınız birebir iş mülakatları sayesinde, bu süreçteki güçlü ve eksik yönlerinizi belirliyor,
                        daha önceki iş görüşmelerinden neden sonuç alamadığınıza dair detaylı bir rapor sunuyoruz.
                        Eksik yanlarınızla ilgili belirlenen alanlarda kendinizi geliştirmenizi sağlayarak başarıya ulaşmanız için yol gösteriyoruz.
                    </p>
                </div>
            </div>
        </div>
    </section>



    <section class="py-3 bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-center flex-lg-row-reverse">
                <!-- Görsel (Sağda) -->
                <div class="col-lg-5 text-center mb-4 mb-lg-0">
                    <img src="{{ asset('images/career-center-2.svg') }}" alt="Görsel" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>

                <!-- Yazı (Ortalanmış Şekilde Solda) -->
                <div class="col-lg-7 d-flex flex-column align-items-center text-center">
                    <h2 class="fw-bold text-secondary mb-4" style="font-size: 26px; max-width: 600px;">
                        Profesyonel CV Hazırlama ve Geliştirme
                    </h2>
                    <br>
                    <p class="text-secondary" style="font-size: 18px; line-height: 1.7; max-width: 600px;">
                        İlk izlenim her şeydir! İK Kariyer danışmanlarımız, sizi en iyi şekilde temsil eden, modern ve etkili bir CV hazırlamanız için size birebir rehberlik eder. Eksiklerinizi belirler, güçlü yönlerinizi vurgular ve dikkat çekici bir CV oluşturmanızda
                        size destek olurlar.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <!-- Görsel (Solda) -->
                <div class="col-lg-5 text-center mb-4 mb-lg-0">
                    <img src="{{ asset('images/career-center-3.svg') }}" alt="Görsel" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>

                <!-- Yazı (Ortalanmış Şekilde Sağda) -->
                <div class="col-lg-7 d-flex flex-column align-items-center text-center">
                    <h2 class="fw-bold text-secondary mb-4" style="font-size: 26px; max-width: 600px;">
                        İK Kariyer Danışmanlarımız ile Demo Mülakat Gerçekleştirme
                    </h2>
                    <br>
                    <p class="text-secondary" style="font-size: 18px; line-height: 1.7; max-width: 600px;">
                        Gerçek bir mülakat deneyimi yaşamadan önce prova yapmak ister misiniz? İK Kariyer danışmanlarımızla birebir demo
                        mülakatlar gerçekleştirerek, gerçek mülakat ortamına hazırlanma şansı bulacaksınız. Bu sayede, mülakat kaygınızı
                        azaltacak, eksiklerinizi görecek ve performansınızı artıracaksınız. İK Kariyer danışmanlarımız, demo mülakat sonrası size detaylı geri bildirimde bulunarak gelişim alanlarınızı net bir şekilde belirlemenize yardımcı olur.
                    </p>

                </div>
            </div>
        </div>
    </section>

    <section class="pb-5 bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-center flex-lg-row-reverse">
                <!-- Görsel (Sağda) -->
                <div class="col-lg-5 text-center mb-4 mb-lg-0">
                    <img src="{{ asset('images/career-center-4.svg') }}" alt="Görsel" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>

                <!-- Yazı (Ortalanmış Şekilde Solda) -->
                <div class="col-lg-7 d-flex flex-column align-items-center text-center">
                    <h2 class="fw-bold text-secondary mb-4" style="font-size: 26px; max-width: 600px;">
                        Profesyonel LinkedIn Hesap Güncelleme
                    </h2>
                    <br>
                    <p class="text-secondary" style="font-size: 18px; line-height: 1.7; max-width: 600px;">
                        Günümüz iş dünyasında LinkedIn, profesyonel kimliğinizin ve kariyer ağınızın anahtarıdır. İK Kariyer danışmanlarımız, LinkedIn profilinizi en profesyonel şekilde güncellemeyi, anahtar kelimelerle optimize etmeyi ve potansiyel işverenlerin dikkatini çekecek bir profil oluşturmanız için size birebir rehberlik eder. Böylece kariyer fırsatlarını kaçırmaz ve doğru bağlantılara ulaşırsınız.
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
