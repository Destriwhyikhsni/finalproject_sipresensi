<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi';
    protected $primaryKey = 'id_presensi';
    protected $fillable = [
        'nomor_identitas',
        'id_jadwal',
        'tanggal_presensi',
        'waktu_masuk',
        'waktu_keluar',
        'status_presensi',
        'keterangan'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nomor_identitas');
    }

    public function jadpel()
    {
        return $this->belongsTo(JadPel::class, 'id_jadwal');
    }
}
