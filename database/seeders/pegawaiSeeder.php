<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class pegawaiSeeder extends Seeder
{
    public function run()
    {
        Pegawai::insert([
            [
                'nip' => '196501021987092001',
                'nama_pegawai' => 'Nildawati A.md',
                'jenis_pegawai' => 'guru',
                'mata_pelajaran' => 'Agama Islam',
                'tempat_lahir' => 'Panggal-Panggal',
                'tanggal_lahir' => '1982-05-14',
                'alamat' => null,
                'no_telp' => '085783150726',
                'email' => 'nildw@gmail.com',
            ],
            [
                'nip' => '196801101990092002',
                'nama_pegawai' => 'Yunamah S.pd',
                'jenis_pegawai' => 'Guru',
                'mata_pelajaran' => null,
                'tempat_lahir' => 'Panggal-Panggal',
                'tanggal_lahir' => '1968-01-10',
                'alamat' => null,
                'no_telp' => '085788763225',
                'email' => 'yunamah@gmail.com',
            ],
            [
                'nip' => '196809674432107651',
                'nama_pegawai' => 'Eka Mayasari S.pd',
                'jenis_pegawai' => 'Staf',
                'mata_pelajaran' => null,
                'tempat_lahir' => 'Baturaja',
                'tanggal_lahir' => '1988-06-27',
                'alamat' => null,
                'no_telp' => '081234229081',
                'email' => 'Ekamayy@gmail.com',
            ],
            [
                'nip' => '191098927666534110',
                'nama_pegawai' => 'Suryansyah',
                'jenis_pegawai' => 'Staf',
                'mata_pelajaran' => null,
                'tempat_lahir' => 'Panggal-Panggal',
                'tanggal_lahir' => '1993-10-20',
                'alamat' => null,
                'no_telp' => '0857622234580',
                'email' => 'suryansayh@gmail.com',
            ]
        ]);
    }
}
