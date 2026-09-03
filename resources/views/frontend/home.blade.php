@extends('layouts.frontend')
@section('title', 'Beranda')

@section('content')

{{-- 1. HERO PREMIUM 2 KOL --}}
<section class="hero-section">
    <div class="wrap-container">
        <div class="row align-items-center gx-5 gy-5">
            <div class="col-lg-6">
                <span class="hero-eyebrow">
                    <i class="bi bi-geo-alt-fill me-1"></i>
                    PROFIL DUSUN JLEGONGAN &mdash; Sleman, DIY
                </span>
                <h1 class="hero-title mt-3 mb-4">
                    Selamat Datang di<br>
                    <span>Dusun Jlegongan</span>
                </h1>
                <p class="hero-desc mb-5">
                    Dusun yang kaya akan nilai toleransi, gotong royong, dan kebhinekaan. 
                    Mari jelajahi keindahan alam, potensi warga, serta keramahan penduduk Dusun Jlegongan.
                </p>
                <div class="hero-cta">
                    <a href="#kegiatan" class="btn btn-primary btn-lg">
                        <i class="bi bi-compass me-2"></i> Jelajahi Dusun
                    </a>
                    <a href="{{ route('sejarah') }}" class="btn btn-outline btn-lg">
                        <i class="bi bi-book me-2"></i> Lihat Profil
                    </a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hero-img-wrap">
                    <span class="d-shape-1"></span>
                    <span class="d-shape-2"></span>

                    <div class="hero-img">
                        @if($berandaHero && $berandaHero->image)
                            <img src="{{ asset('storage/' . ltrim($berandaHero->image, '/')) }}"
                                 alt="Dusun Jlegongan"
                                 onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'d-flex align-items-center justify-content-center h-100 text-white fs-4 text-center p-4 flex-column gap-3\'><div style=\'width:90px;height:90px;border-radius:24px;background:linear-gradient(135deg,#ffffff 0%,#fde68a 50%,#f59e0b 100%);color:#064e3b;font-weight:900;display:flex;align-items:center;justify-content:center;font-size:2.2rem;box-shadow:0 8px 24px rgba(0,0,0,0.2);\'>DJ</div><div><div class=\'fw-bold fs-2\'>Dusun Jlegongan</div><small class=\'opacity-75 fs-5\'>Kal. Margodadi, Kec. Seyegan, Sleman</small></div></div>'">
                        @elseif($geografis && $geografis->image)
                            <img src="{{ asset('storage/' . ltrim($geografis->image, '/')) }}"
                                 alt="Dusun Jlegongan"
                                 onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'d-flex align-items-center justify-content-center h-100 text-white fs-4 text-center p-4 flex-column gap-3\'><div style=\'width:90px;height:90px;border-radius:24px;background:linear-gradient(135deg,#ffffff 0%,#fde68a 50%,#f59e0b 100%);color:#064e3b;font-weight:900;display:flex;align-items:center;justify-content:center;font-size:2.2rem;box-shadow:0 8px 24px rgba(0,0,0,0.2);\'>DJ</div><div><div class=\'fw-bold fs-2\'>Dusun Jlegongan</div><small class=\'opacity-75 fs-5\'>Kal. Margodadi, Kec. Seyegan, Sleman</small></div></div>'">
                        @else
                            <div class="d-flex align-items-center justify-content-center h-100 text-white text-center p-4 flex-column gap-3">
                                <div style="width:90px;height:90px;border-radius:24px;background:linear-gradient(135deg,#ffffff 0%,#fde68a 50%,#f59e0b 100%);color:#064e3b;font-weight:900;display:flex;align-items:center;justify-content:center;font-size:2.2rem;box-shadow:0 8px 24px rgba(0,0,0,0.2);">DJ</div>
                                <div>
                                    <div class="fw-bold fs-2">Dusun Jlegongan</div>
                                    <small class="opacity-75 fs-5">Kal. Margodadi, Kec. Seyegan, Sleman</small>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="float-card float-1">
                        <div class="float-ic"><i class="bi bi-people-fill"></i></div>
                        <div>
                            <div class="float-num">{{ $totalPenduduk }}+</div>
                            <div class="float-lbl">Warga Penduduk</div>
                        </div>
                    </div>

                    <div class="float-card float-2">
                        <div class="float-ic" style="background:#ecfdf5;color:#059669;"><i class="bi bi-calendar-event-fill"></i></div>
                        <div>
                            <div class="float-num">{{ $jumlahKegiatan }}+</div>
                            <div class="float-lbl">Kegiatan Aktif</div>
                        </div>
                    </div>

                    <div class="float-card float-3">
                        <div class="float-ic" style="background:#fdf2f8;color:#be185d;"><i class="bi bi-gender-female"></i></div>
                        <div>
                            <div class="float-num">{{ $jumlahPerempuan }}</div>
                            <div class="float-lbl">Perempuan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 2. STATISTIK DUSUN 4 CARD --}}
<section style="position: relative; z-index: 10;">
    <div class="wrap-container">
        <div class="stats-wrap">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="stat-single">
                        <div class="stat-ic" style="background:#ecfdf5;color:#059669;">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="stat-num">{{ $totalPenduduk }}</div>
                        <div class="stat-lbl">Total Penduduk</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-single">
                        <div class="stat-ic" style="background:#eff6ff;color:#2563eb;">
                            <i class="bi bi-gender-male"></i>
                        </div>
                        <div class="stat-num">{{ $jumlahLaki }}</div>
                        <div class="stat-lbl">Laki-laki</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-single">
                        <div class="stat-ic" style="background:#fdf2f8;color:#db2777;">
                            <i class="bi bi-gender-female"></i>
                        </div>
                        <div class="stat-num">{{ $jumlahPerempuan }}</div>
                        <div class="stat-lbl">Perempuan</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-single">
                        <div class="stat-ic" style="background:#fffbeb;color:#d97706;">
                            <i class="bi bi-calendar2-check-fill"></i>
                        </div>
                        <div class="stat-num">{{ $jumlahKegiatan }}</div>
                        <div class="stat-lbl">Jumlah Kegiatan</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 3. MENGENAL DUSUN (PROFIL) --}}
