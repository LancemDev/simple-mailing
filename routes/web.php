<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Mail;
use App\Livewire\ViewUsers;
use App\Livewire\ViewTickets;
use App\Http\Controllers\Auth\Login as LoginController;
use App\Http\Controllers\SubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Display the login form
Route::get('/login', function () {
    return view('login');
})->name('login');

// Handle login form submission
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');

// Admin routes
Route::middleware('auth:web')->group(function () {
    Route::get('/admin/send-mail', Mail::class)->name('admin.mail.send');
    Route::get('/admin/view-recipients', ViewUsers::class)->name('admin.recipients.view');
    Route::get('/admin/view-new-recipients', ViewTickets::class)->name('admin.recipients.new');
});  

// Subscription route
Route::get('/recipient/subscribe/{email}', [SubscriptionController::class, 'index'])->name('recipient.subscribe');

// Logout route
Route::get('/logout', function () {
    $guards = array_keys(config('auth.guards'));

    foreach ($guards as $guard) {
        if (auth()->guard($guard)->check()) {
            auth()->guard($guard)->logout();
        }
    }

    return redirect('/login')->with('success', 'Logout successful');
})->name('logout');