@extends('layouts.app')

@section('title', 'Beranda — Buah Nusantara')

@section('content')

{{-- HERO --}}
<section class="hero">
    <div class="hero-eyebrow">🌴 Kekayaan Alam Indonesia</div>
    <h1>Ensiklopedia <span>Buah Khas</span><br>Nusantara</h1>
    <p>Jelajahi ratusan jenis buah asli Indonesia — mulai dari Sumatera hingga Papua — lengkap dengan informasi gizi, manfaat, dan cara pengolahannya.</p>
    <div class="hero-stats">
        <div class="stat-item">
            <div class="num">{{ $totalBuah }}</div>
            <div class="label">Jenis Buah</div>
        </div>
        <div class="stat-item">
            <div class="num">17</div>
            <div class="label">Provinsi</div>
        </div>
        <div class="stat-item">
            <div class="num">100%</div>
            <div class="label">Asli Lokal</div>
        </div>
    </div>
</section>

{{-- SEARCH --}}
<div class="search-section">
    <div class="search-inner">
        <form action="{{ route('buah.index') }}" method="GET" style="display:flex;gap:0.5rem;width:100%;">
            <input type="text" name="search" placeholder="Cari buah, misal: Durian, Salak, Rambutan…"
                   value="{{ request('search') }}">
            <button type="submit" class="btn-search">
                <i class="fas fa-search"></i> Cari
            </button>
        </form>
    </div>
</div>

{{-- MAIN CONTENT + SIDEBAR --}}
<div class="main-container">

    {{-- ARTIKEL GRID --}}
    <main>
        <div class="section-label">Koleksi Terbaru</div>
        <h2 class="section-title">
            @if(request('search'))
                Hasil pencarian: "{{ request('search') }}"
            @else
                Buah-Buahan Nusantara
            @endif
        </h2>

        @if($buahs->count())
        <div class="buah-grid">
            @foreach($buahs as $buah)
            <a href="{{ route('buah.show', $buah->slug) }}" class="buah-card">
                <div class="card-img-wrap">
                    @if($buah->gambar)
                        <img src="{{ asset('storage/' . $buah->gambar) }}" alt="{{ $buah->nama }}">
                    @else
                        <img src="https://placehold.co/400x200/2D6A4F/FAF3E0?text={{ urlencode($buah->nama) }}" alt="{{ $buah->nama }}">
                    @endif
                    <span class="card-badge">{{ $buah->asal_daerah ?? 'Nusantara' }}</span>
                </div>
                <div class="card-body">
                    <h3>{{ $buah->nama }}</h3>
                    <p>{{ Str::limit($buah->deskripsi, 120) }}</p>
                    <div class="card-meta">
                        <div class="card-author">
                            <div class="author-avatar">
                                {{ strtoupper(substr($buah->author ?? 'A', 0, 2)) }}
                            </div>
                            <span>{{ $buah->author ?? 'Tim Redaksi' }}</span>
                        </div>
                        <div class="card-date">
                            <i class="fas fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($buah->created_at)->locale('id')->translatedFormat('d M Y') }}
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- PAGINATION --}}
        <div class="pagination">
            {{ $buahs->withQueryString()->links('vendor.pagination.custom') }}
        </div>

        @else
        <div class="empty-state">
            <div class="empty-icon">🍃</div>
            <h3>Buah tidak ditemukan</h3>
            <p>Coba kata kunci lain atau <a href="{{ route('buah.index') }}" style="color:var(--daun)">lihat semua buah</a>.</p>
        </div>
        @endif
    </main>

    {{-- SIDEBAR --}}
    <aside>

        {{-- KATEGORI / ASAL --}}
        <div class="sidebar-widget">
            <h3 class="widget-title">🌏 Asal Daerah</h3>
            <ul class="widget-list">
                @foreach($daerahList as $daerah => $count)
                <li>
                    <a href="{{ route('buah.index', ['daerah' => $daerah]) }}">
                        <span>{{ $daerah }}</span>
                        <span class="count">{{ $count }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        {{-- BUAH POPULER --}}
        <div class="sidebar-widget">
            <h3 class="widget-title">⭐ Buah Terpopuler</h3>
            @foreach($buahPopuler as $item)
            <a href="{{ route('buah.show', $item->slug) }}" class="popular-item">
                @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
                @else
                    <img src="https://placehold.co/60x60/2D6A4F/FAF3E0?text={{ urlencode(substr($item->nama,0,2)) }}" alt="{{ $item->nama }}">
                @endif
                <div class="popular-item-info">
                    <h4>{{ $item->nama }}</h4>
                    <span>{{ $item->asal_daerah ?? 'Nusantara' }}</span>
                </div>
            </a>
            @endforeach
        </div>

        {{-- INFO WIDGET --}}
        <div class="sidebar-widget" style="background: linear-gradient(135deg, var(--hutan), var(--daun)); color: white; text-align: center;">
            <div style="font-size: 2.5rem; margin-bottom: 0.8rem;">🍉</div>
            <h3 style="font-family: 'Playfair Display', serif; color: var(--kuning); margin-bottom: 0.5rem;">Tahukah Kamu?</h3>
            <p style="font-size: 0.85rem; opacity: 0.85; line-height: 1.6;">Indonesia memiliki lebih dari 400 jenis buah tropis yang tersebar dari Sabang hingga Merauke.</p>
        </div>

    </aside>
</div>

@endsection