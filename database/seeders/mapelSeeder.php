<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mapel; // Ensure the Mapel model is imported correctly
use App\Models\MataPelajaran;

class mapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MataPelajaran::insert([
            [
                'nama_pelajaran' => 'Matematika',
                'tingkat_kelas' => 'Kelas 5',
            ],
            [
                'nama_pelajaran' => 'Bahasa Indonesia',
                'tingkat_kelas' => 'Kelas 3',
            ],
            [
                'nama_pelajaran' => 'Pjok',
                'tingkat_kelas' => 'Kelas 4',
            ],
            [
                'nama_pelajaran' => 'Agama Islam',
                'tingkat_kelas' => 'Kelas 2',
            ],
        ]);
    }
}
