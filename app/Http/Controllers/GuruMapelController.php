<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruMapelController extends Controller
{
    public function nilai()
    {
        //menampilkan nilai
        $setting = Setting::first(); //mengambil data2 yang berlangsung 
        $tahun = $setting->id_tahun_ajaran; //mengambil data berdasarkan tahun ajaran yang berlangsung
        $guru = Guru::where('id_user', Auth::user()->id)->first(); //mengambil data guru berdasarkan user yang login
        $mata_pelajaran = Jadwal::where('guru_id', $guru->id)->whereHas('kelasget', function ($q) use ($tahun) {
            $q->where('id_tahun_ajaran', $tahun);
        })->select('mata_pelajaran_id')->groupBy('mata_pelajaran_id')->get(); //mengambil data jadwal berdasarkan tahun ajaran sedang berjalan
        return view('guru.mapel.index', compact('mata_pelajaran', 'tahun', 'guru'));
    }
}
