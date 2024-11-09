<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class pegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai', compact('pegawai'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:pegawai|max:20',
            'nama_pegawai' => 'required|max:100',
            'jenis_pegawai' => 'required|in:guru,staf',
            'mata_pelajaran' => 'nullable|max:100',
            'tempat_lahir' => 'required|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_telp' => 'required|max:20',
            'email' => 'required|email|unique:pegawai',
        ]);

        Pegawai::create($request->all());

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }
    
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nip' => 'required|unique:pegawai,nip,' . $id . ',id_pegawai',
            'nama_pegawai' => 'required|max:100',
            'jenis_pegawai' => 'required|in:guru,staf',
            'mata_pelajaran' => 'nullable|max:100',
            'tempat_lahir' => 'required|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_telp' => 'required|max:20',
            'email' => 'required|email|unique:pegawai,email,' . $id . ',id_pegawai',
        ]);
    
        // Cari pegawai berdasarkan ID dan update data
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->update($request->all());
    
        // Redirect ke halaman pegawai dengan pesan sukses
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui.');
    }
    

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus');
    }
}
