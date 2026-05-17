@extends('layouts.admin')
@section('title', $area->id ? 'Edit Focus Area' : 'New Focus Area')
@section('breadcrumb', 'Content / Focus Areas / ' . ($area->id ? 'Edit' : 'New'))

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
        <div class="row g-3 mb-3">
            <div class="col-md-2">
                <label class="form-label">Number</label>
                <input type="number" name="number" class="form-control" value="{{ old('number', $area->number) }}" min="1" required>
            </div>
            <div class="col-md-10">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $area->title) }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="3" class="form-control" required>{{ old('description', $area->description) }}</textarea>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">Icon Name <span style="font-weight:400;text-transform:none;letter-spacing:0;color:var(--mg-text-subtle);">(e.g. bi-people-fill)</span></label>
                <input type="text" name="icon_name" class="form-control" value="{{ old('icon_name', $area->icon_name) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $area->sort_order ?? 0) }}" min="0">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Examples <span style="font-weight:400;text-transform:none;letter-spacing:0;color:var(--mg-text-subtle);">— one per line</span></label>
            <textarea name="examples" rows="4" class="form-control">{{ old('examples', is_array($area->examples_json) ? implode("\n", $area->examples_json) : '') }}</textarea>
        </div>
        <div class="mb-4">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', $area->is_active ?? true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn-mg-primary"><i class="bi bi-save me-1"></i>Save Focus Area</button>
            <a href="{{ route('admin.focus-areas.index') }}" class="btn-mg-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
