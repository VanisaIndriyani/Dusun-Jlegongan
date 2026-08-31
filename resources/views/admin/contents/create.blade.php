@extends('layouts.admin')
@section('page-title', 'Tambah Konten')

@section('content')

<a href="{{ route('admin.contents.index') }}" class="back-btn">
    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Konten
</a>

<div class="card">
    <div class="card-header">
        <h5 class="fw-bold mb-0"><i class="bi bi-file-plus me-2 text-success"></i>Form Tambah Konten</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.contents.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <div class="col-md-4">
                    <label class="form-label">Tipe Konten *</label>
                    <select name="type" class="form-select" required>
                        <option value="sejarah" {{ old('type') == 'sejarah' ? 'selected' : '' }}>Sejarah</option>
                        <option value="geografis" {{ old('type') == 'geografis' ? 'selected' : '' }}>Geografis</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <label class="form-label">Judul *</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required placeholder="Masukkan judul">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Deskripsi Singkat</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description') }}" placeholder="Deskripsi singkat">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Isi Konten (HTML diperbolehkan)</label>
                    <textarea name="content" rows="8" class="form-control" placeholder="Tulis konten lengkap disini...">{{ old('content') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Gambar (opsional, max 2MB)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary px-5 rounded-pill">
                    <i class="bi bi-save me-2"></i>Simpan
                </button>
                <a href="{{ route('admin.contents.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
