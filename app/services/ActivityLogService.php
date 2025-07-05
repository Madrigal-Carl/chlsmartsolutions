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

        Notification::create([
            'user_id' => $user_id,
            'title' => 'Task Completed',
            'message' => 'The task titled "' . Str::title($log->task->title) . '" requested by ' . $log->task->customer_name . ' has been successfully completed.',
        ]);

        notyf()->success('Task has been completed');
    }
}
