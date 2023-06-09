<?php

namespace App\Http\Controllers\Buy_Airtime_Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\BuyDataRequest;
use App\Models\UtilitiesTransactions;

use GuzzleHttp\Client;
use App\Services\BuyDataServices;


class BuyDataController extends Controller
{

    public $BuyDataServices;

    public function buy_mtn_data()
    {
        $user = User::where('id', '=', session('User'))->first();
        return view('User.data_form.mtn_data')->with('user', $user);
    }

    public function buy_mtn_data_request(BuyDataRequest $request)
    {
        $user_id = session('User');
        $this->BuyDataServices = new BuyDataServices;
        $output = $this->BuyDataServices->buy_mtn_data_request($request, $user_id);
        return $output;
    }

    public function buy_airtel_data()
    {
        $user = User::where('id', '=', session('User'))->first();

        return view('User.data_form.airtel_data')->with('user', $user);
    }

    public function buy_airtel_data_request(BuyDataRequest $request)
    {
        $user_id = session('User');
        $this->BuyDataServices = new BuyDataServices;
        $output =  $this->BuyDataServices->buy_airtel_data_request($request, $user_id);
        return $output;
    }

    public function buy_glo_data()
    {
        $user = User::where('id', '=', session('User'))->first();
        return view('User.data_form.glo_data')->with('user', $user);
    }

    public function buy_glo_data_request(BuyDataRequest $request)
    {
        $request->validated();

        $phone_number = $request->phone_number;

        $isGloNumber = preg_match('/^(0705|0805|0807|0811|0815|0905|0907)\d{7}$/', $phone_number);

        if ($isGloNumber) {
            dd($request->all());
        } else {
            return back()->with('failed', 'Not a Glo Number');
        }
    }


    public function buy_9mobile_data()
    {
        $user = User::where('id', '=', session('User'))->first();

        return view('User.data_form.9mobile_data')->with('user', $user);
    }

    public function buy_9mobile_data_request(BuyDataRequest $request)
    {
        $request->validated();

        $phone_number = $request->phone_number;

        $is9Mobile = preg_match('/^(0809|0817|0818|0908|0909)\d{7}$/', $phone_number);

        if ($is9Mobile) {
            dd($request->all());
        } else {
            return back()->with('failed', 'Not a 9Mobile Number');
        }
    }
}
