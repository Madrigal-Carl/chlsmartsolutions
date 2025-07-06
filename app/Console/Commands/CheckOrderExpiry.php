<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Carbon\Carbon;

class CheckOrderExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-order-expiry';

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

        $expiredTasks = Order::whereNotNull('expiry_date')->whereDate('expiry_date', '<', $today)->where('status', 'pending')->get();

        foreach ($expiredTasks as $task) {
            $task->status = 'expired';
            $task->save();

            $this->info("Task ID {$task->id} has expired.");
        }

        $this->info('Checked for expired tasks.');
    }
}