<section class="section">
    <div class="wrap-container">
        <div class="sec-head text-center mb-5">
            <span class="eyebrow">TENTANG KAMI</span>
            <h2 class="sec-title">Mengenal Dusun Jlegongan</h2>
            <p class="sec-sub">Dusun kecil dengan segudang cerita, nilai luhur, dan potensi masyarakat yang menginspirasi.</p>
        </div>

        <div class="about-grid">
            <div class="about-photo">
                <span class="about-accent" style="border-width: 2px; border-color: var(--accent); opacity: 0.4; top: -16px; left: -16px; border-radius: calc(var(--radius-lg) + 4px);"></span>
                <div class="about-img" style="border: 3px solid rgba(255,255,255,0.9); box-shadow: 0 16px 48px rgba(15,23,42,0.12), 0 0 0 1px rgba(6,95,70,0.08);">
                    @if($sejarah && $sejarah->image)
                        <img src="{{ asset('storage/' . ltrim($sejarah->image, '/')) }}"
                             alt="Profil Dusun Jlegongan"
                             onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'d-flex align-items-center justify-content-center h-100 p-4 text-center flex-column gap-3\' style=\'background:linear-gradient(135deg,#d1fae5 0%,#a7f3d0 100%);\'><i class=\'bi bi-house-heart\' style=\'font-size:68px;color:#065f46;\'></i><div><div class=\'fw-bold fs-3\' style=\'color:#064e3b;\'>Dusun Jlegongan</div><small style=\'color:#047857;\' class=\'fs-6\'>Rumah bagi kerukunan dan kebersamaan</small></div></div>'">
                    @elseif($geografis && $geografis->image)
                        <img src="{{ asset('storage/' . ltrim($geografis->image, '/')) }}"
                             alt="Profil Dusun Jlegongan"
                             onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'d-flex align-items-center justify-content-center h-100 p-4 text-center flex-column gap-3\' style=\'background:linear-gradient(135deg,#d1fae5 0%,#a7f3d0 100%);\'><i class=\'bi bi-house-heart\' style=\'font-size:68px;color:#065f46;\'></i><div><div class=\'fw-bold fs-3\' style=\'color:#064e3b;\'>Dusun Jlegongan</div><small style=\'color:#047857;\' class=\'fs-6\'>Rumah bagi kerukunan dan kebersamaan</small></div></div>'">
                    @else
                        <div class="d-flex align-items-center justify-content-center h-100 p-4 text-center flex-column gap-3" style="background:linear-gradient(135deg,#d1fae5 0%,#a7f3d0 100%);">
                            <i class="bi bi-house-heart" style="font-size:68px;color:#065f46;"></i>
                            <div>
                                <div class="fw-bold fs-3" style="color:#064e3b;">Dusun Jlegongan</div>
                                <small style="color:#047857;" class="fs-6">Rumah bagi kerukunan dan kebersamaan</small>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="about-stamp">
                    <i class="bi bi-award-fill text-amber"></i>
                    <div>
                        <b>Sejak berdiri</b>
                        <small>Dusun yang asri dan harmonis</small>
                    </div>
                </div>
            </div>

            <div class="about-text">
                <h3 class="about-title">Harmoni dalam Kebhinekaan, Asri di Atas Bumi Subur</h3>
                <p class="mb-4 text-muted" style="line-height:1.8;">
                    {{ $sejarah && $sejarah->description ? Str::limit(strip_tags($sejarah->description), 380) : 'Dusun Jlegongan terletak di Kalurahan Margodadi, Kecamatan Seyegan, Kabupaten Sleman, D.I. Yogyakarta. Sejarah panjang dusun ini dimulai dari para leluhur yang memilih lokasi strategis di kaki lereng dengan aliran sungai yang jernih, menjadikannya pemukiman yang nyaman dan subur sejak zaman dahulu.' }}
                </p>

                <div class="about-check-wrap">
                    <div class="about-check"><i class="bi bi-check-circle-fill"></i> Toleransi tinggi antar warga</div>
                    <div class="about-check"><i class="bi bi-check-circle-fill"></i> Budaya gotong royong yang kuat</div>
                    <div class="about-check"><i class="bi bi-check-circle-fill"></i> Lahan pertanian yang subur</div>
                    <div class="about-check"><i class="bi bi-check-circle-fill"></i> Keramahan warga yang tulus</div>
                </div>

                <div class="mt-5">
                    <a href="{{ route('sejarah') }}" class="btn btn-primary">
                        <i class="bi bi-book me-2"></i> Baca Sejarah Lengkap
                    </a>
                    <a href="{{ route('geografis') }}" class="btn btn-outline ms-2">
                        <i class="bi bi-geo-alt me-2"></i> Lihat Letak Geografis
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 4. KEPENDUDUKAN PREVIEW --}}
<section class="section-sm section-alt">
    <div class="wrap-container">
        <div class="sec-head text-center mb-5">
            <span class="eyebrow">DATA KEPENDUDUKAN</span>
            <h2 class="sec-title">Komposisi Penduduk Dusun</h2>
            <p class="sec-sub">Data agregat kependudukan sebagai gambaran struktur usia &amp; jenis kelamin warga.</p>
        </div>

        <div class="demographic-main">
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="mini-stat mini-emerald">
                        <i class="bi bi-people-fill"></i>
                        <div>
                            <div class="mini-num">{{ $totalPenduduk }}</div>
                            <div class="mini-lbl">Total Penduduk</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mini-stat mini-blue">
                        <i class="bi bi-gender-male"></i>
                        <div>
                            <div class="mini-num">{{ $jumlahLaki }}</div>
                            <div class="mini-lbl">Laki-laki</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mini-stat mini-pink">
                        <i class="bi bi-gender-female"></i>
                        <div>
                            <div class="mini-num">{{ $jumlahPerempuan }}</div>
                            <div class="mini-lbl">Perempuan</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="age-head mb-4">
                <h6 class="mb-0 fw-bold"><i class="bi bi-bar-chart-fill me-2 text-emerald"></i>Persebaran Kelompok Usia</h6>
            </div>
            <div class="age-bars">
                @if($ageStatistics && count($ageStatistics))
                    @php $maxAge = $ageStatistics->max('count') ?: 1; @endphp
                    @foreach($ageStatistics as $age)
                    <div class="age-row">
                        <div class="age-label">{{ $age->subcategory }} <span>({{ $age->count }})</span></div>
                        <div class="age-track">
                            <div class="age-fill" style="width: {{ min(100, round(($age->count / $maxAge) * 100, 1)) }}%"></div>
                        </div>
                    </div>
                    @endforeach
                @else
                    @foreach(['0-12','13-17','18-25','26-40','41-55','56-65','65+'] as $i => $grp)
                    <div class="age-row">
                        <div class="age-label">{{ $grp }} <span>({{ rand(35,220) }})</span></div>
                        <div class="age-track"><div class="age-fill" style="width: {{ rand(35,95) }}%"></div></div>
                    </div>
                    @endforeach
                @endif
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('kependudukan') }}" class="btn btn-outline btn-lg">
                    Lihat Data Kependudukan Lengkap <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>


{{-- =========================================================
     5. KEGIATAN MASYARAKAT
========================================================= --}}

