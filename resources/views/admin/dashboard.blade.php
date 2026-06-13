@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', '🌿 Dashboard')

@section('content')

{{-- STATS --}}
<div class="stats-row">
    <div class="stat-card">
        <div class="stat-icon">🍉</div>
        <div>
            <div class="stat-val">{{ $totalBuah }}</div>
            <div class="stat-lbl">Total Buah</div>
        </div>
    </div>
    <div class="stat-card yellow">
        <div class="stat-icon">🌏</div>
        <div>
            <div class="stat-val">{{ $totalDaerah }}</div>
            <div class="stat-lbl">Daerah Asal</div>
        </div>
    </div>
    <div class="stat-card" style="border-left-color: var(--daun-muda);">
        <div class="stat-icon">✍️</div>
        <div>
            <div class="stat-val">{{ $totalPenulis }}</div>
            <div class="stat-lbl">Penulis</div>
        </div>
    </div>
    <div class="stat-card" style="border-left-color: #9C6ADE;">
        <div class="stat-icon">📅</div>
        <div>
            <div class="stat-val">{{ $buahBulanIni }}</div>
            <div class="stat-lbl">Bulan Ini</div>
        </div>
    </div>
</div>

{{-- RECENT TABLE --}}
<div class="panel">
    <div class="panel-header">
        <h2>Buah Terbaru</h2>
        <a href="{{ route('admin.buah.index') }}" class="btn btn-secondary btn-sm">Lihat Semua</a>
    </div>
    <table class="data-table">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama Buah</th>
                <th>Asal Daerah</th>
                <th>Penulis</th>
                <th>Tanggal Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($buahTerbaru as $buah)
            <tr>
                <td>
                    @if($buah->gambar)
                        <img src="{{ asset('storage/'.$buah->gambar) }}" class="thumb" alt="{{ $buah->nama }}">
                    @else
                        <div class="thumb-placeholder">🍃</div>
                    @endif
                </td>
                <td>
                    <strong>{{ $buah->nama }}</strong>
                    @if($buah->nama_latin)
                    <br><small style="color:#999;font-style:italic;">{{ $buah->nama_latin }}</small>
                    @endif
                </td>
                <td><span class="badge badge-green">{{ $buah->asal_daerah ?? '—' }}</span></td>
                <td>{{ $buah->author ?? 'Tim Redaksi' }}</td>
                <td>{{ \Carbon\Carbon::parse($buah->created_at)->format('d M Y') }}</td>
                <td>
                    <div style="display:flex;gap:0.4rem;">
                        <a href="{{ route('admin.buah.edit', $buah->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.buah.destroy', $buah->id) }}" method="POST"
                              onsubmit="return confirm('Hapus buah ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center; color:#999; padding:2rem;">
                    Belum ada data buah. <a href="{{ route('admin.buah.create') }}" style="color:var(--daun)">Tambah sekarang</a>.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection