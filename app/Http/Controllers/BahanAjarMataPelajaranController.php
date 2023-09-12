<?php

namespace App\Http\Controllers;

use App\Models\BahanAjarMataPelajaran;
use Illuminate\Http\Request;
use Str;
use File;

class BahanAjarMataPelajaranController extends Controller
{
    // set index page view
    public function index($mata_pelajaran_id)
    {
        return view('bahanajar.index', compact('mata_pelajaran_id'));
    }

    // handle fetch all eamployees ajax request
    public function all($mata_pelajaran_id)
    {
        //menampilkan data matapelajaran
        $emps = BahanAjarMataPelajaran::where('mata_pelajaran_id', $mata_pelajaran_id)->get(); //mengambil data bahan ajar mata pelajaran berdasarkan tahun ajaran yang berlangsung
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>judul</th>
                <th>file</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->judul . '</td>
                <td><a href="/bahanajar/' . $emp->file . '" target="_blank">' . $emp->file . '</a></td>';
                $output .= ' <td>
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
        //tambah data
        $fotoFile = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/' . 'bahanajar';
            $this->fotoFile = 'file-bahan_ajar-' . $request->mata_pelajaran_id . Str::random(5) . '.' . $file_extension;
            $request->file('file')->move($lokasiFile, $this->fotoFile);
            $fotoFile = $this->fotoFile;
        }

        $empData = [
            'judul' => $request->judul,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'file' => $fotoFile
        ];
        BahanAjarMataPelajaran::create($empData); //create data berita
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        //edit
        // dd('dsd');
        $id = $request->id;
        $emp = BahanAjarMataPelajaran::find($id); //mengambil data mata pelajaran berdasarkan id
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        //update
        $emp = BahanAjarMataPelajaran::Find($request->id);
        $lampiranFulltextFile = null;
        if ($request->hasFile('file')) {
            if ($emp->file) {
                File::delete(public_path('/bahanajar/' . $emp->file));
            }
            $file = $request->file('file');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/bahanajar';

            $this->lampiranFulltextFile = 'file-bahan_ajar-' . $request->mata_pelajaran_id . Str::random(5) . '.' . $file_extension;
            $request->file('file')->move($lokasiFile, $this->lampiranFulltextFile);
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        } else {
            $this->lampiranFulltextFile = $emp->file;
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        }



        $empData = [
            'judul' => $request->judul,
            'file' => $lampiranFulltextFile
        ];
        $emp->update($empData); //update data
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        // delete
        $id = $request->id; //mengambil data request id
        $emp = BahanAjarMataPelajaran::find($id); //mengambil data BahanAjarMataPelajaran berdasarkan id
        if (File::delete(public_path('/bahanajar/' . $emp->image))) {
            BahanAjarMataPelajaran::destroy($id); //delete BahanAjarMataPelajaran berdasarkan id
        } else {
            BahanAjarMataPelajaran::destroy($id); //delete BahanAjarMataPelajaran berdasarkan id
        }
    }
}
