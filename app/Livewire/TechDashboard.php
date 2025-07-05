<?php

namespace App\Livewire;

use App\Models\ActivityLog;
use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\TaskService;
use Illuminate\Support\Carbon;
use App\Services\ActivityLogService;
use Illuminate\Support\Facades\Auth;

class TechDashboard extends Component
{
    use WithPagination;

    public $selectedDate;
    public $selectedPrio = 0;
    public $selectedTask = null;
    public $showModal = true;

    public function mount()
    {
        $this->selectedDate = Carbon::now()->format('Y-m-d');
    }

    public function selectTask($task_id)
    {
        $this->showModal = true;
        $this->selectedTask = Task::with('user')->find($task_id);
    }

    public function updateStatus($id, ActivityLogService $activityLogService)
    {
        $task = Task::find($id);
        if ($task->status != 'completed'){
            $task->status = 'completed';
            $task->save();
            $activityLogService->saveLog($id, Auth::user()->id);
            $this->dispatch('notificationRead')->to('sidebar');
            $this->closeModal();
            return;
        }
        notyf()->error('Task already been completed');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedTask = null;
    }

    public function render(TaskService $taskService)
    {
        $tasks = $taskService->getTasksByDate($this->selectedDate, $this->selectedPrio);
        $logs = ActivityLog::where('user_id', Auth::user()->id)->get();

        return view('livewire.tech-dashboard', [
            'tasks' => $tasks,
            'logs' => $logs,
        ]);
    }

    public function updatingSelectedDate()
    {
        $this->resetPage();
    }
}
