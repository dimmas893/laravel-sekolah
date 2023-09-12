<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Invoice_Tagihan;
use App\Models\Kategori_Tagihan;
use App\Models\Kumpul_Tugas;
use App\Models\Mata_Pelajaran;
use App\Models\Nilai;
use App\Models\Rincian_Pembayaran;
use App\Models\Semester;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\Tagihan_Siswa;
use App\Models\Tahun_ajaran;
use App\Models\Ujian;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporanKeuangan(Request $request)
    {
        //laporan keuangan pdf
        $file_path = 'https://dapurkoding.my.id/';
        $mulai = $request->mulai;
        $selesai = $request->selesai;
        $siswa = Siswa::where('nomor_induk_siswa', $request->id_siswa)->first();  //mengambil data siswa berdasarkan nomor induk siswa
        $namaFile = 'Laporan_keuangan_' . $siswa->nomor_induk_siswa . $mulai . '_' . $selesai  . '.pdf'; //nama laporan
        $kategoritagihan = Kategori_Tagihan::where('id', $request->id_kategori)->first(); //mengambil data kategori tagihan berdasarkan id
        $TagihanSiswa = Tagihan_Siswa::where('id_kategori_tagihan', $kategoritagihan->id)->get(); //mengambil data tagihan siswa berdasarkan id_kategori_tagihan
        $tampung = [];
        foreach ($TagihanSiswa as $tagihanSis) {
            $invoice = Invoice_Tagihan::where('id_siswa', $siswa->id)->where('id_tagihan', $tagihanSis->id)->first(); //mengambil tagihan berdasarkan di siswa dan berdasarkan id tagihan
            if ($invoice) {
                if ($invoice->status === 'paid') { //kondisi jika data tagihan status paid
                    $pembayaran = Rincian_Pembayaran::whereBetween('tanggal_pembayaran', [$mulai, $selesai])->where('id_invoice', $invoice->id_invoice)->get(); //mengambil data rincian pembayaran berdasarkan range tanggal_pembayaran dr $mulai dan $selesai dan berdasarkan id invoice
                    foreach ($pembayaran as $pem) {
                        $row['kategori_tagihan'] = $tagihanSis['kategori_tagihan']['nama_kategori'];
                        $row['nominal'] = $invoice['nominal'];
                        array_push($tampung, $row);
                    }
                }
            }
        }
        $pdf = PDF::loadView('pdf.periode', compact('tampung'));
        $pdf->save(public_path() . '/simpanPDF/' . $namaFile); //save pdf
        // dd($tampung);
        return response()->json([
            'url' => $file_path . 'simpanPDF/' . $namaFile
        ], 200);
    }

    public function laporanabsenpdf(Request $request)
    {
        //laporan absen
        $file_path = 'https://dapurkoding.my.id/';
        $mulai = $request->mulai;
        $selesai = $request->selesai;
        $setting = Setting::first(); //mengambil data setting
        $siswa = Siswa::where('id_user', $request->id_siswa)->first(); //mengambil data siswa berdasarkan id user
        $hadir = Absen::where('tahun_ajaran', $setting->id_tahun_ajaran)->where('siswa_id', $siswa->id)->where('semester', $setting->semester)->whereBetween('tanggal', [$mulai, $selesai])->where('tipe_kehadiran', '0')->count(); //menghitung data absen berdasarkan semester, tahun ajaran, siswa id, range tanggal dr $mulai dan $selesai dg tipe kehadiran 0
        $sakit = Absen::where('tahun_ajaran', $setting->id_tahun_ajaran)->where('siswa_id', $siswa->id)->where('semester', $setting->semester)->whereBetween('tanggal', [$mulai, $selesai])->where('tipe_kehadiran', '1')->count(); //menghitung data absen berdasarkan semester, tahun ajaran, siswa id, range tanggal dr $mulai dan $selesai dg tipe kehadiran 1
        $izin = Absen::where('tahun_ajaran', $setting->id_tahun_ajaran)->where('siswa_id', $siswa->id)->where('semester', $setting->semester)->whereBetween('tanggal', [$mulai, $selesai])->where('tipe_kehadiran', '2')->count(); //menghitung data absen berdasarkan semester, tahun ajaran, siswa id, range tanggal dr $mulai dan $selesai dg tipe kehadiran 2
        $alpha = Absen::where('tahun_ajaran', $setting->id_tahun_ajaran)->where('siswa_id', $siswa->id)->where('semester', $setting->semester)->whereBetween('tanggal', [$mulai, $selesai])->where('tipe_kehadiran', '3')->count(); //menghitung data absen berdasarkan semester, tahun ajaran, siswa id, range tanggal dr $mulai dan $selesai dg tipe kehadiran 3
        $namaFile = 'Laporan_absensi_' . $siswa->nomor_induk_siswa . $mulai . '_' . $selesai  . '.pdf'; //nama file
        $pdf = PDF::loadView('pdf.laporanabsenpdf', compact('siswa', 'hadir', 'sakit', 'izin', 'alpha'));
        $pdf->save(public_path() . '/simpanPDF/' . $namaFile); //save file
        return response()->json([
            'url' => $file_path . 'simpanPDF/' . $namaFile
        ], 200);
    }

    public function laporannilai(Request $request)
    {
        //lapora nilai
        $file_path = 'https://dapurkoding.my.id/';
        $mulai = $request->mulai;
        $selesai = $request->selesai;
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $tahun_ajaranmulai = Tahun_ajaran::where('tahun_ajaran', substr($mulai, 0, 4))->first();  //mengambil data tahun ajaran berdasarkan tahun ajaran

        $tahun_ajaranselesai = Tahun_ajaran::where('tahun_ajaran', substr($selesai, 0, 4))->first(); //mengambil data tahun ajaran berdasarkan tahun ajaran
        $settingmulai = Setting::where('id_tahun_ajaran', $tahun_ajaranmulai->id)->first(); //mengambil data setting berdasarkan id tahun ajaran
        $settingselesai = Setting::where('id_tahun_ajaran', $tahun_ajaranselesai->id)->first(); //mengambil data setting berdasarkan id tahun ajaran
        $siswa = Siswa::where('id_user', $request->id_siswa)->first(); //mengambil data siswa berdasarkan id user
        if ($settingmulai != null && $settingselesai != null) {
            $matapelajaran = Mata_Pelajaran::where('tingkatan', $siswa->tingkat)->where('tahun_ajaran_id', $tahun)->where('jurusan', $siswa->jurusan)->select('id')->groupBy('id')->get(); //mengambil data mata pelajaran berdasarkan tingkatan dan berdasarkan jurusan

            $tampungujian = [];
            $scoreuts = [];
            $scoreuas = [];
            $id = $siswa->id;
            foreach ($matapelajaran as $mata) {
                $matamata = $mata->id;
                $ujian = Ujian::where('tahun_ajaran_id', $settingmulai->id_tahun_ajaran)->where('mata_pelajaran_id', $mata->id)->get(); //mengambil data ujian berdasarkan tahun ajarann dan berdasarkan mata pelajaran id
                if ($ujian) {
                    foreach ($ujian as $uji) {
                        if ($uji->jenis_ujian === 'uas') {
                            $ceknilai = Nilai::where('ujian_id', $uji->id)->where('siswa_id', $siswa->id)->first(); //mengambil nilai berdasarkan ujian id dan berdasarkan siswa id
                            if ($ceknilai) {
                                array_push($scoreuas, (int)$ceknilai['score']);
                            }
                        }
                        if ($uji->jenis_ujian === 'uts') {
                            $ceknilai = Nilai::where('ujian_id', $uji->id)->where('siswa_id', $siswa->id)->first(); //mengambil data nilai berdasarkan ujian id dan siswa id
                            if ($ceknilai) {
                                array_push($scoreuas, (int)$ceknilai['score']);
                            }
                        }
                    }
                }
                // dd($ujian);
                if (count($scoreuas) > 0) {
                    $row['uas'] =  substr(floor(array_sum($scoreuas) / count($scoreuas)), 0, 2); //perhitungan nilai
                } else {
                    $row['uas'] = 0;
                }
                if (count($scoreuts) > 0) {
                    $row['uts'] = substr(floor(array_sum($scoreuts) / count($scoreuts)), 0, 2); //perhitungan nilai
                } else {
                    $row['uts'] = 0;
                }

                $row['matapelajaran'] = Mata_Pelajaran::where('id', $mata->id)->where('tahun_ajaran_id', $tahun)->first()->name; // mengambil data mata pelajaran berdasarkan id mengambil data properti name
                $hitung = Kumpul_Tugas::whereHas('tugas', function ($q) use ($matamata, $mulai, $selesai) {
                    $q->whereBetween('tanggal_tugas', [$mulai, $selesai])->where('mata_pelajaran_id', $matamata);
                })->where('siswa_id', $siswa->id)->count(); //menghitung jumlah daata kumpul tugas berdasarkan range tanggal_tugas dr $mulai dan $selesai dan berdasarkan mata pelajaran
                $hitungcek = Kumpul_Tugas::whereHas('tugas', function ($q) use ($matamata, $mulai, $selesai) {
                    $q->whereBetween('tanggal_tugas', [$mulai, $selesai])->where('mata_pelajaran_id', $matamata);
                })->where('siswa_id', $siswa->id)->first();
                $sum = Kumpul_Tugas::whereHas('tugas', function ($q) use ($matamata, $mulai, $selesai) {
                    $q->whereBetween('tanggal_tugas', [$mulai, $selesai])->where('mata_pelajaran_id', $matamata);
                })->where('siswa_id', $siswa->id)->sum('nilai_tugas'); //menghitung nilai daata kumpul tugas berdasarkan range tanggal_tugas dr $mulai dan $selesai dan berdasarkan mata pelajaran
                $sumcek = Kumpul_Tugas::whereHas('tugas', function ($q) use ($matamata, $mulai, $selesai) {
                    $q->whereBetween('tanggal_tugas', [$mulai, $selesai])->where('mata_pelajaran_id', $matamata);
                })->where('siswa_id', $siswa->id)->first();

                if ($sumcek != null && $hitungcek != null) {
                    if ($sum > 0 && $hitung > 0) {
                        $row['tugas'] = substr(floor((int)$sum / (int)$hitung), 0, 2);
                    } else {
                        $row['tugas'] = 0;
                    }
                }

                array_push($tampungujian, $row);
            }
            $namaFile = 'Laporan_Nilai_' . $siswa->nomor_induk_siswa . '.pdf';
            $pdf = PDF::loadView('pdf.laporannilai', compact('tampungujian'));
            // dd($pdf);
            $pdf->save(public_path() . '/simpanPDF/' . $namaFile); //save file
            return response()->json([
                'url' => $file_path . 'simpanPDF/' . $namaFile
            ], 200);
        } else {
            return response()->json([
                'error' => ['tanggal harus tahun ajaran yang berjalan']
            ], 404);
        }
    }

    public function periode(Request $request)
    {
        //menampilkan periode
        $file_path = 'https://dapurkoding.my.id/';
        $mulai = $request->mulai;
        $selesai = $request->selesai;
        $siswa = Siswa::where('nomor_induk_siswa', $request->id_siswa)->first(); //mengambil data siswa berdasarkan id user
        $namaFile = 'Laporan_keuangan_' . $siswa->nomor_induk_siswa . $mulai . '_' . $selesai  . '.pdf'; //nama pdf
        $kategoritagihan = Kategori_Tagihan::where('id', $request->id_kategori)->first(); //mengambil data kategori tagihan  berdasarkan id
        $TagihanSiswa = Tagihan_Siswa::where('id_kategori_tagihan', $kategoritagihan->id)->get(); //mengambil data tagihan siswa berdasarkan id
        $tampung = [];
        foreach ($TagihanSiswa as $tagihanSis) {
            $invoice = Invoice_Tagihan::where('id_siswa', $siswa->id)->where('id_tagihan', $tagihanSis->id)->first(); //mengambil data tagihan berdasarkan siswa id dan berdasarkan id_tagihan
            if ($invoice) {
                if ($invoice->status === 'paid') {
                    $pembayaran = Rincian_Pembayaran::whereBetween('tanggal_pembayaran', [$mulai, $selesai])->where('id_invoice', $invoice->id_invoice)->get(); //mengambil data rincian pembayaran berdasarkan range tanggal pembayaran dr $mulai dan $selesai dan berdasarkan id invoice
                    // dd($pembayaran);
                    foreach ($pembayaran as $pem) {
                        $row['kategori_tagihan'] = $tagihanSis['kategori_tagihan']['nama_kategori'];
                        $row['nominal'] = $invoice['nominal'];
                        array_push($tampung, $row);
                    }
                }
            }
        }
        $pdf = PDF::loadView('pdf.periode', compact('tampung'));
        $pdf->save(public_path() . '/simpanPDF/' . $namaFile);  //save pdf
        return response()->json([
            'url' => $file_path . 'simpanPDF/' . $namaFile
        ], 200);
    }

    public function laporanabsen(Request $request)
    {
        //laporan absen pdf
        $file_path = 'http://dapurkoding.my.id/';
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berjalan
        $siswa = Siswa::where('id_user', $request->id_user)->first(); //mengambil data siswa berdasarkan id user
        $absen = Absen::where('siswa_id', $siswa->id)->select(DB::raw('YEAR(tanggal) year, MONTH(tanggal) month'))->groupby('year', 'month')->get(); //mengambil data absen berdasarkan siswa id
        $tampungtanggal = [];
        foreach ($absen as $abs) {
            $TanggalAsli = Absen::where('siswa_id', $siswa->id)->whereMonth('tanggal', $abs->month)->whereYear('tanggal', $abs->year)->first()->tanggal; //mengambil data absen berdasaran siswa id
            $row['bulan'] = Carbon::createFromFormat('Y-m-d', $TanggalAsli)->isoFormat("MMMM") . ' ' . Carbon::createFromFormat('Y-m-d', $TanggalAsli)->isoFormat("Y");
            $row['tgl_mulai'] = Absen::where('siswa_id', $siswa->id)->whereMonth('tanggal', $abs->month)->whereYear('tanggal', $abs->year)->orderBy('tanggal', 'ASC')->first()->tanggal; //mengambil data absen berdasaran siswa id
            $row['tgl_akhir'] = Absen::where('siswa_id', $siswa->id)->whereMonth('tanggal', $abs->month)->whereYear('tanggal', $abs->year)->orderBy('tanggal', 'DESC')->first()->tanggal; //mengambil data absen berdasaran siswa id
            array_push($tampungtanggal, $row);
        }
        // dd($tampungtanggal);
        if ($siswa) {
            return response()->json([
                "siswa" => [[
                    'id' => strval($request->id_user),
                    'name' => $siswa->nama_siswa,
                    'avatar' =>  $file_path . 'avatar/' . $siswa->avatar
                ]],
                "periode" => $tampungtanggal
            ]);
        }
    }
}
