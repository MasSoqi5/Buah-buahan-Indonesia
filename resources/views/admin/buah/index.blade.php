@extends('layouts.admin')

@section('title', 'Kelola Buah')
@section('page-title', '🍉 Kelola Data Buah')

@section('content')

<div class="panel">
    <div class="panel-header">
        <h2>Daftar Buah ({{ $buahs->total() }} data)</h2>
        <div style="display:flex;gap:0.8rem;align-items:center;">
            <form action="{{ route('admin.buah.index') }}" method="GET" class="search-bar">
                <input type="text" name="search" placeholder="Cari buah…" value="{{ request('search') }}">
                <button type="submit" class="btn btn-secondary btn-sm">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <a href="{{ route('admin.buah.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Buah
            </a>
        </div>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th width="50">#</th>
                <th width="70">Foto</th>
                <th>Nama Buah</th>
                <th>Nama Latin</th>
                <th>Asal Daerah</th>
                <th>Penulis</th>
                <th>Terbit</th>
                <th width="120">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($buahs as $i => $buah)
            <tr>
                <td style="color:#999;">{{ $buahs->firstItem() + $i }}</td>
                <td>
                    @if($buah->gambar)
                        <img src="{{ asset('storage/'.$buah->gambar) }}" class="thumb" alt="{{ $buah->nama }}">
                    @else
                        <div class="thumb-placeholder">🍃</div>
                    @endif
                </td>
                <td>
                    <strong>{{ $buah->nama }}</strong>
                </td>
                <td><em style="color:#999;">{{ $buah->nama_latin ?? '—' }}</em></td>
                <td>
                    @if($buah->asal_daerah)
                    <span class="badge badge-green">{{ $buah->asal_daerah }}</span>
                    @else
                    <span style="color:#ccc;">—</span>
                    @endif
                </td>
                <td>{{ $buah->author ?? 'Tim Redaksi' }}</td>
                <td style="font-size:0.8rem;color:#999;">
                    {{ \Carbon\Carbon::parse($buah->created_at)->format('d M Y') }}
                </td>
                <td>
                    <div style="display:flex;gap:0.4rem;flex-wrap:wrap;">
                        <a href="{{ route('buah.show', $buah->slug) }}" target="_blank"
                           class="btn btn-secondary btn-sm" title="Lihat">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.buah.edit', $buah->id) }}"
                           class="btn btn-warning btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.buah.destroy', $buah->id) }}" method="POST"
                              onsubmit="return confirm('Yakin hapus « {{ $buah->nama }} »?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align:center; color:#999; padding:2.5rem;">
                    <div style="font-size:2.5rem;margin-bottom:0.5rem;">🍃</div>
                    Belum ada data buah.
                    <a href="{{ route('admin.buah.create') }}" style="color:var(--daun);font-weight:700;">Tambah sekarang</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($buahs->hasPages())
    <div style="padding:1rem 1.5rem;border-top:1px solid #f0f0f0;">
        {{ $buahs->withQueryString()->links() }}
    </div>
    @endif
</div>

@endsection