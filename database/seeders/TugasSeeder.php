<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Tugas;
use App\Models\User;
use App\Models\Kategori;
use App\Models\MataKuliah;
use App\Models\Dosen;

class TugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all(); // ambil semua user
        $kategori = Kategori::first(); // ambil kategori pertama
        $mataKuliah = MataKuliah::where('nama', 'Algoritma dan Pemrograman')->first(); // cari berdasarkan nama
        $dosen = Dosen::first(); // ambil dosen pertama

        foreach ($users as $user) {
            Tugas::insert([
                [
                    'user_id' => $user->id,
                    'judul' => 'Tugas Algoritma dan Pemrograman',
                    'mata_kuliah_id' => $mataKuliah->id,
                    'deskripsi' => 'Buat program sederhana menggunakan bahasa pemrograman Python',
                    'deadline' => Carbon::now()->addDays(7),
                    'kategori_id' => $kategori->id, // Asumsi kategori_id sudah ada
                    'status' => 'baru',
                    'ingatkan_pada' => Carbon::now()->addDays(6),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $user->id,
                    'judul' => 'Tugas Basis Data',
                    'mata_kuliah_id' => $mataKuliah->id,
                    'deskripsi' => 'Buat skema basis data untuk sistem perpustakaan',
                    'deadline' => Carbon::now()->addDays(10),
                    'kategori_id' => $kategori->id, // Asumsi kategori_id sudah ada
                    'selesai' => 'proses',
                    'ingatkan_pada' => Carbon::now()->addDays(9),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $user->id,
                    'judul' => 'Tugas Jaringan Komputer',
                    'mata_kuliah_id' => $mataKuliah->id,
                    'deskripsi' => 'Deskripsikan topologi jaringan yang digunakan di kampus',
                    'deadline' => Carbon::now()->addDays(5),
                    'kategori_id' => $kategori->id, // Asumsi kategori_id sudah ada
                    'selesai' => 'selesai',
                    'ingatkan_pada' => Carbon::now()->addDays(4),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $user->id,
                    'judul' => 'Tugas Sistem Operasi',
                    'mata_kuliah_id' => $mataKuliah->id,
                    'deskripsi' => 'Jelaskan konsep multitasking pada sistem operasi modern',
                    'deadline' => Carbon::now()->addDays(8),
                    'kategori_id' => $kategori->id, // Asumsi kategori_id sudah ada
                    'selesai' => 'selesai',
                    'ingatkan_pada' => Carbon::now()->addDays(7),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $user->id,
                    'judul' => 'Tugas Pemrograman Web',
                    'mata_kuliah_id' => $mataKuliah->id,
                    'deskripsi' => 'Buat halaman web sederhana menggunakan HTML dan CSS',
                    'deadline' => Carbon::now()->addDays(12),
                    'kategori_id' => $kategori->id, // Asumsi kategori_id sudah ada
                    'selesai' => 'baru',
                    'ingatkan_pada' => Carbon::now()->addDays(11),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

    }
}
