@extends('layouts.admin')
@section('title', 'About Section')
@section('breadcrumb', 'Content / About Section')

@section('content')
<h4 class="mb-4" style="font-family: 'Playfair Display', serif;">About Section</h4>
<div class="stat-card" style="max-width: 800px;">
    <form method="POST" action="{{ route('admin.about.update') }}">
        @csrf
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label small fw-semibold">Philosophy Title</label>
                <input type="text" name="philosophy_title" class="form-control" value="{{ old('philosophy_title', $about->philosophy_title) }}" required>
            </div>
            <div class="col-md-8">
                <label class="form-label small fw-semibold">Philosophy Body</label>
                <textarea name="philosophy_body" rows="3" class="form-control" required>{{ old('philosophy_body', $about->philosophy_body) }}</textarea>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label small fw-semibold">Vision Title</label>
                <input type="text" name="vision_title" class="form-control" value="{{ old('vision_title', $about->vision_title) }}" required>
            </div>
            <div class="col-md-8">
                <label class="form-label small fw-semibold">Vision Body</label>
                <textarea name="vision_body" rows="3" class="form-control" required>{{ old('vision_body', $about->vision_body) }}</textarea>
            </div>
        </div>
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label class="form-label small fw-semibold">Mission Title</label>
                <input type="text" name="mission_title" class="form-control" value="{{ old('mission_title', $about->mission_title) }}" required>
            </div>
            <div class="col-md-8">
                <label class="form-label small fw-semibold">Mission Body</label>
                <textarea name="mission_body" rows="3" class="form-control" required>{{ old('mission_body', $about->mission_body) }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-sm px-4" style="background: #4ECDC4; color: #fff; border: none;">
            <i class="bi bi-save me-1"></i>Save Changes
        </button>
    </form>
</div>
@endsection
