<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Rincian_Siswa;
use App\Models\Siswa;
use Illuminate\Http\Request;

class RincianController extends Controller
{
    //ini sudah tidak dipakai tp jangan di hapus
    public function index()
    {
		$jadwal = Jadwal::all();
		$siswa = Siswa::all();
        return view('rincian_siswa.index', compact('jadwal', 'siswa'));
    }

    public function all()
    {
        //menampilkan data rincian siswa
        $emps = Rincian_Siswa::with('jadwal', 'siswa')->get(); //mengambil data rincian siswa
        $output = '';
        $p = 1 ;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Jadwal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->siswa->nama_siswa . '</td>
                <td>' . $emp->jadwal->kelas->name . ' - ' . $emp->jadwal->mata_pelajaran->name .' - ' . $emp->jadwal->hari->name .'</td>
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
        //proses tambah data
		if($request->jadwal_id || $request->siswa_id){ //kondisi jika request jadwal atau request siswa ada
			$empData = [
				'jadwal_id' => $request->jadwal_id,
				'siswa_id' => $request->siswa_id,
			];
			Rincian_Siswa::create($empData);
			return response()->json([
				'status' => 200,
			]);
		}

		if($request->jadwal_id == null || $request->siswa_id == null){  //kondisi jika request jadwal atau request siswa null
			return response()->json([
				'status' => 100,
			]);
		}
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $emp = Rincian_Siswa::with('jadwal', 'siswa')->find($id);
        return response()->json($emp);
    }

    public function update(Request $request)
    {
        $emp = Rincian_Siswa::Find($request->id);

        $empData = [
            'jadwal_id' => $request->jadwal_id,
            'siswa_id' => $request->siswa_id
        ];


        $emp->update($empData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        $id = $request->id;
        Rincian_Siswa::destroy($id);
    }
}
