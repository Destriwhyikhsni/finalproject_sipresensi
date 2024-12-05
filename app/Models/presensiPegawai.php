<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiPegawai extends Model
{
    use HasFactory;

    protected $table = 'presensi_pegawai';
    protected $primaryKey = 'id_presensi_pegawai';

    protected $fillable = [
        'id_pegawai',
        'nama_pegawai',
        'tanggal_presensi',
        'waktu_masuk',
        'waktu_keluar',
        'location',
    ];
}