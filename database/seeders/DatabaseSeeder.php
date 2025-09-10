<?php

namespace Database\Seeders;

use App\Models\Akun;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Petugas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Akun::create([
        //     'NIK' => '3456789012345678',
        //     'nama' => 'Masyarakat User',
        //     'username' => 'masyarakatuser',
        //     'password' => 'masyarakatpass', // Password tanpa hash
        //     'telp' => '083456789012',
        // ]);
        // Petugas::create([
        //     'nama_petugas' => 'AdminSatu',
        //     'username' => 'admin1',
        //     'password' => 'adminpass1',
        //     'telp' => '081111111111',
        //     'level' => 'admin',
        // ]);
        Petugas::create([
            'nama_petugas' => 'PetugasSatu',
            'username' => 'petugas1',
            'password' => '123',
            'telp' => '081111111111',
            'level' => 'petugas',
        ]);
    }
}


