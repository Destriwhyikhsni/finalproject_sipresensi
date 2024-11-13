<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';
    protected $primaryKey = 'id_mapel';
    protected $fillable = [
        'nama_mapel',
        'tingkat_kelas'
    ];

    public function jadpel()
    {
        return $this->hasMany(jadpel::class, 'id_mapel');
    }
}
