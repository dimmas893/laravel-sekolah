<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use App\Models\Admin;
use App\Models\Guru;
use App\Models\Hari;
use App\Models\Invoice_Tagihan;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Wali_Siswa;
use Carbon\Carbon;
use Str;
use File;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function export()
    {
        //download excel
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    public function importsiswa(Request $request)
    {
        // imort excel
        $user = Excel::import(new SiswaImport, $request->file);
        return back();
    }

    public function index()
    {
        //menampilkan data siswa
        $siswa = Siswa::all(); //mengambil data siswa
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        // view create data siswa
        return view('siswa.create');
    }

    public function edit_page($id)
    {
        //edit data siswa
        $siswa = Siswa::Find($id); //mengambil data siswa
        if ($siswa->id_orang_tua) {
            $wali = Wali_Siswa::Find($siswa->id_orang_tua);
            return view('siswa.edit', compact('siswa', 'wali'));
        } else {
            return view('siswa.edit', compact('siswa'));
        }
    }

    public function update_page($id, Request $request)
    {
        //update data
        $emp = Siswa::Find($id); //mengambil data siswa berdasarkan id

        //proses upload file
        if ($request->hasFile('avatar')) {
            if ($emp->avatar) {
                File::delete(public_path('/avatar/' . $emp->avatar));
            }

            $file = $request->file('avatar');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/avatar';
            $this->fileName = 'avatar-' . $request->name . Str::random(5) . '.' . $file_extension;
            // $this->fileName = $request->tahun_terbit.$request->singkatan_jenis.$kodeWilayah.$nomorPeraturan.'.'.$file_extension;
            $request->file('avatar')->move($lokasiFile, $this->fileName);
            $fileName = $this->fileName;
        } else {
            $fileName = $emp->avatar;
        }

        //end proses upload file

        $wali_cek = Wali_Siswa::where('id', $emp->id_orang_tua)->first(); //mengambil data wali siswa berdasarkan id
        if ($wali_cek) { // jika data wali kelas ada
            $user = [
                'name' => $request->nama_bapak,
                'username' => $request->nama_bapak,
                'email' => $request->email_bapak,
                'role' => 4,
                'password' => Hash::make('password'),
            ];
            $org = [
                'nama_bapak' => $request->nama_bapak,
                'nama_ibu' => $request->nama_ibu,
                'pekerjaan_bapak' => $request->pekerjaan_bapak,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'penghasilan_bapak' => $request->penghasilan_bapak,
                'penghasilan_ibu' => $request->penghasilan_ibu,
                'agama_bapak' => $request->agama_bapak,
                'agama_ibu' => $request->agama_ibu,
                'no_telp_bapak' => $request->no_telp_bapak,
                'no_telp_ibu' => $request->no_telp_ibu,
                'email_bapak' => $request->email_bapak,
                'email_ibu' => $request->email_ibu,
            ];
            $wali = Wali_Siswa::where('id', $emp->id_orang_tua)->update($org); //update data wali siswa
            $id_user_org = User::where('id', $wali_cek->id_user)->update($user); //update data user wali siswa
        } else { //kondisi jika data wali siswa tidak ada
            $user12 = [
                'name' => $request->nama_bapak,
                'username' => $request->nama_bapak,
                'email' => $request->email_bapak,
                'role' => 4,
                'password' => Hash::make('password'),
            ];
            $usernih = User::create($user12);
            $walidata = [
                'id_user' => $usernih->id,
                'nama_bapak' => $usernih->nama_bapak,
                'nama_ibu' => $request->nama_ibu,
                'pekerjaan_bapak' => $request->pekerjaan_bapak,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'penghasilan_bapak' => $request->penghasilan_bapak,
                'penghasilan_ibu' => $request->penghasilan_ibu,
                'agama_bapak' => $request->agama_bapak,
                'agama_ibu' => $request->agama_ibu,
                'no_telp_bapak' => $request->no_telp_bapak,
                'no_telp_ibu' => $request->no_telp_ibu,
                'email_bapak' => $usernih->email_bapak,
                'email_ibu' => $request->email_ibu,
            ];
            $walinih = Wali_Siswa::create($walidata); //create data wali siswa
            $emp->update(['id_orang_tua' => $walinih->id]); //update data siswa
        }


        if ($emp) {
            $user2 = [
                'name' => $request->nama_siswa,
                'username' => $request->nama_siswa,
                'email' => $request->email,
                'role' => 5,
                'password' => Hash::make($request->password_siswa),
            ];
            if ($request->password_siswa) { //jika da request password siswa
                $user2 = [
                    'name' => $request->nama_siswa,
                    'username' => $request->nama_siswa,
                    'email' => $request->email,
                    'role' => 5,
                    'password' => Hash::make($request->password_siswa),
                ];
            } else {
                $user2 = [
                    'name' => $request->nama_siswa,
                    'username' => $request->nama_siswa,
                    'email' => $request->email,
                    'role' => 5,
                ];
            }
            $id_user_siswa = User::where('id', $emp->id_user)->update($user2); //update data user siswa
            $create = [
                'nomor_induk_siswa' => $request->nomor_induk_siswa,
                'nisn' => $request->nisn,
                'nama_siswa' => $request->nama_siswa,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'telp' => $request->no_telp,
                'email' => $request->email,
                'asal_sekolah' => $request->asal_sekolah,
                'alamat' => $request->alamat,
                'avatar' => $fileName,
            ];
            Siswa::where('id', $emp->id)->update($create); //create data siswa
        }
        return back();
    }


    public function edit_profile()
    {
        //halaman edit profile
        if (Auth::user()->role == 3) { //guru
            $pendaftaran = Guru::where('id_user', Auth::user()->id)->first(); //mengambil data guru berdasarkan user yang login
            return view('guru.halaman_user.edit_profile', compact('pendaftaran'));
        } elseif (Auth::user()->role == 5) { //siswa
            $siswa = Siswa::with('kelas_siswa')->where('id_user', Auth::user()->id)->first(); //mengambil data siswa berdasarkan yang login
            if ($siswa) { //jika data siswa ada
                $tagihan = Invoice_Tagihan::with('kategori_tagihan')->where('status', 'unpaid')->where('id_siswa', $siswa->id)->get(); //mengambil data tagihan berdasarkan status unpaid dan berdasarkan id siswa
                $wali = Wali_Siswa::Find($siswa->id_orang_tua); //mengambil data wali siswa berdsarkan id
                return view('siswa.halaman_user.edit_profile_page', compact('siswa', 'wali', 'tagihan'));
            }
            $p = Siswa::with('kelas_siswa')->where('id_user', Auth::user()->id)->first(); //mengambil data siswa berdasarkan yang login
            if ($p->id_orang_tua === null) { //kondisi jika siswa belum punya data orang tua
                $tagihan = Invoice_Tagihan::with('kategori_tagihan')->where('status', 'unpaid')->where('id_siswa', $siswa->id)->get(); //mengambil data tagihan berdasakan status unpaid dan berdasarkan id siswa
                $wali = 1;
                return view('siswa.halaman_user.edit_profile_page', compact('siswa', 'wali', 'tagihan'));
            }
        } elseif (Auth::user()->role === 1) { //admin
            $pendaftaran = Admin::where('id_user', Auth::user()->id)->first(); //mengambil data admin berdasarkan yang login
            return view('admin.halaman_user.edit_profile', compact('pendaftaran'));
        }
    }

    public function edit_profile_page()
    {
        //halaman edit profile
        if (Auth::user()->role == 3) { //guru
            $pendaftaran = Guru::where('id_user', Auth::user()->id)->first(); //mengambil data guru berdasarkan yang login
            return view('guru.halaman_user.edit_profile', compact('pendaftaran'));
        } elseif (Auth::user()->role == 5) { //siswa
            $siswa = Siswa::with('kelas_siswa')->where('id_user', Auth::user()->id)->first(); //mengambil data siswa bedasarkan yang login
            if ($siswa) { //jika data siswa ada
                $tagihan = Invoice_Tagihan::with('kategori_tagihan')->where('status', 'unpaid')->where('id_siswa', $siswa->id)->get(); ///mengambil tagihan berdasarkan status unpaid dan berdasarkan id siswa
                $wali = Wali_Siswa::Find($siswa->id_orang_tua); //mengambil data wali siswa berdasarkan id
                return view('siswa.halaman_user.edit_profile_page', compact('siswa', 'wali', 'tagihan'));
            }
        } elseif (Auth::user()->role == 1) { //admin
            $pendaftaran = Admin::where('id_user', Auth::user()->id)->first(); //mengambil data admin berdasarkan yang login
            return view('admin.halaman_user.edit_profile', compact('pendaftaran'));
        }
    }
    public function all()
    {
        // menampilkan data siswa ajax
        $emps = Siswa::all(); //mengambil data siswa
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->nomor_induk_siswa . '</td>
                <td>' . $emp->nama_siswa . '</td>
                <td>' . $emp->jenis_kelamin . '</td>
                <td>' . $emp->telp . '</td>
                <td>' . $emp->alamat . '</td>
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

    // handle insert a new Tu ajax request
    public function store(Request $request)
    {
        //proses menambah data

        //proses upload file
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/avatar';
            $this->fileName = 'avatar-' . $request->name . Str::random(5) . '.' . $file_extension;
            $request->file('avatar')->move($lokasiFile, $this->fileName);
            $fileName = $this->fileName;
        } else {
            $fileName = null;
        }
        $user = [
            'name' => $request->nama_bapak,
            'username' => $request->nama_bapak,
            'email' => $request->email_bapak,
            'role' => 4,
            'password' => Hash::make('password'),
        ];
        $id_user_org = User::create($user); //create user wali siswa
        $org = [
            'id_user' => $id_user_org->id,
            'nama_bapak' => $request->nama_bapak,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_bapak' => $request->pekerjaan_bapak,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_bapak' => $request->penghasilan_bapak,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'agama_bapak' => $request->agama_bapak,
            'agama_ibu' => $request->agama_ibu,
            'no_telp_bapak' => $request->no_telp_bapak,
            'no_telp_ibu' => $request->no_telp_ibu,
            'email_bapak' => $request->email_bapak,
            'email_ibu' => $request->email_ibu,
        ];
        $wali = Wali_Siswa::create($org); //create wali siswa

        $user = [
            'name' => $request->nama_siswa,
            'username' => $request->nama_siswa,
            'email' => $request->email,
            'role' => 5,
            'password' => Hash::make('password'),
        ];

        $id_user_siswa = User::create($user); //create user siswa

        $create = [
            'id_orang_tua' => $wali->id,
            'id_user' => $id_user_siswa->id,
            'nomor_induk_siswa' => $request->nomor_induk_siswa,
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'telp' => $request->no_telp,
            'email' => $request->email,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat' => $request->alamat,
            'avatar' => $fileName,
        ];

        Siswa::create($create); //create data siswa
        return back();
    }

    public function edit(Request $request)
    {
        //edit ajax
        $id = $request->id;
        $emp = Siswa::find($id); //mengambil data siswa berdasarkan id
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        // update data
        $emp = Siswa::Find($request->id); //mengambil data siswa berdasarkan id

        if ($request->hasFile('avatar')) {
            if ($emp->avatar) {
                File::delete(public_path('/avatar/' . $emp->avatar));
            }
            $file = $request->file('avatar');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/avatar';
            $this->fileName = 'avatar-' . $request->name . Str::random(5) . '.' . $file_extension;
            $request->file('avatar')->move($lokasiFile, $this->fileName);
            $fileName = $this->fileName;
        } else {
            $fileName = $emp->avatar;
        }

        $empData = [
            'nomor_induk_siswa' => $request->nomor_induk_siswa,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'alamat' => $fileName
        ];

        if ($request->password) { //kondisi jika data request password ada
            $update = [
                'password' => $request->password
            ];
            User::where('id', $emp->id_user)->update($update); //update data user
        }
        if ($request->email) { //kondisi jika data request email ada
            $update = [
                'email' => $request->email
            ];
            User::where('id', $emp->id_user)->update($update); //update data user
        }

        $emp->update($empData); //update data
        return response()->json([
            'status' => 200,
        ]);
    }

    public function delete(Request $request)
    {
        //delete data ajax
        $id = $request->id;
        $siswa = Siswa::where('id', $id)->first(); //mengambil data siswa berdasarkan id
        User::destroy($siswa->id_user); //mengahapus data user berdasarkan id
        Siswa::destroy($id);
    }

    public function jadwal_siswa()
    {
        //menampilkan data jadwal siswa
        $namaHari = Carbon::now()->isoFormat('dddd'); //mrngambil data hari ini
        $hari = Hari::where('name', $namaHari)->first();
        $datahari = Hari::all();
        $siswa_id = Siswa::where('id_user', Auth::user()->id)->first(); //mengambil data siswa berdasarkan yang login
        $tahun = Setting::first()->id_tahun_ajaran; //mengamil data tahun ajaran yang berlangsung
        $kelas = $siswa_id->kelas;
        if ($siswa_id) { //kondisi jika data siswa ada
            $jadwal = Jadwal::with('kelasget', 'mata_pelajaran', 'ruangan')->where('hari_id', $hari->id)->whereHas('kelasget', function ($q) use ($tahun, $kelas) {
                $q->where('id_tahun_ajaran', $tahun)->where('id', $kelas);
            })->get(); //mengambil data jadwal berdasarkan tahun ajaran yang berlangsung
            return view('siswa.halaman_user.pelajaran', compact('jadwal', 'hari', 'datahari'));
        } else {
            return back()->with('guruerror', 'ds');
        }
    }
}
