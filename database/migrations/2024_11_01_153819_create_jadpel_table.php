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
        Schema::create('jadpel', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->foreignId('id_guru')->constrained('pegawai', 'id_pegawai')->onDelete('cascade');
            $table->foreignId('id_mapel')->constrained('mapel', 'id_mapel')->onDelete('cascade');
            $table->foreignId('id_kelas')->constrained('kelas', 'id_kelas')->onDelete('cascade');
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);             
            $table->time('jam_mulai');             
            $table->time('jam_selesai');             
            $table->string('ruangan', 50);            
            $table->enum('status_jadwal', ['Aktif', 'Batal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadpel');
    }
};
