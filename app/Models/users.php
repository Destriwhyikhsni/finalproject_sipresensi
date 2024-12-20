<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'pegawai_id',
        'role',
        'status'
    ];

    protected $hidden = [
        'password'
    ];
}