<style>
    /* Kegiatan */
    .kegiatan-section {
        position: relative;
    }

    .kegiatan-card {
        height: 100%;
        overflow: hidden;
        background: #fff;
        border: 1px solid #e8eef0;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, .06);
        transition: all .3s ease;
    }

    .kegiatan-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 18px 40px rgba(15, 23, 42, .11);
        border-color: #d1fae5;
    }

    /* FOTO */
    .kegiatan-photo {
        position: relative;
        width: 100%;
        height: 185px;
        overflow: hidden;
        background: #ecfdf5;
    }

    .kegiatan-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .5s ease;
    }

    .kegiatan-card:hover .kegiatan-photo img {
        transform: scale(1.06);
    }

    /* GRADIENT FOTO */
    .kegiatan-photo::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 70px;
        background: linear-gradient(
            to top,
            rgba(0,0,0,.25),
            transparent
        );
        pointer-events: none;
    }

    /* KATEGORI */
    .kegiatan-category {
        position: absolute;
        z-index: 2;
        top: 13px;
        left: 13px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 11px;
        border-radius: 50px;
        background: rgba(255,255,255,.95);
        color: #047857;
        font-size: .7rem;
        font-weight: 750;
        box-shadow: 0 5px 15px rgba(0,0,0,.12);
    }

    /* ICON KETIKA TIDAK ADA FOTO */
    .kegiatan-placeholder {
        width: 100%;
        height: 185px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        background: linear-gradient(
            135deg,
            #ecfdf5 0%,
            #d1fae5 100%
        );
        color: #059669;
    }

    .kegiatan-placeholder i {
        font-size: 48px;
        opacity: .55;
    }

    .kegiatan-placeholder .kegiatan-category {
        top: 13px;
        left: 13px;
    }

    /* BODY */
    .kegiatan-body {
        padding: 20px 20px 21px;
    }

    .kegiatan-title {
        margin: 0 0 8px;
        color: #0f172a;
        font-size: 1rem;
        line-height: 1.45;
        font-weight: 750;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .kegiatan-desc {
        margin: 0;
        color: #64748b;
        font-size: .83rem;
        line-height: 1.65;

        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* BUTTON */
    .kegiatan-more {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 15px;
        color: #047857;
        font-size: .78rem;
        font-weight: 700;
        text-decoration: none;
        transition: .2s;
    }

    .kegiatan-more i {
        transition: transform .2s ease;
    }

    .kegiatan-more:hover {
        color: #065f46;
    }

    .kegiatan-more:hover i {
        transform: translateX(4px);
    }

    /* RESPONSIVE */
    @media (max-width: 991px) {
        .kegiatan-photo,
        .kegiatan-placeholder {
            height: 190px;
        }
    }

    @media (max-width: 575px) {
        .kegiatan-photo,
        .kegiatan-placeholder {
            height: 200px;
        }

        .kegiatan-body {
            padding: 17px;
        }

        .kegiatan-title {
            font-size: .95rem;
        }

        .kegiatan-desc {
            font-size: .8rem;
        }
    }
</style>


<section id="kegiatan" class="section kegiatan-section">

    <div class="wrap-container">

        {{-- HEADER --}}
        <div class="sec-head text-center mb-5">

            <span class="eyebrow">
                AKTIVITAS WARGA
            </span>

            <h2 class="sec-title">
                Semangat Masyarakat Jlegongan
            </h2>

            <p class="sec-sub">
                Berbagai kegiatan positif yang rutin diadakan
                untuk kebersamaan dan kesejahteraan bersama.
            </p>

        </div>


        {{-- CARD --}}
        <div class="row g-4">

            @forelse($kegiatan as $item)

                <div class="col-12 col-sm-6 col-lg-3">

                    <div class="kegiatan-card">

                        {{-- FOTO --}}
                        @if($item->image)

                            <div class="kegiatan-photo">

                                <span class="kegiatan-category">
                                    <i class="bi bi-calendar-event-fill"></i>
                                    {{ $item->category }}
                                </span>

                                <img
                                    src="{{ asset('storage/' . ltrim($item->image, '/')) }}"
                                    alt="{{ $item->name }}"
                                    loading="lazy"
                                    onerror="this.style.display='none'; this.parentElement.innerHTML='<span class=\'kegiatan-category\'><i class=\'bi bi-calendar-event-fill\'></i>{{ addslashes($item->category) }}</span><div class=\'d-flex align-items-center justify-content-center h-100\' style=\'background:linear-gradient(135deg,#ecfdf5,#d1fae5);\'><i class=\'bi bi-calendar-event-fill\' style=\'font-size:48px;opacity:.55;color:#059669;\'></i></div>'"
                                >

                            </div>

                        @else

                            <div class="kegiatan-placeholder">

                                <span class="kegiatan-category">
                                    <i class="bi bi-calendar-event-fill"></i>
                                    {{ $item->category }}
                                </span>

                                <i class="bi bi-calendar-event-fill"></i>

                            </div>

                        @endif


                        {{-- BODY --}}
                        <div class="kegiatan-body">

                            <h5 class="kegiatan-title">
                                {{ $item->name }}
                            </h5>

                            @if($item->description)

                                <p class="kegiatan-desc">
                                    {{ Str::limit(strip_tags($item->description), 110) }}
                                </p>

                            @else

                                <p class="kegiatan-desc">
                                    Kegiatan masyarakat Dusun Jlegongan
                                    yang dilaksanakan secara rutin.
                                </p>

                            @endif

                            <a
                                href="{{ route('kegiatan') }}"
                                class="kegiatan-more"
                            >
                                Lihat kegiatan
                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div
                        class="text-center py-5"
                        style="
                            background:#fff;
                            border-radius:20px;
                            border:1px solid #e8eef0;
                        "
                    >

                        <i
                            class="bi bi-calendar-x"
                            style="
                                font-size:45px;
                                color:#94a3b8;
                            "
                        ></i>

                        <h5 class="mt-3 mb-1 fw-bold">
                            Belum ada kegiatan
                        </h5>

                        <p class="text-muted mb-0">
                            Data kegiatan masyarakat belum tersedia.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- BUTTON --}}
        @if(count($kegiatan) > 0)

            <div class="text-center mt-5">

                <a
                    href="{{ route('kegiatan') }}"
                    class="btn btn-outline btn-lg"
                >
                    Lihat Semua Kegiatan
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>

        @endif

    </div>

