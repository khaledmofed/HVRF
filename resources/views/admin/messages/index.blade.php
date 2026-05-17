@extends('layouts.admin')
@section('title', 'Contact Messages')
@section('breadcrumb', 'Inbox / Messages')

@section('content')
<h4 class="mb-4" style="font-family: 'Playfair Display', serif;">Contact Messages</h4>
<div class="stat-card">
    <div class="table-responsive">
        <table class="table table-borderless align-middle">
            <thead><tr class="text-muted small"><th>Name</th><th>Email</th><th>Subject</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($messages as $msg)
                <tr class="border-bottom {{ !$msg->is_read ? 'fw-semibold' : '' }}" style="border-color: rgba(255,255,255,0.04) !important;">
                    <td class="small">{{ $msg->name }}</td>
                    <td class="small text-muted">{{ $msg->email }}</td>
                    <td class="small">{{ Str::limit($msg->subject, 40) }}</td>
                    <td class="small text-muted">{{ $msg->created_at?->format('M d, Y') }}</td>
                    <td>
                        @if(!$msg->is_read)
                        <span class="badge" style="background: rgba(231,76,60,0.15); color: #e74c3c; font-size: 0.72rem;">Unread</span>
                        @else
                        <span class="badge" style="background: rgba(100,100,100,0.15); color: #888; font-size: 0.72rem;">Read</span>
                        @endif
                    </td>
                    <td><div class="d-flex gap-2">
                        <a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-sm py-0 px-2" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.78rem;">View</a>
                        <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm py-0 px-2" style="background: rgba(231,76,60,0.1); border: 1px solid rgba(231,76,60,0.2); color: #e74c3c;"><i class="bi bi-trash"></i></button></form>
                    </div></td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No messages found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mt-3">{{ $messages->links() }}</div>
</div>
@endsection
