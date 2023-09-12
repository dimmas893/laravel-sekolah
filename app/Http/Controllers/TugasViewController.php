<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kumpul_Tugas;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\Tugas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Str;

class TugasViewController extends Controller
{
    public function SiswaTampilTugas()
    {
        //menampilkan data tugas siswa
        $tanggal = Carbon::now()->add(1, 'day')->format('Y-m-d'); //tanggal besok
        $tanggalhariini = Carbon::now()->format('Y-m-d'); //tanggal hari ini
        $Siswa = Siswa::where('id_user', Auth::user()->id)->first(); //mengambil data siswa yang sedang login
        $jadwal = Jadwal::where('kelas_id', $Siswa->kelas)->get();
        $dedline = [];
        $tampungtugas = [];
        $batastampung = [];
        $sudahdikumpulkan = [];
        $mendekati['mendekati'] = Kumpul_Tugas::with('tugas', 'jadwal')->whereHas('tugas', function ($q) use ($tanggalhariini, $tanggal) {
            $q->whereIn('tanggal_pengumpulan', [$tanggalhariini, $tanggal]);
        })->where(
            'file_upload',
            null
        )->where('siswa_id', $Siswa->id)->get(); //mengambil data kumpul tugas berdasarkan data tanggal sekarang dan besok dan berdasarkan siswa id


        $batas['batas'] = Kumpul_Tugas::with('tugas', 'jadwal')->whereHas('tugas', function ($q) use ($tanggalhariini) {
            $q->where('tanggal_pengumpulan', '<', $tanggalhariini);
        })->where(
            'file_upload',
            null
        )->where('siswa_id', $Siswa->id)->get(); //mengambil data kumpul tugas berdasarkan tanggal pengumpulan lebih kecil dr tanggal hari ini dan berdasarkan siswa id

        $tugasBelum['tugas'] = Kumpul_Tugas::with('tugas', 'jadwal')->whereHas('tugas', function ($q) use ($tanggal) {
            $q->where('tanggal_pengumpulan', '>', $tanggal);
        })->where(
            'file_upload',
            null
        )->where('siswa_id', $Siswa->id)->get(); //mengambil data kumpul tugas berdasarkan tanggal pengumpulan lebih besar dr tanggal hari ini dan  berdasarkan siswa id

        $sudah['sudah'] = Kumpul_Tugas::with('tugas', 'jadwal')->where(
            'file_upload',
            '!=',
            null
        )->where('siswa_id', $Siswa->id)->get(); //mengambil data kumpul tugas berdasarkan siswa id
        // $sudah['jadwal'] = $pe['mata_pelajaran']['name'];
        array_push($dedline, $mendekati);
        array_push($tampungtugas, $tugasBelum);
        array_push($batastampung, $batas);
        array_push($sudahdikumpulkan, $sudah);
        return view('tugas.view.SiswaTugasTampil', compact('dedline', 'tampungtugas', 'batastampung', 'sudahdikumpulkan'));
    }

    public function tugassiswa(Request $request)
    {
        $tahun = Setting::first()->id_tahun_ajaran;
        $Siswa = Siswa::where('id_user', Auth::user()->id)->first();
        $tanggalhariini = Carbon::now()->format('Y-m-d'); //tanggal hari ini
        $sudah = Kumpul_Tugas::with('tugas')->where('file_upload', '!=', null)->where('siswa_id', $Siswa->id)->whereHas('tugas', function ($q) use ($tahun, $tanggalhariini) {
            $q->where('tahun_ajaran_id', $tahun);
        })->count();
        $belum = Kumpul_Tugas::with('tugas')->where('file_upload', null)->where('siswa_id', $Siswa->id)->whereHas('tugas', function ($q) use ($tahun, $tanggalhariini) {
            $q->where('tahun_ajaran_id', $tahun);
        })->count();
        // dd($sudah);
        return view('tugas.view.tugassiswa', compact('belum', 'sudah'));
    }

    public function tugassiswaview(Request $request)
    {
        //menampilkan tugas siswa
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $tanggal = Carbon::now()->add(1, 'day')->format('Y-m-d'); //tanggal besok
        $tanggalhariini = Carbon::now()->format('Y-m-d'); //tanggal hari ini
        $Siswa = Siswa::where('id_user', Auth::user()->id)->first(); //mengambil data siswa berdasrkan yang login
        if ($request->kategori === 'belum') {
            $kategori = $request->kategori;
            $tugas = Kumpul_Tugas::with('tugas')->where('file_upload', null)->where('siswa_id', $Siswa->id)->whereHas('tugas', function ($q) use ($tahun, $tanggalhariini) {
                $q->where('tahun_ajaran_id', $tahun)->orderBy('tanggal_tugas', 'DESC');
            })->get(); //mengambil data kumpul tugas berdasarkan file upload null , siswa id, dan berdasarkan tahun ajaran yang berjalan
            return view('tugas.view.SiswaTugasTampil', compact('tugas', 'kategori', 'tanggalhariini'));
        } else {
            $kategori = $request->kategori;
            $tugas = Kumpul_Tugas::with('tugas')->where('file_upload', '!=', null)->where('siswa_id', $Siswa->id)->whereHas('tugas', function ($q) use ($tahun, $tanggalhariini) {
                $q->where('tahun_ajaran_id', $tahun)->orderBy('tanggal_tugas', 'DESC',);
            })->get(); //mengambil data kumpul tugas berdasarkan file upload tidak null , siswa id, dan berdasarkan tahun ajaran yang berjalan
            return view('tugas.view.SiswaTugasTampil', compact('tugas', 'kategori', 'tanggalhariini'));
        }
    }

    public function tugassiswaviewdetail(Request $request, $id)
    {
        //menampilkan detail kumpul tugas
        $title = $request->title;
        $back = $request->back;
        $kategori = $request->kategori;
        $tanggalhariini = Carbon::now()->format('Y-m-d'); //tanggal hari ini
        $tugas = Kumpul_Tugas::where('id', $id)->first(); //mengambil data kumpul tugas berdasarkan id
        return view('tugas.view.detail', compact('tugas', 'title', 'back', 'kategori', 'tanggalhariini'));
    }

    public function edit(Request $request)
    {
        //edit kumpul tugas ajax
        $id = $request->id;
        $emp = Kumpul_Tugas::with('tugas')->find($id); //mengambil data kumpul tugas berdasarkan id
        return response()->json($emp);
    }
    public function update(Request $request)
    {
        $emp = Kumpul_Tugas::Find($request->id); //mengambil data kumpul tugas berdasarkan id

        //upload file
        $lampiranFulltextFile = null;
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/file_tugas';

            $this->lampiranFulltextFile = 'file_tugas-' . $request->name . Str::random(5) . '.' . $file_extension;
            $request->file('file_upload')->move($lokasiFile, $this->lampiranFulltextFile);
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        } else {
            $this->lampiranFulltextFile = $emp->file_upload;
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        }
        //end upload file
        $empData = [
            'file_upload' => $lampiranFulltextFile,
            'kesempatan' => $emp->kesempatan - 1
        ];
        $emp->update($empData); //update kumpul tugas
        return back()->with('berhasiluploadtugas', 'dsds');
    }
}
