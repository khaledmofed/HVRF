@extends('layouts.admin')
@section('title', 'Team Members')
@section('breadcrumb', 'Content / Team Members')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0" style="font-family: 'Playfair Display', serif;">Team Members</h4>
    <a href="{{ route('admin.team.create') }}" class="btn btn-sm px-3" style="background: #4ECDC4; color: #fff; border: none;"><i class="bi bi-plus-lg me-1"></i>Add Member</a>
</div>
<div class="stat-card">
    <div class="table-responsive">
        <table class="table table-borderless align-middle">
            <thead><tr class="text-muted small"><th>Photo</th><th>Name</th><th>Role</th><th>Sort</th><th>Active</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($members as $member)
                <tr class="border-bottom" style="border-color: rgba(255,255,255,0.04) !important;">
                    <td>
                        @if($member->photo_url)
                        <img src="{{ Str::startsWith($member->photo_url, 'http') ? $member->photo_url : asset('storage/' . $member->photo_url) }}"
                             style="width: 36px; height: 36px; border-radius: 50%; object-fit: cover;">
                        @else
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(78,205,196,0.2); display: flex; align-items: center; justify-content: center; color: #4ECDC4; font-size: 0.9rem;"><i class="bi bi-person-fill"></i></div>
                        @endif
                    </td>
                    <td class="fw-semibold small">{{ $member->name }}</td>
                    <td class="small text-muted">{{ $member->role }}</td>
                    <td class="small text-muted">{{ $member->sort_order }}</td>
                    <td><span class="badge" style="background: {{ $member->is_active ? 'rgba(78,205,196,0.15)' : 'rgba(100,100,100,0.15)' }}; color: {{ $member->is_active ? '#4ECDC4' : '#888' }};">{{ $member->is_active ? 'Active' : 'Inactive' }}</span></td>
                    <td><div class="d-flex gap-2">
                        <a href="{{ route('admin.team.edit', $member) }}" class="btn btn-sm py-0 px-2" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.team.destroy', $member) }}" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm py-0 px-2" style="background: rgba(231,76,60,0.1); border: 1px solid rgba(231,76,60,0.2); color: #e74c3c;"><i class="bi bi-trash"></i></button></form>
                    </div></td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No team members found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
