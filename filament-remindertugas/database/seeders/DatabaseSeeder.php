<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\TugasSeeder;
use Database\Seeders\DosenSeeder;
use Database\Seeders\MataKuliahSeeder;
use Database\Seeders\KategoriSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call([
            UserSeeder::class,
            DosenSeeder::class,
            MataKuliahSeeder::class,
            KategoriSeeder::class,
            TugasSeeder::class,
        ]);
    }
}
