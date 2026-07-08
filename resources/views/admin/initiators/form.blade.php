@extends('layouts.admin')
@section('title', $initiator->id ? 'Edit Initiator' : 'New Initiator')
@section('breadcrumb', 'Content / Initiators / ' . ($initiator->id ? 'Edit' : 'New'))

@section('content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.initiators.index') }}" class="btn-mg-secondary" style="width:32px;height:32px;padding:0;display:flex;align-items:center;justify-content:center;border-radius:8px;">
        <i class="bi bi-arrow-left"></i>
    </a>
    <h4 class="mb-0">{{ $initiator->id ? 'Edit Initiator' : 'New Initiator' }}</h4>
</div>

<div class="stat-card" style="max-width: 640px;">
    <form method="POST"
          action="{{ $initiator->id ? route('admin.initiators.update', $initiator) : route('admin.initiators.store') }}"
          enctype="multipart/form-data">
        @csrf
        @if($initiator->id) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label">Name (English)</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $initiator->name) }}" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Website URL</label>
            <input type="text" name="website_url" class="form-control @error('website_url') is-invalid @enderror"
                   value="{{ old('website_url', $initiator->website_url) }}"
                   placeholder="https://example.com">
            @error('website_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <hr style="border-color: var(--mg-hairline);">

        {{-- Language tabs — optional name translations --}}
        <label class="form-label mb-2">Translated Names (optional)</label>
        <ul class="nav nav-tabs mb-3">
            @foreach([['ja','🇯🇵'],['ko','🇰🇷'],['es','🇪🇸'],['zh_tw','🇹🇼'],['vi','🇻🇳']] as $i => [$code, $flag])
            <li class="nav-item">
                <button class="nav-link {{ $i === 0 ? 'active' : '' }}" type="button"
                        data-bs-toggle="tab" data-bs-target="#init-lang-{{ $code }}">
                    {{ $flag }} {{ strtoupper($code === 'zh_tw' ? 'ZH' : $code) }}
                </button>
            </li>
            @endforeach
        </ul>
        <div class="tab-content mb-3">
            @foreach([['ja','🇯🇵'],['ko','🇰🇷'],['es','🇪🇸'],['zh_tw','🇹🇼'],['vi','🇻🇳']] as $i => [$l, $flag])
            <div class="tab-pane fade {{ $i === 0 ? 'show active' : '' }}" id="init-lang-{{ $l }}">
                <p class="small mb-2" style="color: var(--mg-text-muted);">{{ $flag }} Leave blank to fall back to the English name.</p>
                <input type="text" name="name_{{ $l }}" class="form-control" value="{{ old("name_{$l}", $initiator->{"name_{$l}"}) }}">
            </div>
            @endforeach
        </div>

        <hr style="border-color: var(--mg-hairline);">

        {{-- Logo Upload --}}
        <div class="mb-3">
            <label class="form-label">Logo</label>

            @if($initiator->logo_url)
            @php
                $logoSrc = Str::startsWith($initiator->logo_url, ['http', '/'])
                    ? $initiator->logo_url
                    : (config('filesystems.disks.r2.url')
                        ? rtrim(config('filesystems.disks.r2.url'), '/') . '/' . $initiator->logo_url
                        : asset('storage/' . $initiator->logo_url));
            @endphp
            <div class="mb-2 d-flex align-items-center gap-3" id="currentLogoWrap">
                <img id="logoPreview" src="{{ $logoSrc }}" alt="{{ $initiator->name }}"
                     style="width:72px;height:72px;object-fit:contain;background:#fff;border:1px solid var(--mg-hairline);border-radius:var(--mg-r-md);padding:6px;">
                <div>
                    <div style="font-size:12px;color:var(--mg-text-muted);margin-bottom:4px;">Current logo</div>
                    <label for="logoInput" class="btn-mg-secondary" style="cursor:pointer;font-size:12px;padding:5px 14px;">
                        <i class="bi bi-arrow-repeat me-1"></i>Change
                    </label>
                </div>
            </div>
            @else
            <div id="uploadZone" onclick="document.getElementById('logoInput').click()"
                 style="border:2px dashed var(--mg-hairline-strong);border-radius:var(--mg-r-lg);
                        padding:2rem;text-align:center;cursor:pointer;transition:border-color 0.15s;
                        background:var(--mg-surface-2);">
                <img id="logoPreview" src="" alt="" style="display:none;width:72px;height:72px;object-fit:contain;margin:0 auto 0.75rem;background:#fff;border:1px solid var(--mg-hairline);border-radius:var(--mg-r-md);padding:6px;">
                <i class="bi bi-building" id="uploadIcon" style="font-size:2.5rem;color:var(--mg-text-subtle);display:block;margin-bottom:0.5rem;"></i>
                <div style="font-size:13px;color:var(--mg-text-muted);">Click to upload logo</div>
                <div style="font-size:11px;color:var(--mg-text-subtle);margin-top:4px;">PNG with transparent background recommended — max 2 MB</div>
            </div>
            @endif

            <input type="file" id="logoInput" name="logo" accept="image/*"
                   class="@error('logo') is-invalid @enderror"
                   style="display:none;">
            @error('logo')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror

            <div id="fileNameBadge" style="display:none;margin-top:8px;font-size:12px;color:var(--mg-text-muted);">
                <i class="bi bi-check-circle-fill text-success me-1"></i>
                <span id="fileNameText"></span>
            </div>
        </div>

        <div class="mb-3" style="max-width: 160px;">
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" class="form-control"
                   value="{{ old('sort_order', $initiator->sort_order ?? 0) }}" min="0">
        </div>

        <div class="mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                       {{ old('is_active', $initiator->is_active ?? true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn-mg-primary"><i class="bi bi-save me-1"></i>Save Initiator</button>
            <a href="{{ route('admin.initiators.index') }}" class="btn-mg-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
(function () {
    var input   = document.getElementById('logoInput');
    var preview = document.getElementById('logoPreview');
    var badge   = document.getElementById('fileNameBadge');
    var nameEl  = document.getElementById('fileNameText');
    var zone    = document.getElementById('uploadZone');
    var icon    = document.getElementById('uploadIcon');

    if (!input) return;

    input.addEventListener('change', function () {
        var file = this.files[0];
        if (!file) return;

        var url = URL.createObjectURL(file);
        preview.src = url;
        preview.style.display = 'block';

        if (icon) icon.style.display = 'none';
        if (zone) {
            zone.style.borderColor = 'var(--mg-green-dark)';
            zone.style.background  = 'var(--mg-green-soft)';
        }

        nameEl.textContent = file.name;
        badge.style.display = 'block';
    });

    if (zone) {
        zone.addEventListener('dragover', function (e) {
            e.preventDefault();
            zone.style.borderColor = 'var(--mg-green-dark)';
        });
        zone.addEventListener('dragleave', function () {
            zone.style.borderColor = 'var(--mg-hairline-strong)';
        });
        zone.addEventListener('drop', function (e) {
            e.preventDefault();
            if (e.dataTransfer.files.length) {
                input.files = e.dataTransfer.files;
                input.dispatchEvent(new Event('change'));
            }
        });
    }

    document.querySelectorAll('label[for="logoInput"]').forEach(function (lbl) {
        lbl.addEventListener('click', function (e) { e.preventDefault(); input.click(); });
    });
})();
</script>
@endsection
