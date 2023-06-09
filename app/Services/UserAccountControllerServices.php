<?php

namespace App\Services;

use App\Models\User;

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
}
