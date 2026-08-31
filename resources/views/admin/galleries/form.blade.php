@extends('layouts.admin')
@section('page-title', !empty($gallery->getKey()) ? 'Edit Galeri' : 'Unggah Galeri')
@section('content')
<a href="{{ route('admin.galleries.index') }}" class="back-btn"><i class="bi bi-arrow-left"></i> Kembali</a>
<div class="card">
    <div class="card-header"><h5 class="fw-bold mb-0"><i class="bi bi-image me-2 text-success"></i>{{ !empty($gallery->getKey()) ? 'Edit Foto Galeri' : 'Unggah Foto Galeri Baru' }}</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ !empty($gallery->getKey()) ? route('admin.galleries.update', $gallery) : route('admin.galleries.store') }}" enctype="multipart/form-data">
            @csrf @if(!empty($gallery->getKey())) @method('PUT') @endif
            <div class="row g-4">
                <div class="col-md-8"><label class="form-label">Judul Foto *</label><input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title ?? '') }}" required placeholder="Judul/nama foto"></div>
                <div class="col-md-4"><label class="form-label">Kategori</label><input type="text" name="category" class="form-control" value="{{ old('category', $gallery->category ?? '') }}" placeholder="Contoh: Kegiatan, Pertanian, Sosial"></div>
                <div class="col-md-12"><label class="form-label">Deskripsi</label><textarea name="description" rows="2" class="form-control" placeholder="Keterangan foto (opsional)">{{ old('description', $gallery->description ?? '') }}</textarea></div>
                <div class="col-md-6">
                    <label class="form-label">Gambar {{ !empty($gallery->getKey()) ? '(ganti jika perlu)' : '*' }}</label>
                    <input type="file" name="image" class="form-control" accept="image/*" {{ !empty($gallery->getKey()) ? '' : 'required' }}>
                    <small class="text-muted d-block mt-1">Format: JPG/PNG/GIF, Maks 2MB</small>
                    @if($gallery->image)
                        <div class="mt-2"><small class="text-muted">Saat ini:</small><br><img src="{{ asset('storage/' . ltrim($gallery->image, '/')) }}" class="img-preview mt-1" style="width:120px;"></div>
                    @endif
                </div>
              
            </div>
            <div class="mt-4 d-flex gap-2"><button class="btn btn-primary rounded-pill px-5"><i class="bi bi-save me-2"></i>{{ !empty($gallery->getKey()) ? 'Perbarui' : 'Unggah' }}</button><a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a></div>
        </form>
    </div>
</div>
@endsection
