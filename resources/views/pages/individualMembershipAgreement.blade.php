@extends('layouts.app')
@section('title', 'Bireysel Kullanıcı Üyelik Sözleşmesi')
@section('content')


    <!-- Bootstrap CSS bağlantısını unutma -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <section class="container my-5">
        <div class="text-center mb-4">
            <h1 class="display-5 fw-bold">Bireysel Kullanıcı Üyelik Sözleşmesi</h1>
            <p class="text-muted">
                <strong>Yürürlük Tarihi:</strong> xx.xx.xxxx<br>
                <strong>Platform:</strong> Firma CV Platformu<br>
                <strong>Veri Sorumlusu:</strong> Firma CV<br>
                <strong>İletişim:</strong> <a href="mailto:info@firmacv.com">info@firmacv.com</a>
            </p>
        </div>

        <div class="mb-4">
            <h2 class="h4 fw-bold">1. TARAFLAR</h2>
            <p>İşbu Üyelik Sözleşmesi, Firma CV Platformu ile üye olan gerçek kişi kullanıcı (“Üye”) arasında elektronik ortamda kurulmuştur. Kullanıcı, üyelik formunu doldurarak ve bu sözleşmeyi onaylayarak hükümleri kabul etmiş sayılır.</p>
        </div>

        <div class="mb-4">
            <h2 class="h4 fw-bold">2. SÖZLEŞMENİN KONUSU</h2>
            <p>Bu sözleşme, Üye’nin Platform üzerindeki kullanım koşulları, hak ve yükümlülükleri ile birlikte kişisel veri işleme, içerik paylaşımı ve sorumluluklara dair esasları düzenler.</p>
        </div>

        <div class="mb-4">
            <h2 class="h4 fw-bold">3. ÜYE'NİN HAK VE YÜKÜMLÜLÜKLERİ</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Üye, yalnızca kendisine ait, doğru ve güncel bilgilerle üyelik oluşturduğunu taahhüt eder.</li>
                <li class="list-group-item">Üye, Platform'da yalnızca kendi iş deneyimlerine ve gözlemlerine dayanan içerikleri paylaşacağını kabul eder.</li>
                <li class="list-group-item">Üye, üçüncü kişilere ait kişisel veri, hakaret, iftira, tehdit, ticari sır gibi yasaya aykırı içerikler paylaşmayacağını beyan eder.</li>
                <li class="list-group-item">Üye, hesabının güvenliğini sağlamakla yükümlüdür.</li>
                <li class="list-group-item">Üye, KVKK ve diğer yasal düzenlemelere uygun hareket etmekle yükümlüdür.</li>
            </ul>
        </div>

        <div class="mb-4">
            <h2 class="h4 fw-bold">4. PLATFORM’UN HAK VE YÜKÜMLÜLÜKLERİ</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Platform, kullanıcı deneyimini artırmak, hizmetlerini iyileştirmek ve güvenliği sağlamak amacıyla kişisel verileri KVKK kapsamında işler.</li>
                <li class="list-group-item">Platform, Üye tarafından oluşturulan içeriklerin yayınlanıp yayınlanmamasına karar verme, içeriği silme, düzenleme hakkını saklı tutar.</li>
                <li class="list-group-item">Platform, yasal zorunluluk halinde içerikleri ve kullanıcı bilgilerini yetkili mercilere iletebilir.</li>
            </ul>
        </div>

        <div class="mb-4">
            <h2 class="h4 fw-bold">5. FİKRİ MÜLKİYET HAKLARI</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Üye, Platform'da yayınladığı içeriklerin tüm fikrî haklarının kendisine ait olduğunu beyan eder.</li>
                <li class="list-group-item">Üye, Platform’a bu içerikleri tanıtım, istatistiksel analiz ve ürün geliştirme amacıyla kullanma hakkı tanır.</li>
            </ul>
        </div>

        <div class="mb-4">
            <h2 class="h4 fw-bold">6. SÖZLEŞMENİN FESHİ</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Üye, dilediği zaman hesabını kapatarak üyeliğini sonlandırabilir.</li>
                <li class="list-group-item">Platform, Üye’nin işbu sözleşmeye, mevzuata veya topluluk kurallarına aykırı hareket ettiğini tespit ederse, üyeliği askıya alma veya tamamen sonlandırma hakkını saklı tutar.</li>
            </ul>
        </div>

        <div class="mb-4">
            <h2 class="h4 fw-bold">7. UYUŞMAZLIKLAR VE YETKİ</h2>
            <p>Bu sözleşmenin uygulanmasında Türkiye Cumhuriyeti Kanunları geçerli olup, uyuşmazlıkların çözümünde İstanbul Merkez Mahkemeleri ve İcra Daireleri yetkilidir.</p>
        </div>
    </section>


@endsection
