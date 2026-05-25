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
        if ($team->photo_url && !str_starts_with($team->photo_url, 'http')) {
            Storage::disk('r2')->delete($team->photo_url);
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
        ]);
    }

    private function handlePhoto(Request $request, ?string $existing): ?string
    {
        if (!$request->hasFile('photo')) {
            return $existing;
        }

        // Delete old file if it was a local upload
        if ($existing && !str_starts_with($existing, 'http')) {
            Storage::disk('r2')->delete($existing);
        }

        return $request->file('photo')->store('team', 'r2');
    }
}
