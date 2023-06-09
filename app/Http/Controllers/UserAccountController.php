<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserBankDetialsRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAccount;
use App\Models\TransactionHistory;
use App\Models\UserAdditionalInfo;
use App\Services\UserAccountControllerServices;


class UserAccountController extends Controller
{

    public $UserAccountControllerServices;


    public function pin_page()
    {
        $user = User::where('id', '=', session('User'))->first();

        return view('User.pin_page')->with('user', $user);
    }

    public function create_user_pin(Request $request)
    {

        $this->UserAccountControllerServices = new UserAccountControllerServices;
        $this->UserAccountControllerServices->create_user_pin($request);

        return redirect()->route('user.pin_page')->with('success', 'Transaction Pin created Successfully');
    }



    public function UtilitiesTransactions()
    {
        $this->UserAccountControllerServices = new UserAccountControllerServices;
        $output = $this->UserAccountControllerServices->UtilitiesTransactions();
        return view(
            'User.utilitiesTransactions',
            [
                'user' => $output[0],
                'utilities_transactions' => $output[1]
            ]
        );
    }

    public function deposit()
    {
        $this->UserAccountControllerServices = new UserAccountControllerServices;
        $output = $this->UserAccountControllerServices->deposit();
        return view(
            'user.deposit',
            [
                'user' => $output[0],
                'userAccount' => $output[1],
                'TransactionHistories' => $output[2],
                'all_transaction_total' => $output[3],
                'all_transaction_this_month' => $output[4]
            ]
        );
    }


    public function deposit_request(Request $request)
    {
        $request->validate(
            [
                'amount' => 'required|max:6',
                'pin' => 'required|integer|min:4'
            ]
        );


        $user = User::where('id', '=', session('User'))->first();

        if ($user->pin != $request->pin) {
            return back()->with('failed', 'incorrect user pin');
        }
        $amount_to_deposite = $request->amount;

        $amount_to_deposited = $request->amount + $request->old_balance;

        if ($amount_to_deposite < 100 || $amount_to_deposite > 50000) {
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
            return back()->with('failed', "#$amount_to_deposite is an invalid amount minimum deposit is #100 and Maximunm is #50,000");
        }

        $amount = UserAccount::where('user_id', $user->id)->update([
            'account_balance' => $amount_to_deposited
        ]);


        if ($amount) {
            // This is the code that saves the transcation History if it successed

            // I will hard code it for now and implent the form later
            if ($amount_to_deposite >= 100) {
                $transaction_history = TransactionHistory::create(
                    [
                        'user_id' => $user->id,
                        'transaction_type' => "Credit",
                        'payment_method' => "Bank Transfer",
                        'amount' => $amount_to_deposite,
                        'status' => "success"
                    ]
                );
            }

            return back()->with('message', "$amount_to_deposite was deposited to your account successfully");
        } else {

            return back()->with('message_error', "The deposit of $amount_to_deposite to your account failed");
        }
    }


    public function buy_data()
    {
        $user = User::where('id', '=', session('User'))->first();

        return view('User.buy_data')->with("user", $user);
    }

    public function buy_airtime()
    {
        $user = User::where('id', '=', session('User'))->first();

        return view('User.buy_airtime')->with("user", $user);
    }
    public function Withdraw()
    {
    }


    public function add_bank_account(UserBankDetialsRequest $request)
    {

        $request->validated();

        $user = User::where('id', '=', session('User'))->first();

        $add_account_detials = UserAdditionalInfo::create(
            [
                'user_id' => $user->id,
                'bank_name' => $request->bank_name,
                'account_number' => $request->account_number,
                'account_name' => $request->account_name,
            ]
        );


        if ($add_account_detials) {
            return back()->with('success', 'Bank Account details created Successfully');
        } else {
            return true;
        }
    }
}
