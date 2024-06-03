<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RatingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/rooms', [MainController::class, 'check_rooms'])->name('rooms');

Route::get('/contact-us', [RatingController::class, 'contact_us'])->name('contact-us');
Route::post('/rate', [RatingController::class, 'store'])->name('rate.store');

Route::get('/rooms/booking', [MainController::class, 'rooms_booking'])->name('rooms.booking');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/my-profile', [AuthController::class, 'profile'])->name('myprofile');
Route::get('/sign-up', [AuthController::class, 'sign_up'])->name('sign-up');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/auth/save', [AuthController::class, 'save'])->name('auth.save');
Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::patch('/auth/edit', [AuthController::class, 'edit'])->name('auth.edit');
