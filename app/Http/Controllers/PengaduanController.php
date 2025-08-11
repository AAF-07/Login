<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tgl_pengaduan' => 'required|date',
            'isi_laporan' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pengaduan', 'public');
        }

        Pengaduan::create([
            'tgl_pengaduan' => $request->tgl_pengaduan,
            'NIK' => Auth::user()->NIK,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $fotoPath ?? '',
            'status' => '0',
        ]);

        return back()->with('success', 'Pengaduan berhasil dikirim!');
    }
}
