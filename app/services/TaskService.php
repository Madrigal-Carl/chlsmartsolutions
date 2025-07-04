<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function getTasksByDate($date, $prio)
    {
        $query = Task::whereDate('created_at', '<=', $date)
            ->whereDate('expiry_date', '>=', $date);

        switch ($prio) {
            case 1:
                $query->where('priority', 'high');
                break;
            case 2:
                $query->where('priority', 'medium');
                break;
            case 3:
                $query->where('priority', 'low');
                break;
        }

        return $query->orderBy('expiry_date', 'asc')->paginate(11);
    }
}
