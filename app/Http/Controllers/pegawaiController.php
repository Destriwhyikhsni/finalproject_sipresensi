<?php

namespace App\Http\Controllers;

use App\Exports\RekapPresensiExport;
use App\Models\Pegawai;
use App\Models\PresensiPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class pegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai', compact('pegawai'));
    }

    public function dashboard()
    {
        $user = Auth::user(); // Dapatkan pengguna login

        $presensi = PresensiPegawai::where('id_pegawai', $user->pegawai_id)
        ->where('tanggal_presensi', now()->toDateString())
        ->first();
        
        return view('dashboard', compact('presensi'));
    }

    public function rekapPresensi(Request $request)
    {
        $user = Auth::user();

        // Ambil filter bulan dan tahun, default ke bulan dan tahun ini
        $bulan = $request->input('bulan', now()->month);
        $tahun = $request->input('tahun', now()->year);

        // Ambil data presensi sesuai filter
        $rekapPresensi = PresensiPegawai::where('id_pegawai', $user->pegawai_id)
            ->whereYear('tanggal_presensi', $tahun)
            ->whereMonth('tanggal_presensi', $bulan)
            ->orderBy('tanggal_presensi', 'asc')
            ->get();

        return view('pegawai.recap', compact('rekapPresensi', 'bulan', 'tahun'));
    }

     // Fungsi untuk ekspor presensi
     public function exportPresensi(Request $request)
     {
         $user = Auth::user();
 
         $bulan = $request->input('bulan', now()->month);
         $tahun = $request->input('tahun', now()->year);
 
         // Ambil data presensi sesuai filter
         $rekapPresensi = PresensiPegawai::where('id_pegawai', $user->pegawai_id)
             ->whereYear('tanggal_presensi', $tahun)
             ->whereMonth('tanggal_presensi', $bulan)
             ->orderBy('tanggal_presensi', 'asc')
             ->get();
 
         return Excel::download(new RekapPresensiExport($rekapPresensi), "rekap_presensi_{$bulan}_{$tahun}.xlsx");
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
