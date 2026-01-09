<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('admin.login');
    Route::post('/sign-in', [AuthController::class, 'sign_in'])->name('admin.signin');
    Route::get('/admin-logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::resource('venues', VenueController::class);
    Route::get('/load-venues', [VenueController::class, 'load'])->name('admin.venue.load');

    Route::resource('events', EventController::class);
    Route::get('/load-events', [EventController::class, 'load'])->name('admin.event.load');

    Route::resource('guests', GuestController::class);
    Route::get('/load-guests', [GuestController::class, 'load'])->name('admin.guest.load');

    Route::resource('stories', StoryController::class);
    Route::get('/load-stories', [StoryController::class, 'load'])->name('admin.story.load');

    Route::resource('hosts', HostController::class);
    Route::get('/load-hosts', [HostController::class, 'load'])->name('admin.host.load');

    Route::resource('photos', PhotoController::class);
    Route::get('/load-photos', [PhotoController::class, 'load'])->name('admin.photo.load');
    
    Route::get('/settings', [DashboardController::class, 'general_settings'])->name('admin.settings');
    Route::post('/submit-general-settings', [DashboardController::class, 'submit_general_settings'])->name('admin.submit.general.settings');

    Route::post('/side-change', [DashboardController::class, 'side_change'])->name('admin.vivahsidechange');
});
