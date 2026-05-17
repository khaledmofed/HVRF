@extends('layouts.admin')
@section('title', 'Subscribers')
@section('breadcrumb', 'Inbox / Subscribers')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0" style="font-family: 'Playfair Display', serif;">Newsletter Subscribers</h4>
    <a href="{{ route('admin.subscribers.export') }}" class="btn btn-sm px-3" style="background: rgba(201,169,110,0.1); color: #C9A96E; border: 1px solid rgba(201,169,110,0.2);">
        <i class="bi bi-download me-1"></i>Export CSV
    </a>
</div>
<div class="stat-card">
    <div class="table-responsive">
        <table class="table table-borderless align-middle">
            <thead><tr class="text-muted small"><th>Name</th><th>Email</th><th>Subscribed</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($subscribers as $sub)
                <tr class="border-bottom" style="border-color: rgba(255,255,255,0.04) !important;">
                    <td class="small fw-semibold">{{ $sub->name ?: '—' }}</td>
                    <td class="small">{{ $sub->email }}</td>
                    <td class="small text-muted">{{ $sub->subscribed_at?->format('M d, Y') }}</td>
                    <td>
                        <span class="badge" style="background: {{ $sub->is_active ? 'rgba(78,205,196,0.15)' : 'rgba(100,100,100,0.15)' }}; color: {{ $sub->is_active ? '#4ECDC4' : '#888' }};">
                            {{ $sub->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td><div class="d-flex gap-2">
                        <form method="POST" action="{{ route('admin.subscribers.toggle', $sub) }}">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn btn-sm py-0 px-2" style="background: rgba(78,205,196,0.1); border: 1px solid rgba(78,205,196,0.2); color: #4ECDC4; font-size: 0.78rem;">
                                {{ $sub->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.subscribers.destroy', $sub) }}" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm py-0 px-2" style="background: rgba(231,76,60,0.1); border: 1px solid rgba(231,76,60,0.2); color: #e74c3c;"><i class="bi bi-trash"></i></button></form>
                    </div></td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted py-4">No subscribers yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mt-3">{{ $subscribers->links() }}</div>
</div>
@endsection
