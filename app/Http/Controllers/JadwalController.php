<?php

namespace App\Http\Controllers;

use App\Models\Jadpel;
use App\Models\Pegawai;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadpel::with(['guru', 'mapel', 'kelas'])->get();
        return view('jadwal', compact('jadwals'));
    }

    public function create()
    {
        $gurus = Pegawai::all();
        $mapels = Mapel::all();
        $kelas = Kelas::all();
        return view('jadwal.create', compact('gurus', 'mapels', 'kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_guru' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruangan' => 'required|string|max:50',
            'status_jadwal' => 'required|in:Aktif,Batal',
        ]);

        Jadpel::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Jadpel $jadwal)
    {
        $gurus = Pegawai::all();
        $mapels = Mapel::all();
        $kelas = Kelas::all();
        return view('jadwal.edit', compact('jadwal', 'gurus', 'mapels', 'kelas'));
    }

    public function update(Request $request, Jadpel $jadwal)
    {
        $request->validate([
            'id_guru' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruangan' => 'required|string|max:50',
            'status_jadwal' => 'required|in:Aktif,Batal',
        ]);

        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadpel $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
