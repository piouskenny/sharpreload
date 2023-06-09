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
        $this->UserAccountControllerServices = new UserAccountControllerServices;
        $output = $this->UserAccountControllerServices->deposit_request($request);
        return $output;
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
        // Function to withdraw money into users account
    }

    public function add_bank_account(UserBankDetialsRequest $request)
    {
        $request->validated();
        $this->UserAccountControllerServices = new UserAccountControllerServices;
        $output = $this->UserAccountControllerServices->add_bank_account($request);

        if ($output) {
            return back()->with('success', 'Bank Account details created Successfully');
        } else {
            return true;
        }
    }
}
