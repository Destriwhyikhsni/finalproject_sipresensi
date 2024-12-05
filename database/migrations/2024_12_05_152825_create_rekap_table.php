<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('absensies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas'); // kolom siswa_id merujuk ke tabel siswa
            $table->string('status'); // Misal: 'Hadir', 'Sakit', 'Izin'
            $table->date('tanggal');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap');
    }
};
