<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku_Kategori;
use Illuminate\Http\Request;

class BukuKategoriController extends Controller
{
    public function allCategoryBook()
    {
        //menampilkan data kategori
        $dataKategori = Buku_Kategori::get(); //mengambil data kategori buku

		$data = [];
		foreach($dataKategori as $p){
			$row['id'] = $p['id'];
			$row['nama_kategori'] = $p['nama_kategori'];
			array_push($data, $row);
		}

        return response()->json(
			$data
		);
    }
    
}
