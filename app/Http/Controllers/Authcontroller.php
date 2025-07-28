<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    public function ShowLoginForm(){
        return view('login');
    }
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // ambil user dari tabel akun
        $akun = Akun::where('nama', $username)
                    ->where('password', $password) // langsung cocokkan tanpa hash
                    ->first();

        if ($akun) {
            // login manual
            Auth::login($akun);
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); 

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
