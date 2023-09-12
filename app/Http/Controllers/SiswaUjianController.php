<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Kumpul_Tugas;
use App\Models\Mata_Pelajaran;
use App\Models\Nilai;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\Soal;
use App\Models\Tugas;
use App\Models\Ujian;
use File;
use Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaUjianController extends Controller
{
    public function tugaseditgurudimmas(Request $request)
    {
        //edit tugas ajax
        $id = $request->id;
        $emp = Tugas::find($id); //mengambil data tugas berdasarkan id
        return response()->json($emp);
    }

    public function deletetugasguru(Request $request)
    {
    }

    public function tugaseditguruupdate(Request $request)
    {
        // update tugas
        $emp = Tugas::Find($request->id); //mengambil data tugas berdasarkan id

        //upload file
        if ($request->hasFile('file_tugas')) {
            if ($emp->file_tugas) {
                File::delete(public_path('/file_tugas/' . $emp->file_tugas)); //delete tugas file
            }
            $file = $request->file('file_tugas');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/file_tugas';
            $this->file_tugas = 'file_tugas-' . $request->name . Str::random(5) . '.' . $file_extension;
            $request->file('file_tugas')->move($lokasiFile, $this->file_tugas);
            $file_tugas = $this->file_tugas;
        } else {
            $this->file_tugas = $emp->file_tugas;
            $file_tugas = $this->file_tugas;
        }

        $empData = [
            'nama' => $request->nama,
            'tanggal_tugas' => $request->tanggal_tugas,
            'tanggal_pengumpulan' => $request->tanggal_pengumpulan,
            'tanggal_evaluasi' => $request->tanggal_evaluasi,
            'deskripsi' => $request->deskripsi,
            'file_tugas' => $file_tugas
        ];

        $emp->update($empData); //update data
        return back()->with('berhasil', 'dsd');
    }
    public function tugasedit(Request $request)
    {
        //tidak dipakai tp jangan di hapus
        dd($request->all());
    }
    public function tugassiswa(Request $request)
    {
        // edit tugas ajax
        $id = $request->id;
        $emp = Tugas::find($id); //mengambil data tugas berdasarkan id
        return response()->json($emp);
    }
    public function UjianSiswa(Request $request)
    {
        //ujian nilai siswa
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $siswa = Siswa::where('id_user', Auth::user()->id)->first(); // mengambil data siswa berdasarkan yang login
        if ($siswa->kelas != null) { //kondisi jika kelas ada
            $siswa_id = $siswa->id;
            $kelas = Kelas::where('id', $siswa->kelas)->first(); //mengambil data kelas berdasarkan id
            $nilai = Nilai::with('ujian')->where('siswa_id', $siswa->id)->get(); //mengambil data nilai berdasarkan siswa id
            $tingkatan = $kelas->tingkatan_id;
            $jurusan = $siswa->jurusan;
            $ujian = Nilai::with('ujian')->whereHas('ujian', function ($q) use ($tahun) {
                $q->where('tahun_ajaran_id', $tahun);
            })->where('siswa_id', $siswa_id)->get(); //mengambil data nilai berdasarkan siswa id
            return view('siswa.ujian.all', compact('ujian', 'nilai'));
        } else {
            return back()->with('kelasbelumada', 'd');
        }
    }

    public function UjianSoal(Request $request, $id)
    {
        //halaman ujian siswa
        $siswa = Siswa::where('id_user', Auth::user()->id)->first(); //mengambil data siswa berdasarkan yang login
        $ujian = Ujian::where('id', $id)->first(); //mengambil data ujian berdasarkan id
        $soal = Soal::where('ujian_id', $ujian->id)->get(); //mengambil data soal berdasarkan ujian id
        return view('siswa.ujian.soal', compact('soal', 'ujian', 'siswa'));
    }

    public function JawabanUjian(Request $request)
    {
        //proses menghitung nilai hasil ujian
        $ujian_id = $request->ujian_id;
        $siswa_id = $request->siswa_id;
        $jumlah  = count($request['id_soal']);
        foreach ($request['id_soal'] as $soal) {
            $datasoal = Soal::where('id', $soal)->first()->kunci_jawaban; //mengambil data kunci jawaban dr soal berdasarkan id
            $this->prosesnilai($request['jawaban'], $datasoal, $jumlah, $ujian_id, $siswa_id); //membuat function baru
        }

        return view('siswa.ujian.selamat');
    }

    public function prosesnilai($jawaban, $nilai, $jumlahsoal, $ujian_id, $siswa_id)
    {
        //proses menghitung nilai hasil ujian lanutan function yg atas
        $tes = [];
        foreach ($jawaban as $jawab) {
            if ($nilai === $jawab) {
                $totalscore = 1;
                array_push($tes, $totalscore);
            }
        }
        $hitungnilai = count($tes);
        $cekdulu = Nilai::where('ujian_id', $ujian_id)->where('siswa_id', $siswa_id)->first(); //mengambil data nilai berdasarkan ujian id
        if ($cekdulu) {
            $create = [
                'siswa_id' => $siswa_id,
                'benar' => $hitungnilai,
                'ujian_id' => $ujian_id,
                'salah' => $jumlahsoal - $hitungnilai,
                'score' => $hitungnilai
            ];
            $cekdulu->update($create); //update data
        }
    }

    public function menutugasshow(Request $request)
    {
        //menu
        return view('siswa.ujian.menu');
    }

    public function menutugasshowkelas(Request $request)
    {
        //halaman memilih kelas
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $guru = Guru::where('id_user', Auth::user()->id)->first(); //mengambil data guru berdasarkan yang login
        $guru_id = $guru->id;
        $jadwal = Jadwal::where('guru_id', $guru_id)->whereHas('kelasget', function ($q) use ($tahun) {
            $q->where('id_tahun_ajaran', $tahun);
        })->select('kelas_id')->groupBy('kelas_id')->get(); //mengambil data jadwal berdasarkan guru yang login dan tahun ajaran yang berlangsung
        return view('siswa.ujian.pilihjenjang', compact('jadwal'));
    }


    public function menutugasshowkelaslihat(Request $request)
    {
        //halaman kumpulan tugas role guru
        $tanggal = Carbon::now()->add(1, 'day')->format('Y-m-d'); //data hari besok
        $tanggalhariini = Carbon::now()->format('Y-m-d'); //data hari ini
        $guru = Guru::where('id_user', Auth::user()->id)->first(); //mengambil data guru yang login
        $guru_id = $guru->id;
        $dedline = Tugas::where('guru_id', $guru_id)->whereIn('tanggal_pengumpulan', [$tanggalhariini, $tanggal])->select('guru_id', 'kelas_id')->groupBy('guru_id', 'kelas_id')->count(); //menghitung data tugas berdasarkan guru id dan berdasarkan range tanggal_pengumpulan dr tanggal hari ini sampai hari ini sampai variable tanggal

        $batas = Tugas::where('guru_id', $guru_id)->where('tanggal_pengumpulan', '<', $tanggalhariini)->select('guru_id', 'kelas_id')->groupBy('guru_id', 'kelas_id')->count(); //menghitung data tugas berdasarkan guru id dan berdasarkan range tanggal_pengumpulan lebih kecil dr tanggal hari ini sampai hari ini sampai variable tanggal

        $tugasBelum = Tugas::where('guru_id', $guru_id)->where('tanggal_pengumpulan', '>', $tanggal)->select('guru_id', 'kelas_id')->groupBy('guru_id', 'kelas_id')->count(); //menghitung data tugas berdasarkan guru id dan berdasarkan range tanggal_pengumpulan lebih besar dr tanggal hari ini sampai hari ini sampai variable tanggal

        $sudah = Tugas::where('guru_id', $guru_id)->select('guru_id', 'kelas_id')->groupBy('guru_id', 'kelas_id')->count(); //menghitung data tugas berdasarkan guru id
        return view('tugas.view.kumpulantugas', compact('dedline', 'tugasBelum', 'sudah', 'batas'));
    }

    public function menutugasshowkelaslihatdetail(Request $request)
    {
        //detail halaman kumpulan tugas role guru
        $tanggal = Carbon::now()->add(1, 'day')->format('Y-m-d'); //mengambil data hari besok
        $tanggalhariini = Carbon::now()->format('Y-m-d'); //mengambil data hari ini
        $guru = Guru::where('id_user', Auth::user()->id)->first(); //mengambil data guru berdasarkan yang login
        $guru_id = $guru->id;
        if ($request->dedline) { //kondisi jika request dedline
            $back = $request->dedline;

            $tugas = Tugas::where('guru_id', $guru_id)->whereIn('tanggal_pengumpulan', [$tanggalhariini, $tanggal])->select('guru_id', 'kelas_id')->groupBy('guru_id', 'kelas_id')->get(); //mengambil tuga berdasarkan guru id dan range tanggal_pengumpulan dr tanggal hari ini samppai variable $tanggal
            $title = 'Dedline';
            return view('tugas.guru.tampiltugasguru', compact('tugas', 'title', 'back'));
        }
        if ($request->batas) {
            $back = $request->batas;
            $tugas = Tugas::where('guru_id', $guru_id)->where('tanggal_pengumpulan', '<', $tanggalhariini)->select('guru_id', 'kelas_id')->groupBy('guru_id', 'kelas_id')->get(); //mengambil data tugas berdasarkan guru id dan berdasarkan range tanggal_pengumpulan lebih kecil dr tanggal hari ini sampai hari ini sampai variable tanggal
            $title = 'Tidak mengerjakan';
            return view('tugas.guru.tampiltugasguru', compact('tugas', 'title', 'back'));
        }

        if ($request->tugasBelum) {
            $back = $request->tugasBelum;
            $tugas = Tugas::where('guru_id', $guru_id)->where('tanggal_pengumpulan', '>', $tanggal)->select('guru_id', 'kelas_id')->groupBy('guru_id', 'kelas_id')->get(); //menghitung data tugas berdasarkan guru id dan berdasarkan range tanggal_pengumpulan lebih besar dr tanggal hari ini sampai hari ini sampai variable tanggal
            $title = 'Belum di kerjakan';
            return view('tugas.guru.tampiltugasguru', compact('tugas', 'title', 'back'));
        }

        if ($request->sudah) {
            $back = $request->sudah;
            $tugas = Tugas::where('guru_id', $guru_id)->select('guru_id', 'kelas_id')->groupBy('guru_id', 'kelas_id')->get(); //mengambil data tugas berdasarkan guru id
            $title = 'Selesai';
            return view('tugas.guru.tampiltugasguru', compact('tugas', 'title', 'back'));
        }
    }

    public function  menutugasshowkelaslihatdetaillihat($kelas)
    {
        //menampilkan data semua tugas beserta count tugasnya
        $tanggalhariini = Carbon::now()->Format('Y-m-d'); //mengambil data tanggl hari ini
        $guru = Guru::where('id_user', Auth::user()->id)->first(); //mengambil data guru berdasarkan yang login
        $guru_id = $guru->id;
        $tugas = Tugas::where('guru_id', $guru_id)->where('kelas_id', $kelas)->select('mata_pelajaran_id')->groupBy('mata_pelajaran_id')->get(); //mengambil data tugas berdasarkan guru id dan berdasarkan kelas_id
        $expired = Tugas::where('guru_id', $guru_id)->where('kelas_id', $kelas)->where('tanggal_pengumpulan', '<', $tanggalhariini)->count(); //menghitung data tugas berdasarkan guru id dan kelas id dan berdasarkan tanggal_pengumpulan lebih kecil dr tanggal hari ini
        $berlangsung = Tugas::where('guru_id', $guru_id)->where('kelas_id', $kelas)->where('tanggal_pengumpulan', '>', $tanggalhariini)->count(); //menghitung data tugas berdasarkan guru id dan kelas id dan berdasarkan tanggal_pengumpulan lebih besar dr tanggal hari ini
        $kelas_id = $kelas;
        return view('tugas.guru.lihatsiswa', compact('tugas', 'kelas_id', 'expired', 'berlangsung'));
    }

    public function menutugasshowkelaslihatdetaillihatmatapelajaran($kelas, $matapelajaran)
    {
        //menampilkan data tugas berdasarkan id kelas dan id matapelajaran yang sudah dipilih
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $guru = Guru::where('id_user', Auth::user()->id)->first(); //mengambil data guru berdasarkan yag login
        $guru_id = $guru->id;
        $tugas = Tugas::where('guru_id', $guru_id)->where('tahun_ajaran_id', $tahun)->where('kelas_id', $kelas)->where('mata_pelajaran_id', $matapelajaran)->get(); //mengambil data tugas berdasarkan guru id , tahun ajaran, dan mata_pelajaran_id
        return view('tugas.guru.tugas_all', compact('tugas', 'kelas'));
    }
    public function menutugasshowkelaslihatdetaillihatmatapelajaranexpired($kelas, $matapelajaran)
    {
        //menampilkan data tugas yang expired
        $tanggalhariini = Carbon::now()->Format('Y-m-d'); //mengambil data tanggal hari ini
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data setting
        $guru = Guru::where('id_user', Auth::user()->id)->first(); //mengambil data guru berdasarkan yang login
        $guru_id = $guru->id;
        $tugas = Tugas::where('guru_id', $guru_id)->where('tahun_ajaran_id', $tahun)->where('kelas_id', $kelas)->where('mata_pelajaran_id', $matapelajaran)->where('tanggal_pengumpulan', '<', $tanggalhariini)->get(); //mengambil data tugas berdasarkan tahun ajaran, kelas id, mata pelajaran dan tanggal_pengumulah lebih kecil dari tanggal hari ini
        return view('tugas.guru.tugas_all_expired', compact('tugas', 'kelas'));
    }
    public function menutugasshowkelaslihatdetaillihatmatapelajaranberlangsung($kelas, $matapelajaran)
    {
        $tanggalhariini = Carbon::now()->Format('Y-m-d'); //mengambil data tanggal hari ini
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data setting
        $guru = Guru::where('id_user', Auth::user()->id)->first(); //mengambil data guru berdasarkan yang login
        $guru_id = $guru->id;
        $tugas = Tugas::where('guru_id', $guru_id)->where('tahun_ajaran_id', $tahun)->where('kelas_id', $kelas)->where('mata_pelajaran_id', $matapelajaran)->where('tanggal_pengumpulan', '>', $tanggalhariini)->get(); //mengambil data tugas berdasarkan tahun ajaran, kelas id, mata pelajaran dan tanggal_pengumulah lebih besar dari tanggal hari ini
        return view('tugas.guru.tugas_all_berlangsung', compact('tugas', 'kelas'));
    }

    public function menutugasshowkelaslihatdetaillihatmatapelajaranadmin($kelas, $matapelajaran)
    {
        //menampilkan data tugas berdasarkan kelas id dan mata pelajaran yang dipilih
        $tanggalhariini = Carbon::now()->Format('Y-m-d'); //mengambil data tanggal hari ini
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data setting
        $tugas = Tugas::where('tahun_ajaran_id', $tahun)->where('kelas_id', $kelas)->where('mata_pelajaran_id', $matapelajaran)->get(); //mengambil data tugas berdasarkan tahun ajaran yang berlaku dan berdasarkan mata_pelajaran_id
        $jadwal = Jadwal::where('kelas_id', $kelas)->where('mata_pelajaran_id', $matapelajaran)->first(); //mengambil data jadwal berdasarkan kelas id dan mata pelajaran id
        return view('tugas.guru.tugas_all_admin', compact('tugas', 'kelas', 'tanggalhariini', 'matapelajaran', 'jadwal'));
    }

    public function menutugasshowkelaslihatdetaillihatmatapelajaranadminexpired($kelas, $matapelajaran)
    {
        //menampilkan data tugas expired berlangsung berdasarkan kelas dan mata pelajaran yang telah dipilih
        $tanggalhariini = Carbon::now()->Format('Y-m-d'); //mengambil data tanggal hari ini
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data setting
        $tugas = Tugas::where('tahun_ajaran_id', $tahun)->where('kelas_id', $kelas)->where('mata_pelajaran_id', $matapelajaran)->where('tanggal_pengumpulan', '<', $tanggalhariini)->get(); //mengambil data tugas berdasarkan tahun ajaran yang berlaku, berdasarkan mata_pelajaran_id, dan berdasarkan tanggal pengumpulan lebih kecil dr tanggal hari ini
        $jadwal = Jadwal::where('kelas_id', $kelas)->where('mata_pelajaran_id', $matapelajaran)->first();
        return view('tugas.guru.tugas_all_admin_expired', compact('tugas', 'tanggalhariini', 'kelas', 'matapelajaran', 'jadwal'));
    }

    public function menutugasshowkelaslihatdetaillihatmatapelajaranadminberlangsung($kelas, $matapelajaran)
    {
        //menampilkan data tugas yang masih berlangsung berdasarkan kelas dan mata pelajaran yang telah dipilih
        $tanggalhariini = Carbon::now()->Format('Y-m-d'); //mengambil data tanggal hari ini
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data setting
        $tugas = Tugas::where('tahun_ajaran_id', $tahun)->where('kelas_id', $kelas)->where('mata_pelajaran_id', $matapelajaran)->where('tanggal_pengumpulan', '>', $tanggalhariini)->get(); //mengambil data tugas berdasarkan tahun ajaran yang berlaku, berdasarkan mata_pelajaran_id, dan berdasarkan tanggal pengumpulan lebih besar dr tanggal hari ini
        $jadwal = Jadwal::where('kelas_id', $kelas)->where('mata_pelajaran_id', $matapelajaran)->first(); //mengambil data jadwal berdasarkan kelas id dan mat pelajaran id
        return view('tugas.guru.tugas_all_admin_berlangsung', compact('tugas', 'tanggalhariini', 'kelas', 'matapelajaran', 'jadwal'));
    }

    public function getsiswa($tugas_id)
    {
        $guru = Guru::where('id_user', Auth::user()->id)->first();
        $guru_id = $guru->id;
        $tugas = Tugas::where('guru_id', $guru_id)->where('id', $tugas_id)->first();
        $kumpultugas = Kumpul_Tugas::where('tugas_id', $tugas->id)->get();
        $kelas = Kumpul_Tugas::where('tugas_id', $tugas->id)->first()->siswa_id;
        $kelas_id = Siswa::where('id', $kelas)->first()->kelas;
        return view('tugas.guru.siswaget', compact('tugas', 'kumpultugas', 'kelas_id'));
    }

    public function getsiswaadmin($tugas_id)
    {
        //menampilkan detail tugas
        $tugas = Tugas::where('id', $tugas_id)->first(); //mengambil data tugas berdasarkan id
        $kumpultugas = Kumpul_Tugas::where('tugas_id', $tugas->id)->get(); //megambil data kumpul tugas berdasaran tugas id
        $kelas = Kumpul_Tugas::where('tugas_id', $tugas->id)->first()->siswa_id; //mengambil data siswa id dr kumpultugas berdasarkan tugas id
        $kelas_id = Siswa::where('id', $kelas)->first()->kelas; //mengambil data kelas dr siswa berdasarkan id
        return view('tugas.guru.siswagetadmin', compact('tugas', 'kumpultugas', 'kelas_id'));
    }

    public function KasihNilai($kumpul_tugas_id)
    {
        //halaman penilaian tugas
        $kumpultugas = Kumpul_Tugas::where('id', $kumpul_tugas_id)->first(); //mengambil data kumpultugas berdasarkan id
        $tugas = Tugas::where('id', $kumpultugas->tugas_id)->first(); //mengambil data tugas berdasaran id
        $kelas = Kumpul_Tugas::where('tugas_id', $tugas->id)->first()->siswa_id; //mengambil data siswa id dr kumpultugas berdasarkan tugas id
        $siswa = Siswa::where('id', $kelas)->first(); //mengambil data siswa berdasarkan id
        return view('tugas.guru.kasihnilai', compact('kumpultugas', 'tugas', 'siswa'));
    }
}
