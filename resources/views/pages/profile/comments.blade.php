@extends('pages.profile.index')

@section('profileContent')
    <div class="scroll-wrapper">
        @forelse ($comments as $comment)
            <div class="card mb-3 shadow-sm comment-card">
                <div class="card-body">
                    <h6 class="fw-bold mb-1">
                        {{ $comment->complaint->title ?? 'Şikayet Başlığı Yok' }}
                    </h6>
                    <p class="mb-2">{{ $comment->content }}</p>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <small class="text-muted fw-bold bg-secondary text-white px-3 py-1 rounded mb-2">
                            {{ \Carbon\Carbon::parse($comment->created_at)->translatedFormat('d F Y') }}
                        </small>
                        <a href="{{ route('complaint.show', $comment->complaint->slug ?? '#') }}" class="btn btn-outline-success btn-sm">
                            Şikayeti Gör
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p>Henüz yorum yapılmamış.</p>
        @endforelse
    </div>
@endsection
