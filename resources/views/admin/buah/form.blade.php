@extends('layouts.admin')

@section('title', isset($buah) ? 'Edit Buah' : 'Tambah Buah')
@section('page-title', isset($buah) ? '✏️ Edit: ' . $buah->nama : '➕ Tambah Buah Baru')

@section('content')

<div class="form-panel">

    @if($errors->any())
    <div class="alert alert-error">
        <div>
            <i class="fas fa-exclamation-circle"></i>
            <strong>Ada kesalahan:</strong>
            <ul style="margin:0.4rem 0 0 1rem;">
                @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <form action="{{ isset($buah) ? route('admin.buah.update', $buah->id) : route('admin.buah.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($buah)) @method('PUT') @endif

        <div class="form-row">
            {{-- NAMA BUAH --}}
            <div class="form-group">
                <label>Nama Buah <span class="req">*</span></label>
                <input type="text" name="nama" class="form-control"
                       value="{{ old('nama', $buah->nama ?? '') }}"
                       placeholder="cth: Durian, Salak, Manggis" required>
            </div>

            {{-- NAMA LATIN --}}
            <div class="form-group">
                <label>Nama Latin</label>
                <input type="text" name="nama_latin" class="form-control"
                       value="{{ old('nama_latin', $buah->nama_latin ?? '') }}"
                       placeholder="cth: Durio zibethinus">
                <div class="form-hint">Opsional — nama ilmiah buah</div>
            </div>
        </div>

        <div class="form-row">
            {{-- ASAL DAERAH --}}
            <div class="form-group">
                <label>Asal Daerah</label>
                <input type="text" name="asal_daerah" class="form-control"
                       value="{{ old('asal_daerah', $buah->asal_daerah ?? '') }}"
                       placeholder="cth: Kalimantan, Sumatera, Jawa">
            </div>

            {{-- MUSIM PANEN --}}
            <div class="form-group">
                <label>Musim Panen</label>
                <input type="text" name="musim_panen" class="form-control"
                       value="{{ old('musim_panen', $buah->musim_panen ?? '') }}"
                       placeholder="cth: Desember - Februari">
            </div>
        </div>

        <div class="form-row">
            {{-- AUTHOR --}}
            <div class="form-group">
                <label>Nama Penulis <span class="req">*</span></label>
                <input type="text" name="author" class="form-control"
                       value="{{ old('author', $buah->author ?? Auth::user()->name ?? '') }}"
                       placeholder="cth: Budi Santoso" required>
            </div>

            {{-- SLUG (auto) --}}
            <div class="form-group">
                <label>Slug URL</label>
                <input type="text" name="slug" id="slug" class="form-control"
                       value="{{ old('slug', $buah->slug ?? '') }}"
                       placeholder="otomatis dari nama buah">
                <div class="form-hint">Kosongkan untuk generate otomatis</div>
            </div>
        </div>

        {{-- DESKRIPSI --}}
        <div class="form-group">
            <label>Deskripsi <span class="req">*</span></label>
            <textarea name="deskripsi" class="form-control" rows="5"
                      placeholder="Ceritakan tentang buah ini — asal usul, ciri khas, rasa, habitat…" required>{{ old('deskripsi', $buah->deskripsi ?? '') }}</textarea>
        </div>

        {{-- MANFAAT --}}
        <div class="form-group">
            <label>Manfaat & Kandungan</label>
            <textarea name="manfaat" class="form-control" rows="4"
                      placeholder="Vitamin, mineral, khasiat untuk kesehatan…">{{ old('manfaat', $buah->manfaat ?? '') }}</textarea>
        </div>

        {{-- GAMBAR --}}
        <div class="form-group">
            <label>Foto Buah</label>
            <input type="file" name="gambar" class="form-control" accept="image/*"
                   onchange="previewImg(this)">
            <div class="form-hint">Format: JPG, PNG, WebP. Maks 2MB. Ukuran ideal: 800×500px</div>

            <div class="img-preview-wrap" id="imgPreview">
                @if(isset($buah) && $buah->gambar)
                <div style="margin-top:0.7rem;">
                    <p style="font-size:0.8rem;color:#999;margin-bottom:0.4rem;">Foto saat ini:</p>
                    <img src="{{ asset('storage/'.$buah->gambar) }}" alt="{{ $buah->nama }}"
                         style="max-width:200px;border-radius:8px;border:2px solid #e0e0e0;">
                </div>
                @endif
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                {{ isset($buah) ? 'Simpan Perubahan' : 'Tambah Buah' }}
            </button>
            <a href="{{ route('admin.buah.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
            @if(isset($buah))
            <a href="{{ route('buah.show', $buah->slug) }}" target="_blank" class="btn btn-secondary" style="margin-left:auto;">
                <i class="fas fa-eye"></i> Lihat di Website
            </a>
            @endif
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script>
    // Auto-generate slug from nama
    document.querySelector('[name=nama]').addEventListener('input', function() {
        const slugField = document.getElementById('slug');
        if (!slugField.dataset.manual) {
            slugField.value = this.value
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();
        }
    });

    document.getElementById('slug').addEventListener('input', function() {
        this.dataset.manual = 'true';
    });

    // Image preview
    function previewImg(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                document.getElementById('imgPreview').innerHTML =
                    `<div style="margin-top:0.7rem;">
                        <p style="font-size:0.8rem;color:#999;margin-bottom:0.4rem;">Preview:</p>
                        <img src="${e.target.result}" style="max-width:200px;border-radius:8px;border:2px solid var(--daun);">
                    </div>`;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush