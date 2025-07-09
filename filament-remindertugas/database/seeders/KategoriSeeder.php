<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategoris')->insert([
            [
                'name' => 'Praktikum',
                'color' => 'red',
                'description' => 'Tugas praktikum untuk mata kuliah tertentu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teori',
                'color' => 'blue',
                'description' => 'Tugas teori mingguan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Proyek',
                'color' => 'green',
                'description' => 'Tugas proyek akhir semester',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ujian',
                'color' => 'yellow',
                'description' => 'Tugas ujian tengah semester',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laporan',
                'color' => 'purple',
                'description' => 'Tugas laporan penelitian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Diskusi',
                'color' => 'orange',
                'description' => 'Tugas diskusi kelompok',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Presentasi',
                'color' => 'cyan',
                'description' => 'Tugas presentasi materi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kuis',
                'color' => 'brown',
                'description' => 'Tugas kuis online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
