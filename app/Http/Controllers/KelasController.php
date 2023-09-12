<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\JenjangPendidikan;
use App\Models\Kelas;
use App\Models\KelasGuru;
use App\Models\Master_Kelas;
use App\Models\Siswa;
use App\Models\Tingkatan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // set index page view
    public function index()
    {
        $jenjangpenddian = JenjangPendidikan::get();
        $tingkatan = Tingkatan::all();
        return view('kelas.index', compact('jenjangpenddian', 'tingkatan'));
    }

    public function detail($id)
    {
        //menampilkan data jadwal dan kelas
        $jadwal = Jadwal::with('kelasget', 'ruangan', 'mata_pelajaran')->where('kelas_id', $id)->get(); //mengambil data jadwal berdasarkan kelas id
        $siswa = Siswa::where('kelas', $id)->get(); //mengambil data siswa berdasarkan kelas
        return view('kelas.detail', compact('jadwal', 'siswa'));
    }

    // handle fetch all eamployees ajax request
    public function all()
    {
        //menampilkan data master kelas
        $emps = Master_Kelas::with('jenjang', 'tingkat')->get(); //mengambil data master kelas
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Jenjang</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->name . '</td>
                <td>' . $emp->jenjang->nama . '</td>
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
        $empData = [
            'name' => $request->name,
            'tingkatan_id' => $request->tingkatan_id,
            'jenjang_pendidikan_id' => $request->jenjang_pendidikan_id,
        ];
        Master_Kelas::create($empData); //tambah data 
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        //edit data
        $id = $request->id;
        $emp = Master_Kelas::find($id); //mengambil data master kelas berdasarkan id
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        $emp = Master_Kelas::Find($request->id); //mengambil data master kelas berdasarkan id
        $empData = [
            'name' => $request->name,
            'tingkatan_id' => $request->tingkatan_id,
            'jenjang_pendidikan_id' => $request->jenjang_pendidikan_id,
        ];


        $emp->update($empData); //update data
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        //delete
        $id = $request->id;
        Master_Kelas::destroy($id); //delete data
    }
}
