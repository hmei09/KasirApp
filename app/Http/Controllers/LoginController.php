<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->intended('/admin/menu-page');
            } elseif ($user->role == 'kasir') {
                return redirect()->intended('/transaksi');
            }
        }
        return view('login.login');
    }

    // public function proses(Request $request)
    // {
    //     $request->validate([
    //         'username' => 'required',
    //         'password' => 'required'
    //     ],
    //     [
    //         'username.required' => 'Username Tidak Boleh Kosong',
    //     ]);

    //     $credentials = $request->only('username', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         $user = Auth::users();
    //         if ($user->role == 'admin') {
    //             return redirect()->intended('admin.menu.index');
    //         } elseif ($user->role == 'kasir') {
    //             return redirect()->intended('kasir.transaksi');
    //         }
    //     }

    //     return back()->withErrors([
    //         'username' => 'Username atau password salah'
    //     ])->withInput($request->only('username'));
    // }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    $user = Auth::user();
                    if ($user->role == 'admin') {
                        return redirect()->intended('/admin/dashboard')->with('success', 'Selamat Datang Paduka');
                    } elseif ($user->role == 'kasir') {
                        return redirect()->intended('/transaksi');
                    }
                }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
