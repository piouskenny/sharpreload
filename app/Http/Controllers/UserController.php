<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UsersignupRequest;
use App\Models\User;
use App\Services\UserControllerServices;

class UserController extends Controller
{

    public $userControllerServices;

    public function account()
    {
        return view('User.account');
    }

    public function create()
    {
        return view('User.signup');
    }

    public function store(UsersignupRequest $request)
    {
        $request->validated();
        $this->userControllerServices = new UserControllerServices;
        $this->userControllerServices->store_service($request);
        return redirect()->route('user.login')->with('success', 'Account created Successfully');
    }

    public function login()
    {
        return view('User.login');
    }


    public function check(UserLoginRequest $request)
    {
        $request->validated();
        $this->userControllerServices = new UserControllerServices;
        $output = $this->userControllerServices->check_service($request);
        return $output;
    }

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




    public function logout()
    {
        if (session()->has('User')) {
            session()->pull('User');
            return view('user.login');
        }
    }
}
