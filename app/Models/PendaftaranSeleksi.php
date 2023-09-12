<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSeleksi extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran_seleksis';
    protected $guarded = [];

    public function seleksi()
    {
        return $this->belongsTo(Seleksi::class, 'seleksi_id', 'id');
    }

    public function tanggalseleksi()
    {
        return $this->belongsTo(TanggalSeleksi::class, 'tanggalseleksi_id', 'id');
    }
}
