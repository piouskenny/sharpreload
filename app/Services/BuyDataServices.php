<?php

namespace App\Services;

use App\Models\User;
use App\Models\UtilitiesTransactions;

class BuyDataServices
{
    public function buy_mtn_data_request($request, $user_id)
    {
        $request->validated();

        $phone_number = $request->phone_number;

        $user = User::where('id', '=', $user_id)->first();


        $isMtnNumber = preg_match('/^(0703|0706|0803|0806|0810|0813|0814|0816|0903|0906)\d{7}$/', $phone_number);


        if ($isMtnNumber) {
            $doubleValue = floatval($request->amount_input);
            $user_balance = $user->userAccount->account_balance;

            if ($doubleValue > $user_balance) {
                $output =  back()->with('failed', "Balance too low");
            } elseif ($user->pin != $request->pin) {

                $output =  back()->with('failed', 'Incorrect Pin');
            } else {

                // There will be a functionality code here from the vendor API that wil handle the transction
                // And the rest of the Code will only continue if the response status was successfull
                // I will manually create a status here now
                $status = "successful";
                // $status = "failed";

                if ($status === "successful") {
                    // Remove the amount bought from the balance
                    $new_balance =  $user_balance - $doubleValue;

                    $update_user_account =  $user->userAccount->update(
                        [
                            'account_balance' => $new_balance,
                        ]
                    );


                    // Add the utilitiesTransactions to the database

                    $UtilitiesTransactions = new UtilitiesTransactions();
                    $UtilitiesTransactions->user_id = $user_id;
                    $UtilitiesTransactions->phone_number = $request->phone_number;
                    $UtilitiesTransactions->plan = $request->data_plans;
                    $UtilitiesTransactions->amount = $request->amount_input;
                    $UtilitiesTransactions->coupon = $request->coupon;
                    $UtilitiesTransactions->status = $status;
                    $UtilitiesTransactions->save();

                    if ($update_user_account) {
                        $output =  back()->with('success', "Data Purchased successfully $request->data_plans for $request->phone_number");
                    }
                } else {

                    $UtilitiesTransactions = new UtilitiesTransactions;
                    $UtilitiesTransactions->user_id = $user_id;
                    $UtilitiesTransactions->phone_number = $request->phone_number;
                    $UtilitiesTransactions->plan = $request->data_plans;
                    $UtilitiesTransactions->amount = $request->amount_input;
                    $UtilitiesTransactions->coupon = $request->coupon;
                    $UtilitiesTransactions->status = $status;
                    $UtilitiesTransactions->save();
                    $output =  back()->with('failed', "Data Purchased failed");
                }
            }
        } else {
            $output = back()->with('failed', "Not a Mtn Number");
        }

        return $output;
    }

    public function buy_airtel_data_request() {
        
    }
}
