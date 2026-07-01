<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FocusArea;
use Illuminate\Http\Request;

class FocusAreaController extends Controller
{
    public function index()
    {
        $areas = FocusArea::orderBy('sort_order')->get();
        return view('admin.focus-areas.index', compact('areas'));
    }

    public function create()
    {
        return view('admin.focus-areas.form', ['area' => new FocusArea()]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateArea($request);
        $validated['examples_json']       = $this->parseLines($request->input('examples'));
        $validated['is_active']           = $request->boolean('is_active');
        $validated['updated_at']          = now();
        foreach (['ja','ko','es','zh_tw','vi'] as $l) {
            $validated["title_{$l}"]        = $request->input("title_{$l}");
            $validated["description_{$l}"]  = $request->input("description_{$l}");
            $validated["examples_json_{$l}"] = $this->parseLines($request->input("examples_{$l}")) ?: null;
        }
        FocusArea::create($validated);
        cache()->forget('focus_areas');
        return redirect()->route('admin.focus-areas.index')->with('success', 'Focus area created.');
    }

    public function edit(FocusArea $focusArea)
    {
        return view('admin.focus-areas.form', ['area' => $focusArea]);
    }

    public function update(Request $request, FocusArea $focusArea)
    {
        $validated = $this->validateArea($request);
        $validated['examples_json']       = $this->parseLines($request->input('examples'));
        $validated['is_active']           = $request->boolean('is_active');
        $validated['updated_at']          = now();
        foreach (['ja','ko','es','zh_tw','vi'] as $l) {
            $validated["title_{$l}"]        = $request->input("title_{$l}");
            $validated["description_{$l}"]  = $request->input("description_{$l}");
            $validated["examples_json_{$l}"] = $this->parseLines($request->input("examples_{$l}")) ?: null;
        }
        $focusArea->update($validated);
        cache()->forget('focus_areas');
        return redirect()->route('admin.focus-areas.index')->with('success', 'Focus area updated.');
    }

    public function destroy(FocusArea $focusArea)
    {
        $focusArea->delete();
        cache()->forget('focus_areas');
        return redirect()->route('admin.focus-areas.index')->with('success', 'Focus area deleted.');
    }

    private function validateArea(Request $request): array
    {
        return $request->validate([
            'number'      => 'required|integer|min:1',
            'title'       => 'required|string|max:200',
            'description' => 'required|string',
            'icon_name'   => 'required|string|max:50',
            'sort_order'  => 'required|integer|min:0',
        ]);
    }

    private function parseLines(?string $text): array
    {
        if (!$text) return [];
        return array_values(array_filter(array_map('trim', explode("\n", $text))));
    }
}
