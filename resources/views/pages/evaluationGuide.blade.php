
@extends('layouts.app')
@section('title', 'Değerlendirme Klavuzu')
@section('content')

    <section class="py-5" style="background-color: #f7f8fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">İçerik Değerlendirme Esasları Kılavuzu</h2>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">1. Amaç</h5>
                        <p>Bu kılavuz, Firma CV Platformu’na kullanıcılar tarafından gönderilen içeriklerin değerlendirilmesine ilişkin esasları düzenlemek amacıyla hazırlanmıştır. Kılavuz, içeriklerin platform ilkeleri, etik kurallar, ilgili mevzuat ve kişisel veri güvenliği çerçevesinde incelenmesini ve yönetilmesini sağlamayı hedeflemektedir.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">2. Kapsam</h5>
                        <p>Bu kılavuz; platforma gönderilen, yayınlanan veya yayınlanması talep edilen tüm içeriklerin değerlendirilmesi sürecinde uygulanacak temel ilkeleri kapsar. Moderasyon ve içerik kontrol süreçlerinde görevli ekipler, bu kılavuza uygun şekilde değerlendirme yapmakla sorumludur.</p>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">3. Dayanak</h5>
                        <p>Bu kılavuz, 6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK”), Türk Ceza Kanunu, ilgili özel mevzuatlar ve Firma CV Platformu’nun Kullanım Koşulları, Gizlilik Politikası ve Topluluk Kuralları temel alınarak hazırlanmıştır.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">4. Tanımlar</h5>
                        <ul class="list-unstyled mb-0">
                            <li><span class="text-primary">●</span> <strong>Platform:</strong> Firma CV markasına ait dijital mecra.</li>
                            <li><span class="text-primary">●</span> <strong>İçerik:</strong> Kullanıcıların gönderdiği yazılı veri.</li>
                            <li><span class="text-primary">●</span> <strong>Moderasyon:</strong> İçerik kontrol süreci.</li>
                            <li><span class="text-primary">●</span> <strong>Kullanıcı:</strong> İçerik gönderen kişi.</li>
                            <li><span class="text-primary">●</span> <strong>Kişisel Veri:</strong> Tanımlayıcı her türlü bilgi.</li>
                            <li><span class="text-primary">●</span> <strong>İhlal:</strong> Kılavuz aykırılığı.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 p-md-5 rounded shadow-sm mb-4">
                <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-4">5. Değerlendirme Kriterleri</h5>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="fw-bold">5.1 Konu Uygunluğu</h6>
                        <ul class="list-unstyled">
                            <li><span class="text-primary">●</span> İş yaşamına dair olmalı.</li>
                            <li><span class="text-primary">●</span> Bilgi/şikâyet/tavsiye içermeli.</li>
                            <li><span class="text-primary">●</span> Özel hayat/siyaset dışı olmalı.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold">5.2 Üslup ve Dil</h6>
                        <ul class="list-unstyled">
                            <li><span class="text-primary">●</span> Hakaret, küfür yasak.</li>
                            <li><span class="text-primary">●</span> Kişisel saldırı reddedilir.</li>
                            <li><span class="text-primary">●</span> Saygılı ve yapıcı olunmalı.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold">5.3 Anonimlik ve Gizlilik</h6>
                        <ul class="list-unstyled">
                            <li><span class="text-primary">●</span> İsim/iletişim bilgisi olmamalı.</li>
                            <li><span class="text-primary">●</span> Markaya zarar verilmemeli.</li>
                            <li><span class="text-primary">●</span> Özel bilgiler paylaşılmamalı.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold">5.4 Gerçeklik ve Dayanıklılık</h6>
                        <ul class="list-unstyled">
                            <li><span class="text-primary">●</span> Kişisel deneyim esas alınır.</li>
                            <li><span class="text-primary">●</span> İtibara zarar vermemeli.</li>
                            <li><span class="text-primary">●</span> “Duydum” gibi ifadeler riskli.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold">5.5 Reklam ve Tanıtım Yasağı</h6>
                        <ul class="list-unstyled">
                            <li><span class="text-primary">●</span> Reklam içeriği yasaktır.</li>
                            <li><span class="text-primary">●</span> Tanıtım bağlantıları reddedilir.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">6. İçerik İşleme Süreci</h5>
                        <ul class="list-unstyled">
                            <li><span class="text-primary">●</span> İçerik 24 saat içinde kontrol edilir.</li>
                            <li><span class="text-primary">●</span> Kriterlere göre moderasyon uygulanır.</li>
                            <li><span class="text-primary">●</span> Düzenleme istenebilir.</li>
                            <li><span class="text-primary">●</span> Uygun içerik yayımlanır.</li>
                            <li><span class="text-primary">●</span> Reddedilen içerik bildirilir.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">7. Düzenleme ve İtiraz</h5>
                        <ul class="list-unstyled">
                            <li><span class="text-primary">●</span> Reddedilen içerik yeniden düzenlenebilir.</li>
                            <li><span class="text-primary">●</span> İtirazlar <strong>info@firmacv.com</strong> adresine yapılabilir.</li>
                            <li><span class="text-primary">●</span> İtirazlar değerlendirilir ve sonuç bildirilir.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">8. Kişisel Veri Güvenliği</h5>
                        <p>KVKK’ya uygunluk esastır. Veriler kullanıcı onayı olmadan paylaşılmaz. Kişisel veri içeren içerikler yayına alınmaz.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">9. Kapsam Dışı Durumlar</h5>
                        <p>Hukuki bildirim, mahkeme kararı veya yasal zorunluluk hâlinde içerik kaldırılabilir veya hesap askıya alınabilir.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                <h5 class="fw-semibold border-start border-4 border-primary ps-3 mb-3">10. Yürürlük</h5>
                <p>Bu kılavuz, <strong>[xx.xx.xxxx]</strong> tarihi itibarıyla yürürlüğe girmiştir. Firma CV Platformu yönetimi gerekli durumlarda kılavuzda değişiklik yapma hakkına sahiptir.</p>
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
