<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kurikulum;
use App\Models\Mata_Pelajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    public function DetailPelajaran(Request $request)
    {
        //detail pelajaran
        $file_path = 'http://dapurkoding.my.id/';
        $jadwal = Jadwal::where('mata_pelajaran_id', (int)$request->mata_pelajaran_id)->get(); //mengambil data jadwal berdasarkan mata pelajaran
        $kurikulum = Kurikulum::where('mata_pelajaran_id', $request->mata_pelajaran_id)->where('tingkatan_id', $request->tingkatan)->get(); //mengambil data kurikulum berdasarkan mata pelajaran da tingkatan id
        $tampungkurikulum = [];
        foreach ($kurikulum as $kur) {
            $riw['nama'] = $kur['name'];
            $riw['link'] = $kur['link'];
            array_push($tampungkurikulum, $riw);
        }

        $JadwalSiswa = [];
        foreach ($jadwal as $jad) {
            $row['hari'] = $jad['hari']['name'];
            $row['jam'] = substr($jad['jam_masuk'], 0, 5) . '-' . substr($jad['jam_keluar'], 0, 5);
            array_push($JadwalSiswa, $row);
            $pengajar = Guru::where('id', $jad->guru_id)->first();
        }

        return response()->json(
            [
                "profil_pengajar" => [
                    'nama' => $pengajar->name,
                    'mulai_mengajar' => $pengajar->mulai_mengajar,
                    'avatar' =>  $file_path . 'guru/' . $pengajar->avatar,
                ],
                "jadwal" => $JadwalSiswa,
                "lampiran" => $tampungkurikulum
            ]
        );
    }
}
