<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presensiSiswa extends Model
{
    use HasFactory;

    protected $table = 'presensi_siswa';
    protected $primaryKey = 'id_presensi_siswa';

    protected $fillable = [
        'jadwal',
        'kelas',
        'siswa',
        'nomor_identitas',
        'nama_siswa',
        'tanggal_presensi',
        'status_presensi',
        'keterangan'
    ];

    // Relasi ke model Jadpel
    public function jadpel()
    {
        return $this->belongsTo(Jadpel::class, 'jadwal', 'id_jadwal');
    }

    // Relasi ke model Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }    

    // Relasi ke model Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa', 'id_siswa');
    }
}
