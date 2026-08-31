@extends('layouts.admin')
@section('page-title', 'PKK & KWT')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
        <h5 class="fw-bold mb-0"><i class="bi bi-diagram-3 me-2 text-success"></i>Daftar Organisasi (PKK &amp; KWT)</h5>
        <a href="{{ route('admin.organizations.create') }}" class="btn btn-primary rounded-pill"><i class="bi bi-plus-lg me-2"></i>Tambah Organisasi</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive-custom">
            <table class="table table-hover mb-0">
                <thead><tr><th>NO</th><th>Tipe</th><th>Nama Organisasi</th><th>Gambar</th><th>Status</th><th style="width:180px;">Aksi</th></tr></thead>
                <tbody>
                    @foreach($organizations as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><span class="badge-soft" style="background: {{ $item->type == 'PKK' ? '#fce7f3;color:#be185d' : '#dcfce7;color:#047857' }};">{{ $item->type }}</span></td>
                        <td><strong>{{ $item->name }}</strong><br><small class="text-muted">{{ Str::limit($item->description, 70) }}</small></td>
                        <td>@if($item->image)<img src="{{ asset('storage/' . ltrim($item->image, '/')) }}" class="img-preview">@else - @endif</td>
                        <td>{!! $item->is_active ? '<span class="badge-soft" style="background:#d1fae5;color:#059669;">Aktif</span>' : '<span class="badge-soft" style="background:#fee2e2;color:#dc2626;">Tidak Aktif</span>' !!}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.organizations.edit', $item) }}" class="btn btn-sm btn-outline-primary rounded-pill"><i class="bi bi-pencil"></i> Edit</a>
                                <form method="POST" action="{{ route('admin.organizations.destroy', $item) }}" onsubmit="return confirm('Hapus organisasi ini?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if($organizations->isEmpty())<tr><td colspan="6" class="text-center py-5 text-muted">Belum ada organisasi.</td></tr>@endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
