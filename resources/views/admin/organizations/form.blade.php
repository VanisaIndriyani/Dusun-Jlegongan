@extends('layouts.admin')
@section('page-title', !empty($organization->getKey()) ? 'Edit Organisasi' : 'Tambah Organisasi')
@section('content')
<a href="{{ route('admin.organizations.index') }}" class="back-btn"><i class="bi bi-arrow-left"></i> Kembali</a>
<div class="card">
    <div class="card-header"><h5 class="fw-bold mb-0"><i class="bi bi-file-plus me-2 text-success"></i>{{ !empty($organization->getKey()) ? 'Edit Organisasi' : 'Tambah Organisasi (PKK/KWT)' }}</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ !empty($organization->getKey()) ? route('admin.organizations.update', $organization) : route('admin.organizations.store') }}" enctype="multipart/form-data">
            @csrf @if(!empty($organization->getKey())) @method('PUT') @endif
            @php $sel = old('type', $organization->type ?? '') @endphp
            <div class="row g-4">
                <div class="col-md-4"><label class="form-label">Tipe *</label>
                    <select name="type" class="form-select" required>
                        <option value="PKK" {{ $sel == 'PKK' ? 'selected' : '' }}>PKK</option>
                        <option value="KWT" {{ $sel == 'KWT' ? 'selected' : '' }}>KWT</option>
                    </select>
                </div>
                <div class="col-md-8"><label class="form-label">Nama Organisasi *</label><input type="text" name="name" class="form-control" value="{{ old('name', $organization->name ?? '') }}" required></div>
                <div class="col-md-12"><label class="form-label">Deskripsi *</label><textarea name="description" rows="4" class="form-control" required>{{ old('description', $organization->description ?? '') }}</textarea></div>
                <div class="col-md-12"><label class="form-label">Kegiatan Rutin (HTML)</label><textarea name="activities" rows="6" class="form-control" placeholder="Daftar kegiatan rutin organisasi">{{ old('activities', $organization->activities ?? '') }}</textarea></div>
                <div class="col-md-6"><label class="form-label">Gambar (max 2MB)</label><input type="file" name="image" class="form-control" accept="image/*">
                    @if($organization->image)<div class="mt-2"><img src="{{ asset('storage/' . ltrim($organization->image, '/')) }}" class="img-preview mt-1"></div>@endif
                </div>
            
            </div>
            <div class="mt-4 d-flex gap-2"><button class="btn btn-primary rounded-pill px-5"><i class="bi bi-save me-2"></i>{{ !empty($organization->getKey()) ? 'Perbarui' : 'Simpan' }}</button><a href="{{ route('admin.organizations.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a></div>
        </form>
    </div>
</div>
@endsection
