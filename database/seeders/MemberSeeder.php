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
                'email' => 'mfajar@forsipol.com',
                'password' => Hash::make('forsipol2401022012'),
                'jenis_kelamin' => 'L', 'role' => 'admin',
                'jabatan' => 'Ketua Umum', 'departemen' => 'Presidium',
                'angkatan' => '2024', 'is_verified' => true,
            ],
            // ── NO 2: Ketua Keputrian
            [
                'name' => 'Tania Mardevri Yanti', 'nim' => '2411122025',
                'email' => 'tmardevri@forsipol.com',
                'password' => Hash::make('forsipol2411122025'),
                'jenis_kelamin' => 'P', 'role' => 'admin',
                'jabatan' => 'Ketua Keputrian', 'departemen' => 'Presidium',
                'angkatan' => '2024', 'is_verified' => true,
            ],
            // ── NO 3: Sekretaris Umum
            [
                'name' => 'Ilham Alfajri', 'nim' => '2501033027',
                'email' => 'ialfajri@forsipol.com',
                'password' => Hash::make('forsipol2501033027'),
                'jenis_kelamin' => 'L', 'role' => 'admin',
                'jabatan' => 'Sekretaris Umum', 'departemen' => 'Presidium',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 4: Bendahara Umum → role bendahara
            [
                'name' => 'Viandini', 'nim' => '2501093010',
                'email' => 'viandini@forsipol.com',
                'password' => Hash::make('forsipol2501093010'),
                'jenis_kelamin' => 'P', 'role' => 'bendahara',
                'jabatan' => 'Bendahara Umum', 'departemen' => 'Presidium',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 5: Koordinator KPSDM
            [
                'name' => 'Anrian Jabari Maulana', 'nim' => '2411092021',
                'email' => 'ajmaulana@forsipol.com',
                'password' => Hash::make('forsipol2411092021'),
                'jenis_kelamin' => 'L', 'role' => 'admin',
                'jabatan' => 'Koordinator', 'departemen' => 'Departemen KPSDM',
                'angkatan' => '2024', 'is_verified' => true,
            ],
            // ── NO 6: Koordinator Akhwat KPSDM
            [
                'name' => 'Fadhila Rahmi', 'nim' => '2411022008',
                'email' => 'frahmi@forsipol.com',
                'password' => Hash::make('forsipol2411022008'),
                'jenis_kelamin' => 'P', 'role' => 'admin',
                'jabatan' => 'Koordinator Akhwat', 'departemen' => 'Departemen KPSDM',
                'angkatan' => '2024', 'is_verified' => true,
            ],
            // ── NO 7: Koordinator Biro Humas & Kestari
            [
                'name' => 'Fauzan Alamsyah', 'nim' => '2511141013',
                'email' => 'falamsyah@forsipol.com',
                'password' => Hash::make('forsipol2511141013'),
                'jenis_kelamin' => 'L', 'role' => 'admin',
                'jabatan' => 'Koordinator', 'departemen' => 'Departemen Biro Humas & Kestari',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 8: Koordinator Akhwat Biro Humas & Kestari
            [
                'name' => 'Syifa Amelia', 'nim' => '2501042005',
                'email' => 'samelia@forsipol.com',
                'password' => Hash::make('forsipol2501042005'),
                'jenis_kelamin' => 'P', 'role' => 'admin',
                'jabatan' => 'Koordinator Akhwat', 'departemen' => 'Departemen Biro Humas & Kestari',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 9: Koordinator Syi'ar Islam
            [
                'name' => 'Muhammad Rohil Hafzi', 'nim' => '2511083023',
                'email' => 'mrhafzi@forsipol.com',
                'password' => Hash::make('forsipol2511083023'),
                'jenis_kelamin' => 'L', 'role' => 'admin',
                'jabatan' => 'Koordinator', 'departemen' => "Departemen Syi'ar Islam",
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 10: Koordinator Akhwat Syi'ar Islam
            [
                'name' => 'Hashifah Yuliani', 'nim' => '2511042005',
                'email' => 'hyuliani@forsipol.com',
                'password' => Hash::make('forsipol2511042005'),
                'jenis_kelamin' => 'P', 'role' => 'admin',
                'jabatan' => 'Koordinator Akhwat', 'departemen' => "Departemen Syi'ar Islam",
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 11: Koordinator Multimedia
            [
                'name' => 'Haikal Amanatullah', 'nim' => '2511161030',
                'email' => 'hamanatullah@forsipol.com',
                'password' => Hash::make('forsipol2511161030'),
                'jenis_kelamin' => 'L', 'role' => 'admin',
                'jabatan' => 'Koordinator', 'departemen' => 'Departemen Multimedia',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 12: Koordinator Akhwat Multimedia
            [
                'name' => 'Absa Fadila', 'nim' => '2511161013',
                'email' => 'afadila@forsipol.com',
                'password' => Hash::make('forsipol2511161013'),
                'jenis_kelamin' => 'P', 'role' => 'admin',
                'jabatan' => 'Koordinator Akhwat', 'departemen' => 'Departemen Multimedia',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 13: Koordinator Produksi
            [
                'name' => 'Raffi Alfatah', 'nim' => '2511101011',
                'email' => 'ralfatah@forsipol.com',
                'password' => Hash::make('forsipol2511101011'),
                'jenis_kelamin' => 'L', 'role' => 'admin',
                'jabatan' => 'Koordinator', 'departemen' => 'Departemen Produksi',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 14: Koordinator Akhwat Produksi
            [
                'name' => 'Naylika Khayira Abi Manez', 'nim' => '2511162012',
                'email' => 'nkmanez@forsipol.com',
                'password' => Hash::make('forsipol2511162012'),
                'jenis_kelamin' => 'P', 'role' => 'admin',
                'jabatan' => 'Koordinator Akhwat', 'departemen' => 'Departemen Produksi',
                'angkatan' => '2025', 'is_verified' => true,
            ],
            // ── NO 15: Koordinator Akhwat Keputrian
            [
                'name' => 'Nuzuli Rizka Karimah', 'nim' => '2511142004',
                'email' => 'nrkarimah@forsipol.com',
                'password' => Hash::make('forsipol2511142004'),
                'jenis_kelamin' => 'P', 'role' => 'admin',
                'jabatan' => 'Koordinator Akhwat', 'departemen' => 'Departemen Keputrian',
                'angkatan' => '2025', 'is_verified' => true,
            ],

            // ═══════════════════════════════════════
            // ANGGOTA — role: member (NO 16–58)
            // ═══════════════════════════════════════

            ['name' => 'Mahmud Aldira',          'nim' => '2501041009', 'email' => 'maldira@forsipol.com',       'password' => Hash::make('forsipol2501041009'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Raafi Alka Muhammadi',   'nim' => '2501092008', 'email' => 'ramuhammadi@forsipol.com',   'password' => Hash::make('forsipol2501092008'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Muhammad Dzaki',          'nim' => '2401012045', 'email' => 'mdzaki@forsipol.com',        'password' => Hash::make('forsipol2401012045'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Muhammad Razin Afif',     'nim' => '2411053008', 'email' => 'mrazinafif@forsipol.com',   'password' => Hash::make('forsipol2411053008'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Kaspul Asral',            'nim' => '2301031015', 'email' => 'kasral@forsipol.com',        'password' => Hash::make('forsipol2301031015'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Agung Saputra',           'nim' => '2311133008', 'email' => 'asaputra@forsipol.com',      'password' => Hash::make('forsipol2311133008'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Qotrin Nada',             'nim' => '2511102012', 'email' => 'qnada@forsipol.com',         'password' => Hash::make('forsipol2511102012'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Nadiatul Akila',          'nim' => '2401061022', 'email' => 'nakila@forsipol.com',        'password' => Hash::make('forsipol2401061022'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Nurlaili Jamili',         'nim' => '2410193010', 'email' => 'njamili@forsipol.com',       'password' => Hash::make('forsipol2410193010'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen KPSDM',                   'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Aria Kusuma Dewa',        'nim' => '2511152014', 'email' => 'akdewa@forsipol.com',        'password' => Hash::make('forsipol2511152014'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Biro Humas & Kestari',    'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Febriansyah Putra',       'nim' => '2411081030', 'email' => 'fputra@forsipol.com',        'password' => Hash::make('forsipol2411081030'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Biro Humas & Kestari',    'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Rozan Al Qitshi',         'nim' => '2401013058', 'email' => 'raqitshi@forsipol.com',      'password' => Hash::make('forsipol2401013058'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Biro Humas & Kestari',    'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Muhammad Ilham Asyazili', 'nim' => '2301052025', 'email' => 'miasyazili@forsipol.com',   'password' => Hash::make('forsipol2301052025'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Biro Humas & Kestari',    'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Yasmin Aziz',             'nim' => '2301011038', 'email' => 'yaziz@forsipol.com',         'password' => Hash::make('forsipol2301011038'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Biro Humas & Kestari',    'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Adinda Miza Juli Yanti',  'nim' => '2401091020', 'email' => 'amjyanti@forsipol.com',     'password' => Hash::make('forsipol2401091020'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Biro Humas & Kestari',    'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Issaturradiah',           'nim' => '2311141008', 'email' => 'issaturradiah@forsipol.com', 'password' => Hash::make('forsipol2311141008'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Biro Humas & Kestari',    'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Rizky Dwi Kurnia',        'nim' => '2501011008', 'email' => 'rdkurnia@forsipol.com',      'password' => Hash::make('forsipol2501011008'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2025', 'is_verified' => true],
            ['name' => "Muhammad As'ad",          'nim' => '2401011012', 'email' => 'masad@forsipol.com',         'password' => Hash::make('forsipol2401011012'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Muhammad Ardian Saputra', 'nim' => '2401101006', 'email' => 'madsaputra@forsipol.com',   'password' => Hash::make('forsipol2401101006'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'M Nabil',                 'nim' => '2411062004', 'email' => 'mnabil@forsipol.com',        'password' => Hash::make('forsipol2411062004'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Mohammad Syafiqri',       'nim' => '2301021018', 'email' => 'msyafiqri@forsipol.com',    'password' => Hash::make('forsipol2301021018'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Khairul Azmi',            'nim' => '2301021015', 'email' => 'kazmi@forsipol.com',         'password' => Hash::make('forsipol2301021015'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Syamil Basayef',          'nim' => '2311092034', 'email' => 'sbasayef@forsipol.com',      'password' => Hash::make('forsipol2311092034'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Wulandari Novia',         'nim' => '2501061001', 'email' => 'wnovia@forsipol.com',        'password' => Hash::make('forsipol2501061001'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Nurul Aidilia Fitri',     'nim' => '2411073011', 'email' => 'nafitri@forsipol.com',       'password' => Hash::make('forsipol2411073011'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Khairat Yatni',           'nim' => '2311021019', 'email' => 'kyatni@forsipol.com',        'password' => Hash::make('forsipol2311021019'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => "Departemen Syi'ar Islam",             'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Arif Adrian Saputra',     'nim' => '2511081020', 'email' => 'aadsaputra@forsipol.com',   'password' => Hash::make('forsipol2511081020'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Multimedia',               'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Muhammad Riski',          'nim' => '2511103011', 'email' => 'mriski@forsipol.com',        'password' => Hash::make('forsipol2511103011'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Multimedia',               'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Noval Rahmad',            'nim' => '2411163009', 'email' => 'nrahmad@forsipol.com',       'password' => Hash::make('forsipol2411163009'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Multimedia',               'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'M Najib Al Hafiz',        'nim' => '2411012027', 'email' => 'mnajibalhafiz@forsipol.com','password' => Hash::make('forsipol2411012027'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Multimedia',               'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Ilham Khaliq',            'nim' => '2411011024', 'email' => 'ikhaliq@forsipol.com',       'password' => Hash::make('forsipol2411011024'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Multimedia',               'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Gita Ditami',             'nim' => '2511101005', 'email' => 'gditami@forsipol.com',       'password' => Hash::make('forsipol2511101005'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Multimedia',               'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Hafizah Yusri',           'nim' => '2311141005', 'email' => 'hyusri@forsipol.com',        'password' => Hash::make('forsipol2311141005'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Multimedia',               'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Dafit Febi Febrianto',    'nim' => '2511121013', 'email' => 'dffebrianto@forsipol.com',  'password' => Hash::make('forsipol2511121013'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Produksi',                 'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Afuan Rahmat Ilahi',      'nim' => '2401093001', 'email' => 'arilahi@forsipol.com',       'password' => Hash::make('forsipol2401093001'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Produksi',                 'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Satrio Bagaskara',        'nim' => '2401122043', 'email' => 'sbagaskara@forsipol.com',   'password' => Hash::make('forsipol2401122043'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Produksi',                 'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Aldhi',                   'nim' => '2301022004', 'email' => 'aldhi@forsipol.com',         'password' => Hash::make('forsipol2301022004'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Produksi',                 'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Dzaky Haya Rahmanta',     'nim' => '2301092006', 'email' => 'dhrahmanta@forsipol.com',   'password' => Hash::make('forsipol2301092006'), 'jenis_kelamin' => 'L', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Produksi',                 'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Desi Rahmawati',          'nim' => '2501122019', 'email' => 'drahmawati@forsipol.com',   'password' => Hash::make('forsipol2501122019'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Produksi',                 'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Yerli Mafatna',           'nim' => '2311061022', 'email' => 'ymafatna@forsipol.com',     'password' => Hash::make('forsipol2311061022'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Produksi',                 'angkatan' => '2023', 'is_verified' => true],
            ['name' => 'Robiatul Adawiyah',       'nim' => '2511081025', 'email' => 'radawiyah@forsipol.com',    'password' => Hash::make('forsipol2511081025'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Keputrian',                'angkatan' => '2025', 'is_verified' => true],
            ['name' => 'Najla Iranda',            'nim' => '2401122018', 'email' => 'niranda@forsipol.com',       'password' => Hash::make('forsipol2401122018'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Keputrian',                'angkatan' => '2024', 'is_verified' => true],
            ['name' => 'Ike Nurjanah',            'nim' => '2311132012', 'email' => 'inurjanah@forsipol.com',    'password' => Hash::make('forsipol2311132012'), 'jenis_kelamin' => 'P', 'role' => 'member', 'jabatan' => 'Anggota', 'departemen' => 'Departemen Keputrian',                'angkatan' => '2023', 'is_verified' => true],
        ];

        foreach ($members as $data) {
            User::updateOrCreate(['nim' => $data['nim']], $data);
        }
    }
}
