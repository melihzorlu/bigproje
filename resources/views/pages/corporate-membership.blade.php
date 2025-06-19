@extends('layouts.app')

@section('content')

    <!-- Stil -->
    <style>


        .corporate-promo-section {
            background-color: #f9f9fc;
            display: flex;
            align-items: center;
            padding: 60px 0;
            flex-wrap: wrap;
        }
        .corporate-promo-text {
            flex: 1 1 50%;
            padding: 30px;
        }
        .corporate-promo-text h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3436;
        }
        .corporate-promo-text p {
            font-size: 1.25rem;
            color: #636e72;
            margin: 10px 0;
        }
        .corporate-promo-text .subtext {
            font-size: 1rem;
            color: #b2bec3;
        }
        .corporate-promo-text .promo-btn {
            margin-top: 25px;
            background-color: #00b894;
            color: white;
            border: none;
            padding: 10px 25px;
            font-size: 1rem;
            border-radius: 25px;
            transition: background 0.3s ease;
        }
        .corporate-promo-text .promo-btn:hover {
            background-color: #019875;
        }
        .corporate-promo-image {
            flex: 1 1 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }
        .corporate-promo-image img {
            max-width: 300px;
            width: 100%;
            border-radius: 50%;
        }
        @media (max-width: 768px) {
            .corporate-promo-section {
                flex-direction: column;
                padding: 30px 0;
            }
            .corporate-promo-text, .corporate-promo-image {
                flex: 1 1 100%;
                padding: 20px;
                text-align: center;
            }

            .corporate-stats-section {
                background-color: #f9f9fc;
                padding: 60px 0;
            }
            .corporate-stats-box {
                text-align: center;
                padding: 20px;
            }
            .corporate-stats-box img {
                height: 48px;
                margin-bottom: 15px;
            }
            .corporate-stats-box h3 {
                font-size: 1.75rem;
                font-weight: 700;
                color: #2d3436;
            }
            .corporate-stats-box p {
                color: #a4a4a4;
                margin-top: 5px;
                font-size: 1rem;
            }



            .corporate-consultant-section {
                background-color: #f9f9fc;
                padding: 80px 0;
            }
            .corporate-consultant-wrapper {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                justify-content: center;
            }
            .corporate-consultant-left {
                flex: 1 1 50%;
                position: relative;
                padding: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .consultant-bg-shape {
                width: 100%;
                max-width: 500px;
                aspect-ratio: 1 / 1;
                border-radius: 50%;
                background: linear-gradient(135deg, #6c5ce7 0%, #00b894 100%);
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .consultant-bg-shape::before,
            .consultant-bg-shape::after {
                content: "";
                position: absolute;
                border-radius: 50%;
            }
            .consultant-bg-shape::before {
                width: 40px;
                height: 40px;
                background-color: #ffeaa7;
                top: 20px;
                right: 20px;
            }
            .consultant-bg-shape::after {
                width: 50px;
                height: 50px;
                background-color: #74b9ff;
                bottom: 20px;
                left: 20px;
            }
            .consultant-photo {
                width: 30%;
                max-width: 300px;
                border-radius: 50%;
                z-index: 2;
                position: relative;
            }
            .corporate-consultant-right {
                flex: 1 1 50%;
                padding: 30px 40px;
            }
            .corporate-consultant-right h2 {
                font-size: 2rem;
                font-weight: 700;
                color: #2d3436;
            }
            .corporate-consultant-right p {
                font-size: 1.125rem;
                color: #636e72;
                margin-top: 20px;
                max-width: 500px;
            }
            @media (max-width: 768px) {
                .corporate-consultant-wrapper {
                    flex-direction: column;
                    text-align: center;
                }

                .corporate-consultant-left, .corporate-consultant-right {
                    flex: 1 1 100%;
                    padding: 20px;
                }

                .corporate-consultant-right h2 {
                    font-size: 1.5rem;
                }
            }
        }




    </style>

    <!-- Tanıtım Alanı -->
    <section class="corporate-promo-section">
        <div class="corporate-promo-text">
            <h2>Çalışanlarınızın olumsuz deneyimlerini memnuniyete dönüştürelim.
            </h2>
            <p>Firmanızda daha verimli, mutlu ve sürdürülebilir bir çalışma ortamı oluşturmak için birlikte çalışalım</p>

            <a href="#" class="promo-btn">Hemen Üye Ol</a>
        </div>
        <div class="corporate-promo-image">
            <img src="{{ asset('images/kurumsal1.svg') }}" alt="Üye Ol Görseli">
        </div>
    </section>
    <section class="corporate-stats-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-6 col-md-3">
                    <div class="corporate-stats-box">
                        <img src="/images/icon-brand.svg" alt="Kayıtlı Marka">
                        <h3>234 bin</h3>
                        <p>Kayıtlı Marka</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="corporate-stats-box">
                        <img src="/images/icon-member.svg" alt="Üye Sayısı">
                        <h3>13 milyon</h3>
                        <p>Bireysel Üye Sayısı</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="corporate-stats-box">
                        <img src="/images/icon-visitor.svg" alt="Ziyaretçi">
                        <h3>22 milyon</h3>
                        <p>Son 30 Günde Ziyaretçi</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="corporate-stats-box">
                        <img src="/images/icon-view.svg" alt="Sayfa Gösterimi">
                        <h3>70 milyon</h3>
                        <p>Aylık Sayfa Gösterimi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="corporate-consultant-section">
        <div class="container">
            <div class="corporate-consultant-wrapper">
                <div class="corporate-consultant-left">
                    <div class="consultant-bg-shape">
                        <img src="{{ asset('images/kurumsal2.svg') }}" alt="Çözüm Danışmanı" class="consultant-photo">
                    </div>
                </div>
                <div class="corporate-consultant-right">
                    <h2>Personelinizle Doğrudan ve Etkin İletişim Kurun
                    </h2>
                    <p>
                        Firma CV, yaşadıkları deneyimleri paylaşan personellerden iletişim bilgilerini firmanızla paylaşmak üzere onay alır ve tarafınıza iletir. Bu sayede personelinizle doğrudan iletişim kurarak hukuki süreç başlamadan yaşanan sorunlara hızlı ve etkili çözümler üretebilir, çalışma ortamınızı daha sağlıklı ve verimli hale getirebilirsiniz.                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection
