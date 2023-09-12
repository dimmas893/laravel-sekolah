<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Guru_Kelas;
use App\Models\JenjangPendidikan;
use App\Models\Kelas;
use App\Models\Master_Kelas;
use App\Models\Mata_Pelajaran;
use App\Models\Setting;
use App\Models\Tahun_ajaran;
use Illuminate\Http\Request;

class Guru_KelasController extends Controller
{
    // set index page view
    public function index()
    {
        $guru = Guru::all();
        $tahun_ajaran = Tahun_ajaran::all();
        $kelas = Master_Kelas::all();
        $jenjang_pendidikan = JenjangPendidikan::all();
        return view('guru_kelas.index', compact('guru', 'tahun_ajaran', 'kelas', 'jenjang_pendidikan'));
    }

    public function ajax(Request $request)
    {
        //ajax select
        $setting = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran berdasarkan yg aktif
        $id = (int)$request->id; //mengambil data request id dr form input
        $emps = Master_Kelas::where('jenjang_pendidikan_id', $id)->get(); //mengambil data master kelas berdasarkann id
        $output = '';
        if ($id === 3) { //kondisi request id 3
            if ($emps->count() > 0) { //kondisi jika master kelas ada datanya
                $output .= '<label>Kelas</label>
            <select name="id_master_kelas" class="form-control">
						<option value="" selected disabled>---Pilih Kelas---</option>
			';
                foreach ($emps as $emp) {
                    $output .= '<option value="' . $emp->id . '" >' . $emp->name . '</option>';
                }
                $output .= '</select>';
                $output .= '<label>Jurusan</label>';
                $output .= '<select class="form-control" name="jurusan" >';
                $output .= '<option selected disabled>---Pilih Jurusan---</option>';
                $output .= '<option value="bahasa">Bahasa</option>';
                $output .= '<option value="ipa">Ipa</option>';
                $output .= '<option value="ips">Ips</option>';
                $output .= '</select>';
                // $output .= '<input type="text" name="jurusan" class="form-control" placeholder="Masukan jurusan" required/>';
                echo $output;
            } else {
                echo '<h1 class="text-center text-secondary my-5">Kelas Sudah terisi!</h1>';
            }
        } else { //kondisi request id tidak 3
            if ($emps->count() > 0) {
                $output .= '<label>Kelas</label>
            <select name="id_master_kelas" class="form-control">
						<option value="" selected disabled>---Pilih Kelas---</option>
			';
                foreach ($emps as $emp) {
                    $output .= '<option value="' . $emp->id . '" >' . $emp->name . '</option>';
                }
                $output .= '</select>';
                echo $output;
            } else {
                echo '<h1 class="text-center text-secondary my-5">Kelas Sudah terisi!</h1>';
            }
        }
    }

    public function ajaxlaporan(Request $request)
    {
        //ajax laporan
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $id = (int)$request->id; //mengambil data request id dr form input
        $emps = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($id) {
            $q->where('jenjang_pendidikan_id', $id);
        })->get(); //mengambil data kelas berdasarkan tahun ajara yang berlaku dan berdasarkan jenjang
        $output = '';
        if ($emps->count() > 0) { //kondisi data kelas ada
            $output .= '<label>Kelas</label>
            <select name="kelas_id" class="form-control">
						<option value="" selected disabled>---Pilih Kelas---</option>
			';
            foreach ($emps as $emp) {
                $output .= '<option value="' . $emp->id . '" >' . $emp->kelas->name . ' ' . $emp->jurusan;
            }
            $output .= '</option></select>';
            echo $output;
        } else {
            echo '  <label for="name">Kelas</label>
                                        <select class="form-control">
                                            <option disabled selected>Kelas tidak ada</option>
                                        </select>';
        }
    }

    public function all()
    {
        //menampilkan semua data kelas ajax
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $emps = Kelas::with('kelas', 'tahun_ajaran')->where('id_tahun_ajaran', $tahun)->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung
        $output = '';
        $p = 1;
        if ($emps->count() > 0) { //kondisi data kelas ada
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Jenjang</th>
                <th>Wali Kelas</th>
                <th>Tahun Ajaran</th>
                <th>Kuota</th>
                <th>Detail Kelas</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->kelas->name . '</td>
                <td>' . $emp->kelas->jenjang->nama . '</td>
                <td>' . $emp->guru->name . '</td>
                <td>' . $emp->tahun_ajaran->tahun_ajaran . '</td>
                <td>' . $emp->max . '</td>
                <td><a href="/kelas/detail/' . $emp->id . '" class="text-info mx-1"><i class="ion-eye h4"></i></a></td>
				<td>

							<a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editTUModal"><i class="ion-edit h4" data-pack="default" data-tags="on, off"></i></a>
							<a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="ion-trash-a h4" data-pack="default" data-tags="on, off"></i></a>
				</td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else { //kondisi jika data kelas tidak ada
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    public function store(Request $request)
    {
        //menambah data
        $idmasterkelas = (int)$request->id_master_kelas; //mengambil request id master kelas dr form input
        $masterkelas = Master_Kelas::where('id', $idmasterkelas)->first(); //mengambil data master kelas berdasarkan id

        if ($request->jurusan != null) { //kondisi request jurusan ada
            $empData = [
                'id_guru' => $request->id_guru,
                'max' => $request->max,
                'tingkatan_id' => $masterkelas->tingkatan_id,
                'id_tahun_ajaran' => $request->id_tahun_ajaran,
                'id_master_kelas' => $request->id_master_kelas,
                'jurusan' => $request->jurusan,
            ];
        }

        if ($request->jurusan === null) {  //kondisi request jurusan tidak ada
            $empData = [
                'id_guru' => $request->id_guru,
                'max' => $request->max,
                'tingkatan_id' => $masterkelas->tingkatan_id,
                'id_tahun_ajaran' => $request->id_tahun_ajaran,
                'id_master_kelas' => $request->id_master_kelas,
                'jurusan' => null,
            ];
        }

        Kelas::create($empData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        //edit data ajax
        $id = $request->id;
        $emp = Kelas::where('id', $id)->first(); //mengambil kelasberdasarkan id
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        //update data
        $emp = Kelas::Find($request->id); //mengambil data kelas berdasarkan kelas

        $tingkat = Master_Kelas::where('id', $request->id_master_kelas)->first(); //mengambil data master kelas berdasarkan id
        $empData = [
            'id_guru' => $request->id_guru,
            'max' => $request->max,
            'id_tahun_ajaran' => $request->id_tahun_ajaran,
        ];
        $emp->update($empData); //update data
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        //delete data ajax
        $id = $request->id;
        Kelas::destroy($id); //menghapus data
    }
}
