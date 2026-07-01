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
            'philosophy_title'    => 'required|string|max:255',
            'philosophy_body'     => 'required|string',
            'vision_title'        => 'required|string|max:255',
            'vision_body'         => 'required|string',
            'mission_title'       => 'required|string|max:255',
            'mission_body'        => 'required|string',
            'philosophy_title_ja' => 'nullable|string|max:255', 'philosophy_title_ko' => 'nullable|string|max:255',
            'philosophy_title_es' => 'nullable|string|max:255', 'philosophy_title_zh_tw' => 'nullable|string|max:255', 'philosophy_title_vi' => 'nullable|string|max:255',
            'philosophy_body_ja'  => 'nullable|string', 'philosophy_body_ko' => 'nullable|string',
            'philosophy_body_es'  => 'nullable|string', 'philosophy_body_zh_tw' => 'nullable|string', 'philosophy_body_vi' => 'nullable|string',
            'vision_title_ja'     => 'nullable|string|max:255', 'vision_title_ko' => 'nullable|string|max:255',
            'vision_title_es'     => 'nullable|string|max:255', 'vision_title_zh_tw' => 'nullable|string|max:255', 'vision_title_vi' => 'nullable|string|max:255',
            'vision_body_ja'      => 'nullable|string', 'vision_body_ko' => 'nullable|string',
            'vision_body_es'      => 'nullable|string', 'vision_body_zh_tw' => 'nullable|string', 'vision_body_vi' => 'nullable|string',
            'mission_title_ja'    => 'nullable|string|max:255', 'mission_title_ko' => 'nullable|string|max:255',
            'mission_title_es'    => 'nullable|string|max:255', 'mission_title_zh_tw' => 'nullable|string|max:255', 'mission_title_vi' => 'nullable|string|max:255',
            'mission_body_ja'     => 'nullable|string', 'mission_body_ko' => 'nullable|string',
            'mission_body_es'     => 'nullable|string', 'mission_body_zh_tw' => 'nullable|string', 'mission_body_vi' => 'nullable|string',
        ]);

        AboutSection::updateOrCreate(['id' => 1], array_merge($validated, ['updated_at' => now()]));
        cache()->forget('about');
        return back()->with('success', 'About section updated successfully.');
    }
}
