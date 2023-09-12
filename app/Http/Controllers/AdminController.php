<?php

namespace App\Http\Controllers;

use App\Imports\AdminImport;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Excel;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function importadmin(Request $request)
    {
        // import file create admin
        $user = Excel::import(new AdminImport, $request->file); //import berdasarkan request file dr form input;
        return back();
    }

    public function index()
    {
        return view('admin.index');
    }

    public function edit_profile(Request $request, $id)
    {
        //edit profile
        $emp = Admin::Find($id); //mengambil data admin berdasarkan id
        $empData = [
            'nomor_induk_pegawai' => $request->nomor_induk_pegawai,
            'nama_admin' =>  $request->name,
        ];
        $user = User::Find(Auth::user()->id); //mengambil data user berdasarkan id
        $create = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $user->update($create); //update data user
        $emp->update($empData); //update data admin
        return back();
    }

    // handle fetch all eamployees ajax request
    public function all()
    {
        //ajax
        $emps = Admin::all();
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Admin</th>
                <th>E-mail</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->nomor_induk_pegawai . '</td>
                <td>' . $emp->nama_admin . '</td>
                <td>' . $emp->email . '</td>
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
        //menmbah data
        if ($request->password) { //kondisi jika request password ada
            $user = [
                'name' => $request->nama_admin,
                'username' => $request->nama_admin,
                'email' => $request->email,
                'role' => 1,
                'password' => Hash::make($request->password),
            ];
            $ambil = User::create($user); //menambah data user
            $empData = [
                'nomor_induk_pegawai' => $request->nomor_induk_pegawai,
                'nama_admin' => $request->nama_admin,
                'email' => $request->email,
                'id_user' => $ambil->id,
            ];
            Admin::create($empData); //menambah data admin
            return response()->json([
                'status' => 200,
            ]);
        } else { //jika tidak ada request password
            $user = [
                'name' => $request->nama_admin,
                'username' => $request->nama_admin,
                'email' => $request->email,
                'role' => 1,
                'password' => Hash::make('password'),
            ];
            $ambil = User::create($user); //menambah data user
            $empData = [
                'nomor_induk_pegawai' => $request->nomor_induk_pegawai,
                'nama_admin' => $request->nama_admin,
                'email' => $request->email,
                'id_user' => $ambil->id,
            ];
            Admin::create($empData); //menambah data admin
            return response()->json([
                'status' => 200,
            ]);
        }
    }
    
    
    public function edit(Request $request)
    {
        //edit ajax
        $id = $request->id;
        $emp = Admin::find($id);
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        //update data admin
        $emp = Admin::Find($request->id); //mengambil data admin berdasarkan id
        $datauser = User::Find($emp->id_user); //mengambil data user berdasarkan id

        if ($request->password) { //kondisi jika data request password ada
            $user = [
                'name' => $request->nama_admin,
                'username' => $request->nama_admin,
                'email' => $request->email,
                'role' => 1,
                'password' => Hash::make($request->password),
            ];
            $datauser->update($user); //mengubah data user
            $empData = [
                'nomor_induk_pegawai' => $request->nomor_induk_pegawai,
                'nama_admin' => $request->nama_admin,
                'email' => $request->email,
            ];
            $emp->update($empData); //mengubah data admin
            return response()->json([
                'status' => 200,
            ]);
        } else { //kondisi jika data request password tidak ada
            $user = [
                'name' => $request->nama_admin,
                'username' => $request->nama_admin,
                'email' => $request->email,
                'role' => 1,
            ];
            $datauser->update($user); //mengubah data user
            $empData = [
                'nomor_induk_pegawai' => $request->nomor_induk_pegawai,
                'nama_admin' => $request->nama_admin,
                'email' => $request->email,
            ];
            $emp->update($empData); //mengubah data admin
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        $id = $request->id;
        $emp = Admin::find($id);
        User::where('id', $emp->id_user)->delete();
        Admin::destroy($id);
    }
}
