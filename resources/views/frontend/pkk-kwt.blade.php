@extends('layouts.frontend')
@section('title', 'PKK & KWT')

@section('content')

<style>
    /* =====================================================
       PKK & KWT PAGE
    ===================================================== */

    .pkk-page {
        background: linear-gradient(180deg, #f8fafc 0%, #f0fdf4 100%);
    }

    /* ================= HERO ================= */

    .pkk-hero {
        position: relative;
        overflow: hidden;
        padding: 72px 0 68px;
        color: #fff;
        background:
            radial-gradient(circle at 15% 20%, rgba(16,185,129,.30), transparent 42%),
            radial-gradient(circle at 88% 75%, rgba(59,130,246,.18), transparent 45%),
            linear-gradient(135deg, #064e3b 0%, #047857 55%, #059669 100%);
    }

    .pkk-hero::before {
        content: "";
        position: absolute;
        width: 430px;
        height: 430px;
        border-radius: 50%;
        background: rgba(255,255,255,.045);
        top: -240px;
        right: -100px;
    }

    .pkk-hero::after {
        content: "";
        position: absolute;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: rgba(255,255,255,.035);
        bottom: -190px;
        left: -90px;
    }

    .pkk-hero .wrap-container {
        position: relative;
        z-index: 2;
    }

    .pkk-crumb {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        color: rgba(255,255,255,.70);
        font-size: .88rem;
    }

    .pkk-crumb a {
        display: inline-flex;
        align-items: center;
        color: #fff;
        text-decoration: none;
        transition: .2s ease;
    }

    .pkk-crumb a:hover {
        opacity: .8;
        transform: translateX(-2px);
    }

    .pkk-crumb .active {
        color: #bbf7d0;
        font-weight: 700;
    }

    .pkk-hero h1 {
        margin: 0 0 14px;
        font-size: clamp(2.1rem, 4.5vw, 3.3rem);
        line-height: 1.12;
        font-weight: 850;
        letter-spacing: -1px;
        background: linear-gradient(90deg, #fff, #bbf7d0);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .pkk-hero p {
        max-width: 680px;
        margin: 0;
        color: rgba(255,255,255,.84);
        font-size: 1rem;
        line-height: 1.8;
    }

    /* ================= CONTENT ================= */

    .pkk-content {
        padding: 70px 0 90px;
    }

    .pkk-intro {
        text-align: center;
        margin-bottom: 48px;
    }

    .pkk-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        margin-bottom: 13px;
        border-radius: 999px;
        background: #ecfdf5;
        border: 1px solid #bbf7d0;
        color: #047857;
        font-size: .72rem;
        font-weight: 850;
        letter-spacing: .5px;
        text-transform: uppercase;
    }

    .pkk-title {
        margin: 0 0 10px;
        color: #0f172a;
        font-size: clamp(1.7rem, 3vw, 2.35rem);
        line-height: 1.2;
        font-weight: 850;
        letter-spacing: -.6px;
    }

    .pkk-subtitle {
        max-width: 650px;
        margin: auto;
        color: #64748b;
        font-size: .96rem;
        line-height: 1.8;
    }

    /* ================= GRID ================= */

    .pkk-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 30px;
    }

    /* ================= CARD ================= */

    .org-premium-card {
        position: relative;
        overflow: hidden;
        height: 100%;
        background: #fff;
        border-radius: 24px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 12px 35px rgba(15,23,42,.07);
        transition:
            transform .35s ease,
            box-shadow .35s ease,
            border-color .35s ease;
    }

    .org-premium-card:hover {
        transform: translateY(-7px);
        border-color: rgba(16,185,129,.35);
        box-shadow: 0 25px 55px rgba(15,23,42,.13);
    }

    /* ================= FOTO BESAR ================= */

    .org-photo {
        position: relative;
        width: 100%;
        height: 310px;
        overflow: hidden;
        background: #e2e8f0;
    }

    .org-photo img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform .7s cubic-bezier(.4,0,.2,1);
    }

    .org-premium-card:hover .org-photo img {
        transform: scale(1.06);
    }

    .org-photo::after {
        content: "";
        position: absolute;
        inset: 0;
        background:
            linear-gradient(
                180deg,
                rgba(15,23,42,0) 35%,
                rgba(15,23,42,.10) 55%,
                rgba(6,78,59,.82) 100%
            );
        pointer-events: none;
    }

    /* ================= FOTO OVERLAY ================= */

    .org-overlay {
        position: absolute;
        z-index: 3;
        left: 22px;
        right: 22px;
        bottom: 20px;
        display: flex;
        align-items: center;
        gap: 14px;
        color: #fff;
    }

    .org-overlay-icon {
        flex: 0 0 52px;
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        background: rgba(255,255,255,.18);
        border: 1px solid rgba(255,255,255,.30);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        font-size: 1.3rem;
    }

    .org-overlay h4 {
        margin: 0 0 3px;
        color: #fff;
        font-size: 1.25rem;
        font-weight: 850;
        letter-spacing: -.3px;
    }

    .org-overlay small {
        color: rgba(255,255,255,.86);
        font-size: .78rem;
    }

    /* ================= FALLBACK ================= */

    .org-placeholder {
        position: relative;
        height: 310px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        color: #fff;
    }

    .org-placeholder::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 20% 20%, rgba(255,255,255,.18), transparent 40%),
            radial-gradient(circle at 80% 80%, rgba(255,255,255,.12), transparent 45%);
    }

    .org-placeholder-pkk {
        background: linear-gradient(135deg, #be185d, #ec4899);
    }

    .org-placeholder-kwt {
        background: linear-gradient(135deg, #047857, #10b981);
    }

    .org-placeholder-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .org-placeholder-content i {
        display: block;
        margin-bottom: 15px;
        font-size: 4rem;
        opacity: .9;
    }

    .org-placeholder-content h4 {
        margin: 0 0 4px;
        font-weight: 850;
    }

    .org-placeholder-content small {
        opacity: .85;
    }

    /* ================= BODY ================= */

    .org-body-premium {
        padding: 28px;
    }

    .org-label {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 6px 11px;
        margin-bottom: 14px;
        border-radius: 999px;
        font-size: .68rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .35px;
    }

    .org-label-pkk {
        color: #be185d;
        background: #fdf2f8;
        border: 1px solid #fbcfe8;
    }

    .org-label-kwt {
        color: #047857;
        background: #ecfdf5;
        border: 1px solid #bbf7d0;
    }

    .org-body-premium h3 {
        margin: 0 0 12px;
        color: #0f172a;
        font-size: 1.35rem;
        font-weight: 850;
        letter-spacing: -.35px;
    }

    .org-description {
        margin-bottom: 24px;
        color: #64748b;
        font-size: .9rem;
        line-height: 1.85;
    }

    /* ================= ACTIVITY BOX ================= */

    .activity-box {
        padding: 20px;
        border-radius: 18px;
        border: 1px solid;
    }

    .activity-box-pkk {
        background: linear-gradient(135deg, #fff7fb, #fdf2f8);
        border-color: #fbcfe8;
    }

    .activity-box-kwt {
        background: linear-gradient(135deg, #f0fdf4, #ecfdf5);
        border-color: #bbf7d0;
    }

    .activity-title {
        display: flex;
        align-items: center;
        gap: 9px;
        margin-bottom: 15px;
        font-size: .9rem;
        font-weight: 850;
    }

    .activity-title-pkk {
        color: #be185d;
    }

    .activity-title-kwt {
        color: #047857;
    }

    .activity-list {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .activity-list li {
        position: relative;
        display: flex;
        align-items: flex-start;
        gap: 9px;
        margin-bottom: 11px;
        color: #475569;
        font-size: .83rem;
        line-height: 1.55;
    }

    .activity-list li:last-child {
        margin-bottom: 0;
    }

    .activity-list li i {
        flex: 0 0 auto;
        margin-top: 2px;
        font-size: .88rem;
    }

    .activity-list-pkk li i {
        color: #db2777;
    }

    .activity-list-kwt li i {
        color: #059669;
    }

    /* CONTENT HTML DARI DATABASE */

    .activity-content {
        color: #475569;
        font-size: .83rem;
        line-height: 1.7;
    }

    .activity-content p:last-child {
        margin-bottom: 0;
    }

    .activity-content ul,
    .activity-content ol {
        padding-left: 20px;
        margin-bottom: 0;
    }

    /* ================= RESPONSIVE ================= */

    @media (max-width: 991px) {
        .pkk-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .org-photo,
        .org-placeholder {
            height: 330px;
        }
    }

    @media (max-width: 768px) {
        .pkk-hero {
            padding: 52px 0 48px;
        }

        .pkk-hero h1 {
            font-size: 2.1rem;
        }

        .pkk-content {
            padding: 50px 0 65px;
        }

        .pkk-intro {
            margin-bottom: 35px;
        }

        .org-photo,
        .org-placeholder {
            height: 270px;
        }

        .org-body-premium {
            padding: 22px;
        }
    }

    @media (max-width: 575px) {
        .pkk-grid {
            gap: 20px;
        }

        .org-premium-card {
            border-radius: 20px;
        }

        .org-photo,
        .org-placeholder {
            height: 230px;
        }

        .org-overlay {
            left: 16px;
            right: 16px;
            bottom: 16px;
            gap: 11px;
        }

        .org-overlay-icon {
            width: 44px;
            height: 44px;
            flex-basis: 44px;
            border-radius: 13px;
            font-size: 1.1rem;
        }

        .org-overlay h4 {
            font-size: 1.05rem;
        }

        .org-overlay small {
            font-size: .7rem;
        }

        .org-body-premium {
            padding: 20px;
        }

        .activity-box {
            padding: 17px;
        }
    }
</style>


<div class="pkk-page">

    {{-- ================= HERO ================= --}}
    <section class="pkk-hero">
        <div class="wrap-container">

            <div class="pkk-crumb">
                <a href="{{ route('home') }}">
                    <i class="bi bi-house-fill me-1"></i>
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span class="active">
                    PKK &amp; KWT
                </span>
            </div>

            <h1>PKK &amp; KWT Dusun</h1>

            <p>
                Dua organisasi wanita yang menjadi penggerak utama
                kesejahteraan keluarga, pemberdayaan masyarakat,
                dan perekonomian warga Dusun Jlegongan.
            </p>

        </div>
    </section>


    {{-- ================= CONTENT ================= --}}
    <section class="pkk-content">
        <div class="wrap-container">

            <div class="pkk-intro">

                <span class="pkk-eyebrow">
                    <i class="bi bi-people-fill"></i>
                    ORGANISASI WANITA
                </span>

                <h2 class="pkk-title">
                    PKK &amp; KWT Dusun Jlegongan
                </h2>

                <p class="pkk-subtitle">
                    Peran aktif perempuan dalam membangun keluarga,
                    lingkungan, pertanian, dan perekonomian masyarakat dusun.
                </p>

            </div>


            <div class="pkk-grid">

                {{-- =================================================
                     PKK
                ================================================== --}}
                <div class="org-premium-card">

                    @if($pkk && $pkk->image && Storage::disk('public')->exists($pkk->image))

                        <div class="org-photo">

                            <img
                                src="{{ asset('storage/' . ltrim($pkk->image, '/')) }}"
                                alt="{{ $pkk->name ?? 'PKK Dusun Jlegongan' }}"
                                loading="lazy"
                            >

                            <div class="org-overlay">

                                <div class="org-overlay-icon">
                                    <i class="bi bi-people-fill"></i>
                                </div>

                                <div>
                                    <h4>
                                        {{ $pkk->name ?? 'PKK Dusun Jlegongan' }}
                                    </h4>

                                    <small>
                                        Pembinaan Kesejahteraan Keluarga
                                    </small>
                                </div>

                            </div>

                        </div>

                    @else

                        <div class="org-placeholder org-placeholder-pkk">

                            <div class="org-placeholder-content">

                                <i class="bi bi-people-fill"></i>

                                <h4>
                                    {{ $pkk->name ?? 'PKK Dusun Jlegongan' }}
                                </h4>

                                <small>
                                    Pembinaan Kesejahteraan Keluarga
                                </small>

                            </div>

                        </div>

                    @endif


                    <div class="org-body-premium">

                        <span class="org-label org-label-pkk">
                            <i class="bi bi-heart-fill"></i>
                            Pemberdayaan Keluarga
                        </span>

                        <h3>
                            {{ $pkk->name ?? 'PKK Jlegongan' }}
                        </h3>

                        <div class="org-description">
                            <p class="mb-0">
                                {{ $pkk->description ?? 'PKK Jlegongan aktif menyelenggarakan program pemberdayaan perempuan, pembinaan keluarga, posyandu, kegiatan seni ibu-ibu, serta berbagai bakti sosial untuk kesejahteraan keluarga di lingkungan dusun.' }}
                            </p>
                        </div>


                        {{-- KEGIATAN PKK --}}
                        @if($pkk && $pkk->activities)

                            <div class="activity-box activity-box-pkk">

                                <div class="activity-title activity-title-pkk">
                                    <i class="bi bi-list-check"></i>
                                    Kegiatan Rutin PKK
                                </div>

                                <div class="activity-content">
                                    {!! $pkk->activities !!}
                                </div>

                            </div>

                        @else

                            <div class="activity-box activity-box-pkk">

                                <div class="activity-title activity-title-pkk">
                                    <i class="bi bi-list-check"></i>
                                    Kegiatan Rutin PKK
                                </div>

                                <ul class="activity-list activity-list-pkk">

                                    <li>
                                        <i class="bi bi-check-circle-fill"></i>
                                        <span>Posyandu balita &amp; lansia setiap bulan</span>
                                    </li>

                                    <li>
                                        <i class="bi bi-check-circle-fill"></i>
                                        <span>Senam ibu &amp; arisan rutin</span>
                                    </li>

                                    <li>
                                        <i class="bi bi-check-circle-fill"></i>
                                        <span>Pemberdayaan UMKM rumah tangga</span>
                                    </li>

                                    <li>
                                        <i class="bi bi-check-circle-fill"></i>
                                        <span>Bakti sosial &amp; kunjungan warga lansia</span>
                                    </li>

                                </ul>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- =================================================
                     KWT
                ================================================== --}}
                <div class="org-premium-card">

                    @if($kwt && $kwt->image && Storage::disk('public')->exists($kwt->image))

                        <div class="org-photo">

                            <img
                                src="{{ asset('storage/' . ltrim($kwt->image, '/')) }}"
                                alt="{{ $kwt->name ?? 'KWT Dusun Jlegongan' }}"
                                loading="lazy"
                            >

                            <div class="org-overlay">

                                <div class="org-overlay-icon">
                                    <i class="bi bi-flower2"></i>
                                </div>

                                <div>
                                    <h4>
                                        {{ $kwt->name ?? 'KWT Dusun Jlegongan' }}
                                    </h4>

                                    <small>
                                        Kelompok Wanita Tani
                                    </small>
                                </div>

                            </div>

                        </div>

                    @else

                        <div class="org-placeholder org-placeholder-kwt">

                            <div class="org-placeholder-content">

                                <i class="bi bi-flower2"></i>

                                <h4>
                                    {{ $kwt->name ?? 'KWT Dusun Jlegongan' }}
                                </h4>

                                <small>
                                    Kelompok Wanita Tani
                                </small>

                            </div>

                        </div>

                    @endif


                    <div class="org-body-premium">

                        <span class="org-label org-label-kwt">
                            <i class="bi bi-flower1"></i>
                            Pemberdayaan Pertanian
                        </span>

                        <h3>
                            {{ $kwt->name ?? 'KWT Jlegongan' }}
                        </h3>

                        <div class="org-description">
                            <p class="mb-0">
                                {{ $kwt->description ?? 'KWT Jlegongan mewadahi ibu-ibu petani dalam pengelolaan lahan pekarangan, tanaman sayur mayur, toga (tanaman obat keluarga), serta pemasaran hasil pertanian organik skala dusun.' }}
                            </p>
                        </div>


                        {{-- KEGIATAN KWT --}}
                        @if($kwt && $kwt->activities)

                            <div class="activity-box activity-box-kwt">

                                <div class="activity-title activity-title-kwt">
                                    <i class="bi bi-list-check"></i>
                                    Kegiatan Rutin KWT
                                </div>

                                <div class="activity-content">
                                    {!! $kwt->activities !!}
                                </div>

                            </div>

                        @else

                            <div class="activity-box activity-box-kwt">

                                <div class="activity-title activity-title-kwt">
                                    <i class="bi bi-list-check"></i>
                                    Kegiatan Rutin KWT
                                </div>

                                <ul class="activity-list activity-list-kwt">

                                    <li>
                                        <i class="bi bi-check-circle-fill"></i>
                                        <span>Budidaya sayur &amp; toga di lahan pekarangan</span>
                                    </li>

                                    <li>
                                        <i class="bi bi-check-circle-fill"></i>
                                        <span>Pelatihan pertanian organik rutin</span>
                                    </li>

                                    <li>
                                        <i class="bi bi-check-circle-fill"></i>
                                        <span>Pemasaran hasil tani bersama</span>
                                    </li>

                                    <li>
                                        <i class="bi bi-check-circle-fill"></i>
                                        <span>Pengolahan &amp; pengemasan produk tani</span>
                                    </li>

                                </ul>

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>
    </section>

</div>

@endsection