<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pinjam;

class PinjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pinjam::create([
        'idanggota' => 1,
        'idbuku' => 1,
        'tglpinjam' => now(),
        'tglkembali' => now()->addDays(7)
        ]);
    }
}
