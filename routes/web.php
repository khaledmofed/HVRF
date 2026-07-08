<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\FocusAreaController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\RoadmapController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\InitiatorController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VisionSlideController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/subscribe', [NewsletterController::class, 'store'])->name('newsletter.store');

// Admin auth
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => redirect()->route('admin.login'));
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware('auth.admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/hero', [HeroController::class, 'edit'])->name('hero.edit');
        Route::post('/hero', [HeroController::class, 'update'])->name('hero.update');

        Route::get('/about', [AboutController::class, 'edit'])->name('about.edit');
        Route::post('/about', [AboutController::class, 'update'])->name('about.update');

        Route::resource('vision-slides', VisionSlideController::class)->only(['index','edit','update'])->names('vision-slides');
        Route::resource('focus-areas', FocusAreaController::class)->names('focus-areas');
        Route::resource('programs', ProgramController::class)->names('programs');
        Route::resource('roadmap', RoadmapController::class)->names('roadmap');
        Route::resource('stats', StatController::class)->names('stats');
        Route::resource('initiators', InitiatorController::class)->names('initiators');
        Route::post('/initiators-header', [InitiatorController::class, 'updateHeader'])->name('initiators.header.update');
        Route::resource('team', TeamController::class)->names('team');

        Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
        Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

        Route::get('/subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');
        Route::patch('/subscribers/{subscriber}/toggle', [SubscriberController::class, 'toggle'])->name('subscribers.toggle');
        Route::delete('/subscribers/{subscriber}', [SubscriberController::class, 'destroy'])->name('subscribers.destroy');
        Route::get('/subscribers/export', [SubscriberController::class, 'export'])->name('subscribers.export');

        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

        Route::resource('admins', AdminController::class)->except(['show'])->names('admins');
    });
});
