<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class siswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();  // Mengambil siswa beserta relasi kelas
        return view('siswa', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();  // Ambil semua kelas untuk pilihan di form
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:siswa,nisn',
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'tahun_ajaran' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')
                         ->with('success', 'Data Siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();  // Ambil semua kelas untuk pilihan di form
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required|unique:siswa,nisn,' . $id,
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'tahun_ajaran' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);
    
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
    
        return redirect()->route('siswa.index')
                         ->with('success', 'Data Siswa berhasil diperbarui.');
    }    

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')
                         ->with('success', 'Data Siswa berhasil dihapus.');
    }
}
