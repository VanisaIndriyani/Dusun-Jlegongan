<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Content;
use App\Models\PopulationStatistic;
use App\Models\Activity;
use App\Models\Facility;
use App\Models\Potential;
use App\Models\Schedule;
use App\Models\Organization;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        $totalContent = Content::count();
        $totalPopulation = PopulationStatistic::count();
        $totalActivity = Activity::count();
        $totalFacility = Facility::count();
        $totalPotential = Potential::count();
        $totalSchedule = Schedule::count();
        $totalOrganization = Organization::count();
        $totalGallery = Gallery::count();

        $totalPenduduk = PopulationStatistic::where('category', 'jenis_kelamin')->sum('count');

        return view('admin.dashboard', compact(
            'totalContent', 'totalPopulation', 'totalActivity', 'totalFacility',
            'totalPotential', 'totalSchedule', 'totalOrganization', 'totalGallery',
            'totalPenduduk'
        ));
    }

    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
