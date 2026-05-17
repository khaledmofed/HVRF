@extends('layouts.admin')
@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="mb-1" style="font-family: 'Playfair Display', serif;">Welcome back, {{ auth('admin')->user()->name }} 👋</h4>
        <p class="text-muted small mb-0">Here's an overview of your foundation's digital presence.</p>
    </div>
    <a href="{{ route('home') }}" target="_blank" class="btn btn-sm" style="background: rgba(78,205,196,0.1); color: #4ECDC4; border: 1px solid rgba(78,205,196,0.2);">
        <i class="bi bi-box-arrow-up-right me-1"></i>View Site
    </a>
</div>

<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="text-muted small mb-1">Total Messages</p>
                    <h3 class="fw-bold mb-0">{{ $totalMessages }}</h3>
                </div>
                <div class="stat-icon" style="background: rgba(78,205,196,0.1); color: #4ECDC4;"><i class="bi bi-envelope"></i></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="text-muted small mb-1">Unread Messages</p>
                    <h3 class="fw-bold mb-0">{{ $unreadMessages }}</h3>
                </div>
                <div class="stat-icon" style="background: rgba(231,76,60,0.1); color: #e74c3c;"><i class="bi bi-envelope-open"></i></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="text-muted small mb-1">Subscribers</p>
                    <h3 class="fw-bold mb-0">{{ $totalSubscribers }}</h3>
                </div>
                <div class="stat-icon" style="background: rgba(201,169,110,0.1); color: #C9A96E;"><i class="bi bi-newspaper"></i></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="text-muted small mb-1">Active Programs</p>
                    <h3 class="fw-bold mb-0">{{ $activePrograms }}</h3>
                </div>
                <div class="stat-icon" style="background: rgba(78,205,196,0.1); color: #4ECDC4;"><i class="bi bi-collection"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="stat-card">
            <h6 class="mb-3 fw-semibold">Recent Unread Messages</h6>
            @if($recentMessages->count())
            <div class="table-responsive">
                <table class="table table-sm table-borderless align-middle">
                    <thead><tr class="text-muted small"><th>Name</th><th>Subject</th><th>Date</th><th></th></tr></thead>
                    <tbody>
                        @foreach($recentMessages as $msg)
                        <tr>
                            <td class="small fw-semibold">{{ $msg->name }}</td>
                            <td class="small text-muted">{{ Str::limit($msg->subject, 30) }}</td>
                            <td class="small text-muted">{{ $msg->created_at?->format('M d') }}</td>
                            <td><a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-xs btn-sm py-0 px-2" style="font-size: 0.75rem; background: rgba(78,205,196,0.1); color: #4ECDC4; border: none;">View</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p class="text-muted small">No unread messages.</p>
            @endif
            <a href="{{ route('admin.messages.index') }}" class="small" style="color: #4ECDC4;">View all messages →</a>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="stat-card">
            <h6 class="mb-3 fw-semibold">Recent Subscribers</h6>
            @if($recentSubscribers->count())
            @foreach($recentSubscribers as $sub)
            <div class="d-flex align-items-center gap-2 mb-2">
                <div style="width: 32px; height: 32px; border-radius: 50%; background: rgba(78,205,196,0.15); display: flex; align-items: center; justify-content: center; font-size: 0.8rem; color: #4ECDC4;">
                    {{ strtoupper(substr($sub->email, 0, 1)) }}
                </div>
                <div>
                    <div class="small fw-semibold">{{ $sub->name ?: 'Unknown' }}</div>
                    <div class="small text-muted">{{ $sub->email }}</div>
                </div>
                <span class="ms-auto badge" style="background: {{ $sub->is_active ? 'rgba(78,205,196,0.15)' : 'rgba(100,100,100,0.2)' }}; color: {{ $sub->is_active ? '#4ECDC4' : '#888' }}; font-size: 0.7rem;">{{ $sub->is_active ? 'Active' : 'Inactive' }}</span>
            </div>
            @endforeach
            @else
            <p class="text-muted small">No subscribers yet.</p>
            @endif
            <a href="{{ route('admin.subscribers.index') }}" class="small" style="color: #4ECDC4;">View all subscribers →</a>
        </div>
    </div>
</div>
@endsection
