<?php

namespace App\Http\Controllers;

use App\Models\JenjangPendidikan;
use App\Models\Kelas;
use App\Models\Master_Kelas;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\Tingkatan;
use Illuminate\Http\Request;

class SiswaToKelasController extends Controller
{
    public function siswatokelas()
    {
        //halaman memilih tingkatan
        $tingkatan = Tingkatan::get(); //mengambil data tingkatan
        return view('siswatokelas.pilihjenjang', compact('tingkatan'));
    }

    public function siswatokelas_get(Request $request)
    {
        //halaman pembagian kelas
        $setting = Setting::first(); //mengambil data setting
        $jenjang_pendidikan_id = $request->jenjang_pendidikan_id;
        $siswa = Siswa::where('jenjang_pendidikan_id', $jenjang_pendidikan_id)->where('kelas', null)->get(); //mengambil data siswa berdasarkan tingkat dan berdasarkan kelas
        $kelas = Kelas::where('id_tahun_ajaran', $setting->id_tahun_ajaran)->whereHas('kelas', function ($q) use ($jenjang_pendidikan_id) {
            $q->where('jenjang_pendidikan_id', $jenjang_pendidikan_id);
        })->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung dan berdasarkan tingkatan
        $tampungsisa = [];
        foreach ($kelas as $p) {
            // dd($p['kelas']['jurusan']);
            $itungsiswa = $p['max'] - Siswa::where('kelas', $p->id)->count(); //menghitung siswa berdasarkan kelas
            $row['name'] = $p['kelas']['name'] . ' - ' .  $p['jurusan'];
            $row['sisa'] = $itungsiswa;
            array_push($tampungsisa, $row);
        }

        return view('siswatokelas.bagikelas', compact('siswa', 'tampungsisa'));
    }


    public function SimpanBagiKelas(Request $request)
    {
        //proses pembagian kelas
        $setting = Setting::first(); //mengambil data setting
        $tingkatan = $request->tingkatan_id;

        $tampungdata = [];
        if ($request['siswa_id']) {
            foreach ($request['siswa_id'] as $key => $value) {
                $this->SimpanMasukKelas($value, $setting->id_tahun_ajaran, $tingkatan);
            }

            // dd($tingkatan);
            // return back()->with('kelastidakada', 'l');
            return back();
        } else {
            return back()->with('siswatidakada', 'l');
        }
    }

    public function SimpanMasukKelas($idSiswa, $tahunAjaran, $tingkatan)
    {

        $tes = Siswa::where('id', $idSiswa)->first(); //mengambil data siswa berdasarkan id
        $tingkatan = $tingkatan;
        $dataKelas = Kelas::where('id_tahun_ajaran', $tahunAjaran)->with(['kelas'])
            ->whereHas('kelas', function ($q) use ($tingkatan) {
                $q->where('tingkatan_id', '=', $tingkatan);
            })
            ->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlaku dan berdasarkan tingkatan_id
        if ($dataKelas) {
            foreach ($dataKelas->where('jurusan', $tes->jurusan) as $isi) {
                if ($isi->rincianSiswa) {
                    if ($isi->max > $isi->rincianSiswa->count()) {
                        Siswa::where('id', $idSiswa)->where('jurusan', $isi->jurusan)->update(['kelas' => $isi->id]); //update data siswa berdasarkan id
                        return $isi->id;
                    }
                } else {
                    Siswa::where('id', $idSiswa)->where('jurusan', $isi->jurusan)->update(['kelas' => $isi->id]); //update data siswa
                    return $isi->id;
                }
            }
        } else {
            return back()->with('kelastidakada', 'l');
        }
    }
}
