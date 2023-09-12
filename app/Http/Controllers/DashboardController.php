<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\JenjangPendidikan;
use App\Models\Kegiatan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Wali_Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use PDF;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function pdfview(Request $request)
    {
        //pdf view
        $items = DB::table("siswas")->take(10)->get();
        view()->share('items', $items);
        return view('pdfview');
    }
    public function buatPdf(Request $request)
    {
        //tidak dipakai
        $file_path = 'https://dapurkoding.my.id/';
        $mulai = '2022-01-01';
        $selesai = '2022-01-31';
        $tahun = Carbon::createFromFormat('Y-m-d', $mulai)->format("Y");
        $tglMulai = Carbon::createFromFormat('Y-m-d', $mulai)->format("dM");
        $tglSelesai = Carbon::createFromFormat('Y-m-d', $selesai)->format("dM");


        $namaFile = 'Laporan_siswa_' . $tglMulai . '_' . $tglSelesai . '_' . $tahun . '.pdf';
        //dd($namaFile);
        $items = DB::table("siswas")->take(10)->get();
        view()->share('items', $items);
        $pdf = PDF::loadView('pdfview');
        $pdf->save(public_path() . '/simpanPDF/' . $namaFile);
        return response()->json([
            'url' => $file_path . 'simpanPDF/' . $namaFile
        ], 200);
    }

    public function isiDashboard()
    {
        $roleUser = Auth::user()->role; //mengambil data role user yang sudah login
        $jumlahSiswa = Siswa::count(); //mnghitung semua jumlah siswa
        $guru = Guru::count(); //menghitung semua jumlah guru
        $waliSiswa = Wali_Siswa::count(); //menghitung semua wali siswa
        $staff = User::whereNotIn('role', [
            5,
            4,
            3,
        ])->count();
        if ($roleUser === '5') { //hanya siswa yang bisa melihat
            $output = '<div class="row">
			            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Pelajaran</h4>
                                </div>
                                <div class="card-body">
                                    ' . $jumlahSiswa . '
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="far fa-newspaper"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Pemberitahuan</h4>
                                </div>
                                <div class="card-body">
                                   ' . $guru . '
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                          <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Ujian</h4>
                          </div>
                          <div class="card-body">
                            ' . $waliSiswa . '
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                          <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Ujian Online</h4>
                          </div>
                          <div class="card-body">
                            ' . $waliSiswa . '
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                          <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Guru</h4>
                          </div>
                          <div class="card-body">
                            ' . $waliSiswa . '
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                          <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Peminjaman Buku</h4>
                          </div>
                          <div class="card-body">
                            ' . $waliSiswa . '
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                          <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Tugas Menunggu</h4>
                          </div>
                          <div class="card-body">
                            ' . $waliSiswa . '
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                          <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Kehadiran Bulan Ini</h4>
                          </div>
                          <div class="card-body">
                            ' . $staff . '
                          </div>
                        </div>
                    </div>
                </div></div>';


            echo $output;
        } elseif ($roleUser === '3') { //hanya guru yang bisa melihat
            $output = '<div class="row">
			            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Siswa</h4>
                                </div>
                                <div class="card-body">
                                    ' . $jumlahSiswa . '
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="far fa-newspaper"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Guru</h4>
                                </div>
                                <div class="card-body">
                                   ' . $guru . '
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                          <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Orang Tua Siswa</h4>
                          </div>
                          <div class="card-body">
                            ' . $waliSiswa . '
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                          <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Staff</h4>
                          </div>
                          <div class="card-body">
                            ' . $staff . '
                          </div>
                        </div>
                    </div>
                    </div>
                </div>';
            $output .= '<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                              <h4>Statistik Siswa</h4>
                            </div>
                            <div class="card-body">
                              <canvas id="myBarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>';
            echo $output;
        } elseif ($roleUser === '4') { //hanya wali kelas yang bisa melihat
            # code...
        } elseif ($roleUser === '2') {
            # code...
        } elseif ($roleUser === '1') { //hanya admin yang bisa melihat
            $output = '<div class="row">
			            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Siswa</h4>
                                </div>
                                <div class="card-body">
                                    ' . $jumlahSiswa . '
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="far fa-newspaper"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Guru</h4>
                                </div>
                                <div class="card-body">
                                   ' . $guru . '
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                          <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Orang Tua Siswa</h4>
                          </div>
                          <div class="card-body">
                            ' . $waliSiswa . '
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                          <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Staff</h4>
                          </div>
                          <div class="card-body">
                            ' . $staff . '
                          </div>
                        </div>
                    </div>
                    </div>
                </div>';
            //   $output .= '<div class="row">
            //                 <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            //                     <div class="card">
            //                         <div class="card-header">
            //                           <h4>Statistik Siswa</h4>
            //                         </div>
            //                         <div class="card-body">
            //                           <canvas id="myBarChart"></canvas>
            //                         </div>
            //                     </div>
            //                 </div>
            //             </div>';
            echo $output;
        }
    }
    public function ppdb()
    {
        //menampilkan semua jenjang
        $jenjang = JenjangPendidikan::all(); //mengambil data semua jenjang
        return view('ppdb.daftar', compact('jenjang'));
    }
    public function welcome()
    {
        //menampilkan data di halaman awal
        $kegiatan = Kegiatan::where('status', 1)->get(); //mengambil data kegiatan yg status aktif
        $berita = Berita::where('status', 1)->get(); //mengambil data berita yg status aktif
        return view('welcome', compact('kegiatan', 'berita'));
    }
    public function index()
    {
        //view dashboard
        $jenjang = JenjangPendidikan::get(); //mengambil data semua jenjang
        $siswa = Siswa::count(); //menghitung semua siswa
        $guru = Guru::count(); //menghitung semua guru
        $waliSiswa = Wali_Siswa::count(); //menghitung semua wali siswa
        $staff = User::whereNotIn('role', [
            5,
            4,
            3,
        ])->count();
        $tot_sis = Siswa::where('jenjang_pendidikan_id', 3)->count(); //menghitung semua siswa dengan jenjang sma
        $tot_sis_smp = Siswa::where('jenjang_pendidikan_id', 2)->count(); //menghitung semua siswa dengan jenjang smp
        $tot_sis_sd = Siswa::where('jenjang_pendidikan_id', 1)->count(); //menghitung semua siswa dengan jenjang sd
        $kegiatans = Kegiatan::where('status', 1)->get(); //menampilkan semua kegiatan berstatus aktif
        return view('dashboard', compact('tot_sis', 'tot_sis_smp', 'tot_sis_sd', 'jenjang', 'siswa', 'guru', 'waliSiswa', 'staff', 'kegiatans'));
    }
}
