<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mata_kuliahs')->insert([
            [
                'nama' => 'Algoritma dan Pemrograman',
                'kode' => 'MK001',
                'sks' => 3,
                'deskripsi' => 'Dasar algoritma dan logika pemrograman.',
                'dosen_id' => 1, // Misna Asqia
            ],
            [
                'nama' => 'Basis Data',
                'kode' => 'MK002',
                'sks' => 4,
                'deskripsi' => 'Pengantar basis data dan SQL.',
                'dosen_id' => 5, // Syaiful Romadhon
            ],
            [
                'nama' => 'Jaringan Komputer',
                'kode' => 'MK003',
                'sks' => 4,
                'deskripsi' => 'Konsep dasar jaringan komputer.',
                'dosen_id' => 3, // Maulana Fakih Latief
            ],
            [
                'nama' => 'Pemrograman Web 02',
                'kode' => 'MK004',
                'sks' => 4,
                'deskripsi' => 'Pengembangan aplikasi web menggunakan PHP dan MySQL.',
                'dosen_id' => 4, // Edo Riansyah
            ],
            [
                'nama' => 'Komunikasi Efektif',
                'kode' => 'MK005',
                'sks' => 2,
                'deskripsi' => 'Keterampilan komunikasi dalam konteks profesional.',
                'dosen_id' => 7, // Krisna Panji
            ],
            [
                'nama' => 'UI/UX',
                'kode' => 'MK006',
                'sks' => 4,
                'deskripsi' => 'Mendesain antarmuka pengguna yang efektif dan menarik.',
                'dosen_id' => 1, //Misna Asqia
            ],
            [
                'nama' => 'PPKN',
                'kode' => 'MK007',
                'sks' => 2,
                'deskripsi' => 'Pendidikan Pancasila dan Kewarganegaraan.',
                'dosen_id' => 8, // Sapto Waluyp
            ],
            [
                'nama' => 'Statistik dan Probabilitas',
                'kode' => 'MK008',
                'sks' => 3,
                'deskripsi' => 'Statistik dasar dan konsep probabilitas.',
                'dosen_id' => 2, // Jayadin
            ],
            [
                'nama' => 'Bahasa Inggris',
                'kode' => 'MK009',
                'sks' => 2,
                'deskripsi' => 'Pengantar bahasa Inggris untuk komunikasi profesional.',
                'dosen_id' => 6, // Chintia Handayani
            ],

        ]);
    }
}
