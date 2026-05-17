<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'HVRF', 'group' => 'general'],
            ['key' => 'tagline', 'value' => 'Human Value Reserve Foundation', 'group' => 'general'],
            ['key' => 'logo_url', 'value' => '/images/logo.jpeg', 'group' => 'general'],
            ['key' => 'favicon_url', 'value' => '/images/logo.jpeg', 'group' => 'general'],
            ['key' => 'contact_email', 'value' => 'info@hvrf.org', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '', 'group' => 'contact'],
            ['key' => 'contact_location', 'value' => 'Global — Remote First', 'group' => 'contact'],
            ['key' => 'map_embed_url', 'value' => '', 'group' => 'contact'],
            ['key' => 'linkedin_url', 'value' => '#', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => '#', 'group' => 'social'],
            ['key' => 'facebook_url', 'value' => '#', 'group' => 'social'],
            ['key' => 'youtube_url', 'value' => '#', 'group' => 'social'],
            ['key' => 'meta_title', 'value' => 'HVRF — Human Value Reserve Foundation', 'group' => 'seo'],
            ['key' => 'meta_description', 'value' => 'Ensuring humanity thrives with dignity, meaning, and shared prosperity in the age of autonomous intelligence.', 'group' => 'seo'],
            ['key' => 'og_image_url', 'value' => '/images/logo.jpeg', 'group' => 'seo'],
        ];

        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(['key' => $s['key']], array_merge($s, ['updated_at' => now()]));
        }
    }
}
