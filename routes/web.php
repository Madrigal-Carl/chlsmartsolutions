<?php

use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [RouteController::class, 'goToLandingPage'])->name('landingPage');
    Route::get('/signin', [RouteController::class, 'goToSigninPage'])->name('signinPage');
    Route::get('/signup', [RouteController::class, 'goToSignupPage'])->name('signupPage');
});

Route::middleware(['role:customer'])->group(function () {
    Route::get('/checkout', [RouteController::class, 'goToCheckoutPage'])->name('checkoutPage');
});