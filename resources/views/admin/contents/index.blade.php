@extends('layouts.admin')
@section('page-title', 'Sejarah & Geografis')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
        <h5 class="fw-bold mb-0"><i class="bi bi-journal-text me-2 text-success"></i>Daftar Konten</h5>
        <a href="{{ route('admin.contents.create') }}" class="btn btn-primary rounded-pill">
            <i class="bi bi-plus-lg me-2"></i>Tambah Konten
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive-custom">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tipe</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Dibuat</th>
                        <th style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contents as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><span class="badge-soft" style="background:#d1fae5;color:#047857;">{{ $item->type }}</span></td>
                        <td><strong>{{ $item->title }}</strong></td>
                        <td>
                            @if($item->image)
                                <img src="{{ asset('storage/' . ltrim($item->image, '/')) }}" alt="img" class="img-preview">
                            @else
                                <span class="text-muted small">-</span>
                            @endif
                        </td>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.contents.edit', $item) }}" class="btn btn-sm btn-outline-primary rounded-pill">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('admin.contents.destroy', $item) }}" onsubmit="return confirm('Hapus konten ini?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" type="submit">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if($contents->isEmpty())
                    <tr><td colspan="6" class="text-center py-5 text-muted">Belum ada konten. Klik "Tambah Konten" untuk memulai.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
