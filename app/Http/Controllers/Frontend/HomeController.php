<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\PopulationStatistic;
use App\Models\Activity;
use App\Models\Facility;
use App\Models\Potential;
use App\Models\Schedule;
use App\Models\Organization;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {
        $sejarah = Content::where('type', 'sejarah')->first();
        $geografis = Content::where('type', 'geografis')->first();
        
        $totalPenduduk = PopulationStatistic::where('category', 'jenis_kelamin')->sum('count');
        $jumlahLaki = PopulationStatistic::where('category', 'jenis_kelamin')->where('subcategory', 'Laki-laki')->value('count') ?? 0;
        $jumlahPerempuan = PopulationStatistic::where('category', 'jenis_kelamin')->where('subcategory', 'Perempuan')->value('count') ?? 0;
        
        $ageStatistics = PopulationStatistic::where('category', 'kelompok_usia')->orderBy('id','asc')->get();
        
        $kegiatan = Activity::where('is_active', true)->take(4)->get();
        $fasilitas = Facility::where('is_active', true)->take(3)->get();
        
        $featuredPotential = Potential::where('is_active', true)
            ->where(function($q){ $q->where('category','like','%Sosial%')->orWhere('title','like','%Sosial%'); })
            ->first();
        $featuredId = $featuredPotential ? $featuredPotential->id : 0;
        $potensi = Potential::where('is_active', true)->where('id','!=',$featuredId)->take(4)->get();
        
        $jadwal = Schedule::where('is_active', true)->take(7)->get();
        
        $pkk = Organization::where('type','PKK')->first();
        $kwt = Organization::where('type','KWT')->first();
        
        $galeri = Gallery::where('is_active', true)->take(12)->get();
        
        $jumlahKegiatan = Activity::where('is_active', true)->count();
        
        return view('frontend.home', compact(
            'sejarah', 'geografis', 'totalPenduduk', 'jumlahLaki', 'jumlahPerempuan', 'ageStatistics',
            'kegiatan', 'fasilitas', 'potensi', 'featuredPotential', 'jadwal', 'pkk', 'kwt',
            'galeri', 'jumlahKegiatan'
        ));
    }
}
