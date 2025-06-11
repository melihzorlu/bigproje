{{-- resources/views/pages/about.blade.php --}}
@extends('layouts.app')
@section('title', 'Ziyaretçi Aydınlatma Metni')
@section('content')
    <section class="py-5" style="background-color: #f7f8fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Ziyaretçi Aydınlatma Metni</h2>
                <p class="text-muted mt-3">
                    Bu aydınlatma metni, 6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK”) uyarınca, veri sorumlusu sıfatıyla FirmaCV tarafından hazırlanmıştır.
                </p>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">Toplanan Kişisel Veriler</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> Kimlik Bilgileri (ad, soyad)</li>
                            <li class="mb-2"><span class="text-primary">●</span> Ziyaret Bilgileri (ziyaret saati, tarihi, kime geldiği)</li>
                            <li class="mb-2"><span class="text-primary">●</span> Görüntü Kayıtları (kamera kayıtları)</li>
                            <li class="mb-2"><span class="text-primary">●</span> İletişim Bilgileri (gerektiğinde telefon numarası)</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">İşlenme Amaçları</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> Fiziksel güvenliğin sağlanması</li>
                            <li class="mb-2"><span class="text-primary">●</span> Ziyaretçi giriş/çıkış süreçlerinin yönetilmesi</li>
                            <li class="mb-2"><span class="text-primary">●</span> Acil durumlarda iletişim kurulması</li>
                            <li class="mb-2"><span class="text-primary">●</span> Resmi mercilere bilgi verilmesi</li>
                            <li class="mb-2"><span class="text-primary">●</span> Hukuki yükümlülüklerin yerine getirilmesi</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <!-- Toplama Yöntemi ve Hukuki Sebep Kutusu -->
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">
                            Toplama Yöntemi ve Hukuki Sebep
                        </h5>
                        <p>Kişisel verileriniz, elektronik ortamda platforma üyelik, platformun kullanımı, çerezler ve iletişim formları aracılığıyla toplanmaktadır. Bu veriler KVKK m.5/2 uyarınca:</p>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> Sözleşmenin kurulması ve ifası</li>
                            <li class="mb-2"><span class="text-primary">●</span> Hukuki yükümlülüğün yerine getirilmesi</li>
                            <li class="mb-2"><span class="text-primary">●</span> Meşru menfaatin korunması</li>
                            <li class="mb-2"><span class="text-primary">●</span> Açık rıza (gerektiğinde)</li>
                        </ul>
                    </div>
                </div>

                <!-- Kişisel Verilerin Aktarımı Kutusu -->
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">
                            Kişisel Verilerin Aktarımı
                        </h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> Hizmet sağlayıcılarımızla</li>
                            <li class="mb-2"><span class="text-primary">●</span> Yetkili kamu kurum ve kuruluşlarıyla</li>
                            <li class="mb-2"><span class="text-primary">●</span> Hukuken yetkili özel kişi ve kurumlarla</li>
                        </ul>
                        <p class="mt-3 mb-0">Yurtdışına veri aktarımı söz konusu olduğunda açık rızanız alınmaksızın işlem yapılmaz.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">Haklarınız</h5>
                <p>KVKK'nın 11. maddesi uyarınca kişisel verilerinizle ilgili olarak:</p>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> İşlenip işlenmediğini öğrenme</li>
                            <li class="mb-2"><span class="text-primary">●</span> İşlenmişse bilgi talep etme</li>
                            <li class="mb-2"><span class="text-primary">●</span> Amacına uygun kullanılıp kullanılmadığını öğrenme</li>
                            <li class="mb-2"><span class="text-primary">●</span> Aktarıldığı kişileri öğrenme</li>
                            <li class="mb-2"><span class="text-primary">●</span> Eksik veya yanlış işlenmişse düzeltme isteme</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> Silinmesini/yok edilmesini isteme</li>
                            <li class="mb-2"><span class="text-primary">●</span> Bu işlemlerin üçüncü kişilere bildirilmesini isteme</li>
                            <li class="mb-2"><span class="text-primary">●</span> Otomatik sistem analizine itiraz etme</li>
                            <li class="mb-2"><span class="text-primary">●</span> Zarara uğradıysanız tazminini talep etme</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <div class="bg-primary bg-opacity-10 rounded p-3 d-inline-block">
                    Bu haklarınızı kullanmak için bizimle
                    <a href="mailto:info@firmacv.com" class="text-primary fw-semibold">info@firmacv.com</a>
                    üzerinden iletişime geçebilirsiniz.
                </div>
            </div>
        </div>
    </section>

@endsection
