<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\FocusArea;
use App\Models\HeroSection;
use App\Models\Program;
use App\Models\RoadmapYear;
use App\Models\SiteSetting;
use App\Models\Stat;
use App\Models\TeamMember;
use App\Models\VisionSlide;

class HomeController extends Controller
{
    public function index()
    {
        $hero = cache()->remember('hero', 3600, fn() => HeroSection::where('is_active', true)->first());
        $stats = cache()->remember('stats', 3600, fn() => Stat::where('is_active', true)->orderBy('sort_order')->get());
        $about = cache()->remember('about', 3600, fn() => AboutSection::first());
        $focusAreas = cache()->remember('focus_areas', 3600, fn() => FocusArea::where('is_active', true)->orderBy('sort_order')->get());
        $connectionPrograms = cache()->remember('programs_connection', 3600, fn() => Program::where('pillar', 'connection')->where('is_active', true)->orderBy('sort_order')->get());
        $purposePrograms = cache()->remember('programs_purpose', 3600, fn() => Program::where('pillar', 'purpose')->where('is_active', true)->orderBy('sort_order')->get());
        $connectionRoadmap = cache()->remember('roadmap_connection', 3600, fn() => RoadmapYear::where('pillar', 'connection')->orderBy('sort_order')->get());
        $purposeRoadmap = cache()->remember('roadmap_purpose', 3600, fn() => RoadmapYear::where('pillar', 'purpose')->orderBy('sort_order')->get());
        $team = cache()->remember('team', 3600, fn() => TeamMember::where('is_active', true)->orderBy('sort_order')->get());
        $settings = cache()->remember('settings', 3600, fn() => SiteSetting::pluck('value', 'key'));
        $visionSlides = cache()->remember('vision_slides', 3600, fn() => VisionSlide::where('is_active', true)->orderBy('sort_order')->get());

        return view('home', compact(
            'hero', 'stats', 'about', 'focusAreas',
            'connectionPrograms', 'purposePrograms',
            'connectionRoadmap', 'purposeRoadmap',
            'team', 'settings', 'visionSlides'
        ));
    }
}
