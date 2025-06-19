@extends('layouts.app')
@section('title', 'Blog')
@section('content')

    <section class="blog-section py-5">
        <div class="container text-center">
            <div class="icon-group d-flex justify-content-center mb-3 gap-2">
                <span class="triangle-yellow"></span>
                <span class="circle-green"></span>
                <span class="circle-gray"></span>
                <span class="circle-blue"></span>
            </div>

            <h2 class="fw-bold display-5">Blog</h2>
            <p class="text-muted mb-5">Her Kararın Arkasında FirmaCv var...</p>

            <div class="text-start">
                <h3 class="fw-semibold fs-3 mb-4">Kategoriler</h3>
                <div class="d-flex flex-wrap">
                    <button class="category-btn">Gündem</button>
                    <button class="category-btn">Araştırmalar</button>
                    <button class="category-btn">FirmaCv Ödülleri</button>
                    <button class="category-btn">Basında Biz</button>
                    <button class="category-btn">Genel</button>
                </div>
            </div>
        </div>
    </section>

    <section class="articles-section py-5">
        <div class="container">
            <h2 class="fw-bold mb-4">Blog</h2>

            <div class="row g-4">
                <!-- Kart 1 -->
                @foreach ($blogs as $blog)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ route('blog.show', $blog->slug) }}" class="text-decoration-none text-dark">
                            <div class="card h-100 border-0">
                                <img src="{{ asset($blog->image_path) }}" alt="Blog Resmi">
                                <div class="card-body px-0">
                                    <small class="text-muted">{{ $blog->created_at->format('d M Y H:i') }}</small>
                                    <h5 class="card-title fw-semibold mt-2">{{ $blog->title }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit(strip_tags($blog->content), 100) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

@endsection
