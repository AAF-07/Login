<?php
namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.akun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:masyarakat,username',
            'telp'     => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'telp'     => $request->telp,
            'password' => $request->password,
        ]);

        return redirect()->route('admin.akun')->with('success', 'Akun baru berhasil ditambahkan!');
    }

    public function index()
    {
        $akun = Petugas::all(); // ambil semua akun
        return view('admin.akun', compact('akun'));
    }
}

