<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use app\Models\User;

class LoginController extends Controller
{

    public function index(Request $request)
    {
        if (auth::check()) {
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
                'email' => 'required|email:dns',
                'password' => 'required'
            ],
            [
                'email.required' => 'Email tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard/admin');
        }
        return redirect()->back()->withInput()->with('error', 'Periksa Kembali Email atau password anda');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
}
