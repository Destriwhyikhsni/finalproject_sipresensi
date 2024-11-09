<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function authBeranda() 
    { 
        return view('beranda', [ 
            'judul' => 'Halaman Beranda',
        ]); } }

