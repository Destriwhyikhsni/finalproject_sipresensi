<?php
namespace App\Http\Controllers;

use App\Models\Jadpel;
use App\Models\Presensi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    // Show the form to select the schedule
    public function index(Request $request)
    {
        // Get the selected jadwal (schedule)
        $jadwal = Jadpel::find($request->jadwal_id);
    
        if ($jadwal) {
            // Fetch the students that belong to the class for the selected schedule
            // $students = Siswa::where('kelas_id', $jadwal->id_kelas)->get();
            $students = Siswa::where('kelas', $jadwal->kelas->nama_kelas)->get();

        } else {
            // No jadwal selected or found
            $students = collect(); // Empty collection
        }
    
        $jadpel = Jadpel::all(); // Correctly fetch all jadpel

        // Pass the jadwal and students to the view
        return view('presensi', compact('jadwal', 'students', 'jadpel'));
    }

    // Show students for the selected jadpel
    public function showPresensiForm($id_jadwal)
    {
        // Fetch the jadwal (schedule)
        $jadwal = Jadpel::findOrFail($id_jadwal);

        // Fetch students based on the selected class
        // $students = Siswa::where('kelas_id', $jadwal->id_kelas)->get();
        $students = Siswa::where('kelas', $jadwal->kelas->nama_kelas)->get();

        return view('presensi.show', compact('jadwal', 'students'));
    }

    // Save the presensi (attendance)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jadwal_id' => 'required',
            'siswa_id' => 'required|array',
            'status_presensi' => 'required|array',
            'keterangan' => 'nullable|array',
        ]);

        // Loop through each student and save their attendance
        foreach ($request->siswa_id as $index => $siswa_id) {
            // Create the presensi record for each student
            Presensi::create([
                'nomor_identitas' => $siswa_id,
                'id_jadwal' => $request->jadwal_id,
                'status_presensi' => $request->status_presensi[$index],
                'keterangan' => $request->keterangan[$index] ?? null,
                'tanggal_presensi' => now(),
            ]);
        }

        return redirect()->route('presensi.index')->with('success', 'Presensi has been saved successfully!');
    }
}
