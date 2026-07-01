@extends('layouts.admin')
@section('title', $member->id ? 'Edit Member' : 'New Member')
@section('breadcrumb', 'Content / Team / ' . ($member->id ? 'Edit' : 'New'))

@php $langs = [['en','🇺🇸'],['ja','🇯🇵'],['ko','🇰🇷'],['es','🇪🇸'],['zh_tw','🇹🇼'],['vi','🇻🇳']]; @endphp

@section('content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.team.index') }}" class="btn-mg-secondary btn-mg-ghost" style="width:32px;height:32px;padding:0;display:flex;align-items:center;justify-content:center;border-radius:8px;">
        <i class="bi bi-arrow-left"></i>
    </a>
    <h4 class="mb-0">{{ $member->id ? 'Edit Member' : 'New Member' }}</h4>
</div>

<div class="stat-card" style="max-width: 640px;">
    <form method="POST"
          action="{{ $member->id ? route('admin.team.update', $member) : route('admin.team.store') }}"
          enctype="multipart/form-data">
        @csrf
        @if($member->id) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $member->name) }}" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <hr style="border-color: rgba(255,255,255,0.08);">

        {{-- Language tabs --}}
        <ul class="nav nav-tabs mb-4">
            @foreach($langs as [$code, $flag])
            <li class="nav-item">
                <button class="nav-link {{ $code === 'en' ? 'active' : '' }}" type="button"
                        data-bs-toggle="tab" data-bs-target="#team-lang-{{ $code }}">
                    {{ $flag }} {{ strtoupper($code === 'zh_tw' ? 'ZH' : $code) }}
                </button>
            </li>
            @endforeach
        </ul>

        <div class="tab-content">
            {{-- English --}}
            <div class="tab-pane fade show active" id="team-lang-en">
                <div class="mb-3">
                    <label class="form-label">Role / Title</label>
                    <input type="text" name="role" class="form-control @error('role') is-invalid @enderror"
                           value="{{ old('role', $member->role) }}" required>
                    @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Bio</label>
                    <textarea name="bio" rows="3" class="form-control @error('bio') is-invalid @enderror"
                              required>{{ old('bio', $member->bio) }}</textarea>
                    @error('bio')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            {{-- Other languages --}}
            @foreach([['ja','🇯🇵'],['ko','🇰🇷'],['es','🇪🇸'],['zh_tw','🇹🇼'],['vi','🇻🇳']] as [$l, $flag])
            <div class="tab-pane fade" id="team-lang-{{ $l }}">
                <p class="small mb-3" style="color: var(--mg-text-muted);">{{ $flag }} Leave blank to fall back to English.</p>
                <div class="mb-3">
                    <label class="form-label">Role / Title</label>
                    <input type="text" name="role_{{ $l }}" class="form-control" value="{{ old("role_{$l}", $member->{"role_{$l}"}) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Bio</label>
                    <textarea name="bio_{{ $l }}" rows="3" class="form-control">{{ old("bio_{$l}", $member->{"bio_{$l}"}) }}</textarea>
                </div>
            </div>
            @endforeach
        </div>

        <hr style="border-color: rgba(255,255,255,0.08);">

        {{-- Photo Upload --}}
        <div class="mb-3">
            <label class="form-label">Photo</label>

            {{-- Current photo preview --}}
            @if($member->photo_url)
            <div class="mb-2 d-flex align-items-center gap-3" id="currentPhotoWrap">
                <img id="photoPreview"
                     src="{{ Str::startsWith($member->photo_url, 'http') ? $member->photo_url : asset('storage/' . $member->photo_url) }}"
                     alt="{{ $member->name }}"
                     style="width:72px;height:72px;border-radius:50%;object-fit:cover;border:2px solid var(--mg-hairline);">
                <div>
                    <div style="font-size:12px;color:var(--mg-text-muted);margin-bottom:4px;">Current photo</div>
                    <label for="photoInput" class="btn-mg-secondary" style="cursor:pointer;font-size:12px;padding:5px 14px;">
                        <i class="bi bi-arrow-repeat me-1"></i>Change
                    </label>
                </div>
            </div>
            @else
            {{-- No current photo: show upload zone --}}
            <div id="uploadZone" onclick="document.getElementById('photoInput').click()"
                 style="border:2px dashed var(--mg-hairline-strong);border-radius:var(--mg-r-lg);
                        padding:2rem;text-align:center;cursor:pointer;transition:border-color 0.15s;
                        background:var(--mg-surface-2);">
                <img id="photoPreview" src="" alt="" style="display:none;width:72px;height:72px;border-radius:50%;object-fit:cover;margin:0 auto 0.75rem;border:2px solid var(--mg-hairline);">
                <i class="bi bi-person-circle" id="uploadIcon" style="font-size:2.5rem;color:var(--mg-text-subtle);display:block;margin-bottom:0.5rem;"></i>
                <div style="font-size:13px;color:var(--mg-text-muted);">Click to upload photo</div>
                <div style="font-size:11px;color:var(--mg-text-subtle);margin-top:4px;">JPG, PNG, WebP — max 2 MB</div>
            </div>
            @endif

            <input type="file" id="photoInput" name="photo" accept="image/*"
                   class="@error('photo') is-invalid @enderror"
                   style="display:none;">
            @error('photo')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror

            {{-- File name badge shown after selection --}}
            <div id="fileNameBadge" style="display:none;margin-top:8px;font-size:12px;color:var(--mg-text-muted);">
                <i class="bi bi-check-circle-fill text-success me-1"></i>
                <span id="fileNameText"></span>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">LinkedIn URL</label>
            <input type="text" name="linkedin_url" class="form-control"
                   value="{{ old('linkedin_url', $member->linkedin_url) }}"
                   placeholder="https://linkedin.com/in/...">
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control"
                       value="{{ old('sort_order', $member->sort_order ?? 0) }}" min="0">
            </div>
            <div class="col-md-6 d-flex align-items-end pb-1">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                           {{ old('is_active', $member->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn-mg-primary"><i class="bi bi-save me-1"></i>Save Member</button>
            <a href="{{ route('admin.team.index') }}" class="btn-mg-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
(function () {
    var input   = document.getElementById('photoInput');
    var preview = document.getElementById('photoPreview');
    var badge   = document.getElementById('fileNameBadge');
    var nameEl  = document.getElementById('fileNameText');
    var zone    = document.getElementById('uploadZone');
    var icon    = document.getElementById('uploadIcon');

    if (!input) return;

    input.addEventListener('change', function () {
        var file = this.files[0];
        if (!file) return;

        var url = URL.createObjectURL(file);

        // Show preview
        preview.src = url;
        preview.style.display = 'block';

        if (icon) icon.style.display = 'none';
        if (zone) {
            zone.style.borderColor = 'var(--mg-green-dark)';
            zone.style.background  = 'var(--mg-green-soft)';
        }

        // File name badge
        nameEl.textContent = file.name;
        badge.style.display = 'block';
    });

    // Drag & drop on zone
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

    // "Change" label click when editing (already-has-photo case)
    document.querySelectorAll('label[for="photoInput"]').forEach(function (lbl) {
        lbl.addEventListener('click', function (e) { e.preventDefault(); input.click(); });
    });

    // Preview replaces existing photo on change (edit mode)
    if (preview && preview.src && !zone) {
        input.addEventListener('change', function () {
            if (this.files[0]) preview.src = URL.createObjectURL(this.files[0]);
        });
    }
})();
</script>
@endsection
