<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $connectionPrograms = Program::where('pillar', 'connection')->orderBy('sort_order')->get();
        $purposePrograms = Program::where('pillar', 'purpose')->orderBy('sort_order')->get();
        return view('admin.programs.index', compact('connectionPrograms', 'purposePrograms'));
    }

    public function create()
    {
        return view('admin.programs.form', ['program' => new Program()]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateProgram($request);
        $validated['features_json']     = $this->parseFeatures($request, '');
        $validated['how_involved_json'] = $this->parseLines($request->input('how_involved'));
        $validated['is_active']         = $request->boolean('is_active');
        $validated['updated_at']        = now();
        foreach (['ja','ko','es','zh_tw','vi'] as $l) {
            $validated["title_{$l}"]            = $request->input("title_{$l}");
            $validated["description_{$l}"]      = $request->input("description_{$l}");
            $validated["features_json_{$l}"]    = $this->parseFeatures($request, "_{$l}") ?: null;
            $validated["how_involved_json_{$l}"] = $this->parseLines($request->input("how_involved_{$l}")) ?: null;
        }
        Program::create($validated);
        cache()->forget('programs_connection');
        cache()->forget('programs_purpose');
        return redirect()->route('admin.programs.index')->with('success', 'Program created.');
    }

    public function edit(Program $program)
    {
        return view('admin.programs.form', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $this->validateProgram($request);
        $validated['features_json']     = $this->parseFeatures($request, '');
        $validated['how_involved_json'] = $this->parseLines($request->input('how_involved'));
        $validated['is_active']         = $request->boolean('is_active');
        $validated['updated_at']        = now();
        foreach (['ja','ko','es','zh_tw','vi'] as $l) {
            $validated["title_{$l}"]            = $request->input("title_{$l}");
            $validated["description_{$l}"]      = $request->input("description_{$l}");
            $validated["features_json_{$l}"]    = $this->parseFeatures($request, "_{$l}") ?: null;
            $validated["how_involved_json_{$l}"] = $this->parseLines($request->input("how_involved_{$l}")) ?: null;
        }
        $program->update($validated);
        cache()->forget('programs_connection');
        cache()->forget('programs_purpose');
        return redirect()->route('admin.programs.index')->with('success', 'Program updated.');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        cache()->forget('programs_connection');
        cache()->forget('programs_purpose');
        return redirect()->route('admin.programs.index')->with('success', 'Program deleted.');
    }

    private function validateProgram(Request $request): array
    {
        return $request->validate([
            'pillar' => 'required|in:connection,purpose',
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'sort_order' => 'required|integer|min:0',
        ]);
    }

    private function parseFeatures(Request $request, string $suffix = ''): array
    {
        $titles = $request->input("feature_title{$suffix}", []);
        $descs  = $request->input("feature_desc{$suffix}", []);
        $items  = $request->input("feature_items{$suffix}", []);
        $features = [];
        foreach ($titles as $i => $title) {
            if (trim($title)) {
                $features[] = [
                    'title'       => $title,
                    'description' => $descs[$i] ?? '',
                    'items'       => array_values(array_filter(array_map('trim', explode("\n", $items[$i] ?? '')))),
                ];
            }
        }
        return $features;
    }

    private function parseLines(?string $text): array
    {
        if (!$text) return [];
        return array_values(array_filter(array_map('trim', explode("\n", $text))));
    }
}
