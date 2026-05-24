<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') — HVRF Admin</title>
    <link rel="icon" type="image/jpeg" href="/images/logo.jpeg">
    <link rel="apple-touch-icon" href="/images/logo.jpeg">

    {{-- Plus Jakarta Sans ≈ Euclid Circular A (MongoDB's typeface) --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    {{-- Bootstrap 5 (grid + utilities only) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
    /* ═══════════════════════════════════════════════════════════
       MONGODB DESIGN SYSTEM — ADMIN PANEL TOKENS (WHITE MODE)
    ═══════════════════════════════════════════════════════════ */
    :root {
        /* Brand */
        --mg-green:           #00ed64;
        --mg-green-dark:      #00684a;
        --mg-green-mid:       #00a35c;
        --mg-green-pressed:   #00b545;
        --mg-green-soft:      #e6fdf0;
        --mg-teal-deep:       #001e2b;
        --mg-teal:            #003d4f;
        --mg-teal-mid:        #00684a;
        /* Surface */
        --mg-surface:         #ffffff;
        --mg-surface-2:       #f7f9fb;
        --mg-surface-3:       #eef1f4;
        /* Hairline */
        --mg-hairline-dark:   #1c2d38;
        --mg-hairline:        #e1e5e8;
        --mg-hairline-strong: #c1ccd6;
        /* Text */
        --mg-text:            #1a202c;
        --mg-text-muted:      #5c6c7a;
        --mg-text-subtle:     #7c8c9a;
        --mg-on-dark:         #ffffff;
        --mg-on-dark-muted:   #a8b3bc;
        --mg-stone:           #7c8c9a;
        --mg-steel:           #5c6c7a;
        --mg-on-primary:      #001e2b;
        /* Elevation */
        --mg-shadow-1: 0px 1px 3px rgba(0,30,43,0.07), 0 1px 2px rgba(0,30,43,0.04);
        --mg-shadow-2: 0px 4px 12px rgba(0,30,43,0.10);
        --mg-shadow-3: 0px 12px 24px -4px rgba(0,30,43,0.14);
        /* Radius */
        --mg-r-xs:   4px;
        --mg-r-sm:   6px;
        --mg-r-md:   8px;
        --mg-r-lg:   12px;
        --mg-r-xl:   16px;
        --mg-r-full: 9999px;
        /* Layout */
        --sidebar-w: 252px;
    }

    /* ── BASE ── */
    *, *::before, *::after { box-sizing: border-box; }
    html { font-size: 16px; }
    body {
        font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        background: var(--mg-surface-2);
        color: var(--mg-text);
        font-size: 14px;
        line-height: 1.55;
        overflow-x: hidden;
        margin: 0;
    }
    ::selection { background: var(--mg-green); color: var(--mg-on-primary); }
    ::-webkit-scrollbar { width: 5px; }
    ::-webkit-scrollbar-track { background: var(--mg-surface-3); }
    ::-webkit-scrollbar-thumb { background: var(--mg-hairline-strong); border-radius: var(--mg-r-full); }

    /* ── SIDEBAR ── */
    .admin-sidebar {
        position: fixed;
        top: 0; left: 0;
        width: var(--sidebar-w);
        height: 100vh;
        background: var(--mg-teal-deep);
        border-right: 1px solid var(--mg-hairline-dark);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        z-index: 1030;
        transition: transform 0.22s cubic-bezier(.4,0,.2,1);
    }

    .sidebar-brand {
        display: flex;
        align-items: center;
        gap: 0.7rem;
        padding: 1.1rem 1.1rem;
        border-bottom: 1px solid var(--mg-hairline-dark);
        text-decoration: none;
        flex-shrink: 0;
    }
    .sidebar-brand-logo {
        width: 32px; height: 32px;
        border-radius: var(--mg-r-md);
        object-fit: cover;
        border: 1px solid var(--mg-hairline-dark);
    }
    .sidebar-brand-name {
        font-size: 13px;
        font-weight: 700;
        color: var(--mg-on-dark);
        line-height: 1.25;
        letter-spacing: -0.2px;
    }
    .sidebar-brand-sub {
        font-size: 10.5px;
        color: var(--mg-stone);
        line-height: 1.3;
    }

    .sidebar-scroll {
        flex: 1;
        overflow-y: auto;
        padding: 0.65rem 0.7rem;
    }
    .sidebar-scroll::-webkit-scrollbar { width: 2px; }

    .sidebar-section-label {
        font-size: 10.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        color: var(--mg-stone);
        padding: 0.55rem 0.55rem 0.25rem;
        margin-top: 0.25rem;
    }
    .sidebar-divider {
        height: 1px;
        background: var(--mg-hairline-dark);
        margin: 0.4rem 0;
    }
    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.48rem 0.7rem;
        color: var(--mg-on-dark-muted);
        text-decoration: none;
        font-size: 13px;
        font-weight: 500;
        border-radius: var(--mg-r-md);
        margin-bottom: 1px;
        position: relative;
        transition: background 0.12s, color 0.12s;
        white-space: nowrap;
    }
    .sidebar-link i {
        font-size: 0.9rem;
        width: 16px;
        text-align: center;
        flex-shrink: 0;
        opacity: 0.65;
        transition: opacity 0.12s;
    }
    .sidebar-link:hover {
        background: rgba(255,255,255,0.04);
        color: var(--mg-on-dark);
    }
    .sidebar-link:hover i { opacity: 1; }
    .sidebar-link.active {
        background: rgba(0,237,100,0.09);
        color: var(--mg-green);
        font-weight: 600;
    }
    .sidebar-link.active i { opacity: 1; }
    .sidebar-link.active::before {
        content: '';
        position: absolute;
        left: -2px; top: 22%; bottom: 22%;
        width: 3px;
        background: var(--mg-green);
        border-radius: 0 var(--mg-r-full) var(--mg-r-full) 0;
    }
    .sidebar-badge {
        margin-left: auto;
        background: var(--mg-green);
        color: var(--mg-on-primary);
        border-radius: var(--mg-r-full);
        padding: 1px 8px;
        font-size: 10.5px;
        font-weight: 700;
        flex-shrink: 0;
    }

    .sidebar-footer {
        flex-shrink: 0;
        padding: 0.75rem 1rem;
        border-top: 1px solid var(--mg-hairline-dark);
        display: flex;
        align-items: center;
        gap: 0.65rem;
    }
    .sidebar-avatar {
        width: 29px; height: 29px;
        border-radius: var(--mg-r-full);
        background: var(--mg-teal);
        border: 1px solid var(--mg-hairline-dark);
        display: flex; align-items: center; justify-content: center;
        font-size: 11px; font-weight: 800;
        color: var(--mg-green);
        flex-shrink: 0;
        text-transform: uppercase;
    }
    .sidebar-user-name  { font-size: 12.5px; font-weight: 600; color: var(--mg-on-dark); line-height: 1.2; }
    .sidebar-user-role  { font-size: 10.5px; color: var(--mg-stone); }

    /* ── MAIN ── */
    .admin-main {
        margin-left: var(--sidebar-w);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        background: var(--mg-surface-2);
    }

    /* ── TOPBAR ── */
    .admin-topbar {
        height: 54px;
        background: var(--mg-surface);
        border-bottom: 1px solid var(--mg-hairline);
        padding: 0 1.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: sticky;
        top: 0;
        z-index: 200;
        flex-shrink: 0;
        box-shadow: var(--mg-shadow-1);
    }
    .topbar-left { display: flex; align-items: center; gap: 0.75rem; }
    .topbar-right { display: flex; align-items: center; gap: 0.65rem; }

    .topbar-breadcrumb {
        font-size: 12px;
        color: var(--mg-text-subtle);
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }
    .topbar-breadcrumb span { color: var(--mg-text-muted); }

    .topbar-user {
        display: flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.28rem 0.6rem 0.28rem 0.28rem;
        background: var(--mg-surface-2);
        border: 1px solid var(--mg-hairline);
        border-radius: var(--mg-r-full);
    }
    .topbar-avatar {
        width: 24px; height: 24px;
        border-radius: var(--mg-r-full);
        background: rgba(0,104,74,0.12);
        border: 1px solid rgba(0,104,74,0.22);
        display: flex; align-items: center; justify-content: center;
        font-size: 10px; font-weight: 800;
        color: var(--mg-green-dark);
        text-transform: uppercase;
    }
    .topbar-user-name { font-size: 12px; font-weight: 500; color: var(--mg-text-muted); }

    .topbar-icon-btn {
        width: 32px; height: 32px;
        display: flex; align-items: center; justify-content: center;
        background: var(--mg-surface-2);
        border: 1px solid var(--mg-hairline);
        border-radius: var(--mg-r-md);
        color: var(--mg-text-subtle);
        text-decoration: none;
        font-size: 0.85rem;
        transition: all 0.12s;
        cursor: pointer;
    }
    .topbar-icon-btn:hover { background: var(--mg-surface-3); color: var(--mg-text); }

    .sidebar-toggle {
        width: 32px; height: 32px;
        display: none; align-items: center; justify-content: center;
        background: var(--mg-surface-2);
        border: 1px solid var(--mg-hairline);
        border-radius: var(--mg-r-md);
        color: var(--mg-text-subtle);
        cursor: pointer;
        transition: all 0.12s;
        flex-shrink: 0;
    }
    .sidebar-toggle:hover { background: var(--mg-surface-3); color: var(--mg-text); }

    /* ── CONTENT ── */
    .admin-content { padding: 1.65rem; flex: 1; }
    .admin-content h1, .admin-content h2, .admin-content h3,
    .admin-content h4, .admin-content h5, .admin-content h6 { color: var(--mg-text); }
    .admin-content p:not(.text-muted) { color: var(--mg-text-muted); }

    /* ── STAT CARD ── */
    .stat-card {
        background: var(--mg-surface);
        border-radius: var(--mg-r-lg);
        padding: 1.35rem 1.5rem;
        border: 1px solid var(--mg-hairline);
        box-shadow: var(--mg-shadow-1);
        transition: box-shadow 0.15s, border-color 0.15s;
    }
    .stat-card:hover {
        box-shadow: var(--mg-shadow-2);
        border-color: rgba(0,104,74,0.25);
    }
    .stat-card .stat-icon {
        width: 40px; height: 40px;
        border-radius: var(--mg-r-md);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem;
    }

    /* ── MONGODB BUTTONS ── */
    .btn-mg-primary {
        display: inline-flex; align-items: center; gap: 0.4rem;
        background: var(--mg-green);
        color: var(--mg-on-primary) !important;
        border: none;
        border-radius: var(--mg-r-full);
        padding: 8px 20px;
        font-size: 13px; font-weight: 700;
        line-height: 1.3;
        cursor: pointer;
        transition: background 0.12s, transform 0.1s, box-shadow 0.12s;
        text-decoration: none;
        white-space: nowrap;
        font-family: inherit;
    }
    .btn-mg-primary:hover {
        background: var(--mg-green-pressed);
        color: var(--mg-on-primary) !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(0,237,100,0.25);
    }

    .btn-mg-secondary {
        display: inline-flex; align-items: center; gap: 0.4rem;
        background: var(--mg-surface);
        color: var(--mg-text) !important;
        border: 1px solid var(--mg-hairline-strong);
        border-radius: var(--mg-r-full);
        padding: 7px 18px;
        font-size: 13px; font-weight: 600;
        cursor: pointer;
        transition: all 0.12s;
        text-decoration: none;
        white-space: nowrap;
        font-family: inherit;
    }
    .btn-mg-secondary:hover {
        background: var(--mg-surface-3);
        color: var(--mg-text) !important;
        border-color: var(--mg-text-subtle);
    }

    .btn-mg-danger {
        display: inline-flex; align-items: center; gap: 0.4rem;
        background: rgba(231,76,60,0.07);
        color: #c0392b !important;
        border: 1px solid rgba(231,76,60,0.2);
        border-radius: var(--mg-r-full);
        padding: 6px 14px;
        font-size: 12.5px; font-weight: 600;
        cursor: pointer;
        transition: all 0.12s;
        text-decoration: none;
        white-space: nowrap;
        font-family: inherit;
    }
    .btn-mg-danger:hover { background: rgba(231,76,60,0.14); color: #a93226 !important; }

    .btn-mg-ghost {
        display: inline-flex; align-items: center; gap: 0.4rem;
        background: transparent;
        color: var(--mg-text-subtle) !important;
        border: none;
        border-radius: var(--mg-r-md);
        padding: 5px 9px;
        font-size: 13px; font-weight: 500;
        cursor: pointer;
        transition: all 0.12s;
        text-decoration: none;
        font-family: inherit;
    }
    .btn-mg-ghost:hover { background: var(--mg-surface-3); color: var(--mg-text) !important; }

    /* ── OVERRIDE BOOTSTRAP .btn in admin context ── */
    .admin-content .btn,
    .sidebar-footer .btn {
        border-radius: var(--mg-r-full) !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        transition: all 0.12s !important;
    }
    /* Bootstrap btn-* light adjustments */
    .admin-content .btn-primary { background: var(--mg-green-dark) !important; border-color: var(--mg-green-dark) !important; color: #fff !important; }
    .admin-content .btn-primary:hover { background: var(--mg-teal-mid) !important; border-color: var(--mg-teal-mid) !important; }
    .admin-content .btn-danger { background: rgba(231,76,60,0.09) !important; border-color: rgba(231,76,60,0.2) !important; color: #c0392b !important; }
    .admin-content .btn-danger:hover { background: rgba(231,76,60,0.16) !important; }
    .admin-content .btn-secondary { background: var(--mg-surface) !important; border-color: var(--mg-hairline-strong) !important; color: var(--mg-text) !important; }
    .admin-content .btn-secondary:hover { background: var(--mg-surface-3) !important; }

    /* ── FORM CONTROLS ── */
    .admin-content .form-control,
    .admin-content .form-select {
        background: var(--mg-surface) !important;
        border: 1px solid var(--mg-hairline-strong) !important;
        border-radius: var(--mg-r-md) !important;
        color: var(--mg-text) !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        font-size: 13.5px !important;
        padding: 9px 13px !important;
        height: auto !important;
        min-height: 42px;
        transition: border-color 0.15s, box-shadow 0.15s !important;
    }
    .admin-content .form-control::placeholder { color: var(--mg-text-subtle) !important; }
    .admin-content .form-control:focus,
    .admin-content .form-select:focus {
        background: var(--mg-surface) !important;
        border-color: var(--mg-green-dark) !important;
        box-shadow: 0 0 0 2.5px rgba(0,104,74,0.15) !important;
        color: var(--mg-text) !important;
    }
    .admin-content textarea.form-control { height: auto !important; min-height: 100px; resize: vertical; }
    .admin-content .form-select option { background: var(--mg-surface); color: var(--mg-text); }
    .admin-content .form-label {
        font-size: 12px !important;
        font-weight: 600 !important;
        color: var(--mg-text-muted) !important;
        margin-bottom: 5px !important;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }
    .admin-content .form-check-input { border-color: var(--mg-hairline-strong) !important; }
    .admin-content .form-check-input:checked { background-color: var(--mg-green-dark) !important; border-color: var(--mg-green-dark) !important; }
    .admin-content .form-check-input:focus { box-shadow: 0 0 0 2.5px rgba(0,104,74,0.18) !important; }
    .admin-content .form-check-label { color: var(--mg-text-muted) !important; font-size: 13.5px; }
    .admin-content .invalid-feedback { color: #c0392b !important; font-size: 12px !important; }
    .admin-content .is-invalid { border-color: #e74c3c !important; }

    /* ── TABLE ── */
    .admin-content .table,
    .admin-content .mg-table {
        color: var(--mg-text-muted) !important;
        font-size: 13.5px;
        margin-bottom: 0;
        border-color: var(--mg-hairline) !important;
        background: var(--mg-surface);
    }
    .admin-content .table thead th,
    .admin-content .table thead tr th {
        background: var(--mg-surface-2) !important;
        color: var(--mg-text-subtle) !important;
        font-size: 10.5px !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.9px !important;
        padding: 10px 16px !important;
        border-bottom: 1px solid var(--mg-hairline) !important;
        border-top: none !important;
        white-space: nowrap;
    }
    .admin-content .table tbody td {
        padding: 11px 16px !important;
        border-bottom: 1px solid var(--mg-hairline) !important;
        vertical-align: middle !important;
        color: var(--mg-text-muted) !important;
        background: var(--mg-surface) !important;
    }
    .admin-content .table tbody tr:last-child td { border-bottom: none !important; }
    .admin-content .table tbody tr:hover td { background: var(--mg-surface-2) !important; }
    .admin-content .table .fw-semibold,
    .admin-content .table .fw-bold { color: var(--mg-text) !important; }
    .admin-content .table-borderless td,
    .admin-content .table-borderless th { border: none !important; }
    .admin-content .table-borderless tbody tr { border-bottom: 1px solid var(--mg-hairline) !important; }
    .admin-content .table-borderless tbody tr:last-child { border-bottom: none !important; }

    /* ── BADGE OVERRIDES ── */
    .admin-content .badge { border-radius: var(--mg-r-full) !important; font-size: 11px !important; font-weight: 700 !important; padding: 3px 9px !important; }

    /* ── MONGODB BADGES ── */
    .mg-badge {
        display: inline-flex; align-items: center;
        border-radius: var(--mg-r-full);
        padding: 2px 9px;
        font-size: 11px; font-weight: 700;
        line-height: 1.5;
    }
    .mg-badge-green  { background: var(--mg-green-soft); color: var(--mg-green-dark); }
    .mg-badge-muted  { background: var(--mg-surface-3); color: var(--mg-text-muted); border: 1px solid var(--mg-hairline); }
    .mg-badge-danger { background: rgba(231,76,60,0.09); color: #c0392b; }
    .mg-badge-warn   { background: rgba(250,110,57,0.09); color: #d35400; }

    /* ── FLASH ALERTS ── */
    .mg-flash {
        display: flex; align-items: flex-start; gap: 0.7rem;
        padding: 13px 16px;
        border-radius: var(--mg-r-lg);
        font-size: 13.5px;
        margin-bottom: 1.25rem;
        animation: flash-in 0.25s ease;
    }
    @keyframes flash-in { from { opacity:0; transform:translateY(-6px); } to { opacity:1; transform:translateY(0); } }
    .mg-flash-success { background: #f0fdf6; border: 1px solid rgba(0,104,74,0.22); color: var(--mg-green-dark); }
    .mg-flash-error   { background: #fff5f5; border: 1px solid rgba(231,76,60,0.22); color: #c0392b; }
    .mg-flash i { flex-shrink: 0; margin-top: 1px; }
    .mg-flash-close { margin-left: auto; background: none; border: none; color: inherit; opacity: 0.5; cursor: pointer; padding: 0; line-height: 1; font-size: 1rem; flex-shrink: 0; }
    .mg-flash-close:hover { opacity: 0.9; }

    /* ── PAGINATION ── */
    .admin-content .pagination .page-link {
        background: var(--mg-surface) !important;
        border-color: var(--mg-hairline) !important;
        color: var(--mg-text-muted) !important;
        font-size: 12.5px !important;
    }
    .admin-content .pagination .page-link:hover { background: var(--mg-green-soft) !important; color: var(--mg-green-dark) !important; }
    .admin-content .pagination .active .page-link { background: var(--mg-green-dark) !important; border-color: var(--mg-green-dark) !important; color: #fff !important; }
    .admin-content .pagination .page-item.disabled .page-link { opacity: 0.4 !important; }

    /* ── TABLE RESPONSIVE WRAPPER ── */
    .admin-content .table-responsive { border-radius: var(--mg-r-lg); overflow: hidden; border: 1px solid var(--mg-hairline); }

    /* ── MISC UTILITIES ── */
    .text-muted { color: var(--mg-text-subtle) !important; }
    .text-success { color: var(--mg-green-dark) !important; }
    .border-bottom { border-color: var(--mg-hairline) !important; }
    a { color: var(--mg-green-dark); }
    a:hover { color: var(--mg-teal-mid); }

    /* ── RESPONSIVE ── */
    @media (max-width: 991.98px) {
        .admin-sidebar { transform: translateX(-100%); box-shadow: none; }
        .admin-sidebar.show { transform: translateX(0); box-shadow: var(--mg-shadow-3); }
        .admin-main { margin-left: 0; }
        .sidebar-toggle { display: flex; }
    }
    @media (max-width: 575.98px) {
        .admin-content { padding: 1rem; }
        .admin-topbar { padding: 0 0.9rem; }
    }
    </style>
</head>
<body>

<!-- ── SIDEBAR ── -->
<aside class="admin-sidebar" id="adminSidebar">

    <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
        <img src="/images/logo-hvrf.png" alt="HVRF" class="sidebar-brand-logo">
        <div>
            <div class="sidebar-brand-name">HVRF Admin</div>
            <div class="sidebar-brand-sub">Human Value Reserve Foundation</div>
        </div>
    </a>

    <nav class="sidebar-scroll">
        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i> Dashboard
        </a>

        <div class="sidebar-divider"></div>
        <div class="sidebar-section-label">Content</div>

        <a href="{{ route('admin.hero.edit') }}"
           class="sidebar-link {{ request()->routeIs('admin.hero*') ? 'active' : '' }}">
            <i class="bi bi-layout-text-window-reverse"></i> Hero Section
        </a>
        <a href="{{ route('admin.vision-slides.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.vision-slides*') ? 'active' : '' }}">
            <i class="bi bi-play-btn-fill"></i> Vision Slider
        </a>
        <a href="{{ route('admin.about.edit') }}"
           class="sidebar-link {{ request()->routeIs('admin.about*') ? 'active' : '' }}">
            <i class="bi bi-info-circle-fill"></i> About Section
        </a>
        <a href="{{ route('admin.focus-areas.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.focus-areas*') ? 'active' : '' }}">
            <i class="bi bi-grid-3x3-gap-fill"></i> Focus Areas
        </a>
        <a href="{{ route('admin.programs.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.programs*') ? 'active' : '' }}">
            <i class="bi bi-collection-fill"></i> Programs
        </a>
        <a href="{{ route('admin.roadmap.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.roadmap*') ? 'active' : '' }}">
            <i class="bi bi-map-fill"></i> Roadmap
        </a>
        <a href="{{ route('admin.team.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.team*') ? 'active' : '' }}">
            <i class="bi bi-people-fill"></i> Team Members
        </a>
        <a href="{{ route('admin.stats.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.stats*') ? 'active' : '' }}">
            <i class="bi bi-bar-chart-fill"></i> Stats
        </a>

        <div class="sidebar-divider"></div>
        <div class="sidebar-section-label">Inbox</div>

        <a href="{{ route('admin.messages.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
            <i class="bi bi-envelope-fill"></i> Messages
            @php $unread = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
            @if($unread > 0)<span class="sidebar-badge">{{ $unread }}</span>@endif
        </a>
        <a href="{{ route('admin.subscribers.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.subscribers*') ? 'active' : '' }}">
            <i class="bi bi-newspaper"></i> Subscribers
        </a>

        <div class="sidebar-divider"></div>
        <div class="sidebar-section-label">System</div>

        <a href="{{ route('admin.settings.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
            <i class="bi bi-sliders"></i> Site Settings
        </a>
    </nav>

    <div class="sidebar-footer">
        <div class="sidebar-avatar">
            {{ strtoupper(substr(auth('admin')->user()->name ?? 'A', 0, 1)) }}
        </div>
        <div style="flex:1; min-width:0;">
            <div class="sidebar-user-name text-truncate">{{ auth('admin')->user()->name }}</div>
            <div class="sidebar-user-role">Administrator</div>
        </div>
        <form method="POST" action="{{ route('admin.logout') }}" class="mb-0">
            @csrf
            <button type="submit" class="topbar-icon-btn" title="Logout" style="border: none;">
                <i class="bi bi-box-arrow-right"></i>
            </button>
        </form>
    </div>
</aside>

<!-- ── MAIN ── -->
<div class="admin-main">

    <!-- Topbar -->
    <header class="admin-topbar">
        <div class="topbar-left">
            <button class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle sidebar">
                <i class="bi bi-list" style="font-size: 1rem;"></i>
            </button>
            <div class="topbar-breadcrumb d-none d-md-flex">
                <i class="bi bi-house-fill" style="font-size: 10px;"></i>
                <span style="color: var(--mg-hairline-strong); margin: 0 2px;">›</span>
                <span>@yield('breadcrumb', 'Dashboard')</span>
            </div>
        </div>

        <div class="topbar-right">
            <a href="{{ route('home') }}" target="_blank" class="topbar-icon-btn d-none d-sm-flex" title="View site">
                <i class="bi bi-arrow-up-right"></i>
            </a>
            <div class="topbar-user">
                <div class="topbar-avatar">
                    {{ strtoupper(substr(auth('admin')->user()->name ?? 'A', 0, 1)) }}
                </div>
                <span class="topbar-user-name d-none d-sm-inline">
                    {{ auth('admin')->user()->name }}
                </span>
            </div>
        </div>
    </header>

    <!-- Content -->
    <main class="admin-content">

        @if(session('success'))
        <div class="mg-flash mg-flash-success">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
            <button class="mg-flash-close" onclick="this.parentElement.remove()">×</button>
        </div>
        @endif

        @if(session('error'))
        <div class="mg-flash mg-flash-error">
            <i class="bi bi-exclamation-circle-fill"></i>
            <span>{{ session('error') }}</span>
            <button class="mg-flash-close" onclick="this.parentElement.remove()">×</button>
        </div>
        @endif

        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
(function () {
    var toggle  = document.getElementById('sidebarToggle');
    var sidebar = document.getElementById('adminSidebar');
    if (!toggle || !sidebar) return;

    toggle.addEventListener('click', function () {
        sidebar.classList.toggle('show');
    });

    document.addEventListener('click', function (e) {
        if (window.innerWidth >= 992) return;
        if (sidebar.classList.contains('show') &&
            !sidebar.contains(e.target) &&
            !toggle.contains(e.target)) {
            sidebar.classList.remove('show');
        }
    });
})();
</script>
@yield('scripts')
</body>
</html>
