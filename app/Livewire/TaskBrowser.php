<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\TaskService;
use App\Services\UserService;
use Livewire\WithoutUrlPagination;

class TaskBrowser extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $selectedStatus = 'all';
    public $selectedPrio = 'all';
    public string $activeTab = 'taskBrowse';

    public function getTask($status = null)
    {
        $taskService = app(TaskService::class);
        return $taskService->countTask($status);
    }

    public function updatePriority($task_id, $priority)
    {
        $task = Task::find($task_id);

        if ($task) {
            $task->priority = $priority;
            $task->save();

            notyf()->success('Status updated successfully');
        }
    }

    public function updateAssignedTech($task_id, $user_id)
    {
        $task = Task::find($task_id);

        if ($task) {
            $task->user_id = $user_id;
            $task->save();

            notyf()->success('Assigned successfully');
        }
    }

    public function render(TaskService $taskService, UserService $userService)
    {
        $technicians = $userService->getAvailableTechnician();

        $tasks =  $taskService->getFilteredTask($this->selectedStatus, $this->selectedPrio);

        return view('livewire.task-browser', [
            'tasks' => $tasks,
            'technicians' => $technicians,
        ]);
    }


}
