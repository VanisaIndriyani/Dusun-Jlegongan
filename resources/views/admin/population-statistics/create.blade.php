@extends('layouts.admin')
@section('page-title', 'Tambah Data Kependudukan')

@section('content')

<a href="{{ route('admin.population-statistics.index') }}" class="back-btn">
    <i class="bi bi-arrow-left"></i> Kembali
</a>

<div class="card">
    <div class="card-header"><h5 class="fw-bold mb-0"><i class="bi bi-file-plus me-2 text-success"></i>Tambah Data Statistik</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.population-statistics.store') }}">
            @csrf
            <div class="row g-4">
                <div class="col-md-4">
                    <label class="form-label">Kategori *</label>
                    <select name="category" class="form-select" required>
                        <option value="jenis_kelamin">Jenis Kelamin</option>
                        <option value="kelompok_usia">Kelompok Usia</option>
                        <option value="pekerjaan">Pekerjaan</option>
                        <option value="agama">Agama</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Subkategori *</label>
                    <input type="text" name="subcategory" class="form-control" value="{{ old('subcategory') }}" required placeholder="contoh: Laki-laki, 0–5 tahun, dsb">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Jumlah Total *</label>
                    <input type="number" min="0" name="count" class="form-control" value="{{ old('count', 0) }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Jumlah Laki-laki</label>
                    <input type="number" min="0" name="male" class="form-control" value="{{ old('male') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Jumlah Perempuan</label>
                    <input type="number" min="0" name="female" class="form-control" value="{{ old('female') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Deskripsi (opsional)</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button class="btn btn-primary rounded-pill px-5"><i class="bi bi-save me-2"></i>Simpan</button>
                <a href="{{ route('admin.population-statistics.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
