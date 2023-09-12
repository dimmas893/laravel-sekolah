<?php

namespace App\Http\Controllers;

use App\Models\BahanAjarMataPelajaran;
use App\Models\Mata_Pelajaran;
use App\Models\Setting;
use App\Models\Tingkatan;
use Illuminate\Http\Request;

class Mata_PelajaranController extends Controller
{
    // set index page view
    public function index()
    {
        $tingkatan = Tingkatan::get(); //mengambil data kegiatan
        return view('mata_pelajaran.index', compact('tingkatan'));
    }

    // handle fetch all eamployees ajax request
    public function all()
    {
        //menampilkan data matapelajaran
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data setting
        $emps = Mata_Pelajaran::where('tahun_ajaran_id', $tahun)->get(); //mengambil data mata pelajaran berdasarkan tahun ajaran yang berlangsung
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Kelas</th>
                <th>Bahan Ajar</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->name . '</td>';
                if ($emp->jurusan != null) {
                    $output .= '<td>' . $emp->tingkatan . ' - ' . $emp->jurusan . '</td>';
                } else {
                    $output .= '<td>' . $emp->tingkatan . '</td>';
                }

                $output .= '<td><a href="' . route('bahan-ajar', $emp->id) . '" class="btn btn-info">Bahan Ajar</a></td>';
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
        if ((int)$request->tingkatan < 7 && $request->tingkatan > 0) {
            $jenjang = 1;
        }
        if ((int)$request->tingkatan < 10 && $request->tingkatan > 6) {
            $jenjang = 2;
        }
        if (
            (int)$request->tingkatan < 13 && $request->tingkatan > 9
        ) {
            $jenjang = 3;
        }
        if (
            (int)$request->tingkatan === 4
        ) {
            $jenjang = 4;
        }
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data setting
        if ($request->jurusan11 != null) { // kondisi jika request jurusan11 ada
            $empData = [
                'name' => $request->name,
                'tingkatan' => $request->tingkatan,
                'jurusan' => $request->jurusan11,
                'jenjang_pendidikan_id' => $jenjang,
                'tahun_ajaran_id' => $tahun,
            ];
        }
        if ($request->jurusan12 != null) { // kondisi jika request jurusan12 ada
            $empData = [
                'name' => $request->name,
                'tingkatan' => $request->tingkatan,
                'jurusan' => $request->jurusan12,
                'jenjang_pendidikan_id' => $jenjang,
            ];
        }
        if ($request->jurusan10 != null) { // kondisi jika request jurusan10 ada
            $empData = [
                'name' => $request->name,
                'tingkatan' => $request->tingkatan,
                'jurusan' => $request->jurusan10,
                'jenjang_pendidikan_id' => $jenjang,
                'tahun_ajaran_id' => $tahun,
            ];
        }
        if ($request->jurusan10 === null && $request->jurusan11 === null && $request->jurusan12 === null) { // kondisi jika request jurusan11, jurusan10 , jurusan12 tidak ada
            $empData = [
                'name' => $request->name,
                'tingkatan' => $request->tingkatan,
                'jurusan' => null,
                'jenjang_pendidikan_id' => $jenjang,
                'tahun_ajaran_id' => $tahun,
            ];
        }
        Mata_Pelajaran::create($empData); //tambah data
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        //edit
        $id = $request->id;
        $emp = Mata_Pelajaran::find($id); //mengambil data mata pelajaran berdasarkan id
        return response()->json($emp);
    }

    public function editBahanAjarMataPelajaran(Request $request)
    {
        //edit
        // dd('ds');
        $id = $request->id;
        $emp = BahanAjarMataPelajaran::find($id); //mengambil data mata pelajaran berdasarkan id
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        //update
        $emp = Mata_Pelajaran::Find($request->id); //mengambil data mata pelajaran berdasarkan id
        $empData = [
            'name' => $request->name,
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
        $id = $request->id;
        Mata_Pelajaran::destroy($id); //delete data
    }
}
