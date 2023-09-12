<?php

namespace App\Http\Controllers;

use App\Models\Kumpul_Tugas;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function pemberiannilaitugas(Request $request)
    {
        //pemberian nilai
        $kumpultugas = Kumpul_Tugas::where('id', $request->kumpultugas_id)->first(); //mengambil data kumpul tugas berdasarkan id
        $kumpultugas->update([
            'nilai_tugas' => $request->nilai_tugas
        ]); //update data
        return back();
    }
}
