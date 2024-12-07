<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PresensiSiswa;
use App\Models\Jadpel;
use App\Models\Kelas;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PresensiSiswaController extends Controller
{
    // Menampilkan halaman presensi dan jadwal mengajar
    public function index(Request $request)
    {
        $user = Auth::user();
        $pegawaiId = $user->pegawai_id;

        $jadpel = Jadpel::with('pegawai')
            ->where('id_guru', $pegawaiId)
            ->get();
        $jadwal = null;
        $students = [];

        if ($request->has('jadwal_id')) {
            $jadwal = Jadpel::with('mapel', 'kelas')->find($request->jadwal_id);

            if ($jadwal) {
                $students = Siswa::with('kelas')
                    ->where('kelas', $jadwal->id_kelas)
                    ->get();
            }
        }

        return view('presensi', compact('jadpel', 'jadwal', 'students'));
    }

    // Menyimpan data presensi siswa ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jadwal_id' => 'required|exists:jadpel,id_jadwal',
            'status_presensi' => 'required|array',
            'status_presensi.*' => 'required|in:Hadir,Sakit,Izin,Alfa',
            'keterangan' => 'nullable|array',
            'keterangan.*' => 'nullable|string',
        ]);
        $jadwal = Jadpel::findOrFail($request->jadwal_id);

        $kelas = Kelas::where('id_kelas', $jadwal->id_kelas)->first();


        // Loop untuk menyimpan presensi setiap siswa
        foreach ($request->status_presensi as $siswa_id => $status) {
            $siswa = Siswa::findOrFail($siswa_id);

            PresensiSiswa::create([
                'jadwal' => $request->jadwal_id,
                'kelas' => $kelas->id_kelas,
                'siswa' => $siswa->id_siswa,
                'nomor_identitas' => $siswa->nisn,
                'nama_siswa' => $siswa->nama_siswa,
                'nama_kelas' => $kelas->nama_kelas,
                'tanggal_presensi' => Carbon::now('Asia/Jakarta')->toDateString(),
                'status_presensi' => $status,
                'keterangan' => $request->keterangan[$siswa_id] ?? null,
            ]);
        }

        return redirect()->route('presensi.index')->with('success', 'Presensi berhasil disimpan!');
    }
}
