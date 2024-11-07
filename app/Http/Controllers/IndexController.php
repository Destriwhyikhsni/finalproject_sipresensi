<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function authBeranda() 
    { 
        return view('web.beranda', [ 
            'judul' => 'Halaman Beranda',
        ]); } }

