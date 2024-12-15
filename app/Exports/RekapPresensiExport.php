<?php

namespace App\Exports;

use App\Models\PresensiPegawai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapPresensiExport implements FromView
{
    protected $rekapPresensi;

    public function __construct($rekapPresensi)
    {
        $this->rekapPresensi = $rekapPresensi;
    }

    /**
     * Export data menggunakan view Blade.
     */
    public function view(): View
    {
        return view('exports.rekap_presensi', [
            'rekapPresensi' => $this->rekapPresensi
        ]);
    }
}