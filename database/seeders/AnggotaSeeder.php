<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Anggota;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Anggota::create([
        'nama' => 'Ali',
        'alamat' => 'Jl. Raya',
        'nohp' => '08123',
        'tgl_lahir' => '2000-01-01'
        ]);
    }
}
