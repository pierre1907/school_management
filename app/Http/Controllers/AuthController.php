<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class AuthController extends Controller
{
    //

    public function login()
    {
        //$hashedValue = Hash::make('joSjyf-4divfa-johvyw');
        //dd($hashedValue);
        if (!empty(Auth::check())) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        //dd($request->all());


        $credentials = $request->only('email', 'password');

        $remenber = !empty($request->remember) ? true : false;
        if (Auth::attempt($credentials, $remenber)) {
            // Authentication passed...
            // return redirect()->intended('dashboard');
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('error', 'Email ou mot de passe incorrect');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
