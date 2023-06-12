<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        //check email
        $findUser = User::where('email', $request->email)->first();
        if (!$findUser) {
            return redirect()->back()->with('error', 'Email Not Found.');
        }
        //check password
        $checkPassword = Hash::check($request->password, $findUser->password);
        if (!$checkPassword) {
            return redirect()->back()->with('error', 'Wrong Password.');
        }
        //login
        auth()->login($findUser);
        return redirect('/')->with('success', 'Welcome ' . auth()->user()->name);
    }
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        //check email
        $findUser = User::where('email', $request->email)->first();
        if ($findUser) {
            return redirect()->back()->with('error', 'Email Already Exist');
        }

        $createdUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        auth()->login($createdUser);
        return redirect('/')->with('success', 'Welcome ' . auth()->user()->name);
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
