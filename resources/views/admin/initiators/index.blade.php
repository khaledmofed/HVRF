@extends('layouts.admin')
@section('title', 'Initiators')
@section('breadcrumb', 'Content / Initiators')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Initiators</h4>
    <a href="{{ route('admin.initiators.create') }}" class="btn-mg-primary"><i class="bi bi-plus-lg me-1"></i>Add Initiator</a>
</div>
<div class="stat-card">
    <div class="table-responsive">
        <table class="table table-borderless align-middle">
            <thead><tr class="text-muted small"><th>Logo</th><th>Name</th><th>Website</th><th>Sort</th><th>Active</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($initiators as $item)
                <tr>
                    <td>
                        @php
                            $logoSrc = Str::startsWith($item->logo_url, ['http', '/'])
                                ? $item->logo_url
                                : (config('filesystems.disks.r2.url')
                                    ? rtrim(config('filesystems.disks.r2.url'), '/') . '/' . $item->logo_url
                                    : asset('storage/' . $item->logo_url));
                        @endphp
                        <img src="{{ $logoSrc }}" alt="{{ $item->name }}"
                             style="width: 40px; height: 40px; object-fit: contain; background: #fff; border: 1px solid var(--mg-hairline); border-radius: var(--mg-r-md); padding: 3px;">
                    </td>
                    <td class="fw-semibold small">{{ $item->name }}</td>
                    <td class="small text-muted">
                        @if($item->website_url)
                        <a href="{{ $item->website_url }}" target="_blank" rel="noopener">{{ Str::limit($item->website_url, 40) }}</a>
                        @else
                        &mdash;
                        @endif
                    </td>
                    <td class="small text-muted">{{ $item->sort_order }}</td>
                    <td>
                        <span class="mg-badge {{ $item->is_active ? 'mg-badge-green' : 'mg-badge-muted' }}">
                            {{ $item->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.initiators.edit', $item) }}" class="btn-mg-secondary" style="padding:5px 12px;font-size:12px;"><i class="bi bi-pencil"></i></a>
                            <form method="POST" action="{{ route('admin.initiators.destroy', $item) }}" onsubmit="return confirm('Delete this initiator?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-mg-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No initiators found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
