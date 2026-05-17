@extends('layouts.admin')
@section('title', 'Focus Areas')
@section('breadcrumb', 'Content / Focus Areas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0" style="font-family: 'Playfair Display', serif;">Focus Areas</h4>
    <a href="{{ route('admin.focus-areas.create') }}" class="btn btn-sm px-3" style="background: #4ECDC4; color: #fff; border: none;">
        <i class="bi bi-plus-lg me-1"></i>Add Focus Area
    </a>
</div>
<div class="stat-card">
    <div class="table-responsive">
        <table class="table table-borderless align-middle">
            <thead><tr class="text-muted small border-bottom" style="border-color: rgba(255,255,255,0.06) !important;">
                <th>#</th><th>Title</th><th>Icon</th><th>Sort</th><th>Active</th><th>Actions</th>
            </tr></thead>
            <tbody>
                @forelse($areas as $area)
                <tr class="border-bottom" style="border-color: rgba(255,255,255,0.04) !important;">
                    <td class="small text-muted">{{ $area->number }}</td>
                    <td>
                        <div class="fw-semibold small">{{ $area->title }}</div>
                        <div class="text-muted" style="font-size: 0.75rem;">{{ Str::limit($area->description, 60) }}</div>
                    </td>
                    <td><i class="bi {{ $area->icon_name }} fs-5" style="color: #4ECDC4;"></i> <span class="text-muted small">{{ $area->icon_name }}</span></td>
                    <td class="small text-muted">{{ $area->sort_order }}</td>
                    <td>
                        <span class="badge" style="background: {{ $area->is_active ? 'rgba(78,205,196,0.15)' : 'rgba(100,100,100,0.15)' }}; color: {{ $area->is_active ? '#4ECDC4' : '#888' }};">
                            {{ $area->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.focus-areas.edit', $area) }}" class="btn btn-sm py-0 px-2" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.78rem;">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.focus-areas.destroy', $area) }}" onsubmit="return confirm('Delete this focus area?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm py-0 px-2" style="background: rgba(231,76,60,0.1); border: 1px solid rgba(231,76,60,0.2); color: #e74c3c; font-size: 0.78rem;">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No focus areas found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
