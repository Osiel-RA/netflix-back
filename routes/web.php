<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\CheckActivePlan;

Route::get('/', function () {
    return view('welcome');
});

//RUTAS A LAS QUE NO SE NECESITA INICIAR SESION
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login-user');  
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/start-register', function () {// Ruta para mostrar la vista de inicio del registro
    return view('auth.start-register');
})->name('start-register');
Route::get('/register', function () {// Ruta para mostrar la vista de registro
    return view('auth.register');
})->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register-user');
Route::get('/check-email-register', function () {// Ruta para mostrar la vista de verificación de email
    return view('auth.check-email-register');
})->name('check-email-register');

//Rutas Reset Password:
Route::get('/email-forgotpassword', [ForgetPasswordController::class, 'forgetPassword'])->name('forget-password');
Route::post('/email-forgotpassword', [ForgetPasswordController::class, 'forgetPasswordPost'])->name('forget-password-post');
Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password', [ForgetPasswordController::class, 'resetPasswordPost'])->name('reset-password-post');

//*SI EL USUARIO NECESITA HABER INICIADO SESION DEBE ESTAR LA RUTA AQUI
Route::middleware(['auth'])->group(function () {
   
    // Agregar rutas para el pago por código de tarjeta de regalo
    Route::get('/membership/code-pay', [PaymentController::class, 'showCodePay'])->name('code-pay');
    Route::post('/redeem-code', [PaymentController::class, 'redeemCode'])->name('redeem.code');

    Route::get('/membership/start-plan', function () { //Vista de relleno 
        return view('membership.start-plan');
    })->name('membership.start-plan');

    Route::get('/membership/select-plan', function () { //seleccionar el plan
        return view('membership.select-plan');
    })->name('membership.select-plan');

    Route::get('/membership/select-pay', function () { //ruta para seleccionar el metodo de pago
        return view('membership.select-pay');
    })->name('membership.select-pay');

    Route::get('/membership/confirmation-pay', function () { //confirmamos que se completo el pago
        return view('membership.confirmation-pay');
    })->name('confirmation-pay');

    
});

//!!SI EL USUARIO NECESITA TENER PLAN ACTIVO Y HABER INICIADO SESION DEBE ESTAR LA RUTA AQUI
Route::middleware(['auth', \App\Http\Middleware\CheckActivePlan::class])->group(function () { 
    Route::get('/select-profile', [LoginController::class, 'selectProfile'])->name('select-profile');
    Route::get('/home', [LoginController::class, 'showNetflix'])->name('home');
    //rutas perfiles
    Route::get('/profiles/create', [ProfileController::class, 'create'])->name('create-profile');
    Route::post('/profiles/store', [ProfileController::class, 'store'])->name('store-profile');
    Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.index');
    Route::get('/profiles/{id}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::delete('/profiles/{id}', [ProfileController::class, 'destroy'])->name('profiles.destroy');
    Route::get('/select-profile', [LoginController::class, 'selectProfile'])->name('select-profile');
    Route::put('/profiles/{id}', [ProfileController::class, 'update'])->name('profiles.update');
    Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store'); 
    Route::get('/profiles/select', [ProfileController::class, 'select'])->name('profiles.select');
    Route::post('/profiles/{id}/update-image', [ProfileController::class, 'updateImage'])->name('profiles.updateImage');
    Route::get('/profiles/{id}/select-image', [ProfileController::class, 'selectImage'])->name('select-profile-image');
});