</section>
```


{{-- 6. FASILITAS DUSUN 3 CARD FOTO FOKUS --}}
<section class="section-sm section-alt">
    <div class="wrap-container">
        <div class="sec-head text-center mb-5">
            <span class="eyebrow">INFRASTRUKTUR</span>
            <h2 class="sec-title">Fasilitas yang Mendukung Warga</h2>
            <p class="sec-sub">Fasilitas umum yang tersedia untuk menunjang aktivitas sehari-hari masyarakat.</p>
        </div>

        <div class="row g-4">
            @foreach($fasilitas as $item)
            <div class="col-md-6 col-lg-4">
                <div class="fac-card h-100">
                    <div class="fac-photo">
                        @if($item->image)
                            <img src="{{ asset('storage/' . ltrim($item->image, '/')) }}"
                                 alt="{{ $item->name }}"
                                 onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'d-flex align-items-center justify-content-center h-100\' style=\'background:linear-gradient(135deg,#d1fae5,#a7f3d0);\'><i class=\'bi bi-building\' style=\'font-size:72px;color:#065f46;\'></i></div>'">
                        @else
                            <div class="d-flex align-items-center justify-content-center h-100" style="background:linear-gradient(135deg,#d1fae5,#a7f3d0);">
                                <i class="bi bi-building" style="font-size:72px;color:#065f46;"></i>
                            </div>
                        @endif
                        <span class="overlay-ic"><i class="bi bi-building-fill"></i></span>
                        @if($item->schedule && str_contains(strtolower($item->name), strtolower('TPA')))
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
                        <p class="fac-desc">{{ Str::limit($item->description, 130) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('fasilitas') }}" class="btn btn-outline btn-lg">
                Lihat Detail Fasilitas <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

{{-- 7. POTENSI DUSUN FEATURED + SITASI MOJOK --}}

<section class="section potensi-home-section">
    <div class="wrap-container">

        <style>
            /* =====================================================
               POTENSI HOMEPAGE
            ===================================================== */

            .potensi-home-section {
                background: #f8fafc;
            }

            .potensi-home-head {
                max-width: 720px;
                margin: 0 auto 42px;
            }

            .potensi-home-head .eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                margin-bottom: 10px;
                padding: 7px 12px;
                border-radius: 50px;
                background: #ecfdf5;
                color: #047857;
                font-size: .7rem;
                font-weight: 800;
                letter-spacing: .3px;
            }

            .potensi-home-head .sec-title {
                margin-bottom: 10px;
            }

            .potensi-home-head .sec-sub {
                max-width: 650px;
                margin: auto;
            }


            /* =====================================================
               CARD DASAR
            ===================================================== */

            .poten-card {
                position: relative;
                height: 100%;
                overflow: hidden;

                padding: 0;

                background: #fff;
                border: 1px solid #e7edef;
                border-radius: 21px;

                box-shadow: 0 8px 25px rgba(15,23,42,.055);

                transition:
                    transform .3s ease,
                    box-shadow .3s ease,
                    border-color .3s ease;
            }

            .poten-card:hover {
                transform: translateY(-6px);
                border-color: #c7eadb;
                box-shadow: 0 18px 42px rgba(15,23,42,.10);
            }


            /* =====================================================
               FEATURED CARD
            ===================================================== */

            .poten-card.featured {
                display: flex;
                flex-direction: column;

                padding: 0 27px 27px;

                background:
                    linear-gradient(
                        145deg,
                        #064e3b 0%,
                        #047857 58%,
                        #059669 100%
                    );

                border: 0;
                color: #fff;

                box-shadow:
                    0 18px 45px rgba(4,120,87,.17);
            }

            .poten-card.featured::before {
                content: "";
                position: absolute;

                width: 260px;
                height: 260px;

                border-radius: 50%;

                background: rgba(255,255,255,.045);

                top: -145px;
                right: -90px;

                pointer-events: none;
            }

            .poten-card.featured::after {
                content: "";
                position: absolute;

                width: 160px;
                height: 160px;

                border-radius: 50%;

                background: rgba(255,255,255,.035);

                bottom: -90px;
                left: -70px;

                pointer-events: none;
            }


            /* =====================================================
               FEATURED IMAGE
            ===================================================== */

            .poten-card.featured .poten-card-img {
                position: relative;

                width: calc(100% + 54px);
                height: 225px;

                margin-left: -27px;
                margin-bottom: 22px;

                overflow: hidden;
            }

            .poten-card.featured .poten-card-img::after {
                content: "";
                position: absolute;
                inset: auto 0 0;

                height: 85px;

                background: linear-gradient(
                    to top,
                    rgba(0,0,0,.38),
                    transparent
                );
            }

            .poten-card.featured .poten-card-img img {
                width: 100%;
                height: 100%;

                display: block;

                object-fit: cover;

                transition: transform .5s ease;
            }

            .poten-card.featured:hover .poten-card-img img {
                transform: scale(1.05);
            }


            /* =====================================================
               FEATURED ICON
            ===================================================== */

            .poten-card.featured .poten-ic {
                position: relative;
                z-index: 2;

                width: 48px;
                height: 48px;

                margin-bottom: 13px;

                display: flex;
                align-items: center;
                justify-content: center;

                border-radius: 14px;

                background: rgba(255,255,255,.12);
                color: #fff;

                border: 1px solid rgba(255,255,255,.12);

                font-size: 1.2rem;
            }


            /* =====================================================
               FEATURED CHIP
            ===================================================== */

            .chip-light {
                position: relative;
                z-index: 2;

                display: inline-flex;
                align-items: center;

                width: fit-content;

                padding: 7px 11px;

                border-radius: 50px;

                background: rgba(255,255,255,.12);
                color: #fff;

                border: 1px solid rgba(255,255,255,.12);

                font-size: .68rem;
                font-weight: 750;
            }


            /* =====================================================
               TEXT FEATURED
            ===================================================== */

            .poten-card.featured .poten-title {
                position: relative;
                z-index: 2;

                margin: 0 0 11px;

                color: #fff;

                font-size: 1.35rem;
                line-height: 1.35;

                font-weight: 800;
            }

            .poten-card.featured .poten-desc {
                position: relative;
                z-index: 2;

                margin: 0 0 20px;

                color: rgba(255,255,255,.80);

                font-size: .86rem;
                line-height: 1.75;

                display: -webkit-box;
                -webkit-line-clamp: 5;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }


            /* =====================================================
               SOURCE
            ===================================================== */

            .poten-card .src {
                position: relative;
                z-index: 2;

                display: flex;
                align-items: flex-start;
                gap: 10px;

                margin-top: auto;
                padding: 12px 13px;

                border-radius: 13px;

                background: rgba(255,255,255,.08);
                border: 1px solid rgba(255,255,255,.10);

                color: rgba(255,255,255,.70);

                font-size: .72rem;
                line-height: 1.6;
            }

            .poten-card .src > i {
                margin-top: 3px;
                flex-shrink: 0;
            }

            .poten-card .src b {
                display: block;
                margin-bottom: 2px;
                color: #fff;
            }

            .poten-card .src a {
                color: #d1fae5;
                text-decoration: none;
            }

            .poten-card .src a:hover {
                text-decoration: underline;
            }


            /* =====================================================
               NORMAL CARD IMAGE
            ===================================================== */

            .poten-card:not(.featured) .poten-card-img {
                position: relative;

                width: calc(100% - 28px);
                height: 170px;

                margin: 14px 14px 18px;

                overflow: hidden;

                border-radius: 16px;

                background: #ecfdf5;
            }

            .poten-card:not(.featured) .poten-card-img img {
                width: 100%;
                height: 100%;

                display: block;

                object-fit: cover;

                transition: transform .5s ease;
            }

            .poten-card:not(.featured):hover .poten-card-img img {
                transform: scale(1.055);
            }


            /* =====================================================
               NORMAL CARD ICON
            ===================================================== */

            .poten-card:not(.featured) .poten-ic {
                width: 54px;
                height: 54px;

                margin: 20px 20px 15px;

                display: flex;
                align-items: center;
                justify-content: center;

                border-radius: 15px;

                background: #ecfdf5;
                color: #059669;

                font-size: 1.25rem;
            }


            /* =====================================================
               NORMAL CARD BODY
            ===================================================== */

            .poten-card:not(.featured) .poten-title {
                margin: 0 20px 8px;

                color: #0f172a;

                font-size: 1rem;
                line-height: 1.4;

                font-weight: 750;
            }

            .poten-card:not(.featured) .poten-desc {
                margin: 0 20px 17px;

                color: #64748b;

                font-size: .81rem;
                line-height: 1.7;

                display: -webkit-box;
                -webkit-line-clamp: 4;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }


            /* =====================================================
               MORE BUTTON
            ===================================================== */

            .p-more {
                display: inline-flex;
                align-items: center;
                gap: 7px;

                margin: 0 20px 20px;

                color: #047857;

                font-size: .76rem;
                font-weight: 750;

                text-decoration: none;

                transition: gap .25s ease;
            }

            .p-more i {
                transition: transform .25s ease;
            }

            .p-more:hover {
                color: #065f46;
                gap: 10px;
            }

            .p-more:hover i {
                transform: translateX(2px);
            }


            /* =====================================================
               BOTTOM BUTTON
            ===================================================== */

            .potensi-home-button {
                margin-top: 40px;
            }


            /* =====================================================
               RESPONSIVE
            ===================================================== */

            @media (max-width: 991px) {

                .poten-card.featured {
                    min-height: auto;
                }

                .poten-card.featured .poten-card-img {
                    height: 240px;
                }

                .poten-card:not(.featured) .poten-card-img {
                    height: 185px;
                }

            }


            @media (max-width: 767px) {

                .potensi-home-head {
                    margin-bottom: 30px;
                }

                .poten-card.featured {
                    padding: 0 21px 22px;
                }

                .poten-card.featured .poten-card-img {
                    width: calc(100% + 42px);
                    height: 210px;
                    margin-left: -21px;
                    margin-bottom: 20px;
                }

                .poten-card.featured .poten-title {
                    font-size: 1.2rem;
                }

                .poten-card.featured .poten-desc {
                    font-size: .82rem;
                }

                .poten-card:not(.featured) .poten-card-img {
                    height: 190px;
                }

            }


            @media (max-width: 575px) {

                .poten-card.featured .poten-card-img {
                    height: 200px;
                }

                .poten-card:not(.featured) .poten-card-img {
                    height: 200px;
                }

                .potensi-home-button {
                    margin-top: 30px;
                }

            }
        </style>


        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <div class="potensi-home-head sec-head text-center">

            <span class="eyebrow">
                <i class="bi bi-stars"></i>
                POTENSI UNGGULAN
            </span>

            <h2 class="sec-title">
                Potensi yang Dimiliki Dusun Jlegongan
            </h2>

            <p class="sec-sub">
                Dari pertanian subur hingga toleransi lintas agama
                yang menjadi teladan nasional.
            </p>

        </div>


        {{-- =====================================================
             CARDS
        ====================================================== --}}

        <div class="row g-4">


            {{-- =================================================
                 FEATURED
            ================================================== --}}

            <div class="col-lg-6 col-md-12">

                <div class="poten-card featured h-100">

                    @if(
                        $featuredPotential &&
                        $featuredPotential->image
                    )

                        <div class="poten-card-img">

                            <img
                                src="{{ asset('storage/' . ltrim($featuredPotential->image, '/')) }}"
                                alt="{{ $featuredPotential->title ?? 'Sosial Kemasyarakatan' }}"
                                loading="lazy"
                                onerror="this.parentElement.style.display='none';"
                            >

                        </div>

                    @endif


                    <div class="poten-ic">

                        <i class="bi bi-heart-pulse-fill"></i>

                    </div>


                    <span class="chip chip-light mb-2">

                        <i class="bi bi-star-fill me-1"></i>

                        Unggulan &amp; Teladan

                    </span>


                    <h4 class="poten-title">

                        {{ $featuredPotential->title ?? 'Sosial Kemasyarakatan & Toleransi' }}

                    </h4>


                    <p class="poten-desc">

                        {{
                            $featuredPotential &&
                            $featuredPotential->description
                            ? Str::limit(
                                strip_tags($featuredPotential->description),
                                420
                            )
                            : 'Dusun Jlegongan terkenal dengan kerukunan lintas agama yang luar biasa. Warga Muslim dengan sigap membantu menyiapkan perayaan Natal, dan sebaliknya warga Kristen/Katolik turut bergotong-royong saat Idul Fitri. Doa bersama lintas agama rutin diadakan setiap pergantian tahun sebagai wujud nyata toleransi dan bhineka tunggal ika.'
                        }}

                    </p>


                    <div class="src">

                        <i class="bi bi-newspaper"></i>

                        <div>

                            <b>Sumber Referensi</b>

                            <a
                                href="https://mojok.co/liputan/belajar-toleransi-dari-natal-warga-jlegongan/amp/"
                                target="_blank"
                                rel="noopener"
                            >
                                Mojok.co — Belajar Toleransi dari Natal Warga Jlegongan

                                <i class="bi bi-arrow-up-right ms-1"></i>

                            </a>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 4 POTENSI BIASA
            ================================================== --}}

            @foreach($potensi as $item)

                <div class="col-lg-3 col-md-6">

                    <div class="poten-card h-100">


                        @if($item->image)

                            <div class="poten-card-img">

                                <img
                                    src="{{ asset('storage/' . ltrim($item->image, '/')) }}"
                                    alt="{{ $item->title }}"
                                    loading="lazy"
                                    onerror="this.parentElement.outerHTML='<div class=\'poten-ic\'><i class=\'bi bi-lightbulb-fill\'></i></div>';"
                                >

                            </div>

                        @else

                            <div class="poten-ic">

                                <i class="bi bi-lightbulb-fill"></i>

                            </div>

                        @endif


                        <h5 class="poten-title">

                            {{ $item->title }}

                        </h5>


                        <p class="poten-desc">

                            {{ Str::limit($item->description, 150) }}

                        </p>


                        <a
                            href="{{ route('potensi') }}"
                            class="p-more"
                        >

                            Selengkapnya

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

            @endforeach

        </div>


        {{-- =====================================================
             BUTTON
        ====================================================== --}}

        <div class="text-center potensi-home-button">

            <a
                href="{{ route('potensi') }}"
                class="btn btn-outline btn-lg"
            >

                Jelajahi Semua Potensi

                <i class="bi bi-arrow-right ms-2"></i>

            </a>

        </div>

    </div>
</section>
```


