```blade
@extends('layouts.frontend')
@section('title', 'Kegiatan Masyarakat')

@section('content')

<style>
    /* =====================================================
       PAGE
    ===================================================== */

    .kegiatan-page {
        background: #f8fafc;
    }

    /* =====================================================
       HERO
    ===================================================== */

    .kegiatan-hero {
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

    .kegiatan-hero::before {
        content: "";
        position: absolute;
        width: 430px;
        height: 430px;
        border-radius: 50%;
        background: rgba(255,255,255,.045);
        top: -240px;
        right: -100px;
    }

    .kegiatan-hero::after {
        content: "";
        position: absolute;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: rgba(255,255,255,.035);
        bottom: -190px;
        left: -100px;
    }

    .kegiatan-hero .wrap-container {
        position: relative;
        z-index: 2;
    }

    .kegiatan-crumb {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        color: rgba(255,255,255,.7);
        font-size: .88rem;
    }

    .kegiatan-crumb a {
        color: #fff;
        text-decoration: none;
        transition: .2s;
    }

    .kegiatan-crumb a:hover {
        opacity: .75;
    }

    .kegiatan-crumb .active {
        color: #d1fae5;
        font-weight: 600;
    }

    .kegiatan-hero h1 {
        margin: 0 0 12px;
        font-size: clamp(2rem, 4vw, 3rem);
        line-height: 1.15;
        font-weight: 800;
        letter-spacing: -.8px;
    }

    .kegiatan-hero p {
        max-width: 650px;
        margin: 0;
        color: rgba(255,255,255,.82);
        font-size: 1rem;
        line-height: 1.8;
    }


    /* =====================================================
       CONTENT
    ===================================================== */

    .kegiatan-content {
        padding: 65px 0 80px;
    }

    .kegiatan-group {
        margin-bottom: 65px;
    }

    .kegiatan-group:last-child {
        margin-bottom: 0;
    }


    /* =====================================================
       CATEGORY HEADER
    ===================================================== */

    .category-head {
        position: relative;
        margin-bottom: 28px;
        padding-left: 18px;
    }

    .category-head::before {
        content: "";
        position: absolute;
        left: 0;
        top: 4px;
        bottom: 5px;
        width: 4px;
        border-radius: 10px;
        background: #059669;
    }

    .category-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 10px;
        padding: 7px 12px;
        border-radius: 50px;
        background: #ecfdf5;
        color: #047857;
        font-size: .73rem;
        font-weight: 800;
        letter-spacing: .3px;
    }

    .category-title {
        margin: 0 0 7px;
        color: #0f172a;
        font-size: clamp(1.45rem, 2.5vw, 2rem);
        line-height: 1.25;
        font-weight: 800;
        letter-spacing: -.4px;
    }

    .category-desc {
        max-width: 700px;
        margin: 0;
        color: #64748b;
        font-size: .92rem;
        line-height: 1.7;
    }


    /* =====================================================
       ACTIVITY CARD
    ===================================================== */

    .activity-card {
        height: 100%;
        overflow: hidden;
        background: #fff;
        border: 1px solid #e7edef;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(15,23,42,.055);
        transition:
            transform .3s ease,
            box-shadow .3s ease,
            border-color .3s ease;
    }

    .activity-card:hover {
        transform: translateY(-6px);
        border-color: #c7eadb;
        box-shadow: 0 18px 42px rgba(15,23,42,.10);
    }


    /* =====================================================
       IMAGE
    ===================================================== */

    .activity-image {
        position: relative;
        width: 100%;
        height: 205px;
        overflow: hidden;
        background: #ecfdf5;
    }

    .activity-image img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .activity-card:hover .activity-image img {
        transform: scale(1.055);
    }

    .activity-image::after {
        content: "";
        position: absolute;
        inset: auto 0 0;
        height: 65px;
        background: linear-gradient(
            to top,
            rgba(0,0,0,.28),
            transparent
        );
        pointer-events: none;
    }


    /* =====================================================
       IMAGE CATEGORY
    ===================================================== */

    .activity-category {
        position: absolute;
        z-index: 3;
        top: 13px;
        left: 13px;

        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 7px 11px;

        border-radius: 50px;

        background: rgba(255,255,255,.95);
        color: #047857;

        font-size: .69rem;
        font-weight: 750;

        box-shadow: 0 5px 16px rgba(0,0,0,.13);
    }


    /* =====================================================
       PLACEHOLDER
    ===================================================== */

    .activity-placeholder {
        position: relative;
        width: 100%;
        height: 205px;

        display: flex;
        align-items: center;
        justify-content: center;

        overflow: hidden;
    }

    .activity-placeholder::before {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: rgba(255,255,255,.35);
        top: -75px;
        right: -45px;
    }

    .activity-placeholder::after {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: rgba(255,255,255,.25);
        bottom: -50px;
        left: -25px;
    }

    .activity-placeholder i {
        position: relative;
        z-index: 2;
        font-size: 48px;
        opacity: .55;
    }


    /* =====================================================
       CARD BODY
    ===================================================== */

    .activity-body {
        padding: 19px 19px 20px;
    }

    .activity-body .card-category {
        display: inline-flex;
        align-items: center;
        gap: 5px;

        margin-bottom: 9px;
        padding: 5px 9px;

        border-radius: 50px;
        background: #ecfdf5;
        color: #047857;

        font-size: .67rem;
        font-weight: 750;
    }

    .activity-title {
        margin: 0 0 8px;
        color: #0f172a;
        font-size: 1.02rem;
        line-height: 1.4;
        font-weight: 750;
    }

    .activity-description {
        margin: 0;
        color: #64748b;
        font-size: .83rem;
        line-height: 1.7;

        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }


    /* =====================================================
       EMPTY
    ===================================================== */

    .empty-kegiatan {
        padding: 55px 25px;
        text-align: center;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 22px;
        box-shadow: 0 10px 30px rgba(15,23,42,.05);
    }

    .empty-kegiatan-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 18px;
        border-radius: 20px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #ecfdf5;
        color: #059669;
        font-size: 1.8rem;
    }

    .empty-kegiatan h5 {
        color: #0f172a;
        font-weight: 750;
        margin-bottom: 7px;
    }

    .empty-kegiatan p {
        max-width: 450px;
        margin: auto;
        color: #64748b;
        font-size: .88rem;
        line-height: 1.7;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 768px) {

        .kegiatan-hero {
            padding: 48px 0 45px;
        }

        .kegiatan-hero h1 {
            font-size: 2rem;
        }

        .kegiatan-hero p {
            font-size: .9rem;
        }

        .kegiatan-content {
            padding: 45px 0 60px;
        }

        .kegiatan-group {
            margin-bottom: 48px;
        }

        .category-head {
            padding-left: 14px;
            margin-bottom: 22px;
        }

        .category-title {
            font-size: 1.45rem;
        }

        .category-desc {
            font-size: .85rem;
        }

        .activity-image,
        .activity-placeholder {
            height: 190px;
        }

        .activity-body {
            padding: 17px;
        }
    }

    @media (max-width: 575px) {

        .activity-image,
        .activity-placeholder {
            height: 205px;
        }

        .activity-title {
            font-size: .97rem;
        }

        .activity-description {
            font-size: .8rem;
        }

        .category-badge {
            font-size: .68rem;
        }
    }
</style>


<div class="kegiatan-page">

    {{-- =====================================================
         HERO
    ====================================================== --}}
    <section class="kegiatan-hero">

        <div class="wrap-container">

            <div class="kegiatan-crumb">

                <a href="{{ route('home') }}">
                    <i class="bi bi-house-fill me-1"></i>
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span class="active">
                    Kegiatan
                </span>

            </div>

            <h1>
                Kegiatan Masyarakat
            </h1>

            <p>
                Berbagai aktivitas positif rutin warga untuk
                mempererat kebersamaan dan meningkatkan
                kesejahteraan masyarakat Dusun Jlegongan.
            </p>

        </div>

    </section>


    {{-- =====================================================
         CONTENT
    ====================================================== --}}
    <section class="kegiatan-content">

        <div class="wrap-container">

            @php

                $catMeta = [

                    'Pertanian' => [
                        'icon' => 'bi-flower1',
                        'grad' => 'linear-gradient(135deg, #ecfdf5 0%, #bbf7d0 100%)',
                        'txt' => '#065f46',
                        'head' => 'Kegiatan Pertanian Warga',
                        'sub' => 'Aktivitas di bidang pertanian sebagai penopang ekonomi utama dusun.'
                    ],

                    'Peternakan' => [
                        'icon' => 'bi-piggy-bank-fill',
                        'grad' => 'linear-gradient(135deg, #fef3c7 0%, #fde68a 100%)',
                        'txt' => '#b45309',
                        'head' => 'Kegiatan Peternakan',
                        'sub' => 'Pengelolaan hewan ternak yang dikelola secara bersama-sama.'
                    ],

                    'Karang Taruna' => [
                        'icon' => 'bi-balloon-heart-fill',
                        'grad' => 'linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%)',
                        'txt' => '#1d4ed8',
                        'head' => 'Kegiatan Karang Taruna',
                        'sub' => 'Kreativitas dan kepedulian pemuda Dusun Jlegongan.'
                    ],

                    'Lainnya' => [
                        'icon' => 'bi-star-fill',
                        'grad' => 'linear-gradient(135deg, #fce7f3 0%, #fbcfe8 100%)',
                        'txt' => '#be185d',
                        'head' => 'Kegiatan Lainnya',
                        'sub' => 'Aktivitas lain yang bermanfaat bagi warga dusun.'
                    ],

                ];

                $idxIcon = 0;

                $fallbackIcons = [
                    'bi-calendar-event-fill',
                    'bi-people-fill',
                    'bi-heart-fill',
                    'bi-stars',
                    'bi-bullseye',
                    'bi-lightbulb-fill'
                ];

                $hasAny = false;

            @endphp


            {{-- =================================================
                 GROUP KATEGORI
            ================================================== --}}

            @if(isset($sortedGroups) && count($sortedGroups))

                @foreach($sortedGroups as $catName => $items)

                    @php

                        $hasAny = true;

                        $meta = $catMeta[$catName] ?? null;

                        if (!$meta) {

                            $meta = [

                                'icon' =>
                                    $fallbackIcons[
                                        $idxIcon % count($fallbackIcons)
                                    ],

                                'grad' =>
                                    'linear-gradient(
                                        135deg,
                                        #ecfdf5 0%,
                                        #bbf7d0 100%
                                    )',

                                'txt' => '#065f46',

                                'head' =>
                                    'Kegiatan ' . $catName,

                                'sub' =>
                                    'Berbagai aktivitas positif kategori '
                                    . $catName .
                                    ' di Dusun Jlegongan.',

                            ];

                            $idxIcon++;

                        }

                    @endphp


                    <div class="kegiatan-group">

                        {{-- CATEGORY HEADER --}}
                        <div class="category-head">

                            <span class="category-badge">

                                <i class="bi {{ $meta['icon'] }}"></i>

                                {{ $catName }}

                            </span>

                            <h2 class="category-title">
                                {{ $meta['head'] }}
                            </h2>

                            <p class="category-desc">
                                {{ $meta['sub'] }}
                            </p>

                        </div>


                        {{-- CARDS --}}
                        <div class="row g-4">

                            @foreach($items as $item)

                                <div class="col-12 col-sm-6 col-lg-4">

                                    <div class="activity-card">

                                        {{-- FOTO --}}
                                        @if(
                                            $item->image &&
                                            Storage::disk('public')->exists($item->image)
                                        )

                                            <div class="activity-image">

                                                <span class="activity-category">

                                                    <i class="bi {{ $meta['icon'] }}"></i>

                                                    {{ $catName }}

                                                </span>

                                                <img
                                                    src="{{ asset('storage/' . ltrim($item->image, '/')) }}"
                                                    alt="{{ $item->name }}"
                                                    loading="lazy"
                                                >

                                            </div>

                                        @else

                                            <div
                                                class="activity-placeholder"
                                                style="
                                                    background: {{ $meta['grad'] }};
                                                    color: {{ $meta['txt'] }};
                                                "
                                            >

                                                <span class="activity-category">

                                                    <i class="bi {{ $meta['icon'] }}"></i>

                                                    {{ $catName }}

                                                </span>

                                                <i class="bi {{ $meta['icon'] }}"></i>

                                            </div>

                                        @endif


                                        {{-- BODY --}}
                                        <div class="activity-body">

                                            <span class="card-category">

                                                <i class="bi bi-tag-fill"></i>

                                                {{ $catName }}

                                            </span>

                                            <h5 class="activity-title">
                                                {{ $item->name }}
                                            </h5>

                                            @if($item->description)

                                                <p class="activity-description">
                                                    {{ $item->description }}
                                                </p>

                                            @else

                                                <p class="activity-description">
                                                    Kegiatan masyarakat Dusun
                                                    Jlegongan yang dilaksanakan
                                                    secara rutin.
                                                </p>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                @endforeach

            @endif


            {{-- =================================================
                 EMPTY STATE
            ================================================== --}}

            @if(!$hasAny)

                <div class="empty-kegiatan">

                    <div class="empty-kegiatan-icon">

                        <i class="bi bi-calendar-x"></i>

                    </div>

                    <h5>
                        Belum Ada Data Kegiatan
                    </h5>

                    <p>
                        Data kegiatan masyarakat akan segera
                        ditambahkan oleh admin. Silakan kembali
                        lagi nanti untuk melihat aktivitas warga.
                    </p>

                </div>

            @endif

        </div>

    </section>

</div>

@endsection
```
