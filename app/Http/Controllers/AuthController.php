<?php

namespace Tinder\Http\Controllers;

use Auth;
use Tinder\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getSignUp()
    {
        return view('auth.signup');
    }

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users|email|max:255',
            'username' => 'required|unique:users|alpha_dash|max:20',
            'password' => 'required|min:6',
        ]);

        User::create([
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password'))
        ]);

        return redirect()
                    ->route('home')
                    ->withInfo('Your account has been created and you can now sign in');
    }

    public function getSignIn()
    {
        return view('auth.signin');
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $authStatus = Auth::attempt($request->only(['email', 'password']), $request->has('remember'));
        if (!$authStatus) {
            return redirect()->back()->with('info', 'Invalid Email or Password');
        }

        return redirect()->route('home')->with('info', 'You are now signed in');
    }

    public function getSignOut()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
