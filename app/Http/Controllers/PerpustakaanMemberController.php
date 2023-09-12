<?php

namespace App\Http\Controllers;

use App\Models\PerpustakaanMember;
use App\Models\User;
use Illuminate\Http\Request;

class PerpustakaanMemberController extends Controller
{
    public function index()
    {
        // menampilkan data member perpus
		$user = User::all(); //mengambil data user
        return view('perpustakaan_member.index', compact('user'));
    }

    public function all()
    {
        //menampilkan perpustakaan member
        $emps = PerpustakaanMember::all(); //mengambil data perpustakan member
        $output = '';
        $p = 1 ;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Status Aktif</th>
                <th>Tipe Member</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->user->name . '</td>
                <td>' . $emp->status_aktif . '</td>
                <td>' . $emp->tipe_member . '</td>
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
		$user = User::where('id', $request->user_id)->first(); //mengambil data user berdasarkan id user

		if($user){ //kondisi jk data ada
			$empData = [
				'user_id' => $user->id,
				'status_aktif' => 1,
				'tipe_member' => $user->role,
			];
			PerpustakaanMember::create($empData); //create data 
			return response()->json([
				'status' => 200,
			]);
		}

    }

    public function edit(Request $request)
    {
        //edit data ajax
        $id = $request->id;
        $emp = PerpustakaanMember::find($id); //mengambil data perpustakaan member berdasarkan id
        return response()->json($emp);
    }


    // handle update an Tu ajax request
    public function update(Request $request)
    {
        // update data
        $emp = PerpustakaanMember::Find($request->id); //mengambil data perpustakaan member berdasarkan id
 		$user = User::where('id', $emp->user_id)->first(); //mengambil data user berdasarkan id
        $empData = [
            'user_id' => $user->id,
            'status_aktif' => 1,
            'tipe_member' => $user->role,
        ];


        $emp->update($empData); //update data
        return response()->json([
            'status' => 200,
        ]);
    }

    public function delete(Request $request)
    {
        // delete data ajax
        $id = $request->id;
        PerpustakaanMember::destroy($id);
    }
}
