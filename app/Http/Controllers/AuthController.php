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
        $user = User::whereEmail($cleanData['email'])->first();
        //Hash::check($cleanData['password'], $user->password)
        if (auth()->attempt([
            'email' => $cleanData['email'],
            'password' => $cleanData['password']
        ])) {
            auth()->login($user);
            return redirect('/');
        } else {
            return redirect('/login')->withErrors([
                'password' => 'Password is something wrong'
            ]);
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
        $user = User::create($cleanData);

        auth()->login($user);

        return redirect('/')->with('success', 'welcome from creativecoder.' . auth()->user()->name);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
