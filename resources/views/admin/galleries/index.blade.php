@extends('layouts.admin')
@section('page-title', 'Galeri Foto')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
        <h5 class="fw-bold mb-0"><i class="bi bi-images me-2 text-success"></i>Daftar Galeri Foto</h5>
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary rounded-pill"><i class="bi bi-plus-lg me-2"></i>Unggah Foto</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive-custom">
            <table class="table table-hover mb-0">
                <thead><tr><th style="width:70px;">NO</th><th>Foto</th><th>Judul</th><th>Kategori</th><th>Status</th><th style="width:180px;">Aksi</th></tr></thead>
                <tbody>
                    @foreach($galleries as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($item->image)
                                <img src="{{ asset('storage/' . ltrim($item->image, '/')) }}" class="img-preview" onclick="window.open('{{ asset('storage/' . ltrim($item->image, '/')) }}')" style="cursor:pointer;">
                            @else - @endif
                        </td>
                        <td><strong>{{ $item->title }}</strong><br>@if($item->description)<small class="text-muted">{{ Str::limit($item->description, 60) }}</small>@endif</td>
                        <td>@if($item->category)<span class="badge-soft" style="background:#ecfdf5;color:#047857;">{{ $item->category }}</span>@else - @endif</td>
                        <td>{!! $item->is_active ? '<span class="badge-soft" style="background:#d1fae5;color:#059669;">Aktif</span>' : '<span class="badge-soft" style="background:#fee2e2;color:#dc2626;">Tidak Aktif</span>' !!}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.galleries.edit', $item) }}" class="btn btn-sm btn-outline-primary rounded-pill"><i class="bi bi-pencil"></i> Edit</a>
                                <form method="POST" action="{{ route('admin.galleries.destroy', $item) }}" onsubmit="return confirm('Hapus foto ini?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if($galleries->isEmpty())<tr><td colspan="6" class="text-center py-5 text-muted">Belum ada foto galeri. Klik "Unggah Foto" untuk menambahkan.</td></tr>@endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
