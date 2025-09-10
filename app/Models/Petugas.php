<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_petugas',
        'nama_petugas',
        'username',
        'password',
        'telp',
        'level'
    ];
}
