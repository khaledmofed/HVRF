@extends('layouts.admin')
@section('title', 'Roadmap')
@section('breadcrumb', 'Content / Roadmap')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0" style="font-family: 'Playfair Display', serif;">3-Year Roadmap</h4>
    <a href="{{ route('admin.roadmap.create') }}" class="btn btn-sm px-3" style="background: #4ECDC4; color: #fff; border: none;">
        <i class="bi bi-plus-lg me-1"></i>Add Year
    </a>
</div>
<div class="stat-card">
    <div class="table-responsive">
        <table class="table table-borderless align-middle">
            <thead><tr class="text-muted small"><th>Pillar</th><th>Year</th><th>Goal</th><th>Sort</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($years as $year)
                <tr class="border-bottom" style="border-color: rgba(255,255,255,0.04) !important;">
                    <td><span class="badge" style="background: rgba(78,205,196,0.1); color: #4ECDC4; font-size: 0.75rem;">{{ ucfirst($year->pillar) }}</span></td>
                    <td class="fw-semibold small">{{ $year->year_label }}</td>
                    <td class="small text-muted">{{ Str::limit($year->goal, 60) }}</td>
                    <td class="small text-muted">{{ $year->sort_order }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.roadmap.edit', $year) }}" class="btn btn-sm py-0 px-2" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"><i class="bi bi-pencil"></i></a>
                            <form method="POST" action="{{ route('admin.roadmap.destroy', $year) }}" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm py-0 px-2" style="background: rgba(231,76,60,0.1); border: 1px solid rgba(231,76,60,0.2); color: #e74c3c;"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted py-4">No roadmap years found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
