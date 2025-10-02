<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Pinjam;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalAnggota = Anggota::count();
        $totalPinjam = Pinjam::count();

        return view ('dashboard',compact('totalBuku','totalAnggota','totalPinjam'));
    }
}
