@extends('layouts.app')

@section('title', 'Kurumsal Üyelik')

@section('content')


    <!-- İçerik Alanı -->
    <section class="corporate-membership-section pt-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Sol Kısım: Yazılar -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="text-secondary fw-bold" style="font-size: 25px;">
                        Çalışanlarınızın olumsuz deneyimlerini memnuniyete dönüştürelim.
                    </h2>
                    <p class="text-secondary mt-4" style="font-size: 19px;">
                        Firmanızda daha verimli, mutlu ve sürdürülebilir bir çalışma ortamı oluşturmak için birlikte çalışalım.
                    </p>
                    <a href="/kurumsal-uyelik"
                       style="background-color: #5bb56e; color:white; border: none; padding: 10px 25px; border-radius: 50px; font-size: 18px; display: inline-block; transition: all 0.2s ease; text-decoration: none;"
                       onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)';"
                       onmouseout="this.style.transform='none'; this.style.boxShadow='none';">
                        Hemen Üye Ol
                    </a>
                </div>

                <!-- Sağ Kısım: Görsel -->
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/kurumsal1.webp') }}" alt="Kurumsal Üyelik Görseli" class="img-fluid" style="max-width: 75%; height: auto;">
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center mb-4 mb-lg-0">
                    <img src="{{ asset('images/kurumsal2.webp') }}" alt="İletişim Görseli" class="img-fluid" style="max-width: 75%; height: auto;">
                </div>
                <div class="col-lg-6">
                    <h2 class="text-secondary fw-bold" style="font-size: 25px;">
                        Personelinizle Doğrudan ve<br>Etkin İletişim Kurun
                    </h2>
                    <p class="text-secondary mt-4" style="font-size: 19px;">
                        Firma CV, yaşadıkları deneyimleri paylaşan personellerden iletişim bilgilerini firmanızla paylaşmak üzere onay alır ve tarafınıza iletir. Bu sayede personelinizle doğrudan iletişim kurarak yaşanan sorunlara hızlı ve etkili çözümler üretebilir, çalışma ortamınızı daha sağlıklı ve verimli hale getirebilirsiniz.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="mb-3">
                        <img src="{{ asset('images/pro-icon.svg') }}" alt="Pro İkon" style="height: 100px;">
                    </div>
                    <h2 class="text-secondary fw-bold" style="font-size: 25px;">
                        Firmanıza Özel<br>Reklam Alanı Oluşturun
                    </h2>
                    <p class="text-secondary mt-4" style="font-size: 19px;">
                        Firma CV’de hedef kitlenize kolayca ulaşın. Firma sayfanızdaki reklam alanlarını dilediğiniz gibi yönetin.
                    </p>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="shadow rounded p-2 bg-white">
                        <img src="{{ asset('images/reklam-alani.svg') }}" alt="Reklam Alanı Görseli" class="img-fluid rounded" style="max-width: 75%; height: auto;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-2 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/kurumsal3.svg') }}" alt="Degerlendirme Görseli" class="img-fluid" style="max-width: 75%; height: auto;">
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <img src="{{ asset('images/pro-icon.svg') }}" alt="Pro İkon" style="height: 100px;">
                    </div>
                    <h2 class="text-secondary fw-bold" style="font-size: 25px;">
                        Çalışanlara Değer Veren Firma Olun
                    </h2>
                    <p class="text-secondary mt-4" style="font-size: 19px;">
                        Çalışanlarınıza değer vererek, yeni personelin sizi tercih etmesini sağlayın. Geçmiş çalışan deneyimlerinizle beş yıldızlı bir firma imajı çizin.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-2 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <img src="{{ asset('images/pro-icon.svg') }}" alt="Pro İkon" style="height: 100px;">
                    </div>
                    <h2 class="text-secondary fw-bold" style="font-size: 25px;">
                        Firmanıza Özel Personel Memnuniyet Analizi
                    </h2>
                    <p class="text-secondary mt-4" style="font-size: 19px;">
                        Çalışanlarınızdan gelen şikayetleri ve olumlu yorumları değerlendirerek, firmalara departman bazında detaylı personel memnuniyet/memnuniyetsizlik analizi sunuyoruz. Bu sayede, iyileştirilmesi gereken alanları kolayca tespit edebilir, daha mutlu ve verimli bir iş ortamı yaratabilirsiniz.
                    </p>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/kurumsal4.svg') }}" alt="Memnuniyet Görseli" class="img-fluid" style="max-width: 75%; height: auto;">
                </div>
            </div>
        </div>
    </section>

    <section class="py-2 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/kurumsal5.svg') }}" alt="Degerlendirme Görseli" class="img-fluid" style="max-width: 75%; height: auto;">
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <img src="{{ asset('images/pro-icon.svg') }}" alt="Pro İkon" style="height: 100px;">
                    </div>
                    <h2 class="text-secondary fw-bold" style="font-size: 25px;">
                        Arabuluculuk ile Çözüm
                    </h2>
                    <p class="text-secondary mt-4" style="font-size: 19px;">
                        Arabuluculuk hizmetimiz sayesinde, firma ve personel arasındaki anlaşmazlıkları üçüncü bir gözle değerlendirip, taraflar için en uygun çözümü bulmaya odaklanıyoruz. Bu süreç, sadece sorunu çözmekle kalmaz, aynı zamanda iletişimi güçlendirir, güveni artırır ve gelecekte benzer sorunların yaşanmasını engellemeye yardımcı olur.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-5 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="mb-3">
                        <img src="{{ asset('images/pro-icon.svg') }}" alt="Pro İkon" style="height: 100px;">
                    </div>
                    <h2 class="text-secondary fw-bold" style="font-size: 25px;">
                        Profesyonel Hukuki Destek
                    </h2>
                    <p class="text-secondary mt-4" style="font-size: 19px;">
                        Çalışan memnuniyeti ve iş barışı her ne kadar hedefimiz olsa da, bazı durumlar arabuluculuk sınırlarını aşabilir ve hukuki süreç gerektirebilir. Platformumuzda yaşanan bir sorunun arabuluculuk hizmetimizle çözülememesi durumunda, size tam kapsamlı hukuki destek ve avukatlık hizmeti sunuyoruz. İş hukuku alanında uzmanlaşmış deneyimli avukatlarımızla, yasal haklarınızı korumak, olası davalarda sizi temsil etmek ve doğru hukuki adımları atmanız için profesyonel danışmanlık sağlamaktayız.
                    </p>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/kurumsal6.svg') }}" alt="Hukuki Destek Görseli" class="img-fluid" style="max-width: 75%; height: auto;">
                </div>
            </div>
        </div>
    </section>

    </section>
    <section class="py-5 text-center custom-experience-section" style="background-color: #695ce6; color: white; ">
        <div class="container" >
            <h6 class="display-5 fw-bold mb-4 ">Firma CV PRO üyelik ile hem personel memnuniyetini hem de firmanızın itibarını artırabilirsiniz.</h6>
            <br>
            <p class="lead mb-4">
                Çalışanlarına değer veren firmalar arasına katılmak için pro özelliklerden faydalanın.
            </p>
            <br>
            <a href="/kurumsal-uyelik"
               style="background-color: #5bb56e; color:white; border: none; padding: 10px 25px; border-radius: 50px; font-size: 18px; display: inline-block; transition: all 0.2s ease; text-decoration: none;"
               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)';"
               onmouseout="this.style.transform='none'; this.style.boxShadow='none';">
                Hemen Üye Ol
            </a>

        </div>
    </section>

@endsection

