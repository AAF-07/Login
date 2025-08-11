<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'tgl_pengaduan',
        'NIK',
        'isi_laporan',
        'foto',
        'status',
    ];
}
