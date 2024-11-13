<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Kelas; // Import model Kelas jika perlu

class siswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mendapatkan id_kelas untuk kelas 1 (atau kelas lain yang ada)
        $kelas1 = Kelas::where('nama_kelas', 'Kelas 1')->first();  // Sesuaikan nama kelas jika perlu

        // Menambahkan data siswa
        Siswa::create([
            'nisn' => '1234567890',
            'nama_siswa' => 'Budi Santoso',
            'kelas' => $kelas1->id_kelas, // Relasi dengan id_kelas
            'jenis_kelamin' => 'laki-laki',
            'tahun_ajaran' => '2024/2025',
            'tempat_lahir' => 'Palembang',
            'tanggal_lahir' => '2010-05-15',
            'alamat' => 'Jalan Merdeka No. 10, Palembang, Sumatera Selatan',
            'no_telp' => '082112345678',
        ]);

        Siswa::create([
            'nisn' => '1234567891',
            'nama_siswa' => 'Siti Aisyah',
            'kelas' => $kelas1->id_kelas, 
            'jenis_kelamin' => 'perempuan',
            'tahun_ajaran' => '2024/2025',
            'tempat_lahir' => 'Palembang',
            'tanggal_lahir' => '2010-07-22',
            'alamat' => 'Jalan Kenanga No. 20, Palembang, Sumatera Selatan',
            'no_telp' => '082112345679',
        ]);

        Siswa::create([
            'nisn' => '1234567892',
            'nama_siswa' => 'Andi Pratama',
            'kelas' => $kelas1->id_kelas, 
            'jenis_kelamin' => 'laki-laki',
            'tahun_ajaran' => '2024/2025',
            'tempat_lahir' => 'Palembang',
            'tanggal_lahir' => '2010-08-30',
            'alamat' => 'Jalan Pahlawan No. 15, Palembang, Sumatera Selatan',
            'no_telp' => '082112345680',
        ]);

        Siswa::create([
            'nisn' => '1234567893',
            'nama_siswa' => 'Dewi Lestari',
            'kelas' => $kelas1->id_kelas, 
            'jenis_kelamin' => 'perempuan',
            'tahun_ajaran' => '2024/2025',
            'tempat_lahir' => 'Palembang',
            'tanggal_lahir' => '2010-12-01',
            'alamat' => 'Jalan Raya No. 25, Palembang, Sumatera Selatan',
            'no_telp' => '082112345681',
        ]);

        Siswa::create([
            'nisn' => '1234567894',
            'nama_siswa' => 'Joko Widodo',
            'kelas' => $kelas1->id_kelas, 
            'jenis_kelamin' => 'laki-laki',
            'tahun_ajaran' => '2024/2025',
            'tempat_lahir' => 'Palembang',
            'tanggal_lahir' => '2010-11-10',
            'alamat' => 'Jalan Sejahtera No. 30, Palembang, Sumatera Selatan',
            'no_telp' => '082112345682',
        ]);
    }
}
