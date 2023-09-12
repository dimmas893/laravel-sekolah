<?php

namespace App\Http\Controllers;

use App\Imports\JadwalImport;
use App\Models\Absen;
use App\Models\Guru;
use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\JenjangPendidikan;
use App\Models\Kelas;
use App\Models\Master_Kelas;
use App\Models\Mata_Pelajaran;
use App\Models\Rincian_Siswa;
use App\Models\Ruangan;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\Tahun_ajaran;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Excel;

class jadwalController extends Controller
{
    public function jadwalilport(Request $request)
    {
        //import data
        $user = Excel::import(new JadwalImport, $request->file); //import data berdasarkan request file
        return back();
    }

    public function menutugas(Request $request)
    {
        //menu tugas
        $jadwal_id = $request->jadwal_id;

        $jadwal = Jadwal::where('id', $jadwal_id)->first(); //mengambil data jadwal berdasarkan id
        return view('jadwal.menu.tugas', compact('jadwal'));
    }
    public function menuubahabsen(Request $request)
    {
        //menu absen
        $jadwal_id = $request->jadwal_id;
        $setting = Setting::first(); //mengambil semua data seetting
        $jadwal = Jadwal::where('id', $jadwal_id)->first(); //mengambil data jadwal berdasarkan id
        $rincian_siswa = Siswa::where('kelas', $jadwal->kelas_id)->get(); //mengambil data siswa berdasarkan kelas id
        return view('jadwal.menu.absen', compact('jadwal', 'rincian_siswa', 'setting'));
    }
    public function menusiswa(Request $request)
    {
        //menu siswa
        $jadwal_id = $request->jadwal_id;
        $setting = Setting::first(); //mengambil data setting
        $jadwal = Jadwal::where('id', $jadwal_id)->first(); //mengambil data jadwal berdasarkan id
        $rincian_siswa = Siswa::where('kelas', $jadwal->kelas_id)->get(); //mengambil data siswa berdasarkan kelas id
        return view('jadwal.menu.siswa', compact('jadwal', 'rincian_siswa', 'setting'));
    }
    public function menuabsenmassal(Request $request)
    {
        // absen massal
        $jadwal_id = $request->jadwal_id;
        $setting = Setting::first();
        $jadwal = Jadwal::where('id', $jadwal_id)->first(); //mengambil data jadwal berdasarkan id

        $rincian_siswa = Siswa::where('kelas', $jadwal->kelas_id)->get(); //mengambil data siswa berdasarkan kelas id
        $cekabsen = Absen::where('jadwal_id', $jadwal->id)->where('tahun_ajaran', $setting->id_tahun_ajaran)->where('semester', $setting->semester)->where('tanggal', Carbon::now()->Format('Y-m-d'))->count(); //menghitung data absen berdasarkan jadwal, semester yang berlaku,tahun ajaran yang berlaku dan berdasarkan tanggal hari ini
        $cekabsen_get = Absen::where('jadwal_id', $jadwal->id)->where('tahun_ajaran', $setting->id_tahun_ajaran)->where('semester', $setting->semester)->where('tanggal', Carbon::now()->Format('Y-m-d'))->get(); //mengambil data absen berdasarkan jadwal, semester yang berlaku,tahun ajaran yang berlaku dan berdasarkan tanggal hari ini

        $tampung_absen = [];  // menampung semua data $absen
        $laporan = []; // menampung semua data $row
        foreach ($rincian_siswa as $p) {
            $absen = Absen::with('jadwal', 'siswa')->where('siswa_id', $p->id)->where('jadwal_id', $jadwal->id)->where('semester', $setting->semester)->where('tahun_ajaran', $setting->id_tahun_ajaran)->orderBy('id', 'DESC')->first(); //menghitung data absen berdasarkan jadwal, semester yang berlaku,tahun ajaran yang berlaku, siswa id
            array_push($tampung_absen, $absen); // menampung semua data $absen
        }
        if ($rincian_siswa) {
            foreach ($tampung_absen as $pe) {
                if ($pe) {
                    $hadir = $pe->where('siswa_id', $pe->siswa_id)->where('tahun_ajaran', $setting->id_tahun_ajaran)->where('semester', $setting->semester)->where('jadwal_id', $pe->jadwal_id)->where('tipe_kehadiran', '0')->count(); //menghitung data absen berdasarkan jadwal, semester yang berlaku,tahun ajaran yang berlaku, siswa id dengan tipe kehadiaran 0
                    $sakit = $pe->where('siswa_id', $pe->siswa_id)->where('tahun_ajaran', $setting->id_tahun_ajaran)->where('semester', $setting->semester)->where('jadwal_id', $pe->jadwal_id)->where('tipe_kehadiran', '1')->count(); //menghitung data absen berdasarkan jadwal, semester yang berlaku,tahun ajaran yang berlaku, siswa id dengan tipe kehadiaran 1
                    $izin = $pe->where('siswa_id', $pe->siswa_id)->where('tahun_ajaran', $setting->id_tahun_ajaran)->where('semester', $setting->semester)->where('jadwal_id', $pe->jadwal_id)->where('tipe_kehadiran', '2')->count(); //menghitung data absen berdasarkan jadwal, semester yang berlaku,tahun ajaran yang berlaku, siswa id dengan tipe kehadiaran 2
                    $alpha = $pe->where('siswa_id', $pe->siswa_id)->where('tahun_ajaran', $setting->id_tahun_ajaran)->where('semester', $setting->semester)->where('jadwal_id', $pe->jadwal_id)->where('tipe_kehadiran', '3')->count(); //menghitung data absen berdasarkan jadwal, semester yang berlaku,tahun ajaran yang berlaku, siswa id dengan tipe kehadiaran 3
                    $row['siswa'] = $pe['siswa']['nama_siswa'];
                    $row['jadwal'] = $pe['jadwal']['kelasget']['kelas']['name'] . ' / ' . $pe['jadwal']['ruangan']['name'] . ' / ' . $pe['jadwal']['mata_pelajaran']['name'];
                    $row['pertemuan'] = $hadir + $sakit + $izin + $alpha;
                    $row['hadir'] = $hadir;
                    $row['sakit'] = $sakit;
                    $row['izin'] = $izin;
                    $row['alpha'] = $alpha;
                    array_push($laporan, $row);
                }
            }
        }
        return view('jadwal.menu.absen-massal', compact('rincian_siswa', 'jadwal', 'setting', 'cekabsen', 'cekabsen_get', 'laporan'));
    }

