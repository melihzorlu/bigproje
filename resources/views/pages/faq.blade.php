@extends('layouts.app')

@section('title', 'Sıkça Sorulan Sorular')
@section('content')
    <section class="py-5" style="background-color: #f5f6fb;">
        <div class="container text-center">
            <p class="text-secondary small">YARDIM</p>
            <h2 class="fw-bold mb-4">Size Nasıl Yardımcı Olabiliriz?</h2>
            <form method="GET" action="{{ route('faq.index') }}">
                <div class="input-group justify-content-center">
                    <div class="form-floating" style="max-width: 600px; width: 100%;">
                        <input type="text" name="q" class="form-control rounded-pill shadow-sm ps-5"
                               id="searchHelp" value="{{ request('q') }}"
                               placeholder="Yardım almak istediğiniz konuyu yazın">
                        <label for="searchHelp" class="ps-5">Yardım almak istediğiniz konuyu yazın</label>
                        <span class="position-absolute start-0 top-50 translate-middle-y ms-3 text-secondary">
                <i class="bi bi-search"></i>
            </span>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <!-- Sol Menü -->
                <div class="col-md-4 mb-4">
                    <ul class="list-group" id="menuList">
                        @foreach($faqs as $category => $items)
                            <li class="list-group-item border-0 {{ $loop->first ? 'fw-bold active' : 'text-secondary' }}"
                                data-target="accordion-{{ \Str::slug($category) }}">
                                {{ ucfirst($category) }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Sağ Accordion Menü -->
                <div class="col-md-8">
                    @foreach($faqs as $category => $items)
                        <div class="accordion accordion-content {{ $loop->first ? '' : 'd-none' }}" id="accordion-{{ \Str::slug($category) }}">
                            @foreach($items as $index => $faq)
                                @php
                                    $accordionId = \Str::slug($category) . '-' . $index;
                                @endphp
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-{{ $accordionId }}">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse-{{ $accordionId }}"
                                                aria-expanded="false"
                                                aria-controls="collapse-{{ $accordionId }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse-{{ $accordionId }}"
                                         class="accordion-collapse collapse"
                                         aria-labelledby="heading-{{ $accordionId }}">
                                        <div class="accordion-body">
                                            {!! nl2br(e($faq->answer)) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
        // Kategori menüsü tıklanınca accordion grubu değiştir
        document.querySelectorAll('#menuList li').forEach(item => {
            item.addEventListener('click', function () {
                // Tüm menüleri pasifleştir
                document.querySelectorAll('#menuList li').forEach(el => {
                    el.classList.remove('fw-bold', 'active');
                    el.classList.add('text-secondary');
                });
                // Seçili menüyü aktif yap
                this.classList.add('fw-bold', 'active');
                this.classList.remove('text-secondary');

                // Accordionları gizle/göster
                document.querySelectorAll('.accordion-content').forEach(el => el.classList.add('d-none'));
                const targetId = this.getAttribute('data-target');
                const targetAccordion = document.getElementById(targetId);
                if (targetAccordion) {
                    targetAccordion.classList.remove('d-none');
                }
            });
        });
    </script>
@endsection
<script>
    const searchInput = document.getElementById('searchHelp');
    const menuItems = document.querySelectorAll('#menuList li');
    const allAccordions = document.querySelectorAll('.accordion-content');

    searchInput.addEventListener('input', function () {
        const query = this.value.toLowerCase().trim();

        if (query.length === 0) {
            // Arama kutusu boşsa varsayılan ilk kategoriye geri dön
            allAccordions.forEach((acc, index) => acc.classList.toggle('d-none', index !== 0));
            menuItems.forEach((li, index) => {
                li.classList.toggle('fw-bold', index === 0);
                li.classList.toggle('active', index === 0);
                li.classList.toggle('text-secondary', index !== 0);
            });
            // Tüm soruları göster
            document.querySelectorAll('.accordion-item').forEach(item => item.classList.remove('d-none'));
            return;
        }

        // Filtreleme
        allAccordions.forEach(accordion => {
            let hasMatch = false;

            accordion.querySelectorAll('.accordion-item').forEach(item => {
                const question = item.querySelector('.accordion-button').innerText.toLowerCase();
                const answer = item.querySelector('.accordion-body').innerText.toLowerCase();

                if (question.includes(query) || answer.includes(query)) {
                    item.classList.remove('d-none');
                    hasMatch = true;
                } else {
                    item.classList.add('d-none');
                }
            });

            accordion.classList.toggle('d-none', !hasMatch);
        });

        // Sol menü görünürlüğünü ayarla (sadece eşleşen kategoriyi açık yap)
        menuItems.forEach(li => {
            const targetId = li.getAttribute('data-target');
            const targetAccordion = document.getElementById(targetId);

            if (targetAccordion && !targetAccordion.classList.contains('d-none')) {
                li.classList.add('fw-bold', 'active');
                li.classList.remove('text-secondary');
            } else {
                li.classList.remove('fw-bold', 'active');
                li.classList.add('text-secondary');
            }
        });
    });

    // Kategori tıklama hâlini de koruyoruz
    menuItems.forEach(item => {
        item.addEventListener('click', function () {
            searchInput.value = ""; // Aramayı sıfırla
            menuItems.forEach(el => el.classList.remove('fw-bold', 'active'));
            this.classList.add('fw-bold', 'active');

            allAccordions.forEach(el => el.classList.add('d-none'));
            const targetId = this.getAttribute('data-target');
            const targetAccordion = document.getElementById(targetId);
            if (targetAccordion) {
                targetAccordion.classList.remove('d-none');
            }

            // Tüm soruları yeniden görünür yap
            document.querySelectorAll('.accordion-item').forEach(item => item.classList.remove('d-none'));
        });
    });
</script>
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchHelp');
            const menuItems = document.querySelectorAll('#menuList li');
            const accordionContents = document.querySelectorAll('.accordion-content');

            searchInput.addEventListener('input', function () {
                const searchValue = this.value.toLowerCase();

                // Menüleri ve akordeonları sıfırla
                menuItems.forEach(item => item.classList.remove('active', 'fw-bold'));
                accordionContents.forEach(acc => acc.classList.add('d-none'));

                let anyVisible = false;

                accordionContents.forEach(accordion => {
                    const items = accordion.querySelectorAll('.accordion-item');
                    let visibleItems = 0;

                    items.forEach(item => {
                        const question = item.querySelector('.accordion-button').textContent.toLowerCase();
                        const answer = item.querySelector('.accordion-body').textContent.toLowerCase();

                        if (question.includes(searchValue) || answer.includes(searchValue)) {
                            item.style.display = '';
                            visibleItems++;
                        } else {
                            item.style.display = 'none';
                        }
                    });

                    if (visibleItems > 0) {
                        accordion.classList.remove('d-none');
                        anyVisible = true;
                    }
                });

                // Arama kutusu boşsa ilk kategori aktif hale gelsin
                if (!searchValue) {
                    accordionContents.forEach((acc, index) => {
                        acc.classList.toggle('d-none', index !== 0);
                    });

                    menuItems.forEach((item, index) => {
                        item.classList.toggle('active', index === 0);
                        item.classList.toggle('fw-bold', index === 0);
                    });
                }
            });

            // Sol menüye tıklanınca sadece ilgili kategori gösterilsin
            menuItems.forEach(item => {
                item.addEventListener('click', function () {
                    menuItems.forEach(i => i.classList.remove('active', 'fw-bold'));
                    this.classList.add('active', 'fw-bold');

                    const targetId = this.dataset.target;
                    accordionContents.forEach(acc => {
                        acc.classList.toggle('d-none', acc.id !== targetId);
                    });

                    // Arama kutusunu sıfırla
                    searchInput.value = '';
                });
            });
        });
    </script>
@endpush
@stack('scripts')
