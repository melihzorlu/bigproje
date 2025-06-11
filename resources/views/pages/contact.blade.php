@extends('layouts.app')

@section('title', 'İletişim')
@section('content')
    <section class="py-5" style="background-color: #f5f6fb;">
        <div class="container text-center">
            <p class="text-secondary small">YARDIM</p>
            <h2 class="fw-bold mb-4">Size Nasıl Yardımcı Olabiliriz?</h2>
            <div class="input-group justify-content-center">
                <div class="form-floating" style="max-width: 600px; width: 100%;">
                    <input type="text" class="form-control rounded-pill shadow-sm ps-5" id="searchHelp" placeholder="Yardım almak istediğiniz konuyu yazın">
                    <label for="searchHelp" class="ps-5">Yardım almak istediğiniz konuyu yazın</label>
                    <span class="position-absolute start-0 top-50 translate-middle-y ms-3 text-secondary">
                    <i class="bi bi-search"></i>
                </span>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">

                <!-- Sol Menü -->
                <div class="col-md-4 mb-4">
                    <ul class="list-group" id="menuList">
                        <li class="list-group-item border-0 fw-bold active" data-target="accordionMembership">Üyelik</li>
                        <li class="list-group-item border-0 text-secondary" data-target="accordionSolution">Çözüm Aşaması</li>
                        <li class="list-group-item border-0 text-secondary" data-target="accordionComplaint">Personel Deneyim Süreci</li>
                    </ul>
                </div>

                <!-- Sağ Accordion Menü -->
                <div class="col-md-8">
                    <!-- Üyelik -->
                    <div class="accordion accordion-content" id="accordionMembership">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#membership1">
                                    Birden fazla üyelik oluşturabilir miyim?
                                </button>
                            </h2>
                            <div id="membership1" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    Üyelikle ilgili detaylar burada.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Çözüm Aşaması -->
                    <div class="accordion accordion-content d-none" id="accordionSolution">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#solution1">
                                    Deneyim süreci nedir?
                                </button>
                            </h2>
                            <div id="solution1" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                   Deneyim süreci ile ilgili detaylar burada.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Deneyim Süreci -->
                    <div class="accordion accordion-content d-none" id="accordionComplaint">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#complaint1">
                                    Personel şikayet süreci nasıl işler?
                                </button>
                            </h2>
                            <div id="complaint1" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    Personel şikayet süreci ile ilgili detaylar burada.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="py-5" style="background-color: #f5f6fb;">
        <div class="container text-center">
            <p class="text-secondary mb-4">
                Yukarıdaki içerikler yardımcı olamadıysa aşağıdan seçiminizi yapıp talep ve önerilerinizi iletebilirsiniz.
            </p>
            <div class="row justify-content-center">
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm border-0 rounded-4 p-4 hover-effect">
                        <div class="mb-3">
                            <img src="{{asset('images/shake-icon.png')}}" alt="Tüketiciyim" width="50">
                        </div>
                        <h6 class="mb-0">Personelim</h6>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm border-0 rounded-4 p-4 hover-effect">
                        <div class="mb-3">
                            <img src="{{asset('images/shake-icon.png')}}" alt="Firma Yetkilisiyim" width="50">
                        </div>
                        <h6 class="mb-0">Firma Yetkilisiyim</h6>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .hover-effect {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .hover-effect:hover {
                transform: translateY(-10px);
                box-shadow: 0 10px 20px rgba(0,0,0,0.1);
                cursor: pointer;
            }
        </style>
    </section>
    <section class="py-5 bg-white">
        <div class="container text-center mb-5">
            <h2 class="mb-5">İletişim</h2>

            <div class="row justify-content-center mb-5">
                <div class="col-md-3 mb-4">
                    <img src="email.png" alt="Email" width="40" class="mb-2">
                    <h6 class="fw-bold">E-posta</h6>
                    <p>iletisim@firmacv.com</p>

                    <h6 class="fw-bold">Kep Adresi</h6>
                    <p></p>
                </div>

                <div class="col-md-3 mb-4">
                    <img src="phone.png" alt="Telefon" width="40" class="mb-2">
                    <h6 class="fw-bold">Telefon</h6>
                    <p>0 (123) 456 78 90</p>

                    <h6 class="fw-bold">Ticari Unvan</h6>
                    <p>Firma CV Bilişim A.Ş.</p>
                </div>

                <div class="col-md-3 mb-4">
                    <img src="hours.png" alt="Çalışma Saatleri" width="40" class="mb-2">
                    <h6 class="fw-bold">Çalışma Saatleri</h6>
                    <p>08:30-18:00</p>

                    <h6 class="fw-bold">Ticari Sicil No</h6>
                    <p>34000 – İstanbul Ticaret Odası</p>
                </div>
            </div>

            <hr>

            <div class="row justify-content-center mt-5">
                <div class="col-md-3 mb-4">
                    <h6><i class="bi bi-geo-alt-fill"></i> İstanbul</h6>
                    <p>Caddebostan Kadıköy/İstanbul</p>
                </div>


            </div>
        </div>
    </section>

@endsection