    public function jadwal_buat_guru()
    {

        $datahari = Hari::all();
        $tanggal = Carbon::now()->isoFormat('dddd'); //format hari ini
        $hari = Hari::where('name', $tanggal)->first(); //mengambil data hari berdasarkan hari ini
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran berdasarkan yang berjalan
        $user = User::where('id', Auth::user()->id)->first(); //mengambil data user yang sedang login
        if ($user->role == 3) { //guru
            $guru = Guru::where('id_user', $user->id)->first();
            $jadwal = Jadwal::with('ruangan', 'kelasget', 'mata_pelajaran', 'guru', 'hari')->where('hari_id', $hari->id)->where('guru_id', $guru->id)->whereHas('kelasget', function ($q) use ($tahun) {
                $q->where('id_tahun_ajaran', $tahun);
            })->orderBy('jam_masuk', 'ASC')->get(); //mengambil data jadwal berdasarkan hari id, guru id, dan tahun ajaran yang sedang berlangsung
            return view('guru.halaman_user.jadwal', compact('jadwal', 'datahari', 'hari'));
        } else { //kondisi jika bukan guru yang mengakses
            return back()->with('gagalmasuk', 'ds');
        }
    }

    public function pilihjenjang(Request $request)
    {
        //pilih jenjang
        $jenjangpenddian = JenjangPendidikan::all(); //menampilkan semua data jenjang
        return view('jadwal.pilihjenjang', compact('jenjangpenddian'));
    }

