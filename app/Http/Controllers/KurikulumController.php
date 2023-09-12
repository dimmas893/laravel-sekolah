<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\Mata_Pelajaran;
use App\Models\Setting;
use App\Models\Tingkatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use File;

class KurikulumController extends Controller
{
    // set index page view
    public function index()
    {
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data setting
        $tingkatan = Tingkatan::all(); //mengambil data tingkatan
        $mata_pelajaran = Mata_Pelajaran::where('tahun_ajaran_id', $tahun)->get(); //mengambil data mata perlajaran
        return view('kurikulum.index', compact('tingkatan', 'mata_pelajaran'));
    }

    public function all()
    {
        //menampilkan data kurikulum
        $emps = Kurikulum::all(); //mengambil data kurikulum
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Tingkatan</th>
                <th>Mata Pelajaran</th>
                <th>Nama kurikulum</th>
                <th>Deskripsi</th>
                <th>Lampiran</th>
                <th>Tanggal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->tingkatan_id . '</td>
                <td>' . $emp->mata_pelajaran->name . '</td>
                <td>' . $emp->name . '</td>
                <td>' . $emp->deskripsi . '</td>
                <td><a href="/lampirankurikulum/' . $emp->lampiran . '" target="_blank">' . $emp->lampiran . '</a></td>
                <td>' . $emp->tanggal . '</td>
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
        //proses tambah

        $tanggalhariini = Carbon::now()->Format('Y-m-d');
        $fotoFile = null;
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/' . 'lampirankurikulum';
            $this->fotoFile = 'file-lampirankurikulum-' . $request->name . Str::random(5) . '.' . $file_extension;
            $request->file('lampiran')->move($lokasiFile, $this->fotoFile);
            $fotoFile = $this->fotoFile;
        }
        $empData = [
            'tingkatan_id' => $request->tingkatan_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'lampiran' => $fotoFile,
            'tanggal' => $tanggalhariini,
        ];

        Kurikulum::create($empData); //tambah data
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        //edit
        $id = $request->id;
        $emp = Kurikulum::find($id); //mengambil data kurikulum berdasarkan id
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        // update
        $emp = Kurikulum::Find($request->id); //mengambil data kurikulum berdasarkan id
        // dd($request->all());
        $lampiranFulltextFile = null;
        if ($request->hasFile('lampiran')) {
            if ($emp->lampiran) {
                File::delete(public_path('/lampirankurikulum/' . $emp->lampiran));
            }
            $file = $request->file('lampiran');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/lampirankurikulum';

            $this->lampiranFulltextFile = 'file-lampirankurikulum-' . $request->mata_pelajaran_id . Str::random(5) . '.' . $file_extension;
            $request->file('lampiran')->move($lokasiFile, $this->lampiranFulltextFile);
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        } else {
            $this->lampiranFulltextFile = $emp->lampiran;
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        }
        $empData = [
            'tingkatan_id' => $request->tingkatan_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'name' => $request->name,
            'lampiran' => $lampiranFulltextFile,
            'deskripsi' => $request->deskripsi,
        ];


        $emp->update($empData); //update data
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        // delete//
        $id = $request->id; //mengambil data request id
        $emp = Kurikulum::find($id); //mengambil data berita berdasarkan id
        if (File::delete(public_path('/lampirankurikulum/' . $emp->lampiran))) {
            Kurikulum::destroy($id); //delete berita berdasarkan id
        } else {
            Kurikulum::destroy($id); //delete berita berdasarkan id
        }
    }
}
