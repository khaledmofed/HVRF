@extends('layouts.admin')
@section('title', 'Hero Section')
@section('breadcrumb', 'Content / Hero Section')

@php $langs = [['en','🇺🇸','English'],['ja','🇯🇵','日本語'],['ko','🇰🇷','한국어'],['es','🇪🇸','Español'],['zh_tw','🇹🇼','繁體中文'],['vi','🇻🇳','Tiếng Việt']]; @endphp

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <h4 class="mb-0" style="font-family: 'Playfair Display', serif;">Hero Section</h4>
</div>
<div class="stat-card" style="max-width: 800px;">
    <form method="POST" action="{{ route('admin.hero.update') }}">
        @csrf

        {{-- Language tabs --}}
        <ul class="nav nav-tabs mb-4" id="heroLangTabs">
            @foreach($langs as [$code, $flag, $label])
            <li class="nav-item">
                <button class="nav-link {{ $code === 'en' ? 'active' : '' }}" type="button"
                        data-bs-toggle="tab" data-bs-target="#hero-lang-{{ $code }}">
                    {{ $flag }} {{ strtoupper($code === 'zh_tw' ? 'ZH' : $code) }}
                </button>
            </li>
            @endforeach
        </ul>

        <div class="tab-content">
            {{-- English (always required) --}}
            <div class="tab-pane fade show active" id="hero-lang-en">
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Quote Text <span class="text-danger">*</span></label>
                    <textarea name="quote_text" rows="3" class="form-control @error('quote_text') is-invalid @enderror" required>{{ old('quote_text', $hero->quote_text) }}</textarea>
                    @error('quote_text')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Headline <span class="text-danger">*</span></label>
                    <input type="text" name="headline" class="form-control @error('headline') is-invalid @enderror" value="{{ old('headline', $hero->headline) }}" required>
                    @error('headline')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Subheadline <span class="text-danger">*</span></label>
                    <textarea name="subheadline" rows="2" class="form-control @error('subheadline') is-invalid @enderror" required>{{ old('subheadline', $hero->subheadline) }}</textarea>
                    @error('subheadline')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">CTA Primary Label <span class="text-danger">*</span></label>
                        <input type="text" name="cta_primary_label" class="form-control" value="{{ old('cta_primary_label', $hero->cta_primary_label) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">CTA Primary URL <span class="text-danger">*</span></label>
                        <input type="text" name="cta_primary_url" class="form-control" value="{{ old('cta_primary_url', $hero->cta_primary_url) }}" required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">CTA Secondary Label <span class="text-danger">*</span></label>
                        <input type="text" name="cta_secondary_label" class="form-control" value="{{ old('cta_secondary_label', $hero->cta_secondary_label) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">CTA Secondary URL <span class="text-danger">*</span></label>
                        <input type="text" name="cta_secondary_url" class="form-control" value="{{ old('cta_secondary_url', $hero->cta_secondary_url) }}" required>
                    </div>
                </div>
            </div>

            {{-- Other languages --}}
            @foreach([['ja','🇯🇵'],['ko','🇰🇷'],['es','🇪🇸'],['zh_tw','🇹🇼'],['vi','🇻🇳']] as [$l, $flag])
            <div class="tab-pane fade" id="hero-lang-{{ $l }}">
                <p class="small mb-3" style="color: var(--mg-text-muted);">{{ $flag }} Leave blank to fall back to English.</p>
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Quote Text</label>
                    <textarea name="quote_text_{{ $l }}" rows="3" class="form-control">{{ old("quote_text_{$l}", $hero->{"quote_text_{$l}"}) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Headline</label>
                    <input type="text" name="headline_{{ $l }}" class="form-control" value="{{ old("headline_{$l}", $hero->{"headline_{$l}"}) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Subheadline</label>
                    <textarea name="subheadline_{{ $l }}" rows="2" class="form-control">{{ old("subheadline_{$l}", $hero->{"subheadline_{$l}"}) }}</textarea>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">CTA Primary Label</label>
                        <input type="text" name="cta_primary_label_{{ $l }}" class="form-control" value="{{ old("cta_primary_label_{$l}", $hero->{"cta_primary_label_{$l}"}) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">CTA Secondary Label</label>
                        <input type="text" name="cta_secondary_label_{{ $l }}" class="form-control" value="{{ old("cta_secondary_label_{$l}", $hero->{"cta_secondary_label_{$l}"}) }}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <hr style="border-color: rgba(255,255,255,0.08); margin: 1.5rem 0;">
        <div class="d-flex align-items-center justify-content-between">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ $hero->is_active ? 'checked' : '' }}>
                <label class="form-check-label small" for="is_active">Active</label>
            </div>
            <button type="submit" class="btn btn-sm px-4" style="background: #4ECDC4; color: #fff; border: none;">
                <i class="bi bi-save me-1"></i>Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
