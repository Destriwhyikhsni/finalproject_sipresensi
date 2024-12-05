<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('presensi_siswa', function (Blueprint $table) {
            $table->id('id_presensi_siswa');
            $table->foreignId('jadwal')->constrained('jadpel', 'id_jadwal')->onDelete('cascade');
            $table->foreignId('kelas')->constrained('kelas', 'id_kelas')->onDelete('cascade');
            $table->foreignId('siswa')->constrained('siswa', 'id_siswa')->onDelete('cascade');
            $table->string('nomor_identitas', 50);
            $table->string('nama_siswa', 60);
            $table->string('nama_kelas', 20);
            $table->date('tanggal_presensi');
            $table->enum('status_presensi', ['Hadir', 'Sakit', 'Izin', 'Alfa']);             
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi_siswa');
    }
};