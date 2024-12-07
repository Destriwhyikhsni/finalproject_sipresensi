<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PresensiPegawai;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    public function clockIn(Request $request)
    {
        $user = Auth::user(); // Dapatkan pengguna login

        // Cari data presensi berdasarkan pengguna login dan tanggal hari ini
        $presensi = PresensiPegawai::where('id_pegawai', $user->pegawai_id)
            ->where('tanggal_presensi', Carbon::now('Asia/Jakarta')->toDateString())
            ->first();

        if (!$presensi) {
            // Buat data presensi baru jika belum ada
            PresensiPegawai::create([
                'id_pegawai' =>  $user->pegawai_id,
                'nama_pegawai' =>  $user->name,
                'tanggal_presensi' => Carbon::now('Asia/Jakarta')->toDateString(),
                'waktu_masuk' => Carbon::now('Asia/Jakarta')->toTimeString(),
                'location' => $request->input('location', 'Unknown'),
            ]);

            return redirect()->back()->with('success', 'Clock In berhasil!');
        }

        return redirect()->back()->with('error', 'Anda sudah melakukan Clock In hari ini.');
    }

    public function clockOut(Request $request)
    {
        $user = Auth::user(); // Dapatkan pengguna login

        // Cari data presensi berdasarkan pengguna login dan tanggal hari ini
        $presensi = PresensiPegawai::where('id_pegawai', $user->pegawai_id)
            ->where('tanggal_presensi', Carbon::now('Asia/Jakarta')->toDateString())
            ->first();

        if ($presensi && $presensi->waktu_keluar == null) {
            // Update waktu keluar
            $presensi->update([
                'waktu_keluar' => Carbon::now('Asia/Jakarta')->toTimeString(),
            ]);

            return redirect()->back()->with('success', 'Clock Out berhasil!');
        }

        return redirect()->back()->with('error', 'Anda belum Clock In atau sudah Clock Out hari ini.');
    }
}
