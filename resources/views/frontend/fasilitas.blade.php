@extends('layouts.frontend')
@section('title', 'Fasilitas Dusun')

@section('content')
<section class="page-hero">
    <div class="wrap-container">
        <div class="crumb">
            <a href="{{ route('home') }}"><i class="bi bi-house"></i> Beranda</a>
            <i class="bi bi-chevron-right"></i>
            <span class="active">Fasilitas</span>
        </div>
        <h1>Fasilitas Dusun</h1>
        <p>Sarana &amp; prasarana umum yang tersedia untuk menunjang aktivitas warga.</p>
    </div>
</section>

<section class="section">
    <div class="wrap-container">
        <div class="row g-5">
            @foreach($fasilitas as $item)
            <div class="col-lg-4 col-md-6">
                <div class="fac-card h-100">
                    <div class="fac-photo">
                        @php
                            $iconFas = 'bi-building-fill';
                            $nameLow = strtolower($item->name);
                            if (str_contains($nameLow, 'tpa')) $iconFas = 'bi-book-half';
                            elseif (str_contains($nameLow, 'perpustakaan')) $iconFas = 'bi-journal-bookmark-fill';
                            elseif (str_contains($nameLow, 'rumah')) $iconFas = 'bi-house-heart-fill';
                        @endphp
                        @if($item->image && Storage::disk('public')->exists($item->image))
                            <img src="{{ asset('storage/' . ltrim($item->image, '/')) }}" alt="{{ $item->name }}">
                        @else
                            <img src="https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt={{ urlencode(($item->name ?? 'Fasilitas umum').' indonesian village building ') }}&image_size=landscape_16_9"
                                 alt="{{ $item->name }}"
                                 onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'d-flex align-items-center justify-content-center h-100\' style=\'background:linear-gradient(135deg,#d1fae5,#a7f3d0);\'><i class=\'bi {{ $iconFas }}\' style=\'font-size:84px;color:#065f46;\'></i></div>'">
                            <span class="overlay-ic"><i class="bi {{ $iconFas }}"></i></span>
                        @endif
                        @if($item->schedule && (str_contains($nameLow, 'tpa') || str_contains($nameLow, 'baitul')))
                        <span class="time-chip time-amber position-absolute" style="left:18px;bottom:18px;">
                            <i class="bi bi-clock-fill"></i> Senin – Jumat | 15.00 – 17.00
                        </span>
                        @elseif($item->schedule)
                        <span class="time-chip position-absolute" style="left:18px;bottom:18px;">
                            <i class="bi bi-clock-fill"></i> {{ $item->schedule }}
                        </span>
                        @endif
                    </div>
                    <div class="fac-body">
                        <h5 class="fac-name">{{ $item->name }}</h5>
                        <p class="fac-desc" style="line-height:1.8;">{{ $item->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach

            @if($fasilitas->isEmpty())
            <div class="col-12">
                <div class="alert alert-info rounded-4 d-flex gap-3 align-items-start">
                    <i class="bi bi-info-circle fs-3 flex-shrink-0"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Belum ada data fasilitas</h6>
                        <p class="mb-0 small">Data fasilitas dusun akan segera ditambahkan oleh admin. Silakan kembali lagi nanti.</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
