@extends('layouts.admin')
@section('title', 'About Section')
@section('breadcrumb', 'Content / About Section')

@php $langs = [['en','🇺🇸','English'],['ja','🇯🇵','日本語'],['ko','🇰🇷','한국어'],['es','🇪🇸','Español'],['zh_tw','🇹🇼','繁體中文'],['vi','🇻🇳','Tiếng Việt']]; @endphp

@section('content')
<h4 class="mb-4" style="font-family: 'Playfair Display', serif;">About Section</h4>
<div class="stat-card" style="max-width: 800px;">
    <form method="POST" action="{{ route('admin.about.update') }}">
        @csrf

        <ul class="nav nav-tabs mb-4" id="aboutLangTabs">
            @foreach($langs as [$code, $flag, $label])
            <li class="nav-item">
                <button class="nav-link {{ $code === 'en' ? 'active' : '' }}" type="button"
                        data-bs-toggle="tab" data-bs-target="#about-lang-{{ $code }}">
                    {{ $flag }} {{ strtoupper($code === 'zh_tw' ? 'ZH' : $code) }}
                </button>
            </li>
            @endforeach
        </ul>

        <div class="tab-content">
            {{-- English --}}
            <div class="tab-pane fade show active" id="about-lang-en">
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Philosophy Title <span class="text-danger">*</span></label>
                        <input type="text" name="philosophy_title" class="form-control" value="{{ old('philosophy_title', $about->philosophy_title) }}" required>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label small fw-semibold">Philosophy Body <span class="text-danger">*</span></label>
                        <textarea name="philosophy_body" rows="3" class="form-control" required>{{ old('philosophy_body', $about->philosophy_body) }}</textarea>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Vision Title <span class="text-danger">*</span></label>
                        <input type="text" name="vision_title" class="form-control" value="{{ old('vision_title', $about->vision_title) }}" required>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label small fw-semibold">Vision Body <span class="text-danger">*</span></label>
                        <textarea name="vision_body" rows="3" class="form-control" required>{{ old('vision_body', $about->vision_body) }}</textarea>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Mission Title <span class="text-danger">*</span></label>
                        <input type="text" name="mission_title" class="form-control" value="{{ old('mission_title', $about->mission_title) }}" required>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label small fw-semibold">Mission Body <span class="text-danger">*</span></label>
                        <textarea name="mission_body" rows="3" class="form-control" required>{{ old('mission_body', $about->mission_body) }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Other languages --}}
            @foreach([['ja','🇯🇵'],['ko','🇰🇷'],['es','🇪🇸'],['zh_tw','🇹🇼'],['vi','🇻🇳']] as [$l, $flag])
            <div class="tab-pane fade" id="about-lang-{{ $l }}">
                <p class="small mb-3" style="color: var(--mg-text-muted);">{{ $flag }} Leave blank to fall back to English.</p>
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Philosophy Title</label>
                        <input type="text" name="philosophy_title_{{ $l }}" class="form-control" value="{{ old("philosophy_title_{$l}", $about->{"philosophy_title_{$l}"}) }}">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label small fw-semibold">Philosophy Body</label>
                        <textarea name="philosophy_body_{{ $l }}" rows="3" class="form-control">{{ old("philosophy_body_{$l}", $about->{"philosophy_body_{$l}"}) }}</textarea>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Vision Title</label>
                        <input type="text" name="vision_title_{{ $l }}" class="form-control" value="{{ old("vision_title_{$l}", $about->{"vision_title_{$l}"}) }}">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label small fw-semibold">Vision Body</label>
                        <textarea name="vision_body_{{ $l }}" rows="3" class="form-control">{{ old("vision_body_{$l}", $about->{"vision_body_{$l}"}) }}</textarea>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Mission Title</label>
                        <input type="text" name="mission_title_{{ $l }}" class="form-control" value="{{ old("mission_title_{$l}", $about->{"mission_title_{$l}"}) }}">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label small fw-semibold">Mission Body</label>
                        <textarea name="mission_body_{{ $l }}" rows="3" class="form-control">{{ old("mission_body_{$l}", $about->{"mission_body_{$l}"}) }}</textarea>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <hr style="border-color: rgba(255,255,255,0.08); margin: 1.5rem 0;">
        <button type="submit" class="btn btn-sm px-4" style="background: #4ECDC4; color: #fff; border: none;">
            <i class="bi bi-save me-1"></i>Save Changes
        </button>
    </form>
</div>
@endsection
