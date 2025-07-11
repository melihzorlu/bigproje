<footer class="custom-footer">
    <div class="container">
        <!-- Üst Menü -->
        <div class="row align-items-center text-center text-md-start mb-4">
            <div class="col-12 col-md-3 mb-3 mb-md-0 text-md-start">
                <a href="/"> <img src="{{ asset('images/fimracvlogo.svg') }}" alt="FirmaCv" class="footer-logo"></a>
            </div>
            <div class="col-12 col-md-9 text-center text-md-end">
                <ul class="list-unstyled d-flex justify-content-center justify-content-md-end flex-wrap social-icons">
                    <li><a href="https://www.linkedin.com/company/firma-cv/about/?viewAsMember=true"><i class="fa-brands fa-linkedin"></i></a></li>
                    <li><a href="https://www.youtube.com/@firmacv"><i class="fa-brands fa-youtube"></i></a></li>
                    <li><a href="https://www.instagram.com/firma.cv"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="https://www.tiktok.com/@firmacv"><i class="fa-brands fa-tiktok"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                </ul>
            </div>
        </div>

        <!-- Menü Bağlantıları -->
        <div class="text-center mb-3">
            <ul class="nav justify-content-center flex-wrap gap-2 footer-menu">
                <li class="nav-item"><a href="/hakkimizda" class="nav-link">Hakkımızda</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Firmalar İçin</a></li>
                <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="/sss" class="nav-link">SSS</a></li>
                <li class="nav-item"><a href="/iletisim" class="nav-link">İletişim</a></li>
            </ul>
        </div>

        <hr class="footer-divider">

        <!-- Orta Alan -->
        <div class="footer-content">
            <!-- Her kutu -->
            <div class="footer-box">
                <h6 class="footer-title">Bloglar</h6>
                <ul class="list-unstyled mb-0">
                    @foreach ($latestBlogs as $blog)
                        <li>
                            <a href="{{ route('blog.show', $blog->slug) }}">
                                {{ $blog->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="footer-box">
                <h6 class="footer-title">Kariyer Geliştirme Merkezi</h6>
                <ul class="list-unstyled mb-0">
                    <li><a href="{{ url('/kariyer-gelistirme-merkezi#ik-demo-mulakat') }}">IK Demo İş Mülakatı</a></li>
                    <li><a href="{{ url('/kariyer-gelistirme-merkezi#cv-hazirlama') }}">CV Hazırlama</a></li>
                    <li><a href="{{ url('/kariyer-gelistirme-merkezi#linkedin-profil-guncelleme') }}">LinkedIn Hesabı Güncelleme</a></li>
                    <li><a href="#">Etkili Sunum Yapma</a></li>
                </ul>
            </div>

            <div class="footer-box">
                <h6 class="footer-title">Çok Arananlar</h6>
                <ul class="list-unstyled mb-0">
                    <li><a href="#">Baymak</a></li>
                    <li><a href="#">Pars Kimya</a></li>
                    <li><a href="#">Logitech</a></li>
                    <li><a href="#">Decathlon</a></li>
                </ul>
            </div>

            <div class="footer-box">
                <h6 class="footer-title">Konular</h6>
                <ul class="list-unstyled mb-0">
                    <li><a href="#">Fazla Mesai</a></li>
                    <li><a href="#">Mobbing</a></li>
                    <li><a href="#">İşten Çıkarılma</a></li>
                    <li><a href="#">Ücretsiz Mesai</a></li>
                </ul>
            </div>
        </div>

        <hr class="footer-divider">

        <!-- Alt Bilgi -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start footer-bottom">
            <p class="footer-copy">© 2025 FirmaCv. Her hakkı saklıdır.</p>
            <ul class="list-unstyled d-flex flex-wrap justify-content-center justify-content-md-start mb-0 footer-policy">
                <li><a href="/uye-aydinlatma">Üye Aydınlatma Metni</a></li>
                <li><a href="/ziyaretci-aydinlatma">Ziyaretçi Aydınlatma Metni</a></li>
                <li><a href="/kullanim-kosullari">Kullanım Şartları</a></li>
                <li><a href="/degerlendirme-klavuzu">Değerlendirme Kılavuzu</a></li>
            </ul>
        </div>
    </div>
</footer>
<style>
    .custom-footer {
        background-color: #f7f7fc;
        color: white;
        font-family: 'Metropolis', sans-serif;
        padding: 40px 0 20px;
    }

    .footer-logo {
        height: 55px;
    }

    .social-icons i {
        color: #7b7a85;
        font-size: 34px;
    }
    .social-icons i.fa-tiktok {
        font-size: 30px;
    }
    .social-icons li {
        margin-left: 0.75rem;
    }

    .footer-menu {
        height: 60px;
        font-size: 20px;
        font-weight: 600;
    }
    .footer-menu .nav-link {
        color: #636363 !important;
        padding: 0 0.5rem;
    }

    .footer-divider {
        opacity: 0.25;
        color: #636363 !important;
        margin: 1rem 0;
    }

    .footer-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        text-align: center;
        text-align: start;
        gap: 1.5rem;
        font-size: 16px;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .footer-box {
        flex: 1 1 220px;
        max-width: 260px;
        min-width: 220px;
    }

    .footer-title {
        font-weight: bold;
        margin-bottom: 0.5rem;
        color: #636363 !important;
    }

    .footer-box a {
        font-family: 'Metropolis', sans-serif;
        font-weight: 100;
        color: #636363 !important;
        text-decoration: none;
        display: block;
        margin-bottom: 4px;
    }

    .footer-bottom {
        font-size: 14.5px;
        color: #636363 !important;
    }

    .footer-copy {
        margin-bottom: 0.5rem;
    }

    .footer-policy li {
        margin-left: 1rem;
    }
    .footer-policy a {
        color: #636363 !important;
        text-decoration: none;
    }
    .footer-box {
        flex: 1 1 220px;
        max-width: 260px;
        min-width: 220px;
    }

    /* Başlık stili */
    .footer-title {
        font-weight: bold;
        margin-bottom: 0.5rem;
        color: #636363 !important;
        text-align: start;
    }

    /* RESPONSIVE: Mobilde başlık ve içerik ortalansın */
    @media (max-width: 768px) {
        .footer-box {
            text-align: center;
        }

        .footer-title {
            text-align: center;
        }

        .footer-box a {
            display: block;
            text-align: center;
        }
    }
</style>
