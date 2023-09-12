<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuRelasiKategori extends Model
{
    use HasFactory;
    protected $table = 'buku_relasi_kategoris';
    protected $guarded = [];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }

    public function buku_kategori()
    {
        return $this->belongsTo(Buku_Kategori::class, 'buku_kategori_id', 'id');
    }
}
