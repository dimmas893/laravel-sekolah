<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gambar_Kegiatan;
use App\Models\Kegiatan;
use App\Models\Lampiran_Kegiatans;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
   public function kegiatandetail(Request $request)
    {
        //menampilkan detail kegiatan
        $file_path = 'https://dapurkoding.my.id/';
        $kegiatan = Kegiatan::where('id', $request->id_kegiatan)->first(); //mengambil data kegiatan berdasarkan id
        if ($kegiatan) {
            $tampungkegiatan = [];
            $kegiatans['id'] = $kegiatan['id'];
            // $kegiatans['nama'] = $kegiatan['nama_kegiatan'];
            $kegiatans['tanggal'] = $kegiatan['tanggal'];
            $kegiatans['waktu'] = $kegiatan['jam_mulai'] . ' - ' . $kegiatan['jam_berakhir'];
            $kegiatans['deskripsi'] = $kegiatan['deskripsi'];
            $kegiatans['catatan'] = $kegiatan['catatan'];
            array_push($tampungkegiatan, $kegiatans);
            $kegiatans['contact_person']['nama'] = $kegiatan['nama'];
            $kegiatans['contact_person']['kontak'] = $kegiatan['kontak'];
            $kegiatans['contact_person']['jenis_kontak'] = $kegiatan['jenis_kontak'];
            $kegiatans['gambar'] = [];
            $kegiatans['lampiran'] = [];
            $gambarKegiatan = Gambar_Kegiatan::where('kegiatan_id', $kegiatan->id)->get(); //mengambil data gambar kegiatan berdasarkan kegiatan id
            if ($gambarKegiatan) {
                foreach ($gambarKegiatan as $gambar) {
                    array_push($kegiatans['gambar'], $file_path . 'kegiatan/' . $gambar['gambar']);
                }
            }
            $kegiatans['lampiran'] = [];
            $LampiranKegiatan = Lampiran_Kegiatans::where('kegiatan_id', $kegiatan->id)->get(); //mengambil data lampiran kegiatan berdasarkan kegiatan id
            if ($LampiranKegiatan) {
                foreach ($LampiranKegiatan as $lampiran) {
                    $lampirans['nama'] = $lampiran['nama'];
                    $lampirans['link'] = $file_path . 'kegiatan/' . $lampiran['lampiran_kegiatan'];
                    array_push($kegiatans['lampiran'], $lampirans);
                }
            }
            return response()->json([
                "detail_kegiatan" => $kegiatans
            ]);
        }
    }
    
     public function dataKalender()
	{
	   // kurang data tugas yang belum di keluarkan
        $jsonObj = array();
		$dataKegiatan = Kegiatan::select('tanggal')->groupBy('tanggal')->get(); //mengambil data kegiatan select tanggal

		foreach ($dataKegiatan as $value) {
            $jsonObjDetailKegiatan = array();
            $dataKegiatan = Kegiatan::where('tanggal',$value->tanggal)->get(); //mengambil data kegiatan berdasarkan tanggal
            foreach ($dataKegiatan as $item) {
                $rowDetail['title'] = $item->nama_kegiatan;
                $rowDetail['content'] = $item->nama_kegiatan;
                array_push($jsonObjDetailKegiatan, $rowDetail);
            }

           $row['nama'] = 'Kegiatan';
           $row['tanggal'] = $value->tanggal;
           $row['jenis'] = 2;
           $row['item'] = $jsonObjDetailKegiatan;
           array_push($jsonObj, $row);
        }

        return response()->json([
			'kalender' => $jsonObj
		],200);
	}
}
