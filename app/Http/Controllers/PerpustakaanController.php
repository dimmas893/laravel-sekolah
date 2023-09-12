<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Buku_Kategori;
use App\Models\BukuRelasiKategori;
use Illuminate\Http\Request;
use Str;
use File;
use Illuminate\Support\Facades\Auth;

class PerpustakaanController extends Controller
{

    public function perpustakaanjenis(Request $request)
    {
        //select jenis ajax
        $id = $request->id;
        $output = '';
        if ($id === 'fisik') {
            $output .= '     <div class="my-2">
                                <label for="name">Judul Buku</label>
                                <input type="text" id="judul_buku" name="judul_buku" class="form-control"
                                    placeholder="Masukan Judul Buku">
                            </div>
                            <div class="my-2">
                            </div>
                            <div class="my-2">
                                <label for="name">Isbn No</label>
                                <input type="number" id="isbn_no" name="isbn_no" class="form-control" placeholder="Masukan Isbn No">
                            </div>

                            <div class="my-2">
                                <label for="name">Rak</label>
                                <input type="text" name="rak" id="rak" class="form-control" placeholder="Masukan No Rak">
                            </div>

                            <div class="my-2">
                                <label for="name">Jumlah Buku</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukan Jumlah">
                            </div>

                            <div class="my-2">
                                <label for="name">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukan Harga">
                            </div>

                            <div class="my-2">
                                <label for="name">Sampul</label>
                                <input type="file" name="sampul"  class="form-control" placeholder="Masukan Sampul">
                            </div>

                            <div class="my-2">
                                <label for="name">Sinopsis</label>
                                <textarea name="sinopsis" class="form-control" placeholder="Masukan Sinopsis"></textarea>
                            </div>
                            <div class="my-2">
                                <label for="name">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control" placeholder="Masukan Penerbit">
                            </div>
                            <div class="my-2">
                                <label for="name">Penulis</label>
                                <input type="text" name="penulis" class="form-control" placeholder="Masukan Penulis">
                            </div>
                            <div class="my-2">
                                <label for="name">Bahasa</label>
                                <input type="text" name="bahasa" class="form-control" placeholder="Masukan Bahasa">
                            </div>

                            <div class="my-2">
                                <label for="name">Jumlah Halaman</label>
                                <input type="number" name="jumlah_halaman" class="form-control"
                                    placeholder="Masukan Jumlah Halaman">
                            </div>';
            echo $output;
        } else {
            $output .= '
                            <div class="my-2">
                                <label for="name">Judul Buku</label>
                                <input type="text" name="judul_buku" class="form-control"
                                    placeholder="Masukan Judul Buku">
                            </div>
                            <div class="my-2">
                            </div>
                            <div class="my-2">
                                <label for="name">Sinopsis</label>
                                <textarea name="sinopsis" class="form-control" placeholder="Masukan Sinopsis"></textarea>
                            </div>
                            <div class="my-2">
                                <label for="name">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control" placeholder="Masukan Penerbit">
                            </div>
                            <div class="my-2">
                                <label for="name">Penulis</label>
                                <input type="text" name="penulis" class="form-control" placeholder="Masukan Penulis">
                            </div>
                            <div class="my-2">
                                <label for="name">Bahasa</label>
                                <input type="text" name="bahasa" class="form-control" placeholder="Masukan Bahasa">
                            </div>

                            <div class="my-2">
                                <label for="name">Sampul</label>
                                <input type="file" name="sampul"  class="form-control" placeholder="Masukan Sampul">
                            </div>

                            <div class="my-2">
                                <label for="name">File Ebook</label>
                                <input type="file" name="file_ebook" class="form-control" placeholder="Masukan Bahasa">
                            </div>
                            <div class="my-2">
                                <label for="name">Jumlah Halaman</label>
                                <input type="number" name="jumlah_halaman" class="form-control"
                                    placeholder="Masukan Jumlah Halaman">
                            </div>';
            echo $output;
        }
    }


