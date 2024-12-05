<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class kelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::insert([
            [
                'nama_kelas' => 'Kelas 1',
                'wali_kelas' => 1,
            ],
            [
                'nama_kelas' => 'Kelas 2',
                'wali_kelas' => 1,
            ],
            [
                'nama_kelas' => 'Kelas 3',
                'wali_kelas' => 1,
            ],
            [
                'nama_kelas' => 'Kelas 4',
                'wali_kelas' => 1,
            ],
            [
                'nama_kelas' => 'Kelas 5',
                'wali_kelas' => 1,
            ],
            [
                'nama_kelas' => 'Kelas 6',
                'wali_kelas' => 1,
            ],
        ]);
    }
}
