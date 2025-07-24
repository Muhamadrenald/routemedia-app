<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Klien;

class KlienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Klien::create(['paket_internet_id' => 1, 'nama_klien' => 'Budi Santoso', 'alamat' => 'Jl. Merdeka No. 10', 'no_whatsapp' => '081234567890', 'foto_ktp' => 'dummy/ktp.jpg']);
        Klien::create(['paket_internet_id' => 2, 'nama_klien' => 'Citra Lestari', 'alamat' => 'Jl. Pahlawan No. 5', 'no_whatsapp' => '081234567891', 'foto_ktp' => 'dummy/ktp.jpg']);
        Klien::create(['paket_internet_id' => 3, 'nama_klien' => 'Doni Firmansyah', 'alamat' => 'Jl. Sudirman Kav. 25', 'no_whatsapp' => '081234567892', 'foto_ktp' => 'dummy/ktp.jpg']);
        Klien::create(['paket_internet_id' => 1, 'nama_klien' => 'Eka Wahyuni', 'alamat' => 'Jl. Gatot Subroto No. 12', 'no_whatsapp' => '081234567893', 'foto_ktp' => 'dummy/ktp.jpg']);
    }
}
