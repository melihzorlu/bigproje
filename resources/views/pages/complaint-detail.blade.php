@extends('layouts.app')
@section('title', ' Personel Şikayeti Detay')
@section('content')

    <section class="complaint-section">
        <div class="complaint-container">

            <div class="complaint-meta">
                <div class="user-initial">{{ Str::substr($complaint->user->name ?? 'A', 0, 1) }}</div>
                <div>
                    <strong>{{ $complaint->user->name ?? 'Anonim' }}</strong> •
                    {{ $complaint->created_at->translatedFormat('d F H:i') }} •
                    {{ number_format($complaint->view_count ?? 0, 0, ',', '.') }} görüntülenme
                </div>
            </div>

            <div class="complaint-body">
                {{ $complaint->description }}
            </div>
            <div class="complaint-actions">
                <button class="like-button">👍 Destekle</button>
            </div>

            <div class="comment-area">
                <h3>Yorumlar</h3>
                <div class="comment-placeholder">
                    <div class="user-icon"></div>
                    <!-- <span>İlk yorumu sen yap</span> -->
                </div>
            </div>
        </div>
    </section>
@endsection
