@extends('layouts.admin')
@section('title', isset($program) && $program->id ? 'Edit Program' : 'New Program')
@section('breadcrumb', 'Content / Programs / ' . (isset($program) && $program->id ? 'Edit' : 'New'))

@section('content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.programs.index') }}" class="btn btn-sm" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"><i class="bi bi-arrow-left"></i></a>
    <h4 class="mb-0" style="font-family: 'Playfair Display', serif;">{{ isset($program) && $program->id ? 'Edit Program' : 'New Program' }}</h4>
</div>
<div class="stat-card" style="max-width: 800px;">
    <form method="POST" action="{{ isset($program) && $program->id ? route('admin.programs.update', $program) : route('admin.programs.store') }}">
        @csrf
        @if(isset($program) && $program->id) @method('PUT') @endif

        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label small fw-semibold">Pillar</label>
                <select name="pillar" class="form-select" required>
                    <option value="connection" {{ old('pillar', $program->pillar ?? '') === 'connection' ? 'selected' : '' }}>Connection</option>
                    <option value="purpose" {{ old('pillar', $program->pillar ?? '') === 'purpose' ? 'selected' : '' }}>Purpose</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-semibold">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $program->title ?? '') }}" required>
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $program->sort_order ?? 0) }}" min="0">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label small fw-semibold">Description</label>
            <textarea name="description" rows="3" class="form-control" required>{{ old('description', $program->description ?? '') }}</textarea>
        </div>

        <hr style="border-color: rgba(255,255,255,0.08);">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <label class="form-label small fw-semibold mb-0">Features</label>
            <button type="button" class="btn btn-sm px-3" id="addFeature" style="background: rgba(78,205,196,0.1); color: #4ECDC4; border: 1px solid rgba(78,205,196,0.2); font-size: 0.8rem;">
                <i class="bi bi-plus-lg me-1"></i>Add Feature
            </button>
        </div>
        <div id="featuresContainer">
            @php $features = old('feature_title') ? array_map(null, old('feature_title', []), old('feature_desc', []), old('feature_items', [])) : ($program->features_json ?? []); @endphp
            @foreach($features as $i => $feature)
            <div class="feature-row p-3 mb-3 rounded" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <div class="d-flex justify-content-between mb-2">
                    <span class="small fw-semibold" style="color: #4ECDC4;">Feature {{ $loop->iteration }}</span>
                    <button type="button" class="btn-remove-feature btn btn-sm py-0 px-2" style="background: rgba(231,76,60,0.1); border: 1px solid rgba(231,76,60,0.2); color: #e74c3c; font-size: 0.75rem;"><i class="bi bi-x"></i></button>
                </div>
                <input type="text" name="feature_title[]" class="form-control form-control-sm mb-2" placeholder="Feature title" value="{{ is_array($feature) ? ($feature['title'] ?? $feature[0] ?? '') : '' }}">
                <input type="text" name="feature_desc[]" class="form-control form-control-sm mb-2" placeholder="Feature description" value="{{ is_array($feature) ? ($feature['description'] ?? $feature[1] ?? '') : '' }}">
                <textarea name="feature_items[]" class="form-control form-control-sm" rows="3" placeholder="Items (one per line)">{{ is_array($feature) ? implode("\n", $feature['items'] ?? [$feature[2] ?? '']) : '' }}</textarea>
            </div>
            @endforeach
        </div>

        <hr style="border-color: rgba(255,255,255,0.08);">
        <div class="mb-3">
            <label class="form-label small fw-semibold">How HVRF Gets Involved <span class="text-muted">(one per line)</span></label>
            <textarea name="how_involved" rows="4" class="form-control">{{ old('how_involved', isset($program->how_involved_json) ? implode("\n", $program->how_involved_json) : '') }}</textarea>
        </div>
        <div class="mb-4">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', $program->is_active ?? true) ? 'checked' : '' }}>
                <label class="form-check-label small" for="is_active">Active</label>
            </div>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-sm px-4" style="background: #4ECDC4; color: #fff; border: none;"><i class="bi bi-save me-1"></i>Save</button>
            <a href="{{ route('admin.programs.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
const featureTemplate = () => `
<div class="feature-row p-3 mb-3 rounded" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
    <div class="d-flex justify-content-between mb-2">
        <span class="small fw-semibold" style="color: #4ECDC4;">Feature</span>
        <button type="button" class="btn-remove-feature btn btn-sm py-0 px-2" style="background: rgba(231,76,60,0.1); border: 1px solid rgba(231,76,60,0.2); color: #e74c3c; font-size: 0.75rem;"><i class="bi bi-x"></i></button>
    </div>
    <input type="text" name="feature_title[]" class="form-control form-control-sm mb-2" placeholder="Feature title">
    <input type="text" name="feature_desc[]" class="form-control form-control-sm mb-2" placeholder="Feature description">
    <textarea name="feature_items[]" class="form-control form-control-sm" rows="3" placeholder="Items (one per line)"></textarea>
</div>`;

document.getElementById('addFeature').addEventListener('click', function() {
    document.getElementById('featuresContainer').insertAdjacentHTML('beforeend', featureTemplate());
});

document.getElementById('featuresContainer').addEventListener('click', function(e) {
    const btn = e.target.closest('.btn-remove-feature');
    if (btn) btn.closest('.feature-row').remove();
});
</script>
@endsection
