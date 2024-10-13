<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login-user');  

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/select-profile', [LoginController::class, 'selectProfile'])->name('select-profile');
    Route::get('/home', [LoginController::class, 'showNetflix'])->name('home');
});

Route::get('/edit-profile', function () {
    return view('profile.edit-profile');
})->name('edit-profile');

Route::get('/form-profile', function () {
    return view('profile.form-profile');
})->name('form-profile');
