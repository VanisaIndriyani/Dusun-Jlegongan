@extends('layouts.admin')
@section('page-title', !empty($schedule->getKey()) ? 'Edit Jadwal' : 'Tambah Jadwal')
@section('content')
<a href="{{ route('admin.schedules.index') }}" class="back-btn"><i class="bi bi-arrow-left"></i> Kembali</a>
<div class="card">
    <div class="card-header"><h5 class="fw-bold mb-0"><i class="bi bi-file-plus me-2 text-success"></i>{{ !empty($schedule->getKey()) ? 'Edit Jadwal' : 'Tambah Jadwal Rutin' }}</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ !empty($schedule->getKey()) ? route('admin.schedules.update', $schedule) : route('admin.schedules.store') }}" enctype="multipart/form-data">
            @csrf @if(!empty($schedule->getKey())) @method('PUT') @endif
            @php $days = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu','Senin–Jumat','Senin–Sabtu','Setiap hari']; $sel = old('day', $schedule->day ?? '') @endphp
            <div class="row g-4">
                <div class="col-md-8"><label class="form-label">Nama Kegiatan *</label><input type="text" name="name" class="form-control" value="{{ old('name', $schedule->name ?? '') }}" required></div>
                <div class="col-md-2"><label class="form-label">Hari *</label>
                    <select name="day" class="form-select" required>
                        @foreach($days as $d)<option value="{{$d}}" {{ $sel == $d ? 'selected' : '' }}>{{$d}}</option>@endforeach
                    </select>
                </div>
                <div class="col-md-2"><label class="form-label">Waktu *</label><input type="text" name="time" class="form-control" value="{{ old('time', $schedule->time ?? '') }}" placeholder="contoh: 07.00-10.00" required></div>
                <div class="col-md-12"><label class="form-label">Deskripsi</label><textarea name="description" rows="3" class="form-control">{{ old('description', $schedule->description ?? '') }}</textarea></div>
                <div class="col-md-6"><label class="form-label">Gambar (opsional, max 2MB)</label><input type="file" name="image" class="form-control" accept="image/*">
                    @if($schedule->image)<div class="mt-2"><img src="{{ asset('storage/' . ltrim($schedule->image, '/')) }}" class="img-preview mt-1"></div>@endif
                </div>
             
            </div>
            <div class="mt-4 d-flex gap-2"><button class="btn btn-primary rounded-pill px-5"><i class="bi bi-save me-2"></i>{{ !empty($schedule->getKey()) ? 'Perbarui' : 'Simpan' }}</button><a href="{{ route('admin.schedules.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a></div>
        </form>
    </div>
</div>
@endsection
