<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Pinjam;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function showData()
    {
        $buku = new Buku([
            'judul' => 'Laravel Guide',
            'pengarang' => 'John Doe',
            'tahun_terbit' => 2023,
            'jenis_buku' => 'Teknologi'
        ]);

        $anggota = new Anggota([
            'nama' => 'Ali',
            'alamat' => 'Jl. Raya',
            'nohp' => '08123',
            'tgl_lahir' => '2000-01-01'
        ]);

        $pinjam = new Pinjam([
            'idanggota' => 1,
            'idbuku' => 1,
            'tglpinjam' => now(),
            'tglkembali' => now()->addDays(7)
        ]);

        $items = [$buku, $anggota, $pinjam];

        foreach ($items as $item) {
            echo $item->info() . '<br>';
        }
    }
}
