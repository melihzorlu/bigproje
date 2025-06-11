{{-- resources/views/pages/about.blade.php --}}
@extends('layouts.app')
@section('title', 'Üye Aydınlatma Metni')
@section('content')
    <section class="py-5" style="background-color: #f7f8fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Üye Aydınlatma Metni</h2>
                <p class="text-muted mt-3">
                    İşbu Aydınlatma Metni, 6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK”) kapsamında, Firma CV platformuna üye olan gerçek kişilerin kişisel verilerinin işlenmesine ilişkin olarak, veri sorumlusu sıfatıyla hazırlanmıştır.
                </p>
            </div>

            <div class="row g-4 mb-4">
                <!-- Sol kutucuk -->
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">Kişisel Verilerinizin İşlenme Amacı</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> Üyelik işlemlerinin gerçekleştirilmesi</li>
                            <li class="mb-2"><span class="text-primary">●</span> Hizmetlerin sunulması ve kullanıcı deneyiminin iyileştirilmesi</li>
                            <li class="mb-2"><span class="text-primary">●</span> Kullanıcı geri bildirimlerinin alınması ve değerlendirilmesi</li>
                            <li class="mb-2"><span class="text-primary">●</span> Platformun güvenliğinin sağlanması, kötüye kullanımın önlenmesi</li>
                            <li class="mb-2"><span class="text-primary">●</span> Mevzuattan doğan yükümlülüklerin yerine getirilmesi</li>
                        </ul>
                    </div>
                </div>

                <!-- Sağ kutucuk -->
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">Kişisel Verilerinizin Aktarımı</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> Hizmet sağlayıcılarımızla</li>
                            <li class="mb-2"><span class="text-primary">●</span> Yetkili kamu kurum ve kuruluşlarıyla</li>
                            <li class="mb-2"><span class="text-primary">●</span> Hukuken yetkili özel kişi ve kurumlarla</li>
                        </ul>
                        <p class="mt-3 mb-0">Yurtdışına veri aktarımı söz konusu olduğunda açık rızanız alınmaksızın işlem yapılmaz.</p>
                    </div>
                </div>
            </div>

            <!-- Toplama Yöntemleri ve Hukuki Sebep -->
            <div class="bg-white p-4 p-md-5 rounded shadow-sm mb-4">
                <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">Toplama Yöntemleri ve Hukuki Sebep</h5>
                <p>Kişisel verileriniz, elektronik ortamda platforma üyelik, platformun kullanımı, çerezler ve iletişim formları aracılığıyla toplanmaktadır. Bu veriler KVKK m.5/2 uyarınca:</p>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><span class="text-primary">●</span> Sözleşmenin kurulması ve ifası</li>
                    <li class="mb-2"><span class="text-primary">●</span> Hukuki yükümlülüğün yerine getirilmesi</li>
                    <li class="mb-2"><span class="text-primary">●</span> Meşru menfaatin korunması</li>
                    <li class="mb-2"><span class="text-primary">●</span> Açık rıza (gerektiğinde)</li>
                </ul>
            </div>

            <!-- Haklarınız -->
            <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">Haklarınız</h5>
                <p>KVKK'nın 11. maddesi uyarınca kişisel verilerinizle ilgili olarak:</p>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> Kişisel verilerinizin işlenip işlenmediğini öğrenme</li>
                            <li class="mb-2"><span class="text-primary">●</span> İşlenmişse buna ilişkin bilgi talep etme</li>
                            <li class="mb-2"><span class="text-primary">●</span> İşlenme amacını ve uygun kullanılıp kullanılmadığını öğrenme</li>
                            <li class="mb-2"><span class="text-primary">●</span> Aktarıldığı üçüncü kişileri bilme</li>
                            <li class="mb-2"><span class="text-primary">●</span> Eksik/yanlış işlenmişse düzeltme isteme</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> KVKK m.7 kapsamında silinmesini/yok edilmesini isteme</li>
                            <li class="mb-2"><span class="text-primary">●</span> Aktarıldığı kişilere bildirimi isteme</li>
                            <li class="mb-2"><span class="text-primary">●</span> Otomatik sistem analizine itiraz etme</li>
                            <li class="mb-2"><span class="text-primary">●</span> Zarar varsa tazminini talep etme</li>
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
