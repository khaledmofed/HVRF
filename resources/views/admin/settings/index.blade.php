@extends('layouts.admin')
@section('title', 'Site Settings')
@section('breadcrumb', 'Settings / Site Settings')

@section('content')
<h4 class="mb-4" style="font-family: 'Playfair Display', serif;">Site Settings</h4>
<form method="POST" action="{{ route('admin.settings.update') }}">
    @csrf

    {{-- General --}}
    <div class="stat-card mb-4">
        <h6 class="fw-semibold mb-3" style="color: #4ECDC4;"><i class="bi bi-gear me-2"></i>General</h6>
        <div class="row g-3">
            <div class="col-md-6"><label class="form-label small fw-semibold">Site Name</label><input type="text" name="site_name" class="form-control" value="{{ $settings['site_name'] ?? '' }}"></div>
            <div class="col-md-6"><label class="form-label small fw-semibold">Tagline</label><input type="text" name="tagline" class="form-control" value="{{ $settings['tagline'] ?? '' }}"></div>
            <div class="col-md-6"><label class="form-label small fw-semibold">Logo URL</label><input type="text" name="logo_url" class="form-control" value="{{ $settings['logo_url'] ?? '' }}"></div>
            <div class="col-md-6"><label class="form-label small fw-semibold">Favicon URL</label><input type="text" name="favicon_url" class="form-control" value="{{ $settings['favicon_url'] ?? '' }}"></div>
        </div>
    </div>

    {{-- Contact --}}
    <div class="stat-card mb-4">
        <h6 class="fw-semibold mb-3" style="color: #4ECDC4;"><i class="bi bi-envelope me-2"></i>Contact</h6>
        <div class="row g-3">
            <div class="col-md-6"><label class="form-label small fw-semibold">Contact Email</label><input type="email" name="contact_email" class="form-control" value="{{ $settings['contact_email'] ?? '' }}"></div>
            <div class="col-md-6"><label class="form-label small fw-semibold">Phone</label><input type="text" name="contact_phone" class="form-control" value="{{ $settings['contact_phone'] ?? '' }}"></div>
            <div class="col-md-6"><label class="form-label small fw-semibold">Location</label><input type="text" name="contact_location" class="form-control" value="{{ $settings['contact_location'] ?? '' }}"></div>
            <div class="col-md-6"><label class="form-label small fw-semibold">Map Embed URL</label><input type="text" name="map_embed_url" class="form-control" value="{{ $settings['map_embed_url'] ?? '' }}"></div>
        </div>
    </div>

    {{-- Social --}}
    <div class="stat-card mb-4">
        <h6 class="fw-semibold mb-3" style="color: #4ECDC4;"><i class="bi bi-share me-2"></i>Social</h6>
        <div class="row g-3">
            <div class="col-md-6"><label class="form-label small fw-semibold">LinkedIn URL</label><input type="text" name="linkedin_url" class="form-control" value="{{ $settings['linkedin_url'] ?? '' }}"></div>
            <div class="col-md-6"><label class="form-label small fw-semibold">Twitter/X URL</label><input type="text" name="twitter_url" class="form-control" value="{{ $settings['twitter_url'] ?? '' }}"></div>
            <div class="col-md-6"><label class="form-label small fw-semibold">Facebook URL</label><input type="text" name="facebook_url" class="form-control" value="{{ $settings['facebook_url'] ?? '' }}"></div>
            <div class="col-md-6"><label class="form-label small fw-semibold">YouTube URL</label><input type="text" name="youtube_url" class="form-control" value="{{ $settings['youtube_url'] ?? '' }}"></div>
        </div>
    </div>

    {{-- SEO --}}
    <div class="stat-card mb-4">
        <h6 class="fw-semibold mb-3" style="color: #4ECDC4;"><i class="bi bi-search me-2"></i>SEO</h6>
        <div class="row g-3">
            <div class="col-md-12"><label class="form-label small fw-semibold">Meta Title</label><input type="text" name="meta_title" class="form-control" value="{{ $settings['meta_title'] ?? '' }}"></div>
            <div class="col-md-12"><label class="form-label small fw-semibold">Meta Description</label><textarea name="meta_description" rows="2" class="form-control">{{ $settings['meta_description'] ?? '' }}</textarea></div>
            <div class="col-md-12"><label class="form-label small fw-semibold">OG Image URL</label><input type="text" name="og_image_url" class="form-control" value="{{ $settings['og_image_url'] ?? '' }}"></div>
        </div>
    </div>

    {{-- Custom Code --}}
    <div class="stat-card mb-4">
        <h6 class="fw-semibold mb-1" style="color: #4ECDC4;"><i class="bi bi-code-slash me-2"></i>Custom Code</h6>
        <p class="small text-muted mb-3">Injected into every public page — CSS just before <code>&lt;/head&gt;</code>, JS just before <code>&lt;/body&gt;</code>. Runs unescaped, so only paste code you trust.</p>
        <div class="row g-3">
            <div class="col-md-12">
                <label class="form-label small fw-semibold">Custom CSS</label>
                <textarea name="custom_css" rows="8" class="form-control" style="font-family: 'Courier New', monospace; font-size: 0.85rem;" placeholder=".my-class { color: red; }">{{ $settings['custom_css'] ?? '' }}</textarea>
            </div>
            <div class="col-md-12">
                <label class="form-label small fw-semibold">Custom JavaScript</label>
                <textarea name="custom_js" rows="8" class="form-control" style="font-family: 'Courier New', monospace; font-size: 0.85rem;" placeholder="console.log('hello');">{{ $settings['custom_js'] ?? '' }}</textarea>
            </div>
        </div>
    </div>

    <button type="submit" class="btn px-5" style="background: #4ECDC4; color: #fff; border: none;"><i class="bi bi-save me-2"></i>Save All Settings</button>
</form>
@endsection
