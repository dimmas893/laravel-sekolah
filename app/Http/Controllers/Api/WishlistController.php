<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Buku;
use App\Models\Buku_Kategori;
use App\Models\BukuRelasiKategori;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function daftarWishlist(Request $request)
    {
        // daftar wishlist
        $file_path = 'https://dapurkoding.my.id/';
        $dataWishlist = Wishlist::where('id_user', $request->id_user)->get(); //mengambil data berdasarkan id user
        $tampungnamakategori = [];
        $tampungkategori = [];
        $tampungdata = [];

        foreach ($dataWishlist as $index => $wish) {
            $buku = Buku::where('id', $wish->buku_id)->first();
            $row['id_buku'] = $buku->id;
            $row['penulis'] = $buku->penulis;
            $row['judul_buku'] = $buku->judul;
            $row['jenis'] = $buku->jenis;
            $bukurel = BukuRelasiKategori::where('buku_id', $buku->id)->get(); //mengambil data buku relasi kategori berdasarkan buku id
            if ($bukurel != null) {
                $tampungnamakategori = [];
                foreach ($bukurel as $kat) {
                    array_push($tampungnamakategori, Buku_Kategori::where('id', $kat->buku_kategori_id)->first()->nama_kategori);
                }
            }
            $row['kat'] = $tampungnamakategori;
            $row['avatar'] = $file_path . 'sampul/' . $buku->sampul;
            $row['view'] = (int)$buku->view;
            array_push($tampungdata, $row);
        }
        
        $halaman = (int)$request->halaman;
        $tes = [];
        
        for ($i = $halaman * 2 - 2; $i < $halaman * 2; $i++) {
            if ($halaman * 2 <= count($tampungdata)) {
                array_push($tes, $tampungdata[$i]);
            }else{
                if(isset($tampungdata[$i])){
                    array_push($tes, $tampungdata[$i]);
                }
            }
        }
        return response()->json([
            'halaman' => $halaman,
            'buku' => $tes
        ]);
        
    }

    public function simpanWishlist(Request $request)
    {
        //simpan withlis
        $dataWishlist = Wishlist::where('buku_id', $request->id_buku)->where('id_user', $request->id_user)->first(); //mengambil data wishlist berdasarkan buku id dan id user
        if($dataWishlist != null){
            $dataWishlist->delete(); //jika ada datanya maka hapus data
        } else {
            $data = Wishlist::Create([
                'id_user' => (int)$request->id_user,
                'buku_id' => $request->id_buku
            ]);
        }
        

        return response()->json(
            
        );
    }

    
}
