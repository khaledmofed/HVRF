@extends('layouts.admin')
@section('title', 'Admin Users')
@section('breadcrumb', 'System / Admin Users')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Admin Users</h4>
    <a href="{{ route('admin.admins.create') }}" class="btn-mg-primary"><i class="bi bi-plus-lg me-1"></i>Add Admin</a>
</div>
<div class="stat-card">
    <div class="table-responsive">
        <table class="table table-borderless align-middle">
            <thead><tr class="text-muted small"><th>Name</th><th>Email</th><th>Added</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($admins as $item)
                <tr>
                    <td class="fw-semibold small">
                        {{ $item->name }}
                        @if($item->id === auth('admin')->id())
                        <span class="mg-badge mg-badge-green ms-1">You</span>
                        @endif
                    </td>
                    <td class="small text-muted">{{ $item->email }}</td>
                    <td class="small text-muted">{{ $item->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.admins.edit', $item) }}" class="btn-mg-secondary" style="padding:5px 12px;font-size:12px;"><i class="bi bi-pencil"></i></a>
                            @if($item->id !== auth('admin')->id())
                            <form method="POST" action="{{ route('admin.admins.destroy', $item) }}" onsubmit="return confirm('Delete this admin?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-mg-danger"><i class="bi bi-trash"></i></button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center text-muted py-4">No admin users found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
