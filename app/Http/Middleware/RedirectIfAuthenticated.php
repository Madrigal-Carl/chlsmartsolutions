<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            return match ($role) {
                'admin' => redirect()->route('admin.dashboard'),
                'admin_officer' => redirect()->route('admin_officer.dashboard'),
                'cashier' => redirect()->route('cashier.dashboard'),
                'technician' => redirect()->route('technician.dashboard'),
                default => redirect()->route('landing.page'),
            };
        }

        return $next($request);
    }
}
