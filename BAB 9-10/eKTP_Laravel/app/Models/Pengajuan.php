<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';
    public $incrementing = true;   // <-- tambahkan ini
    protected $keyType = 'int';    // <-- dan ini
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'tanggal_lahir',
        'foto',
        'foto_kk',
        'status'
    ];
}
