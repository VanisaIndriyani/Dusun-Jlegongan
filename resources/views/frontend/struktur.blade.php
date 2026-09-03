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

                {{-- ===============================================================
                     FOTO FULL (object-fit: contain — agar bagan struktur tidak terpotong)
                     TANPA OVERLAY JUDUL DI ATAS FOTO!
                     =============================================================== --}}
                <div class="mb-4 w-100 overflow-hidden"
                     style="border-radius: 20px;
                            border: 1px solid rgba(226,232,240,.9);
                            box-shadow: 0 12px 30px -10px rgba(15,23,42,.15), 0 4px 10px -4px rgba(15,23,42,.06);
                            background: linear-gradient(135deg, #ffffff, #f8fffc);">

                    @if($struktur->image)

                    <div style="width: 100%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                background:
                                    linear-gradient(
                                        135deg,
                                        rgba(236,253,245,.92) 0%,
                                        rgba(209,250,229,.8) 100%
                                    );
                                padding: 24px 20px;">

                        <img src="{{ asset('storage/' . ltrim($struktur->image, '/')) }}"
                             alt="{{ $struktur->title }}"
                             loading="lazy"
                             class="d-block"
                             style="width: auto;
                                    max-width: 100%;
                                    height: auto;
                                    max-height: 600px;
                                    object-fit: contain;
                                    border-radius: 12px;
                                    box-shadow: 0 15px 40px -18px rgba(15,23,42,.35);"
                             onerror="
                                this.parentElement.innerHTML =
                                    '<div class=\'d-flex flex-column align-items-center justify-content-center text-white text-center px-4 py-5 w-100\' style=\'min-height:380px;background:linear-gradient(135deg,#a7f3d0 0%,#059669 100%);border-radius:12px;\'>' +
                                    '<i class=\'bi bi-diagram-2-fill\' style=\'font-size:96px;\'></i>' +
                                    '<h3 class=\'fw-bold mb-1 mt-4 fs-1\'>{{ addslashes($struktur->title) }}</h3>' +
                                    '<p class=\'opacity-90 mb-0 fs-5\'>Struktur organisasi Dusun Jlegongan</p>' +
                                    '</div>';
                                this.remove();
                             ">

                    </div>

                    @else

                    <div class="d-flex flex-column align-items-center justify-content-center text-white text-center px-4 py-5"
                         style="min-height:400px; background:linear-gradient(135deg,#a7f3d0 0%,#059669 100%);">

                        <i class="bi bi-diagram-2-fill" style="font-size:100px;"></i>

                        <h1 class="fw-bold mb-2 mt-4" style="font-size: clamp(1.8rem, 4vw, 2.8rem);">
                            {{ $struktur->title }}
                        </h1>

                        <p class="opacity-90 mb-0" style="font-size: 1.05rem;">
                            Struktur organisasi Dusun Jlegongan
                        </p>

                    </div>

                    @endif

                </div>


                {{-- ===============================================================
                     JUDUL BESAR — DI BAWAH FOTO (sesuai request user)
                     =============================================================== --}}
                <div class="mb-5 ps-2">

                    <span class="d-inline-flex align-items-center gap-2 px-3 py-1 mb-3 rounded-pill"
                          style="background: rgba(16,185,129,.12);
                                 color: #047857;
                                 font-size: .76rem;
                                 font-weight: 750;
                                 letter-spacing: .3px;">
                        <i class="bi bi-diagram-3"></i>
                        PROFIL DUSUN
                    </span>

                    <h1 class="fw-bold mb-2"
                        style="font-size: clamp(2rem, 4.6vw, 3.1rem);
                               line-height: 1.12;
                               color: #0f172a;
                               letter-spacing: -.02em;">
                        {{ $struktur->title }}
                    </h1>

                    @if($struktur->description)
                    <p class="lead mb-0"
                       style="color: #0f766e;
                              font-weight: 550;
                              font-size: 1.12rem;
                              line-height: 1.75;">
                        {{ $struktur->description }}
                    </p>
                    @else
                    <p class="mb-0 text-muted" style="font-size: 1.05rem;">
                        Struktur organisasi Dusun Jlegongan
                    </p>
                    @endif

                </div>


                {{-- ===============================================================
                     KONTEN UTAMA (jika pakai field content)
                     =============================================================== --}}
                <div class="content-body"
                     style="font-size: 1.02rem; line-height: 1.95;">

                    @if($struktur->content)
                        {!! $struktur->content !!}
                    @endif

                </div>

                @else

                <div class="alert alert-info rounded-4 d-flex gap-3 align-items-start">

                    <i class="bi bi-info-circle fs-3 flex-shrink-0"></i>

                    <div>
                        <h6 class="fw-bold mb-1">
                            Informasi belum tersedia
                        </h6>

                        <p class="mb-0 small">
                            Struktur Kepadukuhan Dusun Jlegongan akan segera ditambahkan oleh admin.
                            Silakan kembali lagi nanti.
                        </p>
                    </div>

                </div>

                @endif

            </div>
        </div>
    </div>
</section>
@endsection
