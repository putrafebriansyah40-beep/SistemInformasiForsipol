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
        Schema::table('users', function (Blueprint $table) {
            $table->string('jurusan')->nullable()->after('nim');
            $table->string('program_studi')->nullable()->after('jurusan');
            $table->boolean('lulus_simba')->default(false)->after('is_verified');
            $table->boolean('lulus_panda')->default(false)->after('lulus_simba');
            $table->boolean('lulus_imt')->default(false)->after('lulus_panda');
            $table->boolean('lulus_mukhayyam')->default(false)->after('lulus_imt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'jurusan',
                'program_studi',
                'lulus_simba',
                'lulus_panda',
                'lulus_imt',
                'lulus_mukhayyam',
            ]);
        });
    }
};
