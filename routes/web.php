<?php

use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RouteController::class, 'goToLandingPage'])->name('landingPage');

Route::get('/signin', [RouteController::class, 'goToSigninPage'])->name('signinPage');

Route::get('/signup', [RouteController::class, 'goToSignupPage'])->name('signupPage');

Route::get('/checkout', [RouteController::class, 'goToCheckoutPage'])->name('checkoutPage');