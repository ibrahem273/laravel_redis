<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CustomerController extends Controller
{
    public function store(Request $request)
    {


                $customer = Redis::get('laravel_database_national_13124');


        //$s=Customer::where('national_id','=',1232)->get();
        if($customer=null)
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'national_id' => $request->national_id,
            'subscription_end_date' => Carbon::now()

        ]);


    }


}
