@extends('layouts.admin')
@section('page-title', 'Edit Data Kependudukan')

@section('content')

<a href="{{ route('admin.population-statistics.index') }}" class="back-btn"><i class="bi bi-arrow-left"></i> Kembali</a>

<div class="card">
    <div class="card-header"><h5 class="fw-bold mb-0"><i class="bi bi-pencil-square me-2 text-success"></i>Edit Data Statistik</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.population-statistics.update', $populationStatistic) }}">
            @csrf @method('PUT')
            <div class="row g-4">
                <div class="col-md-4">
                    <label class="form-label">Kategori *</label>
                    <select name="category" class="form-select" required>
                        <option value="jenis_kelamin" {{ $populationStatistic->category == 'jenis_kelamin' ? 'selected' : '' }}>Jenis Kelamin</option>
                        <option value="kelompok_usia" {{ $populationStatistic->category == 'kelompok_usia' ? 'selected' : '' }}>Kelompok Usia</option>
                        <option value="pekerjaan" {{ $populationStatistic->category == 'pekerjaan' ? 'selected' : '' }}>Pekerjaan</option>
                        <option value="agama" {{ $populationStatistic->category == 'agama' ? 'selected' : '' }}>Agama</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Subkategori *</label>
                    <input type="text" name="subcategory" class="form-control" value="{{ old('subcategory', $populationStatistic->subcategory) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Jumlah Total *</label>
                    <input type="number" min="0" name="count" class="form-control" value="{{ old('count', $populationStatistic->count) }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Jumlah Laki-laki</label>
                    <input type="number" min="0" name="male" class="form-control" value="{{ old('male', $populationStatistic->male) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Jumlah Perempuan</label>
                    <input type="number" min="0" name="female" class="form-control" value="{{ old('female', $populationStatistic->female) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description', $populationStatistic->description) }}">
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button class="btn btn-primary rounded-pill px-5"><i class="bi bi-save me-2"></i>Perbarui</button>
                <a href="{{ route('admin.population-statistics.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
