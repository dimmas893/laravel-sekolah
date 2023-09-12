<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Setting;
use App\Models\Tahun_ajaran;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        //menampilan data setting
        $tahun_ajaran = Tahun_ajaran::all();
        $semester = Semester::all();
        return view('setting.index', compact('tahun_ajaran', 'semester'));
    }

    // handle fetch all eamployees ajax request
    public function all()
    {
        //menampilkan data setting ajax
        $emps = Setting::with('tahun_ajaran', 'semester')->get(); //mengambil data setting
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Tahun Ajaran</th>
                <th>Semester</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->tahun_ajaran->tahun_ajaran . '</td>
                <td>' . $emp->semester . '</td>
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
            'id_tahun_ajaran' => $request->id_tahun_ajaran,
            'semester' => $request->semester,
        ];
        Setting::create($empData); //create data
        return response()->json([
            'status' => 200,
        ]);
    }

    public function edit(Request $request)
    {
        //edit data ajax
        $id = $request->id;
        $emp = Setting::find($id); //mengambil data berdasarkan id
        return response()->json($emp);
    }

    public function update(Request $request)
    {
        //proses update
        $emp = Setting::Find($request->id); //mengambil data berdasarkan id

        $empData = [
            'id_tahun_ajaran' => $request->id_tahun_ajaran,
            'semester' => $request->semester,
        ];


        $emp->update($empData); //update data
        return response()->json([
            'status' => 200,
        ]);
    }

    public function delete(Request $request)
    {
        //deletee ajax
        $id = $request->id;
        Setting::destroy($id); //delete data berdasarkan id
    }
}
