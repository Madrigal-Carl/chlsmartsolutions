<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function getAvailableTechnician()
    {
        return User::where('role', 'technician')
            ->where('status', 'active')
            ->with(['tasks' => function ($query) {
                $query->whereDate('created_at', '<=', now())
                    ->whereDate('expiry_date', '>=', now())
                    ->whereNotIn('status', ['missed', 'completed']);
            }])
            ->get();
    }
}
