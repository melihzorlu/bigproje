@extends('layouts.app')
@section('title', 'Kullanım Koşulları')
@section('content')


    <section class="py-5" style="background-color: #f7f8fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Kullanım Şartları</h2>
                <p class="text-muted mt-3">
                    Lütfen Firma CV Platformu’nu kullanmadan önce bu Kullanım Şartları’nı dikkatlice okuyunuz. Platformu kullanarak bu şartları kabul etmiş sayılırsınız.
                </p>
            </div>

            <div class="row g-4">
                <!-- 1. TANIMLAR -->
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">1. Tanımlar</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> <strong>Platform:</strong> Firma CV internet sitesi veya uygulamaları.</li>
                            <li class="mb-2"><span class="text-primary">●</span> <strong>Kullanıcı:</strong> Kayıt olan veya içerik görüntüleyen kişi.</li>
                            <li class="mb-2"><span class="text-primary">●</span> <strong>İçerik:</strong> Kullanıcıların paylaştığı tüm bilgiler.</li>
                            <li class="mb-2"><span class="text-primary">●</span> <strong>Hizmet:</strong> Platformun sunduğu tüm özellikler.</li>
                        </ul>
                    </div>
                </div>

                <!-- 2. KABUL VE YÜKÜMLÜLÜKLER -->
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">2. Kabul ve Yükümlülükler</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> Gerçek bilgilerle kayıt oluşturma.</li>
                            <li class="mb-2"><span class="text-primary">●</span> Sadece kendi deneyimini paylaşma.</li>
                            <li class="mb-2"><span class="text-primary">●</span> Hakaret, iftira, küçük düşürme yasağı.</li>
                            <li class="mb-2"><span class="text-primary">●</span> Ahlaka ve mevzuata uygunluk.</li>
                        </ul>
                    </div>
                </div>

                <!-- 3. KULLANIM KOŞULLARI -->
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">3. Kullanım Koşulları</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> İçerikler bilgi amaçlıdır.</li>
                            <li class="mb-2"><span class="text-primary">●</span> İçeriğin sahibi kullanıcıdır.</li>
                            <li class="mb-2"><span class="text-primary">●</span> Platform doğruluğu garanti etmez.</li>
                            <li class="mb-2"><span class="text-primary">●</span> Paylaşılan görüşler kullanıcıya aittir.</li>
                        </ul>
                    </div>
                </div>

                <!-- 4. İÇERİK DENETİMİ -->
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">4. İçerik Denetimi ve Yayınlama</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> İçerikler ön moderasyona tabidir.</li>
                            <li class="mb-2"><span class="text-primary">●</span> Uygun olmayan içerik kaldırılabilir.</li>
                            <li class="mb-2"><span class="text-primary">●</span> İçerikler gerekirse resmi kurumlarla paylaşılabilir.</li>
                            <li class="mb-2"><span class="text-primary">●</span> Kullanıcı içeriğin silinmesini talep edebilir.</li>
                        </ul>
                    </div>
                </div>

                <!-- 5. FİKRİ MÜLKİYET -->
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">5. Fikri Mülkiyet Hakları</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> Tüm yazılım ve tasarım Firma CV’ye aittir.</li>
                            <li class="mb-2"><span class="text-primary">●</span> İzinsiz kopyalanamaz veya dağıtılamaz.</li>
                            <li class="mb-2"><span class="text-primary">●</span> Kişisel kullanım dışı kullanılamaz.</li>
                        </ul>
                    </div>
                </div>

                <!-- 6. HESAP GÜVENLİĞİ -->
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">6. Hesap Güvenliği</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> Hesap bilgilerinden kullanıcı sorumludur.</li>
                            <li class="mb-2"><span class="text-primary">●</span> Şüpheli durumda destek ekibine bilgi verilmelidir.</li>
                            <li class="mb-2"><span class="text-primary">●</span> Başkasına ait hesap açmak yasaktır.</li>
                        </ul>
                    </div>
                </div>

                <!-- 7. SORUMLULUK SINIRLAMASI -->
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">7. Sorumluluk Sınırlaması</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><span class="text-primary">●</span> Platform içeriklerden sorumlu değildir.</li>
                            <li class="mb-2"><span class="text-primary">●</span> Teknik aksaklıklardan kaynaklı zararlardan sorumlu değildir.</li>
                            <li class="mb-2"><span class="text-primary">●</span> Kullanım riski kullanıcıya aittir.</li>
                        </ul>
                    </div>
                </div>

                <!-- 8. KİŞİSEL VERİLER -->
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">8. Kişisel Verilerin Korunması</h5>
                        <p class="mb-0">Kullanıcının kişisel verileri yalnızca hizmet amacıyla, KVKK çerçevesinde işlenir. Ayrıntılar için <a href="#">KVKK Aydınlatma Metni</a>'ne bakınız.</p>
                    </div>
                </div>

                <!-- 9. DEĞİŞİKLİK HAKKI -->
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">9. Değişiklik Hakkı</h5>
                        <p class="mb-0">Firma CV, kullanım şartlarını güncelleme hakkına sahiptir. Yeni şartlar yayımlandığı andan itibaren geçerlidir.</p>
                    </div>
                </div>

                <!-- 10. HUKUK VE YETKİ -->
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">10. Uygulanacak Hukuk ve Yetki</h5>
                        <p class="mb-0">Bu şartlarla ilgili doğabilecek ihtilaflarda Türkiye Cumhuriyeti kanunları geçerlidir. İstanbul Mahkemeleri yetkilidir.</p>
                    </div>
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
