@extends('layouts.admin')
@section('page-title', 'Potensi Dusun')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
        <h5 class="fw-bold mb-0"><i class="bi bi-graph-up-arrow me-2 text-success"></i>Daftar Potensi</h5>
        <a href="{{ route('admin.potentials.create') }}" class="btn btn-primary rounded-pill"><i class="bi bi-plus-lg me-2"></i>Tambah Potensi</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive-custom">
            <table class="table table-hover mb-0">
                <thead><tr><th>NO</th><th>Kategori</th><th>Judul</th><th>Gambar</th><th>Sumber</th><th>Status</th><th style="width:180px;">Aksi</th></tr></thead>
                <tbody>
                    @foreach($potentials as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><span class="badge-soft" style="background:#ecfdf5;color:#047857;">{{ $item->category }}</span></td>
                        <td><strong>{{ $item->title }}</strong><br><small class="text-muted">{{ Str::limit($item->description, 60) }}</small></td>
                        <td>@if($item->image)<img src="{{ asset('storage/' . ltrim($item->image, '/')) }}" class="img-preview">@else - @endif</td>
                        <td>@if($item->source)<small class="text-muted">{{ Str::limit($item->source, 40) }}</small>@else - @endif</td>
                        <td>{!! $item->is_active ? '<span class="badge-soft" style="background:#d1fae5;color:#059669;">Aktif</span>' : '<span class="badge-soft" style="background:#fee2e2;color:#dc2626;">Tidak Aktif</span>' !!}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.potentials.edit', $item) }}" class="btn btn-sm btn-outline-primary rounded-pill"><i class="bi bi-pencil"></i> Edit</a>
                                <form method="POST" action="{{ route('admin.potentials.destroy', $item) }}" onsubmit="return confirm('Hapus potensi ini?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if($potentials->isEmpty())<tr><td colspan="7" class="text-center py-5 text-muted">Belum ada potensi.</td></tr>@endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
