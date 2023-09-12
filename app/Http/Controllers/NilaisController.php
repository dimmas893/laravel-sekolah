<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaisController extends Controller
{
	// set index page view
	public function index()
	{
		return view('nilai.index');
	}

	// handle fetch all eamployees ajax request
	public function all()
	{
        //menampilkan data nilai
		$emps = Nilai::all(); //mengambil data nilai
		$output = '';
		$p = 1;
		if ($emps->count() > 0) {
			$output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Id User</th>
                <th>Benar</th>
                <th>Salah</th>
                <th>Kosong</th>
                <th>Score</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->id_user . '</td>
                <td>' . $emp->benar . '</td>
                <td>' . $emp->salah . '</td>
                <td>' . $emp->kosong . '</td>
                <td>' . $emp->score . '</td>
                <td>' . $emp->keterangan . '</td>
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
	   // tambah nilai
		$empData = [
			'id_user' => 1,
			'benar' => $request->benar,
			'salah' => $request->salah,
			'kosong' => $request->kosong,
			'score' => $request->score,
			'keterangan' => $request->keterangan,
		];
		Nilai::create($empData); //tambah data
		return response()->json([
			'status' => 200,
		]);
	}

	public function edit(Request $request)
	{
	    //edit
		$id = $request->id;
		$emp = Nilai::find($id); //mengambil data nilai berdasarkan id
		return response()->json($emp);
	}

	public function update(Request $request)
	{
	   // update/
		$emp = Nilai::Find($request->id);
		$empData = [
			'id_user' => 1,
			'benar' => $request->benar,
			'salah' => $request->salah,
			'kosong' => $request->kosong,
			'score' => $request->score,
			'keterangan' => $request->keterangan,
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
		Nilai::destroy($id); //delete data
	}

	public function penilaian(Request $request)
	{
		$jadwal = $request->jadwal_id;
		return view('nilai.penilaian.index', compact('jadwal'));
	}
}
