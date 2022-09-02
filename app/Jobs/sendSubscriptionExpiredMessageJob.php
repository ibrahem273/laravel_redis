<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Redis\Connections\PhpRedisConnection;
use Illuminate\Support\Facades\Redis;

class sendSubscriptionExpiredMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
private $expire_date;
private  $customer;
    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($customer,$expire_date)
    {
        $this->expire_date=$expire_date;
        $this->customer=$customer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $data=['your account expired'];


        sendMail('date Expiry',$data,$this->customer->email,'email.alert');
    }

}
