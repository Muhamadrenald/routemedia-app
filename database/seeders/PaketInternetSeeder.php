<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaketInternet;

class PaketInternetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaketInternet::create(['nama_paket' => 'Home Basic', 'harga' => 250000, 'kecepatan' => '20 Mbps']);
        PaketInternet::create(['nama_paket' => 'Home Pro', 'harga' => 350000, 'kecepatan' => '50 Mbps']);
        PaketInternet::create(['nama_paket' => 'Home Gamer', 'harga' => 500000, 'kecepatan' => '100 Mbps']);
        PaketInternet::create(['nama_paket' => 'Office Biz', 'harga' => 750000, 'kecepatan' => '150 Mbps']);
    }
}
