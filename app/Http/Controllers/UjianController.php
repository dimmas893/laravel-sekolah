<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mata_Pelajaran;
use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Pengaturan;
use App\Models\Nilai;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\Ujian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UjianController extends Controller
{
    public function tabelujian(Request $request, $id, $tingkatan_id, $jenjang_pendidikan_id)
    {
        //menampilkan data ujian
        $mata_pelajaran = Mata_Pelajaran::Find($id); //mengambil data mata pelajaran berdasarkan id
        $jenjang_pendidikan_id = $jenjang_pendidikan_id;
        $tingkatan_id = $tingkatan_id;
        return view('ujian.tabel', compact('mata_pelajaran', 'jenjang_pendidikan_id', 'tingkatan_id', 'jenjang_pendidikan_id'));
    }

    public function ujianwalikelas(Request $request)
    {

        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlaku
        $guru = Guru::where('id_user', Auth::user()->id)->first(); //mengambil data guru yang sedang login
        $kelas = Kelas::where('id_guru', $guru->id)->first(); //mengambil data kelas berdasarkan id guru
        return view('ujian.walikelas', compact('kelas'));
    }

    public function ujianwalikelasdetail($id)
    {
        //halaman detail ujian
        return view('ujian.walikelasnilai', compact('id'));
    }
    public function allwalkelasnilaiajax($id)
    {
        //menampilkan data ujian dan nilai dr siswa
        $ujian = Ujian::where('id', $id)->first(); //mengambil data ujian berdasarkan id
        $emps = Nilai::where('ujian_id', $ujian->id)->get(); //mengambil data nilai berdasarkan ujian id
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Siswa</th>
                <th>Benar</th>
                <th>Salah</th>
                <th>Score</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->siswa->nama_siswa . '</td>';
                if ($emp->benar === null) {
                    $output .= '<td><p style="color:red;">Belum mengerjakan</p></td>
               <td><p style="color:red;">Belum mengerjakan</p></td>
              <td><p style="color:red;">Belum mengerjakan</p></td>';
                } else {
                    $output .= '<td>' . $emp->benar . ' </td>
                <td>' . $emp->salah . ' </td>
                <td>' . $emp->score . ' </td>';
                }
                $output .= '</tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Data ujian tidak ada</h1>';
        }
    }

    public function pilihjenjangujian(Request $request)
    {
        //halaman memilih jenjang pendidikan
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $jenjangsd = 1;
        $sd = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjangsd) {
            $q->where('jenjang_pendidikan_id', $jenjangsd);
        })->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung dan berdasarkan jenjang pendidikan id 1
        $jenjangsmp = 2;
        $smp = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjangsmp) {
            $q->where('jenjang_pendidikan_id', $jenjangsmp);
        })->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung dan berdasarkan jenjang pendidikan id 2

        $jenjangsma = 3;
        $sma = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjangsma) {
            $q->where('jenjang_pendidikan_id', $jenjangsma);
        })->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung dan berdasarkan jenjang pendidikan id 3
        $jenjangtk = 4;
        $tk = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjangtk) {
            $q->where('jenjang_pendidikan_id', $jenjangtk);
        })->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung dan berdasarkan jenjang pendidikan id 4
        return view('ujian.pilihjenjang', compact('sd', 'smp', 'sma', 'tk'));
    }


    public function pilihtingkatanujian(Request $request)
    {
        //halaman pilih tingkatan
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $jenjang_pendidikan_id = (int)$request->jenjang_pendidikan_id;
        $tingkatan = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjang_pendidikan_id) {
            $q->where('jenjang_pendidikan_id', $jenjang_pendidikan_id);
        })->select('tingkatan_id')->groupBy('tingkatan_id')->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung dan berdasarkan jenjang pendidikan id
        return view('ujian.pilihtingkatan', compact('tingkatan', 'tahun', 'jenjang_pendidikan_id'));
    }

    public function pilihmatapelajaranujian(Request $request)
    {
        //halaman memilih mata pelajaran
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $jenjang_pendidikan_id = (int)$request->jenjang_pendidikan_id;
        $tingkatan_id = (int)$request->tingkatan_id;
        $mata_pelajaran = Mata_Pelajaran::where('tingkatan', $tingkatan_id)->where('tahun_ajaran_id', $tahun)->where('jenjang_pendidikan_id', $jenjang_pendidikan_id)->get(); //mengambil data mata elajaran berdasarkan tingkat dan berdasarkan jenjang pendidikan id
        return view('ujian.pilihmatapelajaran', compact('mata_pelajaran', 'tahun', 'jenjang_pendidikan_id', 'tingkatan_id'));
    }

    public function lembarSoal()
    {
        //tidak dipakai
        $soal = Soal::get();
        $dataWaktu = Pengaturan::pluck('waktu')->first();
        $dataPeraturan = Pengaturan::first();
        return view('ujian.lembarSoal', compact('soal', 'dataPeraturan', 'dataWaktu'));
    }

    public function simpanJawaban(Request $request)
    {
        //tidak dipakai
        DB::beginTransaction();
        try {
            $pilihan     = $request->pilihan;
            $id_soal     = $request->id;
            $jumlah      = $request->jumlah;
            $score = 0;
            $benar = 0;
            $salah = 0;
            $kosong = 0;
            for ($i = 0; $i < $jumlah; $i++) {
                //id nomor soal
                $nomor = $id_soal[$i];

                //jika user tidak memilih jawaban
                if (empty($pilihan[$nomor])) {
                    $kosong++;
                } else {
                    //jawaban dari user
                    $jawaban = $pilihan[$nomor];
                    //cocokan jawaban user dengan jawaban di database
                    $query = DB::table('soals')
                        ->where('id', '=', $nomor)
                        ->where('knc_jawaban', '=', $jawaban)
                        ->count();
                    if ($query) {
                        //jika jawaban cocok (benar)
                        $benar++;
                    } else {
                        //jika salah
                        $salah++;
                    }
                }
                $jumlah_soal = DB::table('soals')->count();
                $score = 100 / $jumlah_soal * $benar;
                $hasil = number_format($score, 1);
            }
            $qry = Pengaturan::select('nilai_min')->first();
            $ceknilai = $qry->nilai_min;
            if ($hasil > $ceknilai) {
                Nilai::create([
                    'id_user' => Auth::user()->id,
                    'benar' => $benar,
                    'salah' => $salah,
                    'kosong' => $kosong,
                    'score' => $hasil,
                    'keterangan' => 'LULUS'
                ]);
            } else {
                Nilai::create([
                    'id_user' => Auth::user()->id,
                    'benar' => $benar,
                    'salah' => $salah,
                    'kosong' => $kosong,
                    'score' => $hasil,
                    'keterangan' => 'TIDAK LULUS'
                ]);
            }
            DB::commit();
            return redirect('lembar-soal2')->with('success', "Anda Telah Berhasil Mengisi Soal");
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
    public function allwalkelas()
    {
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung

        $guru = Guru::where('id_user', Auth::user()->id)->first(); //mengambil data guru berdasarkan yang login
        $kelas = Kelas::where('id_guru', $guru->id)->first(); //mengambil data kelas bedasarkan id guru
        $tingkatan = $kelas->tingkatan_id;
        $jurusan = $kelas->jurusan;
        $emps = Ujian::whereHas('mata_pelajaran', function ($q) use ($tingkatan, $jurusan) {
            $q->where('tingkatan', $tingkatan)->where('jurusan', $jurusan);
        })->where('tahun_ajaran_id', $tahun)->get(); //mengambil data ujian berdasarkan ttingkatan dan berdasarkan jurusan
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Jenis Ujian</th>
                <th>Tanggal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td><div class="badge badge-success"> ' . $emp->jenis_ujian . '</div> </td>
                <td>' . $emp->tanggal . ' </td>
                <td>
                  <a href="' . route('ujianwalikelasdetail', $emp->id) . '" class="btn btn-primary mx-1">Lihat</a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Data ujian tidak ada</h1>';
        }
    }
    public function all($id, $tingkatan_id, $jenjang_pendidikan_id)
    {
        //menampikan data ujian
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $jenjang_pendidikan = $jenjang_pendidikan_id;
        $emps = Ujian::whereHas('mata_pelajaran', function ($q) use ($id, $tingkatan_id) {
            $q->where('id', $id)->where('tingkatan', $tingkatan_id);
        })->where('tahun_ajaran_id', $tahun)->get(); //mengambil data ujian berdasarkan mata pelajaran id dan berdasarkan tingkatan id
        $output = '';
        $p = 1;
        $csrf = csrf_token();
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Jenis Ujian</th>
                <th>Tanggal</th>
                <th>Jumlah Soal</th>
                <th>Lihat Soal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td><div class="badge badge-success"> ' . $emp->jenis_ujian . '</div> </td>
                <td>' . $emp->tanggal . ' </td>
                <td>' . Soal::where('ujian_id', $emp->id)->count() . ' </td>
                <td>
				<form action="/ujian/soal/' . $emp->id . '" method="get">
				<input type="hidden" name="_token" value="' . $csrf . '" />
				<input type="hidden" name="mata_pelajaran_id" value="' . $emp->mata_pelajaran->id . '" />
				<input type="hidden" name="jenjang_pendidikan_id" value="' . $jenjang_pendidikan . '" />
				<input type="hidden" name="tingkatan_id" value="' . $emp->mata_pelajaran->tingkatan . '" />
				';
                $output .= '<input type="submit" class="text-info mx-1" value="Soal"/>
				</form>
				</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="ion-trash-a h4" data-pack="default" data-tags="on, off"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Data ujian tidak ada</h1>';
        }
    }

    public function store(Request $request)
    {
        //proses menambahkan data
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $semester = Setting::first()->semester; //mengambil data semester yang berlangsung
        $mata_pelajaran = Mata_Pelajaran::where('id', (int)$request->mata_pelajaran_id)->where('tahun_ajaran_id', $tahun)->where('tingkatan', (int)$request->tingkatan)->first(); //mengambil data mata pelajaran berdasarkan id dan berdasarkan tingkatan
        $cek = Ujian::where('semester', $semester)->where('mata_pelajaran_id', $mata_pelajaran->id)->where('tahun_ajaran_id', $tahun)->where('jenis_ujian', $request->jenis_ujian)->first(); //mengambil data ujian berdasarkan semester, mata pelajaran id, tahun ajaran, dan jenis ujian
        if ($cek === null) { //kondisi jika data ujian null
            $empData = [
                'tahun_ajaran_id' => $tahun,
                'semester' => $semester,
                'mata_pelajaran_id' => $mata_pelajaran->id,
                'jenis_ujian' => $request->jenis_ujian,
                'tanggal' => $request->tanggal,
            ];
            $ujian = Ujian::create($empData); //create data ujian
            $siswa = Siswa::where('jurusan', $mata_pelajaran->jurusan)->where('tingkat', (int)$request->tingkatan)->get(); //get data siswa berdasarkan jurrusan dan tingkat
            foreach ($siswa as $sis) {
                $create = [
                    'siswa_id' => $sis->id,
                    'ujian_id' => $ujian->id
                ];
                Nilai::create($create); //create nilai
            }
            $soal = Soal::with('ujian')->where('ujian_id', $ujian->id)->get(); //mengambil data soal berdasarkan ujian id

            $id = $ujian->id;
            $mata_pelajaran = $id;
            $tingkatan_id = $request->tingkatan;
            $mata_pelajaran = $request->mata_pelajaran_id;
            $jenjang_pendidikan_id = $request->jenjang_pendidikan_id;
            return view('soal.create', compact('soal', 'id', 'tingkatan_id', 'mata_pelajaran', 'jenjang_pendidikan_id'));
        } else {
            return back()->with('ujiansudahada', 'ds');
        }
    }

    public function soal(Request $request, $id)
    {
        //menampilkan soal berdasarkan ujian id
        $id = $id;
        $soal = Soal::with('ujian')->where('ujian_id', $id)->get(); //mengambil data soal berdasarkan ujian id
        $mata_pelajaran = $request->mata_pelajaran_id;
        $tingkatan_id = $request->tingkatan_id;
        $jenjang_pendidikan_id = $request->jenjang_pendidikan_id;
        return view('soal.create', compact('soal', 'id', 'tingkatan_id', 'mata_pelajaran', 'jenjang_pendidikan_id'));
    }

    public function edit(Request $request)
    {
        //edit data ujian ajax
        $id = $request->id;
        $emp = Ujian::find($id); //mengambil data ujian berdasarkan id
        return response()->json($emp);
    }

    public function update(Request $request)
    {
        // update data ajax
        $emp = Ujian::Find($request->id); //mengambil data ujian berdasarkan id
        $empData = [
            'jenis_ujian' => $request->jenis_ujian,
            'tanggal' => $request->tanggal,
        ];


        $emp->update($empData); //update data soal
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        // delete data soal
        $id = $request->id;
        Ujian::destroy($id); //delete data ujian berdasarkan id
        $soal = Soal::where('ujian_id', $id)->get(); //mengambil data soal berdasarkan ujian id
        foreach ($soal as $p) {
            Soal::where('id', $p->id)->delete(); //delete data soal berdasarkan id
        }
    }



    public function SoalForm(Request $request)
    {
        //menampilkan data soal
        $id = $request->id;
        $form = $request->form;

        $tingkatan_id = $request->tingkatan_id;
        $mata_pelajaran = $request->mata_pelajaran_id;
        $jenjang_pendidikan_id = $request->jenjang_pendidikan_id;
        $soal = Soal::with('ujian')->where('ujian_id', $id)->get(); //mengambil data soal berdasarkan ujian id

        return view('soal.createForm', compact('soal', 'id', 'form', 'tingkatan_id', 'mata_pelajaran', 'jenjang_pendidikan_id'));
    }
}
