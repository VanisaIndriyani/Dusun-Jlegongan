@extends('layouts.frontend')
@section('title', 'Data Kependudukan')

@section('content')
<section class="page-hero">
    <div class="wrap-container">
        <div class="crumb">
            <a href="{{ route('home') }}"><i class="bi bi-house"></i> Beranda</a>
            <i class="bi bi-chevron-right"></i>
            <span class="active">Kependudukan</span>
        </div>
        <h1>Data Kependudukan</h1>
        <p>Statistik agregat penduduk Dusun Jlegongan (data total, tanpa data pribadi individu).</p>
    </div>
</section>

<section class="section">
    <div class="wrap-container">

        <div class="stats-wrap mb-5" style="transform: none; box-shadow: 0 10px 30px rgba(4,120,87,0.08);">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="stat-single">
                        <div class="stat-ic" style="background:#ecfdf5;color:#059669;">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="stat-num">{{ $totalPenduduk }}</div>
                        <div class="stat-lbl">Total Penduduk</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-single">
                        <div class="stat-ic" style="background:#eff6ff;color:#2563eb;">
                            <i class="bi bi-gender-male"></i>
                        </div>
                        <div class="stat-num">{{ $jumlahLaki }}</div>
                        <div class="stat-lbl">Laki-laki ({{ $totalPenduduk ? round($jumlahLaki/$totalPenduduk*100) : 0 }}%)</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-single">
                        <div class="stat-ic" style="background:#fdf2f8;color:#db2777;">
                            <i class="bi bi-gender-female"></i>
                        </div>
                        <div class="stat-num">{{ $jumlahPerempuan }}</div>
                        <div class="stat-lbl">Perempuan ({{ $totalPenduduk ? round($jumlahPerempuan/$totalPenduduk*100) : 0 }}%)</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="demographic-main mb-5">
            <div class="age-head mb-4">
                <h6 class="mb-0 fw-bold"><i class="bi bi-people me-2 text-emerald"></i>Distribusi Jenis Kelamin</h6>
            </div>
            <div class="table-responsive-custom">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background: #ecfdf5;">
                        <tr>
                            <th>Jenis Kelamin</th>
                            <th style="width: 170px;">Jumlah</th>
                            <th style="min-width: 300px;">Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jenisKelamin as $jk)
                        <tr>
                            <td><strong>{{ $jk->subcategory }}</strong></td>
                            <td>{{ number_format($jk->count) }} jiwa</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="flex-grow-1 bg-secondary bg-opacity-10 rounded-pill overflow-hidden" style="height: 18px;">
                                        <div class="h-100"
                                             style="width: {{ $totalPenduduk ? round($jk->count/$totalPenduduk*100) : 0 }}%; background: {{ $jk->subcategory == 'Laki-laki' ? '#3b82f6' : '#ec4899' }};"></div>
                                    </div>
                                    <span class="fw-semibold text-muted" style="width: 60px;">{{ $totalPenduduk ? round($jk->count/$totalPenduduk*100) : 0 }}%</span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="demographic-main mb-5">
            <div class="age-head mb-4">
                <h6 class="mb-0 fw-bold"><i class="bi bi-calendar-heart me-2 text-emerald"></i>Penduduk Berdasarkan Kelompok Usia</h6>
            </div>
            <div class="table-responsive-custom">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background: #ecfdf5;">
                        <tr>
                            <th>Kelompok Usia</th>
                            <th style="width: 170px;">Jumlah</th>
                            <th style="min-width: 300px;">Distribusi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kelompokUsia as $usia)
                        <tr>
                            <td><strong>{{ $usia->subcategory }}</strong></td>
                            <td>{{ number_format($usia->count) }} jiwa</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="flex-grow-1 bg-secondary bg-opacity-10 rounded-pill overflow-hidden" style="height: 18px;">
                                        <div class="h-100" style="width: {{ $totalPenduduk ? round($usia->count/$totalPenduduk*100) : 0 }}%; background: linear-gradient(90deg,#059669,#10b981);"></div>
                                    </div>
                                    <span class="fw-semibold text-muted" style="width: 60px;">{{ $totalPenduduk ? round($usia->count/$totalPenduduk*100) : 0 }}%</span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-lg-6">
                <div class="card-x h-100">
                    <div class="card-x-body">
                        <h4 class="fw-bold mb-4" style="color: var(--primary-dark);">
                            <i class="bi bi-briefcase me-2 text-emerald"></i>Pekerjaan
                        </h4>
                        <div class="table-responsive-custom">
                            <table class="table table-sm table-hover">
                                <thead style="background: #ecfdf5;">
                                    <tr>
                                        <th>Pekerjaan</th>
                                        <th style="width: 110px;">Jumlah</th>
                                        <th style="width: 80px;">%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pekerjaan as $pk)
                                    <tr>
                                        <td><strong>{{ $pk->subcategory }}</strong></td>
                                        <td>{{ number_format($pk->count) }}</td>
                                        <td>{{ $totalPenduduk ? round($pk->count/$totalPenduduk*100) : 0 }}%</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-x h-100">
                    <div class="card-x-body">
                        <h4 class="fw-bold mb-4" style="color: var(--primary-dark);">
                            <i class="bi bi-mosque me-2 text-amber"></i>Agama
                        </h4>
                        <div class="table-responsive-custom">
                            <table class="table table-sm table-hover">
                                <thead style="background: #fffbeb;">
                                    <tr>
                                        <th>Agama</th>
                                        <th style="width: 110px;">Jumlah</th>
                                        <th style="width: 80px;">%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($agama as $ag)
                                    <tr>
                                        <td><strong>{{ $ag->subcategory }}</strong></td>
                                        <td>{{ number_format($ag->count) }}</td>
                                        <td>{{ $totalPenduduk ? round($ag->count/$totalPenduduk*100) : 0 }}%</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-x p-4 d-flex align-items-start gap-3" style="background: linear-gradient(135deg, #ecfdf5, #f0fdf4); border: 1px solid #a7f3d0;">
            <div class="bg-white rounded-3 p-3 shadow-sm">
                <i class="bi bi-shield-check fs-3 text-success"></i>
            </div>
            <div>
                <h6 class="fw-bold mb-2 text-success">Informasi Privasi Data</h6>
                <p class="mb-0 text-muted small" style="line-height: 1.8;">
                    Data kependudukan yang ditampilkan berupa <strong>data agregat (statistik total)</strong> saja. 
                    Kami tidak menampilkan data pribadi seperti NIK, nomor KK, alamat individu, atau data sensitif lainnya 
                    sesuai dengan undang-undang perlindungan data pribadi yang berlaku.
                </p>
            </div>
        </div>

    </div>
</section>
@endsection
