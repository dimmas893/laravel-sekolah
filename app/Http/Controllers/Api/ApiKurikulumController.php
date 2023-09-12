<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use Illuminate\Http\Request;

class ApiKurikulumController extends Controller
{
    public function detail(Request $request)
    {
        //api detail kurikulum
        $tingkatan = $request->tingkatan;
        $kurikulum = Kurikulum::where('tingkatan_id', $tingkatan)->get(); //mengambil data kurikulum berdasarkan tingkatan id
        $tampungdatakurikulum = [];
        foreach ($kurikulum as $item) {
            $row['nama_kurikulum'] = $item->name;
            $row['tanggal_upload'] = $item->tanggal;
            $row['deskripsi'] = $item->deskripsi;
            $row['lampiran'] = $item->name;
            $row['tingkatan'] = $item->tingkatan_id;
            array_push($tampungdatakurikulum, $row);
        }
        return response()->json($tampungdatakurikulum);
    }
}
