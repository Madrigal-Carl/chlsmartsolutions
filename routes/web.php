<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RouteController;


Route::get('/', [RouteController::class, 'goToLandingPage'])->name('landingPage');

Route::middleware(['role:customer, admin, adminofficer, cashier, technician'])->group(function(){
    Route::post('/signout', [AuthController::class, 'userSignout'])->name('signout');
});

Route::middleware('guest')->group(function () {
    Route::get('/signin', [RouteController::class, 'goToSigninPage'])->name('signinPage');
    Route::get('/signup', [RouteController::class, 'goToSignupPage'])->name('signupPage');
    Route::post('/signin', [AuthController::class, 'userSignin'])->name('signin');
    Route::post('/signup', [AuthController::class, 'userSignup'])->name('signup');
});

Route::middleware(['role:customer'])->group(function () {
    Route::get('/checkout', [RouteController::class, 'goToCheckoutPage'])->name('checkoutPage');
});
