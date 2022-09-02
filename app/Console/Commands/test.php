<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use Predis\Command\Redis\KEYS;
use Predis\Connection\ConnectionException;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $customer = Customer::all();
        foreach ($customer as $c) {
            Redis::set('national_' . $c->national_id, $c->id);
        }
    }
}
