<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Potential;
use Illuminate\Support\Facades\Storage;

class PotentialController extends Controller
{
    public function index()
    {
        $potentials = Potential::all();
        return view('admin.potentials.index', compact('potentials'));
    }

    public function create()
    {
        $potential = new \App\Models\Potential();
        $potential->category = old('category', 'Sosial Kemasyarakatan');
        $potential->is_active = old('is_active', true);
        return view('admin.potentials.create', compact('potential'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'source' => 'nullable|string|max:255',
            'source_url' => 'nullable|string|max:500',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('potentials', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        Potential::create($validated);

        return redirect()->route('admin.potentials.index')->with('success', 'Potensi berhasil ditambahkan.');
    }

    public function edit(Potential $potential)
    {
        return view('admin.potentials.edit', compact('potential'));
    }

    public function update(Request $request, Potential $potential)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'source' => 'nullable|string|max:255',
            'source_url' => 'nullable|string|max:500',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($potential->image) {
                Storage::disk('public')->delete($potential->image);
            }
            $imagePath = $request->file('image')->store('potentials', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        $potential->update($validated);

        return redirect()->route('admin.potentials.index')->with('success', 'Potensi berhasil diperbarui.');
    }

    public function destroy(Potential $potential)
    {
        if ($potential->image) {
            Storage::disk('public')->delete($potential->image);
        }
        $potential->delete();

        return redirect()->route('admin.potentials.index')->with('success', 'Potensi berhasil dihapus.');
    }
}
