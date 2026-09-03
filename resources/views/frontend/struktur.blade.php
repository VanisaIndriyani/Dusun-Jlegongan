@extends('layouts.frontend')
@section('title', 'Struktur Kepadukuhan')

@section('content')
<section class="page-hero">
    <div class="wrap-container">
        <div class="crumb">
            <a href="{{ route('home') }}"><i class="bi bi-house"></i> Beranda</a>
            <i class="bi bi-chevron-right"></i>
            <a href="{{ route('home') }}"><i class="bi bi-ui-checks-grid"></i> Profil</a>
            <i class="bi bi-chevron-right"></i>
            <span class="active">Struktur Kepadukuhan</span>
        </div>
        <h1>Struktur Kepadukuhan Jlegongan</h1>
        <p>Susunan organisasi kepadukuhan yang memandu pelayanan dan kegiatan masyarakat Dusun Jlegongan.</p>
    </div>
</section>

<section class="section">
    <div class="wrap-container">
        <div class="row g-5 justify-content-center">
            <div class="col-lg-11">
                @if($struktur)
                <div class="card-x overflow-hidden mb-5 w-100">
                    @if($struktur->image)
                    <div class="card-x-thumb position-relative p-0" style="aspect-ratio: 16/9; height: auto;">
                        <img src="{{ asset('storage/' . ltrim($struktur->image, '/')) }}"
                             alt="{{ $struktur->title }}"
                             class="w-100 h-100 object-fit-cover"
                             style="aspect-ratio: 16/9;"
                             onerror="
                                this.parentElement.innerHTML =
                                    '<div class=\'d-flex flex-column align-items-center justify-content-center h-100 text-white text-center px-4\' style=\'aspect-ratio:16/9;background:linear-gradient(135deg,#a7f3d0 0%,#059669 100%);\'>' +
                                    '<i class=\'bi bi-diagram-2-fill fs-1 mb-3\'></i>' +
                                    '<h3 class=\'fw-bold mb-1\'>{{ addslashes($struktur->title) }}</h3>' +
                                    '<small class=\'opacity-90\'>Struktur organisasi Dusun Jlegongan</small>' +
                                    '</div>';
                                this.remove();
                             ">
                        <div class="position-absolute bottom-0 start-0 w-100 p-4 text-white z-2" style="background: linear-gradient(180deg, rgba(4,120,87,0) 0%, rgba(4,120,87,0.85) 100%);">
                            <h3 class="fw-bold mb-1 text-white">{{ $struktur->title }}</h3>
                            <small class="opacity-90 text-white">Struktur organisasi Dusun Jlegongan</small>
                        </div>
                    </div>
                    @else
                    <div class="card-x-thumb" style="aspect-ratio: 16/9; height: auto; background: linear-gradient(135deg, #a7f3d0 0%, #059669 100%);">
                        <div class="d-flex flex-column align-items-center justify-content-center h-100 text-white text-center px-4" style="aspect-ratio: 16/9;">
                            <i class="bi bi-diagram-2-fill fs-1 mb-3"></i>
                            <h3 class="fw-bold mb-1">{{ $struktur->title }}</h3>
                            <small class="opacity-90">Struktur organisasi Dusun Jlegongan</small>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="content-body" style="font-size: 1.02rem; line-height: 1.95;">
                    @if($struktur->content)
                        @if($struktur->description)
                            <p class="lead fw-semibold" style="color: var(--primary);">{{ $struktur->description }}</p>
                        @endif
                        {!! $struktur->content !!}
                    @elseif($struktur->description)
                        <p style="font-size: 1.05rem;">{{ $struktur->description }}</p>
                    @endif
                </div>
                @else
                <div class="alert alert-info rounded-4 d-flex gap-3 align-items-start">
                    <i class="bi bi-info-circle fs-3 flex-shrink-0"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Informasi belum tersedia</h6>
                        <p class="mb-0 small">Struktur Kepadukuhan Dusun Jlegongan akan segera ditambahkan oleh admin. Silakan kembali lagi nanti.</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
