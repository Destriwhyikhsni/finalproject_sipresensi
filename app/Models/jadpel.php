<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadpel extends Model
{
    use HasFactory;

    protected $table = 'jadpel';
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

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'id_jadwal');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas', 'id_kelas');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_guru', 'id_pegawai');
    }
}
