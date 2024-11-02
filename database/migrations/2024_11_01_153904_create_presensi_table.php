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
        Schema::create('presensi', function (Blueprint $table) {
            $table->id('id_presensi');
            $table->foreignId('nomor_identitas')->constrained('siswa', 'id_siswa')->onDelete('cascade');
            $table->foreignId('id_jadwal')->constrained('jadpel', 'id_jadwal')->onDelete('cascade');
            $table->date('tanggal_presensi');
            $table->time('waktu_masuk')->nullable();
            $table->time('waktu_keluar')->nullable();
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
        Schema::dropIfExists('presensi');
    }
};
