<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => "required|email",
            "password" => "required",
        ]);

        $email = $request->email;
        $password = $request->password;

        $checkEmail = Admin::where('email', $email)->first();
        if (!$checkEmail) {
            return redirect()->back()->with('error', 'Email Not Found.');
        }

        ///check password
        $checkPassword = Hash::check($password, $checkEmail->password);
        if (!$checkPassword) {
            return redirect()->back()->with('error', 'Wrong Password');
        }

        auth()->guard('admin')->login($checkEmail);
        return redirect('/admin')->with('success', 'Welcome ' . auth()->guard('admin')->user()->name);
    }


    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('/');
    }
}
