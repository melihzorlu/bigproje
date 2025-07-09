@extends('layouts.app')
@section('title', 'Firma Seç')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-center">Hangi firmayla sorun yaşadınız?</h2>

        <form method="POST" action="{{ route('complaints.video.complete', $complaint->id) }}">
            @csrf
            <div class="form-group mb-3">
                <select name="company_id" class="form-select" required>
                    <option value="">Firma seçiniz</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ $complaint->company_id == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">Tamamla</button>
            </div>
        </form>
    </div>
@endsection
