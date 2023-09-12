<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\KelasGuru;
use App\Models\Kumpul_Tugas;
use App\Models\Rincian_Siswa;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{

    public function index()
    {
        //tidak dipakai
        return view('tugas.index');
    }

    public function buat_tugas()
    {
        //halaman membuat tugas
        return view('tugas.buat_tugas');
    }

    public function all()
    {
        //menampilkan data tugas
        $emps = Tugas::all(); //mengambil data tugas
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul Tugas</th>
                <th>Tanggal Pembuatan Tugas</th>
                <th>Tanggal Pengumpulan Tugas</th>
                <th>Tanggal Evaluasi Tugas</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->nama . '</td>
                <td>' . $emp->tanggal_tugas . '</td>
                <td>' . $emp->tanggal_pengumpulan . '</td>
                <td>' . $emp->tanggal_evaluasi . '</td>
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
        //proses menambah data tugas
        // proses upload file
        if ($request->hasFile('file_tugas')) {
            $file = $request->file('file_tugas');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/file_tugas';

            $this->file_tugas = 'file_tugas-' . $request->name . Str::random(5) . '.' . $file_extension;
            $request->file('file_tugas')->move($lokasiFile, $this->file_tugas);
            $file_tugas = $this->file_tugas;
        } else {
            $file_tugas = null;
        }
        // end proses upload file
        $empData = [
            'jadwal_id' => $request->jadwal_id,
            'nama' => $request->nama,
            'tanggal_tugas' => $request->tanggal_tugas,
            'tanggal_pengumpulan' => $request->tanggal_pengumpulan,
            'tanggal_evaluasi' => $request->tanggal_evaluasi,
            'evaluasi_oleh' => Auth::user()->id,
            'deskripsi' => $request->deskripsi,
            'status_aktif' => 0,
            'dibuat_oleh' => Auth::user()->id,
            'file_tugas' => $file_tugas
        ];
        $tugas = Tugas::create($empData); //create tugas
        $datajadwal = Jadwal::where('id', $tugas->jadwal_id)->first(); //mengambil data jadwal berdasarkan id
        $datasiswa = Kelas::where('id', $datajadwal->kelas_id)->first(); //engambil data kelas berdasarkan id
        $siswa = Siswa::where('kelas', $datasiswa->id)->get(); //mengambil data siswa berdasarkan kelas
        foreach ($siswa as $p) {
            $kumpul_tugas = [
                'tugas_id' => $tugas->id,
                'siswa_id' => $p->id
            ];
            $kumpul_tugass = Kumpul_Tugas::create($kumpul_tugas); //create tugas untuk siswa
        }

        return response()->json([
            'status' => 200,
        ]);
    }

    public function pilihmatapelajaran()
    {
        //halaman memilih mata pelajaran
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data setting
        $guru = Guru::where('id_user', Auth::user()->id)->first(); //mengambil data guru berdasarkan yang login
        $mataPelajaran = Jadwal::where('guru_id', $guru->id)->whereHas('kelasget', function ($q) use ($tahun) {
            $q->where('id_tahun_ajaran', $tahun);
        })->select('mata_pelajaran_id')->groupBy('mata_pelajaran_id')->get(); //mengambil data jadwal berdasarkan guru id dan tahun ajaran yang berlangsung
        return view('tugas.guru.index', compact('mataPelajaran'));
    }

    public function pilihtingkatan(Request $request)
    {
        // dd($request->all());
        $mataPelajaran = (int)$request->mata_pelajaran_id;
        $tahun = Setting::first()->id_tahun_ajaran;
        $guru = Guru::where('id_user', Auth::user()->id)->first();
        $tingkatan = Jadwal::where('guru_id', $guru->id)->where('mata_pelajaran_id', $mataPelajaran)->whereHas('kelasget', function ($q) use ($tahun) {
            $q->where('id_tahun_ajaran', $tahun);
        })->select('kelas_id', 'jenjang_pendidikan_id')->groupBy('kelas_id', 'jenjang_pendidikan_id')->get();
        return view('tugas.guru.tingkatan', compact('tingkatan', 'mataPelajaran', 'guru'));
    }

    public function pilihkelastugas(Request $request)
    {
        //memilih kelas
        $mataPelajaran = (int)$request->mata_pelajaran_id;
        $tingkatan = (int)$request->tingkatan_id;
        $tahun = Setting::first()->id_tahun_ajaran;
        $guru = Guru::where('id_user', Auth::user()->id)->first(); //mengambil dataguru berdasarkan yang login
        $kelas = Jadwal::where('guru_id', $guru->id)->where('mata_pelajaran_id', $mataPelajaran)->where('tingkatan_id', $tingkatan)->whereHas('kelasget', function ($q) use ($tahun) {
            $q->where('id_tahun_ajaran', $tahun);
        })->select('kelas_id')->groupBy('kelas_id')->get(); //mengambil data jadwal berdasarkan mata pelajaran , tingkatan, dan tahun ajaran yang berlangsung
        return view('tugas.guru.kelas', compact('kelas', 'mataPelajaran', 'tingkatan'));
    }

    // handle insert a new Tu ajax request
    public function store_biasa(Request $request)
    {
        //proses membuat tugas

        //upload file
        if ($request->hasFile('file_tugas')) {
            $file = $request->file('file_tugas');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/file_tugas';

            $this->file_tugas = 'file_tugas-' . $request->name . Str::random(5) . '.' . $file_extension;
            $request->file('file_tugas')->move($lokasiFile, $this->file_tugas);
            $file_tugas = $this->file_tugas;
        } else {
            $file_tugas = null;
        }
        //end upload file


        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlaku
        $kelasku = (int)$request->kelas_id;
        $jadwal = Jadwal::where('mata_pelajaran_id', $request->mata_pelajaran_id)->where('jenjang_pendidikan_id', $request->jenjang_pendidikan_id)->where('guru_id', $request->guru_id)->whereHas('kelasget', function ($q) use ($tahun, $kelasku) {
            $q->where('id_tahun_ajaran', $tahun)->where('kelas_id', $kelasku);
        })->first(); //mengambil data jadwal berdasarkan mata pelajaran , jenjang pendidikan id, guru id, dan tahun ajaran yang berlaku
        $empData = [
            'mata_pelajaran_id' => $jadwal->mata_pelajaran_id,
            'tahun_ajaran_id' => $tahun,
            'kelas_id' => $jadwal->kelas_id,
            'guru_id' => $jadwal->guru_id,
            'jenjang_pendidikan_id' => $jadwal->jenjang_pendidikan_id,
            'nama' => $request->nama,
            'tanggal_tugas' => $request->tanggal_tugas,
            'tanggal_pengumpulan' => $request->tanggal_pengumpulan,
            'tanggal_evaluasi' => $request->tanggal_evaluasi,
            'evaluasi_oleh' => null,
            'deskripsi' => $request->deskripsi,
            'status_aktif' => 0,
            'dibuat_oleh' => $jadwal->guru_id,
            'file_tugas' => $file_tugas
        ];

        $tugas = Tugas::create($empData); //create tugas
        $siswa = Siswa::where(
            'kelas',
            $jadwal->kelas_id
        )->get(); //mengambil data siswa berdasarkan kelas untuk membagikan tugas
        foreach ($siswa as $p) {
            $kumpul_tugas = [
                'tugas_id' => $tugas->id,
                'siswa_id' => $p->id,
                'kesempatan' => 2
            ];
            $kumpul_tugass = Kumpul_Tugas::create($kumpul_tugas); //create tugas untuk siswa
        }
        return Back();
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        //edit data tugas ajax
        $id = $request->id;
        $emp = Tugas::find($id); //mengambil data tugas berdasarkan id
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        $emp = Tugas::Find($request->id); //mengambil data tugas berdasarkan id

        //proses upload file
        if ($request->hasFile('file_tugas')) {
            if ($emp->file_tugas) {
                File::delete(public_path('/file_tugas/' . $emp->file_tugas));
            }
            $file = $request->file('file_tugas');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/file_tugas';

            $this->file_tugas = 'file_tugas-' . $request->name . Str::random(5) . '.' . $file_extension;
            // $this->file_tugas = $request->tahun_terbit.$request->singkatan_jenis.$kodeWilayah.$nomorPeraturan.'.'.$file_extension;
            $request->file('file_tugas')->move($lokasiFile, $this->file_tugas);
            $file_tugas = $this->file_tugas;
        } else {
            $this->file_tugas = $emp->file_tugas;
            $file_tugas = $this->file_tugas;
        }
        // end proses upload file
        $empData = [
            'jadwal_id' => $request->jadwal_id,
            'nama' => $request->nama,
            'tanggal_tugas' => $request->tanggal_tugas,
            'tanggal_pengumpulan' => $request->tanggal_pengumpulan,
            'tanggal_evaluasi' => $request->tanggal_evaluasi,
            'deskripsi' => $request->deskripsi,
            'status_aktif' => 0,
            'evaluasi_oleh' => 14,
            'dibuat_oleh' => 14,
            'file_tugas' => $file_tugas
        ];

        $emp->update($empData); //update data tugas
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        //delete data ajax
        $id = $request->id;
        $emp = Tugas::Find($id); //mengambil data tugas berdasarkan id
        if ($emp->file_tugas) {
            File::delete(public_path('/file_tugas/' . $emp->file_tugas));
        }
        $tugas = Tugas::destroy($id); //hapus data tugas
        $kumpul_tugas = Kumpul_Tugas::where('tugas_id', $id)->get(); //mengambil data kumpul tugas berdasarkan tygas id
        foreach ($kumpul_tugas as $p) {
            if ($p->upload_file) {
                File::delete(public_path('/upload_file/' . $emp->upload_file));
                Kumpul_Tugas::destroy($p->id); //menghapus data kumpul tugas
            } else {
                Kumpul_Tugas::destroy($p->id); //menghapus data kumpul tugas
            }
        }

        return back()->with('hapusberhasil', 'ds');
    }
}
