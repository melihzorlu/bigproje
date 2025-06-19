@extends('layouts.app')
@section('title', ' Personel Şikayeti Detay')
@section('content')

    <section class="complaint-section" style="padding: 40px 0; background-color: #f9f9f9;">
        <div class="container" style="max-width: 800px; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">

            <!-- Şikayet Üst Bilgisi -->
            <div class="complaint-meta d-flex align-items-center gap-3 mb-3">
                <div class="user-initial" style="width: 40px; height: 40px; border-radius: 50%; background-color: #6c63ff; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 18px;">
                    {{ Str::substr($complaint->user->name ?? 'A', 0, 1) }}
                </div>
                <div>
                    <strong>{{ $complaint->user->name ?? 'Anonim' }}</strong> •
                    {{ $complaint->created_at->translatedFormat('d F H:i') }} •
                    {{ number_format($complaint->view_count ?? 0, 0, ',', '.') }} görüntülenme
                </div>
            </div>

            <!-- Şikayet İçeriği -->
            <div class="complaint-body" style="font-size: 17px; line-height: 1.7; margin-bottom: 20px;">
                {{ $complaint->description }}
            </div>

            <!-- Destekle & Paylaş Butonları -->
            <div class="complaint-actions d-flex align-items-center gap-3 flex-wrap mb-4">
                <button class="btn btn-sm btn-outline-success d-flex align-items-center gap-1" onclick="alert('Destek verdiniz!')">
                    <i class="fa-solid fa-thumbs-up"></i> Destekle
                </button>

                <button class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1" onclick="copyComplaintLink('{{ request()->fullUrl() }}')">
                    <i class="fa-solid fa-link"></i> Bağlantıyı Kopyala
                </button>

                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}"
                   target="_blank"
                   class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">
                    <i class="fa-brands fa-linkedin"></i> LinkedIn'de Paylaş
                </a>
            </div>

            <!-- Yorum Alanı -->
            <div class="comment-area mt-4">
                <h5 style="font-weight: bold;">Yorumlar</h5>
                <div class="comment-placeholder d-flex align-items-center gap-2 mt-2">
                    <div class="user-icon" style="width: 35px; height: 35px; border-radius: 50%; background-color: #e0e0e0;"></div>
                    <span style="color: #666;">İlk yorumu sen yap</span>
                </div>
            </div>
        </div>
    </section>
    <section class="text-center my-5">
        <canvas id="complaintCanvas" style="display:none;"></canvas>

        <button class="btn btn-primary" onclick="generateHighResComplaintImageWithLogo()">
            Görseli Oluştur
        </button>
        <a id="downloadLink" class="btn btn-success d-none mt-3" download="sikayet.jpg">
            JPEG Olarak İndir
        </a>
    </section>

    <script>
        function generateHighResComplaintImageWithLogo() {
            const complaintText = @json($complaint->description);
            const scale = 3;
            const width = 1200 * scale;
            const height = 630 * scale;

            const canvas = document.getElementById("complaintCanvas");
            canvas.width = width;
            canvas.height = height;

            const ctx = canvas.getContext("2d");

            // Gradient arkaplan (mor -> yeşil)
            const gradient = ctx.createLinearGradient(0, 0, width, height);
            gradient.addColorStop(0, "#6c63ff");
            gradient.addColorStop(1, "#00e676");
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, width, height);

            // Yazı
            ctx.font = `${36 * scale}px Arial`;
            ctx.fillStyle = "#ffffff";
            ctx.textAlign = "center";

            const maxWidth = width - (100 * scale);
            const lineHeight = 42 * scale;
            const x = width / 2;
            let y = 100 * scale;

            const words = complaintText.split(" ");
            let line = "";

            for (let i = 0; i < words.length; i++) {
                const testLine = line + words[i] + " ";
                const testWidth = ctx.measureText(testLine).width;
                if (testWidth > maxWidth && i > 0) {
                    ctx.fillText(line, x, y);
                    line = words[i] + " ";
                    y += lineHeight;
                } else {
                    line = testLine;
                }
            }
            ctx.fillText(line, x, y);

            // Logo ekle
            const logo = new Image();
            logo.crossOrigin = "anonymous"; // Eğer uzaktan ise CORS için
            logo.src = "{{ asset('images/fimracvlogo.svg') }}"; // LOGO yolunu burada belirtiyoruz

            logo.onload = function () {
                const logoWidth = 150 * scale;
                const logoHeight = 50 * scale;
                const padding = 30 * scale;

                ctx.drawImage(
                    logo,
                    width - logoWidth - padding,
                    height - logoHeight - padding,
                    logoWidth,
                    logoHeight
                );

                // JPEG çıktısı oluştur
                const jpegDataURL = canvas.toDataURL("image/jpeg", 0.9);
                const link = document.getElementById("downloadLink");
                link.href = jpegDataURL;
                link.classList.remove("d-none");
            };
        }
    </script>
    <!-- Font Awesome (gerekirse ekleyin) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- JS -->
    <script>
        function copyComplaintLink(url) {
            navigator.clipboard.writeText(url).then(function () {
                alert("Bağlantı panoya kopyalandı!");
            }, function (err) {
                alert("Kopyalama işlemi başarısız oldu.");
            });
        }
    </script>
@endsection
