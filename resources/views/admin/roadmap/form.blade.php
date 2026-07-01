@extends('layouts.admin')
@section('title', $year->id ? 'Edit Roadmap Year' : 'New Roadmap Year')
@section('breadcrumb', 'Content / Roadmap / ' . ($year->id ? 'Edit' : 'New'))

@php $langs = [['en','🇺🇸'],['ja','🇯🇵'],['ko','🇰🇷'],['es','🇪🇸'],['zh_tw','🇹🇼'],['vi','🇻🇳']]; @endphp

@section('content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.roadmap.index') }}" class="btn btn-sm" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"><i class="bi bi-arrow-left"></i></a>
    <h4 class="mb-0" style="font-family: 'Playfair Display', serif;">{{ $year->id ? 'Edit Roadmap Year' : 'New Roadmap Year' }}</h4>
</div>
<div class="stat-card" style="max-width: 750px;">
    <form method="POST" action="{{ $year->id ? route('admin.roadmap.update', $year) : route('admin.roadmap.store') }}">
        @csrf
        @if($year->id) @method('PUT') @endif

        {{-- Non-translatable --}}
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label class="form-label small fw-semibold">Pillar</label>
                <select name="pillar" class="form-select" required>
                    <option value="connection" {{ old('pillar', $year->pillar) === 'connection' ? 'selected' : '' }}>Connection</option>
                    <option value="purpose" {{ old('pillar', $year->pillar) === 'purpose' ? 'selected' : '' }}>Purpose</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Year #</label>
                <select name="year_number" class="form-select" required>
                    <option value="1" {{ old('year_number', $year->year_number) == 1 ? 'selected' : '' }}>1</option>
                    <option value="2" {{ old('year_number', $year->year_number) == 2 ? 'selected' : '' }}>2</option>
                    <option value="3" {{ old('year_number', $year->year_number) == 3 ? 'selected' : '' }}>3</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $year->sort_order ?? 0) }}" min="0">
            </div>
        </div>

        <hr style="border-color: rgba(255,255,255,0.08);">

        <ul class="nav nav-tabs mb-4">
            @foreach($langs as [$code, $flag])
            <li class="nav-item">
                <button class="nav-link {{ $code === 'en' ? 'active' : '' }}" type="button"
                        data-bs-toggle="tab" data-bs-target="#rm-lang-{{ $code }}">
                    {{ $flag }} {{ strtoupper($code === 'zh_tw' ? 'ZH' : $code) }}
                </button>
            </li>
            @endforeach
        </ul>

        <div class="tab-content">
            {{-- English --}}
            <div class="tab-pane fade show active" id="rm-lang-en">
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Year Label <span class="text-danger">*</span></label>
                    <input type="text" name="year_label" class="form-control" value="{{ old('year_label', $year->year_label) }}" placeholder="e.g. Year 1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Goal <span class="text-danger">*</span></label>
                    <input type="text" name="goal" class="form-control" value="{{ old('goal', $year->goal) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Projects <span class="text-muted">(one per line)</span></label>
                    <textarea name="projects" rows="4" class="form-control">{{ old('projects', is_array($year->projects_json) ? implode("\n", $year->projects_json) : '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold">KPIs <span class="text-muted">(one per line)</span></label>
                    <textarea name="kpis" rows="4" class="form-control">{{ old('kpis', is_array($year->kpis_json) ? implode("\n", $year->kpis_json) : '') }}</textarea>
                </div>
            </div>

            {{-- Other languages --}}
            @foreach([['ja','🇯🇵'],['ko','🇰🇷'],['es','🇪🇸'],['zh_tw','🇹🇼'],['vi','🇻🇳']] as [$l, $flag])
            <div class="tab-pane fade" id="rm-lang-{{ $l }}">
                <p class="small mb-3" style="color: var(--mg-text-muted);">{{ $flag }} Leave blank to fall back to English.</p>
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Year Label</label>
                    <input type="text" name="year_label_{{ $l }}" class="form-control" value="{{ old("year_label_{$l}", $year->{"year_label_{$l}"}) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Goal</label>
                    <input type="text" name="goal_{{ $l }}" class="form-control" value="{{ old("goal_{$l}", $year->{"goal_{$l}"}) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Projects <span class="text-muted">(one per line)</span></label>
                    <textarea name="projects_{{ $l }}" rows="4" class="form-control">{{ old("projects_{$l}", is_array($year->{"projects_json_{$l}"}) ? implode("\n", $year->{"projects_json_{$l}"}) : '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold">KPIs <span class="text-muted">(one per line)</span></label>
                    <textarea name="kpis_{{ $l }}" rows="4" class="form-control">{{ old("kpis_{$l}", is_array($year->{"kpis_json_{$l}"}) ? implode("\n", $year->{"kpis_json_{$l}"}) : '') }}</textarea>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-sm px-4" style="background: #4ECDC4; color: #fff; border: none;"><i class="bi bi-save me-1"></i>Save</button>
            <a href="{{ route('admin.roadmap.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
