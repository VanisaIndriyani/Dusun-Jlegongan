@extends('layouts.admin')
@section('page-title', !empty($potential->getKey()) ? 'Edit Potensi' : 'Tambah Potensi')
@section('content')
<a href="{{ route('admin.potentials.index') }}" class="back-btn"><i class="bi bi-arrow-left"></i> Kembali</a>
<div class="card">
    <div class="card-header"><h5 class="fw-bold mb-0"><i class="bi bi-file-plus me-2 text-success"></i>{{ !empty($potential->getKey()) ? 'Edit Potensi' : 'Tambah Potensi' }}</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ !empty($potential->getKey()) ? route('admin.potentials.update', $potential) : route('admin.potentials.store') }}" enctype="multipart/form-data">
            @csrf @if(!empty($potential->getKey())) @method('PUT') @endif
            @php $cats = ['Sosial Kemasyarakatan','Pertanian','Peternakan','Kepemudaan','Lainnya']; $sel = old('category', $potential->category ?? '') @endphp
            <div class="row g-4">
                <div class="col-md-4"><label class="form-label">Kategori *</label>
                    <select name="category" class="form-select" required>
                        @foreach($cats as $c)<option value="{{$c}}" {{ $sel == $c ? 'selected' : '' }}>{{$c}}</option>@endforeach
                    </select>
                </div>
                <div class="col-md-8"><label class="form-label">Judul *</label><input type="text" name="title" class="form-control" value="{{ old('title', $potential->title ?? '') }}" required></div>
                <div class="col-md-12"><label class="form-label">Deskripsi Singkat *</label><textarea name="description" rows="2" class="form-control" required>{{ old('description', $potential->description ?? '') }}</textarea></div>
                <div class="col-md-12"><label class="form-label">Isi Konten (HTML)</label><textarea name="content" rows="6" class="form-control">{{ old('content', $potential->content ?? '') }}</textarea></div>
                <div class="col-md-6"><label class="form-label">Gambar (max 2MB)</label><input type="file" name="image" class="form-control" accept="image/*">
                    @if($potential->image)<div class="mt-2"><img src="{{ asset('storage/' . ltrim($potential->image, '/')) }}" class="img-preview mt-1"></div>@endif
                </div>
                <div class="col-md-6"><label class="form-label">Sumber Artikel</label><input type="text" name="source" class="form-control" value="{{ old('source', $potential->source ?? '') }}" placeholder="Nama sumber"></div>
                <div class="col-md-6"><label class="form-label">URL Sumber</label><input type="url" name="source_url" class="form-control" value="{{ old('source_url', $potential->source_url ?? '') }}" placeholder="https://..."></div>
               
            </div>
            <div class="mt-4 d-flex gap-2"><button class="btn btn-primary rounded-pill px-5"><i class="bi bi-save me-2"></i>{{ !empty($potential->getKey()) ? 'Perbarui' : 'Simpan' }}</button><a href="{{ route('admin.potentials.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a></div>
        </form>
    </div>
</div>
@endsection
