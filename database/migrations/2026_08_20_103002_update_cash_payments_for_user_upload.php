<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cash_payments', function (Blueprint $table) {
            $table->string('bukti_transfer')->nullable()->after('jumlah');
            $table->string('status_baru')->default('Belum Lunas')->after('status');
        });

        DB::table('cash_payments')->update(['status_baru' => DB::raw('status')]);

        Schema::table('cash_payments', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('cash_payments', function (Blueprint $table) {
            $table->renameColumn('status_baru', 'status');
        });
    }

    public function down(): void
    {
        Schema::table('cash_payments', function (Blueprint $table) {
            $table->dropColumn('bukti_transfer');
            // Untuk rollback ke versi awal
        });
    }
};
