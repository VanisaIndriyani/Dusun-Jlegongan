@extends('layouts.frontend')
@section('title', 'Galeri Foto')

@section('content')
<section class="page-hero">
    <div class="wrap-container">
        <div class="crumb">
            <a href="{{ route('home') }}"><i class="bi bi-house"></i> Beranda</a>
            <i class="bi bi-chevron-right"></i>
            <span class="active">Galeri</span>
        </div>
        <h1>Galeri Foto Dusun</h1>
        <p>Dokumentasi momen berharga kegiatan warga &amp; pesona alam Dusun Jlegongan.</p>
    </div>
</section>

<section class="section">
    <div class="wrap-container">

        @if($galeri->isNotEmpty())
        <div class="gal-grid mb-5">
            @foreach($galeri as $idx => $item)
                @php
                    $size = ($idx % 4 === 0) ? 'portrait_4_3' : (($idx % 3 === 0) ? 'landscape_4_3' : 'square_hd');
                    $prompt = urlencode(($item->title ?? 'Dusun Jlegongan') . ' ' . ($item->category ?? 'indonesia village natural photography'));
                    $imgUrl = "https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt={$prompt}&image_size={$size}";
                    if ($item->image && Storage::disk('public')->exists($item->image)) {
                        $imgUrl = asset('storage/' . ltrim($item->image, '/'));
                    }
                    $lbUrl = $imgUrl;
                @endphp
            <div class="g-item" onclick="openLB('{{ $lbUrl }}', '{{ addslashes($item->title ?? 'Galeri') }}')">
                <img src="{{ $imgUrl }}"
                     alt="{{ $item->title }}"
                     loading="lazy"
                     onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 400%22><rect fill=%22%23d1fae5%22 width=%22400%22 height=%22400%22/><text x=%2250%25%22 y=%2250%25%22 font-family=%22Arial%22 fill=%22%23059669%22 text-anchor=%22middle%22 dy=%22.3em%22 font-size=%2222%22>' . htmlspecialchars($item->title ?? 'Galeri') . '</text></svg>'">
                <div class="capt">
                    <span class="capt-tag"><i class="bi bi-camera-fill"></i> {{ $item->category ?? 'Dokumentasi' }}</span>
                    <b class="capt-name">{{ $item->title }}</b>
                    @if($item->description)
                    <small class="capt-desc d-block mt-1 opacity-90">{{ Str::limit($item->description, 80) }}</small>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        {{-- pagination --}}
        @if(method_exists($galeri, 'hasPages') && $galeri->hasPages())
        <div class="d-flex justify-content-center">
            {{ $galeri->links() }}
        </div>
        <style>
            .pagination { gap: 6px !important; }
            .page-item .page-link {
                border: 1px solid #a7f3d0 !important;
                color: #065f46 !important;
                border-radius: 10px !important;
                padding: 8px 14px;
                font-weight: 600;
            }
            .page-item.active .page-link {
                background: linear-gradient(135deg,#059669,#10b981) !important;
                border-color: #059669 !important;
                color: #fff !important;
                box-shadow: 0 8px 16px rgba(5,150,105,0.25);
            }
            .page-item.disabled .page-link { opacity: 0.5; }
        </style>
        @endif

        @else
        <div class="alert alert-info rounded-4 d-flex gap-3 align-items-start">
            <i class="bi bi-info-circle fs-3 flex-shrink-0"></i>
            <div>
                <h6 class="fw-bold mb-1">Belum ada foto galeri</h6>
                <p class="mb-0 small">Dokumentasi foto kegiatan &amp; pesona dusun akan segera ditambahkan oleh admin. Silakan kembali lagi nanti.</p>
            </div>
        </div>
        @endif

    </div>
</section>
@endsection
