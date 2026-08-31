@extends('layouts.admin')
@section('page-title', !empty($activity->getKey()) ? 'Edit Kegiatan' : 'Tambah Kegiatan')
@section('content')
<a href="{{ route('admin.activities.index') }}" class="back-btn"><i class="bi bi-arrow-left"></i> Kembali</a>
<div class="card">
    <div class="card-header"><h5 class="fw-bold mb-0"><i class="bi bi-file-plus me-2 text-success"></i>{{ !empty($activity->getKey()) ? 'Edit Kegiatan' : 'Form Tambah Kegiatan' }}</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ !empty($activity->getKey()) ? route('admin.activities.update', $activity) : route('admin.activities.store') }}" enctype="multipart/form-data">
            @csrf @if(!empty($activity->getKey())) @method('PUT') @endif
            <div class="row g-4">
                <div class="col-md-4">
                    <label class="form-label">Kategori *</label>
                    <select name="category" class="form-select" required>
                        @php $sel = old('category', $activity->category ?? '') @endphp
                        <option value="Pertanian" {{ $sel == 'Pertanian' ? 'selected' : '' }}>Pertanian</option>
                        <option value="Peternakan" {{ $sel == 'Peternakan' ? 'selected' : '' }}>Peternakan</option>
                        <option value="Karang Taruna" {{ $sel == 'Karang Taruna' ? 'selected' : '' }}>Karang Taruna</option>
                        <option value="Lainnya" {{ $sel == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <label class="form-label">Nama Kegiatan *</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $activity->name ?? '') }}" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Deskripsi *</label>
                    <textarea name="description" rows="4" class="form-control" required>{{ old('description', $activity->description ?? '') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Gambar (max 2MB)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if($activity->image)
                        <div class="mt-2"><small class="text-muted">Saat ini:</small><br><img src="{{ asset('storage/' . ltrim($activity->image, '/')) }}" class="img-preview mt-1"></div>
                    @endif
                </div>
            
            </div>
            <div class="mt-4 d-flex gap-2">
                <button class="btn btn-primary rounded-pill px-5"><i class="bi bi-save me-2"></i>{{ !empty($activity->getKey()) ? 'Perbarui' : 'Simpan' }}</button>
                <a href="{{ route('admin.activities.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
