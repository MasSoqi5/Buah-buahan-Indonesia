<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Buah Nusantara Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --hutan: #1A3A2A;
            --daun: #2D6A4F;
            --kuning: #F4A825;
            --lontar: #FAF3E0;
            --kayu: #8B4513;
            --daun-muda: #52B788;
            --sidebar-w: 260px;
            --danger: #E63946;
            --success: #2D6A4F;
            --bg: #F0F4F2;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Lato', sans-serif;
            background: var(--bg);
            color: #333;
            min-height: 100vh;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-w);
            height: 100vh;
            background: var(--hutan);
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            z-index: 200;
        }

        .sidebar-logo {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .sidebar-logo .logo-icon { font-size: 2rem; }

        .sidebar-logo .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--kuning);
            margin-top: 0.3rem;
        }

        .sidebar-logo .logo-sub {
            font-size: 0.65rem;
            color: rgba(255,255,255,0.4);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .sidebar-section {
            padding: 1.2rem 0.8rem 0.4rem;
            font-size: 0.62rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.3);
        }

        .sidebar-nav {
            list-style: none;
            padding: 0 0.8rem;
        }

        .sidebar-nav li { margin-bottom: 0.2rem; }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.7rem 0.9rem;
            border-radius: 8px;
            text-decoration: none;
            color: rgba(255,255,255,0.65);
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .sidebar-nav a i {
            width: 18px;
            text-align: center;
            font-size: 0.9rem;
        }

        .sidebar-nav a:hover {
            background: rgba(255,255,255,0.08);
            color: white;
        }

        .sidebar-nav a.active {
            background: var(--daun);
            color: white;
        }

        .sidebar-nav a.active i { color: var(--kuning); }

        .sidebar-user {
            margin-top: auto;
            padding: 1rem;
            border-top: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .user-avatar-sm {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--daun);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        .user-info-sm .name {
            font-size: 0.875rem;
            font-weight: 700;
            color: white;
        }

        .user-info-sm .role {
            font-size: 0.7rem;
            color: var(--daun-muda);
        }

        .user-info-sm a {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.4);
            text-decoration: none;
        }

        .user-info-sm a:hover { color: var(--danger); }

        /* ── MAIN AREA ── */
        .main-area {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* TOP BAR */
        .topbar {
            background: white;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e0e0e0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            color: var(--hutan);
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .topbar-actions a {
            font-size: 0.85rem;
            color: var(--daun);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            border: 1px solid var(--daun);
            transition: all 0.2s;
        }

        .topbar-actions a:hover { background: var(--daun); color: white; }

        /* CONTENT WRAPPER */
        .content-wrapper {
            padding: 2rem;
            flex: 1;
        }

        /* ── STATS CARDS ── */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.2rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border-left: 4px solid var(--daun);
        }

        .stat-card.yellow { border-left-color: var(--kuning); }
        .stat-card.danger  { border-left-color: var(--danger); }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: rgba(45,106,79,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        .stat-card.yellow .stat-icon { background: rgba(244,168,37,0.1); }

        .stat-val {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--hutan);
            line-height: 1;
        }

        .stat-lbl {
            font-size: 0.8rem;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ── TABLE ── */
        .panel {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            overflow: hidden;
        }

        .panel-header {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .panel-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            color: var(--hutan);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
            font-family: 'Lato', sans-serif;
        }

        .btn-primary { background: var(--daun); color: white; }
        .btn-primary:hover { background: var(--hutan); }
        .btn-warning { background: var(--kuning); color: var(--hutan); }
        .btn-warning:hover { background: #e09500; }
        .btn-danger  { background: var(--danger); color: white; }
        .btn-danger:hover  { background: #c0303c; }
        .btn-secondary { background: #f0f0f0; color: #555; }
        .btn-secondary:hover { background: #e0e0e0; }
        .btn-sm { padding: 0.35rem 0.8rem; font-size: 0.8rem; }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            padding: 0.9rem 1rem;
            text-align: left;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #888;
            border-bottom: 2px solid #f0f0f0;
            background: #fafafa;
        }

        .data-table td {
            padding: 0.9rem 1rem;
            border-bottom: 1px solid #f5f5f5;
            font-size: 0.875rem;
            vertical-align: middle;
        }

        .data-table tr:last-child td { border-bottom: none; }
        .data-table tr:hover td { background: #fafff8; }

        .thumb {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            object-fit: cover;
        }

        .thumb-placeholder {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            background: var(--bg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        /* ── FORM ── */
        .form-panel {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            max-width: 800px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem;
        }

        @media(max-width: 600px) { .form-row { grid-template-columns: 1fr; } }

        .form-group {
            margin-bottom: 1.3rem;
        }

        .form-group label {
            display: block;
            font-size: 0.82rem;
            font-weight: 700;
            color: var(--hutan);
            margin-bottom: 0.4rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group label .req { color: var(--danger); margin-left: 2px; }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Lato', sans-serif;
            font-size: 0.95rem;
            color: var(--hutan);
            background: white;
            transition: border-color 0.2s;
            outline: none;
        }

        .form-control:focus { border-color: var(--daun); }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .form-hint {
            font-size: 0.76rem;
            color: #999;
            margin-top: 0.3rem;
        }

        .img-preview-wrap {
            margin-top: 0.5rem;
        }

        .img-preview-wrap img {
            max-width: 200px;
            border-radius: 8px;
            border: 2px solid #e0e0e0;
        }

        .form-actions {
            display: flex;
            gap: 0.8rem;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #f0f0f0;
        }

        /* ── ALERTS ── */
        .alert {
            padding: 0.9rem 1.2rem;
            border-radius: 8px;
            margin-bottom: 1.2rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.9rem;
        }

        .alert-success { background: #E8F5E9; color: #2E7D32; border-left: 4px solid #4CAF50; }
        .alert-error   { background: #FFEBEE; color: #C62828; border-left: 4px solid var(--danger); }

        /* ── BADGE ── */
        .badge {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 700;
        }

        .badge-green { background: #E8F5E9; color: #2E7D32; }

        /* SEARCH BAR ADMIN */
        .search-bar {
            display: flex;
            gap: 0.5rem;
        }

        .search-bar input {
            padding: 0.55rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Lato', sans-serif;
            font-size: 0.875rem;
            outline: none;
            width: 220px;
        }

        .search-bar input:focus { border-color: var(--daun); }
    </style>
    @stack('styles')
</head>
<body>

{{-- SIDEBAR --}}
<aside class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-icon">🌿</div>
        <div class="logo-text">Buah Nusantara</div>
        <div class="logo-sub">Admin Panel</div>
    </div>

    <div class="sidebar-section">Menu</div>
    <ul class="sidebar-nav">
        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
    </ul>

    <div class="sidebar-section">Kelola Konten</div>
    <ul class="sidebar-nav">
        <li>
            <a href="{{ route('admin.buah.index') }}"
               class="{{ request()->routeIs('admin.buah.*') ? 'active' : '' }}">
                <i class="fas fa-apple-alt"></i> Data Buah
            </a>
        </li>
    </ul>

    <div class="sidebar-section">Lihat</div>
    <ul class="sidebar-nav">
        <li>
            <a href="{{ route('buah.index') }}" target="_blank">
                <i class="fas fa-globe"></i> Lihat Website
            </a>
        </li>
    </ul>

    <div class="sidebar-user">
        <div class="user-avatar-sm">
            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 2)) }}
        </div>
        <div class="user-info-sm">
            <div class="name">{{ Auth::user()->name ?? 'Admin' }}</div>
            <div class="role">Administrator</div>
            <form method="POST" action="{{ route('admin.logout') }}" style="display:inline;">
                @csrf
                <button type="submit" style="background:none;border:none;cursor:pointer;color:rgba(255,255,255,0.4);font-size:0.7rem;padding:0;font-family:Lato,sans-serif;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>
</aside>

{{-- MAIN --}}
<div class="main-area">
    <div class="topbar">
        <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
        <div class="topbar-actions">
            <a href="{{ route('admin.buah.create') }}">
                <i class="fas fa-plus"></i> Tambah Buah
            </a>
        </div>
    </div>

    <div class="content-wrapper">

        @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
        @endif

        @yield('content')
    </div>
</div>

@stack('scripts')
</body>
</html>