    public function pilihkelas(Request $request)
    {
        //memilih kelas

        $tahun = Setting::first()->id_tahun_ajaran;
        $kelasid = $request->kelas_id;
        $guru = Guru::all(); //mengambil semua data guru
        $mata_pelajaran = Mata_Pelajaran::where('tahun_ajaran_id', $tahun)->get(); //mengambil semua data mata pelajaran
        $hari = Hari::all(); //mengambil semua data hari
        $ruangan = Ruangan::all(); //mengambil semua data ruangan
        $jenjangpenddian = JenjangPendidikan::all(); //mengambil semua data jenjang pendidikan
        $kelas = Kelas::with('kelas')->where('id', $kelasid)->first(); //mengambil data kelas berdasarkan kelas id
        $tingkatan = Master_Kelas::where('id', $kelas->id_master_kelas)->first()->tingkatan_id; //mengambil data tingkatan id di master kelas berdasarkan id
        return view('jadwal.pilihkelas', compact('guru', 'mata_pelajaran', 'ruangan', 'hari', 'jenjangpenddian', 'kelas', 'tingkatan'));
    }


    public function DataKelasTable(Request $request)
    {
        //data kelas ajax
        $id = $request->id;
        $emps = Jadwal::with('guru', 'mata_pelajaran', 'kelasget')->where('kelas_id', $id)->get(); //mengambil data jadwal berdasarkan kelas id
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
                <td>' . $emp->jam_masuk . '</td>
                <td>' . $emp->jam_keluar . '</td>
				<td>

                  <a href="#" id="' . $emp->id . '" jenjang_id="' . $emp->kelasget->kelas->jenjang_pendidikan_id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editTUModal"><i class="ion-edit h4" data-pack="default" data-tags="on, off"></i></a>
                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="ion-trash-a h4" data-pack="default" data-tags="on, off"></i></a>
				</td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Jadwal belum di buat</h1>';
        }
    }

    public function jenjang($id)
    {
        //memilih jenjang
        $datanya = Master_Kelas::where('Jenjang_pendidikan_id', $id)->get(); // mengambil data master kelas berdasarkan jenjang
        $items = []; // kumpulan data dr $row

        foreach ($datanya as $data) {
            $row['id'] = $data->id;
            $row['name'] = $data->name;
            array_push($items, $row); //kumpulan data dr $row
        }
        return response()->json($items, 200);
    }

    public function index()
    {
        // menampilkan data jadwal

        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data setting
        $guru = Guru::all(); //mengambil data guru
        $mata_pelajaran = Mata_Pelajaran::where('tahun_ajaran_id', $tahun)->get(); //mengambil semua data mata pelajaran
        $kelas = kelas::with('kelas')->get(); //mengambil semua data kelas
        $hari = Hari::all(); //mengambil data semua hari
        $ruangan = Ruangan::all(); //mengambil semua data ruangan
        $jenjangpenddian = JenjangPendidikan::all(); //mengambil semua data jenjang

        $setting = Setting::first(); //mengambil data setting
        $tahun_ajaran = Tahun_ajaran::get(); //mengambil semua data tahun ajaran
        return view('jadwal.index', compact('tahun_ajaran', 'guru', 'mata_pelajaran', 'kelas', 'hari', 'ruangan', 'jenjangpenddian'));
    }

    public function kelas_edit(Request $request)
    {
        //edit ajax
        $setting = Setting::first(); //mengambil data setting
        $id = $request->id;
        $emps = Kelas::where('id_tahun_ajaran', $setting->id_tahun_ajaran)->with(['kelas'])
            ->whereHas('kelas', function ($q) use ($id) {
                $q->where('jenjang_pendidikan_id', '=', $id);
            })
            ->get(); //mengambil data kelas berdasarkan tahun ajaran yang berjalan dan jenjang

        $output = '';
        if ($emps->count() > 0) { //kondisi jika data kelas ada
            $output .= '<select name="kelas_id" class="form-control">
						<option value="" selected disabled>---Pilih Kelas---</option>
			';
            foreach ($emps as $emp) {
                // $jadwal = Jadwal::where('kelas_id', $emp->id)->first();
                // if ($jadwal == null) {
                $output .= '<option value="' . $emp->id . '" >' . $emp->kelas->name . '</option>';
                // }
            }
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Kelas Sudah terisi!</h1>';
        }
    }

    public function kelas(Request $request)
    {
        //menampilkan data kelas ajax
        $setting = Setting::first();
        $id = $request->id;
        $emps = Kelas::where('id_tahun_ajaran', $setting->id_tahun_ajaran)->with(['kelas'])
            ->whereHas('kelas', function ($q) use ($id) {
                $q->where('jenjang_pendidikan_id', $id); // '=' is optional
            })
            ->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlaku dan jenjang pendidikan

        $output = '';
        if ($emps->count() > 0) {
            $output .= '<select name="kelas_id" class="form-control">
						<option value="" selected disabled>---Pilih Kelas---</option>
			';
            foreach ($emps as $emp) {
                $output .= '<option value="' . $emp->id . '" >' . $emp->kelas->name . '</option>';
            }
            $output .= '</select>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Kelas Sudah terisi!</h1>';
        }
    }

    public function kelasEdit(Request $request)
    {
        //edit kelas ajax
        $setting = Setting::first(); //mengambil data seting
        $id = $request->id;
        $jadwal = Jadwal::with('guru', 'mata_pelajaran', 'kelasget')->where('id', $id)->first(); //mengambil data jadwal berdasarkan id
        $jadal_id = $jadwal->kelasget->kelas->jenjang_pendidikan_id;
        $emps = Kelas::with('kelas')->where('id_tahun_ajaran', $setting->id_tahun_ajaran)->with(['kelas'])
            ->whereHas('kelas', function ($q) use ($jadal_id) {
                $q->where('jenjang_pendidikan_id', $jadal_id); // '=' is optional
            })->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung da jenjang
        $output = '';
        if ($emps->count() > 0) { //kondisi jika jadwal ada
            $output .= '<select name="kelas_id" id="kelas_id" class="form-control">
			';
            if ($jadwal) { //kondisi jika jadwal ada
                $output .= '<option value="" >' . $jadwal->kelasget->kelas->name . '</option>';
            }
            foreach ($emps as $emp) {
                if ($jadwal->kelas_id != $emp->id) {
                    $output .= '<option value="' . $emp->id . '" >' . $emp->kelas->name . '</option>';
                }
            }
            $output .= '</select>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Kelas Sudah terisi!</h1>';
        }
    }

    public function backupsma()
    {
        //menampilkan data kelas ajax
        $setting = Setting::first(); //mengambil data setting
        $sma1 = 3;
        $emps = Kelas::where('id_tahun_ajaran', $setting->id_tahun_ajaran)->with(['kelas'])
            ->whereHas('kelas', function ($q) use ($sma1) {
                $q->where('jenjang_pendidikan_id', '=', $sma1); // '=' is optional
            })
            ->get(); //mengambil data kelas berdasarkan tahun ajaran yang berjalan dan berdasarkan jenjang
        $output = '';
        if ($emps->count() > 0) {
            $output .= '<select name="kelas_id" class="form-control">
						<option value="" selected disabled>---Pilih Kelas---</option>
			';
            foreach ($emps as $emp) {
                $jadwal = Jadwal::where('kelas_id', $emp->id)->first(); //mengambil data jadwal berdasarkan kelas_id
                if ($jadwal == null) {
                    $output .= '<option value="' . $emp->id . '" >' . $emp->kelas->name . '</option>';
                }
            }
            $output .= '</select';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Kelas Sudah terisi!</h1>';
        }
    }


    public function all()
    {
        //menampilkan data jadwal ajax
        $emps = Jadwal::with('guru', 'mata_pelajaran', 'kelasget')->get(); //mengambil data jadwal
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Ruangan</th>
                <th>Guru Pengajar</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Lihat Siswa</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->kelasget->kelas->name . '</td>
                <td>' . $emp->ruangan->name . '</td>
                <td>' . $emp->guru->name . '</td>
                <td>' . $emp->mata_pelajaran->name . '</td>
                <td>' . $emp->hari->name . '</td>
                <td>' . $emp->jam_masuk . '</td>
                <td>' . $emp->jam_keluar . '</td>
                <td>
				  <a href="/jadwal/semua_siswa/' . $emp->id . '" class="text-info" /><i class="ion-eye h4"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    public function jadwal_semua_siswa($id)
    {
        //menampilkan siswa berdasarkan kelas
        $jadwal = Jadwal::where('id', $id)->first(); //mengambil data jadwal berdasarkan id
        $rincian_siswa = Siswa::where('kelas', $jadwal->kelas_id)->get(); //mengambil data siswa berdasarkan kelas
        $count = Siswa::where('kelas', $jadwal->kelas_id)->count(); // menghitung siswa berdasarkan kelas id

        $setting = Setting::first(); //mengamdil data setting

        return view('jadwal.semua_siswa', compact('rincian_siswa', 'jadwal', 'count', 'setting'));
    }

    // handle insert a new Tu ajax request
    public function store(Request $request)
    {
        //menambah jadwal
        $jadwal = Jadwal::whereBetween('jam_masuk', [$request->jam_masuk, $request->jam_keluar])->where('ruangan_id', $request->ruangan_id)->where('hari_id', $request->hari_id)->first(); //mengambil data jadwal berdasarkan range antara jam masuk dan jam keluar, ruangan id, hari id
        if ($jadwal == null) { //kondisi jika jadwal ada
            $empData = [
                'kelas_id' => $request->kelas_id,
                'tingkatan_id' => $request->tingkatan,
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
        } else { //kondisi jika data jadwal ada
            return response()->json([
                'status' => 400,
            ]);
        }
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        //edit data
        $id = $request->id;
        $emp = Jadwal::with('guru', 'mata_pelajaran', 'kelasget')->where('id', $id)->first(); //mengambil data jadwal berdasarkan id
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        //update data
        $emp = Jadwal::Find($request->id); //mengambil data jadwal berdasarkan id
        $jadwal = Jadwal::whereBetween('jam_masuk', [$request->jam_masuk, $request->jam_keluar])->where('ruangan_id', $request->ruangan_id)->where('hari_id', $request->hari_id)->first(); //mengambil data jadwal berdasarkan range antara jam masuk dan jam keluar, ruangan id, hari id
        if ($jadwal == null) {
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
        } else { //kondisi jika data jadwal ada
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
        Jadwal::destroy($id); //delete jadwal berdasarkan id yg di pilih
    }

    public function jadwalpilih($id)
    {
        //menampilkan data jadwal siswa berdasarkan hari yang dipilih
        $siswa_id = Siswa::where('id_user', Auth::user()->id)->first(); //mengambil data siswa berdasarkan yang login
        $tahun = Setting::first()->id_tahun_ajaran; //mengamil data tahun ajaran yang berlangsung
        $hari = Hari::where('id', $id)->first(); //mengambil data hari berdasarkan id
        $datahari = Hari::all(); //mengambil semua data hari
        $kelas = $siswa_id->kelas;
        if ($siswa_id) { //kondisi jika data siswa ada
            $jadwal = Jadwal::with('kelasget', 'mata_pelajaran', 'ruangan')->where('hari_id', $id)->whereHas('kelasget', function ($q) use ($tahun, $kelas) {
                $q->where('id_tahun_ajaran', $tahun)->where('id', $kelas);
            })->get(); //mengambil data jadwal berdasarkan tahun ajaran yang berlangsung
            return view('siswa.halaman_user.pelajaranharipilih', compact('jadwal', 'hari', 'datahari'));
        } else {
            return back()->with('guruerror', 'ds');
        }
    }
    public function jadwalpilihguru($id)
    {
        //menampilkan data jadwal siswa berdasarkan hari yang dipilih
        $guru = Guru::where('id_user', Auth::user()->id)->first(); //mengambil data siswa berdasarkan yang login
        $tahun = Setting::first()->id_tahun_ajaran; //mengamil data tahun ajaran yang berlangsung
        $hari = Hari::where('id', $id)->first(); //mengambil data hari berdasarkan id
        $datahari = Hari::all(); //mengambil semua data hari
        if ($guru) { //kondisi jika data siswa ada
            $jadwal = Jadwal::with('kelasget', 'mata_pelajaran', 'ruangan')->where('guru_id', $guru->id)->where('hari_id', $id)->whereHas('kelasget', function ($q) use ($tahun) {
                $q->where('id_tahun_ajaran', $tahun);
            })->get(); //mengambil data jadwal berdasarkan tahun ajaran yang berlangsung
            return view('guru.halaman_user.jadwalpilih', compact('jadwal', 'hari', 'datahari'));
        } else {
            return back()->with('guruerror', 'ds');
        }
    }
}
