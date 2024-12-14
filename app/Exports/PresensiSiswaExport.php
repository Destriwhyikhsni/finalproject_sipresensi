<?php

namespace App\Exports;

use App\Models\presensiSiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PresensiSiswaExport implements FromCollection, WithHeadings
{

    protected $jadwal_id;

    public function __construct($jadwal_id)
    {
        $this->jadwal_id = $jadwal_id;
    }

    public function collection()
    {
        return presensiSiswa::where('jadwal', $this->jadwal_id)
            ->join('siswa', 'presensi_siswa.siswa', '=', 'siswa.id_siswa')
            ->select(
                'siswa.nama_siswa as Nama Siswa',
                'siswa.nisn as Nomor Identitas',
                'presensi_siswa.status_presensi as Status Kehadiran',
                'presensi_siswa.keterangan as Keterangan'
            )
            ->get();
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Nomor Identitas',
            'Status Kehadiran',
            'Keterangan',
        ];
    }
}
