@extends('layouts.admin')
@section('title', $admin->id ? 'Edit Admin' : 'New Admin')
@section('breadcrumb', 'System / Admin Users / ' . ($admin->id ? 'Edit' : 'New'))

@section('content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.admins.index') }}" class="btn-mg-secondary" style="width:32px;height:32px;padding:0;display:flex;align-items:center;justify-content:center;border-radius:8px;">
        <i class="bi bi-arrow-left"></i>
    </a>
    <h4 class="mb-0">{{ $admin->id ? 'Edit Admin' : 'New Admin' }}</h4>
</div>

<div class="stat-card" style="max-width: 480px;">
    <form method="POST"
          action="{{ $admin->id ? route('admin.admins.update', $admin) : route('admin.admins.store') }}">
        @csrf
        @if($admin->id) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $admin->name) }}" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $admin->email) }}" required>
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <hr style="border-color: var(--mg-hairline);">

        <div class="mb-3">
            <label class="form-label">{{ $admin->id ? 'New Password' : 'Password' }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   {{ $admin->id ? '' : 'required' }} autocomplete="new-password">
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            @if($admin->id)
            <div class="form-text" style="font-size:11.5px;color:var(--mg-text-subtle);">Leave blank to keep the current password.</div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn-mg-primary"><i class="bi bi-save me-1"></i>Save Admin</button>
            <a href="{{ route('admin.admins.index') }}" class="btn-mg-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
