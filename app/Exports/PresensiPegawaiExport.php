<?php

namespace App\Exports;

use App\Models\presensiPegawai;
use Maatwebsite\Excel\Concerns\FromCollection;

class PresensiPegawaiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return presensiPegawai::all();
    }
}
