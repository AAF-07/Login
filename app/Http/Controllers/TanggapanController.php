<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function create($id_pengaduan)
    {
        $pengaduan = Pengaduan::findOrFail($id_pengaduan);
        return view('admin.tanggapan.create', compact('pengaduan'));
    }

    public function store(Request $request, $id_pengaduan)
    {
        $request->validate([
            'tanggapan' => 'required|string'
        ]);

        Tanggapan::create([
            'id_pengaduan' => $id_pengaduan,
            'tgl_tanggapan' => now(),
            'tanggapan' => $request->tanggapan,
            'id_petugas' => auth()->guard('petugas')->id(),
        ]);

        // update status pengaduan
        $pengaduan = Pengaduan::findOrFail($id_pengaduan);
        $pengaduan->status = 'proses';
        $pengaduan->save();

        $akun = Petugas::find(auth()->guard('petugas')->id());

        if($akun->level === 'admin'){
            return redirect('/admin')->with('success', 'Tanggapan berhasil dikirim!');
        }else{
            return redirect('/petugas')->with('success', 'Tanggapan berhasil dikirim!');
        }
    }
}