{{-- 8. JADWAL RUTIN CARD TIMELINE --}}

<section class="section-sm section-alt jadwal-home">
    <div class="wrap-container">

        <style>
            /* =====================================================
               JADWAL HOMEPAGE
            ===================================================== */

            .jadwal-home {
                background: #f8fafc;
            }

            .jadwal-home .sec-head {
                max-width: 680px;
                margin-left: auto;
                margin-right: auto;
            }

            .jadwal-home .eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 6px;

                padding: 7px 12px;
                margin-bottom: 10px;

                border-radius: 50px;

                background: #ecfdf5;
                color: #047857;

                font-size: .7rem;
                font-weight: 800;
                letter-spacing: .3px;
            }

            .jadwal-home .sec-title {
                margin-bottom: 9px;
            }

            .jadwal-home .sec-sub {
                margin-bottom: 0;
            }


            /* =====================================================
               GRID
            ===================================================== */

            .jadwal-home .schedule-grid {
                display: grid;
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 20px;
            }


            /* =====================================================
               CARD
            ===================================================== */

            .jadwal-home .sch-card {
                position: relative;
                overflow: hidden;

                min-width: 0;

                background: #fff;
                border: 1px solid #e7edef;
                border-radius: 20px;

                box-shadow: 0 8px 25px rgba(15,23,42,.05);

                transition:
                    transform .3s ease,
                    box-shadow .3s ease,
                    border-color .3s ease;
            }

            .jadwal-home .sch-card:hover {
                transform: translateY(-6px);
                border-color: #c7eadb;
                box-shadow: 0 18px 38px rgba(15,23,42,.09);
            }


            /* =====================================================
               HEADER
            ===================================================== */

            .jadwal-home .sch-head {
                padding: 18px 18px 14px;
            }

            .jadwal-home .sch-day {
                display: inline-flex;
                align-items: center;
                justify-content: center;

                margin-bottom: 9px;
                padding: 6px 10px;

                border-radius: 50px;

                background: #ecfdf5;
                color: #047857;

                font-size: .67rem;
                font-weight: 800;
            }

            .jadwal-home .sch-name {
                margin: 0;

                color: #0f172a;

                font-size: .98rem;
                line-height: 1.4;

                font-weight: 750;
            }


            /* =====================================================
               IMAGE
            ===================================================== */

            .jadwal-home .sch-img {
                width: calc(100% - 28px);
                height: 145px;

                margin: 0 14px 15px;

                overflow: hidden;
                border-radius: 15px;

                background: #ecfdf5;
            }

            .jadwal-home .sch-img img {
                width: 100%;
                height: 100%;

                display: block;

                object-fit: cover;

                transition: transform .5s ease;
            }

            .jadwal-home .sch-card:hover .sch-img img {
                transform: scale(1.06);
            }


            /* =====================================================
               BODY
            ===================================================== */

            .jadwal-home .sch-body {
                padding: 0 18px 18px;
            }

            .jadwal-home .time-chip {
                display: inline-flex;
                align-items: center;
                gap: 6px;

                padding: 7px 10px;

                border-radius: 50px;

                background: #f0fdf4;
                color: #15803d;

                font-size: .7rem;
                font-weight: 750;
            }

            .jadwal-home .time-chip i {
                font-size: .65rem;
            }

            .jadwal-home .sch-desc {
                color: #64748b;

                font-size: .76rem;
                line-height: 1.65;

                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }


            /* =====================================================
               CARD TANPA FOTO
            ===================================================== */

            .jadwal-home .sch-card:not(:has(.sch-img)) {
                background:
                    linear-gradient(
                        145deg,
                        #ffffff,
                        #f8fffc
                    );
            }


            /* =====================================================
               BUTTON
            ===================================================== */

            .jadwal-home .jadwal-home-button {
                margin-top: 38px;
            }


            /* =====================================================
               RESPONSIVE
            ===================================================== */

            @media (max-width: 1199px) {

                .jadwal-home .schedule-grid {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }

                .jadwal-home .sch-img {
                    height: 170px;
                }

            }


            @media (max-width: 767px) {

                .jadwal-home .schedule-grid {
                    grid-template-columns: 1fr;
                    gap: 17px;
                }

                .jadwal-home .sch-img {
                    height: 190px;
                }

                .jadwal-home .sch-head {
                    padding: 18px 17px 14px;
                }

                .jadwal-home .sch-body {
                    padding: 0 17px 19px;
                }

            }


            @media (max-width: 575px) {

                .jadwal-home .sch-img {
                    height: 185px;
                }

                .jadwal-home .jadwal-home-button {
                    margin-top: 28px;
                }

            }
        </style>


        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <div class="sec-head text-center mb-5">

            <span class="eyebrow">
                <i class="bi bi-calendar-week"></i>
                JADWAL MINGGUAN
            </span>

            <h2 class="sec-title">
                Jadwal Kegiatan Rutin
            </h2>

            <p class="sec-sub">
                Agenda mingguan yang rutin diadakan oleh warga
                Dusun Jlegongan.
            </p>

        </div>


        {{-- =====================================================
             SCHEDULE CARDS
        ====================================================== --}}

        <div class="schedule-grid">

            @foreach($jadwal as $item)

                <div class="sch-card">

                    {{-- HEADER --}}
                    <div class="sch-head">

                        <span class="sch-day">
                            <i class="bi bi-calendar3 me-1"></i>
                            {{ $item->day }}
                        </span>

                        <h6 class="sch-name">
                            {{ $item->name }}
                        </h6>

                    </div>


                    {{-- IMAGE --}}
                    @if($item->image)

                        <div class="sch-img">

                            <img
                                src="{{ asset('storage/' . ltrim($item->image, '/')) }}"
                                alt="{{ $item->name }}"
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'d-flex align-items-center justify-content-center h-100\' style=\'background:linear-gradient(135deg,#ecfdf5,#d1fae5);\'><i class=\'bi bi-calendar-event\' style=\'font-size:38px;color:#059669;opacity:.45;\'></i></div>'"
                            >

                        </div>

                    @else

                        {{-- Placeholder jika tidak ada gambar --}}
                        <div
                            class="sch-img d-flex align-items-center justify-content-center"
                            style="background:linear-gradient(135deg,#ecfdf5,#d1fae5);"
                        >

                            <i
                                class="bi bi-calendar-event"
                                style="font-size:38px;color:#059669;opacity:.45;"
                            ></i>

                        </div>

                    @endif


                    {{-- BODY --}}
                    <div class="sch-body">

                        <span class="time-chip">

                            <i class="bi bi-clock-fill"></i>

                            {{ $item->time }}

                        </span>


                        @if($item->description)

                            <p class="sch-desc mb-0 mt-2">
                                {{ Str::limit($item->description, 120) }}
                            </p>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>


        {{-- =====================================================
             BUTTON
        ====================================================== --}}

        <div class="text-center jadwal-home-button">

            <a
                href="{{ route('jadwal') }}"
                class="btn btn-primary btn-lg"
            >

                Lihat Semua Jadwal dan Deskripsi

                <i class="bi bi-arrow-right ms-2"></i>

            </a>

        </div>

    </div>
