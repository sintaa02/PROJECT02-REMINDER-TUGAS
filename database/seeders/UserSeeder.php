<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role admin dan user kalau belum ada
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);
        // Buat admin
        $admin = User::create([
            'name' => 'kelompok05',
            'email' => 'kelompok05@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('admin');
        // Buat user biasa
        $user = User::create([
            'name' => 'Restu',
            'email' => 'restu@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole('user');
    }
}
