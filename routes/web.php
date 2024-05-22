<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/rooms', function () {
    return view('rooms');
})->name('rooms');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/my-profile', function () {
    return view('my-profile');
})->name('myprofile');

Route::get('/sign-up', function () {
    return view('sign-up');
})->name('sign-up');