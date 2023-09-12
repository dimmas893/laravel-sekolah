<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mata_Pelajaran;
use App\Models\Ruangan;
use App\Models\Setting;
use App\Models\Tahun_ajaran;
use Illuminate\Http\Request;

class JadwalAdminController extends Controller
{
    public function index(Request $request)
    {
        //view index
        $tahun = Setting::first()->id_tahun_ajaran;
        $jenjang_pendidikan_id = $request->jenjang_pendidikan_id;
        $kelas = Kelas::with('kelas')->where('id', $request->kelas_id)->first(); //mengambil data kelas berdasarkan id
        $guru = Guru::all(); //mengambil semua data guru
        $mata_pelajaran = Mata_Pelajaran::where('tahun_ajaran_id', $tahun)->get(); //mengambil semua mata pelajaran berdasarkan tahun ajaran yang berlangsung
        $hari = Hari::all(); //mengambil data semua hari
        $ruangan = Ruangan::all(); //mengambil data semua ruangan
        $setting = Setting::first(); //mengambil data tahun ajaran, semester, fee yang sedang berlaku
        $tahun_ajaran = Tahun_ajaran::get(); //mengambil semua data tahun ajaran
        return view('admin.naikkelas.jadwal', compact('tahun_ajaran', 'guru', 'mata_pelajaran', 'hari', 'ruangan', 'kelas', 'jenjang_pendidikan_id'));
    }

    public function all($id)
    {
        //menampilkan dara jadwal berdasarkan kelas id dan tahun ajaran yang berlaku
        $setting = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yg berjalan
        $emps = Jadwal::with('guru', 'mata_pelajaran')->where('kelas_id', $id)->whereHas('kelasget', function ($q) use ($id, $setting) {
            $q->where('id', $id)->where('id_tahun_ajaran', $setting);
        })->get(); //mengambil data jadwal berdasarkan kelas id dan tahun ajaran yang berjalan
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Ruangan</th>
                <th>Guru Pengajar</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->ruangan->name . '</td>
                <td>' . $emp->guru->name . '</td>
                <td>' . $emp->mata_pelajaran->name . '</td>
                <td>' . $emp->hari->name . '</td>
                <td>' . substr($emp->jam_masuk, 0, 5) . '</td>
                <td>' .  substr($emp->jam_keluar, 0, 5) . '</td>
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
        //menambah data jadwal
        $awal = $request->jam_masuk . ':00';
        $akhir = $request->jam_keluar . ':00';
        $setting = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berjalan
        $jadwal = Jadwal::whereBetween('jam_masuk', [$awal, $akhir])->whereBetween('jam_keluar', [$awal, $akhir])->where('kelas_id', $request->kelas_id)->where('hari_id', $request->hari_id)->whereHas('kelasget', function ($q) use ($setting) {
            $q->where('id_tahun_ajaran', $setting);
        })->first(); //mengambil jadwal berdasarkan range tanggal dr request awal dan reqquest akhr, kelas id, hari id, dan tahun ajaran yang berjalan

        if ($jadwal === null) { //kondisi jika data jadwal tidak ada
            $empData = [
                'kelas_id' => $request->kelas_id,
                'jenjang_pendidikan_id' => $request->jenjang_pendidikan_id,
                'tingkatan_id' => $request->tingkatan_id,
                'ruangan_id' => $request->ruangan_id,
                'guru_id' => $request->guru_id,
                'mata_pelajaran_id' => $request->mata_pelajaran_id,
                'hari_id' => $request->hari_id,
                'jam_masuk' => $request->jam_masuk,
                'jam_keluar' => $request->jam_keluar
            ];
            Jadwal::create($empData); //create data jadwal
            return response()->json([
                'status' => 200,
            ]);
        } else { //kondisi data jadwal ada
            return response()->json([
                'status' => 400,
            ]);
        }
    }
    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        //edit data jadwal
        $id = $request->id;
        $emp = Jadwal::with('guru', 'mata_pelajaran')->where('id', $id)->first(); //mengambil data jadwal berdasarkan id
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        //uodate data jadwal
        $emp = Jadwal::Find($request->id); //mengambil data jadwal berdasarkan ud
        $awal = $request->jam_masuk;
        $akhir = $request->jam_keluar;
        $setting = Setting::first()->id_tahun_ajaran; //mengambil data ahun ajaran yang sedang berjalan
        $jadwal = Jadwal::whereBetween('jam_masuk', [$awal, $akhir])->whereBetween('jam_keluar', [$awal, $akhir])->where('kelas_id', $request->kelas_id)->where('hari_id', $request->hari_id)->whereHas('kelasget', function ($q) use ($setting) {
            $q->where('id_tahun_ajaran', $setting);
        })->first(); //mengambil jadwal berdasarkan range tanggal dr request awal dan reqquest akhr, kelas id, hari id, dan tahun ajaran yang berjalan
        if ($jadwal === null) { //kondisi jadwal tidak ada
            $empData = [
                'ruangan_id' => $request->ruangan_id,
                'guru_id' => $request->guru_id,
                'mata_pelajaran_id' => $request->mata_pelajaran_id,
                'hari_id' => $request->hari_id,
                'jam_masuk' => $request->jam_masuk,
                'jam_keluar' => $request->jam_keluar
            ];
            $emp->update($empData); //update data jadwal
            return response()->json([
                'status' => 200,
            ]);
        } else { //kondisi data jadwal ada
            return response()->json([
                'status' => 400,
            ]);
        }
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        //delete jadwal
        $id = $request->id;
        Jadwal::destroy($id); //menghapus data jadwal
    }
}
