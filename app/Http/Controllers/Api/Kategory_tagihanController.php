<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice_Tagihan;
use App\Models\Kategori_Tagihan;
use App\Models\Siswa;
use Illuminate\Http\Request;
//tidak dipakai controller ini
class Kategory_tagihanController extends Controller
{

    public function all(Request $request)
    {
	$admin = Kategori_Tagihan::all();
		$tagihan = [];
		foreach($admin as $p){
			$row['id'] = $p['id'];
			$row['name'] = $p['nama_kategori'];
			array_push($tagihan, $row);
		}

        return response()->json([
		]);

    }
    public function store(Request $request)
    {

        $empData = [
            'nama_kategori' => $request->nama_kategori,
            'nominal' => $request->nominal,
            'deskripsi' => $request->deskripsi
        ];
        $emp = Kategori_Tagihan::create($empData);
        return response()->json([
            'data' => $emp,
            'status' => 200
        ]);
    }

    // handle edit an Tu ajax request
    public function edit($id)
    {
        $emp = Kategori_Tagihan::Find($id);
        return response()->json([
            'data' =>$emp,
            'status' => 200
        ]);
    }

    // handle update an Tu ajax request
    public function update(Request $request, $id)
    {
        $emp = Kategori_Tagihan::Find($id);

        $empData = [
            'nama_kategori' => $request->nama_kategori,
            'nominal' => $request->nominal,
            'deskripsi' => $request->deskripsi
        ];

        $emp->update($empData);
        return response()->json([
            'data' => $emp,
            'status' => 200
        ]);
    }

    // handle delete an Tu ajax request
    public function delete($id)
    {
        Kategori_Tagihan::destroy($id);

            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Mengghapus'
            ]);
    }
}

