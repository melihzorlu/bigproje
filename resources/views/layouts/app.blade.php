<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">

</head>
<body>

@include('partials.header')  <!-- Header dahil edildi -->
@stack('scripts')

<div class="">
    @yield('content')  <!-- Sayfalara özel içerik buraya gelecek -->
</div>

@include('partials.footer')  <!-- Footer dahil edildi -->
@include('pages.experience-modal')
<!-- Cookie Consent Banner -->
<div id="cookie-consent-banner" class="fixed bottom-0 left-0 w-full bg-gray-900 text-white text-sm px-4 py-3 flex justify-between items-center z-50">
    <span>Bu site çerezleri kullanmaktadır. Detaylar için
        <a href="/cerez-aydinlatma">çerez politikamızı</a> inceleyebilirsiniz.
    </span>
    <button id="accept-cookies" class="ml-4">Kabul Et</button>
</div>

</body>
</html>
