<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\KelasGuru;
use App\Models\Master_Kelas;
use App\Models\Tahun_ajaran;
use Illuminate\Http\Request;

class KelasGuruController extends Controller
{
	// set index page view
	public function index()
	{
	    //index
		$tahun_ajaran = Tahun_ajaran::all(); //mengambil semua data tahun ajaran
		$kelas = Master_Kelas::all(); //mengambil semua data master kelas
		$guru = Guru::all(); //mengambil semua data guru
		return view('gurukelas.index', compact('tahun_ajaran', 'kelas', 'guru'));
	}

	// handle fetch all eamployees ajax request
	public function all()
	{
        //menampilkan data kelas
		$emps = Kelas::with('tahun_ajaran', 'kelas', 'guru')->get(); //mengambil data kelas
		$output = '';
		$p = 1;
		if ($emps->count() > 0) {
			$output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Wali Kelas</th>
                <th>Nama Kelas</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->guru->name . '</td>
                <td>' . $emp->kelas->name . '</td>
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
	    //tambah data
		$empData = [
			'id_guru' => $request->id_guru,
			'id_tahun_ajaran' => $request->id_tahun_ajaran,
			'id_master_kelas' => $request->id_master_kelas,
		];
		Kelas::create($empData); //tambah data kelas
		return response()->json([
			'status' => 200,
		]);
	}

	// handle edit an Tu ajax request
	public function edit(Request $request)
	{
	   // /edit
		$id = $request->id;
		$emp = Kelas::find($id); //mengambil data kelas berdasarkan id
		return response()->json($emp);
	}

	// handle update an Tu ajax request
	public function update(Request $request)
	{
	    //update
		$emp = Kelas::Find($request->id); //mengambil data kelas berdasarkan id
		$empData = [
			'id_guru' => $request->id_guru,
			'id_tahun_ajaran' => $request->id_tahun_ajaran,
			'id_master_kelas' => $request->id_master_kelas,
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
		Kelas::destroy($id); //delete data
	}
}
