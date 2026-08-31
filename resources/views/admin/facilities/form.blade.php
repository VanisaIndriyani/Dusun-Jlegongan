@extends('layouts.admin')
@section('page-title', !empty($facility->getKey()) ? 'Edit Fasilitas' : 'Tambah Fasilitas')
@section('content')
<a href="{{ route('admin.facilities.index') }}" class="back-btn"><i class="bi bi-arrow-left"></i> Kembali</a>
<div class="card">
    <div class="card-header"><h5 class="fw-bold mb-0"><i class="bi bi-file-plus me-2 text-success"></i>{{ !empty($facility->getKey()) ? 'Edit Fasilitas' : 'Tambah Fasilitas' }}</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ !empty($facility->getKey()) ? route('admin.facilities.update', $facility) : route('admin.facilities.store') }}" enctype="multipart/form-data">
            @csrf @if(!empty($facility->getKey())) @method('PUT') @endif
            <div class="row g-4">
                <div class="col-md-12"><label class="form-label">Nama Fasilitas *</label><input type="text" name="name" class="form-control" value="{{ old('name', $facility->name ?? '') }}" required></div>
                <div class="col-md-12"><label class="form-label">Deskripsi *</label><textarea name="description" rows="4" class="form-control" required>{{ old('description', $facility->description ?? '') }}</textarea></div>
                <div class="col-md-6"><label class="form-label">Jadwal (opsional)</label><input type="text" name="schedule" class="form-control" value="{{ old('schedule', $facility->schedule ?? '') }}" placeholder="Contoh: Senin-Jumat 08.00-16.00"></div>
                <div class="col-md-6">
                    <label class="form-label">Gambar (max 2MB)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if($facility->image)<div class="mt-2"><small class="text-muted">Saat ini:</small><br><img src="{{ asset('storage/' . ltrim($facility->image, '/')) }}" class="img-preview mt-1"></div>@endif
                </div>
             
            </div>
            <div class="mt-4 d-flex gap-2"><button class="btn btn-primary rounded-pill px-5"><i class="bi bi-save me-2"></i>{{ !empty($facility->getKey()) ? 'Perbarui' : 'Simpan' }}</button><a href="{{ route('admin.facilities.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a></div>
        </form>
    </div>
</div>
@endsection
