@extends('layouts.app')

@section('title', 'Yeni Şifre Belirle')

@section('content')
    <div class="container py-5" style="max-width: 500px;">
        <h3 class="mb-4 text-center fw-bold">🔁 Yeni Şifre Belirle</h3>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="mb-3">
                <label for="password" class="form-label">Yeni Şifre</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required>
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Yeni Şifre (Tekrar)</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-3 fw-semibold">✅ Şifremi Sıfırla</button>
        </form>
    </div>
@endsection
