<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Akun extends Authenticatable
{
    protected $table = 'masyarakat';
    protected $primaryKey = 'NIK';
    public $incrementing = false; // karena NIK bukan auto increment
    protected $keyType = 'string'; // karena NIK char/string

    protected $fillable = [
        'NIK',
        'nama',
        'username',
        'password',
        'telp'
    ];
}
