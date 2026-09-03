@extends('layouts.admin')
@section('page-title', 'Edit Konten')

@section('content')

<a href="{{ route('admin.contents.index') }}" class="back-btn">
    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Konten
</a>

<div class="card">
    <div class="card-header">
        <h5 class="fw-bold mb-0"><i class="bi bi-pencil-square me-2 text-success"></i>Form Edit Konten</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.contents.update', $content) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-4">
                <div class="col-md-4">
                    <label class="form-label">Tipe Konten *</label>
                    <select name="type" class="form-select" required>
                        <option value="sejarah" {{ $content->type == 'sejarah' ? 'selected' : '' }}>Sejarah</option>
                        <option value="geografis" {{ $content->type == 'geografis' ? 'selected' : '' }}>Geografis</option>
                        <option value="struktur" {{ $content->type == 'struktur' ? 'selected' : '' }}>Struktur Kepadukuhan</option>
                        <option value="beranda_hero" {{ $content->type == 'beranda_hero' ? 'selected' : '' }}>Hero Beranda (Gambar)</option>
                        <option value="kontak" {{ $content->type == 'kontak' ? 'selected' : '' }}>Kontak (No. Telp)</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <label class="form-label">Judul *</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $content->title) }}" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Deskripsi / Keterangan</label>
                    <textarea name="description" rows="5" class="form-control" placeholder="Masukkan deskripsi atau keterangan...">{{ old('description', $content->description) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Gambar (max 2MB)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if($content->image)
                        <div class="mt-2">
                            <small class="text-muted d-block mb-1">Gambar saat ini:</small>
                            <img src="{{ asset('storage/' . ltrim($content->image, '/')) }}" class="img-preview">
                        </div>
                    @endif
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary px-5 rounded-pill">
                    <i class="bi bi-save me-2"></i>Perbarui
                </button>
                <a href="{{ route('admin.contents.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
