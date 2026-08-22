<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Role assignment logic:
     * - admin     : Ketua Umum, Ketua Keputrian, Sekretaris Umum,
     *               semua Koordinator & Koordinator Akhwat
     * - bendahara : Bendahara Umum (bisa akses /bendahara routes)
     * - member    : semua Anggota
     *
     * Password default: forsipol + NIM  (contoh: forsipol2401022012)
     * Login: NIM + password
     */
    public function run(): void
    {
        $members = [
            // ── NO 1: Ketua Umum
            [
                'name' => 'Muhamad Fajar', 'nim' => '2401022012',
                'password' => Hash::make('12345678'),
                'jenis_kelamin' => 'L', 'role' => 'admin',
                'jabatan' => 'Ketua Umum', 'departemen' => 'Presidium',
                'angkatan' => '2024', 'is_verified' => true,
            ],
            // ── NO 2: Ketua Keputrian
            [
                'name' => 'Tania Mardevri Yanti', 'nim' => '2411122025',
                'password' => Hash::make('12345678'),
                'jenis_kelamin' => 'P', 'role' => 'admin',
                'jabatan' => 'Ketua Keputrian', 'departemen' => 'Presidium',
                'angkatan' => '2024', 'is_verified' => true,
            ],
            // ── NO 3: Sekretaris Umum
            [
                'name' => 'Ilham Alfajri', 'nim' => '2501033027',
                'password' => Hash::make('12345678'),
                'jenis_kelamin' => 'L', 'role' => 'admin',
                'jabatan' => 'Sekretaris Umum', 'departemen' => 'Presidium',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 4: Bendahara Umum → role bendahara
            [
                'name' => 'Viandini', 'nim' => '2501093010',
                'password' => Hash::make('12345678'),
                'jenis_kelamin' => 'P', 'role' => 'bendahara',
                'jabatan' => 'Bendahara Umum', 'departemen' => 'Presidium',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 5: Koordinator KPSDM
            [
                'name' => 'Anrian Jabari Maulana', 'nim' => '2411092021',
                'password' => Hash::make('12345678'),
                'jenis_kelamin' => 'L', 'role' => 'admin',
                'jabatan' => 'Koordinator', 'departemen' => 'Departemen KPSDM',
                'angkatan' => '2024', 'is_verified' => true,
            ],
            // ── NO 6: Koordinator Akhwat KPSDM
            [
                'name' => 'Fadhila Rahmi', 'nim' => '2411022008',
                'password' => Hash::make('12345678'),
                'jenis_kelamin' => 'P', 'role' => 'admin',
                'jabatan' => 'Koordinator Akhwat', 'departemen' => 'Departemen KPSDM',
                'angkatan' => '2024', 'is_verified' => true,
            ],
            // ── NO 7: Koordinator Biro Humas & Kestari
            [
                'name' => 'Fauzan Alamsyah', 'nim' => '2511141013',
                'password' => Hash::make('12345678'),
                'jenis_kelamin' => 'L', 'role' => 'admin',
                'jabatan' => 'Koordinator', 'departemen' => 'Departemen Biro Humas & Kestari',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 8: Koordinator Akhwat Biro Humas & Kestari
            [
                'name' => 'Syifa Amelia', 'nim' => '2501042005',
                'password' => Hash::make('12345678'),
                'jenis_kelamin' => 'P', 'role' => 'admin',
                'jabatan' => 'Koordinator Akhwat', 'departemen' => 'Departemen Biro Humas & Kestari',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 9: Koordinator Syi'ar Islam
            [
                'name' => 'Muhammad Rohil Hafzi', 'nim' => '2511083023',
                'password' => Hash::make('12345678'),
                'jenis_kelamin' => 'L', 'role' => 'admin',
                'jabatan' => 'Koordinator', 'departemen' => "Departemen Syi'ar Islam",
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 10: Koordinator Akhwat Syi'ar Islam
            [
                'name' => 'Hashifah Yuliani', 'nim' => '2511042005',
                'password' => Hash::make('12345678'),
                'jenis_kelamin' => 'P', 'role' => 'admin',
                'jabatan' => 'Koordinator Akhwat', 'departemen' => "Departemen Syi'ar Islam",
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 11: Koordinator Multimedia
            [
                'name' => 'Haikal Amanatullah', 'nim' => '2511161030',
                'password' => Hash::make('12345678'),
                'jenis_kelamin' => 'L', 'role' => 'admin',
                'jabatan' => 'Koordinator', 'departemen' => 'Departemen Multimedia',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 12: Koordinator Akhwat Multimedia
            [
                'name' => 'Absa Fadila', 'nim' => '2511161013',
                'password' => Hash::make('12345678'),
                'jenis_kelamin' => 'P', 'role' => 'admin',
                'jabatan' => 'Koordinator Akhwat', 'departemen' => 'Departemen Multimedia',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 13: Koordinator Produksi
            [
                'name' => 'Raffi Alfatah', 'nim' => '2511101011',
                'password' => Hash::make('12345678'),
                'jenis_kelamin' => 'L', 'role' => 'admin',
                'jabatan' => 'Koordinator', 'departemen' => 'Departemen Produksi',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 14: Koordinator Akhwat Produksi
            [
                'name' => 'Naylika Khayira Abi Manez', 'nim' => '2511162012',
                'password' => Hash::make('12345678'),
                'jenis_kelamin' => 'P', 'role' => 'admin',
                'jabatan' => 'Koordinator Akhwat', 'departemen' => 'Departemen Produksi',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 15: Koordinator Akhwat Keputrian
            [
                'name' => 'Nuzuli Rizka Karimah', 'nim' => '2511142004',
                'password' => Hash::make('12345678'),
                'jenis_kelamin' => 'P', 'role' => 'admin',
                'jabatan' => 'Koordinator Akhwat', 'departemen' => 'Departemen Keputrian',
                'angkatan' => '2025', 'is_verified' => true,
            ],

            // ═══════════════════════════════════════
            // ANGGOTA — role: member (NO 16–58)
            // ═══════════════════════════════════════

            ['name' => 'Mahmud Aldira',          'nim' => '2501041009', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Raafi Alka Muhammadi',   'nim' => '2501092008', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Muhammad Dzaki',          'nim' => '2401012045', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Muhammad Razin Afif',     'nim' => '2411053008', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Kaspul Asral',            'nim' => '2301031015', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Agung Saputra',           'nim' => '2311133008', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Qotrin Nada',             'nim' => '2511102012', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Nadiatul Akila',          'nim' => '2401061022', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Nurlaili Jamili',         'nim' => '2410193010', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Aria Kusuma Dewa',        'nim' => '2511152014', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Biro Humas & Kestari',    'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Febriansyah Putra',       'nim' => '2411081030', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Biro Humas & Kestari',    'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Rozan Al Qitshi',         'nim' => '2401013058', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Biro Humas & Kestari',    'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Muhammad Ilham Asyazili', 'nim' => '2301052025', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Biro Humas & Kestari',    'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Yasmin Aziz',             'nim' => '2301011038', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Biro Humas & Kestari',    'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Adinda Miza Juli Yanti',  'nim' => '2401091020', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Biro Humas & Kestari',    'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Issaturradiah',           'nim' => '2311141008', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Biro Humas & Kestari',    'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Rizky Dwi Kurnia',        'nim' => '2501011008', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2025', 'is_verified' => true],
            ['name' => "Muhammad As'ad",          'nim' => '2401011012', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Muhammad Ardian Saputra', 'nim' => '2401101006', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'M Nabil',                 'nim' => '2411062004', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Mohammad Syafiqri',       'nim' => '2301021018', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Khairul Azmi',            'nim' => '2301021015', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Syamil Basayef',          'nim' => '2311092034', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Wulandari Novia',         'nim' => '2501061001', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Nurul Aidilia Fitri',     'nim' => '2411073011', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Khairat Yatni',           'nim' => '2311021019', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Arif Adrian Saputra',     'nim' => '2511081020', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Multimedia',               'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Muhammad Riski',          'nim' => '2511103011', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Multimedia',               'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Noval Rahmad',            'nim' => '2411163009', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Multimedia',               'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'M Najib Al Hafiz',        'nim' => '2411012027', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Multimedia',               'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Ilham Khaliq',            'nim' => '2411011024', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Multimedia',               'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Gita Ditami',             'nim' => '2511101005', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Multimedia',               'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Hafizah Yusri',           'nim' => '2311141005', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Multimedia',               'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Dafit Febi Febrianto',    'nim' => '2511121013', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Produksi',                 'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Afuan Rahmat Ilahi',      'nim' => '2401093001', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Produksi',                 'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Satrio Bagaskara',        'nim' => '2401122043', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Produksi',                 'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Aldhi',                   'nim' => '2301022004', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Produksi',                 'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Dzaky Haya Rahmanta',     'nim' => '2301092006', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Produksi',                 'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Desi Rahmawati',          'nim' => '2501122019', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Produksi',                 'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Yerli Mafatna',           'nim' => '2311061022', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Produksi',                 'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Robiatul Adawiyah',       'nim' => '2511081025', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Keputrian',                'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Najla Iranda',            'nim' => '2401122018', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Keputrian',                'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Ike Nurjanah',            'nim' => '2311132012', 'password' => Hash::make('12345678'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Keputrian',                'angkatan' => '2023', 'is_verified' => true],
        ];

        foreach ($members as $data) {
            User::updateOrCreate(['nim' => $data['nim']], $data);
        }
    }
}
