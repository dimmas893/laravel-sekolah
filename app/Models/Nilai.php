<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilais';
    protected $guarded = [];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'ujian_id', 'id');
    }
    
       public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
