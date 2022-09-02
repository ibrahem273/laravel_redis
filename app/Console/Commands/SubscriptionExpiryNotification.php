<?php

namespace App\Console\Commands;

use App\Jobs\sendSubscriptionExpiredMessageJob;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SubscriptionExpiryNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:subscriptionExpiryNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check which subscribed users has been expired ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $expired_customer = Customer::where('subscription_end_date', '<', now())->get();
        foreach ($expired_customer as $customer) {
            $expire_date = Carbon::createFromFormat('Y-m-d', $customer->subscription_end_date)->toDateString();
            dispatch(new sendSubscriptionExpiredMessageJob($customer, $expire_date))->onQueue('Customer');

        }


    }
}
