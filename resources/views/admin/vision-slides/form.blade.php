@extends('layouts.admin')
@section('title', 'Edit Vision Slide')
@section('breadcrumb', 'Content / Vision Slider / Edit')

@php $langs = [['en','🇺🇸'],['ja','🇯🇵'],['ko','🇰🇷'],['es','🇪🇸'],['zh_tw','🇹🇼'],['vi','🇻🇳']]; @endphp

@section('content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.vision-slides.index') }}" class="btn-mg-ghost" style="width:32px;height:32px;padding:0;display:flex;align-items:center;justify-content:center;border-radius:8px;border:1px solid var(--mg-hairline);">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div>
        <h4 class="mb-0">Edit Vision Slide</h4>
        <div class="text-muted" style="font-size:0.78rem;">Slide {{ str_pad($slide->sort_order, 2, '0', STR_PAD_LEFT) }} — the SVG visual is fixed per position</div>
    </div>
</div>

<div class="stat-card" style="max-width:700px;">
    <form method="POST" action="{{ route('admin.vision-slides.update', $slide) }}">
        @csrf
        @method('PUT')

        <ul class="nav nav-tabs mb-4">
            @foreach($langs as [$code, $flag])
            <li class="nav-item">
                <button class="nav-link {{ $code === 'en' ? 'active' : '' }}" type="button"
                        data-bs-toggle="tab" data-bs-target="#vs-lang-{{ $code }}">
                    {{ $flag }} {{ strtoupper($code === 'zh_tw' ? 'ZH' : $code) }}
                </button>
            </li>
            @endforeach
        </ul>

        <div class="tab-content">
            {{-- English --}}
            <div class="tab-pane fade show active" id="vs-lang-en">
                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $slide->title) }}" required>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tag <span class="text-danger">*</span></label>
                        <input type="text" name="tag" class="form-control @error('tag') is-invalid @enderror"
                               value="{{ old('tag', $slide->tag) }}" required>
                        @error('tag')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $slide->description) }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Pill Label <span class="text-danger">*</span></label>
                    <input type="text" name="pill_label" class="form-control @error('pill_label') is-invalid @enderror"
                           value="{{ old('pill_label', $slide->pill_label) }}" required>
                    @error('pill_label')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            {{-- Other languages --}}
            @foreach([['ja','🇯🇵'],['ko','🇰🇷'],['es','🇪🇸'],['zh_tw','🇹🇼'],['vi','🇻🇳']] as [$l, $flag])
            <div class="tab-pane fade" id="vs-lang-{{ $l }}">
                <p class="small mb-3" style="color: var(--mg-text-muted);">{{ $flag }} Leave blank to fall back to English.</p>
                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <label class="form-label">Title</label>
                        <input type="text" name="title_{{ $l }}" class="form-control" value="{{ old("title_{$l}", $slide->{"title_{$l}"}) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tag</label>
                        <input type="text" name="tag_{{ $l }}" class="form-control" value="{{ old("tag_{$l}", $slide->{"tag_{$l}"}) }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description_{{ $l }}" rows="3" class="form-control">{{ old("description_{$l}", $slide->{"description_{$l}"}) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pill Label</label>
                    <input type="text" name="pill_label_{{ $l }}" class="form-control" value="{{ old("pill_label_{$l}", $slide->{"pill_label_{$l}"}) }}">
                </div>
            </div>
            @endforeach
        </div>

        <hr style="border-color: rgba(255,255,255,0.08);">

        <div class="row g-3 mb-3">
            <div class="col-md-5">
                <label class="form-label">Pill Icon <span style="font-weight:400;color:var(--mg-text-subtle);text-transform:none;letter-spacing:0;">(e.g. bi-star-fill)</span></label>
                <input type="text" name="pill_icon" class="form-control @error('pill_icon') is-invalid @enderror"
                       value="{{ old('pill_icon', $slide->pill_icon) }}" required>
                @error('pill_icon')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror"
                       value="{{ old('sort_order', $slide->sort_order) }}" min="1" required>
                @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="mb-3 p-3" style="background:var(--mg-surface-2);border-radius:10px;border:1px solid var(--mg-hairline);">
            <div style="font-size:0.75rem;font-weight:600;color:var(--mg-text-muted);text-transform:uppercase;letter-spacing:1px;margin-bottom:8px;">Pill Preview</div>
            <span id="pillPreview" style="display:inline-flex;align-items:center;gap:6px;background:rgba(0,237,100,0.08);border:1px solid rgba(0,237,100,0.18);color:#00a854;border-radius:20px;padding:5px 14px;font-size:0.82rem;font-weight:600;">
                <i id="pillIconPreview" class="bi {{ old('pill_icon', $slide->pill_icon) }}"></i>
                <span id="pillLabelPreview">{{ old('pill_label', $slide->pill_label) }}</span>
            </span>
        </div>

        <div class="mb-4">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                       {{ old('is_active', $slide->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active (visible on site)</label>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn-mg-primary"><i class="bi bi-save me-1"></i>Save Slide</button>
            <a href="{{ route('admin.vision-slides.index') }}" class="btn-mg-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
(function () {
    var iconInput  = document.querySelector('[name="pill_icon"]');
    var labelInput = document.querySelector('[name="pill_label"]');
    var iconEl     = document.getElementById('pillIconPreview');
    var labelEl    = document.getElementById('pillLabelPreview');
    function update() {
        iconEl.className = 'bi ' + (iconInput.value.trim() || 'bi-star-fill');
        labelEl.textContent = labelInput.value || 'Label';
    }
    iconInput.addEventListener('input', update);
    labelInput.addEventListener('input', update);
})();
</script>
@endsection
