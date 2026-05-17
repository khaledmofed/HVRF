<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'name' => 'nullable|string|max:150',
        ]);

        $existing = NewsletterSubscriber::where('email', $validated['email'])->first();

        if ($existing) {
            if (!$existing->is_active) {
                $existing->update(['is_active' => true, 'subscribed_at' => now()]);
                return response()->json(['message' => 'You have been re-subscribed successfully!']);
            }
            return response()->json(['message' => 'You are already subscribed!']);
        }

        NewsletterSubscriber::create(array_merge($validated, ['subscribed_at' => now(), 'is_active' => true]));

        return response()->json(['message' => 'Thank you for subscribing to HVRF updates!']);
    }
}
