<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Buah Nusantara') — Ensiklopedia Buah Khas Indonesia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --hutan: #1A3A2A;
            --daun: #2D6A4F;
            --kuning: #F4A825;
            --lontar: #FAF3E0;
            --kayu: #8B4513;
            --daun-muda: #52B788;
            --krem: #F0E6C8;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Lato', sans-serif;
            background: var(--lontar);
            color: var(--hutan);
        }

        /* ── NAVBAR ── */
        nav {
            background: var(--hutan);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 70px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 20px rgba(0,0,0,0.3);
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            text-decoration: none;
        }

        .nav-brand .brand-icon {
            font-size: 1.8rem;
        }

        .nav-brand .brand-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--kuning);
            line-height: 1;
        }

        .nav-brand .brand-sub {
            font-size: 0.65rem;
            color: var(--daun-muda);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            gap: 0.3rem;
            list-style: none;
        }

        .nav-links a {
            color: #ccc;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.9rem;
            transition: all 0.2s;
            font-weight: 400;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--kuning);
            background: rgba(244, 168, 37, 0.1);
        }

        /* ── HERO ── */
        .hero {
            background: linear-gradient(135deg, var(--hutan) 0%, var(--daun) 100%);
            padding: 5rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2352B788' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .hero-eyebrow {
            display: inline-block;
            background: rgba(244, 168, 37, 0.2);
            color: var(--kuning);
            padding: 0.3rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 1.2rem;
            border: 1px solid rgba(244, 168, 37, 0.3);
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.2rem, 5vw, 3.8rem);
            color: white;
            line-height: 1.2;
            margin-bottom: 1rem;
            position: relative;
        }

        .hero h1 span {
            color: var(--kuning);
        }

        .hero p {
            color: rgba(255,255,255,0.75);
            max-width: 550px;
            margin: 0 auto 2rem;
            font-size: 1.05rem;
            line-height: 1.7;
        }

        .hero-stats {
            display: flex;
            gap: 2.5rem;
            justify-content: center;
            position: relative;
        }

        .stat-item {
            text-align: center;
        }

        .stat-item .num {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--kuning);
        }

        .stat-item .label {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.6);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* ── SEARCH BAR ── */
        .search-section {
            background: var(--krem);
            padding: 1.5rem 2rem;
            border-bottom: 2px solid #e8dcc0;
        }

        .search-inner {
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            gap: 0.5rem;
        }

        .search-inner input {
            flex: 1;
            padding: 0.75rem 1.2rem;
            border: 2px solid #d4c89a;
            border-radius: 8px;
            background: white;
            font-family: 'Lato', sans-serif;
            font-size: 0.95rem;
            color: var(--hutan);
            outline: none;
            transition: border-color 0.2s;
        }

        .search-inner input:focus {
            border-color: var(--daun);
        }

        .btn-search {
            background: var(--daun);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.95rem;
            transition: background 0.2s;
        }

        .btn-search:hover { background: var(--hutan); }

        /* ── MAIN GRID ── */
        .main-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 3rem 2rem;
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 3rem;
        }

        @media (max-width: 900px) {
            .main-container { grid-template-columns: 1fr; }
        }

        /* ── CARD BUAH ── */
        .section-label {
            font-size: 0.7rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--daun);
            margin-bottom: 0.3rem;
            font-weight: 700;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.9rem;
            color: var(--hutan);
            margin-bottom: 2rem;
            border-bottom: 3px solid var(--kuning);
            padding-bottom: 0.7rem;
            display: inline-block;
        }

        .buah-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.8rem;
        }

        .buah-card {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(26,58,42,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .buah-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 35px rgba(26,58,42,0.18);
        }

        .card-img-wrap {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .buah-card:hover .card-img-wrap img {
            transform: scale(1.07);
        }

        .card-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: var(--kuning);
            color: var(--hutan);
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.25rem 0.7rem;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card-body {
            padding: 1.3rem;
        }

        .card-body h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            color: var(--hutan);
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .card-body p {
            font-size: 0.875rem;
            color: #666;
            line-height: 1.6;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid #f0e8d0;
            padding-top: 0.9rem;
            font-size: 0.78rem;
            color: #999;
        }

        .card-author {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .author-avatar {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: var(--daun);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            flex-shrink: 0;
        }

        .card-date {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .card-date i { color: var(--daun-muda); }

        /* ── SIDEBAR ── */
        .sidebar-widget {
            background: white;
            border-radius: 14px;
            padding: 1.5rem;
            box-shadow: 0 3px 15px rgba(26,58,42,0.08);
            margin-bottom: 1.5rem;
        }

        .widget-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            color: var(--hutan);
            margin-bottom: 1rem;
            padding-bottom: 0.6rem;
            border-bottom: 2px solid var(--kuning);
        }

        .widget-list { list-style: none; }

        .widget-list li {
            padding: 0.6rem 0;
            border-bottom: 1px solid #f0f0f0;
            font-size: 0.875rem;
        }

        .widget-list li:last-child { border-bottom: none; }

        .widget-list a {
            color: var(--daun);
            text-decoration: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .widget-list a:hover { color: var(--kuning); }

        .widget-list .count {
            background: var(--krem);
            color: var(--hutan);
            padding: 0.1rem 0.5rem;
            border-radius: 10px;
            font-size: 0.7rem;
            font-weight: 700;
        }

        .popular-item {
            display: flex;
            gap: 0.8rem;
            padding: 0.7rem 0;
            border-bottom: 1px solid #f0f0f0;
            text-decoration: none;
            color: inherit;
        }

        .popular-item:last-child { border-bottom: none; }

        .popular-item img {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .popular-item-info h4 {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--hutan);
            margin-bottom: 0.2rem;
            line-height: 1.3;
        }

        .popular-item-info span {
            font-size: 0.75rem;
            color: #999;
        }

        /* ── DETAIL PAGE ── */
        .detail-hero {
            height: 420px;
            position: relative;
            overflow: hidden;
        }

        .detail-hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .detail-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(26,58,42,0.92) 30%, rgba(26,58,42,0.2) 100%);
            display: flex;
            align-items: flex-end;
            padding: 2.5rem;
        }

        .detail-hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: white;
            margin-bottom: 0.8rem;
        }

        .detail-meta {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .detail-meta-item {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            color: rgba(255,255,255,0.8);
            font-size: 0.875rem;
        }

        .detail-meta-item i { color: var(--kuning); }

        .detail-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 3rem 2rem;
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 3rem;
        }

        @media (max-width: 900px) {
            .detail-content { grid-template-columns: 1fr; }
        }

        .article-body {
            background: white;
            border-radius: 14px;
            padding: 2.5rem;
            box-shadow: 0 3px 15px rgba(26,58,42,0.08);
        }

        .article-body h2 {
            font-family: 'Playfair Display', serif;
            color: var(--hutan);
            margin: 1.5rem 0 0.7rem;
        }

        .article-body p {
            line-height: 1.8;
            color: #444;
            margin-bottom: 1rem;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5rem 0;
            font-size: 0.9rem;
        }

        .info-table th {
            background: var(--hutan);
            color: white;
            padding: 0.8rem 1rem;
            text-align: left;
        }

        .info-table td {
            padding: 0.7rem 1rem;
            border-bottom: 1px solid #f0e8d0;
        }

        .info-table tr:nth-child(even) td { background: var(--lontar); }

        .author-card {
            display: flex;
            gap: 1rem;
            align-items: flex-start;
            background: var(--lontar);
            border-radius: 10px;
            padding: 1.2rem;
            margin-top: 2rem;
            border-left: 4px solid var(--daun);
        }

        .author-card-avatar {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--daun);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .author-card-info h4 {
            font-weight: 700;
            color: var(--hutan);
            margin-bottom: 0.2rem;
        }

        .author-card-info .role {
            font-size: 0.78rem;
            color: var(--daun);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .author-card-info p {
            font-size: 0.85rem;
            color: #666;
            margin-top: 0.3rem;
            line-height: 1.5;
        }

        /* ── FOOTER ── */
        footer {
            background: var(--hutan);
            color: rgba(255,255,255,0.7);
            text-align: center;
            padding: 2rem;
            font-size: 0.85rem;
            margin-top: 4rem;
        }

        footer strong { color: var(--kuning); }

        /* ── PAGINATION ── */
        .pagination {
            display: flex;
            gap: 0.4rem;
            justify-content: center;
            margin-top: 2.5rem;
        }

        .pagination a,
        .pagination span {
            padding: 0.5rem 0.9rem;
            border-radius: 6px;
            font-size: 0.875rem;
            text-decoration: none;
            border: 1px solid #ddd;
        }

        .pagination a { color: var(--daun); }
        .pagination a:hover { background: var(--daun); color: white; border-color: var(--daun); }
        .pagination .active { background: var(--daun); color: white; border-color: var(--daun); }

        /* ── EMPTY STATE ── */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #999;
        }

        .empty-state .empty-icon { font-size: 4rem; margin-bottom: 1rem; }
        .empty-state h3 { font-family: 'Playfair Display', serif; color: var(--hutan); margin-bottom: 0.5rem; }
    </style>
    @stack('styles')
</head>
<body>

<nav>
    <a href="{{ route('buah.index') }}" class="nav-brand">
        <span class="brand-icon">🌿</span>
        <div>
            <div class="brand-text">Buah Nusantara</div>
            <div class="brand-sub">Ensiklopedia Buah Indonesia</div>
        </div>
    </a>
    <ul class="nav-links">
        <li><a href="{{ route('buah.index') }}" class="{{ request()->routeIs('buah.index') ? 'active' : '' }}">Beranda</a></li>
        <li><a href="{{ route('buah.index') }}">Semua Buah</a></li>
    </ul>
</nav>

@yield('content')

<footer>
    <p>© {{ date('Y') }} <strong>Buah Nusantara</strong> — Melestarikan pengetahuan buah khas Indonesia 🌴</p>
</footer>

@stack('scripts')
</body>
</html>