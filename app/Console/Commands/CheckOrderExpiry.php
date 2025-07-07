<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Services\NotificationService;
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

        $expiredOrder = Order::whereNotNull('expiry_date')->whereDate('expiry_date', '<', $today)->where('status', 'pending')->get();
        $notifier = app(NotificationService::class);

        foreach ($expiredOrder as $order) {
            $order->status = 'expired';
            $order->save();

            $notifier->createNotif(
                $order->user_id,
                'Order Expired',
                "The order {$order->reference_id} has expired.",
                ['admin', 'cashier', 'admin_officer'],
            );

            $this->info("Task ID {$order->id} has expired.");
        }

        $this->info('Checked for expired tasks.');
    }
}
