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

class PageController extends Controller
{
    public function sejarah()
    {
        $sejarah = Content::where('type', 'sejarah')->first();
        return view('frontend.sejarah', compact('sejarah'));
    }

    public function geografis()
    {
        $geografis = Content::where('type', 'geografis')->first();
        return view('frontend.geografis', compact('geografis'));
    }

    public function kependudukan()
    {
        $jenisKelamin = PopulationStatistic::where('category', 'jenis_kelamin')->get();
        $kelompokUsia = PopulationStatistic::where('category', 'kelompok_usia')->get();
        $pekerjaan = PopulationStatistic::where('category', 'pekerjaan')->get();
        $agama = PopulationStatistic::where('category', 'agama')->get();

        $totalPenduduk = PopulationStatistic::where('category', 'jenis_kelamin')->sum('count');
        $jumlahLaki = PopulationStatistic::where('category', 'jenis_kelamin')->where('subcategory', 'Laki-laki')->value('count') ?? 0;
        $jumlahPerempuan = PopulationStatistic::where('category', 'jenis_kelamin')->where('subcategory', 'Perempuan')->value('count') ?? 0;

        return view('frontend.kependudukan', compact(
            'jenisKelamin', 'kelompokUsia', 'pekerjaan', 'agama',
            'totalPenduduk', 'jumlahLaki', 'jumlahPerempuan'
        ));
    }

    public function kegiatan()
    {
        $allActivities = Activity::where('is_active', true)->get();
        $groupedActivities = $allActivities->groupBy('category');

        $categoryOrder = ['Pertanian', 'Peternakan', 'Karang Taruna', 'Lainnya'];
        $sortedGroups = [];
        foreach ($categoryOrder as $cat) {
            if ($groupedActivities->has($cat)) {
                $sortedGroups[$cat] = $groupedActivities->get($cat);
            }
        }
        foreach ($groupedActivities as $cat => $items) {
            if (!in_array($cat, $categoryOrder)) {
                $sortedGroups[$cat] = $items;
            }
        }

        return view('frontend.kegiatan', compact('sortedGroups'));
    }

    public function fasilitas()
    {
        $fasilitas = Facility::where('is_active', true)->get();
        return view('frontend.fasilitas', compact('fasilitas'));
    }

    public function potensi()
    {
        $allPotentials = Potential::where('is_active', true)->get();
        $groupedPotentials = $allPotentials->groupBy('category');

        $sosial = $groupedPotentials->get('Sosial Kemasyarakatan', collect());
        $pertanian = $groupedPotentials->get('Pertanian', collect());
        $peternakan = $groupedPotentials->get('Peternakan', collect());
        $kepemudaan = $groupedPotentials->get('Kepemudaan', collect());
        $lainnya = $groupedPotentials->get('Lainnya', collect());

        $knownCats = ['Sosial Kemasyarakatan', 'Pertanian', 'Peternakan', 'Kepemudaan', 'Lainnya'];
        foreach ($groupedPotentials as $cat => $items) {
            if (!in_array($cat, $knownCats)) {
                $lainnya = $lainnya->merge($items);
            }
        }

        return view('frontend.potensi', compact('sosial', 'pertanian', 'peternakan', 'kepemudaan', 'lainnya'));
    }

    public function jadwal()
    {
        $jadwal = Schedule::where('is_active', true)->get();
        return view('frontend.jadwal', compact('jadwal'));
    }

    public function pkkKwt()
    {
        $pkk = Organization::where('type', 'PKK')->first();
        $kwt = Organization::where('type', 'KWT')->first();
        return view('frontend.pkk-kwt', compact('pkk', 'kwt'));
    }

    public function galeri()
    {
        $galeri = Gallery::where('is_active', true)->paginate(12);
        return view('frontend.galeri', compact('galeri'));
    }
}
