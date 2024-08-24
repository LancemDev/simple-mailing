<?php

use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;
use App\Livewire\Mail;
use App\Livewire\Login;

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

Route::get('/login', Login::class)->name('login');
Route::get('/mail', Mail::class)->name('mail');

Route::get('/subscribe/{email}', [SubscriptionController::class, 'index'])->name('subscribe');
