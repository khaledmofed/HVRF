<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisionSlide;
use Illuminate\Http\Request;

class VisionSlideController extends Controller
{
    public function index()
    {
        $slides = VisionSlide::orderBy('sort_order')->get();
        return view('admin.vision-slides.index', compact('slides'));
    }

    public function edit(VisionSlide $visionSlide)
    {
        return view('admin.vision-slides.form', ['slide' => $visionSlide]);
    }

    public function update(Request $request, VisionSlide $visionSlide)
    {
        $validated = $request->validate([
            'tag'         => 'required|string|max:100',
            'title'       => 'required|string|max:200',
            'description' => 'required|string',
            'pill_label'  => 'required|string|max:100',
            'pill_icon'   => 'required|string|max:60',
            'sort_order'  => 'required|integer|min:1',
            'tag_ja'      => 'nullable|string|max:100', 'tag_ko' => 'nullable|string|max:100',
            'tag_es'      => 'nullable|string|max:100', 'tag_zh_tw' => 'nullable|string|max:100', 'tag_vi' => 'nullable|string|max:100',
            'title_ja'    => 'nullable|string|max:200', 'title_ko' => 'nullable|string|max:200',
            'title_es'    => 'nullable|string|max:200', 'title_zh_tw' => 'nullable|string|max:200', 'title_vi' => 'nullable|string|max:200',
            'description_ja' => 'nullable|string', 'description_ko' => 'nullable|string',
            'description_es' => 'nullable|string', 'description_zh_tw' => 'nullable|string', 'description_vi' => 'nullable|string',
            'pill_label_ja'  => 'nullable|string|max:100', 'pill_label_ko' => 'nullable|string|max:100',
            'pill_label_es'  => 'nullable|string|max:100', 'pill_label_zh_tw' => 'nullable|string|max:100', 'pill_label_vi' => 'nullable|string|max:100',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['updated_at'] = now();

        $visionSlide->update($validated);
        cache()->forget('vision_slides');

        return redirect()->route('admin.vision-slides.index')
            ->with('success', 'Vision slide updated.');
    }
}
