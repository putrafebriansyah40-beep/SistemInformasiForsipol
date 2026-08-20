<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // SQLite tidak support ALTER COLUMN untuk enum,
        // jadi kita buat kolom baru, copy data, hapus lama, rename
        Schema::table('users', function (Blueprint $table) {
            $table->string('role_new')->default('member')->after('role');
        });

        DB::table('users')->update(['role_new' => DB::raw('role')]);

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('role_new', 'role');
        });
    }

    public function down(): void
    {
        // Revert: sama saja, string sudah kompatibel
    }
};
