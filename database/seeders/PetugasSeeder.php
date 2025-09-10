<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        Petugas::create([
            'nama_petugas' => 'AdminSatu',
            'username' => 'admin1',
            'password' => 'adminpass1',
            'telp' => '081111111111',
            'level' => 'admin',
        ]);
    }
}
