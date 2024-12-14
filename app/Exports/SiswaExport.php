<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::select('nisn', 'nama_siswa', 'kelas', 'jenis_kelamin', 'tahun_ajaran', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'no_telp')->get();
    }

    public function headings(): array
    {
        return ['NISN', 'Nama Siswa', 'Kelas', 'Jenis Kelamin', 'Tahun Ajaran', 'Tempat Lahir', 'Tanggal Lahir', 'Alamat', 'Nomor Telpon'];
    }
}
