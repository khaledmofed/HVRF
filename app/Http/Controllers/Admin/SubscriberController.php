<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Response;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = NewsletterSubscriber::latest('subscribed_at')->paginate(20);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function toggle(NewsletterSubscriber $subscriber)
    {
        $subscriber->update(['is_active' => !$subscriber->is_active]);
        return back()->with('success', 'Subscriber status updated.');
    }

    public function destroy(NewsletterSubscriber $subscriber)
    {
        $subscriber->delete();
        return back()->with('success', 'Subscriber deleted.');
    }

    public function export()
    {
        $subscribers = NewsletterSubscriber::where('is_active', true)->get();
        $csv = "Name,Email,Subscribed At\n";
        foreach ($subscribers as $sub) {
            $csv .= '"' . ($sub->name ?? '') . '","' . $sub->email . '","' . ($sub->subscribed_at?->format('Y-m-d H:i:s') ?? '') . '"' . "\n";
        }
        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="hvrf-subscribers-' . date('Y-m-d') . '.csv"',
        ]);
    }
}
