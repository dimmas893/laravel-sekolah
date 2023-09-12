<?php

namespace App\Http\Controllers;

use App\Imports\GuruImport;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Str;
use File;
use Excel;

class GuruController extends Controller
{
    // set index page view
    public function index()
    {
        return view('guru.index');
    }

    public function edit_profile(Request $request, $id)
    {
        //edit profile
        $emp = Guru::Find($id); //mengambil data guru berdasarkan id
        
        //proses upload file
        $lampiranFulltextFile = null;
        if ($request->hasFile('avatar')) {

            if ($emp->avatar) {
                File::delete(public_path('/guru/' . $emp->avatar));
            }
            $file = $request->file('avatar');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/guru';

            $this->lampiranFulltextFile = 'foto-guru-' . $request->name . Str::random(5) . '.' . $file_extension;
            // $this->lampiranFulltextFile = $request->tahun_terbit.$request->singkatan_jenis.$kodeWilayah.$nomorPeraturan.'.'.$file_extension;
            $request->file('avatar')->move($lokasiFile, $this->lampiranFulltextFile);
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        } else {
            $this->lampiranFulltextFile = $emp->avatar;
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        }
        
        $empData = [
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'telp' => $request->telp,
            'avatar' => $lampiranFulltextFile,
        ];

        if ($request->password) { //kondisi request password ada
            $useree = [
                'password' => Hash::make($request->password),
            ];
            User::where('id', $emp->id_user)->update($useree); //update akun user guru
        }

        $emp->update($empData); //update data
        return back();
    }

    public function all()
    {
        //menampilka semua data guru
        $emps = Guru::all(); //mengambil semua data guru
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>name</th>
                <th>E-mail</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Gambar</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->name . '</td>
                <td>' . $emp->email . '</td>
                <td>' . $emp->alamat . '</td>
                <td>' . $emp->telp . '</td>
                <td><img src="/guru/' . $emp->avatar . '" width="50" class="img-thumbnail rounded-circle"></td>
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
        //menambah data guru
        
        //proses upload file
        $fotoFile = null;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/' . 'guru';
            $this->fotoFile = 'guru-' . Str::random(5) . '.' . $file_extension;
            $request->file('avatar')->move($lokasiFile, $this->fotoFile);
            $fotoFile = $this->fotoFile;
        }

        $user = [
            'name' => $request->name,
            'username' => $request->name,
            'email' => $request->email,
            'role' => 3,
            'password' => Hash::make($request->password),
        ];
        $usercreate = User::create($user); //create data user guru
        if ($usercreate) {
            $empData = [
                'id_user' => $usercreate->id,
                'name' => $usercreate->name,
                'email' => $usercreate->email,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'avatar' => $fotoFile
            ];
            Guru::create($empData); //create data guru
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        //edit data guru ajax
        $id = $request->id;
        $emp = Guru::find($id); //mengambil data guru berdasarkan id
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        //update data guru
        $fileName = '';
        $emp = Guru::Find($request->id); //mengambil data guru berdasarkan id
        
        //proses file
        $lampiranFulltextFile = null;
        if ($request->hasFile('avatar')) {

            if ($emp->avatar) {
                File::delete(public_path('/guru/' . $emp->avatar));
            }
            $file = $request->file('avatar');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/guru';

            $this->lampiranFulltextFile = 'guru-' . Str::random(5) . '.' . $file_extension;
            // $this->lampiranFulltextFile = $request->tahun_terbit.$request->singkatan_jenis.$kodeWilayah.$nomorPeraturan.'.'.$file_extension;
            $request->file('avatar')->move($lokasiFile, $this->lampiranFulltextFile);
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        } else {
            $this->lampiranFulltextFile = $emp->avatar;
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        }
        
        $empData = [
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'avatar' => $lampiranFulltextFile,
        ];
        $update = [
            'password' => Hash::make($request->password),
        ];
        if ($request->password) { //kondisi request password ada
            $user = User::where('id', $emp->id_user)->update($update); //update data user guru
        }
        $emp->update($empData); //update data guru
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        //delete guru ajax
        $id = $request->id;
        $emp = Guru::find($id); //mengambil data guru berdasarkan id
        User::destroy($emp->id_user); //delete user guru
        if (File::delete(public_path('/guru/' . $emp->avatar)) ) {
            Guru::destroy($id); //menghapus data guru
        } else {
            Guru::destroy($id); //menghapus data guru
        }
    }

    public function importguru(Request $request)
    {
        //import excel data guru
        $user = Excel::import(new GuruImport, $request->file); //import data berdasarkan request import file
        return back();
    }
}
