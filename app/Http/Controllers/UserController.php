<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function Clogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('username', 'password');
        if (auth()->guard('user')->attempt($credentials)) {
            $user = auth()->guard('user')->user();
            
            $request->session()->regenerate();
            
            session([
                'role' => $user->role,
                'username' => $user->username
            ]);
            
            return redirect()->intended('dashboard');
        }
        
        return redirect('/login')->with('error', 'Username / password salah');
    }
    public function dashboard()
    {
        if (!auth()->guard('user')->check()) {
            return view('dashboard');
        }
        return view('login');
    }
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect('/login')->with('success', 'kamu berhasil logout.');
    }
}
