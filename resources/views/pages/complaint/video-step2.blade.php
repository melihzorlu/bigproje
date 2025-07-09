@extends('layouts.app')
@section('title', 'Açıklama Ekle')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-center">Şikayet Açıklaması</h2>

        <form method="POST" action="{{ route('complaints.video.step2.store', $complaint->id) }}">
            @csrf
            <div class="form-group mb-3">
                <textarea name="description" class="form-control" rows="8" placeholder="Yaşadığınız sorunu detaylıca anlatınız..." required>{{ old('description', $complaint->description) }}</textarea>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">Devam Et →</button>
            </div>
        </form>
    </div>
@endsection
