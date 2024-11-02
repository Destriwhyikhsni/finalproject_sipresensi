<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kelas;

class Jadpel extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pelajaran';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = [
        'id_guru',
        'id_mapel',
        'id_kelas',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruangan',
        'status_jadwal'
    ];

    public function guru()
    {
        return $this->belongsTo(Pegawai::class, 'id_guru');
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mapel');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'id_jadwal');
    }
}
