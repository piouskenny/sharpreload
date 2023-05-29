<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UsersignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function account()
    {
        return view('User.account');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.signup');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(UsersignupRequest $request)
    {
        $request->validated();


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
        


        return redirect()->route('user.login')->with('success', 'Account created Successfully');
    }



    public function login()
    {
        return view('User.login');
    }


    public function check(UserLoginRequest $request)
    {
        $request->validated();

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password,)) {
                $request->session()->put('User', $user->id);
                return redirect(route('user.dashboard'));
            } else {
                return back()->with('failed', 'wrong Password');
            }
        } else {
            return back()->with("failed", "No account found for $request->email");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = User::where('id', '=', session('User'))->first();

        if (!$user->pin) {
            return view('User.pin_page')->with('user', $user);
        }

        return view('user.index')->with('user', $user);
    }

    public function profile()
    {
        $user = User::where('id', '=', session('User'))->first();

        if (!$user->pin) {
            return view('User.pin_page')->with('user', $user);
        }



        return view('User.profile')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        if (session()->has('User')) {
            session()->pull('User');
            return view('user.login');
        }
    }
}
