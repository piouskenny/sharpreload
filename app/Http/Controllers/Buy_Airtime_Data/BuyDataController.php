<?php

namespace App\Http\Controllers\Buy_Airtime_Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\BuyDataRequest;

use GuzzleHttp\Client;


class BuyDataController extends Controller
{
    public function buy_mtn_data()
    {
        $user = User::where('id', '=', session('User'))->first();

        return view('User.data_form.mtn_data')->with('user', $user);
    }


    public function buy_mtn_data_request(BuyDataRequest $request)
    {

        $request->validated();

        $user = User::where('id', '=', session('User'))->first();

        $doubleValue = floatval($request->amount_input);
        $user_balance = $user->userAccount->account_balance;

        if ($doubleValue > $user_balance) {

            return back()->with('failed', "Balance too low");
        } elseif ($user->pin != $request->pin) {

            return back()->with('failed', 'Incorrect Pin');
        } else {
            // Remove the amount bought from the balance
            $new_balance =  $user_balance - $doubleValue;

            $update_user_account =  $user->userAccount->update(
                [
                    'account_balance' => $new_balance,
                ]
            );

            if ($update_user_account) {
                return back()->with('success', "Data Purchased successfully $request->data_plans for $request->phone_number");
            }
        }
    }

    public function buy_airtel_data()
    {
        $user = User::where('id', '=', session('User'))->first();

        return view('User.data_form.airtel_data')->with('user', $user);
    }

    public function buy_airtel_data_request(Request $request)
    {
        dd($request->all());
    }




    public function buy_glo_data()
    {
        $user = User::where('id', '=', session('User'))->first();

        return view('User.data_form.glo_data')->with('user', $user);
    }

    public function buy_glo_data_request(Request $request)
    {
        dd($request->all());
    }


    public function buy_9mobile_data()
    {
        $user = User::where('id', '=', session('User'))->first();

        return view('User.data_form.9mobile_data')->with('user', $user);
    }

    public function buy_9mobile_data_request(Request $request)
    {
        dd($request->all());
    }
}
