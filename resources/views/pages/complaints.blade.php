@extends('layouts.app')
@section('title', 'Şikayetlerim')

@section('content')
    <div class="container-fluid">
        <div class="row">

            {{-- Sidebar --}}
            <div class="col-md-3 bg-dark text-white vh-100 p-4">
                <h4 class="fw-bold text-center mb-4">FİRMA CV</h4>

                <ul class="nav flex-column">
                    <li class="nav-item"><a href="#" class="nav-link text-white">Profilimi Düzenle</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Bildirim Tercihleri</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Hesabımı Sil</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white active fw-bold">Şikayetlerim</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Bildirimlerim</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Desteklediklerim</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Yorumladıklarım</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Kaydedilenler</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Teste Katıl</a></li>
                </ul>

                <a href="#" class="btn btn-primary w-100 mt-4">Şikayet Yaz</a>
                <a href="#" class="btn btn-link text-white mt-2">Çıkış Yap</a>
            </div>

            {{-- Main Content --}}
            <div class="col-md-9 bg-light p-5">
                <h3 class="fw-bold">Şikayetlerim</h3>
                <p class="text-muted">{{ $complaints->count() }} Şikayet</p>

                {{-- Şikayet Kartları --}}
                @foreach($complaints as $complaint)
                    <div class="bg-white rounded p-4 shadow-sm mb-4">
                        <span class="badge bg-light text-primary mb-2">{{ $complaint->user->name }}</span>
                        <h5 class="fw-bold">{{ $complaint->title }}</h5>
                        <small class="text-muted">{{ $complaint->created_at->format('d F Y H:i') }}</small>
                        <p>{{ $complaint->description }}</p>
                    </div>
                @endforeach

                @if($complaints->isEmpty())
                    <p>Henüz şikayetiniz bulunmamaktadır.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
