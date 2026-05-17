@extends('layouts.admin')
@section('title', 'Vision Slider')
@section('breadcrumb', 'Content / Vision Slider')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <h4 class="mb-0">Vision Slider</h4>
    <span class="text-muted" style="font-size:0.82rem;">{{ $slides->count() }} slides — edit text, reorder, enable/disable</span>
</div>

<div class="stat-card p-0" style="overflow:hidden;">
    <table class="table mb-0">
        <thead>
            <tr>
                <th style="width:48px;">#</th>
                <th>Title</th>
                <th>Tag</th>
                <th>Pill</th>
                <th style="width:80px;">Order</th>
                <th style="width:80px;">Status</th>
                <th style="width:80px;"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($slides as $slide)
            <tr>
                <td class="text-muted fw-bold">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                <td>
                    <div class="fw-semibold">{{ $slide->title }}</div>
                    <div class="text-muted" style="font-size:0.78rem;max-width:340px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $slide->description }}</div>
                </td>
                <td><span style="font-size:0.75rem;font-weight:700;letter-spacing:1.5px;color:var(--mg-green-dark);text-transform:uppercase;">{{ $slide->tag }}</span></td>
                <td>
                    <span style="font-size:0.78rem;background:var(--mg-surface-2);border:1px solid var(--mg-hairline);border-radius:20px;padding:2px 10px;">
                        <i class="bi {{ $slide->pill_icon }} me-1"></i>{{ $slide->pill_label }}
                    </span>
                </td>
                <td class="text-center text-muted">{{ $slide->sort_order }}</td>
                <td class="text-center">
                    @if($slide->is_active)
                        <span class="badge" style="background:var(--mg-green-soft);color:var(--mg-green-dark);font-size:0.7rem;">Active</span>
                    @else
                        <span class="badge" style="background:var(--mg-surface-3);color:var(--mg-text-muted);font-size:0.7rem;">Off</span>
                    @endif
                </td>
                <td class="text-end">
                    <a href="{{ route('admin.vision-slides.edit', $slide) }}" class="btn-mg-secondary" style="padding:4px 12px;font-size:0.8rem;">
                        <i class="bi bi-pencil-fill me-1"></i>Edit
                    </a>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center text-muted py-4">No slides found. Run the seeder.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@if(session('success'))
<div class="alert mt-3" style="background:#f0fdf6;color:var(--mg-green-dark);border:1px solid #b7f5d8;border-radius:8px;">
    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
</div>
@endif
@endsection
