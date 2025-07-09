<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        Dosen::insert([
            [
                'nama' => 'Misna Asqia, S.Kom., M.Kom.',
                'nip' => '0110124051',
                'email' => 'misnaasqia@gmail.com',
                'gender' => 'P',
                'alamat_rumah' => 'Jl. Kenanga No. 12, Depok',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Jayadin, S.Si., M.M.',
                'nip' => '0110124052',
                'email' => 'jayadin@gmail.com',
                'alamat_rumah' => 'Jl. Melati No. 5, Jakarta',
                'gender' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Maulana Fakih Latief, S.Si., M.Si.',
                'nip' => '0110124053',
                'email' => 'FakihLatief@gmail.com',
                'alamat_rumah' => 'Jl. Mawar No. 3, Bogor',
                'gender' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Edo Riansyah, S.Kom.',
                'nip' => '0110124054',
                'email' => 'EdoRiansyah@gmail.com',
                'alamat_rumah' => 'Jl. Melati No. 3, Bogor',
                'gender' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Muh. Syaiful Romadhon, S.Kom., M.Kom.',
                'nip' => '0110124055',
                'email' => 'SyaifulRomadhon@gmail.com',
                'alamat_rumah' => 'Jl. Anggrek No. 8, Tangerang',
                'gender' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Chintia Handayani, S.S., M.Sas.',
                'nip' => '0110124056',
                'email' => 'ChintiaHandayani@gmail.com',
                'alamat_rumah' => 'Jl. Anggrek No. 8, Tangerang',
                'gender' => 'P',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Krisna Panji, S.Kom., M.M.',
                'nip' => '0110124057',
                'email' => 'krisnapanji@gmail.com',
                'alamat_rumah' => 'Jl. Kenanga No. 12, Depok',
                'gender' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Drs. Sapto Waluyo, M.Sc.',
                'nip' => '0110124058',
                'email' => 'saptowaluyo@gmail.com',
                'alamat_rumah' => 'Jl. Melati No. 5, Jakarta',
                'gender' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
