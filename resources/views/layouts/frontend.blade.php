<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dusun Jlegongan') | Profil Dusun Jlegongan</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #065f46;
            --primary-2: #047857;
            --primary-3: #059669;
            --primary-light: #ecfdf5;
            --primary-mid: #d1fae5;
            --accent: #ca8a04;
            --accent-light: #fef3c7;
            --ink-900: #0f172a;
            --ink-700: #334155;
            --ink-500: #64748b;
            --ink-300: #cbd5e1;
            --paper: #fafafa;
            --shadow-sm: 0 1px 2px rgba(15,23,42,.04), 0 1px 3px rgba(15,23,42,.04);
            --shadow-md: 0 8px 24px rgba(15,23,42,.06);
            --shadow-lg: 0 20px 40px rgba(15,23,42,.08);
            --radius-sm: 10px;
            --radius-md: 16px;
            --radius-lg: 22px;
            --radius-xl: 28px;
        }

        * { box-sizing: border-box; -webkit-font-smoothing: antialiased; }
        html, body { margin: 0; padding: 0; overflow-x: hidden; }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
            background-color: var(--paper);
            color: var(--ink-700);
            line-height: 1.65;
            font-size: 15.5px;
        }

        h1,h2,h3,h4,h5,h6 { color: var(--ink-900); font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; line-height: 1.25; letter-spacing: -0.01em; }
        p { margin-bottom: 1rem; }
        a { text-decoration: none; }

        .wrap-container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        /* ========== NAVBAR ========== */
        .nav-main {
            position: sticky; top: 0; z-index: 1020;
            background: rgba(255,255,255,0.82);
            backdrop-filter: saturate(180%) blur(14px);
            -webkit-backdrop-filter: saturate(180%) blur(14px);
            border-bottom: 1px solid rgba(15,23,42,0.05);
        }
        .nav-main .nav-inner {
            display: flex; align-items: center; justify-content: space-between;
            height: 72px;
        }
        .logo-brand {
            display: inline-flex; align-items: center; gap: 10px; text-decoration: none;
        }
        .logo-badge {
            width: 40px; height: 40px; border-radius: 12px;
            background: linear-gradient(135deg, #047857 0%, #059669 55%, #fbbf24 100%);
            color: #fff; font-weight: 800; letter-spacing: 0.5px;
            display: inline-flex; align-items: center; justify-content: center;
            box-shadow: 0 6px 18px rgba(4,120,87,0.28);
            font-size: 14px;
        }
        .logo-text {
            display: flex; flex-direction: column; line-height: 1.1;
        }
        .logo-text .b1 { font-size: 15.5px; font-weight: 800; color: var(--primary); }
        .logo-text .b2 { font-size: 11px; color: var(--ink-500); font-weight: 500; letter-spacing: 0.03em; text-transform: uppercase; }

        .nav-links { display: flex; align-items: center; gap: 4px; }
        .nav-links > a, .nav-links > .dropdown > a {
            display: inline-flex; align-items: center; gap: 6px;
            font-size: 14.5px; font-weight: 600;
            color: var(--ink-700);
            padding: 10px 14px;
            border-radius: 10px;
            transition: all 0.2s ease;
            position: relative;
        }
        .nav-links > a:hover, .nav-links > .dropdown > a:hover {
            color: var(--primary);
            background: var(--primary-light);
        }
        .nav-links > a.nav-active {
            color: var(--primary);
        }
        .nav-links > a.nav-active::after {
            content: ''; position: absolute;
            left: 14px; right: 14px; bottom: 4px; height: 2.5px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border-radius: 2px;
        }
        .nav-links .dropdown-menu {
            border: 1px solid rgba(15,23,42,0.06);
            border-radius: 14px; box-shadow: var(--shadow-lg);
            padding: 10px; min-width: 230px; margin-top: 8px !important;
        }
        .nav-links .dropdown-item {
            padding: 10px 12px; border-radius: 10px; font-weight: 500; color: var(--ink-700); font-size: 14px;
            display: flex; align-items: center; gap: 10px;
        }
        .nav-links .dropdown-item:hover { background: var(--primary-light); color: var(--primary); }
        .nav-links .dropdown-item i { color: var(--primary-3); font-size: 16px; width: 20px; text-align: center; }

        .hamburger-btn {
            display: none;
            border: 1px solid rgba(15,23,42,0.08); background: #fff;
            border-radius: 10px; padding: 9px 11px;
            color: var(--ink-700);
        }
        .nav-mobile { display: none; padding: 0 20px 20px; }
        .nav-mobile.open { display: block; }
        .nav-mobile a, .nav-mobile .drop-title {
            display: block; padding: 12px 14px; border-radius: 10px;
            color: var(--ink-700); font-weight: 600; font-size: 15px;
        }
        .nav-mobile a:hover { background: var(--primary-light); color: var(--primary); }
        .nav-mobile .drop-list { padding-left: 10px; }

        @media (max-width: 1024px) {
            .nav-links { display: none; }
            .hamburger-btn { display: inline-flex; }
            .nav-main .nav-inner { height: 66px; }
        }

        /* ========== BUTTONS ========== */
        .btn {
            border-radius: 999px; font-weight: 600; padding: 11px 22px;
            transition: all 0.22s ease; font-size: 14.5px;
            display: inline-flex; align-items: center; gap: 8px;
            white-space: nowrap;
        }
        .btn:focus { box-shadow: none; }
        .btn-primary { background: var(--primary); border-color: var(--primary); color: #fff; }
        .btn-primary:hover { background: #064e3b; border-color: #064e3b; transform: translateY(-1px); box-shadow: 0 10px 20px rgba(6,95,70,0.18); color:#fff;}
        .btn-outline-primary {
            color: var(--primary); border-color: rgba(6,95,70,0.25); background: rgba(255,255,255,0.85);
        }
        .btn-outline-primary:hover { background: var(--primary); color:#fff; border-color: var(--primary); transform: translateY(-1px); }
        .btn-light-solid { background: #fff; border-color: #fff; color: var(--primary); }
        .btn-light-solid:hover { background: var(--primary-light); color: var(--primary); border-color: var(--primary-light); }
        .btn-ghost-white { background: rgba(255,255,255,0.14); color:#fff; border: 1px solid rgba(255,255,255,0.25); }
        .btn-ghost-white:hover { background: rgba(255,255,255,0.22); color:#fff; border-color: rgba(255,255,255,0.4); }
        .btn-sm { padding: 8px 16px; font-size: 13.5px; }

        /* ========== HERO ========== */
        .hero-section {
            position: relative;
            background:
                radial-gradient(1100px 600px at 95% -10%, rgba(251,191,36,0.32), transparent 58%),
                radial-gradient(900px 700px at -10% 110%, rgba(16,185,129,0.55), transparent 55%),
                linear-gradient(135deg, #065f46 0%, #047857 35%, #059669 65%, #0d9488 100%);
            color: #fff;
            padding: 72px 0 90px;
            overflow: hidden;
            min-height: calc(100vh - 72px);
            display: flex;
            align-items: center;
        }
        .hero-section::before {
            content: ''; position: absolute; inset: 0; pointer-events: none; z-index: 1;
            background-image:
                radial-gradient(circle at 15% 15%, rgba(255,255,255,0.1) 0%, transparent 38%),
                radial-gradient(circle at 85% 65%, rgba(253,230,138,0.12) 0%, transparent 42%);
        }
        .hero-section > * { position: relative; z-index: 2; }
        .hero-eyebrow {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.18);
            backdrop-filter: blur(6px);
            padding: 7px 14px; border-radius: 999px;
            font-size: 12px; font-weight: 700; letter-spacing: 0.09em; text-transform: uppercase;
            color: #fde68a;
        }
        .hero-eyebrow i { color: #fbbf24; }
        .hero-title {
            font-size: clamp(2rem, 4.4vw, 3.2rem);
            font-weight: 800; color: #fff; letter-spacing: -0.02em;
            margin: 18px 0 18px; line-height: 1.1;
        }
        .hero-title span {
            background: linear-gradient(90deg, #fde68a 0%, #fbbf24 60%, #fde68a 100%);
            -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
        }
        .hero-desc {
            font-size: 16.5px; line-height: 1.75; color: rgba(255,255,255,0.82);
            margin-bottom: 28px; max-width: 520px;
        }
        .hero-cta { display: flex; flex-wrap: wrap; gap: 12px; }
        .hero-meta {
            display: flex; flex-wrap: wrap; gap: 24px; margin-top: 40px;
            padding-top: 28px; border-top: 1px solid rgba(255,255,255,0.12);
        }
        .hero-meta .meta-item { display: flex; align-items: center; gap: 10px; color: rgba(255,255,255,0.78); font-size: 14px;}
        .hero-meta .meta-item i { color: #fbbf24; font-size: 18px; }

        .hero-media { position: relative; }
        .hero-photo {
            position: relative;
            border-radius: var(--radius-xl);
            overflow: hidden;
            aspect-ratio: 4/5;
            box-shadow: 0 30px 70px rgba(0,0,0,0.28);
            border: 5px solid rgba(255,255,255,0.1);
            background: linear-gradient(135deg, #047857, #059669);
        }
        .hero-photo img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .hero-photo .hero-photo-fallback {
            position: absolute; inset: 0;
            display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 18px;
            color: #fff; text-align: center; padding: 24px;
        }
        .hero-floating {
            position: absolute; z-index: 3;
            background: #fff; color: var(--ink-700);
            border-radius: 16px; box-shadow: var(--shadow-lg);
            padding: 14px 16px; display: flex; align-items: center; gap: 12px;
        }
        .hero-floating .ic {
            width: 42px; height: 42px; border-radius: 12px;
            display: inline-flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0;
        }
        .hero-floating .tx .n { font-size: 19px; font-weight: 800; color: var(--ink-900); line-height: 1; }
        .hero-floating .tx .l { font-size: 11.5px; color: var(--ink-500); font-weight: 600; letter-spacing: 0.02em; }
        .float-1 { top: 20px; left: -26px; }
        .float-1 .ic { background: var(--primary-light); color: var(--primary); }
        .float-2 { bottom: 32px; right: -18px; }
        .float-2 .ic { background: #fef3c7; color: #b45309; }
        .float-3 { top: 42%; right: -28px; }
        .float-3 .ic { background: #fee2e2; color: #b91c1c; }

        .hero-deco-shape {
            position: absolute; z-index: 1; pointer-events: none;
            width: 180px; height: 180px; border-radius: 40% 60% 60% 40% / 50% 50% 50% 50%;
            border: 2px dashed rgba(255,255,255,0.15);
        }
        .d-shape-1 { top: 40px; right: -40px; transform: rotate(30deg); }
        .d-shape-2 { bottom: -30px; left: -40px; width: 150px; height: 150px; border-color: rgba(251,191,36,0.22); }

        @media (max-width: 992px) {
            .hero-section { padding: 52px 0 64px; }
            .hero-media { margin-top: 40px; }
            .float-1 { left: 10px; top: 12px; }
            .float-2 { right: 10px; bottom: 16px; }
            .float-3 { display: none; }
        }
        @media (max-width: 576px) {
            .hero-floating { padding: 11px 13px; }
            .hero-floating .ic { width: 36px; height: 36px; font-size: 16px; }
            .hero-floating .tx .n { font-size: 16px; }
            .hero-title { font-size: 2rem; }
            .hero-desc { font-size: 15px; }
            .btn { padding: 11px 18px; }
        }

        /* ========== SECTION GENERIC ========== */
        .section { padding: 96px 0; }
        .section.alt { background: var(--primary-light); }
        .section.soft { background: #fff; }
        .section-sm { padding: 72px 0; }

        .eyebrow {
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;
            padding: 7px 14px; border-radius: 999px; margin-bottom: 14px;
        }
        .eyebrow i { font-size: 13px; }
        .eyebrow.accent { background: var(--accent-light); color: #92400e; }

        .sec-title {
            font-size: clamp(1.6rem, 2.8vw, 2.2rem);
            font-weight: 800; margin-bottom: 14px;
            color: var(--ink-900);
        }
        .sec-title.white { color:#fff; }
        .sec-sub {
            color: var(--ink-500); font-size: 15.5px; line-height: 1.75;
            max-width: 640px;
        }
        .sec-sub.white { color: rgba(255,255,255,0.78); }
        .sec-head { margin-bottom: 48px; }
        .sec-head.center { text-align: center; }
        .sec-head.center .sec-sub { margin-left: auto; margin-right: auto; }

        /* ========== STATS ROW ========== */
        .stats-wrap {
            background: #fff;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(15,23,42,0.05);
            padding: 36px 28px;
            transform: translateY(-56px);
            margin-bottom: 40px;
            position: relative; z-index: 5;
        }
        .stat-single {
            display: flex; align-items: center; gap: 14px;
            padding: 4px 10px;
            transition: transform 0.2s ease;
        }
        .stat-single:hover { transform: translateY(-2px); }
        .stat-single .ic-box {
            width: 54px; height: 54px; border-radius: 14px; flex-shrink: 0;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 22px;
        }
        .stat-single .num { font-size: 26px; font-weight: 800; color: var(--ink-900); line-height: 1.1; }
        .stat-single .lbl { font-size: 13px; color: var(--ink-500); font-weight: 600; }

        @media (max-width: 576px) {
            .stats-wrap { padding: 24px 18px; transform: translateY(-36px); margin-bottom: 16px;}
            .stat-single .num { font-size: 22px; }
            .stat-single .ic-box { width: 46px; height: 46px; font-size: 18px; }
        }

        /* ========== CARDS ========== */
        .card-x {
            background: #fff;
            border-radius: var(--radius-md);
            border: 1px solid rgba(15,23,42,0.06);
            transition: all 0.28s ease;
            overflow: hidden;
            display: flex; flex-direction: column;
            height: 100%;
        }
        .card-x:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(5,150,105,0.2);
        }
        .card-x .thumb {
            position: relative;
            aspect-ratio: 4/3;
            overflow: hidden;
            background: linear-gradient(135deg, var(--primary-mid), var(--primary-light));
        }
        .card-x .thumb img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
        .card-x:hover .thumb img { transform: scale(1.06); }
        .card-x .thumb .cat {
            position: absolute; top: 14px; left: 14px; z-index: 2;
            background: rgba(255,255,255,0.96);
            color: var(--primary);
            padding: 6px 12px; border-radius: 999px;
            font-size: 12px; font-weight: 700; letter-spacing: 0.03em;
        }
        .card-x .body { padding: 22px; flex: 1 1 auto; display: flex; flex-direction: column; }
        .card-x .body h4 { font-size: 18px; margin-bottom: 10px; }
        .card-x .body p { font-size: 14px; color: var(--ink-500); line-height: 1.7; margin: 0; flex: 1; }
        .card-x .foot { padding: 0 22px 22px; }

        .chip {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 6px 12px; border-radius: 8px;
            background: var(--primary-light); color: var(--primary);
            font-size: 12px; font-weight: 700;
        }
        .chip.accent { background: var(--accent-light); color: #92400e; }

        /* ========== PROFIL SECTION (FOTO + TEXT) ========== */
        .about-grid {
            display: grid; grid-template-columns: 1.05fr 1.15fr; gap: 60px; align-items: center;
        }
        .about-media {
            position: relative;
        }
        .about-media .main-photo {
            border-radius: var(--radius-lg);
            overflow: hidden;
            aspect-ratio: 4/5;
            box-shadow: var(--shadow-lg);
            background: linear-gradient(135deg, var(--primary-light), var(--primary-mid));
            position: relative; z-index: 2;
        }
        .about-media .main-photo img { width: 100%; height: 100%; object-fit: cover;}
        .about-media .stamp {
            position: absolute; bottom: -22px; right: -22px; z-index: 3;
            background: #fff; border-radius: 16px; box-shadow: var(--shadow-md);
            padding: 16px 18px; display: flex; align-items: center; gap: 12px;
            border: 1px solid rgba(15,23,42,0.05);
        }
        .about-media .stamp .sq {
            width: 46px; height: 46px; border-radius: 12px;
            background: linear-gradient(135deg, #047857, #059669);
            color: #fff; display: inline-flex; align-items: center; justify-content: center;
            font-size: 20px;
        }
        .about-media .deco-square {
            position: absolute; top: -22px; left: -22px; width: 100%; height: 100%;
            border: 2.5px solid var(--accent); border-radius: var(--radius-lg); opacity: 0.25; z-index: 1;
        }
        .about-check { list-style: none; padding: 0; margin: 22px 0;}
        .about-check li { display: flex; align-items: flex-start; gap: 10px; padding: 8px 0; color: var(--ink-700); font-size: 14.5px; font-weight: 500;}
        .about-check li i {
            color: var(--primary); font-size: 18px; flex-shrink: 0; margin-top: 1px;
            background: var(--primary-light); border-radius: 6px; padding: 2px;
        }

        @media (max-width: 992px) {
            .about-grid { grid-template-columns: 1fr; gap: 40px; }
            .about-media .stamp { right: 10px; bottom: -20px; }
        }

        /* ========== KEPENDUDUKAN PREVIEW ========== */
        .demographic-main {
            background: linear-gradient(180deg, #fff 0%, var(--primary-light) 100%);
            border: 1px solid rgba(5,150,105,0.1);
            border-radius: var(--radius-lg);
            padding: 32px;
        }
        .mini-stat {
            display: flex; flex-direction: column; gap: 6px;
            padding: 20px; background: #fff;
            border-radius: 14px; border: 1px solid rgba(15,23,42,0.05);
            transition: transform 0.2s;
        }
        .mini-stat:hover { transform: translateY(-2px); box-shadow: var(--shadow-sm); }
        .mini-stat .label { color: var(--ink-500); font-size: 12px; font-weight: 600; letter-spacing: 0.04em; text-transform: uppercase; }
        .mini-stat .value { font-size: 28px; font-weight: 800; color: var(--ink-900); line-height: 1.1;}
        .mini-stat .delta { font-size: 12.5px; color: var(--primary); font-weight: 700; display: inline-flex; align-items: center; gap: 5px;}
        .mini-stat.emerald .value { color: var(--primary); }
        .mini-stat.blue .value { color: #2563eb; }
        .mini-stat.pink .value { color: #db2777; }
        .mini-stat.amber .value { color: #b45309; }

        .age-bars {
            background: #fff;
            border-radius: 14px; padding: 24px; border: 1px solid rgba(15,23,42,0.05);
        }
        .age-bars h5 { font-size: 15px; margin-bottom: 20px; color: var(--ink-700);}
        .age-row { margin-bottom: 14px; }
        .age-row:last-child { margin-bottom: 0;}
        .age-row .top { display: flex; justify-content: space-between; font-size: 12.5px; font-weight: 600; color: var(--ink-500); margin-bottom: 6px; }
        .age-row .top .v { color: var(--primary); font-weight: 700; }
        .bar-track { height: 8px; background: var(--primary-light); border-radius: 999px; overflow: hidden; }
        .bar-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary-2), var(--primary-3));
            border-radius: 999px;
        }

        /* ========== TIMELINE / JADWAL ========== */
        .schedule-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(330px, 1fr));
            gap: 22px;
        }
        .sch-card {
            background: #fff;
            border-radius: var(--radius-md);
            border: 1px solid rgba(15,23,42,0.06);
            padding: 22px;
            display: flex; gap: 16px;
            transition: all 0.25s ease;
            position: relative; overflow: hidden;
        }
        .sch-card::before {
            content: ''; position: absolute; top: 0; left: 0; bottom: 0; width: 4px;
            background: linear-gradient(180deg, var(--primary), var(--accent));
        }
        .sch-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); border-color: rgba(5,150,105,0.18); }
        .sch-day {
            flex-shrink: 0;
            width: 62px; text-align: center;
            background: linear-gradient(135deg, var(--primary-light), var(--primary-mid));
            color: var(--primary);
            border-radius: 14px; padding: 12px 6px;
            display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 2px;
        }
        .sch-day .d { font-size: 20px; font-weight: 800; line-height: 1; }
        .sch-day .dt { font-size: 10.5px; letter-spacing: 0.05em; text-transform: uppercase; font-weight: 700;}
        .sch-body h4 { font-size: 16px; margin-bottom: 6px;}
        .sch-body .time {
            display: inline-flex; align-items: center; gap: 6px;
            background: var(--accent-light); color: #92400e;
            font-size: 12.5px; font-weight: 700;
            padding: 4px 10px; border-radius: 8px; margin-bottom: 8px;
        }
        .sch-body p { margin: 0; font-size: 13.5px; color: var(--ink-500); line-height: 1.6;}

        /* ========== POTENTIAL CARD ========== */
        .poten-card {
            background: #fff;
            border-radius: var(--radius-md);
            border: 1px solid rgba(15,23,42,0.05);
            padding: 26px;
            height: 100%;
            transition: all 0.25s ease;
            position: relative; overflow: hidden;
        }
        .poten-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }
        .poten-card .p-ic {
            width: 54px; height: 54px; border-radius: 14px;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 22px; margin-bottom: 16px;
        }
        .poten-card h4 { font-size: 17px; margin-bottom: 8px; }
        .poten-card p { font-size: 14px; color: var(--ink-500); line-height: 1.7; margin-bottom: 14px; }
        .poten-card .p-more {
            color: var(--primary); font-weight: 700; font-size: 13.5px;
            display: inline-flex; align-items: center; gap: 5px;
            transition: gap 0.2s;
        }
        .poten-card:hover .p-more { gap: 9px; }
        .poten-card.featured {
            background: linear-gradient(135deg, var(--primary) 0%, #047857 100%);
            color: #fff; border-color: transparent;
        }
        .poten-card.featured .p-ic { background: rgba(255,255,255,0.15); color: #fde68a; }
        .poten-card.featured h4 { color: #fff; }
        .poten-card.featured p { color: rgba(255,255,255,0.8); }
        .poten-card.featured .p-more { color: #fde68a; }
        .poten-card.featured .src {
            margin-top: 14px; padding: 12px 14px;
            background: rgba(253,230,138,0.15);
            border-left: 3px solid #fbbf24;
            border-radius: 0 10px 10px 0;
            font-size: 12px; color: #fde68a;
        }
        .poten-card.featured .src a { color: #fff; text-decoration: underline; font-weight: 600; }

        /* ========== ORG CARDS (PKK / KWT) ========== */
        .org-card {
            background: #fff;
            border-radius: var(--radius-lg);
            overflow: hidden;
            border: 1px solid rgba(15,23,42,0.05);
            box-shadow: var(--shadow-sm);
            display: flex; flex-direction: column;
            height: 100%;
            transition: all 0.28s;
        }
        .org-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
        .org-card .org-banner {
            padding: 28px;
            display: flex; align-items: center; gap: 16px;
            color: #fff;
        }
        .org-card.pkk .org-banner { background: linear-gradient(135deg, #9d174d 0%, #be185d 60%, #ec4899 100%); }
        .org-card.kwt .org-banner { background: linear-gradient(135deg, #065f46 0%, #047857 60%, #059669 100%); }
        .org-card .org-badge {
            width: 62px; height: 62px; border-radius: 16px;
            background: rgba(255,255,255,0.18); color: #fff;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 22px; flex-shrink: 0;
            border: 1px solid rgba(255,255,255,0.22);
        }
        .org-card .org-banner h3 { color: #fff; font-size: 20px; margin: 0 0 3px; }
        .org-card .org-banner span { font-size: 12.5px; color: rgba(255,255,255,0.82); font-weight: 600; letter-spacing: 0.05em;}
        .org-card .org-body { padding: 26px; flex: 1; }
        .org-card .org-body p { font-size: 14.5px; color: var(--ink-500); line-height: 1.75; }
        .org-card .org-body ul { list-style: none; padding: 0; margin: 18px 0 0;}
        .org-card .org-body ul li {
            padding: 8px 0; font-size: 14px; color: var(--ink-700); font-weight: 500;
            border-bottom: 1px dashed rgba(15,23,42,0.06);
            display: flex; align-items: center; gap: 10px;
        }
        .org-card .org-body ul li:last-child { border-bottom: none; }
        .org-card .org-body ul li::before {
            content: '\F26E'; font-family: 'bootstrap-icons'; font-size: 10px;
            color: var(--primary); background: var(--primary-light); padding: 4px; border-radius: 6px;
        }

        /* ========== FACILITY CARD ========== */
        .fac-card {
            background: #fff;
            border-radius: var(--radius-md);
            border: 1px solid rgba(15,23,42,0.05);
            overflow: hidden;
            transition: all 0.28s ease;
            display: flex; flex-direction: column; height: 100%;
        }
        .fac-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
        .fac-card .f-photo {
            aspect-ratio: 16/10; overflow: hidden; position: relative;
            background: linear-gradient(135deg, var(--primary-mid), var(--primary-light));
        }
        .fac-card .f-photo img { width:100%; height:100%; object-fit: cover; transition: transform 0.5s;}
        .fac-card:hover .f-photo img { transform: scale(1.07); }
        .fac-card .f-photo .overlay-ic {
            position: absolute; inset: 0;
            display: flex; align-items: center; justify-content: center;
            font-size: 60px; color: rgba(6,95,70,0.35);
        }
        .fac-card .f-body { padding: 22px; flex: 1; display: flex; flex-direction: column; }
        .fac-card .f-body h4 { font-size: 18px; margin-bottom: 10px; }
        .fac-card .f-body p { font-size: 14px; color: var(--ink-500); line-height: 1.7; flex: 1; }
        .fac-card .f-foot { padding: 0 22px 22px; margin-top: auto;}
        .time-chip {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 8px 14px; border-radius: 10px;
            background: linear-gradient(135deg, var(--accent-light), #fef9c3);
            color: #92400e; font-size: 12.5px; font-weight: 700;
        }

        /* ========== GALLERY ========== */
        .gal-grid {
            column-count: 3;
            column-gap: 14px;
        }
        .gal-grid .g-item {
            break-inside: avoid;
            margin-bottom: 14px;
            border-radius: 14px; overflow: hidden; position: relative;
            cursor: pointer; background: var(--primary-light);
        }
        .gal-grid .g-item img {
            width: 100%; display: block; transition: transform 0.5s ease;
        }
        .gal-grid .g-item:hover img { transform: scale(1.08); }
        .gal-grid .g-item .capt {
            position: absolute; inset: auto 0 0 0; padding: 14px;
            background: linear-gradient(180deg, transparent, rgba(0,0,0,0.72));
            color: #fff; opacity: 0; transform: translateY(8px); transition: all 0.28s;
        }
        .gal-grid .g-item:hover .capt { opacity: 1; transform: translateY(0); }
        .gal-grid .g-item .capt h6 { color:#fff; font-size: 14px; margin-bottom: 2px;}
        .gal-grid .g-item .capt span { font-size: 11.5px; color: rgba(255,255,255,0.8);}
        @media (max-width: 768px) { .gal-grid { column-count: 2; } }
        @media (max-width: 430px) { .gal-grid { column-count: 2; column-gap: 10px; } .gal-grid .g-item { margin-bottom: 10px;} }

        /* ========== PAGE HEADER ========== */
        .page-hero {
            background:
                radial-gradient(800px 300px at 90% 0%, rgba(251,191,36,0.18), transparent 60%),
                linear-gradient(135deg, #064e3b 0%, #065f46 50%, #047857 100%);
            color: #fff;
            padding: 72px 0 90px;
            position: relative; overflow: hidden;
        }
        .page-hero::before {
            content: ''; position: absolute; inset: 0;
            background-image: radial-gradient(circle at 20% 110%, rgba(255,255,255,0.08), transparent 40%);
        }
        .page-hero .crumb {
            color: rgba(255,255,255,0.7); font-size: 14px;
        }
        .page-hero .crumb a { color: rgba(255,255,255,0.8); }
        .page-hero .crumb a:hover { color: #fde68a; }
        .page-hero h1 { font-size: clamp(1.8rem, 3.4vw, 2.6rem); color:#fff; font-weight: 800; margin: 14px 0 10px;}
        .page-hero p { font-size: 15.5px; color: rgba(255,255,255,0.78); line-height: 1.7; max-width: 680px; margin-bottom: 0;}

        /* ========== FOOTER ========== */
        .footer {
            background: linear-gradient(180deg, #064e3b 0%, #052e24 100%);
            color: rgba(255,255,255,0.78);
            padding: 80px 0 0;
            position: relative; overflow: hidden;
        }
        .footer::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
            background: linear-gradient(90deg, transparent, #fbbf24, transparent);
        }
        .footer h5 {
            color: #fff; font-size: 15px; font-weight: 700;
            margin-bottom: 18px; letter-spacing: 0.03em; text-transform: uppercase;
            position: relative; padding-bottom: 10px;
        }
        .footer h5::after {
            content: ''; position: absolute; left: 0; bottom: 0; width: 28px; height: 3px;
            background: linear-gradient(90deg, #fbbf24, transparent); border-radius: 2px;
        }
        .footer a { color: rgba(255,255,255,0.7); text-decoration: none; font-size: 14px; }
        .footer a:hover { color: #fde68a; }
        .footer ul { list-style: none; padding: 0; margin: 0; display: grid; gap: 10px;}
        .footer .about-text { line-height: 1.8; font-size: 14px; margin: 14px 0 18px;}
        .footer .social-row { display: flex; gap: 10px; }
        .footer .social-row a {
            width: 38px; height: 38px; border-radius: 10px;
            display: inline-flex; align-items: center; justify-content: center;
            background: rgba(255,255,255,0.08); color: #fff;
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.2s;
        }
        .footer .social-row a:hover { background: var(--accent); color: #fff; transform: translateY(-2px); }
        .footer .contact-list li {
            display: flex; align-items: flex-start; gap: 10px; font-size: 14px;
        }
        .footer .contact-list li i { color: #fbbf24; margin-top: 3px; font-size: 15px;}
        .copyright-bar {
            margin-top: 60px;
            padding: 22px 0;
            border-top: 1px solid rgba(255,255,255,0.08);
            font-size: 13px; color: rgba(255,255,255,0.55);
        }
        .copyright-bar .cr-logo { color: #fff; font-weight: 700; }
        .copyright-bar .cr-logo i { color: #fbbf24; }

        /* ========== BACK TO TOP & LIGHTBOX ========== */
        .to-top {
            position: fixed; right: 22px; bottom: 22px; z-index: 1000;
            width: 46px; height: 46px; border-radius: 14px;
            background: var(--primary); color: #fff;
            display: none; align-items: center; justify-content: center;
            box-shadow: 0 10px 25px rgba(6,95,70,0.35);
            border: none; font-size: 18px;
            transition: all 0.2s;
        }
        .to-top:hover { background: #064e3b; transform: translateY(-3px); color:#fff; }
        .to-top.vis { display: inline-flex; }

        .lb {
            position: fixed; inset: 0; background: rgba(6,46,36,0.94);
            z-index: 9999; display: none; align-items: center; justify-content: center;
            padding: 30px;
        }
        .lb.open { display: flex; }
        .lb img { max-width: 95%; max-height: 92vh; border-radius: 14px; box-shadow: 0 30px 80px rgba(0,0,0,0.5);}
        .lb-x {
            position: absolute; top: 20px; right: 24px; color: #fff;
            background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);
            width: 44px; height: 44px; border-radius: 12px;
            font-size: 20px; cursor: pointer; display: flex; align-items: center; justify-content: center;
        }

        /* ========== HELPERS ========== */
        .row > [class*="col-"] { margin-bottom: 0; }
        .section + .section { padding-top: 0; }

        /* text-color helpers */
        .text-amber { color: #f59e0b !important; }
        .text-emerald { color: #059669 !important; }
        .text-blue { color: #2563eb !important; }
        .text-pink { color: #db2777 !important; }
        .text-emerald-dark { color: var(--primary-dark); }
        .section-alt { background: var(--primary-light); }

        /* ========== CLASS ALIAS MAPPING (sesuai markup Blade home & child) ========== */

        /* --- BUTTON aliases --- */
        .btn-outline {
            border-radius: 999px; font-weight: 600; padding: 11px 22px;
            border: 1.5px solid rgba(255,255,255,0.32); background: rgba(255,255,255,0.08);
            color: #fff; transition: all 0.22s ease;
            display: inline-flex; align-items: center; gap: 8px;
            backdrop-filter: blur(6px);
        }
        .btn-outline:hover {
            background: #fff; color: var(--primary); border-color: #fff; transform: translateY(-1px);
            box-shadow: 0 10px 22px rgba(0,0,0,0.18);
        }
        section:not(.hero-section):not(.page-hero) .btn-outline,
        .section-sm .btn-outline, .section .btn-outline {
            border-color: rgba(6,95,70,0.22);
            color: var(--primary);
            background: #fff;
        }
        section:not(.hero-section):not(.page-hero) .btn-outline:hover,
        .section-sm .btn-outline:hover, .section .btn-outline:hover {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
        }
        .btn-lg { padding: 13px 26px; font-size: 15px; }

        /* --- HERO: blade uses hero-img-wrap, hero-img, float-card, d-shape-* --- */
        .hero-img-wrap {
            position: relative;
        }
        .hero-img {
            position: relative;
            border-radius: 28px;
            overflow: hidden;
            aspect-ratio: 4/5;
            box-shadow: 0 30px 70px rgba(0,0,0,0.28);
            border: 5px solid rgba(255,255,255,0.1);
            background: linear-gradient(135deg, #047857, #059669);
        }
        .hero-img img { width: 100%; height: 100%; object-fit: cover; display: block; }

        .hero-deco-shape,
        .d-shape-1, .d-shape-2 {
            position: absolute; z-index: 1; pointer-events: none;
            width: 180px; height: 180px; border-radius: 40% 60% 60% 40% / 50% 50% 50% 50%;
            border: 2px dashed rgba(255,255,255,0.15);
        }
        .d-shape-1 { top: 40px; right: -40px; transform: rotate(30deg); }
        .d-shape-2 { bottom: -30px; left: -40px; width: 150px; height: 150px; border-color: rgba(251,191,36,0.22); }

        .float-card,
        .hero-floating {
            position: absolute; z-index: 3;
            background: #fff; color: var(--ink-700);
            border-radius: 16px; box-shadow: var(--shadow-lg);
            padding: 14px 16px; display: flex; align-items: center; gap: 12px;
            min-width: 160px;
        }
        .float-card .float-ic,
        .hero-floating .ic {
            width: 42px; height: 42px; border-radius: 12px;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 20px; flex-shrink: 0;
            background: var(--primary-light); color: var(--primary);
        }
        .float-card .float-num,
        .hero-floating .tx .n { font-size: 19px; font-weight: 800; color: var(--ink-900); line-height: 1; margin: 0; }
        .float-card .float-lbl,
        .hero-floating .tx .l { font-size: 11.5px; color: var(--ink-500); font-weight: 600; letter-spacing: 0.02em; margin: 2px 0 0; }
        .float-card.float-1, .hero-floating.float-1 { top: 20px; left: -26px; }
        .float-card.float-2, .hero-floating.float-2 { bottom: 32px; right: -18px; }
        .float-card.float-2 .float-ic { background: #ecfdf5; color: #059669; }
        .float-card.float-3, .hero-floating.float-3 { top: 42%; right: -28px; }
        .float-card.float-3 .float-ic { background: #fdf2f8; color: #be185d; }

        @media (max-width: 992px) {
            .float-card.float-1, .hero-floating.float-1 { left: 10px; top: 12px; }
            .float-card.float-2, .hero-floating.float-2 { right: 10px; bottom: 16px; }
            .float-card.float-3, .hero-floating.float-3 { display: none; }
        }
        @media (max-width: 576px) {
            .float-card { padding: 11px 13px; }
            .float-card .float-ic { width: 36px; height: 36px; font-size: 16px; }
            .float-card .float-num { font-size: 16px; }
        }

        /* --- STATS: blade uses stat-ic, stat-num, stat-lbl --- */
        .stat-single .stat-ic,
        .stat-single .ic-box {
            width: 54px; height: 54px; border-radius: 14px; flex-shrink: 0;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 22px;
        }
        .stat-single .stat-num,
        .stat-single .num { font-size: 26px; font-weight: 800; color: var(--ink-900); line-height: 1.1; }
        .stat-single .stat-lbl,
        .stat-single .lbl { font-size: 13px; color: var(--ink-500); font-weight: 600; }

        /* --- CARD-X: blade uses .card-x-thumb, card-x-body, card-x-title, card-x-text --- */
        .card-x .card-x-thumb,
        .card-x .thumb {
            position: relative;
            aspect-ratio: 4/3;
            overflow: hidden;
            background: linear-gradient(135deg, var(--primary-mid), var(--primary-light));
            display: flex; align-items: center; justify-content: center;
            color: var(--primary);
            font-size: 60px;
        }
        .card-x .card-x-thumb img,
        .card-x .thumb img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
        .card-x:hover .card-x-thumb img,
        .card-x:hover .thumb img { transform: scale(1.06); }
        .card-x .card-x-body,
        .card-x .body { padding: 22px; flex: 1 1 auto; display: flex; flex-direction: column; }
        .card-x .card-x-title,
        .card-x .body h4 { font-size: 18px; margin-bottom: 10px; color: var(--ink-900); }
        .card-x .card-x-text,
        .card-x .body p { font-size: 14px; color: var(--ink-500); line-height: 1.7; margin: 0; flex: 1; }

        /* --- CHIP colors: blade uses chip-emerald / chip-amber / chip-blue / chip-pink / chip-light --- */
        .chip-emerald { background: var(--primary-light); color: var(--primary); }
        .chip-amber { background: var(--accent-light); color: #92400e; }
        .chip-blue { background: #eff6ff; color: #2563eb; }
        .chip-pink { background: #fdf2f8; color: #be185d; }
        .chip-light { background: rgba(255,255,255,0.15); color: #fff; border: 1px solid rgba(255,255,255,0.22); }

        /* --- ABOUT / PROFIL: blade uses about-photo, about-img, about-accent, about-stamp, about-title, about-check-wrap, about-check --- */
        .about-photo {
            position: relative;
        }
        .about-img,
        .about-media .main-photo {
            border-radius: var(--radius-lg);
            overflow: hidden;
            aspect-ratio: 4/5;
            box-shadow: var(--shadow-lg);
            background: linear-gradient(135deg, var(--primary-light), var(--primary-mid));
            position: relative; z-index: 2;
        }
        .about-img img,
        .about-media .main-photo img { width: 100%; height: 100%; object-fit: cover;}
        .about-accent,
        .about-media .deco-square {
            position: absolute; top: -22px; left: -22px; width: 100%; height: 100%;
            border: 2.5px solid var(--accent); border-radius: var(--radius-lg); opacity: 0.3; z-index: 1;
        }
        .about-stamp,
        .about-media .stamp {
            position: absolute; bottom: -22px; right: -22px; z-index: 3;
            background: #fff; border-radius: 16px; box-shadow: var(--shadow-md);
            padding: 16px 18px; display: flex; align-items: center; gap: 12px;
            border: 1px solid rgba(15,23,42,0.05);
        }
        .about-stamp > div b,
        .about-media .stamp b { color: var(--ink-900); display: block; font-size: 14px; }
        .about-stamp > div small,
        .about-media .stamp small { color: var(--ink-500); font-size: 11.5px; }
        .about-title {
            font-size: clamp(1.4rem, 2.4vw, 1.8rem);
            font-weight: 800; color: var(--ink-900); line-height: 1.25;
            margin-bottom: 16px;
        }
        .about-check-wrap {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 4px 20px;
            margin: 22px 0;
        }
        .about-check,
        .about-check li {
            display: flex; align-items: center; gap: 10px;
            padding: 8px 0;
            color: var(--ink-700);
            font-size: 14.5px;
            font-weight: 500;
        }
        .about-check i,
        .about-check li i {
            color: var(--primary);
            font-size: 18px;
            flex-shrink: 0;
        }
        @media (max-width: 576px) {
            .about-check-wrap { grid-template-columns: 1fr; }
            .about-stamp, .about-media .stamp { right: 10px; bottom: -20px; padding: 12px 14px;}
        }

        /* --- MINI STAT (blade: mini-emerald/blue/pink, mini-num, mini-lbl) --- */
        .mini-stat {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 20px;
            background: #fff;
            border-radius: 14px;
            border: 1px solid rgba(15,23,42,0.05);
            transition: transform 0.2s;
        }
        .mini-stat i { font-size: 26px; width: 42px; text-align: center; }
        .mini-emerald, .mini-stat.emerald { background: linear-gradient(135deg, #ecfdf5 0%, #fff 100%); color: var(--primary); }
        .mini-emerald i, .mini-stat.emerald .value, .mini-stat.emerald i { color: var(--primary); }
        .mini-blue, .mini-stat.blue { background: linear-gradient(135deg, #eff6ff 0%, #fff 100%); color: #2563eb; }
        .mini-blue i, .mini-stat.blue .value, .mini-stat.blue i { color: #2563eb; }
        .mini-pink, .mini-stat.pink { background: linear-gradient(135deg, #fdf2f8 0%, #fff 100%); color: #db2777; }
        .mini-pink i, .mini-stat.pink .value, .mini-stat.pink i { color: #db2777; }
        .mini-num, .mini-stat .value { font-size: 26px; font-weight: 800; color: var(--ink-900); line-height: 1.1;}
        .mini-lbl, .mini-stat .label { font-size: 13px; color: var(--ink-500); font-weight: 600;}

        /* --- AGE BARS (blade: age-head, age-label, age-track, age-fill) --- */
        .age-head {
            padding: 14px 18px;
            background: #fff;
            border-radius: 12px;
            border: 1px solid rgba(15,23,42,0.05);
        }
        .age-row { margin-bottom: 14px; }
        .age-row:last-child { margin-bottom: 0; }
        .age-label,
        .age-row .top {
            display: flex;
            justify-content: space-between;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--ink-500);
            margin-bottom: 6px;
        }
        .age-label span,
        .age-row .top .v { color: var(--primary); font-weight: 700; }
        .age-track,
        .age-row .bar-track {
            height: 10px;
            background: #d1fae5;
            border-radius: 999px;
            overflow: hidden;
        }
        .age-fill,
        .age-row .bar-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary-2), var(--primary-3));
            border-radius: 999px;
            transition: width 0.6s ease;
        }

        /* --- SCHEDULE (blade: sch-head, sch-day, sch-name, sch-body, sch-desc) --- */
        .sch-card { align-items: flex-start !important; }
        .sch-head {
            display: flex;
            gap: 16px;
            margin-bottom: 10px;
            align-items: flex-start;
            flex: 1 1 auto;
        }
        .sch-day {
            flex-shrink: 0;
            width: 62px;
            text-align: center;
            background: linear-gradient(135deg, var(--primary-light), var(--primary-mid));
            color: var(--primary);
            border-radius: 14px;
            padding: 12px 6px;
            font-weight: 800;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .sch-name { font-size: 16px; margin: 2px 0 0; color: var(--ink-900); }
        .sch-body { padding-left: 78px; }
        .sch-body .sch-desc { font-size: 13.5px; color: var(--ink-500); line-height: 1.6; }
        .time-chip.time-amber {
            background: linear-gradient(135deg, #fde68a, #fbbf24);
            color: #78350f;
            box-shadow: 0 4px 12px rgba(251,191,36,0.25);
        }
        @media (max-width: 576px) {
            .sch-body { padding-left: 0; }
            .sch-head { gap: 12px; }
        }

        /* --- POTENTIAL (blade: .poten-ic, .poten-title, .poten-desc, .p-more, .src) --- */
        .poten-card .poten-ic,
        .poten-card .p-ic {
            width: 54px; height: 54px; border-radius: 14px;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 22px;
            margin-bottom: 16px;
            background: var(--primary-light);
            color: var(--primary);
        }
        .poten-card .poten-title { font-size: 17px; margin: 0 0 8px; color: var(--ink-900); }
        .poten-card.featured .poten-title { color: #fff; }
        .poten-card .poten-desc { font-size: 14px; color: var(--ink-500); line-height: 1.7; margin-bottom: 14px; }
        .poten-card.featured .poten-desc { color: rgba(255,255,255,0.82); }
        .poten-card .p-more {
            color: var(--primary);
            font-weight: 700;
            font-size: 13.5px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: gap 0.2s;
            margin-top: auto;
        }
        .poten-card:hover .p-more { gap: 9px; }
        .poten-card.featured .p-more { color: #fde68a; }
        .poten-card .src {
            margin-top: 14px;
            padding: 12px 14px;
            background: rgba(253,230,138,0.12);
            border-left: 3px solid #fbbf24;
            border-radius: 0 10px 10px 0;
            font-size: 12.5px;
            display: flex;
            gap: 12px;
            align-items: flex-start;
            color: inherit;
        }
        .poten-card.featured .src { color: #fde68a; }
        .poten-card .src i { font-size: 18px; color: #fbbf24; flex-shrink: 0; margin-top: 1px; }
        .poten-card .src a { font-weight: 600; color: inherit; text-decoration: underline; }

        /* --- ORG CARDS (blade: .org-banner.org-pkk, .org-banner.org-kwt, .org-name, .org-points) --- */
        .org-card.pkk .org-banner, .org-card .org-banner.org-pkk {
            background: linear-gradient(135deg, #9d174d 0%, #be185d 60%, #ec4899 100%);
            padding: 28px;
            display: flex;
            align-items: center;
            gap: 16px;
            color: #fff;
        }
        .org-card.kwt .org-banner, .org-card .org-banner.org-kwt {
            background: linear-gradient(135deg, #065f46 0%, #047857 60%, #059669 100%);
            padding: 28px;
            display: flex;
            align-items: center;
            gap: 16px;
            color: #fff;
        }
        .org-card .org-banner i,
        .org-card .org-badge {
            width: 62px;
            height: 62px;
            border-radius: 16px;
            background: rgba(255,255,255,0.18);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            flex-shrink: 0;
            border: 1px solid rgba(255,255,255,0.22);
        }
        .org-name { font-size: 20px; margin: 0 0 3px; font-weight: 800; color: #fff; }
        .org-banner div small { font-size: 12.5px; color: rgba(255,255,255,0.82); font-weight: 600; letter-spacing: 0.05em;}
        .org-body { padding: 26px; flex: 1; }
        .org-points { list-style: none; padding: 0; margin: 18px 0 0; }
        .org-points li {
            padding: 8px 0;
            font-size: 14px;
            color: var(--ink-700);
            font-weight: 500;
            border-bottom: 1px dashed rgba(15,23,42,0.06);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .org-points li:last-child { border-bottom: none; }
        .org-points li i {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* --- FACILITY CARD (blade: fac-photo, fac-body, fac-name, fac-desc, fac-photo .overlay-ic) --- */
        .fac-card .fac-photo,
        .fac-card .f-photo {
            aspect-ratio: 16/10;
            overflow: hidden;
            position: relative;
            background: linear-gradient(135deg, var(--primary-mid), var(--primary-light));
        }
        .fac-card .fac-photo img,
        .fac-card .f-photo img { width:100%; height:100%; object-fit: cover; transition: transform 0.5s;}
        .fac-card:hover .fac-photo img,
        .fac-card:hover .f-photo img { transform: scale(1.07); }
        .fac-photo .overlay-ic,
        .f-photo .overlay-ic {
            position: absolute; inset: 0;
            display: flex; align-items: center; justify-content: center;
            font-size: 60px; color: rgba(6,95,70,0.35);
        }
        .fac-body, .f-body { padding: 22px; flex: 1; display: flex; flex-direction: column; }
        .fac-name, .f-body h4 { font-size: 18px; margin-bottom: 10px; color: var(--ink-900); }
        .fac-desc, .f-body p { font-size: 14px; color: var(--ink-500); line-height: 1.7; flex: 1; margin: 0; }
        .fac-photo { position: relative; }

        /* --- GALLERY (blade: capt-tag, capt-name, capt-desc) --- */
        .capt-tag {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(251,191,36,0.95);
            color: #78350f;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 8px;
            margin-bottom: 6px;
        }
        .capt-name {
            display: block;
            font-size: 15px;
            font-weight: 700;
            color: #fff;
        }
        .capt-desc {
            font-size: 12px;
            color: rgba(255,255,255,0.82);
        }

        /* --- PAGE HERO crumb fix --- */
        .page-hero .crumb,
        .crumb {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            font-size: 13.5px;
            margin-bottom: 14px;
            font-weight: 500;
            letter-spacing: 0.01em;
        }
        .page-hero .crumb i { font-size: 12px; opacity: 0.85; }
        .page-hero .crumb .active {
            color: #fde68a;
            font-weight: 700;
        }
        .crumb a:hover { text-decoration: underline; }

        /* --- SEC HEAD center/left alignment --- */
        .sec-head.text-center .sec-sub { margin-left: auto; margin-right: auto; }
        .sec-head.text-left { margin-bottom: 42px; }
        .sec-head.text-left .sec-sub { margin: 0; }
        .sec-head.text-center { text-align: center; }

        /* --- CONTENT BODY (sejarah / geografis text page) --- */
        .content-body h2, .content-body h3, .content-body h4 {
            color: var(--primary-dark);
            margin-top: 1.75rem;
            margin-bottom: 0.8rem;
            font-weight: 800;
        }
        .content-body h2 { font-size: 1.55rem; }
        .content-body h3 { font-size: 1.25rem; }
        .content-body p { margin-bottom: 1rem; color: var(--ink-700);}
        .content-body ul, .content-body ol { margin-bottom: 1rem; padding-left: 1.4rem; }
        .content-body li { margin-bottom: 0.4rem; color: var(--ink-700); line-height: 1.8;}
        .content-body blockquote {
            border-left: 4px solid var(--primary);
            padding: 12px 18px;
            background: var(--primary-light);
            color: var(--primary-dark);
            border-radius: 0 12px 12px 0;
            font-weight: 500;
            margin: 1.5rem 0;
        }
        .content-body img { max-width: 100%; border-radius: var(--radius-md); margin: 1rem 0; box-shadow: var(--shadow-sm);}

        /* --- TABLE responsive for kependudukan --- */
        .table-responsive-custom { overflow-x: auto; border-radius: 14px; }
        .table thead th {
            background: #ecfdf5 !important;
            color: var(--primary-dark) !important;
            font-weight: 700 !important;
            border-bottom: 2px solid rgba(5,150,105,0.2) !important;
            font-size: 14px;
        }
        .table thead th:first-child { border-top-left-radius: 14px; }
        .table thead th:last-child { border-top-right-radius: 14px; }
        .table td, .table th { padding: 14px 18px !important; vertical-align: middle !important; border-color: rgba(15,23,42,0.06) !important; }
        .table tbody tr:hover td { background: #f9fafb; }
    </style>
</head>
<body>

<!-- ====== NAVBAR ====== -->
<header class="nav-main">
    <div class="wrap-container nav-inner">
        <a class="logo-brand" href="{{ route('home') }}">
            <span class="logo-badge">DJ</span>
            <span class="logo-text">
                <span class="b1">Dusun Jlegongan</span>
                <span class="b2">Desa Wisata Budaya</span>
            </span>
        </a>

        <nav class="nav-links" id="deskNav">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'nav-active' : '' }}">Beranda</a>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    Profil <i class="bi bi-chevron-down" style="font-size: 11px; opacity: 0.7;"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('sejarah') }}"><i class="bi bi-book"></i> Sejarah Dusun</a></li>
                    <li><a class="dropdown-item" href="{{ route('geografis') }}"><i class="bi bi-map"></i> Peta &amp; Geografis</a></li>
                    <li><a class="dropdown-item" href="{{ route('struktur') }}"><i class="bi bi-diagram-2-fill"></i> Struktur Kepadukuhan</a></li>
                </ul>
            </div>
            <a href="{{ route('kependudukan') }}" class="{{ request()->routeIs('kependudukan') ? 'nav-active' : '' }}">Kependudukan</a>
            <a href="{{ route('kegiatan') }}" class="{{ request()->routeIs('kegiatan') ? 'nav-active' : '' }}">Kegiatan</a>
            <a href="{{ route('fasilitas') }}" class="{{ request()->routeIs('fasilitas') ? 'nav-active' : '' }}">Fasilitas</a>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    Informasi <i class="bi bi-chevron-down" style="font-size: 11px; opacity: 0.7;"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('potensi') }}"><i class="bi bi-graph-up-arrow"></i> Potensi Dusun</a></li>
                    <li><a class="dropdown-item" href="{{ route('jadwal') }}"><i class="bi bi-calendar4-week"></i> Jadwal Rutin</a></li>
                    <li><a class="dropdown-item" href="{{ route('pkk-kwt') }}"><i class="bi bi-diagram-3"></i> PKK &amp; KWT</a></li>
                    <li><a class="dropdown-item" href="{{ route('galeri') }}"><i class="bi bi-images"></i> Galeri Foto</a></li>
                </ul>
            </div>
        </nav>

        <button class="hamburger-btn" type="button" onclick="document.getElementById('mobNav').classList.toggle('open')">
            <i class="bi bi-list fs-5"></i>
        </button>
    </div>
    <div class="nav-mobile" id="mobNav">
        <a href="{{ route('home') }}"><i class="bi bi-house-door me-2"></i>Beranda</a>
        <div class="drop-title fw-bold mt-2 text-uppercase" style="font-size: 12px; color: var(--ink-500); letter-spacing: 0.08em;">Profil</div>
        <div class="drop-list">
            <a href="{{ route('sejarah') }}"><i class="bi bi-book me-2"></i>Sejarah Dusun</a>
            <a href="{{ route('geografis') }}"><i class="bi bi-map me-2"></i>Peta &amp; Geografis</a>
            <a href="{{ route('struktur') }}"><i class="bi bi-diagram-2-fill me-2"></i>Struktur Kepadukuhan</a>
        </div>
        <a href="{{ route('kependudukan') }}"><i class="bi bi-people me-2"></i>Kependudukan</a>
        <a href="{{ route('kegiatan') }}"><i class="bi bi-calendar-event me-2"></i>Kegiatan</a>
        <a href="{{ route('fasilitas') }}"><i class="bi bi-building me-2"></i>Fasilitas</a>
        <div class="drop-title fw-bold mt-2 text-uppercase" style="font-size: 12px; color: var(--ink-500); letter-spacing: 0.08em;">Informasi</div>
        <div class="drop-list">
            <a href="{{ route('potensi') }}"><i class="bi bi-graph-up-arrow me-2"></i>Potensi Dusun</a>
            <a href="{{ route('jadwal') }}"><i class="bi bi-calendar4-week me-2"></i>Jadwal Rutin</a>
            <a href="{{ route('pkk-kwt') }}"><i class="bi bi-diagram-3 me-2"></i>PKK &amp; KWT</a>
            <a href="{{ route('galeri') }}"><i class="bi bi-images me-2"></i>Galeri Foto</a>
        </div>
    </div>
</header>

<!-- ====== CONTENT ====== -->
@yield('content')

<!-- ====== FOOTER ====== -->
<footer class="footer">
    <div class="wrap-container">
        <div class="row g-5">
            <div class="col-lg-4 col-md-5">
                <a href="{{ route('home') }}" class="logo-brand" style="color: #fff;">
                    <span class="logo-badge">DJ</span>
                    <span class="logo-text">
                        <span class="b1" style="color:#fff;">Dusun Jlegongan</span>
                        <span class="b2" style="color: rgba(255,255,255,0.55);">Kabupaten Sleman, DIY</span>
                    </span>
                </a>
                <p class="about-text">
                    Dusun yang kaya akan nilai budaya toleransi dan gotong royong. Warga hidup berdampingan rukun, damai, dan penuh kehangatan dalam perbedaan.
                </p>
            </div>
            <div class="col-lg-2 col-md-3">
                <h5>Menu</h5>
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('sejarah') }}">Sejarah</a></li>
                    <li><a href="{{ route('geografis') }}">Geografis</a></li>
                    <li><a href="{{ route('struktur') }}">Struktur Kepadukuhan</a></li>
                    <li><a href="{{ route('kependudukan') }}">Kependudukan</a></li>
                    <li><a href="{{ route('galeri') }}">Galeri</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4">
                <h5>Informasi</h5>
                <ul>
                    <li><a href="{{ route('kegiatan') }}">Kegiatan Warga</a></li>
                    <li><a href="{{ route('fasilitas') }}">Fasilitas Umum</a></li>
                    <li><a href="{{ route('potensi') }}">Potensi Dusun</a></li>
                    <li><a href="{{ route('jadwal') }}">Jadwal Rutin</a></li>
                    <li><a href="{{ route('pkk-kwt') }}">PKK &amp; KWT</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-12">
                <h5>Kontak Kami</h5>
                <ul class="contact-list">
                    <li><i class="bi bi-geo-alt-fill"></i> <span>Dusun Jlegongan, Kalurahan Margodadi, Kecamatan Seyegan, Kabupaten Sleman, D.I. Yogyakarta 55561</span></li>
                    <li><i class="bi bi-telephone-fill"></i> <span>{{ $kontakGlobal && $kontakGlobal->description ? $kontakGlobal->description : '(0274) 123 4567' }}</span></li>
                    <li><i class="bi bi-clock-fill"></i> <span>Senin - Minggu, 24 Jam Layanan Informasi</span></li>
                </ul>
            </div>
        </div>
        <div class="copyright-bar text-center text-md-start d-md-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2">
                <span class="logo-badge" style="width:30px;height:30px;font-size:11px;border-radius:9px;box-shadow:none;">DJ</span>
                <span class="cr-logo">Dusun Jlegongan</span>
                <span class="mx-2">·</span>
                &copy; {{ date('Y') }} All Rights Reserved.
            </div>
            <div class="mt-2 mt-md-0">
                Dibuat dengan penuh <i class="bi bi-heart-fill text-danger"></i> untuk Indonesia.
            </div>
        </div>
    </div>
</footer>

<button class="to-top" id="toTopBtn" aria-label="Kembali ke atas" onclick="window.scrollTo({top:0,behavior:'smooth'})">
    <i class="bi bi-chevron-up"></i>
</button>

<div class="lb" id="lightboxEl" onclick="if(event.target===this)closeLB()">
    <button class="lb-x" onclick="closeLB()" aria-label="tutup"><i class="bi bi-x-lg"></i></button>
    <img id="lbImg" src="" alt="">
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const tb = document.getElementById('toTopBtn');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 420) tb.classList.add('vis'); else tb.classList.remove('vis');
    });
    function openLB(src){
        document.getElementById('lbImg').src = src;
        document.getElementById('lightboxEl').classList.add('open');
        document.body.style.overflow='hidden';
    }
    function closeLB(){
        document.getElementById('lightboxEl').classList.remove('open');
        document.body.style.overflow='';
    }
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLB(); });

    // Tutup mobile nav ketika klik link
    document.querySelectorAll('#mobNav a').forEach(a => a.addEventListener('click', () => {
        document.getElementById('mobNav').classList.remove('open');
    }));
</script>
@stack('scripts')
</body>
</html>
