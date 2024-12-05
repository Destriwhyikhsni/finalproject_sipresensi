<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = [
        'nisn',
        'nama_siswa',
        'kelas',
        'jenis_kelamin',
        'tahun_ajaran',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_telp'
    ];

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'nomor_identitas');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas', 'id_kelas');
    }    
}
