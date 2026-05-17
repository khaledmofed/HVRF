<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\NewsletterSubscriber;
use App\Models\Program;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMessages = ContactMessage::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();
        $totalSubscribers = NewsletterSubscriber::count();
        $activePrograms = Program::where('is_active', true)->count();
        $recentMessages = ContactMessage::where('is_read', false)->latest('created_at')->take(5)->get();
        $recentSubscribers = NewsletterSubscriber::latest('subscribed_at')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalMessages', 'unreadMessages', 'totalSubscribers',
            'activePrograms', 'recentMessages', 'recentSubscribers'
        ));
    }
}
