@extends('layouts.admin')
@section('title', $stat->id ? 'Edit Stat' : 'New Stat')
@section('breadcrumb', 'Content / Stats / ' . ($stat->id ? 'Edit' : 'New'))

@section('content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.stats.index') }}" class="btn btn-sm" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"><i class="bi bi-arrow-left"></i></a>
    <h4 class="mb-0" style="font-family: 'Playfair Display', serif;">{{ $stat->id ? 'Edit Stat' : 'New Stat' }}</h4>
</div>
<div class="stat-card" style="max-width: 500px;">
    <form method="POST" action="{{ $stat->id ? route('admin.stats.update', $stat) : route('admin.stats.store') }}">
        @csrf
        @if($stat->id) @method('PUT') @endif
        <div class="mb-3">
            <label class="form-label small fw-semibold">Value (e.g. 5,000+)</label>
            <input type="text" name="value" class="form-control" value="{{ old('value', $stat->value) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label small fw-semibold">Label</label>
            <input type="text" name="label" class="form-control" value="{{ old('label', $stat->label) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label small fw-semibold">Icon Name (e.g. bi-people-fill)</label>
            <input type="text" name="icon_name" class="form-control" value="{{ old('icon_name', $stat->icon_name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label small fw-semibold">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $stat->sort_order ?? 0) }}" min="0">
        </div>
        <div class="mb-4">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', $stat->is_active ?? true) ? 'checked' : '' }}>
                <label class="form-check-label small" for="is_active">Active</label>
            </div>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-sm px-4" style="background: #4ECDC4; color: #fff; border: none;"><i class="bi bi-save me-1"></i>Save</button>
            <a href="{{ route('admin.stats.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
