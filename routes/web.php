<?php

use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;
use App\Livewire\Mail;
use App\Livewire\Login;
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

Route::get('/admin', function(){
    return view('login');
})->name('admin.login');

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::middleware('auth:web')->group(function(){
    Route::get('/admin/send-mail', Mail::class)->name('admin.send-mail');
    Route::get('/admin/view-users', ViewUsers::class)->name('admin.view-users');
    Route::get('/admin/view-tickets', ViewTickets::class)->name('admin.view-tickets');
});

Route::get('/recipient/subscribe/{email}', [SubscriptionController::class, 'index'])->name('subscribe');

Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');
