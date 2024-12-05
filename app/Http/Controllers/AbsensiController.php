<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Support\Facades\Auth; // Menggunakan facade Auth yang benar
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        // Mendapatkan data user yang sedang login
        $user = Auth::user();

        // Mengambil data absensi dengan relasi pegawai
        $absensies = Absensi::with('pegawai') // Menampilkan data pegawai yang terkait dengan absensi
                            ->orderBy('tanggal', 'desc')
                            ->get();

        // Mengirim data absensi ke view
        return view('absensi.index', compact('absensies'));
    }
}
