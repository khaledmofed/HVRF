<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoadmapYear;
use Illuminate\Http\Request;

class RoadmapController extends Controller
{
    public function index()
    {
        $years = RoadmapYear::orderBy('sort_order')->get();
        return view('admin.roadmap.index', compact('years'));
    }

    public function create()
    {
        return view('admin.roadmap.form', ['year' => new RoadmapYear()]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateYear($request);
        $validated['projects_json'] = $this->parseLines($request->input('projects'));
        $validated['kpis_json'] = $this->parseLines($request->input('kpis'));
        $validated['updated_at'] = now();
        RoadmapYear::create($validated);
        cache()->forget('roadmap_connection');
        cache()->forget('roadmap_purpose');
        return redirect()->route('admin.roadmap.index')->with('success', 'Roadmap year created.');
    }

    public function edit(RoadmapYear $roadmap)
    {
        return view('admin.roadmap.form', ['year' => $roadmap]);
    }

    public function update(Request $request, RoadmapYear $roadmap)
    {
        $validated = $this->validateYear($request);
        $validated['projects_json'] = $this->parseLines($request->input('projects'));
        $validated['kpis_json'] = $this->parseLines($request->input('kpis'));
        $validated['updated_at'] = now();
        $roadmap->update($validated);
        cache()->forget('roadmap_connection');
        cache()->forget('roadmap_purpose');
        return redirect()->route('admin.roadmap.index')->with('success', 'Roadmap year updated.');
    }

    public function destroy(RoadmapYear $roadmap)
    {
        $roadmap->delete();
        cache()->forget('roadmap_connection');
        cache()->forget('roadmap_purpose');
        return redirect()->route('admin.roadmap.index')->with('success', 'Roadmap year deleted.');
    }

    private function validateYear(Request $request): array
    {
        return $request->validate([
            'pillar' => 'required|in:connection,purpose',
            'year_number' => 'required|integer|in:1,2,3',
            'year_label' => 'required|string|max:20',
            'goal' => 'required|string|max:255',
            'sort_order' => 'required|integer|min:0',
        ]);
    }

    private function parseLines(?string $text): array
    {
        if (!$text) return [];
        return array_values(array_filter(array_map('trim', explode("\n", $text))));
    }
}
