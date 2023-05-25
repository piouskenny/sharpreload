<?php

namespace App\Services;


use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TransactionHistory;
use App\Models\UserAccount;

class UserControllerServices
{
    public function deposit_request_service(Request $request)
    {
        $request->validate(
            [
                'amount' => 'required',
            ]
        );



        $user = User::where('id', '=', session('User'))->first();

        $amount_to_deposite = $request->amount;

        $amount_to_deposited = $request->amount + $request->old_balance;

        if ($amount_to_deposite < 100) {
            // This is the code that saves the transcation History if the amount is not valid
            // I will hard code it for now and implent the form later
            $transaction_history = TransactionHistory::create(
                [
                    'user_id' => $user->id,
                    'transaction_type' => "Credit",
                    'payment_method' => "Bank Transfer",
                    'amount' => $amount_to_deposite,
                    'status' => "failed"
                ]
            );
            return back()->with('message_error', "$amount_to_deposite is too small min is $100");
        }

        $amount = UserAccount::where('user_id', $user->id)->update([
            'account_balance' => $amount_to_deposited
        ]);

        return ($amount);
    }
}
