<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Task;
use Illuminate\Console\Command;
use App\Services\NotificationService;

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

        $expiredTasks = Task::whereDate('expiry_date', '<', $today)->where('status', 'pending')->get();
        $notifier = app(NotificationService::class);

        foreach ($expiredTasks as $task) {
            $task->status = 'missed';
            $task->save();

            $notifier->createNotif(
                $task->user_id,
                'Order Expired',
                "The order {$task->title} has expired.",
                ['technician'],
            );

            $this->info("Task ID {$task->id} has expired.");
        }

        $this->info('Checked for expired tasks.');
    }
}
