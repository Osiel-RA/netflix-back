<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

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

/*
Route::get('/edit-profile', function () {
    return view('profile.edit-profile');
})->name('edit-profile');

Route::get('/form-profile', function () {
    return view('profile.form-profile');
})->name('form-profile');*/





//temporales
// Ruta para mostrar la vista de registro
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register-user');

// Ruta para mostrar la vista de verificación de email
Route::get('/check-email-register', function () {
    return view('auth.check-email-register');
})->name('check-email-register');
// Ruta para mostrar la vista de inicio del registro
Route::get('/start-register', function () {
    return view('auth.start-register');
})->name('start-register');

//roberto:
//Rutas Reset Password:
Route::get('/email-forgotpassword', [ForgetPasswordController::class, 'forgetPassword'])->name('forget-password');
Route::post('/email-forgotpassword', [ForgetPasswordController::class, 'forgetPasswordPost'])->name('forget-password-post');
Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password', [ForgetPasswordController::class, 'resetPasswordPost'])->name('reset-password-post');

//ocegueda
//rutas perfiles
Route::get('/profiles/create', [ProfileController::class, 'create'])->name('create-profile');
Route::post('/profiles/store', [ProfileController::class, 'store'])->name('store-profile');
Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.index');
Route::get('/profiles/{id}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::delete('/profiles/{id}', [ProfileController::class, 'destroy'])->name('profiles.destroy');
Route::get('/select-profile', [LoginController::class, 'selectProfile'])->name('select-profile');
Route::put('/profiles/{id}', [ProfileController::class, 'update'])->name('profiles.update');
Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store'); 
// Esta ruta debería estar definida en tu archivo web.php
Route::get('/profiles/select', [ProfileController::class, 'select'])->name('profiles.select');