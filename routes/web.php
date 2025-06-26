<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RouteController;


Route::get('/', [RouteController::class, 'goToLandingPage'])->name('landingPage');

Route::middleware('guest')->group(function () {
    Route::get('/signin', [RouteController::class, 'goToSigninPage'])->name('signinPage');
    Route::get('/signup', [RouteController::class, 'goToSignupPage'])->name('signupPage');
    Route::post('/signin', [AuthController::class, 'userSignin'])->name('signin');
    Route::post('/signup', [AuthController::class, 'UserSignup'])->name('signup');
});

Route::middleware(['role:customer'])->group(function () {
    Route::get('/checkout', [RouteController::class, 'goToCheckoutPage'])->name('checkoutPage');
});