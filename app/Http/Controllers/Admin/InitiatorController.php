<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Initiator;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InitiatorController extends Controller
{
    public function index()
    {
        $initiators = Initiator::orderBy('sort_order')->get();
        $settings = SiteSetting::pluck('value', 'key');
        return view('admin.initiators.index', compact('initiators', 'settings'));
    }

    public function updateHeader(Request $request)
    {
        $validated = $request->validate([
            'initiators_label'             => 'nullable|string|max:100',
            'initiators_heading'           => 'nullable|string|max:150',
            'initiators_subtitle'          => 'nullable|string|max:500',
            'initiators_label_ja'          => 'nullable|string|max:100',
            'initiators_heading_ja'        => 'nullable|string|max:150',
            'initiators_subtitle_ja'       => 'nullable|string|max:500',
            'initiators_label_ko'          => 'nullable|string|max:100',
            'initiators_heading_ko'        => 'nullable|string|max:150',
            'initiators_subtitle_ko'       => 'nullable|string|max:500',
            'initiators_label_es'          => 'nullable|string|max:100',
            'initiators_heading_es'        => 'nullable|string|max:150',
            'initiators_subtitle_es'       => 'nullable|string|max:500',
            'initiators_label_zh_tw'       => 'nullable|string|max:100',
            'initiators_heading_zh_tw'     => 'nullable|string|max:150',
            'initiators_subtitle_zh_tw'    => 'nullable|string|max:500',
            'initiators_label_vi'          => 'nullable|string|max:100',
            'initiators_heading_vi'        => 'nullable|string|max:150',
            'initiators_subtitle_vi'       => 'nullable|string|max:500',
        ]);

        foreach ($validated as $key => $value) {
            SiteSetting::set($key, $value ?? '');
        }

        cache()->forget('settings');
        return redirect()->route('admin.initiators.index')->with('success', 'Section header updated.');
    }

    public function create()
    {
        return view('admin.initiators.form', ['initiator' => new Initiator()]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateInitiator($request, true);
        $validated['logo_url']  = $this->handleLogo($request, null);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['updated_at'] = now();

        Initiator::create($validated);
        cache()->forget('initiators');
        return redirect()->route('admin.initiators.index')->with('success', 'Initiator created.');
    }

    public function edit(Initiator $initiator)
    {
        return view('admin.initiators.form', compact('initiator'));
    }

    public function update(Request $request, Initiator $initiator)
    {
        $validated = $this->validateInitiator($request, false);
        $validated['logo_url']  = $this->handleLogo($request, $initiator->logo_url);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['updated_at'] = now();

        $initiator->update($validated);
        cache()->forget('initiators');
        return redirect()->route('admin.initiators.index')->with('success', 'Initiator updated.');
    }

    public function destroy(Initiator $initiator)
    {
        if ($initiator->logo_url && $this->isManagedPath($initiator->logo_url)) {
            Storage::disk($this->storageDisk())->delete($initiator->logo_url);
        }
        $initiator->delete();
        cache()->forget('initiators');
        return redirect()->route('admin.initiators.index')->with('success', 'Initiator deleted.');
    }

    private function validateInitiator(Request $request, bool $logoRequired): array
    {
        return $request->validate([
            'name'         => 'required|string|max:150',
            'website_url'  => 'nullable|string|max:500|url',
            'sort_order'   => 'required|integer|min:0',
            'logo'         => ($logoRequired ? 'required' : 'nullable') . '|image|max:2048',
            'name_ja'      => 'nullable|string|max:150',
            'name_ko'      => 'nullable|string|max:150',
            'name_es'      => 'nullable|string|max:150',
            'name_zh_tw'   => 'nullable|string|max:150',
            'name_vi'      => 'nullable|string|max:150',
        ]);
    }

    private function handleLogo(Request $request, ?string $existing): ?string
    {
        if (!$request->hasFile('logo')) {
            return $existing;
        }

        if ($existing && $this->isManagedPath($existing)) {
            Storage::disk($this->storageDisk())->delete($existing);
        }

        return $request->file('logo')->store('initiators', $this->storageDisk());
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
