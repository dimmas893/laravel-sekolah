<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Tahun_ajaran;
use App\Models\TanggalSeleksi;
use Illuminate\Http\Request;

class TanggalSeleksiController extends Controller
{
    public function index()
    {
        //menampilkan data tanggal seleksi
        $tahunajaran = Tahun_ajaran::get();
        return view('tanggalseleksi.index', compact('tahunajaran'));
    }

    public function all()
    {
        //menampilkan data tanggl seleksi
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $emps = TanggalSeleksi::where('tahun_ajaran_id', $tahun)->get(); //mengambil data tanggal seleksi berdasarkan tahun ajaran yang berlangsung
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Tahun Ajaran</th>
                <th>Tanggal Mulai</th>
                <th>Gelombang</th>
                <th>Kuota</th>
                <th>Jenjang</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . Tahun_ajaran::where('id', $emp->tahun_ajaran_id)->first()->tahun_ajaran . '</td>
                <td>' . $emp->tanggalmulai . '</td>
                <td>' . $emp->gelombang . '</td>
                <td>' . $emp->kuota . '</td>
                <td>' . $emp->jenjang . '</td>
                <td>' . $emp->status . '</td>
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
        //proses menambahkan data ajax
        if ($request->status === 'aktif') {
            $empData = [
                'tahun_ajaran_id' => $request->tahun_ajaran_id,
                'tanggalmulai' => $request->tanggalmulai,
                'kuota' => $request->kuota,
                'jenjang' => $request->jenjang,
                'gelombang' => $request->gelombang,
                'status' => $request->status,
            ];
            TanggalSeleksi::create($empData); //create data TanggalSeleksi
            return response()->json([
                'status' => 200,
            ]);
        } else {
            $empData = [
                'tahun_ajaran_id' => $request->tahun_ajaran_id,
                'tanggalmulai' => $request->tanggalmulai,
                'kuota' => $request->kuota,
                'jenjang' => $request->jenjang,
                'gelombang' => $request->gelombang,
                'status' => $request->status,
            ];
            TanggalSeleksi::create($empData); //create data TanggalSeleksi
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        //edit data ajax
        $id = $request->id;
        $emp = TanggalSeleksi::find($id); //mengambil data tanggal seleksi berdasarkan id
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        //proses update data ajax
        $emp = TanggalSeleksi::Find($request->id); //mengambil data tanggalseleksi berdasarkan id
        if ($request->status === 'aktif') {
            $empData = [
                'tanggalmulai' => $request->tanggalmulai,
                'gelombang' => $request->gelombang,
                'kuota' => $request->kuota,
                'jenjang' => $request->jenjang,
                'status' => $request->status,
            ];
            $emp->update($empData); //update data
            return response()->json([
                'status' => 200,
            ]);
        } else {
            $empData = [
                'tanggalmulai' => $request->tanggalmulai,
                'gelombang' => $request->gelombang,
                'kuota' => $request->kuota,
                'jenjang' => $request->jenjang,
                'status' => $request->status,
            ];
            $emp->update($empData); //update data
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        //delete ajax
        $id = $request->id;
        TanggalSeleksi::destroy($id); //delete data berdasarkan id
    }
}
