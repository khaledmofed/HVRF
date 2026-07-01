@extends('layouts.admin')
@section('title', $area->id ? 'Edit Focus Area' : 'New Focus Area')
@section('breadcrumb', 'Content / Focus Areas / ' . ($area->id ? 'Edit' : 'New'))

@php $langs = [['en','🇺🇸'],['ja','🇯🇵'],['ko','🇰🇷'],['es','🇪🇸'],['zh_tw','🇹🇼'],['vi','🇻🇳']]; @endphp

@section('content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.focus-areas.index') }}" class="btn-mg-ghost" style="width:32px;height:32px;padding:0;display:flex;align-items:center;justify-content:center;border-radius:8px;border:1px solid var(--mg-hairline);">
        <i class="bi bi-arrow-left"></i>
    </a>
    <h4 class="mb-0">{{ $area->id ? 'Edit Focus Area' : 'New Focus Area' }}</h4>
</div>
<div class="stat-card" style="max-width: 700px;">
    <form method="POST" action="{{ $area->id ? route('admin.focus-areas.update', $area) : route('admin.focus-areas.store') }}">
        @csrf
        @if($area->id) @method('PUT') @endif

        {{-- Non-translatable fields --}}
        <div class="row g-3 mb-4">
            <div class="col-md-2">
                <label class="form-label">Number</label>
                <input type="number" name="number" class="form-control" value="{{ old('number', $area->number) }}" min="1" required>
            </div>
            <div class="col-md-5">
                <label class="form-label">Icon Name <span style="font-weight:400;color:var(--mg-text-subtle);text-transform:none;letter-spacing:0;">(e.g. bi-people-fill)</span></label>
                <input type="text" name="icon_name" class="form-control" value="{{ old('icon_name', $area->icon_name) }}" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $area->sort_order ?? 0) }}" min="0">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', $area->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label small" for="is_active">Active</label>
                </div>
            </div>
        </div>

        <hr style="border-color: rgba(255,255,255,0.08);">

        {{-- Language tabs --}}
        <ul class="nav nav-tabs mb-4">
            @foreach($langs as [$code, $flag])
            <li class="nav-item">
                <button class="nav-link {{ $code === 'en' ? 'active' : '' }}" type="button"
                        data-bs-toggle="tab" data-bs-target="#fa-lang-{{ $code }}">
                    {{ $flag }} {{ strtoupper($code === 'zh_tw' ? 'ZH' : $code) }}
                </button>
            </li>
            @endforeach
        </ul>

        <div class="tab-content">
            {{-- English --}}
            <div class="tab-pane fade show active" id="fa-lang-en">
                <div class="mb-3">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $area->title) }}" required>
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea name="description" rows="3" class="form-control" required>{{ old('description', $area->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Examples <span style="font-weight:400;color:var(--mg-text-subtle);text-transform:none;letter-spacing:0;">— one per line</span></label>
                    <textarea name="examples" rows="5" class="form-control">{{ old('examples', is_array($area->examples_json) ? implode("\n", $area->examples_json) : '') }}</textarea>
                </div>
            </div>

            {{-- Other languages --}}
            @foreach([['ja','🇯🇵'],['ko','🇰🇷'],['es','🇪🇸'],['zh_tw','🇹🇼'],['vi','🇻🇳']] as [$l, $flag])
            <div class="tab-pane fade" id="fa-lang-{{ $l }}">
                <p class="small mb-3" style="color: var(--mg-text-muted);">{{ $flag }} Leave blank to fall back to English.</p>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title_{{ $l }}" class="form-control" value="{{ old("title_{$l}", $area->{"title_{$l}"}) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description_{{ $l }}" rows="3" class="form-control">{{ old("description_{$l}", $area->{"description_{$l}"}) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Examples <span style="font-weight:400;color:var(--mg-text-subtle);text-transform:none;letter-spacing:0;">— one per line</span></label>
                    <textarea name="examples_{{ $l }}" rows="5" class="form-control">{{ old("examples_{$l}", is_array($area->{"examples_json_{$l}"}) ? implode("\n", $area->{"examples_json_{$l}"}) : '') }}</textarea>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn-mg-primary"><i class="bi bi-save me-1"></i>Save Focus Area</button>
            <a href="{{ route('admin.focus-areas.index') }}" class="btn-mg-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
