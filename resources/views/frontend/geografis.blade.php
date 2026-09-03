
@extends('layouts.frontend')
@section('title', 'Peta Geografis')

@section('content')

<style>
    .geo-page {
        background: #f8fafc;
    }

    /* HERO */
    .page-hero {
        position: relative;
        overflow: hidden;
        padding: 85px 0 75px;
        background:
            linear-gradient(135deg, rgba(6, 95, 70, .97), rgba(5, 150, 105, .90)),
            url('{{ asset('images/pattern.png') }}');
        color: #fff;
    }

    .page-hero::before {
        content: "";
        position: absolute;
        width: 420px;
        height: 420px;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
        top: -220px;
        right: -100px;
    }

    .page-hero::after {
        content: "";
        position: absolute;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: rgba(255,255,255,.05);
        bottom: -180px;
        left: -80px;
    }

    .page-hero .wrap-container {
        position: relative;
        z-index: 2;
    }

    .crumb {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: .9rem;
        margin-bottom: 22px;
        color: rgba(255,255,255,.75);
    }

    .crumb a {
        color: #fff;
        text-decoration: none;
        transition: .2s;
    }

    .crumb a:hover {
        opacity: .8;
    }

    .crumb .active {
        color: #d1fae5;
        font-weight: 600;
    }

    .page-hero h1 {
        font-size: clamp(2rem, 4vw, 3.3rem);
        font-weight: 800;
        letter-spacing: -.8px;
        margin-bottom: 12px;
    }

    .page-hero p {
        max-width: 650px;
        margin: 0;
        color: rgba(255,255,255,.82);
        font-size: 1.05rem;
        line-height: 1.7;
    }

    /* SECTION */
    .geo-section {
        padding: 75px 0;
    }

    /* MAP CARD */
    .map-card {
        position: relative;
        background: #fff;
        padding: 10px;
        border-radius: 26px;
        box-shadow: 0 20px 55px rgba(15, 23, 42, .10);
        border: 1px solid rgba(15, 23, 42, .05);
    }

    .map-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        aspect-ratio: 16 / 9;
        background: #d1fae5;
        cursor: zoom-in;
    }

    .map-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .6s ease;
    }

    .map-wrapper:hover img {
        transform: scale(1.025);
    }

    .map-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 24px;
        background: linear-gradient(
            to bottom,
            rgba(0,0,0,.35),
            transparent 35%,
            transparent 55%,
            rgba(0,0,0,.5)
        );
        pointer-events: none;
    }

    .map-label {
        align-self: flex-start;
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 10px 16px;
        border-radius: 50px;
        background: rgba(255,255,255,.94);
        color: #047857;
        font-size: .88rem;
        font-weight: 700;
        box-shadow: 0 8px 20px rgba(0,0,0,.12);
    }

    .map-bottom {
        display: flex;
        justify-content: space-between;
        align-items: end;
        gap: 20px;
    }

    .map-info h3 {
        color: #fff;
        font-size: 1.45rem;
        font-weight: 800;
        margin: 0 0 4px;
        text-shadow: 0 2px 8px rgba(0,0,0,.3);
    }

    .map-info p {
        color: rgba(255,255,255,.9);
        margin: 0;
        font-size: .9rem;
    }

    .zoom-btn {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: rgba(255,255,255,.95);
        color: #047857;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
        box-shadow: 0 8px 20px rgba(0,0,0,.18);
    }

    /* CONTENT */
    .content-body {
        margin-top: 55px;
        color: #475569;
    }

    .section-kicker {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 13px;
        border-radius: 50px;
        background: #ecfdf5;
        color: #047857;
        font-size: .78rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .6px;
        margin-bottom: 15px;
    }

    .content-body h2 {
        color: #0f172a;
        font-size: clamp(1.7rem, 3vw, 2.25rem);
        font-weight: 800;
        letter-spacing: -.5px;
    }

    .geo-description {
        color: #047857;
        font-size: 1.08rem;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    .content-body p {
        line-height: 1.9;
    }

    .content-body img {
        border-radius: 20px;
    }

    /* STATS */
    .stats-wrap {
        margin-top: 55px;
        background: #fff;
        border-radius: 24px;
        padding: 12px;
        box-shadow: 0 18px 45px rgba(15,23,42,.08);
        border: 1px solid rgba(15,23,42,.05);
    }

    .stat-single {
        position: relative;
        height: 100%;
        padding: 27px 22px;
        border-radius: 18px;
        background: #f8fafc;
        text-align: center;
        transition: .3s ease;
    }

    .stat-single:hover {
        transform: translateY(-5px);
        background: #f0fdf4;
    }

    .stat-ic {
        width: 58px;
        height: 58px;
        margin: 0 auto 17px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.35rem;
    }

    .stat-num {
        color: #0f172a;
        font-size: 1.55rem;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .stat-lbl {
        color: #64748b;
        font-size: .88rem;
        font-weight: 600;
    }

    /* MODAL */
    .map-modal .modal-content {
        background: #fff;
        border: none;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 25px 80px rgba(0,0,0,.25);
    }

    .map-modal .modal-header {
        padding: 18px 22px;
    }

    .map-modal .modal-title {
        color: #0f172a;
        font-size: 1rem;
    }

    .map-modal .modal-body img {
        width: 100%;
        max-height: 78vh;
        object-fit: contain;
        display: block;
        background: #f8fafc;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .page-hero {
            padding: 55px 0 50px;
        }

        .page-hero h1 {
            font-size: 2rem;
        }

        .page-hero p {
            font-size: .95rem;
        }

        .geo-section {
            padding: 45px 0;
        }

        .map-card {
            padding: 7px;
            border-radius: 19px;
        }

        .map-wrapper {
            border-radius: 15px;
            aspect-ratio: 4 / 3;
        }

        .map-overlay {
            padding: 15px;
        }

        .map-label {
            padding: 8px 12px;
            font-size: .76rem;
        }

        .map-info h3 {
            font-size: 1.05rem;
        }

        .map-info p {
            font-size: .75rem;
        }

        .zoom-btn {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }

        .content-body {
            margin-top: 40px;
        }

        .stats-wrap {
            margin-top: 40px;
            padding: 7px;
        }

        .stat-single {
            padding: 22px 15px;
        }
    }
</style>

<div class="geo-page">

    {{-- HERO --}}
    <section class="page-hero">
        <div class="wrap-container">

            <div class="crumb">
                <a href="{{ route('home') }}">
                    <i class="bi bi-house-fill me-1"></i>
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span class="active">Geografis</span>
            </div>

            <h1>Peta &amp; Geografis Dusun</h1>

            <p>
                Informasi mengenai letak wilayah, kondisi geografis,
                ketinggian, serta karakteristik wilayah Dusun Jlegongan.
            </p>

        </div>
    </section>


    {{-- MAIN --}}
    <section class="geo-section">
        <div class="wrap-container">

            <div class="row justify-content-center">
                <div class="col-lg-10">

                    {{-- MAP --}}
                    <div class="map-card">

                        <div class="map-wrapper"
                             data-bs-toggle="modal"
                             data-bs-target="#mapModal">

                            @if($geografis && $geografis->image)

                                <img
                                    src="{{ asset('storage/' . ltrim($geografis->image, '/')) }}"
                                    alt="{{ $geografis->title }}"
                                    onerror="this.style.opacity='.25';"
                                >

                            @else

                                <div style="
                                    width:100%;
                                    height:100%;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    background:linear-gradient(135deg,#d1fae5,#ecfdf5);
                                    color:#047857;
                                    font-weight:700;
                                ">
                                    <div class="text-center">
                                        <i class="bi bi-map"
                                           style="font-size:4rem;opacity:.5;"></i>

                                        <div class="mt-2">
                                            Peta Dusun Jlegongan
                                        </div>
                                    </div>
                                </div>

                            @endif


                            <div class="map-overlay">

                                <div class="map-label">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    Peta Wilayah Dusun
                                </div>

                                <div class="map-bottom">

                                    <div class="map-info">
                                        <h3>Dusun Jlegongan</h3>
                                        <p>
                                            Klik peta untuk melihat lebih besar
                                        </p>
                                    </div>

                                    <div class="zoom-btn">
                                        <i class="bi bi-arrows-fullscreen"></i>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- CONTENT --}}
                    @if($geografis)

                        <div class="content-body">

                            <div class="section-kicker">
                                <i class="bi bi-info-circle-fill"></i>
                                Informasi Wilayah
                            </div>

                            <h2>
                                {{ $geografis->title }}
                            </h2>

                            @if($geografis->content)
                                @if($geografis->description)
                                    <p class="geo-description fw-semibold">
                                        {{ $geografis->description }}
                                    </p>
                                @endif
                                <div>
                                    {!! $geografis->content !!}
                                </div>
                            @elseif($geografis->description)
                                <div>
                                    <p class="geo-description">{{ $geografis->description }}</p>
                                </div>
                            @endif

                        </div>

                    @endif


                    {{-- STATISTIK --}}
                    <div class="stats-wrap">

                        <div class="row g-3">

                            <div class="col-md-4">

                                <div class="stat-single">

                                    <div class="stat-ic"
                                         style="background:#ecfdf5;color:#059669;">
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </div>

                                    <div class="stat-num">
                                        150 mdpl
                                    </div>

                                    <div class="stat-lbl">
                                        Ketinggian Wilayah
                                    </div>

                                </div>

                            </div>


                            <div class="col-md-4">

                                <div class="stat-single">

                                    <div class="stat-ic"
                                         style="background:#fffbeb;color:#d97706;">
                                        <i class="bi bi-thermometer-sun"></i>
                                    </div>

                                    <div class="stat-num">
                                        22°–30°C
                                    </div>

                                    <div class="stat-lbl">
                                        Suhu Rata-rata
                                    </div>

                                </div>

                            </div>


                            <div class="col-md-4">

                                <div class="stat-single">

                                    <div class="stat-ic"
                                         style="background:#ede9fe;color:#7c3aed;">
                                        <i class="bi bi-signpost-split-fill"></i>
                                    </div>

                                    <div class="stat-num">
                                        12 km
                                    </div>

                                    <div class="stat-lbl">
                                        Ke Pusat Kab. Sleman
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>

</div>


{{-- MODAL MAP --}}
<div class="modal fade map-modal"
     id="mapModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header border-0">

                <h5 class="modal-title fw-bold">
                    <i class="bi bi-map me-2 text-success"></i>
                    Peta Dusun Jlegongan
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body p-0">

                @if($geografis && $geografis->image)

                    <img
                        src="{{ asset('storage/' . ltrim($geografis->image, '/')) }}"
                        alt="{{ $geografis->title }}"
                        onerror="this.style.display='none'"
                    >

                @else

                    <div class="d-flex align-items-center justify-content-center"
                         style="height:500px;background:#ecfdf5;color:#047857;">

                        <div class="text-center">

                            <i class="bi bi-map"
                               style="font-size:4rem;"></i>

                            <h5 class="mt-3 fw-bold">
                                Peta Dusun Jlegongan
                            </h5>

                            <p class="text-muted mb-0">
                                Peta belum tersedia.
                            </p>

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection
```
