<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $keys = [
            'site_name', 'tagline', 'logo_url', 'favicon_url',
            'contact_email', 'contact_phone', 'contact_location', 'map_embed_url',
            'linkedin_url', 'twitter_url', 'facebook_url', 'youtube_url',
            'meta_title', 'meta_description', 'og_image_url',
        ];

        foreach ($keys as $key) {
            SiteSetting::set($key, $request->input($key, ''));
        }

        cache()->forget('settings');
        return back()->with('success', 'Settings saved successfully.');
    }
}
