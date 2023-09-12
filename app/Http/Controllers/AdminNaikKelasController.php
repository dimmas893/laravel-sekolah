<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Master_Kelas;
use App\Models\Mata_Pelajaran;
use App\Models\Ruangan;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\Tingkatan;
use Illuminate\Http\Request;

class AdminNaikKelasController extends Controller
{
    public function Ajaxtk(Request $request)
    {
        //ajax filter jadwal 
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $id = $request->id; //request id dr form input
        $emps = Jadwal::with('mata_pelajaran', 'ruangan', 'guru', 'hari')->where('kelas_id', $id)->whereHas('kelasget', function ($q) use ($tahun) {
            $q->where('id_tahun_ajaran', $tahun); // mengambil data relasi kelas berdasarkan tahun ajaran yang berlangsung
        })->get(); // mengambil data jadwal berdasarkan kelas id dan relasi kelas berdasarkan tahun ajaran yang berlangsung
        $p = 1;
        $output = '';
        $kelas = Kelas::with('kelas')->where('id', $id)->first(); //mengambil data kelas berdasarkan id
        if ($kelas) { //kondisi jika data kelas ada
            $output .= '<div class="card shadow card-primary">';
            $output .= ' <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                <h3 class="text-light">' . Master_Kelas::where('id', $kelas->id_master_kelas)->first()->name . '</h3>
                                                <form action="/jadwal-admin" method="get">
                                                    <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                                    <input type="hidden" name="kelas_id" value="' . $kelas->id . '" />
                                                    <input type="hidden" name="jenjang_pendidikan_id" value="' . $kelas->kelas->jenjang_pendidikan_id . '" />
                                                    <input type="submit" class="btn btn-light" value="Masuk">
                                                </form>
                                            </div>';
        }
        if ($id && $emps->count() > 0) { //kondisi jika request id ada dan data jadwal ada
            $output .= '<div class="card-body"><table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Ruangan</th>
                <th>Guru Pengajar</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
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
                <td>' . substr($emp->jam_keluar, 0, 5) . '</td>
              </tr>';
            }
            $output .= '</tbody></table></div></div>';
            echo $output;
        }
        if ($id && $emps->count() === 0) { //kondisi jika request id dan data jadwal tidak ada
            $output .= '<div class="card-body"><table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Ruangan</th>
                <th>Guru Pengajar</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
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
                <td>' . substr($emp->jam_keluar, 0, 5) . '</td>
              </tr>';
            }
            $output .= '</tbody></table></div></div>';
            echo $output;
        }
        if ($emps->count() === 0 && $id === null) { //kondisi jika data jadwal tidak ada dan request id juga tidak ada
            $jenjang = 4;
            $smp = Kelas::with('kelas')->where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjang) {
                $q->where('jenjang_pendidikan_id', $jenjang);
            })->select('id', 'id_master_kelas')->groupBy('id', 'id_master_kelas')->get();
            $p = 1;
            $output = '';
            foreach ($smp as $item) {
                $output .= '<div class="card shadow card-primary">';
                $output .= ' <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                <h3 class="text-light">' . Master_Kelas::where('id', $item->id_master_kelas)->first()->name . '</h3>
                                                <form action="/jadwal-admin" method="get">
                                                    <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                                    <input type="hidden" name="kelas_id" value="' . $item->id . '" />
                                                    <input type="hidden" name="jenjang_pendidikan_id" value="' . $item->kelas->jenjang_pendidikan_id . '" />
                                                    <input type="submit" class="btn btn-light" value="Masuk">
                                                </form>
                                            </div>';
                $jadwal = \App\Models\Jadwal::with('mata_pelajaran', 'ruangan', 'guru', 'hari')
                    ->where('kelas_id', $item->id)
                    ->get();
                $output .= '<div class="card-body"><table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Ruangan</th>
                <th>Guru Pengajar</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
              </tr>
            </thead>
            <tbody>';
                foreach ($jadwal as $emp) {
                    $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->ruangan->name . '</td>
                <td>' . $emp->guru->name . '</td>
                <td>' . $emp->mata_pelajaran->name . '</td>
                <td>' . $emp->hari->name . '</td>
                <td>' . substr($emp->jam_masuk, 0, 5) . '</td>
                <td>' . substr($emp->jam_keluar, 0, 5) . '</td>
              </tr>';
                }
                $output .= '</tbody></table></div></div>';
            }
            echo $output;
        }
    }
    public function AjaxSd(Request $request)
    {
        //ajax filter jadwal 
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $id = $request->id; //mengambil data request id dr form input
        $emps = Jadwal::with('mata_pelajaran', 'ruangan', 'guru', 'hari')->where('kelas_id', $id)->whereHas('kelasget', function ($q) use ($tahun) {
            $q->where('id_tahun_ajaran', $tahun);
        })->get(); //mengambil data jadwal berdasarkan kelas id dan tahun ajaran yang berlangsung
        $p = 1;
        $output = '';
        $kelas = Kelas::with('kelas')->where('id', $id)->first(); //mengambil data kels berdasarkan id
        if ($kelas) { //kondisi jika  data kelas ada
            $output .= '<div class="card shadow card-primary">';
            $output .= ' <div class="card-header d-flex justify-content-between align-items-center">
                                                Kelas
                                                ' . Master_Kelas::where('id', $kelas->id_master_kelas)->first()->name . '
                                                <form action="/jadwal-admin" method="get">
                                                    <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                                    <input type="hidden" name="kelas_id" value="' . $kelas->id . '" />
                                                    <input type="hidden" name="jenjang_pendidikan_id" value="' . $kelas->kelas->jenjang_pendidikan_id . '" />
                                                    <input type="submit" class="btn btn-primary" value="Masuk">
                                                </form>
                                            </div>';
        }
        if ($id && $emps->count() > 0) { //kondisi jika request id dan data jadwal ada
            $output .= '<div class="card-body"><table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Ruangan</th>
                <th>Guru Pengajar</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
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
                <td>' . substr($emp->jam_keluar, 0, 5) . '</td>
              </tr>';
            }
            $output .= '</tbody></table></div></div>';
            echo $output;
        }
        if ($id && $emps->count() === 0) { //kondisi jika request id ada dan data jadwal tidak ada
            $output .= '<div class="card-body"><table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Ruangan</th>
                <th>Guru Pengajar</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
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
                <td>' . substr($emp->jam_keluar, 0, 5) . '</td>
              </tr>';
            }
            $output .= '</tbody></table></div></div>';
            echo $output;
        }
        if ($emps->count() === 0 && $id === null) { //kondisi jika data jadwal dan data request id tidak ada
            $jenjang = 1;
            $smp = Kelas::with('kelas')->where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjang) {
                $q->where('jenjang_pendidikan_id', $jenjang);
            })->select('id', 'id_master_kelas')->groupBy('id', 'id_master_kelas')->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung jan jenjang sd
            $p = 1;
            $output = '';
            foreach ($smp as $item) {
                $output .= '<div class="card shadow card-primary">';
                $output .= ' <div class="card-header d-flex justify-content-between align-items-center">
                                                Kelas
                                                ' . Master_Kelas::where('id', $item->id_master_kelas)->first()->name . '
                                                <form action="/jadwal-admin" method="get">
                                                    <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                                    <input type="hidden" name="jenjang_pendidikan_id" value="' . $item->kelas->jenjang_pendidikan_id . '" />
                                                    <input type="hidden" name="kelas_id" value="' . $item->id . '" />
                                                    <input type="submit" class="btn btn-primary" value="Masuk">
                                                </form>
                                            </div>';
                $jadwal = \App\Models\Jadwal::with('mata_pelajaran', 'ruangan', 'guru', 'hari')
                    ->where('kelas_id', $item->id)
                    ->get();
                $output .= '<div class="card-body"><table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Ruangan</th>
                <th>Guru Pengajar</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
              </tr>
            </thead>
            <tbody>';
                foreach ($jadwal as $emp) {
                    $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->ruangan->name . '</td>
                <td>' . $emp->guru->name . '</td>
                <td>' . $emp->mata_pelajaran->name . '</td>
                <td>' . $emp->hari->name . '</td>
                <td>' . substr($emp->jam_masuk, 0, 5) . '</td>
                <td>' . substr($emp->jam_keluar, 0, 5) . '</td>
              </tr>';
                }
                $output .= '</tbody></table></div></div>';
            }
            echo $output;
        }
    }
    public function AjaxSmp(Request $request)
    {
        //filter data jadwal
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $id = $request->id; //mengambil data request id dr form input
        $emps = Jadwal::with('mata_pelajaran', 'ruangan', 'guru', 'hari')->where('kelas_id', $id)->whereHas('kelasget', function ($q) use ($tahun) {
            $q->where('id_tahun_ajaran', $tahun);
        })->get(); //mengambil data jadwl berdasarkan kelas id dan jenjang smp
        $p = 1;
        $output = '';
        $kelas = Kelas::with('kelas')->where('id', $id)->first();
        if ($kelas) {
            $output .= '<div class="card shadow card-primary">';
            $output .= ' <div class="card-header d-flex justify-content-between align-items-center">
                                                Kelas
                                                ' . Master_Kelas::where('id', $kelas->id_master_kelas)->first()->name . '
                                                <form action="/jadwal-admin" method="get">
                                                    <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                                    <input type="hidden" name="kelas_id" value="' . $kelas->id . '" />
                                                    <input type="hidden" name="jenjang_pendidikan_id" value="' . $kelas->kelas->jenjang_pendidikan_id . '" />
                                                    <input type="submit" class="btn btn-primary" value="Masuk">
                                                </form>
                                            </div>';
        }
        if ($id && $emps->count() > 0) { //kondisi jika request id dan data jadwal ada
            $output .= '<div class="card-body"><table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Ruangan</th>
                <th>Guru Pengajar</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
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
                <td>' . substr($emp->jam_keluar, 0, 5) . '</td>
              </tr>';
            }
            $output .= '</tbody></table></div></div>';
            echo $output;
        }
        if ($id && $emps->count() === 0) { //kondisi jika request id ada dan data jadwal tidak ada
            $output .= '<div class="card-body"><table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Ruangan</th>
                <th>Guru Pengajar</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
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
                <td>' . substr($emp->jam_keluar, 0, 5) . '</td>
              </tr>';
            }
            $output .= '</tbody></table></div></div>';
            echo $output;
        }
        if ($emps->count() === 0 && $id === null) { //kondisi jika request id dan data jadwal tidak ada
            $jenjang = 2;
            $smp = Kelas::with('kelas')->where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjang) {
                $q->where('jenjang_pendidikan_id', $jenjang);
            })->select('id', 'id_master_kelas')->groupBy('id', 'id_master_kelas')->get();
            $p = 1;
            $output = '';
            foreach ($smp as $item) {
                $output .= '<div class="card shadow card-primary">';
                $output .= ' <div class="card-header d-flex justify-content-between align-items-center">
                                                Kelas
                                                ' . Master_Kelas::where('id', $item->id_master_kelas)->first()->name . '
                                                <form action="/jadwal-admin" method="get">
                                                    <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                                    <input type="hidden" name="kelas_id" value="' . $item->id . '" />
                                                    <input type="hidden" name="jenjang_pendidikan_id" value="' . $item->kelas->jenjang_pendidikan_id . '" />
                                                    <input type="submit" class="btn btn-primary" value="Masuk">
                                                </form>
                                            </div>';
                $jadwal = \App\Models\Jadwal::with('mata_pelajaran', 'ruangan', 'guru', 'hari')
                    ->where('kelas_id', $item->id)
                    ->get();
                $output .= '<div class="card-body"><table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Ruangan</th>
                <th>Guru Pengajar</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
              </tr>
            </thead>
            <tbody>';
                foreach ($jadwal as $emp) {
                    $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->ruangan->name . '</td>
                <td>' . $emp->guru->name . '</td>
                <td>' . $emp->mata_pelajaran->name . '</td>
                <td>' . $emp->hari->name . '</td>
                <td>' . substr($emp->jam_masuk, 0, 5) . '</td>
                <td>' . substr($emp->jam_keluar, 0, 5) . '</td>
              </tr>';
                }
                $output .= '</tbody></table></div></div>';
            }
            echo $output;
        }
    }

    public function AjaxSma(Request $request)
    {
        //filter data jadwal
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $id = $request->id; //mengambil data request id
        $emps = Jadwal::with('mata_pelajaran', 'ruangan', 'guru', 'hari')->where('kelas_id', $id)->whereHas('kelasget', function ($q) use ($tahun) {
            $q->where('id_tahun_ajaran', $tahun);
        })->get(); //mengambil data jadwal berdasarkan kelas id dan tahun ajaran yang berlangsung
        $p = 1;
        $output = '';
        $kelas = Kelas::with('kelas')->where('id', $id)->first(); //mengambil data kelas berdasarkan id
        if ($kelas) {
            $output .= '<div class="card shadow card-primary">';
            $output .= ' <div class="card-header d-flex justify-content-between align-items-center">
                                                Kelas
                                                ' . $kelas->kelas->name . ' - ' . $kelas->jurusan . '
                                                <form action="/jadwal-admin" method="get">
                                                    <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                                    <input type="hidden" name="kelas_id" value="' . $kelas->id . '" />
                                                    <input type="hidden" name="jenjang_pendidikan_id" value="' . $kelas->kelas->jenjang_pendidikan_id . '" />
                                                    <input type="submit" class="btn btn-primary" value="Masuk">
                                                </form>
                                            </div>';
        }
        if ($id && $emps->count() > 0) { //kondisi jika request id dan data jadwal ada
            $output .= '<div class="card-body"><table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Ruangan</th>
                <th>Guru Pengajar</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
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
                <td>' . substr($emp->jam_keluar, 0, 5) . '</td>
              </tr>';
            }
            $output .= '</tbody></table></div></div>';
            echo $output;
        }
        if ($id && $emps->count() === 0) { //kondisi jikarequest id ada dan daata jadwal tidak ada
            $output .= '<div class="card-body"><table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Ruangan</th>
                <th>Guru Pengajar</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
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
                <td>' . substr($emp->jam_keluar, 0, 5) . '</td>
              </tr>';
            }
            $output .= '</tbody></table></div></div>';
            echo $output;
        }
        if ($emps->count() === 0 && $id === null) { //kondisi jika data request id dan daata jadwal tidak ada
            $jenjang = 3;
            $smp = Kelas::with('kelas')->where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjang) {
                $q->where('jenjang_pendidikan_id', $jenjang);
            })->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlaku dan jenjang
            // dd($smp);
            $p = 1;
            $output = '';
            foreach ($smp as $item) {
                $output .= '<div class="card shadow card-primary">';
                $output .= ' <div class="card-header d-flex justify-content-between align-items-center">
                                                Kelas
                                                ' . $item->kelas->name . ' - ' . $item->jurusan . '
                                                <form action="/jadwal-admin" method="get">
                                                    <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                                    <input type="hidden" name="kelas_id" value="' . $item->id . '" />
                                                    <input type="hidden" name="jenjang_pendidikan_id" value="' . $item->kelas->jenjang_pendidikan_id . '" />
                                                    <input type="submit" class="btn btn-primary" value="Masuk">
                                                </form>
                                            </div>';
                $jadwal = \App\Models\Jadwal::with('mata_pelajaran', 'ruangan', 'guru', 'hari')
                    ->where('kelas_id', $item->id)
                    ->get();
                $output .= '<div class="card-body"><table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Ruangan</th>
                <th>Guru Pengajar</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
              </tr>
            </thead>
            <tbody>';
                foreach ($jadwal as $emp) {
                    $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->ruangan->name . '</td>
                <td>' . $emp->guru->name . '</td>
                <td>' . $emp->mata_pelajaran->name . '</td>
                <td>' . $emp->hari->name . '</td>
                <td>' . substr($emp->jam_masuk, 0, 5) . '</td>
                <td>' . substr($emp->jam_keluar, 0, 5) . '</td>
              </tr>';
                }
                $output .= '</tbody></table></div></div>';
            }
            echo $output;
        }
    }
    // public function tk()
    // {
    //     $tahun = Setting::first()->id_tahun_ajaran;
    //     $jenjang = 4;
    //     $tk = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjang) {
    //         $q->where('jenjang_pendidikan_id', $jenjang);
    //     })->select('id')->groupBy('id')->get();
    //     $ampungkelas = [];

    //     $cek = [];
    //     foreach ($tk as $index => $value) {
    //         $rincianSiswa = Siswa::where('kelas', $value->id)->select('nama_siswa as alias')->get();
    //         array_push($ampungkelas, $rincianSiswa);
    //     }
    //     foreach ($tk as $index => $p) {
    //         $pentol['kelas'] = $p->id;
    //         $pentol['siswa'] = $ampungkelas[$index];
    //         array_push($cek, $pentol);
    //     }
    //     return response()->json(['data' => $cek]);
    // }
    public function tk()
    {
        //menampilkan data kelas dengan jenjang tk
        $tahun = Setting::first()->id_tahun_ajaran; //menampilkan data tahun ajaran yang berlangsung
        $jenjang = 4;
        $tk = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjang) {
            $q->where('jenjang_pendidikan_id', $jenjang);
        })->select('id_master_kelas', 'id')->groupBy('id_master_kelas', 'id')->get(); //menampilkan daata kelas berdasarkan tahun ajaran yang berlangsung da jenjang tk
        return view('admin.naikkelas.tk', compact('tk'));
    }
    public function sd()
    {
        //menampilkan data kelas dengan jenjang sd
        $tahun = Setting::first()->id_tahun_ajaran; //menampilkan data tahun ajaran yang berlangsung
        $jenjang = 1;
        $sd = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjang) {
            $q->where('jenjang_pendidikan_id', $jenjang);
        })->select('id_master_kelas', 'id')->groupBy('id_master_kelas', 'id')->get(); //menampilkan daata kelas berdasarkan tahun ajaran yang berlangsung da jenjang sd
        return view('admin.naikkelas.sd', compact('sd'));
    }
    public function smp()
    {
        //menampilkan data kelas dengan jenjang smp
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data berdasarkan tahun ajaran yang berlaku
        $jenjang = 2;
        $smp = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjang) {
            $q->where('jenjang_pendidikan_id', $jenjang);
        })->select('id_master_kelas', 'id')->groupBy('id_master_kelas', 'id')->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung dan jenjang smp
        return view('admin.naikkelas.smp', compact('smp'));
    }
    public function sma()
    {
        // menampilkan data kelas jenjang sma
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlaku 
        $jenjang = 3;
        $sma = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjang) {
            $q->where('jenjang_pendidikan_id', $jenjang);
        })->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlaku dan jenjang sma

        return view('admin.naikkelas.sma', compact('sma'));
    }

    public function semuakelas()
    {
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $jenjangsd = 1;
        $sd = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjangsd) {
            $q->where('jenjang_pendidikan_id', $jenjangsd);
        })->get(); //mengambil data kelas berdasarkan jenjang sd
        $jenjangsmp = 2;
        $smp = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjangsmp) {
            $q->where('jenjang_pendidikan_id', $jenjangsmp);
        })->get(); //mengambil data kelas berdasarkan jenjang smp

        $jenjangsma = 3;
        $sma = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjangsma) {
            $q->where('jenjang_pendidikan_id', $jenjangsma);
        })->get(); //mengambil data kelas berdasarkan jenjang sma
        $jenjangtk = 4;
        $tk = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjangtk) {
            $q->where('jenjang_pendidikan_id', $jenjangtk);
        })->get(); //mengambil data kelas berdasarkan jenjang tk
        return view('admin.naikkelas.index', compact('sd', 'smp', 'sma', 'tk'));
    }

    public function datakelasadmin(Request $request, $id)
    {
        //menampilkan data semua siswa berdasarkan request kelas id
        $siswa = Siswa::where('kelas', $id)->get(); //mengambil data siswa berdasarkan kelas
        $kelas = Kelas::with('kelas')->where('id', $id)->first(); //mengambil data kelas berdasarkan id
        return view('admin.naikkelas.datakelas', compact('siswa', 'kelas'));
    }

    public function datakelasadminstore(Request $request)
    {
    }
}
