<?php

namespace App\Services;

use App\Models\Notification;

class NotificationService
{
    public function createNotif($id, $title, $message)
    {
        Notification::create([
            'user_id' => $id,
            'title' => $title,
            'message' => $message,
        ]);
    }

    public function getFilteredNotification($id ,$filter)
    {
        $query = Notification::where('user_id', $id);

        if ($filter == 1) {
            $query->whereNull('read_at');
        } elseif ($filter == 2) {
            $query->whereNotNull('read_at');
        }

        return $query->latest()->take(10)->get();
    }
}
