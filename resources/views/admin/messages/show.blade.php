@extends('layouts.admin')
@section('title', 'View Message')
@section('breadcrumb', 'Inbox / Messages / View')

@section('content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.messages.index') }}" class="btn btn-sm" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"><i class="bi bi-arrow-left"></i></a>
    <h4 class="mb-0" style="font-family: 'Playfair Display', serif;">Message</h4>
</div>
<div class="stat-card" style="max-width: 700px;">
    <div class="mb-4 pb-3" style="border-bottom: 1px solid rgba(255,255,255,0.06);">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h5 class="fw-bold mb-1">{{ $message->subject }}</h5>
                <div class="small text-muted">From: <strong>{{ $message->name }}</strong> &lt;{{ $message->email }}&gt;</div>
                <div class="small text-muted">Received: {{ $message->created_at?->format('M d, Y \a\t H:i') }}</div>
            </div>
            <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Delete this message?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm" style="background: rgba(231,76,60,0.1); border: 1px solid rgba(231,76,60,0.2); color: #e74c3c;"><i class="bi bi-trash me-1"></i>Delete</button>
            </form>
        </div>
    </div>
    <div style="line-height: 1.75; color: rgba(255,255,255,0.85); white-space: pre-line;">{{ $message->message }}</div>
    <div class="mt-4 pt-3" style="border-top: 1px solid rgba(255,255,255,0.06);">
        <a href="mailto:{{ $message->email }}" class="btn btn-sm px-3" style="background: #4ECDC4; color: #fff; border: none;"><i class="bi bi-reply me-1"></i>Reply via Email</a>
    </div>
</div>
@endsection
