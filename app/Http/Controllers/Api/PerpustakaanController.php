<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Buku;
use App\Models\Buku_Kategori;
use App\Models\BukuRelasiKategori;
use App\Models\PerpustakaanMember;
use App\Models\Perpustakaan_Pinjam;
use App\Models\Perpustakaan_Pinjam_Rincian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    public function perpustakaan(Request $request)
    {
        //api perpustakaan
        $file_path = 'https://dapurkoding.my.id/';
        $yuhu = [];
        $tampung = [];
        $dataMember = PerpustakaanMember::where('user_id', $request->id_user)->where('status_aktif', 1)->first(); //mengambil data perpustakaan memer berdasarkan user id dan status yag aktif
        if ($dataMember != null) {
            $perpustakaan_pinjam = Perpustakaan_Pinjam::where('member_id', $dataMember->id)->get(); //mengambil data perpustakaan pinjam berdasarkan member id
            $id_perpustakaan_pinjam = Perpustakaan_Pinjam::where('member_id', $dataMember->id)->first(); //mengambil data perpustakaan pinjam berdasarkan member id
            if ($id_perpustakaan_pinjam) {
                $rincian_buku = Perpustakaan_Pinjam_Rincian::where('perpustakaan_pinjam_id', $id_perpustakaan_pinjam->id)->first(); //mengambil data rincian perpustakaan pinjam berdasarkan perpustakaan pinjam id
                foreach ($perpustakaan_pinjam as $pe) {
                    $rincian_count = Perpustakaan_Pinjam_Rincian::where('perpustakaan_pinjam_id', $pe->id)->get(); //mengambil data rincian perpustakaan pinjam berdasarkan pinjam id
                    $raw['id'] = $pe->id;
                    if ($rincian_buku) {
                        $raw['nama'] = $rincian_buku->relasiBuku->judul;
                        $raw['jmlh_pinjam'] = count($rincian_count);
                        $raw['avatar'] = $file_path . 'sampul/' . $rincian_buku->relasiBuku->sampul;
                        $raw['tgl_kembali'] = $pe->batas_waktu;
                        array_push($yuhu, $raw); //menampung data menjadi 1 array
                        array_push($tampung, count($rincian_count)); //menampung data menjadi 1 array
                    }
                }
            }
            $tampungkategori = [];
            $kategoribuku = Buku_Kategori::first(); //mengambil 1 data buku kategori
            $bukurelasikategori = BukuRelasiKategori::where('buku_kategori_id', $kategoribuku->id)->get(); //mengambil data buku relasi kategori berdasarkan buku kategor id
            $tampungbukurelasi = [];
            $tampungdatakategori = [];
            foreach ($bukurelasikategori as $bukurelasi) {
                array_push($tampungbukurelasi, $bukurelasi->buku_id); //menampung data buku id menjadi 1 array
                array_push($tampungdatakategori, $bukurelasi->buku_kategori_id); //menampung data buku kategori id menjadi 1 array
            }
            $tampungdatabuku = [];
            foreach ($tampungbukurelasi as $pe) {
                array_push($tampungdatabuku, Buku::where('id', $pe)->first()); //menampung data buku menjadi 1 array
            }
            $tampungnama = [];
            foreach ($tampungdatabuku as $buku) {
                $kategori['id_buku'] = $buku->id;
                $kategori['penulis'] = $buku->penulis;
                $kategori['judul_buku'] = $buku->judul;
                $kategori['jenis'] = $buku->jenis;
                $bukurel = BukuRelasiKategori::where('buku_id', $buku->id)->get(); //mengambil data buku relasi kategori berdasarkan buku id
                $tampungnamakategori = [];
                foreach ($bukurel as $kat) {
                    array_push($tampungnamakategori, Buku_Kategori::where('id', $kat->buku_kategori_id)->first()->nama_kategori); //mengambil data nama kategori berdasarkan id
                }
                $kategori['kat'] = $tampungnamakategori;
                $kategori['avatar'] = $file_path . 'sampul/' . $buku->sampul;
                $kategori['view'] = (int)$buku->view;
                array_push($tampungkategori, $kategori);
            }

            $kategori['id_kategori'] = $kategoribuku->id;
            $kategori['judul_kategori'] = $kategoribuku->nama_kategori;
            // dd($kategori);
            return response()->json([
                "pinjam" => $yuhu,
                "kategori" => [
                    'id_kategori' => $kategoribuku->id,
                    'judul_kategori' => $kategoribuku->nama_kategori,
                    'buku' => $tampungkategori
                ]
            ]);
        } else {
            return response()->json([
                'error' => [
                    'Data Tidak Ditemukan',
                ],
            ], 404);
        }
    }

    public function hasilpencarian(Request $request)
    {
        //api pencarian buku
        $file_path = 'https://dapurkoding.my.id/';
        $judul = $request->judul_buku; // mengambil data request judul buku
        $penulis = $request->penulis; //mengambil data request penulis
        $jenis = $request->jenis_buku; //mengambil data request jenis buku
        $kategori_buku = $request->kategori_buku; //mengambil data request kategori buku
        $kategorihasil = Buku_Kategori::where('nama_kategori', $kategori_buku)->first()->id; //mengambil data id dr buku kategori berdasarkan nama kategori 
        $relasibukukategori = BukuRelasiKategori::with('buku')->whereHas('buku', function ($q) use ($judul, $penulis, $jenis) {
            $q->where('judul', 'like', "%" . $judul . "%")->orWhere('penulis', 'like', "%" . $penulis . "%")->where('jenis', 'like', "%" . $jenis . "%");
        })->where('buku_kategori_id', $kategorihasil)->get(); //mengambil data buku relasi kategori berdasarkan kesamaan judul atau kesamaan request penulis dan berdasarkan kesamaan jenis dan request jenis

        $tampungnamakategori = [];
        $tampungrow = [];

        foreach ($relasibukukategori as $rela) {
            array_push($tampungnamakategori, Buku_Kategori::where('id', $rela->buku_kategori_id)->first()->nama_kategori); //menampung data nama kategori dr buku kategori berdasarkan id
            $row['id_buku'] = $rela->buku_id;
            $row['penulis'] = $rela->buku->penulis;
            $row['judul_buku'] = $rela->buku->judul;
            $row['jenis'] = $rela->buku->jenis;
            $tampungnamakategori = [];
            array_push($tampungnamakategori, Buku_Kategori::where('id', $rela->buku_kategori_id)->first()->nama_kategori);//menampung data nama kategori dr buku kategori berdasarkan id
            $row['kat'] = $tampungnamakategori;
            $row['avatar'] = $file_path . 'sampul/' . $rela->buku->sampul;
            $row['view'] = $rela->buku->view;
            array_push($tampungrow, $row);
        }
        return response()->json([
            'buku' => $tampungrow
        ]);
    }

    public function detail(Request $request)
    {
        //detail buku
        $file_path = 'https://dapurkoding.my.id/';
        $buku = Buku::with('buku_kategori')->where('id', $request->id_buku)->first(); //mengambil data buku berdasarkan id dan beserta relasi buku kategori
        $bukuuu['id'] = $buku->id;
        $datakat = [];
        $tampungnamakategori = BukuRelasiKategori::where('buku_id', $buku->id)->get(); //mengambil data buku relasi kategori berdasarkan buku id
        foreach ($tampungnamakategori as $tama) {
            array_push($datakat, Buku_Kategori::where('id', $tama->buku_kategori_id)->first()->nama_kategori); //menampung data nama_kategori dr buku kategori berdasarkan id
        }
        $bukuuu['kategori'] = $datakat;
        $bukuuu['judul'] = $buku->judul;
        $bukuuu['penulis'] = $buku->penulis;
        $bukuuu['sinopsis'] = $buku->sinopsis;
        $bukuuu['jml_hal'] = (int) $buku->jumlah_halaman;
        $bukuuu['bahasa'] = $buku->bahasa;
        $bukuuu['penerbit'] = $buku->penerbit;
        $bukuuu['isbn_no'] = $buku->isbn_no;
        $bukuuu['pinjam'] = false;
        $bukuuu['sampul'] = $file_path . 'sampul/' . $buku->sampul;

        return response()->json([
            'detail_buku' => $bukuuu
        ]);
    }

    public function pinjam(Request $request)
    {
        //api proses pinjam buku
        $batasWaktu = Carbon::now('Asia/Jakarta')->addDays(7)->format('Y-m-d'); //tanggal hari 7 hari kedepan
        $memberPerpus = PerpustakaanMember::where('user_id', $request->id_user)->first(); //mengambil data perpustakaan member berdasarkan user id
        $tes = [
            'tanggal_peminjaman' => Carbon::now()->Format('Y-m-d'), 
            'member_id' => $memberPerpus->id,
            'batas_waktu' => $batasWaktu,
        ];

        $pee = Perpustakaan_Pinjam::create($tes); //create data perpustakaan pnjam
        foreach ($request['id_buku'] as $value) {

            $create = [
                'buku_id' => $value,
                'perpustakaan_pinjam_id' => $pee->id,
            ];

            $perpustakaan_rinci = Perpustakaan_Pinjam_Rincian::create($create); //create data rincian perpustakaan pinjam
        }

        return response()->json([
            'data' => [
                'id_pinjam' => $pee->id
            ],
        ], 201);
    }

    public function ebook(Request $request)
    {
        //api buku ebook
        $file_path = 'https://dapurkoding.my.id/';
        $kategori = Buku_Kategori::get(); //mengambil data buku_kategori
        $katfirst = Buku_Kategori::first(); //mengambil 1 data buku kategori
        $bukurel = BukuRelasiKategori::where('buku_kategori_id', $katfirst->id)->get(); //mengambil data buku relasi kategori berdasarkan buku kategori id
        $datakategori = [];
        $tam = [];
        foreach ($kategori as $p) {
            $k['id_kategori'] = $p->id;
            $k['judul_kategori'] = $p->nama_kategori;
            $k['avatar'] = $file_path . 'gambarkategori/' . $p->gambar;
            array_push($datakategori, $k);
            $bukuedsdsds = BukuRelasiKategori::where('buku_kategori_id', $p->id)->get(); //mengambil data buku relasi kategori berdasarkan buku kategori id
            $tambuku = [];
            foreach ($bukuedsdsds as $bukurrrrr) {
                $bukur = Buku::where('id', $bukurrrrr->buku_id)->where('jenis', 'ebook')->first(); //mengambil data buku berdasarkan id dan berdasarkan jenis = ebook
                if ($bukur != null) {
                    $buku['id_buku'] = $bukur->id;
                    $buku['penulis'] = $bukur->penulis;
                    $buku['judul_buku'] = $bukur->judul;
                    $buku['jenis'] = $bukur->jenis;
                    // $tampungnamakategori = [];
                    $datakat = [];
                    $tampungnamakategori = BukuRelasiKategori::where('buku_id', $bukur->id)->get(); //mengambil data buku relasi kategori berdasaarkan buku id
                    foreach ($tampungnamakategori as $tama) {
                        array_push($datakat, Buku_Kategori::where('id', $tama->buku_kategori_id)->first()->nama_kategori); //menampung data nama ketegori dr buku kategor berdasarkan id
                    }
                    $buku['kat'] = $datakat;
                    $buku['avatar'] = $file_path . 'sampul/' . $bukur->sampul;
                    $buku['view'] = (int)$bukur->view;
                    array_push($tambuku, $buku);
                }
            }

            $row['id_kategori'] = $p->id;
            $row['judul_kategori'] = $p->nama_kategori;
            $row['buku'] = $tambuku;
            array_push($tam, $row);
        }

        return response()->json([
            'menu' => $datakategori,
            'kategori' => $tam
        ]);

    }

    public function fisik(Request $request)
    {
        //api buku fisik
        $file_path = 'https://dapurkoding.my.id/';
        $kategori = Buku_Kategori::get(); //mengambil data buku kategori
        $katfirst = Buku_Kategori::first(); //mengambil 1 data buku kategori
        $bukurel = BukuRelasiKategori::where('buku_kategori_id', $katfirst->id)->get(); //mengambil data buku relasi kategori berdasarkan buku_kategri_id
        $datakategori = [];
        $tam = [];
        foreach ($kategori as $p) {
            $k['id_kategori'] = $p->id;
            $k['judul_kategori'] = $p->nama_kategori;
            $k['avatar'] = $file_path . 'gambarkategori/' . $p->gambar;
            array_push($datakategori, $k);
            $bukuedsdsds = BukuRelasiKategori::where('buku_kategori_id', $p->id)->get(); //mengambil data buku relasi kategori berdasarkan buku_kategori_id
            $tambuku = [];
            foreach ($bukuedsdsds as $bukurrrrr) {
                $bukur = Buku::where('id', $bukurrrrr->buku_id)->where('jenis', 'fisik')->first(); //mengambil data buku berdasarkan id dan berdasarkan jenis = fisik
                if ($bukur != null) {
                    $buku['id_buku'] = $bukur->id;
                    $buku['penulis'] = $bukur->penulis;
                    $buku['judul_buku'] = $bukur->judul;
                    $buku['jenis'] = $bukur->jenis;
                    $datakat = [];
                    $tampungnamakategori = BukuRelasiKategori::where('buku_id', $bukur->id)->get(); //mengambil data buku relasi kategori berdasarkan buku_id
                    foreach ($tampungnamakategori as $tama) {
                        array_push($datakat, Buku_Kategori::where('id', $tama->buku_kategori_id)->first()->nama_kategori); //menampung data nama kategoridr buku kategori berdasarkan id
                    }
                    $buku['kat'] = $datakat;
                    $buku['avatar'] = $file_path . 'sampul/' . $bukur->sampul;
                    $buku['view'] = (int)$bukur->view;
                    array_push($tambuku, $buku);
                }
            }

            $row['id_kategori'] = $p->id;
            $row['judul_kategori'] = $p->nama_kategori;
            $row['buku'] = $tambuku;
            array_push($tam, $row);
        }

        return response()->json([
            'menu' => $datakategori,
            'kategori' => $tam
        ]);
    }

    public function detailpinjambuku(Request $request)
    {
        //api detail pinjam buku
        $file_path = 'https://dapurkoding.my.id/';
        $id_pinjam = $request->id_pinjam; //mengambil data request id_pinjam
        $perpustakaan_pinjam = Perpustakaan_Pinjam::where('id', $id_pinjam)->first(); //mengambil data perpustakaan pinjam berdasarkan id
        $perpustakaan_pinjam_detail = Perpustakaan_Pinjam_Rincian::where('perpustakaan_pinjam_id', $perpustakaan_pinjam->id)->get(); //mengambil data rincian perpustakaan pinjam berdasarkan perpustakaan pinjam id
        $tampungdata = [];
        foreach ($perpustakaan_pinjam_detail as $detail) {
            $row['id_buku'] = $detail->buku_id;
            $row['penulis'] = $detail->relasiBuku->penulis;
            $row['judul_buku'] = $detail->relasiBuku->judul;
            $row['jenis'] = $detail->relasiBuku->jenis;
            $bukurel = BukuRelasiKategori::where('buku_id', $detail->buku_id)->get(); //mengambil data buku relasi kategori berdasarkan buku id
            $tampungnamakategori = [];
            foreach ($bukurel as $kat) {
                array_push($tampungnamakategori, Buku_Kategori::where('id', $kat->buku_kategori_id)->first()->nama_kategori); //menampung data nama_kategori dr buku_kategori berdasarkan id
            }
            $row['kat'] = $tampungnamakategori;
            $row['avatar'] = $file_path . 'sampul/' . $detail->relasiBuku->sampul;
            $row['view'] = (int)$detail->relasiBuku->view;
            array_push($tampungdata, $row);
        }
        return response()->json([
            'id_pinjam' => "$id_pinjam",
            'detail_pinjam' => [
                'waktu_pinjam' => $perpustakaan_pinjam->tanggal_peminjaman,
                'batas_waktu' => $perpustakaan_pinjam->batas_waktu,
                'buku' => $tampungdata,
                'catatan' => $detail->note
            ],
        ]);
    }

    public function bukuperpus(Request $request)
    {
        $file_path = 'https://dapurkoding.my.id/';
        $id_buku = (int)$request->id_buku; //mengambil data request id_buku
        $bukurelasi = BukuRelasiKategori::where('buku_id', $id_buku)->get(); //mengambil data buku relasi kategori berdasarkan buku_id
        $tampungnamakategori = [];
        foreach ($bukurelasi as $kat) {
            array_push($tampungnamakategori, Buku_Kategori::where('id', $kat->buku_kategori_id)->first()->nama_kategori); //menampung data nama_kategori dr buku_kategori berdasarkan id
        }
        $buku = Buku::where('id', $id_buku)->first(); //mengambil data buku berdasarkan id
        $dataWishlist = Wishlist::where('buku_id', $request->id_buku)->where('id_user', $request->id_user)->first(); //mengambil 1 data wishlist berdasarkan buku_id dan berdasarkan id_user
        
        if($dataWishlist != null){
            $wishlist = 1;
        } else {
            $wishlist = 0;
        }
        $row['id'] = $buku->id;
        $row['kategori'] = $tampungnamakategori;
        $row['judul'] = $buku->judul;
        $row['penulis'] = $buku->penulis;
        $row['sampul'] = $file_path . 'sampul/' . $buku->sampul;
        $row['sinopsis'] = $buku->sinopsis;
        $row['jml_hal'] = $buku->jumlah_halaman;
        $row['bahasa'] = $buku->bahasa;
        $row['penerbit'] = $buku->penerbit;
        $row['isbn'] = $buku->isbn_no;
        $row['jenis'] = $buku->jenis;
        $row['wishlist'] = $wishlist;
        if ($buku->jenis === 'ebook') {
            $row['pinjam'] = false;
            $row['link'] = $file_path . 'bacabukuebook/' . $buku->file_ebook;
        } else {
            $row['pinjam'] = true;
            $row['link'] = '';
        }
        return response()->json([
            'detail_buku' => $row
        ]);
    }

    public function caribuku(Request $request)
    {
        //tidak dipakai
        $kategori = Buku_Kategori::get();
        $tampungdata = [];
        foreach ($kategori as $kat) {
            $buk['id_kategori'] = "$kat->id";
            $buk['kategori'] = $kat->nama_kategori;
            array_push($tampungdata, $buk);
        }
        return response()->json([
            'jenis_buku' =>  [
                [
                    "id_jenis" => "001",
                    "jenis" => "ebook"
                ],
                [
                    "id_jenis" => "002",
                    "jenis" => "fisik"
                ]
            ],
            'kategori_buku' => $tampungdata
        ]);
    }

    public function perpustakaankategori(Request $request)
    {
        //menampilkan data buku per halaman
        $file_path = 'https://dapurkoding.my.id/';
        $bukurel = BukuRelasiKategori::where('buku_kategori_id', $request->id_kategori)->get(); //mengambil data buku relasi kategori berdasarkan buku_kategori_id
        $tampungnamakategori = [];
        $tampungkategori = [];
        $tampungdata = [];

        foreach ($bukurel as $index => $kat) {
            $buku = Buku::where('id', $kat->buku_id)->first(); //mengambil data buku berdasarkan id
            $row['id_buku'] = $buku->id;
            $row['penulis'] = $buku->penulis;
            $row['judul_buku'] = $buku->judul;
            $row['jenis'] = $buku->jenis;
            $bukurel = BukuRelasiKategori::where('buku_id', $buku->id)->get(); //mengambil data buku relasi kategori berdasarkan buku_id
            if ($bukurel != null) {
                $tampungnamakategori = [];
                foreach ($bukurel as $kat) {
                    array_push($tampungnamakategori, Buku_Kategori::where('id', $kat->buku_kategori_id)->first()->nama_kategori); //menampung data nama_kategori dr buku_kategori berdasarkan id
                }
            }
            $row['kat'] = $tampungnamakategori;
            $row['avatar'] = $file_path . 'sampul/' . $buku->sampul;
            $row['view'] = (int)$buku->view;
            array_push($tampungdata, $row); //menampung data variable row benjadi 1 array
        }
        $halaman = (int)$request->halaman; //mengambil data dr request halaman
        $tes = [];
        for ($i = $halaman * 2 - 2; $i < $halaman * 2; $i++) { 
            if ($halaman * 2 <= count($tampungdata)) { //menampilkan 2 data
                array_push($tes, $tampungdata[$i]); //menampung data dr index yang udah di tentukan dr request halaman
            }else{
                if(isset($tampungdata[$i])){
                    array_push($tes, $tampungdata[$i]); //menampung data jika sisa data di halaman hanya 1
                }
            }
        }
        return response()->json([
            'halaman' => $halaman,
            'buku' => $tes
        ]);
    }
}
