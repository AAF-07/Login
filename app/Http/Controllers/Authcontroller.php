<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Authcontroller extends Controller
{
    public function ShowLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $nik = trim($request->input('nik'));
        $password = trim($request->input('password'));

        // cari user berdasarkan NIK
        $akun = Akun::where('NIK', $nik)->first();

        if (!$akun) {
            return back()->withErrors(['nik' => 'NIK tidak ditemukan']);
        }

        // cek password tanpa hash
        if ($akun->password !== $password) {
            return back()->withErrors(['password' => 'Password salah']);
        }

        // login manual
        Auth::login($akun);
        return redirect('/masyarakat');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