</section>
```


{{-- 9. PKK & KWT 2 CARD --}}

<section class="section organisasi-home">
    <div class="wrap-container">

        <style>
            /* =====================================================
               PKK & KWT
            ===================================================== */

            .organisasi-home {
                background: #fff;
            }

            .organisasi-home .sec-head {
                max-width: 700px;
                margin-left: auto;
                margin-right: auto;
            }

            .organisasi-home .eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 6px;

                padding: 7px 12px;
                margin-bottom: 10px;

                border-radius: 50px;

                background: #ecfdf5;
                color: #047857;

                font-size: .7rem;
                font-weight: 800;
                letter-spacing: .3px;
            }

            .organisasi-home .sec-title {
                margin-bottom: 9px;
            }

            .organisasi-home .sec-sub {
                margin-bottom: 0;
            }


            /* =====================================================
               CARD
            ===================================================== */

            .org-card {
                position: relative;
                overflow: hidden;

                background: #fff;

                border: 1px solid #e7edef;
                border-radius: 22px;

                box-shadow: 0 8px 28px rgba(15,23,42,.055);

                transition:
                    transform .3s ease,
                    box-shadow .3s ease,
                    border-color .3s ease;
            }

            .org-card:hover {
                transform: translateY(-6px);

                border-color: #cde8dc;

                box-shadow:
                    0 20px 45px rgba(15,23,42,.10);
            }


            /* =====================================================
               FOTO
            ===================================================== */

            .org-banner-photo {
                position: relative;

                width: calc(100% - 28px);
                height: 215px;

                margin: 14px;

                overflow: hidden;

                border-radius: 17px;

                background: #ecfdf5;
            }

            .org-banner-photo img {
                width: 100%;
                height: 100%;

                display: block;

                object-fit: cover;

                transition: transform .5s ease;
            }

            .org-card:hover .org-banner-photo img {
                transform: scale(1.05);
            }


            /* =====================================================
               FOTO OVERLAY
            ===================================================== */

            .org-banner-overlay {
                position: absolute;
                inset: auto 0 0;

                display: flex;
                align-items: center;
                gap: 12px;

                padding: 25px 17px 17px;

                color: #fff;

                background:
                    linear-gradient(
                        to top,
                        rgba(0,0,0,.68),
                        rgba(0,0,0,.02)
                    );
            }

            .org-banner-overlay > i {
                flex: 0 0 42px;

                width: 42px;
                height: 42px;

                display: flex;
                align-items: center;
                justify-content: center;

                border-radius: 12px;

                background: rgba(255,255,255,.16);

                border: 1px solid rgba(255,255,255,.15);

                backdrop-filter: blur(5px);

                font-size: 1.05rem;
            }

            .org-banner-overlay h5 {
                margin: 0 0 2px;

                color: #fff;

                font-size: 1.05rem;
                font-weight: 800;
            }

            .org-banner-overlay small {
                color: rgba(255,255,255,.82);

                font-size: .72rem;
            }


            /* =====================================================
               FALLBACK BANNER
            ===================================================== */

            .org-banner {
                position: relative;

                width: calc(100% - 28px);
                height: 175px;

                margin: 14px;

                display: flex;
                align-items: center;
                gap: 16px;

                padding: 25px;

                overflow: hidden;

                border-radius: 17px;
            }

            .org-banner::after {
                content: "";

                position: absolute;

                width: 180px;
                height: 180px;

                border-radius: 50%;

                background: rgba(255,255,255,.22);

                right: -70px;
                bottom: -100px;
            }

            .org-banner > i {
                position: relative;
                z-index: 2;

                width: 52px;
                height: 52px;

                flex-shrink: 0;

                display: flex;
                align-items: center;
                justify-content: center;

                border-radius: 15px;

                background: rgba(255,255,255,.55);

                font-size: 1.3rem;
            }

            .org-banner > div {
                position: relative;
                z-index: 2;
            }

            .org-banner h5 {
                font-size: 1.1rem;
                font-weight: 800;
            }

            .org-banner small {
                font-size: .73rem;
                opacity: .8;
            }

            .org-pkk {
                background:
                    linear-gradient(
                        135deg,
                        #ecfdf5,
                        #bbf7d0
                    );

                color: #047857;
            }

            .org-pkk h5 {
                color: #065f46;
            }

            .org-kwt {
                background:
                    linear-gradient(
                        135deg,
                        #fefce8,
                        #fef3c7
                    );

                color: #a16207;
            }

            .org-kwt h5 {
                color: #854d0e;
            }


            /* =====================================================
               BODY
            ===================================================== */

            .org-body {
                padding: 3px 22px 23px;
            }

            .org-body > p {
                margin-bottom: 17px !important;

                color: #64748b;

                font-size: .83rem;
                line-height: 1.75 !important;
            }


            /* =====================================================
               POINTS
            ===================================================== */

            .org-points {
                padding: 0;
                margin: 0;

                list-style: none;

                display: flex;
                flex-direction: column;
                gap: 9px;
            }

            .org-points li {
                display: flex;
                align-items: flex-start;
                gap: 9px;

                color: #475569;

                font-size: .77rem;
                line-height: 1.5;
            }

            .org-points li i {
                flex-shrink: 0;

                margin-top: 1px;

                color: #059669;

                font-size: .9rem;
            }


            /* =====================================================
               KWT POINT COLOR
            ===================================================== */

            .org-card:nth-child(2) .org-points li i {
                color: #ca8a04;
            }


            /* =====================================================
               BUTTON
            ===================================================== */

            .organisasi-home .org-more {
                margin-top: 38px;
            }


            /* =====================================================
               RESPONSIVE
            ===================================================== */

            @media (max-width: 991px) {

                .org-banner-photo {
                    height: 230px;
                }

                .org-banner {
                    height: 190px;
                }

            }


            @media (max-width: 767px) {

                .organisasi-home .sec-head {
                    margin-bottom: 30px !important;
                }

                .org-banner-photo {
                    height: 205px;
                }

                .org-banner {
                    height: 180px;
                }

                .org-body {
                    padding: 3px 19px 21px;
                }

            }


            @media (max-width: 575px) {

                .org-banner-photo {
                    width: calc(100% - 24px);
                    height: 200px;

                    margin: 12px;

                    border-radius: 15px;
                }

                .org-banner {
                    width: calc(100% - 24px);
                    height: 175px;

                    margin: 12px;
                }

                .org-banner-overlay {
                    padding: 23px 14px 14px;
                }

                .org-banner-overlay > i {
                    width: 38px;
                    height: 38px;
                    flex-basis: 38px;
                }

                .organisasi-home .org-more {
                    margin-top: 28px;
                }

            }
        </style>


        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <div class="sec-head text-center mb-5">

            <span class="eyebrow">
                <i class="bi bi-people-fill"></i>
                ORGANISASI WANITA
            </span>

            <h2 class="sec-title">
                PKK &amp; KWT Dusun Jlegongan
            </h2>

            <p class="sec-sub">
                Dua organisasi wanita yang menjadi penggerak utama
                kesejahteraan keluarga dan warga.
            </p>

        </div>


        {{-- =====================================================
             CARDS
        ====================================================== --}}

        <div class="row g-4">

            {{-- ==================== PKK ==================== --}}
            <div class="col-md-12 col-lg-6">

                <div class="org-card h-100">

                    @if(
                        $pkk &&
                        $pkk->image
                    )

                        <div class="org-banner-photo">

                            <img
                                src="{{ asset('storage/' . ltrim($pkk->image, '/')) }}"
                                alt="{{ $pkk->name ?? 'PKK Jlegongan' }}"
                                loading="lazy"
                                onerror="this.parentElement.outerHTML='<div class=\'org-banner org-pkk\'><i class=\'bi bi-people-fill\'></i><div><h5 class=\'org-name mb-0\'>{{ addslashes($pkk->name ?? 'PKK Jlegongan') }}</h5><small>Pembinaan Kesejahteraan Keluarga</small></div></div>';"
                            >

                            <div class="org-banner-overlay">

                                <i class="bi bi-people-fill"></i>

                                <div>

                                    <h5>
                                        {{ $pkk->name ?? 'PKK Jlegongan' }}
                                    </h5>

                                    <small>
                                        Pembinaan Kesejahteraan Keluarga
                                    </small>

                                </div>

                            </div>

                        </div>

                    @else

                        <div class="org-banner org-pkk">

                            <i class="bi bi-people-fill"></i>

                            <div>

                                <h5 class="org-name mb-0">
                                    {{ $pkk->name ?? 'PKK Jlegongan' }}
                                </h5>

                                <small>
                                    Pembinaan Kesejahteraan Keluarga
                                </small>

                            </div>

                        </div>

                    @endif


                    <div class="org-body">

                        <p>
                            {{
                                $pkk && $pkk->description
                                ? Str::limit(
                                    strip_tags($pkk->description),
                                    240
                                )
                                : 'PKK Jlegongan aktif menyelenggarakan program pemberdayaan perempuan, pembinaan keluarga, posyandu, kegiatan seni ibu-ibu, serta berbagai bakti sosial untuk kesejahteraan keluarga di lingkungan dusun.'
                            }}
                        </p>


                        <ul class="org-points">

                            <li>
                                <i class="bi bi-check2-square"></i>
                                <span>Posyandu balita &amp; lansia rutin</span>
                            </li>

                            <li>
                                <i class="bi bi-check2-square"></i>
                                <span>Senam ibu &amp; arisan bulanan</span>
                            </li>

                            <li>
                                <i class="bi bi-check2-square"></i>
                                <span>Pemberdayaan UMKM rumah tangga</span>
                            </li>

                        </ul>

                    </div>

                </div>

            </div>


            {{-- ==================== KWT ==================== --}}
            <div class="col-md-12 col-lg-6">

                <div class="org-card h-100">

                    @if(
                        $kwt &&
                        $kwt->image
                    )

                        <div class="org-banner-photo">

                            <img
                                src="{{ asset('storage/' . ltrim($kwt->image, '/')) }}"
                                alt="{{ $kwt->name ?? 'KWT Jlegongan' }}"
                                loading="lazy"
                                onerror="this.parentElement.outerHTML='<div class=\'org-banner org-kwt\'><i class=\'bi bi-flower2\'></i><div><h5 class=\'org-name mb-0\'>{{ addslashes($kwt->name ?? 'KWT Jlegongan') }}</h5><small>Kelompok Wanita Tani</small></div></div>';"
                            >

                            <div class="org-banner-overlay">

                                <i class="bi bi-flower2"></i>

                                <div>

                                    <h5>
                                        {{ $kwt->name ?? 'KWT Jlegongan' }}
                                    </h5>

                                    <small>
                                        Kelompok Wanita Tani
                                    </small>

                                </div>

                            </div>

                        </div>

                    @else

                        <div class="org-banner org-kwt">

                            <i class="bi bi-flower2"></i>

                            <div>

                                <h5 class="org-name mb-0">
                                    {{ $kwt->name ?? 'KWT Jlegongan' }}
                                </h5>

                                <small>
                                    Kelompok Wanita Tani
                                </small>

                            </div>

                        </div>

                    @endif


                    <div class="org-body">

                        <p>
                            {{
                                $kwt && $kwt->description
                                ? Str::limit(
                                    strip_tags($kwt->description),
                                    240
                                )
                                : 'KWT Jlegongan mewadahi ibu-ibu petani dalam pengelolaan lahan pekarangan, tanaman sayur mayur, toga (tanaman obat keluarga), serta pemasaran hasil pertanian organik skala dusun.'
                            }}
                        </p>


                        <ul class="org-points">

                            <li>
                                <i class="bi bi-check2-square"></i>
                                <span>Budidaya sayur &amp; toga pekarangan</span>
                            </li>

                            <li>
                                <i class="bi bi-check2-square"></i>
                                <span>Pelatihan pertanian organik</span>
                            </li>

                            <li>
                                <i class="bi bi-check2-square"></i>
                                <span>Pemasaran hasil tani bersama</span>
                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             BUTTON
        ====================================================== --}}

        <div class="text-center org-more">

            <a
                href="{{ route('pkk-kwt') }}"
                class="btn btn-outline btn-lg"
            >

                Selengkapnya tentang PKK &amp; KWT

                <i class="bi bi-arrow-right ms-2"></i>

            </a>

        </div>

    </div>
</section>



{{-- 10. GALERI MASONRY 3 KOL LIGHTBOX --}}
<section class="section-sm section-alt">
    <div class="wrap-container">
        <div class="sec-head text-center mb-5">
            <span class="eyebrow">DOKUMENTASI</span>
            <h2 class="sec-title">Galeri Foto Dusun</h2>
            <p class="sec-sub">Abadikan momen kebersamaan dan pesona alam Dusun Jlegongan.</p>
        </div>

        <div class="gal-grid">
            @foreach($galeri as $idx => $item)
                @php
                    $size = ($idx % 3 === 0) ? 'portrait_4_3' : (($idx % 2 === 0) ? 'landscape_4_3' : 'square_hd');
                    $prompt = urlencode(($item->title ?? 'Dusun Jlegongan') . ' ' . ($item->category ?? 'indonesia village') . ' photography natural');
                    $imgUrl = "data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 400'><rect fill='%23d1fae5' width='400' height='400'/><text x='50%25' y='50%25' font-family='Arial' fill='%23059669' text-anchor='middle' dy='.3em' font-size='22'>" . htmlspecialchars($item->title ?? 'Galeri') . "</text></svg>";
                    if ($item->image) {
                        $imgUrl = asset('storage/' . ltrim($item->image, '/'));
                    }
                @endphp
            <div class="g-item" onclick="openLB('{{ $imgUrl }}', '{{ addslashes($item->title ?? 'Galeri') }}')">
                <img src="{{ $imgUrl }}"
                     alt="{{ $item->title }}"
                     loading="lazy"
                     onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 400%22><rect fill=%22%23d1fae5%22 width=%22400%22 height=%22400%22/><text x=%2250%25%22 y=%2250%25%22 font-family=%22Arial%22 fill=%22%23059669%22 text-anchor=%22middle%22 dy=%22.3em%22 font-size=%2222%22>' . htmlspecialchars($item->title ?? 'Galeri') . '</text></svg>'">
                <div class="capt">
                    <span class="capt-tag"><i class="bi bi-camera-fill"></i> {{ $item->category ?? 'Dokumentasi' }}</span>
                    <b class="capt-name">{{ $item->title }}</b>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('galeri') }}" class="btn btn-primary btn-lg">
                Buka Galeri Lengkap <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

@endsection
