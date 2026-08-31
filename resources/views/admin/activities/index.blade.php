@extends('layouts.admin')
@section('page-title', 'Kegiatan Masyarakat')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
        <h5 class="fw-bold mb-0"><i class="bi bi-people me-2 text-success"></i>Daftar Kegiatan</h5>
        <a href="{{ route('admin.activities.create') }}" class="btn btn-primary rounded-pill"><i class="bi bi-plus-lg me-2"></i>Tambah Kegiatan</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive-custom">
            <table class="table table-hover mb-0">
                <thead>
                    <tr><th>No</th><th>Kategori</th><th>Nama Kegiatan</th><th>Gambar</th><th>Status</th><th style="width:180px;">Aksi</th></tr>
                </thead>
                <tbody>
                    @foreach($activities as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><span class="badge-soft" style="background:#ecfdf5;color:#047857;">{{ $item->category }}</span></td>
                        <td><strong>{{ $item->name }}</strong><br><small class="text-muted">{{ Str::limit($item->description, 60) }}</small></td>
                        <td>
                            @if($item->image) <img src="{{ asset('storage/' . ltrim($item->image, '/')) }}" class="img-preview" alt="">
                            @else <span class="text-muted small">-</span> @endif
                        </td>
                        <td>
                            @if($item->is_active)
                                <span class="badge-soft" style="background:#d1fae5;color:#059669;">Aktif</span>
                            @else
                                <span class="badge-soft" style="background:#fee2e2;color:#dc2626;">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.activities.edit', $item) }}" class="btn btn-sm btn-outline-primary rounded-pill"><i class="bi bi-pencil"></i> Edit</a>
                                <form method="POST" action="{{ route('admin.activities.destroy', $item) }}" onsubmit="return confirm('Hapus kegiatan ini?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if($activities->isEmpty())<tr><td colspan="6" class="text-center py-5 text-muted">Belum ada kegiatan.</td></tr>@endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
