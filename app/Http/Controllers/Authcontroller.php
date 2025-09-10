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
        $id = trim($request->input('id_petugas'));
        $password = trim($request->input('password'));

        if ($nik && $id) {
            return back()->withErrors(['login' => 'Isi hanya salah satu: NIK atau ID Petugas.']);
        }
        if (!$nik && !$id) {
            return back()->withErrors(['login' => 'Isi NIK atau ID Petugas.']);
        }

        if ($id) {
            $petugas = \App\Models\Petugas::where('id_petugas', $id)->first();
            if (!$petugas) {
                return back()->withErrors(['id_petugas' => 'ID tidak ditemukan di petugas']);
            }
            if ($petugas->password !== $password) {
                return back()->withErrors(['password' => 'Password salah']);
            }
            Auth::guard('petugas')->login($petugas);
            if ($petugas->level == 'admin') {
                return redirect('/admin');
            }
            return redirect('/petugas');
        }

        if ($nik) {
            $akun = \App\Models\Akun::where('NIK', $nik)->first();
            if (!$akun) {
                return back()->withErrors(['nik' => 'NIK tidak ditemukan di masyarakat']);
            }
            if ($akun->password !== $password) {
                return back()->withErrors(['password' => 'Password salah']);
            }
            Auth::guard('web')->login($akun);
            return redirect('/masyarakat');
        }
    }



    public function logout(Request $request)
    {
        if (Auth::guard('petugas')->check()) {
            Auth::guard('petugas')->logout();
        } else {
            Auth::logout();
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
