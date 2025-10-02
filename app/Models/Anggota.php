<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = ['nama','alamat','nohp','tgl_lahir'];

    public function info(){
        return "Anggota: $this->nama, Telp:$this->nohp";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
