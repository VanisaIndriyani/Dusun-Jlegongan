```blade
@extends('layouts.frontend')
@section('title', 'Potensi Dusun')

@section('content')

<style>
    /* =====================================================
       POTENSI PAGE
    ===================================================== */

    .potensi-page {
        background: #f8fafc;
    }

    /* =====================================================
       HERO
    ===================================================== */

    .potensi-hero {
        position: relative;
        overflow: hidden;
        padding: 70px 0 65px;
        background: linear-gradient(
            135deg,
            #064e3b 0%,
            #047857 55%,
            #059669 100%
        );
        color: #fff;
    }

    .potensi-hero::before {
        content: "";
        position: absolute;
        width: 430px;
        height: 430px;
        border-radius: 50%;
        background: rgba(255,255,255,.045);
        top: -240px;
        right: -100px;
    }

    .potensi-hero::after {
        content: "";
        position: absolute;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: rgba(255,255,255,.035);
        bottom: -190px;
        left: -100px;
    }

    .potensi-hero .wrap-container {
        position: relative;
        z-index: 2;
    }

    .potensi-crumb {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        color: rgba(255,255,255,.7);
        font-size: .88rem;
    }

    .potensi-crumb a {
        color: #fff;
        text-decoration: none;
        transition: .2s;
    }

    .potensi-crumb a:hover {
        opacity: .75;
    }

    .potensi-crumb .active {
        color: #d1fae5;
        font-weight: 600;
    }

    .potensi-hero h1 {
        margin: 0 0 12px;
        font-size: clamp(2rem, 4vw, 3rem);
        line-height: 1.15;
        font-weight: 800;
        letter-spacing: -.8px;
    }

    .potensi-hero p {
        max-width: 680px;
        margin: 0;
        color: rgba(255,255,255,.82);
        font-size: 1rem;
        line-height: 1.8;
    }


    /* =====================================================
       CONTENT
    ===================================================== */

    .potensi-content {
        padding: 65px 0 80px;
    }

    .potensi-group {
        margin-bottom: 65px;
    }

    .potensi-group:last-child {
        margin-bottom: 0;
    }


    /* =====================================================
       CATEGORY HEADER
    ===================================================== */

    .potensi-head {
        position: relative;
        margin-bottom: 28px;
        padding-left: 18px;
    }

    .potensi-head::before {
        content: "";
        position: absolute;
        left: 0;
        top: 4px;
        bottom: 5px;
        width: 4px;
        border-radius: 10px;
        background: #059669;
    }

    .potensi-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 10px;
        padding: 7px 12px;
        border-radius: 50px;
        background: #ecfdf5;
        color: #047857;
        font-size: .72rem;
        font-weight: 800;
    }

    .potensi-title-section {
        margin: 0 0 7px;
        color: #0f172a;
        font-size: clamp(1.5rem, 2.5vw, 2rem);
        line-height: 1.25;
        font-weight: 800;
        letter-spacing: -.4px;
    }

    .potensi-subtitle {
        max-width: 700px;
        margin: 0;
        color: #64748b;
        font-size: .92rem;
        line-height: 1.7;
    }


    /* =====================================================
       NORMAL CARD
    ===================================================== */

    .potensi-card {
        height: 100%;
        overflow: hidden;
        padding: 0 0 22px;
        background: #fff;
        border: 1px solid #e7edef;
        border-radius: 21px;
        box-shadow: 0 8px 25px rgba(15,23,42,.055);
        transition:
            transform .3s ease,
            box-shadow .3s ease,
            border-color .3s ease;
    }

    .potensi-card:hover {
        transform: translateY(-6px);
        border-color: #c7eadb;
        box-shadow: 0 18px 42px rgba(15,23,42,.10);
    }


    /* =====================================================
       CARD IMAGE
    ===================================================== */

    .potensi-image {
        position: relative;
        width: 100%;
        height: 205px;
        overflow: hidden;
        margin-bottom: 19px;
        background: #ecfdf5;
    }

    .potensi-image img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .potensi-card:hover .potensi-image img {
        transform: scale(1.055);
    }

    .potensi-image::after {
        content: "";
        position: absolute;
        inset: auto 0 0;
        height: 65px;
        background: linear-gradient(
            to top,
            rgba(0,0,0,.24),
            transparent
        );
        pointer-events: none;
    }


    /* =====================================================
       CARD ICON
    ===================================================== */

    .potensi-icon {
        width: 52px;
        height: 52px;
        margin: 0 20px 13px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 15px;

        font-size: 1.25rem;
    }


    /* =====================================================
       CARD BODY
    ===================================================== */

    .potensi-body {
        padding: 0 20px;
    }

    .potensi-chip {
        display: inline-flex;
        align-items: center;
        gap: 5px;

        padding: 5px 10px;
        margin-bottom: 9px;

        border-radius: 50px;

        background: #ecfdf5;
        color: #047857;

        font-size: .67rem;
        font-weight: 750;
    }

    .potensi-card-title {
        margin: 0 0 8px;
        color: #0f172a;
        font-size: 1.03rem;
        line-height: 1.4;
        font-weight: 750;
    }

    .potensi-card-desc {
        margin: 0 0 12px;
        color: #64748b;
        font-size: .83rem;
        line-height: 1.7;
    }

    .potensi-card-content {
        color: #64748b;
        font-size: .82rem;
        line-height: 1.75;
    }


    /* =====================================================
       FEATURED / SOSIAL
    ===================================================== */

    .potensi-featured {
        position: relative;
        overflow: hidden;
        padding: 30px;
        border-radius: 24px;
        background:
            linear-gradient(
                135deg,
                #064e3b 0%,
                #047857 58%,
                #059669 100%
            );
        color: #fff;
        box-shadow: 0 18px 45px rgba(4,120,87,.16);
    }

    .potensi-featured::before {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: rgba(255,255,255,.045);
        right: -100px;
        top: -130px;
    }

    .potensi-featured::after {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255,255,255,.035);
        left: -80px;
        bottom: -100px;
    }

    .potensi-featured-inner {
        position: relative;
        z-index: 2;
    }

    .featured-image {
        width: 100%;
        height: 250px;
        overflow: hidden;
        margin-bottom: 23px;
        border-radius: 18px;
        background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.12);
    }

    .featured-image img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
    }

    .featured-icon {
        width: 52px;
        height: 52px;
        margin-bottom: 14px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 15px;
        background: rgba(255,255,255,.12);
        color: #fff;
        font-size: 1.3rem;
        border: 1px solid rgba(255,255,255,.12);
    }

    .featured-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 12px;
        padding: 7px 12px;
        border-radius: 50px;
        background: rgba(255,255,255,.13);
        color: #fff;
        font-size: .7rem;
        font-weight: 750;
        border: 1px solid rgba(255,255,255,.13);
    }

    .featured-title {
        margin: 0 0 10px;
        color: #fff;
        font-size: 1.65rem;
        line-height: 1.3;
        font-weight: 800;
    }

    .featured-desc {
        margin: 0 0 16px;
        color: rgba(255,255,255,.82);
        font-size: .95rem;
        line-height: 1.75;
    }

    .featured-content {
        color: rgba(255,255,255,.76);
        font-size: .86rem;
        line-height: 1.8;
    }


    /* =====================================================
       SOURCE
    ===================================================== */

    .potensi-source {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-top: 20px;
        padding: 13px 15px;
        border-radius: 14px;
        background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.10);
        color: rgba(255,255,255,.75);
        font-size: .78rem;
        line-height: 1.6;
    }

    .potensi-source i {
        margin-top: 2px;
    }

    .potensi-source b {
        color: #fff;
    }

    .potensi-source a {
        color: #d1fae5;
        text-decoration: none;
    }

    .potensi-source a:hover {
        text-decoration: underline;
    }


    /* =====================================================
       FEATURED SIDE INFO
    ===================================================== */

    .featured-side {
        height: 100%;
        min-height: 300px;
        padding: 25px;

        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        flex-direction: column;
        gap: 15px;

        border-radius: 19px;

        background: rgba(255,255,255,.07);
        border: 1px solid rgba(255,255,255,.13);
    }

    .featured-side-icon {
        width: 82px;
        height: 82px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 23px;

        background: rgba(255,255,255,.10);
        color: #fff;

        font-size: 2.5rem;
    }

    .featured-side-title {
        margin: 0;
        color: #fff;
        font-size: 1.1rem;
        font-weight: 800;
    }

    .featured-side-text {
        margin: 0;
        color: rgba(255,255,255,.65);
        font-size: .78rem;
    }


    /* =====================================================
       EMPTY
    ===================================================== */

    .potensi-empty {
        padding: 55px 25px;
        text-align: center;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 22px;
        box-shadow: 0 10px 30px rgba(15,23,42,.05);
    }

    .potensi-empty-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 18px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 20px;
        background: #ecfdf5;
        color: #059669;
        font-size: 1.8rem;
    }

    .potensi-empty h5 {
        margin-bottom: 7px;
        color: #0f172a;
        font-weight: 750;
    }

    .potensi-empty p {
        max-width: 450px;
        margin: auto;
        color: #64748b;
        font-size: .88rem;
        line-height: 1.7;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 991px) {

        .featured-side {
            min-height: 250px;
        }

        .potensi-image {
            height: 200px;
        }

    }

    @media (max-width: 768px) {

        .potensi-hero {
            padding: 48px 0 45px;
        }

        .potensi-hero h1 {
            font-size: 2rem;
        }

        .potensi-hero p {
            font-size: .9rem;
        }

        .potensi-content {
            padding: 45px 0 60px;
        }

        .potensi-group {
            margin-bottom: 48px;
        }

        .potensi-head {
            padding-left: 14px;
            margin-bottom: 22px;
        }

        .potensi-title-section {
            font-size: 1.45rem;
        }

        .potensi-subtitle {
            font-size: .85rem;
        }

        .potensi-featured {
            padding: 20px;
            border-radius: 20px;
        }

        .featured-image {
            height: 220px;
        }

        .featured-side {
            min-height: 230px;
        }

    }

    @media (max-width: 575px) {

        .potensi-image {
            height: 205px;
        }

        .potensi-body {
            padding: 0 17px;
        }

        .potensi-icon {
            margin-left: 17px;
        }

        .potensi-card-title {
            font-size: .97rem;
        }

        .potensi-card-desc {
            font-size: .8rem;
        }

        .featured-title {
            font-size: 1.35rem;
        }

        .featured-image {
            height: 205px;
        }

    }
</style>


<div class="potensi-page">

    {{-- =====================================================
         HERO
    ====================================================== --}}
    <section class="potensi-hero">

        <div class="wrap-container">

            <div class="potensi-crumb">

                <a href="{{ route('home') }}">
                    <i class="bi bi-house-fill me-1"></i>
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span class="active">
                    Potensi
                </span>

            </div>

            <h1>
                Potensi Dusun Jlegongan
            </h1>

            <p>
                Segala potensi unggulan, mulai dari nilai sosial
                budaya hingga alam dan ekonomi warga yang menjadi
                kekuatan Dusun Jlegongan.
            </p>

        </div>

    </section>


    {{-- =====================================================
         CONTENT
    ====================================================== --}}
    <section class="potensi-content">

        <div class="wrap-container">


            {{-- =================================================
                 SOSIAL
            ================================================== --}}

            @if($sosial->isNotEmpty())

                <div class="potensi-group">

                    <div class="potensi-head">

                        <span class="potensi-badge">
                            <i class="bi bi-heart-pulse-fill"></i>
                            Sosial Kemasyarakatan
                        </span>

                        <h2 class="potensi-title-section">
                            Potensi Sosial &amp; Budaya
                        </h2>

                        <p class="potensi-subtitle">
                            Kekuatan toleransi dan kerukunan warga
                            yang menjadi salah satu potensi utama dusun.
                        </p>

                    </div>


                    @foreach($sosial as $item)

                        <div class="potensi-featured">

                            <div class="potensi-featured-inner">

                                <div class="row g-4 align-items-center">

                                    {{-- CONTENT --}}
                                    <div class="col-lg-8">

                                        @if(
                                            $item->image &&
                                            Storage::disk('public')->exists($item->image)
                                        )

                                            <div class="featured-image">

                                                <img
                                                    src="{{ asset('storage/' . ltrim($item->image, '/')) }}"
                                                    alt="{{ $item->title }}"
                                                    loading="lazy"
                                                >

                                            </div>

                                        @endif


                                        <div class="featured-icon">
                                            <i class="bi bi-people-fill"></i>
                                        </div>


                                        <span class="featured-chip">

                                            <i class="bi bi-star-fill"></i>

                                            Unggulan &amp; Teladan Nasional

                                        </span>


                                        <h3 class="featured-title">
                                            {{ $item->title }}
                                        </h3>


                                        <p class="featured-desc">
                                            {{ $item->description }}
                                        </p>


                                        <div class="featured-content">
                                            {!! $item->content !!}
                                        </div>


                                        @if($item->source)

                                            <div class="potensi-source">

                                                <i class="bi bi-newspaper"></i>

                                                <div>

                                                    <b>
                                                        Sumber Referensi:
                                                    </b>

                                                    @if($item->source_url)

                                                        <a
                                                            href="{{ $item->source_url }}"
                                                            target="_blank"
                                                            rel="noopener"
                                                        >
                                                            {{ $item->source }}

                                                            <i class="bi bi-arrow-up-right ms-1"></i>
                                                        </a>

                                                    @else

                                                        <strong>
                                                            {{ $item->source }}
                                                        </strong>

                                                    @endif

                                                </div>

                                            </div>

                                        @endif

                                    </div>


                                    {{-- SIDE INFO --}}
                                    <div class="col-lg-4">

                                        <div class="featured-side">

                                            <div class="featured-side-icon">

                                                <i class="bi bi-shield-check"></i>

                                            </div>

                                            <h4 class="featured-side-title">
                                                Kerukunan Lintas Agama
                                            </h4>

                                            <p class="featured-side-text">
                                                Kekuatan utama masyarakat
                                                Dusun Jlegongan
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @endif


            {{-- =================================================
                 PERTANIAN
            ================================================== --}}

            @if($pertanian->isNotEmpty())

                <div class="potensi-group">

                    <div class="potensi-head">

                        <span class="potensi-badge">

                            <i class="bi bi-flower1"></i>

                            Pertanian

                        </span>

                        <h2 class="potensi-title-section">
                            Potensi Bidang Pertanian
                        </h2>

                        <p class="potensi-subtitle">
                            Lahan subur dengan berbagai komoditas
                            andalan warga dusun.
                        </p>

                    </div>


                    <div class="row g-4">

                        @foreach($pertanian as $item)

                            <div class="col-12 col-md-6">

                                <div class="potensi-card">

                                    @if(
                                        $item->image &&
                                        Storage::disk('public')->exists($item->image)
                                    )

                                        <div class="potensi-image">

                                            <img
                                                src="{{ asset('storage/' . ltrim($item->image, '/')) }}"
                                                alt="{{ $item->title }}"
                                                loading="lazy"
                                            >

                                        </div>

                                    @endif


                                    <div
                                        class="potensi-icon"
                                        style="
                                            background:#ecfdf5;
                                            color:#059669;
                                        "
                                    >
                                        <i class="bi bi-basket2-fill"></i>
                                    </div>


                                    <div class="potensi-body">

                                        <span class="potensi-chip">

                                            <i class="bi bi-flower1"></i>

                                            Pertanian

                                        </span>

                                        <h4 class="potensi-card-title">
                                            {{ $item->title }}
                                        </h4>

                                        <p class="potensi-card-desc">
                                            {{ $item->description }}
                                        </p>

                                        <div class="potensi-card-content">
                                            {!! $item->content !!}
                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif


            {{-- =================================================
                 PETERNAKAN & KEPEMUDAAN
            ================================================== --}}

            @if(
                $peternakan->isNotEmpty() ||
                $kepemudaan->isNotEmpty()
            )

                <div class="potensi-group">

                    <div class="row g-5">


                        {{-- PETERNAKAN --}}
                        @if($peternakan->isNotEmpty())

                            <div class="col-lg-6">

                                <div class="potensi-head">

                                    <span class="potensi-badge"
                                          style="
                                              background:#fffbeb;
                                              color:#b45309;
                                          "
                                    >

                                        <i class="bi bi-piggy-bank-fill"></i>

                                        Peternakan

                                    </span>

                                    <h2 class="potensi-title-section">
                                        Potensi Peternakan
                                    </h2>

                                    <p class="potensi-subtitle">
                                        Hewan ternak yang sehat dan
                                        dikelola secara mandiri oleh warga.
                                    </p>

                                </div>


                                <div class="d-grid gap-4">

                                    @foreach($peternakan as $item)

                                        <div class="potensi-card">

                                            @if(
                                                $item->image &&
                                                Storage::disk('public')->exists($item->image)
                                            )

                                                <div class="potensi-image">

                                                    <img
                                                        src="{{ asset('storage/' . ltrim($item->image, '/')) }}"
                                                        alt="{{ $item->title }}"
                                                        loading="lazy"
                                                    >

                                                </div>

                                            @endif


                                            <div
                                                class="potensi-icon"
                                                style="
                                                    background:#fffbeb;
                                                    color:#d97706;
                                                "
                                            >
                                                <i class="bi bi-bug-fill"></i>
                                            </div>


                                            <div class="potensi-body">

                                                <span
                                                    class="potensi-chip"
                                                    style="
                                                        background:#fffbeb;
                                                        color:#b45309;
                                                    "
                                                >

                                                    <i class="bi bi-piggy-bank-fill"></i>

                                                    Peternakan

                                                </span>

                                                <h5 class="potensi-card-title">
                                                    {{ $item->title }}
                                                </h5>

                                                <p class="potensi-card-desc">
                                                    {{ $item->description }}
                                                </p>

                                                <div class="potensi-card-content">
                                                    {!! $item->content !!}
                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @endif


                        {{-- KEPEMUDAAN --}}
                        @if($kepemudaan->isNotEmpty())

                            <div class="col-lg-6">

                                <div class="potensi-head">

                                    <span class="potensi-badge"
                                          style="
                                              background:#eff6ff;
                                              color:#1d4ed8;
                                          "
                                    >

                                        <i class="bi bi-person-arms-up"></i>

                                        Kepemudaan

                                    </span>

                                    <h2 class="potensi-title-section">
                                        Potensi Pemuda &amp; Karang Taruna
                                    </h2>

                                    <p class="potensi-subtitle">
                                        Energi muda yang kreatif,
                                        aktif dan peduli lingkungan.
                                    </p>

                                </div>


                                <div class="d-grid gap-4">

                                    @foreach($kepemudaan as $item)

                                        <div class="potensi-card">

                                            @if(
                                                $item->image &&
                                                Storage::disk('public')->exists($item->image)
                                            )

                                                <div class="potensi-image">

                                                    <img
                                                        src="{{ asset('storage/' . ltrim($item->image, '/')) }}"
                                                        alt="{{ $item->title }}"
                                                        loading="lazy"
                                                    >

                                                </div>

                                            @endif


                                            <div
                                                class="potensi-icon"
                                                style="
                                                    background:#eff6ff;
                                                    color:#2563eb;
                                                "
                                            >
                                                <i class="bi bi-balloon-heart-fill"></i>
                                            </div>


                                            <div class="potensi-body">

                                                <span
                                                    class="potensi-chip"
                                                    style="
                                                        background:#eff6ff;
                                                        color:#1d4ed8;
                                                    "
                                                >

                                                    <i class="bi bi-person-arms-up"></i>

                                                    Kepemudaan

                                                </span>

                                                <h5 class="potensi-card-title">
                                                    {{ $item->title }}
                                                </h5>

                                                <p class="potensi-card-desc">
                                                    {{ $item->description }}
                                                </p>

                                                <div class="potensi-card-content">
                                                    {!! $item->content !!}
                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @endif

                    </div>

                </div>

            @endif


            {{-- =================================================
                 LAINNYA
            ================================================== --}}

            @if($lainnya->isNotEmpty())

                <div class="potensi-group">

                    <div class="potensi-head">

                        <span
                            class="potensi-badge"
                            style="
                                background:#fdf2f8;
                                color:#be185d;
                            "
                        >

                            <i class="bi bi-stars"></i>

                            Potensi Lainnya

                        </span>

                        <h2 class="potensi-title-section">
                            Potensi Lainnya
                        </h2>

                        <p class="potensi-subtitle">
                            UMKM, kerajinan, dan berbagai potensi
                            lain yang sedang berkembang di dusun.
                        </p>

                    </div>


                    <div class="row g-4">

                        @foreach($lainnya as $item)

                            <div class="col-12 col-md-6">

                                <div class="potensi-card">

                                    @if(
                                        $item->image &&
                                        Storage::disk('public')->exists($item->image)
                                    )

                                        <div class="potensi-image">

                                            <img
                                                src="{{ asset('storage/' . ltrim($item->image, '/')) }}"
                                                alt="{{ $item->title }}"
                                                loading="lazy"
                                            >

                                        </div>

                                    @endif


                                    <div
                                        class="potensi-icon"
                                        style="
                                            background:#fdf2f8;
                                            color:#be185d;
                                        "
                                    >
                                        <i class="bi bi-gift-fill"></i>
                                    </div>


                                    <div class="potensi-body">

                                        <span
                                            class="potensi-chip"
                                            style="
                                                background:#fdf2f8;
                                                color:#be185d;
                                            "
                                        >

                                            <i class="bi bi-stars"></i>

                                            Lainnya

                                        </span>

                                        <h5 class="potensi-card-title">
                                            {{ $item->title }}
                                        </h5>

                                        <p class="potensi-card-desc">
                                            {{ $item->description }}
                                        </p>

                                        <div class="potensi-card-content">
                                            {!! $item->content !!}
                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif


            {{-- =================================================
                 EMPTY STATE
            ================================================== --}}

            @if(
                !$sosial->isNotEmpty() &&
                !$pertanian->isNotEmpty() &&
                !$peternakan->isNotEmpty() &&
                !$kepemudaan->isNotEmpty() &&
                !$lainnya->isNotEmpty()
            )

                <div class="potensi-empty">

                    <div class="potensi-empty-icon">
                        <i class="bi bi-bar-chart-line"></i>
                    </div>

                    <h5>
                        Belum Ada Data Potensi
                    </h5>

                    <p>
                        Data potensi dusun akan segera ditambahkan
                        oleh admin. Silakan kembali lagi nanti.
                    </p>

                </div>

            @endif

        </div>

    </section>

</div>

@endsection
```
