<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('sort_order')->get();
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.form', ['member' => new TeamMember()]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateMember($request);
        $validated['photo_url']  = $this->handlePhoto($request, null);
        $validated['is_active']  = $request->boolean('is_active');
        $validated['updated_at'] = now();

        TeamMember::create($validated);
        cache()->forget('team');
        return redirect()->route('admin.team.index')->with('success', 'Team member created.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.form', ['member' => $team]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $validated = $this->validateMember($request);
        $validated['photo_url']  = $this->handlePhoto($request, $team->photo_url);
        $validated['is_active']  = $request->boolean('is_active');
        $validated['updated_at'] = now();

        $team->update($validated);
        cache()->forget('team');
        return redirect()->route('admin.team.index')->with('success', 'Team member updated.');
    }

    public function destroy(TeamMember $team)
    {
        if ($team->photo_url && $this->isManagedPath($team->photo_url)) {
            Storage::disk($this->storageDisk())->delete($team->photo_url);
        }
        $team->delete();
        cache()->forget('team');
        return redirect()->route('admin.team.index')->with('success', 'Team member deleted.');
    }

    private function validateMember(Request $request): array
    {
        return $request->validate([
            'name'         => 'required|string|max:150',
            'role'         => 'required|string|max:150',
            'bio'          => 'required|string',
            'linkedin_url' => 'nullable|string|max:500',
            'sort_order'   => 'required|integer|min:0',
            'photo'        => 'nullable|image|max:2048',
            'role_ja'      => 'nullable|string|max:150',
            'role_ko'      => 'nullable|string|max:150',
            'role_es'      => 'nullable|string|max:150',
            'role_zh_tw'   => 'nullable|string|max:150',
            'role_vi'      => 'nullable|string|max:150',
            'bio_ja'       => 'nullable|string',
            'bio_ko'       => 'nullable|string',
            'bio_es'       => 'nullable|string',
            'bio_zh_tw'    => 'nullable|string',
            'bio_vi'       => 'nullable|string',
        ]);
    }

    private function handlePhoto(Request $request, ?string $existing): ?string
    {
        if (!$request->hasFile('photo')) {
            return $existing;
        }

        // Delete old file if it was a local upload
        if ($existing && $this->isManagedPath($existing)) {
            Storage::disk($this->storageDisk())->delete($existing);
        }

        return $request->file('photo')->store('team', $this->storageDisk());
    }

    private function isManagedPath(string $path): bool
    {
        return !str_starts_with($path, 'http') && !str_starts_with($path, '/');
    }

    private function storageDisk(): string
    {
        return config('filesystems.disks.r2.bucket') ? 'r2' : 'public';
    }
}
