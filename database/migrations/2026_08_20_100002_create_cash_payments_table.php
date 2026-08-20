<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cash_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('bulan');           // 1-12
            $table->integer('tahun');           // e.g. 2026
            $table->integer('jumlah');          // nominal (Rp)
            $table->enum('status', ['Lunas', 'Belum Lunas'])->default('Belum Lunas');
            $table->date('tanggal_bayar')->nullable();
            $table->foreignId('recorded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'bulan', 'tahun']); // satu user hanya 1 record per bulan
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cash_payments');
    }
};
