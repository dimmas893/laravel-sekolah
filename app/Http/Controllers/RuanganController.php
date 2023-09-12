<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        //menampilkan data ruangan
        return view('ruangan.index');
    }

    public function all()
    {
        //menampilkan daa ruangan
        $emps = Ruangan::all(); //mengambil data ruangan
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->name . '</td>
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
        //proses menambah data ajax
        $empData = [
            'name' => $request->name,
        ];
        Ruangan::create($empData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function edit(Request $request)
    {
        // edit data ajax
        $id = $request->id;
        $emp = Ruangan::find($id); //mengambil data berdasarkan id
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        //update ajax
        $emp = Ruangan::Find($request->id); //mengambil data berdasarkan id
        $empData = [
            'name' => $request->name,
        ];


        $emp->update($empData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function delete(Request $request)
    {
        // delete ajax
        $id = $request->id;
        Ruangan::destroy($id); //delete data berdasarkan id
    }
}
