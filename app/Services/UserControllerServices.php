<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserControllerServices
{
    public function store_service($request)
    {
        $user = User::create(
            [
                'username' => $request->username,
                'full_name' => $request->full_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number
            ]
        );
        $user->userAccount()->create([
            'user_id' => $user->id,
            'account_balance' => 0,
        ]);
    }


    public function check_service($request)
    {
        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password,)) {
                $request->session()->put('User', $user->id);
                $output = redirect(route('user.dashboard'));
            } else {
                $output = back()->with('failed', 'wrong Password');
            }
        } else {
            $output = back()->with("failed", "No account found for $request->email");
        }

        return $output;
    }
}
