<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = [
        'nip',
        'nama_pegawai',
        'jenis_pegawai',
        'mata_pelajaran',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_telp',
        'email'
    ];

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'wali_kelas');
    }

    public function jadpel()
    {
        return $this->hasMany(JadPel::class, 'id_guru', 'id_pegawai');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'pegawai_id', 'id_pegawai');
    }
}
