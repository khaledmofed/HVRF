@extends('layouts.admin')
@section('title', 'Hero Section')
@section('breadcrumb', 'Content / Hero Section')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <h4 class="mb-0" style="font-family: 'Playfair Display', serif;">Hero Section</h4>
</div>
<div class="stat-card" style="max-width: 800px;">
    <form method="POST" action="{{ route('admin.hero.update') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label small fw-semibold">Quote Text</label>
            <textarea name="quote_text" rows="3" class="form-control @error('quote_text') is-invalid @enderror" required>{{ old('quote_text', $hero->quote_text) }}</textarea>
            @error('quote_text')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label small fw-semibold">Headline</label>
            <input type="text" name="headline" class="form-control @error('headline') is-invalid @enderror" value="{{ old('headline', $hero->headline) }}" required>
            @error('headline')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label small fw-semibold">Subheadline</label>
            <textarea name="subheadline" rows="2" class="form-control @error('subheadline') is-invalid @enderror" required>{{ old('subheadline', $hero->subheadline) }}</textarea>
            @error('subheadline')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label small fw-semibold">CTA Primary Label</label>
                <input type="text" name="cta_primary_label" class="form-control" value="{{ old('cta_primary_label', $hero->cta_primary_label) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-semibold">CTA Primary URL</label>
                <input type="text" name="cta_primary_url" class="form-control" value="{{ old('cta_primary_url', $hero->cta_primary_url) }}" required>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label small fw-semibold">CTA Secondary Label</label>
                <input type="text" name="cta_secondary_label" class="form-control" value="{{ old('cta_secondary_label', $hero->cta_secondary_label) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-semibold">CTA Secondary URL</label>
                <input type="text" name="cta_secondary_url" class="form-control" value="{{ old('cta_secondary_url', $hero->cta_secondary_url) }}" required>
            </div>
        </div>
        <div class="mb-4">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ $hero->is_active ? 'checked' : '' }}>
                <label class="form-check-label small" for="is_active">Active</label>
            </div>
        </div>
        <button type="submit" class="btn btn-sm px-4" style="background: #4ECDC4; color: #fff; border: none;">
            <i class="bi bi-save me-1"></i>Save Changes
        </button>
    </form>
</div>
@endsection
