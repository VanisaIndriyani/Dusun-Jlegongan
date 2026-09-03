<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') | Admin Dusun Jlegongan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #059669;
            --primary-dark: #047857;
            --primary-darker: #065f46;
            --primary-light: #d1fae5;
            --primary-50: #ecfdf5;
            --sidebar-width: 272px;
            --sidebar-collapsed: 0px;
            --ink-900: #0f172a;
            --ink-700: #334155;
            --ink-500: #64748b;
            --paper: #f8fafc;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 22px;
            --shadow-sm: 0 1px 2px rgba(15,23,42,0.05);
            --shadow-md: 0 6px 18px rgba(15,23,42,0.06);
            --shadow-lg: 0 22px 48px rgba(15,23,42,0.10);
        }

        * { box-sizing: border-box; -webkit-font-smoothing: antialiased; }      
        html, body { margin: 0; padding: 0; overflow-x: hidden; }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--paper);
            color: var(--ink-700);
            line-height: 1.6;
            font-size: 14.5px;
        }

        h1,h2,h3,h4,h5,h6 { color: var(--ink-900); font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; letter-spacing: -0.01em; }
        a { text-decoration: none; }

        .wrap-admin-content { max-width: 1440px; }

        /* ========== SIDEBAR ========== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background:
                radial-gradient(800px 500px at 120% -20%, rgba(167,243,208,0.38), transparent 60%),
                radial-gradient(600px 700px at -20% 120%, rgba(52,211,153,0.30), transparent 60%),
                linear-gradient(180deg, #064e3b 0%, #047857 45%, #059669 100%);
            color: #fff;
            z-index: 1040;
            overflow-y: auto;
            overflow-x: hidden;
            transition: transform .35s cubic-bezier(.25,.8,.3,1);
            border-right: 1px solid rgba(255,255,255,0.08);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            display: flex;
            flex-direction: column;
        }
        /* Subtle noise/pattern */
        .sidebar::before {
            content: '';
            position: absolute; inset: 0; pointer-events: none; z-index: 0;     
            background-image:
                radial-gradient(circle at 20% 18%, rgba(255,255,255,0.08) 0%, transparent 32%),
                radial-gradient(circle at 80% 85%, rgba(253,224,71,0.12) 0%, transparent 35%);
        }
        .sidebar > * { position: relative; z-index: 1; }

        .sidebar::-webkit-scrollbar { width: 6px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.18); border-radius: 999px; }

        /* Sidebar logo CENTERED */
        .sidebar-logo {
            padding: 26px 22px 22px;
            border-bottom: 1px solid rgba(255,255,255,0.10);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 12px;
        }
        .sidebar-logo .logo-badge {
            width: 58px; height: 58px; border-radius: 18px;
            background: linear-gradient(135deg, #ffffff 0%, #a7f3d0 45%, #fde68a 100%);
            color: var(--primary-darker);
            display: inline-flex; align-items: center; justify-content: center; 
            font-weight: 900; font-size: 1.55rem; letter-spacing: 0.02em;       
            box-shadow:
                0 16px 30px rgba(4,120,87,0.28),
                0 0 0 4px rgba(255,255,255,0.08),
                inset 0 2px 0 rgba(255,255,255,0.7);
        }
        .sidebar-logo h5 {
            font-weight: 800; margin: 0; font-size: 1.02rem;
            letter-spacing: -0.01em; line-height: 1.2;
        }
        .sidebar-logo small.tagline {
            display: inline-block;
            background: rgba(255,255,255,0.10);
            color: #bbf7d0;
            font-size: 0.72rem; font-weight: 600;
            padding: 4px 12px;
            border-radius: 999px;
            letter-spacing: 0.05em;
            border: 1px solid rgba(255,255,255,0.14);
        }

        /* Menu */
        .sidebar-menu {
            padding: 18px 14px 180px;
            flex: 1 1 auto;
        }
        .menu-section {
            padding: 18px 14px 8px;
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 0.10em;
            color: rgba(167,243,208,0.68);
            font-weight: 700;
        }
        .nav-link-admin {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            color: rgba(209,250,229,0.85);
            text-decoration: none;
            border-radius: 12px;
            margin-bottom: 3px;
            font-weight: 600;
            transition: all .22s ease;
            font-size: 0.9rem;
            position: relative;
            border: 1px solid transparent;
        }
        .nav-link-admin i {
            font-size: 1.05rem;
            width: 22px;
            text-align: center;
            flex-shrink: 0;
            opacity: 0.92;
        }
        .nav-link-admin:hover {
            background: rgba(255,255,255,0.10);
            color: #fff;
            transform: translateX(2px);
            border-color: rgba(255,255,255,0.08);
        }
        .nav-link-admin.active {
            background: linear-gradient(135deg, rgba(255,255,255,0.22) 0%, rgba(255,255,255,0.12) 100%);
            color: #fff;
            box-shadow:
                inset 0 0 0 1px rgba(255,255,255,0.22),
                0 8px 22px rgba(15,23,42,0.16);
        }
        .nav-link-admin.active::before {
            content: '';
            position: absolute; left: -14px; top: 50%; transform: translateY(-50%);
            width: 4px; height: 28px;
            background: linear-gradient(180deg, #fde68a, #fbbf24);
            border-radius: 0 6px 6px 0;
            box-shadow: 0 0 12px rgba(251,191,36,0.65);
        }
        .nav-link-admin.active i { opacity: 1; color: #fde68a; }

        /* Logout permanen di paling BAWAH */
        .sidebar-logout {
            position: sticky; bottom: 0;
            padding: 14px;
            border-top: 1px solid rgba(255,255,255,0.10);
            background:
                linear-gradient(180deg, rgba(6,78,59,0) 0%, rgba(6,78,59,0.85) 30%, rgba(6,78,59,1) 100%);
            backdrop-filter: blur(6px);
            z-index: 2;
            margin-top: auto;
        }
        .btn-logout {
            display: flex; align-items: center; justify-content: center; gap: 10px;
            width: 100%; padding: 11px 14px;
            background: linear-gradient(135deg, rgba(239,68,68,0.22), rgba(220,38,38,0.20));
            border: 1px solid rgba(254,202,202,0.18);
            color: #fecaca;
            border-radius: 12px;
            font-weight: 700; font-size: 0.9rem;
            transition: all .22s ease;
        }
        .btn-logout:hover {
            background: linear-gradient(135deg, #dc2626, #ef4444);
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 10px 24px rgba(220,38,38,0.30);
            border-color: transparent;
        }
        .btn-logout i { font-size: 1rem; }

        /* ========== MAIN + TOPBAR ========== */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: margin-left .35s cubic-bezier(.25,.8,.3,1);
        }

        /* Topbar glassmorphism premium */
        .topbar {
            background: rgba(255,255,255,0.78);
            backdrop-filter: saturate(180%) blur(16px);
            -webkit-backdrop-filter: saturate(180%) blur(16px);
            padding: 16px 34px;
            border-bottom: 1px solid rgba(148,163,184,0.14);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky; top: 0; z-index: 100;
        }
        .hamburger {
            display: none;
            background: rgba(5,150,105,0.10);
            color: var(--primary);
            border: 1px solid rgba(5,150,105,0.16);
            width: 42px; height: 42px; border-radius: 12px;
            align-items: center; justify-content: center;
            font-size: 1.2rem;
            transition: all .2s ease;
        }
        .hamburger:hover { background: var(--primary); color: #fff; }
        .topbar-title h4 {
            font-weight: 800; margin: 0; color: var(--ink-900);
            letter-spacing: -0.02em; font-size: 1.15rem;
        }
        .topbar-user {
            display: flex; align-items: center; gap: 14px;
        }
        .btn-visit-site {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 8px 16px; border-radius: 999px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            font-weight: 600; font-size: 0.82rem;
            border: none;
            box-shadow: 0 10px 20px rgba(5,150,105,0.24);
            transition: all .22s ease;
        }
        .btn-visit-site:hover {
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 14px 28px rgba(5,150,105,0.32);
        }
        .user-avatar {
            width: 42px; height: 42px;
            background: linear-gradient(135deg, var(--primary), var(--primary-darker));
            color: #fff;
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 0.95rem;
            box-shadow: 0 8px 18px rgba(5,150,105,0.22), inset 0 1px 0 rgba(255,255,255,0.25);
        }

        .content-body {
            padding: 32px 34px 60px;
            flex-grow: 1;
        }

        /* Cards & components premium */
        .card {
            border: 1px solid rgba(148,163,184,0.12);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            background: #fff;
            overflow: hidden;
        }
        .card-header {
            background: #fff;
            border-bottom: 1px solid rgba(148,163,184,0.10);
            padding: 20px 24px;
            border-radius: var(--radius-lg) var(--radius-lg) 0 0 !important;
            display: flex; align-items: center; justify-content: space-between; gap: 16px;
        }
        .card-header h5 { margin: 0; font-size: 1rem; }
        .card-body { padding: 24px; }

        .stat-card {
            background: #fff;
            border: 1px solid rgba(148,163,184,0.12);
            border-radius: var(--radius-lg);
            padding: 22px;
            box-shadow: var(--shadow-sm);
            display: flex; align-items: flex-start; gap: 16px;
            transition: all .24s ease;
            position: relative; overflow: hidden;
        }
        .stat-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }
        .stat-card::after {
            content: ''; position: absolute; top: -40px; right: -40px; pointer-events: none;
            width: 120px; height: 120px; border-radius: 50%;
            background: radial-gradient(circle, rgba(5,150,105,0.12) 0%, transparent 60%);
        }
        .stat-icon {
            width: 56px; height: 56px; border-radius: 16px;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 1.5rem; flex-shrink: 0;
        }
        .stat-number {
            font-size: 1.75rem; font-weight: 800;
            color: var(--ink-900); line-height: 1; margin-bottom: 6px;
            letter-spacing: -0.02em;
        }
        .stat-label {
            font-size: 0.82rem; color: var(--ink-500); font-weight: 600;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none; color: #fff;
            font-weight: 600; padding: 10px 20px; border-radius: 12px;
            box-shadow: 0 8px 18px rgba(5,150,105,0.24);
            transition: all .22s ease;
            display: inline-flex; align-items: center; gap: 8px;
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 26px rgba(5,150,105,0.32);
            filter: brightness(1.05);
        }
        .btn-outline-primary {
            border: 1.5px solid rgba(5,150,105,0.24);
            background: #fff; color: var(--primary);
            font-weight: 600; padding: 9px 18px; border-radius: 12px;
            transition: all .22s ease;
        }
        .btn-outline-primary:hover { background: var(--primary); border-color: var(--primary); color: #fff; }
        .btn-sm { padding: 6px 12px; font-size: 0.80rem; border-radius: 10px; box-shadow: none; }

        .alert { border: none; border-radius: var(--radius-md); }
        .alert-success { background: #ecfdf5; color: #065f46; border-left: 4px solid #10b981; }
        .alert-danger  { background: #fef2f2; color: #991b1b; border-left: 4px solid #ef4444; }

        .table thead {
            background: linear-gradient(180deg, #f8fafc, #f1f5f9);
        }
        .table th {
            font-weight: 700; font-size: 0.78rem;
            color: var(--ink-700);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 14px 16px;
            border-bottom: 1px solid #e2e8f0;
        }
        .table td {
            padding: 16px;
            vertical-align: middle;
            font-size: 0.9rem;
            color: var(--ink-700);
            border-bottom: 1px solid #f1f5f9;
        }
        .table-hover tbody tr:hover { background: #f8fafc; }

        .img-preview {
            width: 60px; height: 60px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            background: #f8fafc;
        }

        .form-label {
            font-weight: 700; font-size: 0.88rem;
            color: var(--ink-700); margin-bottom: 8px;
        }
        .form-control, .form-select, .form-check-input {
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            padding: 10px 14px;
            font-size: 0.92rem;
            transition: all .2s ease;
            background: #fff;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(5,150,105,0.14);
            background: #fff;
        }

        .back-btn {
            display: inline-flex; align-items: center; gap: 8px;
            color: var(--ink-500); text-decoration: none;
            font-weight: 600; font-size: 0.85rem;
            padding: 7px 14px; border-radius: 10px;
            margin-bottom: 18px;
            transition: all .2s;
        }
        .back-btn:hover { background: #e2e8f0; color: var(--ink-900); }

        .badge-soft {
            padding: 5px 12px;
            border-radius: 999px;
            font-size: 0.76rem;
            font-weight: 700;
        }
        .badge-soft.emerald { background: #ecfdf5; color: #047857; }
        .badge-soft.amber   { background: #fffbeb; color: #b45309; }
        .badge-soft.blue    { background: #eff6ff; color: #1d4ed8; }
        .badge-soft.pink    { background: #fdf2f8; color: #be185d; }
        .badge-soft.slate   { background: #f1f5f9; color: #334155; }

        .table-responsive-custom {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-radius: var(--radius-lg);
        }

        /* ====== OVERLAY & MOBILE ====== */
        .sidebar-overlay {
            display: none;
            position: fixed; inset: 0;
            background: rgba(15,23,42,0.50);
            backdrop-filter: blur(4px);
            z-index: 1035;
            opacity: 0;
            transition: opacity .3s ease;
        }
        .sidebar-overlay.show { display: block; opacity: 1; }

        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); box-shadow: 20px 0 60px rgba(15,23,42,0.30); }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
            .hamburger { display: inline-flex; }
            .topbar { padding: 12px 18px; }
            .content-body { padding: 22px 18px 60px; }
            .topbar-title h4 { font-size: 1rem; }
        }
        @media (max-width: 576px) {
            :root { --sidebar-width: 86vw; }
            .sidebar-logo { padding: 22px 18px 18px; }
            .sidebar-menu { padding: 14px 10px 180px; }
            .btn-visit-site span.label { display: none; }
        }
    </style>
</head>
<body>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<aside class="sidebar" id="sidebar" role="navigation" aria-label="Admin Navigation">
    <div class="sidebar-logo">
        <span class="logo-badge">DJ</span>
        <div>
            <h5>Dusun Jlegongan</h5>
            <small class="tagline mt-1 d-block">ADMIN PANEL</small>
        </div>
    </div>

    <div class="sidebar-menu">
        <div class="menu-section">Utama</div>
        <a href="{{ route('admin.dashboard') }}" class="nav-link-admin {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i><span>Dashboard</span>
        </a>

        <div class="menu-section">Master Konten</div>
        <a href="{{ route('admin.contents.index') }}" class="nav-link-admin {{ request()->routeIs('admin.contents.*') ? 'active' : '' }}">
            <i class="bi bi-journal-text"></i><span>Konten Halaman</span>
        </a>
        <a href="{{ route('admin.population-statistics.index') }}" class="nav-link-admin {{ request()->routeIs('admin.population-statistics.*') ? 'active' : '' }}">
            <i class="bi bi-bar-chart-line-fill"></i><span>Data Kependudukan</span>
        </a>
        <a href="{{ route('admin.activities.index') }}" class="nav-link-admin {{ request()->routeIs('admin.activities.*') ? 'active' : '' }}">
            <i class="bi bi-people-fill"></i><span>Kegiatan Warga</span>
        </a>
        <a href="{{ route('admin.facilities.index') }}" class="nav-link-admin {{ request()->routeIs('admin.facilities.*') ? 'active' : '' }}">
            <i class="bi bi-building-fill-check"></i><span>Fasilitas Umum</span>
        </a>

        <div class="menu-section">Informasi &amp; Media</div>
        <a href="{{ route('admin.potentials.index') }}" class="nav-link-admin {{ request()->routeIs('admin.potentials.*') ? 'active' : '' }}">
            <i class="bi bi-graph-up-arrow"></i><span>Potensi Dusun</span>
        </a>
        <a href="{{ route('admin.schedules.index') }}" class="nav-link-admin {{ request()->routeIs('admin.schedules.*') ? 'active' : '' }}">
            <i class="bi bi-calendar3-week-fill"></i><span>Jadwal Rutin</span>
        </a>
        <a href="{{ route('admin.organizations.index') }}" class="nav-link-admin {{ request()->routeIs('admin.organizations.*') ? 'active' : '' }}">
            <i class="bi-diagram-3-fill"></i><span>PKK &amp; KWT</span>
        </a>
        <a href="{{ route('admin.galleries.index') }}" class="nav-link-admin {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
            <i class="bi bi-images"></i><span>Galeri Foto</span>
        </a>
    </div>

    <div class="sidebar-logout">
        <a href="{{ route('admin.logout') }}" class="btn-logout"
           onclick="return confirm('Anda yakin ingin keluar dari panel admin?');">
            <i class="bi bi-box-arrow-left"></i><span>Logout &mdash; Kembali ke Home</span>
        </a>
    </div>
</aside>

<div class="main-content">
    <div class="topbar">
        <div class="d-flex align-items-center gap-3">
            <button class="hamburger" onclick="toggleSidebar()" aria-label="Toggle Sidebar"><i class="bi bi-list"></i></button>
            <div class="topbar-title">
                <h4>@yield('page-title', 'Dashboard')</h4>
            </div>
        </div>
        <div class="topbar-user">
            <a href="{{ route('home') }}" target="_blank" class="btn-visit-site d-none d-sm-inline-flex">
                <i class="bi bi-box-arrow-up-right"></i><span class="label">Lihat Website</span>
            </a>
            <div class="user-avatar">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</div>
            <div class="d-none d-md-block" style="line-height:1.15;">
                <div class="fw-bold" style="font-size: 0.88rem; color: var(--ink-900);">{{ auth()->user()->name ?? 'Admin' }}</div>
                <small class="text-muted" style="font-size: 0.72rem; font-weight: 600;">
                    <i class="bi bi-patch-check-fill" style="color: var(--primary);"></i> Administrator
                </small>
            </div>
        </div>
    </div>

    <div class="content-body">
        @if(session('success'))
        <div class="alert alert-success d-flex align-items-center gap-3 mb-4" role="alert">
            <i class="bi bi-check-circle-fill fs-5" style="color:#10b981;"></i>
            <div class="fw-semibold">{{ session('success') }}</div>
        </div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger mb-4" role="alert">
            <div class="fw-bold mb-2 d-flex align-items-center gap-2">
                <i class="bi bi-exclamation-triangle-fill" style="color:#dc2626;"></i>
                Ada kesalahan pada input:
            </div>
            <ul class="mb-0 ps-3 small fw-medium">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleSidebar(forceState) {
        const sb = document.getElementById('sidebar');
        const ov = document.getElementById('sidebarOverlay');
        if (typeof forceState === 'boolean') {
            sb.classList.toggle('show', forceState);
            ov.classList.toggle('show', forceState);
        } else {
            sb.classList.toggle('show');
            ov.classList.toggle('show');
        }
        document.body.style.overflow = sb.classList.contains('show') && window.innerWidth <= 992 ? 'hidden' : '';
    }
    // Close sidebar via ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') toggleSidebar(false);
    });
    // Auto-close sidebar on window resize to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth > 992) toggleSidebar(false);
    });
</script>
@stack('scripts')
</body>
</html>
