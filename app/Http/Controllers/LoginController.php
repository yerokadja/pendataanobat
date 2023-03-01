<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{

    public function index(Request $request)
    {
        if (auth::guard('apoteker')->check()) {
            return redirect()->route('/login');
        }
        return view('auth.login', [
            'title' => 'Login | Administrator',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Username tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
            ]
        );


        if (Auth::guard('apoteker')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
        return redirect()->back()->withInput()->with('error', 'Periksa Kembali Username atau password anda');
    }

    public function logout(Request $request)
    {
        Auth::guard('apoteker')->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
}
