<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Support\Str;
use App\Models\Notification;

class ActivityLogService
{
    public function saveLog($task_id, $user_id)
    {
        $log = ActivityLog::create([
            'task_id' => $task_id,
            'user_id' => $user_id,
        ]);

        notyf()->success('Task has been completed');
    }
}
