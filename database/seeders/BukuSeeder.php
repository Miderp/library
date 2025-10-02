<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use APp\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Buku::create([
        'judul' => 'Pemrograman Laravel',
        'pengarang' => 'Andi',
        'tahun_terbit' => 2022,
        'jenis_buku' => 'Teknologi',
        ]);
    }
}
