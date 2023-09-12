<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seleksi extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'seleksi';

    public function pendaftaranseleksi()
    {
        return $this->belongsTo(PendaftaranSeleksi::class, 'id', 'tanggalseleksi_id');
    }
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id', 'id');
    }
}
