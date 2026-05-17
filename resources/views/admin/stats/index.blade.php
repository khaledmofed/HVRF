@extends('layouts.admin')
@section('title', 'Stats')
@section('breadcrumb', 'Content / Stats')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0" style="font-family: 'Playfair Display', serif;">Stats</h4>
    <a href="{{ route('admin.stats.create') }}" class="btn btn-sm px-3" style="background: #4ECDC4; color: #fff; border: none;"><i class="bi bi-plus-lg me-1"></i>Add Stat</a>
</div>
<div class="stat-card">
    <div class="table-responsive">
        <table class="table table-borderless align-middle">
            <thead><tr class="text-muted small"><th>Value</th><th>Label</th><th>Icon</th><th>Sort</th><th>Active</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($stats as $stat)
                <tr class="border-bottom" style="border-color: rgba(255,255,255,0.04) !important;">
                    <td class="fw-bold" style="color: #C9A96E;">{{ $stat->value }}</td>
                    <td class="small">{{ $stat->label }}</td>
                    <td><i class="bi {{ $stat->icon_name }}" style="color: #4ECDC4;"></i></td>
                    <td class="small text-muted">{{ $stat->sort_order }}</td>
                    <td><span class="badge" style="background: {{ $stat->is_active ? 'rgba(78,205,196,0.15)' : 'rgba(100,100,100,0.15)' }}; color: {{ $stat->is_active ? '#4ECDC4' : '#888' }};">{{ $stat->is_active ? 'Active' : 'Inactive' }}</span></td>
                    <td><div class="d-flex gap-2">
                        <a href="{{ route('admin.stats.edit', $stat) }}" class="btn btn-sm py-0 px-2" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.stats.destroy', $stat) }}" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm py-0 px-2" style="background: rgba(231,76,60,0.1); border: 1px solid rgba(231,76,60,0.2); color: #e74c3c;"><i class="bi bi-trash"></i></button></form>
                    </div></td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No stats found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
