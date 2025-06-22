document.addEventListener("DOMContentLoaded", function () {
    // 📱 Mobil Menü Aç/Kapat
    const toggleBtn = document.getElementById("menuToggle");
    const closeBtn = document.getElementById("menuClose");
    const mobileMenu = document.getElementById("mobileMenu");

    if (toggleBtn && closeBtn && mobileMenu) {
        toggleBtn.addEventListener("click", () => {
            mobileMenu.classList.remove("d-none");
            mobileMenu.classList.add("active");
        });

        closeBtn.addEventListener("click", () => {
            mobileMenu.classList.remove("active");
            setTimeout(() => mobileMenu.classList.add("d-none"), 300); // animasyon sonrası gizle
        });
    }

    // 🍪 Çerez Onayı
    const consentBanner = document.getElementById("cookie-consent-banner");
    const acceptCookiesBtn = document.getElementById("accept-cookies");

    if (consentBanner && acceptCookiesBtn) {
        const consent = localStorage.getItem("cookie_consent");

        if (!consent) {
            consentBanner.style.display = "flex";
        }

        acceptCookiesBtn.addEventListener("click", () => {
            localStorage.setItem("cookie_consent", "accepted");
            consentBanner.style.display = "none";
        });
    }

    // ➡️ Slider Butonları (Çok Konuşulanlar)
    const wrapper = document.getElementById("trendingWrapper");
    let scrollAmount = 0;

    window.slideLeft = function () {
        if (wrapper) {
            scrollAmount = Math.max(scrollAmount - 320, 0);
            wrapper.style.transform = `translateX(-${scrollAmount}px)`;
        }
    };

    window.slideRight = function () {
        if (wrapper) {
            const maxScroll = wrapper.scrollWidth - wrapper.clientWidth;
            scrollAmount = Math.min(scrollAmount + 320, maxScroll);
            wrapper.style.transform = `translateX(-${scrollAmount}px)`;
        }
    };

    // 📚 Sol Menü + Accordion Aktifliği
    const menuItems = document.querySelectorAll("#menuList .list-group-item");
    const accordions = document.querySelectorAll(".accordion-content");

    menuItems.forEach(item => {
        item.addEventListener("click", function () {
            const targetAccordion = this.getAttribute("data-target");

            // Sol menüde aktifliği değiştir
            menuItems.forEach(el => el.classList.remove("active", "fw-bold"));
            this.classList.add("active", "fw-bold");

            // Accordion göster/gizle
            accordions.forEach(acc => {
                acc.classList.add("d-none");
                if (acc.id === targetAccordion) {
                    acc.classList.remove("d-none");
                }
            });
        });
    });


    // 📌 Sidebar Aktif Bağlantı
    document.querySelectorAll(".sidebar a").forEach(link => {
        link.addEventListener("click", function () {
            document.querySelectorAll(".sidebar a").forEach(l => l.classList.remove("active"));
            this.classList.add("active");
        });
    });
});


