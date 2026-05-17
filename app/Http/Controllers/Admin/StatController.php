<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::orderBy('sort_order')->get();
        return view('admin.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.stats.form', ['stat' => new Stat()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'value' => 'required|string|max:50',
            'label' => 'required|string|max:150',
            'icon_name' => 'required|string|max:50',
            'sort_order' => 'required|integer|min:0',
        ]);
        Stat::create(array_merge($validated, ['is_active' => $request->boolean('is_active'), 'updated_at' => now()]));
        cache()->forget('stats');
        return redirect()->route('admin.stats.index')->with('success', 'Stat created.');
    }

    public function edit(Stat $stat)
    {
        return view('admin.stats.form', compact('stat'));
    }

    public function update(Request $request, Stat $stat)
    {
        $validated = $request->validate([
            'value' => 'required|string|max:50',
            'label' => 'required|string|max:150',
            'icon_name' => 'required|string|max:50',
            'sort_order' => 'required|integer|min:0',
        ]);
        $stat->update(array_merge($validated, ['is_active' => $request->boolean('is_active'), 'updated_at' => now()]));
        cache()->forget('stats');
        return redirect()->route('admin.stats.index')->with('success', 'Stat updated.');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();
        cache()->forget('stats');
        return redirect()->route('admin.stats.index')->with('success', 'Stat deleted.');
    }
}
