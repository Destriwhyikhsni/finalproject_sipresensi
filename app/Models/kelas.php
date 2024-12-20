<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = [
        'nama_kelas',
        'wali_kelas',
    ];

    // Relasi dengan Pegawai (Wali Kelas)
    public function waliKelas()
    {
        return $this->belongsTo(Pegawai::class, 'wali_kelas', 'id_pegawai');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas');
    }
}
