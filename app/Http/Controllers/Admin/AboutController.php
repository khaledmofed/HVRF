<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = AboutSection::firstOrCreate(['id' => 1], [
            'philosophy_title' => '', 'philosophy_body' => '',
            'vision_title' => '', 'vision_body' => '',
            'mission_title' => '', 'mission_body' => '',
        ]);
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'philosophy_title' => 'required|string|max:255',
            'philosophy_body' => 'required|string',
            'vision_title' => 'required|string|max:255',
            'vision_body' => 'required|string',
            'mission_title' => 'required|string|max:255',
            'mission_body' => 'required|string',
        ]);

        AboutSection::updateOrCreate(['id' => 1], array_merge($validated, ['updated_at' => now()]));
        cache()->forget('about');
        return back()->with('success', 'About section updated successfully.');
    }
}
