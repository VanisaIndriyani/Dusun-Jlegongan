@extends('layouts.admin')
@section('page-title', 'Data Kependudukan')
@section('content')

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
        <h5 class="fw-bold mb-0"><i class="bi bi-bar-chart-line me-2 text-success"></i>Daftar Statistik Kependudukan</h5>
        <a href="{{ route('admin.population-statistics.create') }}" class="btn btn-primary rounded-pill">
            <i class="bi bi-plus-lg me-2"></i>Tambah Data
        </a>
    </div>
</div>

@foreach($statistics as $category => $items)
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="fw-bold mb-0">
            <i class="bi bi-collection me-2 text-success"></i>
            Kategori: <span class="text-uppercase">{{ str_replace('_', ' ', $category) }}</span>
        </h6>
        <span class="badge-soft" style="background:#ecfdf5;color:#047857;">{{ $items->count() }} item</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive-custom">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width:60px;">NO</th>
                        <th>Subkategori</th>
                        <th style="width:150px;">Jumlah</th>
                        <th style="width:120px;">Laki-laki</th>
                        <th style="width:120px;">Perempuan</th>
                        <th style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $stat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $stat->subcategory }}</strong></td>
                        <td><span class="fw-semibold text-success">{{ number_format($stat->count) }}</span> jiwa</td>
                        <td>{{ $stat->male ? number_format($stat->male) : '-' }}</td>
                        <td>{{ $stat->female ? number_format($stat->female) : '-' }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.population-statistics.edit', $stat) }}" class="btn btn-sm btn-outline-primary rounded-pill">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('admin.population-statistics.destroy', $stat) }}" onsubmit="return confirm('Hapus data ini?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" type="submit">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endforeach

@endsection
