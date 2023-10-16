<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{

    public function login()
    {
        return view('login.login');
    }

    public function loginStore()
    {
        $cleanData = request()->validate([
            'email' => ['required', Rule::exists('users', 'email')],
            'password' => ['required', 'min:8'],

        ]);
        if (auth()->attempt([
            'email' => $cleanData['email'],
            'password' => $cleanData['password']
        ])) {
            return redirect('/')->with('success', 'Welcome back ' . auth()->user()->name);
        } else {
            return redirect('/login')->withErrors([
                'password' => 'Password is something wrong'
            ])->withInput();
        }
    }

    public function register()
    {
        return view('register.create');
    }

    public function registerStore()
    {
        $cleanData = request()->validate([
            'name' => ['required', 'max:20'],
            'username' => ['required', 'max:20', Rule::unique('users', 'username')],
            'email' => ['required', 'max:20', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8'],

        ], [
            'name.max' => "Not more than 20 characters."
        ]);
        
        $cleanData = array_merge($cleanData, ['admin'=> 0]);
        //  
        $user = User::create($cleanData);

        auth()->login($user);

        return redirect('/')->with('success', 'Welcome from creativecoder. ' . auth()->user()->name);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
