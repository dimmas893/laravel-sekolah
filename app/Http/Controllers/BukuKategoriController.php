<?php

namespace App\Http\Controllers;

use App\Models\Buku_Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Str;

class BukuKategoriController extends Controller
{
    // set index page view
    public function index()
    {
        return view('bukukategori.index');
    }

    // handle fetch all eamployees ajax request
    public function all()
    {
        //mengambil semua data kategori buku ajax
        $emps = Buku_Kategori::get(); //mengambil data kategori buku
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Gambar</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->nama_kategori . '</td>
                <td><img src="/gambarkategori/' . $emp->gambar . '" width="50" class="img-thumbnail rounded-circle"></td>
                <td>
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
        //membuat data kategori buku
        
        //proses upload file
        $lampiranFulltextFile = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/gambarkategori';

            $this->lampiranFulltextFile = 'gambar-kategori-' . Str::random(5) . '.' . $file_extension;
            // $this->lampiranFulltextFile = $request->tahun_terbit.$request->singkatan_jenis.$kodeWilayah.$nomorPeraturan.'.'.$file_extension;
            $request->file('gambar')->move($lokasiFile, $this->lampiranFulltextFile);
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        } else {
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        }
        $empData = [
            'nama_kategori' => $request->nama_kategori,
            'gambar' => $lampiranFulltextFile
        ];
        Buku_Kategori::create($empData); //membuat data baru kategori buku
        return response()->json([
            'status' => 200,
        ]);
    }

    public function edit(Request $request)
    {
        //dit kategori buku
        $id = $request->id; //mengambil data request id dr input
        $emp = Buku_Kategori::find($id); //mengambil data kategori buku berdasarka id
        return response()->json($emp);
    }

    public function update(Request $request)
    {
        //update data kategori buku
        $emp = Buku_Kategori::Find($request->id); //mengambil data buku kategori berdasarkan id
        if ($request->hasFile('gambar')) {
            if ($emp->gambar) {
                File::delete(public_path('/gambarkategori/' . $emp->gambar)); //menghapus data file di buku kategori jika ada
            }
            $file = $request->file('gambar');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/gambarkategori';

            $this->lampiranFulltextFile = 'gambar-kategori-' . Str::random(5) . '.' . $file_extension;
            // $this->lampiranFulltextFile = $request->tahun_terbit.$request->singkatan_jenis.$kodeWilayah.$nomorPeraturan.'.'.$file_extension;
            $request->file('gambar')->move($lokasiFile, $this->lampiranFulltextFile);
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        } else {
            $this->lampiranFulltextFile = $emp->gambar;
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        }
        $empData = [
            'nama_kategori' => $request->nama_kategori,
            'gambar' => $lampiranFulltextFile
        ];
        $emp->update($empData); //update data
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        //delete data
        $id = $request->id; //mengambil data request id dr form input
        Buku_Kategori::destroy($id); //delete data
    }
}
