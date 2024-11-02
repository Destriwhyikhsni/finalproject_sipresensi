<?php

use App\Models\jadpel;
use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = [
        'nama_kelas',
        'wali_kelas'
    ];

    public function waliKelas()
    {
        return $this->belongsTo(Pegawai::class, 'wali_kelas');
    }

    public function jadpel()
    {
        return $this->hasMany(jadpel::class, 'id_kelas');
    }
}

