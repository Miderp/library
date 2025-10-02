<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = ['judul','pengarang','tahun_terbit','jenis_buku'];

    public function info(){
        return "Buku = $this->judul oleh $this pengarang($this->tahun_terbit)";
    }
}
