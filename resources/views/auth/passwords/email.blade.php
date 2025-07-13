@extends('layouts.app')

@section('title', 'Şifremi Unuttum')

@section('content')
    <div class="container py-5" style="max-width: 500px;">
        <h3 class="mb-4 text-center fw-bold">🔐 Şifremi Unuttum</h3>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">E-Posta Adresiniz</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-success w-100 py-3 fw-semibold">📩 Sıfırlama Bağlantısı Gönder</button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-decoration-none text-muted">← Giriş ekranına dön</a>
        </div>
    </div>
@endsection
