@extends('layouts.admin')
@section('title', 'Programs')
@section('breadcrumb', 'Content / Programs')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0" style="font-family: 'Playfair Display', serif;">Programs</h4>
    <a href="{{ route('admin.programs.create') }}" class="btn btn-sm px-3" style="background: #4ECDC4; color: #fff; border: none;">
        <i class="bi bi-plus-lg me-1"></i>Add Program
    </a>
</div>

<div class="mb-4">
    <h6 class="text-muted small mb-2"><i class="bi bi-people-fill me-1" style="color: #4ECDC4;"></i>Connection Pillar</h6>
    <div class="stat-card mb-3">
        <div class="table-responsive">
            <table class="table table-borderless align-middle mb-0">
                <thead><tr class="text-muted small"><th>Title</th><th>Sort</th><th>Active</th><th>Actions</th></tr></thead>
                <tbody>
                    @forelse($connectionPrograms as $prog)
                    <tr>
                        <td><div class="fw-semibold small">{{ $prog->title }}</div><div class="text-muted" style="font-size: 0.75rem;">{{ Str::limit($prog->description, 70) }}</div></td>
                        <td class="small text-muted">{{ $prog->sort_order }}</td>
                        <td><span class="badge" style="background: {{ $prog->is_active ? 'rgba(78,205,196,0.15)' : 'rgba(100,100,100,0.15)' }}; color: {{ $prog->is_active ? '#4ECDC4' : '#888' }};">{{ $prog->is_active ? 'Active' : 'Inactive' }}</span></td>
                        <td><div class="d-flex gap-2">
                            <a href="{{ route('admin.programs.edit', $prog) }}" class="btn btn-sm py-0 px-2" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"><i class="bi bi-pencil"></i></a>
                            <form method="POST" action="{{ route('admin.programs.destroy', $prog) }}" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm py-0 px-2" style="background: rgba(231,76,60,0.1); border: 1px solid rgba(231,76,60,0.2); color: #e74c3c;"><i class="bi bi-trash"></i></button></form>
                        </div></td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-muted small">No connection programs.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="text-muted small mb-2"><i class="bi bi-bullseye me-1" style="color: #4ECDC4;"></i>Purpose Pillar</h6>
    <div class="stat-card">
        <div class="table-responsive">
            <table class="table table-borderless align-middle mb-0">
                <thead><tr class="text-muted small"><th>Title</th><th>Sort</th><th>Active</th><th>Actions</th></tr></thead>
                <tbody>
                    @forelse($purposePrograms as $prog)
                    <tr>
                        <td><div class="fw-semibold small">{{ $prog->title }}</div><div class="text-muted" style="font-size: 0.75rem;">{{ Str::limit($prog->description, 70) }}</div></td>
                        <td class="small text-muted">{{ $prog->sort_order }}</td>
                        <td><span class="badge" style="background: {{ $prog->is_active ? 'rgba(78,205,196,0.15)' : 'rgba(100,100,100,0.15)' }}; color: {{ $prog->is_active ? '#4ECDC4' : '#888' }};">{{ $prog->is_active ? 'Active' : 'Inactive' }}</span></td>
                        <td><div class="d-flex gap-2">
                            <a href="{{ route('admin.programs.edit', $prog) }}" class="btn btn-sm py-0 px-2" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"><i class="bi bi-pencil"></i></a>
                            <form method="POST" action="{{ route('admin.programs.destroy', $prog) }}" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm py-0 px-2" style="background: rgba(231,76,60,0.1); border: 1px solid rgba(231,76,60,0.2); color: #e74c3c;"><i class="bi bi-trash"></i></button></form>
                        </div></td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-muted small">No purpose programs.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
