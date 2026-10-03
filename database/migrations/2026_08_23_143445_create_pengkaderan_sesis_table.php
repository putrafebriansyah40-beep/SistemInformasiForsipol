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
        Schema::create('pengkaderan_sesis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengkaderan_id')->constrained()->cascadeOnDelete();
            $table->string('nama_sesi');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai')->nullable();
            $table->string('kode_absen')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengkaderan_sesis');
    }
};
