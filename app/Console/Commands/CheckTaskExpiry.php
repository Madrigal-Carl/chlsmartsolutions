<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Carbon\Carbon;

class CheckTaskExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-task-expiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();

        // Find expired tasks
        $expiredTasks = Task::whereDate('expiry_date', '<', $today)->get();

        foreach ($expiredTasks as $task) {
            $task->status = 'missed';
            $task->save();

            $this->info("Task ID {$task->id} has expired.");
        }

        $this->info('Checked for expired tasks.');
    }
}