    public function bacaebook(Request $request)
    {
        //proses baca ebook
        $url = 'https://dapurkoding.my.id';
        $buku = Buku::where('id', $request->idbuku)->first(); //mengambil data buku berdasarkan id
        if ($buku->view === null) {
            $buku->update([
                'view' => 1
            ]);
        } else {
            $buku->update([
                'view' =>  $buku->view + 1
            ]);
        }
    }
    public function index()
    {
        //menampilkan halaman cms buku
        $kategori_buku = Buku_Kategori::get(); //mengambil data buku kategori
        return view('perpustakaan.index', compact('kategori_buku'));
    }

    public function all()
    {
        //menampilkan data buku
        $emps = Buku::get(); //mengambil data buku
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Jenis</th>
                <th>Sampul Buku</th>
                <th>Sinopsis</th>
                <th>Kategori</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $kategori = BukuRelasiKategori::where('buku_id', $emp->id)->get(); //mengambil data buku relasi kategori
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->judul . '</td>
                <td>' . $emp->jenis . '</td>';
                $output .= '<td><img src="/sampul/' . $emp->sampul . '" width="50" class="img-thumbnail rounded-circle"></td>';

                $output .= '<td>' . $emp->sinopsis . '</td><td>';
                foreach ($kategori as $kat) {
                    $output .=  Buku_Kategori::where('id', $kat->buku_kategori_id)->first()->nama_kategori . ', ';
                }
                $output .= '</td><td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editTUModal"><i class="ion-edit h4" data-pack="default" data-tags="on, off"></i></a>
                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="ion-trash-a h4" data-pack="default" data-tags="on, off"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    // handle insert a new Tu ajax request
    public function store(Request $request)
    {
        //proses menambahkan data ajax
        $url = 'https://dapurkoding.my.id/';

        //proses upload file ---------
        if ($request->hasFile('sampul')) {
            $file = $request->file('sampul');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/sampul';

            $this->sampul = 'sampul-' . $request->name . Str::random(5) . '.' . $file_extension;
            $request->file('sampul')->move($lokasiFile, $this->sampul);
            $sampul = $this->sampul;
        } else {
            $sampul = null;
        }

        if ($request->hasFile('file_ebook')) {
            $file = $request->file('file_ebook');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/bacabukuebook';

            $this->file_ebook = 'ebook-' . $request->penulis . Str::random(5) . '.' . $file_extension;
            $request->file('file_ebook')->move($lokasiFile, $this->file_ebook);
            $bacaebook = $this->file_ebook;
        } else {
            $bacaebook = null;
        }
        if ($request->jenis === 'ebook') {
            $NilaiLink = $url . 'baca-buku-ebook/' . $bacaebook;
        } else {
            $NilaiLink = null;
        }

        // end proses upload file ---------
        $empData = [
            'judul' => $request->judul_buku,
            'sampul' => $sampul,
            'sinopsis' => $request->sinopsis,
            'bahasa' => $request->bahasa,
            'jumlah_halaman' => $request->jumlah_halaman,
            'isbn_no' => $request->isbn_no,
            'penerbit' => $request->penerbit,
            'penulis' => $request->penulis,
            'rak' => $request->rak,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,

            //
            'jenis' => $request->jenis,
            'file_ebook' => $bacaebook,
            'link_ebook' => $NilaiLink,
            'dibuat_oleh' => Auth::user()->id,
            'diubah_oleh' =>  Auth::user()->id,
        ];
        $bu = Buku::create($empData); //create data
        if (isset($request['kategoribuku'])) { //kondisi jika request kategoribuku ada
            foreach ($request['kategoribuku'] as $kat) {
                BukuRelasiKategori::create([
                    'buku_id' => $bu->id,
                    'buku_kategori_id' => $kat
                ]); //create data
            }
        }
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        //proses edit ajax
        $id = $request->id;
        $emp = Buku::find($id);
        $kategori = BukuRelasiKategori::where('buku_id', $emp->id)->get(); //mengambil data buku relasi kategori berdasarkan buku id
        $kategoridata = [];
        $kategoridataSaja = [];
        foreach ($kategori as $kat) {
            $row['id'] = $kat->buku_kategori_id;
            $row['namakategori'] = $kat->buku_kategori->nama_kategori;
            array_push($kategoridata, $row);

            $row1 = $kat->buku_kategori_id;
            array_push($kategoridataSaja, $row1);
        }

        $kategori_buku = Buku_Kategori::whereNotIn('id', $kategoridataSaja)->get(); //mengambil data buku kategori berdasarkan yg tidak ada di $kategoridataSaja
        return response()->json([
            'buku' => $emp,
            'kategori' => $kategoridata,
            'kategori_buku' => $kategori_buku
        ]);
    }

    public function update(Request $request)
    {
        //update data
        $emp = Buku::Find($request->id); //mengambil databuku berdasarkan id
        foreach (BukuRelasiKategori::where('buku_id', $emp->id)->get() as $buk) {
            BukuRelasiKategori::where('buku_id', $buk->buku_id)->delete(); //hapus data bukurelasikategori berdasarkan buku id
        }
        foreach ($request['dimmas'] as $kat) {
            BukuRelasiKategori::where('buku_id', $emp->id)->create([
                'buku_id' => $emp->id,
                'buku_kategori_id' => $kat
            ]); //create data
        }
        if ($request->hasFile('sampul')) { //kondisi jika request file sampul ada
            if ($emp->sampul) {
                File::delete(public_path('/sampul/' . $emp->sampul));
            }
            $file = $request->file('sampul');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/sampul';

            $this->sampul = 'sampul-' . Str::random(5) . '.' . $file_extension;
            $request->file('sampul')->move($lokasiFile, $this->sampul);
            $sampul = $this->sampul;
        } else {
            $this->sampul = $emp->sampul;
            $sampul = $this->sampul;
        }

        if ($request->hasFile('file_ebook')) { //kondisi jika request file file_ebook ada
            if ($emp->file_ebook) {
                File::delete(public_path('/bacabukuebook/' . $emp->file_ebook));
            }
            $file = $request->file('file_ebook');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/bacabukuebook';

            $this->file_ebook = 'file_ebook-' . Str::random(5) . '.' . $file_extension;
            $request->file('file_ebook')->move($lokasiFile, $this->file_ebook);
            $file_ebook = $this->file_ebook;
        } else {
            $this->file_ebook = $emp->file_ebook;
            $file_ebook = $this->file_ebook;
        }

        $empData = [
            'judul' => $request->judul_buku,
            'jenis' => $request->jenis,
            'sampul' => $sampul,
            'file_ebook' => $file_ebook,
            'sinopsis' => $request->sinopsis,
            'bahasa' => $request->bahasa,
            'jumlah_halaman' => $request->jumlah_halaman,
            'isbn_no' => $request->isbn_no,
            'penerbit' => $request->penerbit,
            'penulis' => $request->penulis,
            'rak' => $request->rak,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'dibuat_oleh' => Auth::user()->id,
            'diubah_oleh' =>  Auth::user()->id,
        ];
        $emp->update($empData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function delete(Request $request)
    {
        //proses delete ajax
        $id = $request->id;
        $emp = Buku::find($id); //mengambil data buku berdasarkan id
        foreach (BukuRelasiKategori::where('buku_id', $emp->id)->get() as $buk) {
            BukuRelasiKategori::where('buku_id', $buk->buku_id)->delete(); //menghapus data bukurelasikategori berdasarkan buku id
        }

        if (File::delete(public_path('/sampul/' . $emp->sampul))) {
            Buku::destroy($id); //menghapus data buku berdasarkan id
        } else {
            Buku::destroy($id); //menghapus data buku berdasarkan id
        }
    }
}
