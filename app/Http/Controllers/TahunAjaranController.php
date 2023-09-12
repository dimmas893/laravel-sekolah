<?php

namespace App\Http\Controllers;

use App\Models\Tahun_ajaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index()
    {
        //menampilkan data tahun ajaran
        return view('tahun_ajaran.index');
    }

    // handle fetch all eamployees ajax request
    public function all()
    {
        //menampilkan data tahun ajaran ajax
        $emps = Tahun_ajaran::all(); //mengambil data tahun ajaran 
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Tahun Ajaran</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->tahun_ajaran . '</td>
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

    public function store(Request $request)
    {
        //proses menambahkan data aajax
        $empData = [
            'tahun_ajaran' => $request->tahun_ajaran,
        ];
        Tahun_ajaran::create($empData); //create data
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        // edit data ajax
        $id = $request->id;
        $emp = Tahun_ajaran::find($id); //mengambil data tahun ajaran berdasarkann tahun ajaran
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        $emp = Tahun_ajaran::Find($request->id); //mengambil data tahun ajaran berdasarkan id
        $empData = [
            'tahun_ajaran' => $request->tahun_ajaran,
        ];


        $emp->update($empData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        //delete data 
        $id = $request->id;
        Tahun_ajaran::destroy($id); //menghapus data berdasarkan id
    }
}
