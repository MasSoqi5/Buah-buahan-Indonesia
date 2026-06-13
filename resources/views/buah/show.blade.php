@extends('layouts.app')

@section('title', $buah->nama . ' — Buah Nusantara')

@section('content')

{{-- HERO IMAGE --}}
<div class="detail-hero">
    @if($buah->gambar)
        <img src="{{ asset('storage/' . $buah->gambar) }}" alt="{{ $buah->nama }}">
    @else
        <img src="https://placehold.co/1280x420/2D6A4F/FAF3E0?text={{ urlencode($buah->nama) }}" alt="{{ $buah->nama }}">
    @endif
    <div class="detail-hero-overlay">
        <div class="detail-hero-content">
            <h1>{{ $buah->nama }}</h1>
            <div class="detail-meta">
                <div class="detail-meta-item">
                    <i class="fas fa-user"></i>
                    <span>{{ $buah->author ?? 'Tim Redaksi' }}</span>
                </div>
                <div class="detail-meta-item">
                    <i class="fas fa-calendar"></i>
                    <span>{{ \Carbon\Carbon::parse($buah->created_at)->locale('id')->translatedFormat('d F Y') }}</span>
                </div>
                <div class="detail-meta-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $buah->asal_daerah ?? 'Indonesia' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- BREADCRUMB --}}
<div style="background: var(--krem); padding: 0.8rem 2rem; border-bottom: 1px solid #e0d4b0; font-size: 0.85rem;">
    <div style="max-width: 1280px; margin: 0 auto;">
        <a href="{{ route('buah.index') }}" style="color: var(--daun); text-decoration: none;">Beranda</a>
        <span style="margin: 0 0.5rem; color: #999;">›</span>
        <span style="color: var(--hutan);">{{ $buah->nama }}</span>
    </div>
</div>

{{-- DETAIL CONTENT --}}
<div class="detail-content">
    <div>
        {{-- ARTICLE BODY --}}
        <article class="article-body">
            <h2>Tentang {{ $buah->nama }}</h2>
            <p>{{ $buah->deskripsi }}</p>

            @if($buah->manfaat)
            <h2>🌿 Manfaat & Kandungan</h2>
            <p>{{ $buah->manfaat }}</p>
            @endif

            {{-- INFO TABLE --}}
            <h2>📋 Informasi Umum</h2>
            <table class="info-table">
                <tr>
                    <th colspan="2">Data Buah</th>
                </tr>
                <tr>
                    <td><strong>Nama Lokal</strong></td>
                    <td>{{ $buah->nama }}</td>
                </tr>
                @if($buah->nama_latin)
                <tr>
                    <td><strong>Nama Latin</strong></td>
                    <td><em>{{ $buah->nama_latin }}</em></td>
                </tr>
                @endif
                @if($buah->asal_daerah)
                <tr>
                    <td><strong>Asal Daerah</strong></td>
                    <td>{{ $buah->asal_daerah }}</td>
                </tr>
                @endif
                @if($buah->musim_panen)
                <tr>
                    <td><strong>Musim Panen</strong></td>
                    <td>{{ $buah->musim_panen }}</td>
                </tr>
                @endif
                <tr>
                    <td><strong>Ditulis oleh</strong></td>
                    <td>{{ $buah->author ?? 'Tim Redaksi' }}</td>
                </tr>
                <tr>
                    <td><strong>Tanggal Terbit</strong></td>
                    <td>{{ \Carbon\Carbon::parse($buah->created_at)->locale('id')->translatedFormat('d F Y') }}</td>
                </tr>
            </table>

            {{-- AUTHOR CARD --}}
            <div class="author-card">
                <div class="author-card-avatar">
                    {{ strtoupper(substr($buah->author ?? 'TR', 0, 2)) }}
                </div>
                <div class="author-card-info">
                    <h4>{{ $buah->author ?? 'Tim Redaksi' }}</h4>
                    <div class="role">Penulis Konten</div>
                    <p>Artikel ini ditulis oleh tim redaksi Buah Nusantara dan telah melalui proses kurasi untuk memastikan keakuratan informasi.</p>
                </div>
            </div>
        </article>

        {{-- BACK BUTTON --}}
        <div style="margin-top: 1.5rem;">
            <a href="{{ route('buah.index') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; color: var(--daun); text-decoration: none; font-weight: 700; padding: 0.75rem 1.5rem; border: 2px solid var(--daun); border-radius: 8px; transition: all 0.2s;"
               onmouseover="this.style.background='var(--daun)';this.style.color='white'"
               onmouseout="this.style.background='transparent';this.style.color='var(--daun)'">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>
    </div>

    {{-- SIDEBAR --}}
    <aside>
        {{-- BUAH TERKAIT --}}
        <div class="sidebar-widget">
            <h3 class="widget-title">🍃 Buah Lainnya</h3>
            @foreach($buahLainnya as $item)
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

        <div class="sidebar-widget" style="background: linear-gradient(135deg, var(--hutan), var(--daun)); color: white; text-align: center;">
            <div style="font-size: 2rem; margin-bottom: 0.5rem;">📖</div>
            <h3 style="font-family: 'Playfair Display', serif; color: var(--kuning); font-size: 1rem; margin-bottom: 0.5rem;">Terbit</h3>
            <p style="font-size: 0.85rem; opacity: 0.9;">
                {{ \Carbon\Carbon::parse($buah->created_at)->locale('id')->translatedFormat('d F Y') }}
            </p>
            <p style="font-size: 0.8rem; opacity: 0.7; margin-top: 0.3rem;">Oleh {{ $buah->author ?? 'Tim Redaksi' }}</p>
        </div>
    </aside>
</div>

@endsection