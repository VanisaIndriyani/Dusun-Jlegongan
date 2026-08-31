<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PopulationStatistic;

class PopulationStatisticController extends Controller
{
    public function index()
    {
        $statistics = PopulationStatistic::all()
            ->groupBy('category');
        
        return view('admin.population-statistics.index', compact('statistics'));
    }

    public function create()
    {
        return view('admin.population-statistics.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'subcategory' => 'required|string|max:255',
            'count' => 'required|integer|min:0',
            'male' => 'nullable|integer|min:0',
            'female' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ]);

        PopulationStatistic::create($validated);

        return redirect()->route('admin.population-statistics.index')->with('success', 'Data statistik berhasil ditambahkan.');
    }

    public function edit(PopulationStatistic $populationStatistic)
    {
        return view('admin.population-statistics.edit', compact('populationStatistic'));
    }

    public function update(Request $request, PopulationStatistic $populationStatistic)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'subcategory' => 'required|string|max:255',
            'count' => 'required|integer|min:0',
            'male' => 'nullable|integer|min:0',
            'female' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $populationStatistic->update($validated);

        return redirect()->route('admin.population-statistics.index')->with('success', 'Data statistik berhasil diperbarui.');
    }

    public function destroy(PopulationStatistic $populationStatistic)
    {
        $populationStatistic->delete();

        return redirect()->route('admin.population-statistics.index')->with('success', 'Data statistik berhasil dihapus.');
    }
}
