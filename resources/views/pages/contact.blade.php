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
                    <div class="card shadow-sm border-0 rounded-4 p-4 hover-effect"
                         data-bs-toggle="modal" data-bs-target="#personModal">
                        <div class="mb-3">
                            <img src="{{asset('images/shake-icon.png')}}" alt="Tüketiciyim" width="50">
                        </div>
                        <h6 class="mb-0">Personelim</h6>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm border-0 rounded-4 p-4 hover-effect"
                         data-bs-toggle="modal" data-bs-target="#companyModal">
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

            <div class="row justify-content-center mb-4">
                <!-- E-Posta ve KEP -->
                <div class="col-md-4 mb-4">
                    <img src="{{ asset('images/email.svg') }}" alt="Email" width="140" class="mb-3">
                    <h6 class="fw-bold">E-posta</h6>
                    <p>
                        <a href="mailto:iletisim@firmacv.com" class="text-decoration-none text-dark">
                            iletisim@firmacv.com
                        </a>
                    </p>
                    <h6 class="fw-bold mt-4">Kep Adresi</h6>
                    <p>
                        <a href="mailto:firmacv@hs01.kep.tr" class="text-decoration-none text-dark">
                            firmacv@hs01.kep.tr
                        </a>
                    </p>
                </div>

                <!-- Telefon ve Ticari Bilgi -->
                <div class="col-md-4 mb-4">
                    <img src="{{ asset('images/contact.svg') }}" alt="Telefon" width="140" class="mb-3">
                    <h6 class="fw-bold">Telefon</h6>
                    <p>
                        <a href="tel:+901234567890" class="text-decoration-none text-dark">
                            0 (123) 456 78 90
                        </a>
                    </p>
                    <h6 class="fw-bold mt-4">Ticari Unvan</h6>
                    <p>Firma CV Bilişim A.Ş.</p>
                </div>

                <!-- Çalışma Saatleri ve Sicil -->
                <div class="col-md-4 mb-4">
                    <img src="{{ asset('images/shift.svg') }}" alt="Çalışma Saatleri" width="140" class="mb-3">
                    <h6 class="fw-bold">Çalışma Saatleri</h6>
                    <p>Hafta içi: 08:30 - 18:00</p>
                    <h6 class="fw-bold mt-4">Ticaret Sicil No</h6>
                    <p>34000 – İstanbul Ticaret Odası</p>
                </div>

            </div>

            <hr class="my-5">

            <!-- Konum -->
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('images/location.svg') }}" width="140" alt="Ofis Konumu" class="mb-3">

                    <h6 class="fw-bold mb-3">
                        <i class="bi bi-geo-alt-fill me-1"></i> Merkez Ofis
                    </h6>
                    <p>Caddebostan, Kadıköy / İstanbul</p>

                </div>
            </div>
        </div>
    </section>
    <!-- MODALLAR EKLENDİ-->
    <div class="modal fade" id="personModal" tabindex="-1" aria-labelledby="personModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <form method="POST" action="{{ route('send.person.mail') }}" class="w-100">
                @csrf
                <div class="modal-content border-0 shadow rounded-5 overflow-hidden">
                    <!-- Başlık -->
                    <div class="modal-header" style="background-color: #7064d5;">
                        <h5 class="modal-title text-white fw-semibold" id="personModalLabel">👤 Personel Talep Formu</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Kapat"></button>
                    </div>

                    <!-- Form İçeriği -->
                    <div class="modal-body p-4 bg-white">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Ad Soyad</label>
                                <input type="text" name="name" id="name" class="form-control form-control-lg border-1" required maxlength="100">
                                <span id="nameError" class="text-danger small d-none">Lütfen adınızı girin</span>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">E-posta</label>
                                <input type="email" name="email" id="email" class="form-control form-control-lg border-1" required maxlength="100">
                                <span id="emailError" class="text-danger small d-none">Geçerli bir e-posta girin</span>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Telefon</label>
                                <input type="text" name="phone" id="phone" class="form-control form-control-lg border-1" required maxlength="20">
                                <span id="phoneError" class="text-danger small d-none">Geçerli bir telefon girin (05xx xxx xx xx)</span>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Konu Başlığı</label>
                                <input type="text" name="subject" id="subject" class="form-control form-control-lg border-1" required maxlength="100">
                                <span id="subjectError" class="text-danger small d-none">Konu başlığı boş bırakılamaz</span>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium text-dark">Mesajınız <small class="text-muted">(max 500 karakter)</small></label>
                                <textarea name="message" id="message" class="form-control form-control-lg border-1" rows="4" maxlength="500" required></textarea>
                                <span id="messageError" class="text-danger small d-none">Mesaj alanı boş bırakılamaz</span>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer bg-light px-4 py-3">
                        <button type="submit" class="btn text-white btn-lg px-4" style="background-color: #00b46c;">📨 Gönder</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Firma Yetkilisi Modal -->
    <div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <form method="POST" action="{{ route('send.company.mail') }}" class="w-100" id="companyForm">
                @csrf
                <div class="modal-content border-0 shadow rounded-5 overflow-hidden">
                    <div class="modal-header" style="background-color: #7064d5;">
                        <h5 class="modal-title text-white fw-semibold">🏢 Firma Yetkilisi Talep Formu</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4 bg-white">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Ad Soyad</label>
                                <input type="text" name="name" id="companyName" class="form-control form-control-lg" required>
                                <span id="companyNameError" class="text-danger small d-none">Ad soyad girilmeli</span>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">E-posta</label>
                                <input type="email" name="email" id="companyEmail" class="form-control form-control-lg" required>
                                <span id="companyEmailError" class="text-danger small d-none">Geçerli bir e-posta girin</span>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Telefon</label>
                                <input type="text" name="phone" id="companyPhone" class="form-control form-control-lg" required>
                                <span id="companyPhoneError" class="text-danger small d-none">Geçerli bir telefon girin (05xx xxx xx xx)</span>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Konu Başlığı</label>
                                <input type="text" name="subject" id="companySubject" class="form-control form-control-lg" required>
                                <span id="companySubjectError" class="text-danger small d-none">Konu başlığı boş bırakılamaz</span>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Mesaj</label>
                                <textarea name="message" id="companyMessage" class="form-control form-control-lg" rows="4" maxlength="500" required></textarea>
                                <span id="companyMessageError" class="text-danger small d-none">Mesaj alanı boş bırakılamaz</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light px-4 py-3">
                        <button type="submit" class="btn text-white btn-lg px-4" style="background-color: #00b46c;">Gönder</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <style>
        textarea.form-control {
            resize: none;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("companyForm");

            const phone = document.getElementById("companyPhone");
            const email = document.getElementById("companyEmail");
            const name = document.getElementById("companyName");
            const subject = document.getElementById("companySubject");
            const message = document.getElementById("companyMessage");

            const phoneError = document.getElementById("companyPhoneError");
            const emailError = document.getElementById("companyEmailError");
            const nameError = document.getElementById("companyNameError");
            const subjectError = document.getElementById("companySubjectError");
            const messageError = document.getElementById("companyMessageError");

            // Telefon maskeleme
            phone.addEventListener("input", function () {
                let value = phone.value.replace(/\D/g, "").substring(0, 11);

                let formatted = "";
                if (value.length > 0) formatted += value.substring(0, 4);
                if (value.length >= 5) formatted += " " + value.substring(4, 7);
                if (value.length >= 8) formatted += " " + value.substring(7, 9);
                if (value.length >= 10) formatted += " " + value.substring(9, 11);

                phone.value = formatted;
            });

            // Canlı doğrulama
            email.addEventListener("input", () => toggleError(email, emailError, /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)));
            name.addEventListener("input", () => toggleError(name, nameError, name.value.trim().length >= 2));
            subject.addEventListener("input", () => toggleError(subject, subjectError, subject.value.trim() !== ""));
            message.addEventListener("input", () => toggleError(message, messageError, message.value.trim() !== ""));

            function toggleError(input, errorEl, isValid) {
                errorEl.classList.toggle("d-none", isValid);
            }

            form.addEventListener("submit", function (e) {
                let valid = true;

                if (!/^05\d{2} \d{3} \d{2} \d{2}$/.test(phone.value)) {
                    phoneError.classList.remove("d-none");
                    valid = false;
                } else {
                    phoneError.classList.add("d-none");
                }

                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
                    emailError.classList.remove("d-none");
                    valid = false;
                }

                if (name.value.trim().length < 2) {
                    nameError.classList.remove("d-none");
                    valid = false;
                }

                if (subject.value.trim() === "") {
                    subjectError.classList.remove("d-none");
                    valid = false;
                }

                if (message.value.trim() === "") {
                    messageError.classList.remove("d-none");
                    valid = false;
                }

                if (!valid) e.preventDefault();
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const phoneInput = document.getElementById("phone");
            const emailInput = document.getElementById("email");
            const nameInput = document.getElementById("name");
            const subjectInput = document.getElementById("subject");
            const messageInput = document.getElementById("message");

            const phoneError = document.getElementById("phoneError");
            const emailError = document.getElementById("emailError");
            const nameError = document.getElementById("nameError");
            const subjectError = document.getElementById("subjectError");
            const messageError = document.getElementById("messageError");

            const form = document.querySelector('form[action="{{ route('send.person.mail') }}"]');

            // Telefon maskeleme
            phoneInput.addEventListener("input", function () {
                let value = phoneInput.value.replace(/\D/g, "").substring(0, 11);

                let formatted = "";
                if (value.length > 0) formatted += value.substring(0, 4); // 05xx
                if (value.length >= 5) formatted += " " + value.substring(4, 7); // xxx
                if (value.length >= 8) formatted += " " + value.substring(7, 9); // xx
                if (value.length >= 10) formatted += " " + value.substring(9, 11); // xx

                phoneInput.value = formatted;
            });

            // Canlı doğrulama
            emailInput.addEventListener("input", () => toggleError(emailInput, emailError, isValidEmail(emailInput.value)));
            nameInput.addEventListener("input", () => toggleError(nameInput, nameError, nameInput.value.trim().length > 1));
            subjectInput.addEventListener("input", () => toggleError(subjectInput, subjectError, subjectInput.value.trim() !== ""));
            messageInput.addEventListener("input", () => toggleError(messageInput, messageError, messageInput.value.trim() !== ""));

            // Yardımcı fonksiyonlar
            function toggleError(input, errorEl, isValid) {
                errorEl.classList.toggle("d-none", isValid);
            }

            function isValidEmail(email) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            }

            function isValidPhone(phone) {
                return /^05\d{2} \d{3} \d{2} \d{2}$/.test(phone);
            }

            // Form submit kontrolü
            form.addEventListener("submit", function (e) {
                let valid = true;

                if (!isValidPhone(phoneInput.value)) {
                    phoneError.classList.remove("d-none");
                    valid = false;
                }

                if (!isValidEmail(emailInput.value)) {
                    emailError.classList.remove("d-none");
                    valid = false;
                }

                if (nameInput.value.trim().length < 2) {
                    nameError.classList.remove("d-none");
                    valid = false;
                }

                if (subjectInput.value.trim() === "") {
                    subjectError.classList.remove("d-none");
                    valid = false;
                }

                if (messageInput.value.trim() === "") {
                    messageError.classList.remove("d-none");
                    valid = false;
                }

                if (!valid) e.preventDefault();
            });
        });
    </script>
@endsection
