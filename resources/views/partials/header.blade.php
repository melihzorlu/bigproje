<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FirmaCv Sticky Header</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('menuToggle');
            const closeBtn = document.getElementById('menuClose');
            const mobileMenu = document.getElementById('mobileMenu');

            toggleBtn.addEventListener('click', function () {
                mobileMenu.classList.add('active');
            });

            closeBtn.addEventListener('click', function () {
                mobileMenu.classList.remove('active');
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const consent = localStorage.getItem("cookie_consent");

            if (!consent) {
                document.getElementById("cookie-consent-banner").style.display = "flex";
            }

            document.getElementById("accept-cookies").addEventListener("click", function () {
                localStorage.setItem("cookie_consent", "accepted");
                document.getElementById("cookie-consent-banner").style.display = "none";
            });
        });
    </script>

    <script>
        const wrapper = document.getElementById("trendingWrapper");
        let scrollAmount = 0;

        function slideLeft() {
            scrollAmount = Math.max(scrollAmount - 320, 0);
            wrapper.style.transform = `translateX(-${scrollAmount}px)`;
        }

        function slideRight() {
            const maxScroll = wrapper.scrollWidth - wrapper.clientWidth;
            scrollAmount = Math.min(scrollAmount + 320, maxScroll);
            wrapper.style.transform = `translateX(-${scrollAmount}px)`;
        }
    </script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuItems = document.querySelectorAll("#menuList .list-group-item");
        const accordions = document.querySelectorAll(".accordion-content");

        menuItems.forEach(item => {
            item.addEventListener("click", function() {
                // Sol menü aktifliği değiştir
                menuItems.forEach(el => el.classList.remove("active", "fw-bold"));
                this.classList.add("active", "fw-bold");

                // Accordion görünürlüğünü değiştir
                const targetAccordion = this.getAttribute("data-target");
                accordions.forEach(acc => {
                    acc.classList.add("d-none");
                    if (acc.id === targetAccordion) {
                        acc.classList.remove("d-none");
                    }
                });
            });
        });
    });

    document.querySelectorAll('.sidebar a').forEach(link => {
        link.addEventListener('click', function() {
            document.querySelectorAll('.sidebar a').forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });

</script>
    <style>
        #cookie-consent-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #222;
            color: #fff;
            padding: 15px;
            font-size: 14px;
            display: none;
            z-index: 9999;
            justify-content: space-between;
            align-items: center;
            opacity: 0.85; /* %85 şeffaflık */
        }

        #cookie-consent-banner button {
            background-color: #00b46c; /* Mor buton */
            border: none;
            padding: 8px 12px;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        #cookie-consent-banner a {
            text-decoration: none; /* Altı çizili olmasın */
            color: #fff;
        }

        #cookie-consent-banner a:hover {
            text-decoration: underline; /* Hover'da altı çizilebilir */
        }
    </style>


    <style>

    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .text-white {
            text-decoration: none !important; /* Varsayılan olarak altı çizgisiz */
        }

        .text-white:hover {
            text-decoration: underline !important; /* Üzerine gelince altı çizili olacak */
        }
        .offer-wrapper {
            padding: 73px 0 50px;
        }

        .desktop-header {
            background-color: #fff;
            padding: 1rem 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            height: 50px;
        }

        .btn-outline-green,
        .btn-purple {
            padding: 0.4rem 1rem;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            white-space: nowrap;
            font-size: 0.95rem;
        }

        .btn-outline-green {
            background-color: transparent;
            border: 2px solid #00b46c;
            color: #00b46c;
        }

        .btn-outline-green:hover {
            background-color: #00b46c;
            color: white;
        }

        .btn-purple {
            background-color: #695ce6;
            border: 2px solid #695ce6;
            color: white;
        }

        .btn-purple:hover {
            background-color: #594bd3;
            border-color: #594bd3;
        }

        .hamburger-menu {
            font-size: 28px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.25rem 0.5rem;
        }

        /* Mobil menü (offcanvas) */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 280px;
            height: 100vh;
            background: white;
            box-shadow: -2px 0 10px rgba(0,0,0,0.1);
            transition: right 0.3s ease;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            padding: 1.5rem;
        }

        .mobile-menu.active {
            right: 0;
        }

        .mobile-menu .menu-close {
            font-size: 28px;
            background: none;
            border: none;
            color: #333;
            align-self: flex-end;
            margin-bottom: 1rem;
            cursor: pointer;
        }

        .mobile-search {
            padding: 0.5rem 1rem;
            border: 1px solid #ccc;
            border-radius: 30px;
            width: 100%;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-buttons {
                display: none !important;
            }

            .btn-purple.d-md-none {
                display: inline-block !important;
            }

            .hamburger-menu {
                display: inline-block;
            }
        }

        .solution-text {
            margin-right: 10px;
        }

        /* İstatistik Bölümü için İkon ve İçerik Düzeni */
        .stat-icon {
            max-width: 80px;
            height: auto;
        }

        /* Mobil Görünüm (2 sütun) */
        @media (max-width: 768px) {
            .col-6 {
                text-align: center;
            }
        }

        /*Profile Detay*/

        .sidebar-custom a {
            display: block;
            padding: 12px 20px;
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s;
        }

        .sidebar-custom a:hover {
            background-color: #343a40;
            text-decoration: none;
        }

        .sidebar-custom a.active {
            background-color: #ffffff !important;
            color: #000000 !important;
            font-weight: 600;
            box-shadow: inset 4px 0 0 #0d6efd; /* sol mavi çizgi efekti */
        }
        .custom-profile-page {
            font-family: 'Segoe UI', sans-serif;
        }

        .custom-sidebar {
            min-height: 100vh;
        }

        .custom-sidebar-menu .nav-link {
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .custom-sidebar-menu .nav-link:hover {
            background-color: #343a40;
            border-radius: 6px;
        }
        /*Profile Detay*/

/*ŞİKAYET DETAY */
        .complaint-container {
            max-width: 880px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .complaint-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #444;
        }

        .complaint-title a {
            color: #6c63ff;
            text-decoration: none;
        }

        .complaint-meta {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 12px;
            margin-bottom: 16px;
            font-size: 0.95rem;
            color: #777;
        }

        .complaint-meta .user-initial {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ffc107;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            font-size: 1.1rem;
        }

        .complaint-body {
            font-size: 1.05rem;
            color: #333;
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .complaint-actions {
            border-top: 1px solid #eee;
            padding-top: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .complaint-actions button,
        .complaint-actions .like-button {
            background: none;
            border: none;
            color: #6c63ff;
            font-weight: 600;
            cursor: pointer;
        }

        .comment-section {
            margin-top: 40px;
        }

        .comment-section h3 {
            font-size: 1.3rem;
            margin-bottom: 12px;
            color: #444;
        }

        .comment-placeholder {
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1px solid #ddd;
            padding: 10px 14px;
            border-radius: 8px;
            background-color: #fafafa;
            color: #888;
        }

        .comment-placeholder img,
        .comment-placeholder .user-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: #ddd;
        }

        /* Mobil uyumluluk */
        @media (max-width: 600px) {
            .complaint-title {
                font-size: 1.5rem;
            }

            .complaint-body {
                font-size: 1rem;
            }

            .complaint-container {
                padding: 0 15px;
            }
        }
/*ŞİKAYET DETAY */


        /* Genel Ayarlar */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
        }




        /* Butonlar */
        .custom-btn {
            font-size: 16px;
            padding: 8px 16px;
        }

        .custom-btn i {
            margin-right: 5px;
        }





        /* 576px Altı (Mobil) */
        @media (max-width: 576px) {
            h2 {
                font-size: 1.3rem;
            }
            h3 {
                font-size: 1.1rem;
            }
            p {
                font-size: 0.85rem;
            }
            .container {
                padding: 0 15px;
            }
            .col-md-3, .col-md-4 {
                width: 100%;
                margin-bottom: 20px;
            }
            .live-button {
                font-size: 10px;
                padding: 5px 10px;
            }
        }

        /* 480px Altı (Küçük Mobil) */
        @media (max-width: 480px) {
            h1 {
                font-size: 1.8rem;
            }
            h2 {
                font-size: 1.2rem;
            }
            h3 {
                font-size: 1rem;
            }
            p {
                font-size: 0.8rem;
            }
            .live-button {
                font-size: 9px;
                padding: 4px 8px;
            }
            .col-md-3, .col-md-4 {
                width: 100%;
            }
        }


        /*BLOG CSS*/
        .blog-section {
            background-color: #fff;
            padding-top: 60px;
            padding-bottom: 60px;
            margin: 0;
        }

        .category-btn {
            border: 1px solid #dcdce0;
            background-color: #fff;
            border-radius: 40px;
            padding: 10px 25px;
            font-size: 1rem;
            color: #555;
            margin: 6px;
            transition: all 0.3s ease;
        }

        .category-btn:hover {
            background-color: #f4f4f4;
            color: #000;
        }

        .icon-group span {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .circle-green { background-color: #3bd38c; }
        .circle-gray  { background-color: #ccc; }
        .circle-blue  { background-color: #b2bbff; }

        .triangle-yellow {
            display: inline-block;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 18px solid #fcd20f;
            transform: rotate(-45deg);
        }


        .articles-section .card-title {
            font-size: 1.1rem;
            line-height: 1.4;
        }

        .articles-section .card-text {
            font-size: 0.95rem;
            color: #555;
        }

        .articles-section img {
            object-fit: cover;
            height: 200px;
        }

        /*BLOG CSS*/

        /*BLOG DETAY */

        .blog-title {
            font-size: 2rem;
            font-weight: bold;
        }
        .blog-date {
            font-size: 0.9rem;
            color: #6c757d;
        }
        .blog-image {
            width: 100%;
            height: auto;
            border-radius: 0.5rem;
        }
        .blog-content {
            font-size: 1.05rem;
            line-height: 1.7;
            color: #333;
        }

        .info-section,
        .image-section,
        .content-section {
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        .image-section img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .icon-group span {
            width: 12px;
            height: 12px;
            display: inline-block;
            border-radius: 50%;
        }

        .triangle-yellow {
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 14px solid #ffc107;
            margin-top: 2px;
        }

        .circle-green {
            background-color: #28a745;
        }

        .circle-gray {
            background-color: #6c757d;
        }

        .circle-blue {
            background-color: #007bff;
        }

        .content-section h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .content-section p {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #555;
        }
        /*BLOG DETAY */
    </style>


</head>
<body>

<!-- Üst Header -->
{{--<div class="top-header">
    <div>
        <strong>Toplam çözüm sayısı:</strong>
        <span class="solution-number text-success fw-bold">3.648.427</span>
    </div>
    <div class="d-flex align-items-center">
        <span class="solution-text">Personel şikayetlerini ve çözümleri canlı olarak takip et</span>
        <button class="live-button ms-auto">&#127909; CANLI İZLE</button>
    </div>
</div>--}}

<!-- Masaüstü Sticky Header -->
<header class="desktop-header sticky-header">
    <div class="header-container">
        <!-- Sol: Logo -->
        <a href="/" class="logo">
            <img src="{{ asset('images/fimracvlogo.svg') }}" alt="FirmaCv Logo">
        </a>

        <!-- Ortada: Deneyimi Yaz (mobilde görünür, masaüstünde gizli) -->
        <a href="#" class="btn-purple d-md-none">
            + Deneyimi Yaz
        </a>

        <!-- Sağ: Hamburger Menü (mobil) -->
        <button class="hamburger-menu d-md-none" id="menuToggle">&#9776;</button>

        <!-- Masaüstü butonlar -->
        <div class="header-buttons d-none d-md-flex align-items-center gap-3">
            <a href="#" class="btn-outline-green" data-bs-toggle="modal" data-bs-target="#loginModal">
                Giriş Yap / Üye Ol
            </a>
            <a href="#" class="btn-purple">
                + Deneyimi Yaz
            </a>
        </div>
    </div>

    <!-- Mobil Menü (offcanvas gibi sağdan çıkan) -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-inner">
            <button id="menuClose" class="menu-close">&times;</button>

            <a href="#" class="btn-outline-green mt-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                Giriş Yap / Üye Ol
            </a>

            <input type="text" class="mobile-search mt-3" placeholder="Ara...">
        </div>
    </div>
</header>



</body>
</html>

