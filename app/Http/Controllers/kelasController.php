<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Kelas;
use Illuminate\Http\Request;

class kelasController extends Controller
{
    // Menampilkan Daftar Kelas
public function index()
    {
        $kelas = Kelas::with(['waliKelas', 'siswa'])->get(); // Mengambil semua kelas beserta wali kelasnya
        return view('kelas', compact('kelas'));
    }

    // Menampilkan Form Tambah Kelas
    public function create()
    {
        $waliKelas = Pegawai::all(); // Mengambil data pegawai untuk wali kelas
        return view('kelas.create', compact('waliKelas'));
    }

    // Menyimpan Data Kelas
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|max:100',
            'wali_kelas' => 'required|exists:pegawai,id_pegawai',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan');
    }

    // Menampilkan Form Edit Kelas
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $waliKelas = Pegawai::all(); // Mengambil data pegawai untuk wali kelas
        return view('kelas.edit', compact('kelas', 'waliKelas'));
    }

    // Mengupdate Data Kelas
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|max:100',
            'wali_kelas' => 'required|exists:pegawai,id_pegawai',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diperbarui');
    }

    // Menghapus Data Kelas
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus');
    }
}
