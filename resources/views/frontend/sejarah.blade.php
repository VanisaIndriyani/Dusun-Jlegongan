@extends('layouts.frontend')
@section('title', 'Sejarah')

@section('content')
<section class="page-hero">
    <div class="wrap-container">
        <div class="crumb">
            <a href="{{ route('home') }}"><i class="bi bi-house"></i> Beranda</a>
            <i class="bi bi-chevron-right"></i>
            <span class="active">Sejarah</span>
        </div>
        <h1>Sejarah Dusun Jlegongan</h1>
        <p>Perjalanan panjang dusun dari masa leluhur hingga menjadi harmonis seperti sekarang.</p>
    </div>
</section>

<section class="section">
    <div class="wrap-container">
        <div class="row g-5 justify-content-center">
            <div class="col-lg-9">
                @if($sejarah)
                <div class="card-x overflow-hidden mb-5">
                    @if($sejarah->image)
                    <div class="card-x-thumb position-relative p-0" style="height: 320px;">
                        <img src="{{ asset('storage/' . ltrim($sejarah->image, '/')) }}"
                             alt="{{ $sejarah->title }}"
                             class="w-100 h-100 object-fit-cover"
                             onerror="this.parentElement.innerHTML=''; this.remove();">
                        <div class="position-absolute bottom-0 start-0 w-100 p-4 text-white z-2" style="background: linear-gradient(180deg, rgba(4,120,87,0) 0%, rgba(4,120,87,0.85) 100%);">
                            <h3 class="fw-bold mb-1 text-white">{{ $sejarah->title }}</h3>
                            <small class="opacity-90 text-white">Sejarah yang patut dikenang</small>
                        </div>
                    </div>
                    @else
                    <div class="card-x-thumb" style="height: 320px; background: linear-gradient(135deg, #a7f3d0 0%, #059669 100%);">
                        <div class="d-flex flex-column align-items-center justify-content-center h-100 text-white text-center px-4">
                            <i class="bi bi-book-half fs-1 mb-3"></i>
                            <h3 class="fw-bold mb-1">{{ $sejarah->title }}</h3>
                            <small class="opacity-90">Sejarah yang patut dikenang</small>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="content-body" style="font-size: 1.02rem; line-height: 1.95;">
                    @if($sejarah->description)
                    <p class="lead fw-semibold" style="color: var(--primary);">{{ $sejarah->description }}</p>
                    @endif
                    {!! $sejarah->content !!}
                </div>
                @else
                <div class="alert alert-info rounded-4 d-flex gap-3 align-items-start">
                    <i class="bi bi-info-circle fs-3 flex-shrink-0"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Informasi belum tersedia</h6>
                        <p class="mb-0 small">Sejarah Dusun Jlegongan akan segera ditambahkan oleh admin. Silakan kembali lagi nanti.</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
