<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function edit()
    {
        $hero = HeroSection::firstOrCreate(['id' => 1], [
            'quote_text' => '', 'headline' => '', 'subheadline' => '',
            'cta_primary_label' => '', 'cta_primary_url' => '',
            'cta_secondary_label' => '', 'cta_secondary_url' => '', 'is_active' => true,
        ]);
        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'quote_text'           => 'required|string',
            'headline'             => 'required|string|max:500',
            'subheadline'          => 'required|string',
            'cta_primary_label'    => 'required|string|max:100',
            'cta_primary_url'      => 'required|string|max:255',
            'cta_secondary_label'  => 'required|string|max:100',
            'cta_secondary_url'    => 'required|string|max:255',
            'quote_text_ja'        => 'nullable|string',
            'quote_text_ko'        => 'nullable|string',
            'quote_text_es'        => 'nullable|string',
            'quote_text_zh_tw'     => 'nullable|string',
            'quote_text_vi'        => 'nullable|string',
            'cta_primary_label_ja' => 'nullable|string|max:100',
            'cta_primary_label_ko' => 'nullable|string|max:100',
            'cta_primary_label_es' => 'nullable|string|max:100',
            'cta_primary_label_zh_tw' => 'nullable|string|max:100',
            'cta_primary_label_vi' => 'nullable|string|max:100',
            'cta_secondary_label_ja' => 'nullable|string|max:100',
            'cta_secondary_label_ko' => 'nullable|string|max:100',
            'cta_secondary_label_es' => 'nullable|string|max:100',
            'cta_secondary_label_zh_tw' => 'nullable|string|max:100',
            'cta_secondary_label_vi' => 'nullable|string|max:100',
            'headline_ja'           => 'nullable|string|max:500',
            'headline_ko'           => 'nullable|string|max:500',
            'headline_es'           => 'nullable|string|max:500',
            'headline_zh_tw'        => 'nullable|string|max:500',
            'headline_vi'           => 'nullable|string|max:500',
            'subheadline_ja'        => 'nullable|string',
            'subheadline_ko'        => 'nullable|string',
            'subheadline_es'        => 'nullable|string',
            'subheadline_zh_tw'     => 'nullable|string',
            'subheadline_vi'        => 'nullable|string',
        ]);

        HeroSection::updateOrCreate(['id' => 1], array_merge($validated, [
            'is_active' => $request->boolean('is_active'),
            'updated_at' => now(),
        ]));

        cache()->forget('hero');
        return back()->with('success', 'Hero section updated successfully.');
    }
}
