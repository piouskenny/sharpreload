<?php

namespace App\Services;

use App\Models\TransactionHistory;
use App\Models\User;
use App\Models\UserAccount;

class UserAccountControllerServices
{
    public function create_user_pin($request)
    {
        $user = User::where('id', '=', session('User'))->first();


        $request->validate([
            'pin' => 'required|min:4|max:4',
            'confirm_pin' => 'required|same:pin',
        ]);


        $user = User::where('id', $user->id)->update([
            'pin' => $request->confirm_pin
        ]);
    }

    public function UtilitiesTransactions()
    {
        $output = [];

        $user = User::where('id', '=', session('User'))->first();

        $utilities_transactions =  $user->UtilitiesTransactions()->orderBy('id', 'desc')->paginate(5);

        $output = [$user, $utilities_transactions];

        return $output;
    }

    public function deposit()
    {
        $output = [];

        $user = User::where('id', '=', session('User'))->first();
        $useraccount = UserAccount::where('user_id', '=', session('User'))->first();
        $test = $user->TransactionHistories()->orderBy('id', 'desc')->paginate(5);

        // Get current all transction total
        $all_transaction_total = $user->TransactionHistories->where('status', 'success')->sum('amount');



        // Get all transaction for this month
        $month = date('m');
        $year = date('Y');

        $all_transaction_this_month = TransactionHistory::where('user_id', '=', session('User'))->where('status', 'success')->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('amount');

        $output = [$user, $useraccount, $test, $all_transaction_total, $all_transaction_this_month];

        if (!$user->pin) {
            return view('User.pin_page')->with('user', $user);
        }
        
        return $output;
    }
}
