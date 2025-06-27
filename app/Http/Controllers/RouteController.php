<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController
{
    public function goToLandingPage()
    {
        return view('layouts.landing_page');
    }

    public function goToSigninPage()
    {
        return view('layouts.signin');
    }

    public function goToSignupPage()
    {
        return view('layouts.signup');
    }

    public function goToCheckoutPage()
    {
        $user = Auth::user();
        $cartItems = session()->get('cartItems', []);
        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item->quantity * $item->price;
        }

        return view('customer.checkout', [
            'cartItems' => $cartItems,
            'total' => $total,
            'user' => $user,
        ]);
    }

    public function goToAdminDashboardPage()
    {
        return view('admin.dashboard');
    }

    public function goToAdminOfficerDashboardPage()
    {
        return view('admin_officer.dashboard');
    }

    public function goToCashierDashboardPage()
    {
        return view('cashier.dashboard');
    }

    public function goToTechnicianDashboardPage()
    {
        return view('technician.dashboard');
    }
}
