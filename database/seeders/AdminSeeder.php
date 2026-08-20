<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Muhamad Fajar',
            'email' => 'admin@forsipol.com',
            'password' => bcrypt('password'),
            'no_whatsapp' => '081234567890',
            'jenis_kelamin' => 'L',
            'role' => 'admin',
            'jabatan' => 'Ketua Umum',
            'departemen' => 'Presidium',
        ]);
    }
}
