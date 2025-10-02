<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pinjam extends Model
{
    protected $fillable = ['anggotas_id', 'bukus_id', 'tanggal_pinjam', 'tanggal_kembali'];
    protected $appends = ['denda'];

    public function anggotas()
    {
        return $this->belongsTo(Anggota::class, 'anggotas_id');
    }

    public function bukus()
    {
        return $this->belongsTo(Buku::class, 'bukus_id');
    }

    public function getDendaAttribute()
    {
        $limit = Carbon::parse($this->tanggal_pinjam)->addDays(7);
        $now = $this->tanggal_kembali ? Carbon::parse($this->tanggal_kembali) : now();
        $lateDays = $now->gt($limit) ? $limit->diffInDays($now) : 0;

        return $lateDays * 5000;
    }
}
