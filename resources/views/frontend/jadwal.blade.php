```blade
@extends('layouts.frontend')
@section('title', 'Jadwal Rutin')

@section('content')

<style>
    /* =====================================================
       JADWAL PAGE
    ===================================================== */

    .jadwal-page {
        background: linear-gradient(
            180deg,
            #f8fafc 0%,
            #f0fdf4 100%
        );
        min-height: 100vh;
    }

    /* =====================================================
       HERO
    ===================================================== */

    .jadwal-hero {
        position: relative;
        overflow: hidden;
        padding: 75px 0 70px;

        background:
            radial-gradient(
                circle at 20% 20%,
                rgba(16,185,129,.32) 0%,
                transparent 45%
            ),
            radial-gradient(
                circle at 85% 80%,
                rgba(59,130,246,.18) 0%,
                transparent 50%
            ),
            linear-gradient(
                135deg,
                #064e3b 0%,
                #047857 55%,
                #059669 100%
            );

        color: #fff;
    }

    .jadwal-hero::before {
        content: "";

        position: absolute;

        width: 480px;
        height: 480px;

        border-radius: 50%;

        background: rgba(255,255,255,.05);

        top: -260px;
        right: -120px;
    }

    .jadwal-hero::after {
        content: "";

        position: absolute;

        width: 320px;
        height: 320px;

        border-radius: 50%;

        background: rgba(255,255,255,.038);

        bottom: -220px;
        left: -120px;
    }

    .jadwal-hero .wrap-container {
        position: relative;
        z-index: 2;
    }

    .jadwal-crumb {
        display: flex;
        align-items: center;

        gap: 10px;

        margin-bottom: 22px;

        color: rgba(255,255,255,.72);

        font-size: .88rem;
    }

    .jadwal-crumb a {
        display: inline-flex;
        align-items: center;

        color: #fff;

        text-decoration: none;

        transition: .2s;
    }

    .jadwal-crumb a:hover {
        opacity: .78;
        transform: translateX(-2px);
    }

    .jadwal-crumb .active {
        color: #bbf7d0;
        font-weight: 600;
    }

    .jadwal-hero h1 {
        margin: 0 0 14px;

        font-size: clamp(
            2.1rem,
            4.2vw,
            3.2rem
        );

        line-height: 1.12;

        font-weight: 850;

        letter-spacing: -.9px;

        background:
            linear-gradient(
                90deg,
                #fff 0%,
                #bbf7d0 100%
            );

        -webkit-background-clip: text;
        background-clip: text;

        -webkit-text-fill-color: transparent;
    }

    .jadwal-hero p {
        max-width: 680px;

        margin: 0;

        color: rgba(255,255,255,.84);

        font-size: 1.02rem;

        line-height: 1.82;
    }


    /* =====================================================
       CONTENT
    ===================================================== */

    .jadwal-content {
        padding: 70px 0 90px;
    }

    .jadwal-intro {
        margin-bottom: 38px;
    }

    .jadwal-eyebrow {
        display: inline-flex;
        align-items: center;

        gap: 8px;

        margin-bottom: 12px;

        padding: 8px 16px;

        border-radius: 999px;

        background: #ecfdf5;

        color: #047857;

        font-size: .72rem;

        font-weight: 850;

        letter-spacing: .4px;

        text-transform: uppercase;

        border: 1px solid #bbf7d0;

        box-shadow:
            0 6px 18px
            rgba(16,185,129,.10);
    }

    .jadwal-title {
        margin: 0 0 10px;

        color: #0f172a;

        font-size: clamp(
            1.6rem,
            2.7vw,
            2.2rem
        );

        line-height: 1.22;

        font-weight: 850;

        letter-spacing: -.5px;
    }

    .jadwal-subtitle {
        max-width: 620px;

        margin: 0;

        color: #64748b;

        font-size: .96rem;

        line-height: 1.78;
    }


    /* =====================================================
       GRID
    ===================================================== */

    .schedule-grid {
        display: grid;

        grid-template-columns:
            repeat(
                3,
                minmax(0,1fr)
            );

        gap: 26px;

        align-items: stretch;
    }


    /* =====================================================
       CARD
    ===================================================== */

    .sch-card {
        position: relative;

        overflow: hidden;

        display: flex;
        flex-direction: column;

        background: #fff;

        border-radius: 20px;

        border: 1px solid
            rgba(226,232,240,.75);

        box-shadow:
            0 10px 30px
            rgba(15,23,42,.06);

        transition:
            transform .38s
            cubic-bezier(.4,0,.2,1),

            box-shadow .38s
            cubic-bezier(.4,0,.2,1),

            border-color .25s ease;

        isolation: isolate;
    }

    .sch-card::before {
        content: "";

        position: absolute;

        inset: 0;

        border-radius: inherit;

        padding: 1.2px;

        background:
            linear-gradient(
                135deg,
                var(--sch-grad-a,#10b981),
                var(--sch-grad-b,#3b82f6) 55%,
                var(--sch-grad-c,#ec4899)
            );

        -webkit-mask:
            linear-gradient(#fff 0 0)
            content-box,
            linear-gradient(#fff 0 0);

        -webkit-mask-composite: xor;

        mask-composite: exclude;

        pointer-events: none;

        opacity: 0;

        transition: opacity .35s ease;

        z-index: 4;
    }

    .sch-card:hover::before {
        opacity: 1;
    }

    .sch-card:hover {
        transform: translateY(-6px);

        border-color: transparent;

        box-shadow:
            0 22px 50px
            rgba(15,23,42,.13);
    }


    /* =====================================================
       WARNA HARI
    ===================================================== */

    .sch-card[data-day="Senin"] {
        --sch-grad-a:#10b981;
        --sch-grad-b:#14b8a6;
        --sch-grad-c:#06b6d4;

        --sch-chip-bg:
            rgba(16,185,129,.18);

        --sch-chip-color:#047857;

        --sch-accent:#10b981;
    }

    .sch-card[data-day="Selasa"] {
        --sch-grad-a:#f59e0b;
        --sch-grad-b:#f97316;
        --sch-grad-c:#ef4444;

        --sch-chip-bg:
            rgba(245,158,11,.18);

        --sch-chip-color:#b45309;

        --sch-accent:#f59e0b;
    }

    .sch-card[data-day="Rabu"] {
        --sch-grad-a:#3b82f6;
        --sch-grad-b:#6366f1;
        --sch-grad-c:#8b5cf6;

        --sch-chip-bg:
            rgba(59,130,246,.18);

        --sch-chip-color:#1d4ed8;

        --sch-accent:#3b82f6;
    }

    .sch-card[data-day="Kamis"] {
        --sch-grad-a:#ec4899;
        --sch-grad-b:#db2777;
        --sch-grad-c:#f472b6;

        --sch-chip-bg:
            rgba(236,72,153,.17);

        --sch-chip-color:#be185d;

        --sch-accent:#ec4899;
    }

    .sch-card[data-day="Jumat"] {
        --sch-grad-a:#ef4444;
        --sch-grad-b:#f87171;
        --sch-grad-c:#fb7185;

        --sch-chip-bg:
            rgba(239,68,68,.17);

        --sch-chip-color:#b91c1c;

        --sch-accent:#ef4444;
    }

    .sch-card[data-day="Sabtu"] {
        --sch-grad-a:#0ea5e9;
        --sch-grad-b:#06b6d4;
        --sch-grad-c:#14b8a6;

        --sch-chip-bg:
            rgba(14,165,233,.17);

        --sch-chip-color:#0369a1;

        --sch-accent:#0ea5e9;
    }

    .sch-card[data-day="Minggu"] {
        --sch-grad-a:#8b5cf6;
        --sch-grad-b:#a855f7;
        --sch-grad-c:#d946ef;

        --sch-chip-bg:
            rgba(139,92,246,.17);

        --sch-chip-color:#6d28d9;

        --sch-accent:#8b5cf6;
    }

    .sch-card[data-day*="-"] {
        --sch-grad-a:#059669;
        --sch-grad-b:#0891b2;
        --sch-grad-c:#7c3aed;

        --sch-chip-bg:
            rgba(5,150,105,.16);

        --sch-chip-color:#065f46;

        --sch-accent:#059669;
    }


    /* =====================================================
       FOTO - LEBIH BESAR
    ===================================================== */

    .sch-img,
    .sch-placeholder {

        position: relative;

        width: 100% !important;

        /*
         * FOTO DIBUAT LEBIH BESAR
         */
        height: 190px !important;

        max-height: 190px !important;

        min-height: 190px !important;

        overflow: hidden;

        margin: 0 !important;

        border-radius: 0;

        background:
            linear-gradient(
                135deg,
                #d1fae5 0%,
                #a7f3d0 100%
            );
    }


    /* FOTO */

    .sch-img img {

        width: 100% !important;

        height: 100% !important;

        display: block;

        object-fit: cover;

        object-position: center;

        transition:
            transform .65s
            cubic-bezier(.4,0,.2,1);
    }

    .sch-card:hover
    .sch-img img {
        transform: scale(1.06);
    }


    /* =====================================================
       OVERLAY FOTO
    ===================================================== */

    .sch-img::after,
    .sch-placeholder::after {

        content: "";

        position: absolute;

        inset: 0;

        background:
            linear-gradient(
                180deg,
                rgba(0,0,0,.02) 20%,
                rgba(0,0,0,.08) 55%,
                rgba(4,120,87,.45) 100%
            );

        pointer-events: none;

        z-index: 1;
    }


    /* =====================================================
       PLACEHOLDER
    ===================================================== */

    .sch-placeholder {

        color: #059669;

        display: flex;

        align-items: center;

        justify-content: center;
    }

    .sch-placeholder::before {

        content: "";

        position: absolute;

        inset: 0;

        background:
            radial-gradient(
                circle at 25% 20%,
                rgba(255,255,255,.55) 0%,
                transparent 45%
            ),

            radial-gradient(
                circle at 75% 80%,
                rgba(16,185,129,.18) 0%,
                transparent 55%
            );

        z-index: 0;
    }

    .sch-placeholder i {

        position: relative;

        z-index: 2;

        font-size: 52px !important;

        opacity: .55;

        filter:
            drop-shadow(
                0 7px 14px
                rgba(16,185,129,.20)
            );
    }


    /* =====================================================
       CHIP HARI
    ===================================================== */

    .chip-day-glass {

        position: absolute;

        top: 14px;

        left: 14px;

        z-index: 5;

        display: inline-flex;

        align-items: center;

        gap: 6px;

        padding: 7px 13px;

        border-radius: 999px;

        background:
            var(
                --sch-chip-bg,
                rgba(16,185,129,.18)
            );

        backdrop-filter:
            blur(9px)
            saturate(180%);

        -webkit-backdrop-filter:
            blur(9px)
            saturate(180%);

        color:
            var(
                --sch-chip-color,
                #047857
            );

        font-size: .72rem;

        font-weight: 850;

        letter-spacing: .25px;

        border:
            1px solid
            rgba(255,255,255,.5);

        box-shadow:
            0 6px 16px
            rgba(15,23,42,.12);

        text-transform: uppercase;
    }

    .chip-day-glass i {
        font-size: .7rem;
    }


    /* =====================================================
       CARD HEADER
    ===================================================== */

    .sch-head {

        padding:
            20px
            22px
            0 !important;

        margin-bottom: 14px;

        position: relative;
    }

    .sch-head .sch-day {
        display: none !important;
    }

    .sch-name {

        margin: 0;

        color: #0f172a;

        font-size: 1.12rem;

        line-height: 1.4;

        font-weight: 800;

        letter-spacing: -.2px;
    }

    .sch-name::after {

        content: "";

        display: block;

        margin-top: 11px;

        width: 38px;

        height: 3px;

        border-radius: 999px;

        background:
            linear-gradient(
                90deg,
                var(--sch-accent,#10b981),
                transparent
            );

        opacity: .85;
    }


    /* =====================================================
       BODY
    ===================================================== */

    .sch-body {

        padding:
            0
            22px
            22px !important;
    }

    .sch-info-row {

        display: flex;

        flex-wrap: wrap;

        gap: 10px;

        margin-bottom: 14px;
    }

    .sch-info-chip {

        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 8px 11px;

        border-radius: 11px;

        background: #f8fafc;

        border:
            1px solid
            #e2e8f0;

        color: #334155;

        font-size: .74rem;

        font-weight: 650;

        line-height: 1;

        transition: .25s ease;
    }

    .sch-card:hover
    .sch-info-chip {

        background:
            var(
                --sch-chip-bg,
                #ecfdf5
            );

        border-color: transparent;

        color:
            var(
                --sch-chip-color,
                #047857
            );
    }

    .sch-info-chip i {
        font-size: .7rem;
        opacity: .85;
    }


    /* DESKRIPSI */

    .sch-desc {

        margin: 0;

        color: #64748b;

        font-size: .84rem;

        line-height: 1.75;

        display: -webkit-box;

        -webkit-line-clamp: 3;

        -webkit-box-orient: vertical;

        overflow: hidden;
    }


    /* =====================================================
       INFO BOX
    ===================================================== */

    .jadwal-info {

        position: relative;

        overflow: hidden;

        display: flex;

        align-items: flex-start;

        gap: 20px;

        margin-top: 50px;

        padding: 26px 28px;

        border-radius: 22px;

        background:
            linear-gradient(
                135deg,
                #eff6ff 0%,
                #f0fdf4 100%
            );

        border:
            1px solid
            #bfdbfe;

        box-shadow:
            0 14px 34px
            rgba(37,99,235,.08);
    }

    .jadwal-info::before {

        content: "";

        position: absolute;

        top: 0;
        left: 0;
        right: 0;

        height: 4px;

        background:
            linear-gradient(
                90deg,
                #2563eb,
                #10b981,
                #8b5cf6
            );
    }

    .jadwal-info::after {

        content: "";

        position: absolute;

        width: 220px;
        height: 220px;

        border-radius: 50%;

        background:
            radial-gradient(
                circle,
                rgba(16,185,129,.12) 0%,
                transparent 70%
            );

        right: -90px;
        bottom: -130px;
    }

    .jadwal-info-icon {

        position: relative;

        z-index: 2;

        flex: 0 0 54px;

        width: 54px;
        height: 54px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 16px;

        background:
            linear-gradient(
                135deg,
                #fff 0%,
                #eff6ff 100%
            );

        color: #2563eb;

        font-size: 1.35rem;

        box-shadow:
            0 8px 22px
            rgba(37,99,235,.12);
    }

    .jadwal-info-content {

        position: relative;

        z-index: 2;
    }

    .jadwal-info-title {

        margin:
            2px
            0
            8px;

        color: #1d4ed8;

        font-size: .98rem;

        font-weight: 850;
    }

    .jadwal-info-text {

        margin: 0;

        color: #475569;

        font-size: .86rem;

        line-height: 1.82;
    }


    /* =====================================================
       EMPTY STATE
    ===================================================== */

    .jadwal-empty {

        grid-column: 1 / -1;

        padding: 65px 30px;

        text-align: center;

        background: #fff;

        border:
            1px dashed
            #a7f3d0;

        border-radius: 24px;

        box-shadow:
            0 12px 36px
            rgba(15,23,42,.05);

        position: relative;

        overflow: hidden;
    }

    .jadwal-empty::before {

        content: "";

        position: absolute;

        inset: 0;

        background:
            radial-gradient(
                circle at 20% 30%,
                rgba(16,185,129,.07) 0%,
                transparent 45%
            ),

            radial-gradient(
                circle at 80% 70%,
                rgba(59,130,246,.06) 0%,
                transparent 45%
            );
    }

    .jadwal-empty-icon {

        width: 78px;
        height: 78px;

        margin:
            0
            auto
            22px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 22px;

        background:
            linear-gradient(
                135deg,
                #ecfdf5,
                #dbeafe
            );

        color: #059669;

        font-size: 1.95rem;

        box-shadow:
            0 10px 25px
            rgba(16,185,129,.12);

        position: relative;
    }

    .jadwal-empty h5 {

        margin-bottom: 10px;

        color: #0f172a;

        font-weight: 800;

        font-size: 1.1rem;

        position: relative;
    }

    .jadwal-empty p {

        max-width: 470px;

        margin: auto;

        color: #64748b;

        font-size: .9rem;

        line-height: 1.78;

        position: relative;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 1100px) {

        .schedule-grid {

            grid-template-columns:
                repeat(
                    2,
                    minmax(0,1fr)
                );

            gap: 22px;
        }

        .sch-img,
        .sch-placeholder {

            height: 195px !important;

            max-height: 195px !important;

            min-height: 195px !important;
        }
    }


    @media (max-width: 768px) {

        .jadwal-hero {

            padding:
                52px
                0
                48px;
        }

        .jadwal-hero h1 {
            font-size: 2.1rem;
        }

        .jadwal-hero p {
            font-size: .94rem;
        }

        .jadwal-content {

            padding:
                48px
                0
                68px;
        }

        .schedule-grid {
            gap: 18px;
        }

        .sch-img,
        .sch-placeholder {

            height: 200px !important;

            max-height: 200px !important;

            min-height: 200px !important;
        }

        .sch-info-row {
            gap: 9px;
        }

        .jadwal-info {

            margin-top: 38px;

            padding: 22px;

            gap: 15px;
        }

        .jadwal-info-icon {

            flex-basis: 48px;

            width: 48px;

            height: 48px;

            font-size: 1.15rem;
        }
    }


    @media (max-width: 575px) {

        .schedule-grid {

            grid-template-columns: 1fr;

            gap: 18px;
        }

        .sch-img,
        .sch-placeholder {

            height: 215px !important;

            max-height: 215px !important;

            min-height: 215px !important;
        }

        .sch-head {

            padding:
                18px
                19px
                0 !important;
        }

        .sch-body {

            padding:
                0
                19px
                20px !important;
        }

        .jadwal-intro {
            margin-bottom: 30px;
        }

        .jadwal-empty {
            padding: 55px 22px;
        }
    }
</style>


<div class="jadwal-page">

    {{-- =================================================
         HERO
    ================================================== --}}
    <section class="jadwal-hero">

        <div class="wrap-container">

            <div class="jadwal-crumb">

                <a href="{{ route('home') }}">

                    <i class="bi bi-house-fill me-1"></i>

                    Beranda

                </a>

                <i class="bi bi-chevron-right"></i>

                <span class="active">
                    Jadwal
                </span>

            </div>

            <h1>
                Jadwal Kegiatan Rutin
            </h1>

            <p>
                Agenda kegiatan mingguan yang rutin diadakan
                untuk seluruh warga Dusun Jlegongan.
            </p>

        </div>

    </section>


    {{-- =================================================
         CONTENT
    ================================================== --}}
    <section class="jadwal-content">

        <div class="wrap-container">

            <div class="jadwal-intro">

                <span class="jadwal-eyebrow">

                    <i class="bi bi-calendar-week"></i>

                    AGENDA WARGA

                </span>

                <h2 class="jadwal-title">
                    Jadwal Mingguan
                </h2>

                <p class="jadwal-subtitle">
                    Lihat jadwal kegiatan rutin masyarakat
                    Dusun Jlegongan setiap minggunya.
                </p>

            </div>


            {{-- =================================================
                 SCHEDULE GRID
            ================================================== --}}
            <div class="schedule-grid">

                @foreach($jadwal as $item)

                    @php

                        /*
                         * VALIDASI GAMBAR
                         */

                        $imgValid =
                            !empty($item->image)
                            &&
                            $item->image !== "null"
                            &&
                            trim($item->image) !== "";

                        if ($imgValid) {

                            try {

                                $imgValid =
                                    Storage::disk('public')
                                    ->exists(
                                        trim(
                                            $item->image,
                                            '/'
                                        )
                                    );

                            } catch (\Exception $e) {

                                $imgValid = false;

                            }

                        }


                        /*
                         * FALLBACK JAM
                         */

                        $timeText = "";

                        if (
                            !empty($item->time)
                            &&
                            $item->time !== "null"
                        ) {

                            $timeText =
                                trim($item->time);

                        } elseif (
                            !empty($item->start_time)
                        ) {

                            $timeText =
                                substr(
                                    $item->start_time,
                                    0,
                                    5
                                );

                            if (
                                !empty($item->end_time)
                            ) {

                                $timeText .=
                                    " – "
                                    .
                                    substr(
                                        $item->end_time,
                                        0,
                                        5
                                    );
                            }
                        }

                        if (
                            empty($timeText)
                        ) {

                            $timeText =
                                "Lihat Pengumuman";
                        }


                        /*
                         * FALLBACK LOKASI
                         */

                        $locText =
                            trim(
                                $item->location ?? ""
                            );

                        if (
                            empty($locText)
                            ||
                            $locText === "null"
                        ) {

                            $locText =
                                "Dusun Jlegongan";
                        }


                        /*
                         * ICON KEGIATAN
                         */

                        $iconMap = [

                            "pengajian"
                                => "bi-moon-stars-fill",

                            "karang"
                                => "bi-people-fill",

                            "taruna"
                                => "bi-people-fill",

                            "posyandu"
                                => "bi-heart-pulse-fill",

                            "arisan"
                                => "bi-people-fill",

                            "gotong"
                                => "bi-houses-fill",

                            "royong"
                                => "bi-houses-fill",

                            "olahraga"
                                => "bi-trophy-fill",

                            "tpa"
                                => "bi-book-half",

                        ];

                        $actIcon =
                            "bi-calendar-event-fill";

                        $nameLow =
                            mb_strtolower(
                                $item->name ?? ""
                            );

                        foreach (
                            $iconMap
                            as $kw => $ic
                        ) {

                            if (
                                str_contains(
                                    $nameLow,
                                    $kw
                                )
                            ) {

                                $actIcon = $ic;

                                break;
                            }
                        }

                    @endphp


                    {{-- CARD --}}
                    <div
                        class="
                            sch-card
                            @if(!$imgValid) no-image @endif
                        "
                        data-day="{{ $item->day }}"
                    >


                        {{-- =================================================
                             FOTO / PLACEHOLDER
                        ================================================== --}}

                        @if($imgValid)

                            <div class="sch-img">

                                <span class="chip-day-glass">

                                    <i class="bi bi-calendar3"></i>

                                    {{ $item->day }}

                                </span>

                                <img
                                    src="{{ asset('storage/' . ltrim($item->image, '/')) }}"
                                    alt="{{ $item->name }}"
                                    loading="lazy"
                                    onerror="this.style.display='none'"
                                >

                            </div>

                        @else

                            <div class="sch-placeholder">

                                <span class="chip-day-glass">

                                    <i class="bi bi-calendar3"></i>

                                    {{ $item->day }}

                                </span>

                                <i
                                    class="bi {{ $actIcon }}"
                                ></i>

                            </div>

                        @endif


                        {{-- =================================================
                             NAMA KEGIATAN
                        ================================================== --}}

                        <div class="sch-head">

                            <h6 class="sch-name">

                                {{ $item->name }}

                            </h6>

                        </div>


                        {{-- =================================================
                             INFORMASI
                        ================================================== --}}

                        <div class="sch-body">

                            <div class="sch-info-row">

                                <span class="sch-info-chip">

                                    <i class="bi bi-clock-fill"></i>

                                    {{ $timeText }}

                                </span>


                                <span class="sch-info-chip">

                                    <i class="bi bi-geo-alt-fill"></i>

                                    {{ $locText }}

                                </span>

                            </div>


                            @php

                                $desc =
                                    trim(
                                        $item->description ?? ""
                                    );

                                $descOk =
                                    !empty($desc)
                                    &&
                                    $desc !== "null";

                            @endphp


                            @if($descOk)

                                <p class="sch-desc">
                                    {{ $desc }}
                                </p>

                            @else

                                <p class="sch-desc">

                                    Kegiatan rutin masyarakat
                                    Dusun Jlegongan untuk
                                    meningkatkan kebersamaan
                                    dan kesejahteraan warga.

                                </p>

                            @endif

                        </div>

                    </div>

                @endforeach


                {{-- =================================================
                     EMPTY STATE
                ================================================== --}}

                @if($jadwal->isEmpty())

                    <div class="jadwal-empty">

                        <div class="jadwal-empty-icon">

                            <i class="bi bi-calendar-x"></i>

                        </div>

                        <h5>
                            Belum Ada Jadwal
                        </h5>

                        <p>

                            Data jadwal kegiatan rutin
                            akan segera ditambahkan oleh admin.
                            Silakan kembali lagi nanti.

                        </p>

                    </div>

                @endif

            </div>


            {{-- =================================================
                 INFO CATATAN
            ================================================== --}}

            <div class="jadwal-info">

                <div class="jadwal-info-icon">

                    <i class="bi bi-info-circle-fill"></i>

                </div>

                <div class="jadwal-info-content">

                    <h6 class="jadwal-info-title">
                        Catatan Penting
                    </h6>

                    <p class="jadwal-info-text">

                        Jadwal di atas adalah jadwal rutin normal.
                        Untuk perubahan mendadak, penjadwalan
                        kegiatan khusus, atau libur panjang,
                        silakan menghubungi pengurus RT/RW setempat
                        atau melihat langsung di papan pengumuman
                        depan Rumah Hibah.

                    </p>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection
```
