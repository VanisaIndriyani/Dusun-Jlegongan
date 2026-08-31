@extends('layouts.admin')
@section('page-title', 'Dashboard')

@section('content')

<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon" style="background: #d1fae5; color: #059669;">
                <i class="bi bi-journal-text"></i>
            </div>
            <div>
                <div class="stat-number">{{ $totalContent }}</div>
                <div class="stat-label">Konten (Sejarah/Geografis)</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon" style="background: #dbeafe; color: #2563eb;">
                <i class="bi bi-people-fill"></i>
            </div>
            <div>
                <div class="stat-number">{{ $totalPenduduk }}</div>
                <div class="stat-label">Total Penduduk</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon" style="background: #fef3c7; color: #d97706;">
                <i class="bi bi-activity"></i>
            </div>
            <div>
                <div class="stat-number">{{ $totalActivity }}</div>
                <div class="stat-label">Kegiatan Masyarakat</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon" style="background: #fce7f3; color: #db2777;">
                <i class="bi bi-building"></i>
            </div>
            <div>
                <div class="stat-number">{{ $totalFacility }}</div>
                <div class="stat-label">Fasilitas Dusun</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon" style="background: #ede9fe; color: #7c3aed;">
                <i class="bi bi-graph-up-arrow"></i>
            </div>
            <div>
                <div class="stat-number">{{ $totalPotential }}</div>
                <div class="stat-label">Potensi Dusun</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon" style="background: #fee2e2; color: #dc2626;">
                <i class="bi bi-calendar3"></i>
            </div>
            <div>
                <div class="stat-number">{{ $totalSchedule }}</div>
                <div class="stat-label">Jadwal Rutin</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon" style="background: #cffafe; color: #0891b2;">
                <i class="bi bi-diagram-3"></i>
            </div>
            <div>
                <div class="stat-number">{{ $totalOrganization }}</div>
                <div class="stat-label">Organisasi (PKK/KWT)</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon" style="background: #f1f5f9; color: #334155;">
                <i class="bi bi-images"></i>
            </div>
            <div>
                <div class="stat-number">{{ $totalGallery }}</div>
                <div class="stat-label">Galeri Foto</div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold mb-0"><i class="bi bi-speedometer2 me-2 text-success"></i>Selamat Datang di Admin Panel</h5>
            </div>
            <div class="card-body">
                <p class="mb-3">Selamat datang, <strong>{{ auth()->user()->name }}</strong>! 👋</p>
                <p class="text-muted mb-4" style="line-height: 1.8;">
                    Panel Admin ini digunakan untuk mengelola seluruh konten website Dusun Jlegongan, mulai dari sejarah, data kependudukan, 
                    kegiatan masyarakat, fasilitas, potensi, jadwal rutin, PKK/KWT, hingga galeri foto.
                </p>
                <div class="d-grid gap-2">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-success">
                        <i class="bi bi-box-arrow-up-right me-2"></i>Lihat Website Publik
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="fw-bold mb-0"><i class="bi bi-lightbulb me-2 text-warning"></i>Panduan Singkat</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex gap-3 px-0 py-3 border-0">
                        <span class="badge bg-success rounded-pill d-flex align-items-center justify-content-center flex-shrink-0" style="width: 28px; height: 28px;">1</span>
                        <div>
                            <strong>Kelola Konten:</strong> Tambah/edit/hapus sejarah & peta geografis.
                        </div>
                    </li>
                    <li class="list-group-item d-flex gap-3 px-0 py-3 border-0">
                        <span class="badge bg-success rounded-pill d-flex align-items-center justify-content-center flex-shrink-0" style="width: 28px; height: 28px;">2</span>
                        <div>
                            <strong>Data Kependudukan:</strong> Kelola data agregat (tidak ada data individu).
                        </div>
                    </li>
                    <li class="list-group-item d-flex gap-3 px-0 py-3 border-0">
                        <span class="badge bg-success rounded-pill d-flex align-items-center justify-content-center flex-shrink-0" style="width: 28px; height: 28px;">3</span>
                        <div>
                            <strong>Konten Dinamis:</strong> Kegiatan, Fasilitas, Potensi, Jadwal bisa dikelola per item.
                        </div>
                    </li>
                    <li class="list-group-item d-flex gap-3 px-0 py-3 border-0">
                        <span class="badge bg-success rounded-pill d-flex align-items-center justify-content-center flex-shrink-0" style="width: 28px; height: 28px;">4</span>
                        <div>
                            <strong>Upload Gambar:</strong> Gambar disimpan via Laravel Storage, maks 2MB.
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
