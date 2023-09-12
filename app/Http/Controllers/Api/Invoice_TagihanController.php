<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice_Tagihan;
use App\Models\Siswa;
use App\Models\Tagihan_Siswa;
use App\Models\Kategori_Tagihan;
use App\Models\Nilai;
use App\Models\Pembayaran;
use App\Models\Wali_Siswa;
use App\Models\Setting;
use App\Models\Tahun_ajaran;
use App\Models\Ujian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Invoice_TagihanController extends Controller
{
    public function callbck()
    {
        return response()->json(['status' => 200], 200);
    }

    public function tagihan_siswa(Request $request)
    {
        //menampilkan data tagihan siswa
        $file_path = 'https://dapurkoding.my.id/';
        $siswa = Siswa::where('id_user', $request->id_user)->first(); //mengambil data siswa berdasarkan id_user
        $invoice_tagihan = Invoice_Tagihan::with('kategori_tagihan')->where('id_siswa', $siswa->id)->where('status', 'unpaid')->get(); //mengambil data tagihan berdasarkan id siswa dan status =unpaid
        $tagihan = [];
        foreach ($invoice_tagihan as $p) {
               if ($p->kategori_tagihan->avatar != null) {
                    $ava = $file_path . 'folder_tagihan/' . $p->kategori_tagihan->avatar;
                } else {
                    $ava = $file_path . 'folder_tagihan/invoice-icon.png';
                }
    
                if ($p->kategori_tagihan->minimum_bayar != null) {
                    $minimumBayar = $p->kategori_tagihan->minimum_bayar;
                } else {
                    $minimumBayar = (int) $p['nominal'];
                }
    
                $row['id'] = $p['id_invoice'];
                $row['nama'] = $p->kategori_tagihan->kategori_tagihan->deskripsi;
                $row['nominal'] = (int) $p['nominal'];
                $row['cicil'] = (int) $p->kategori_tagihan->kategori_cicilan;
                $row['minimum_bayar'] = $minimumBayar;
                $row['batas_bayar'] = $p->kategori_tagihan->batas_bayar;
                $row['avatar'] = $ava;
                array_push($tagihan, $row);  
            // }
           
        }
        return response()->json([
            'data' => $tagihan,
            'biaya_lain' =>  [
                [
                    "idnya" => 1,
                    "nama" => "Fee Transaksi",
                    "nominal" => 5000
                ]
            ]
        ], 200);
    }


    public function list_laporan_keuangan(Request $request)
    {
        $file_path = 'https://dapurkoding.my.id/';
        $daftarKategori = Kategori_Tagihan::get(); //mengambil data kategori tagihan
        $siswa = Siswa::where('id_user', $request->id_user)->first(); //mengambil data siswa berdasarkan id_user
        if ($siswa != null) {
            $daftarSiswa = Siswa::where('id', '=', $siswa->id)->get(); //mengambil data siswa berdasarkan id
        } else {
            $waliSiswa = Wali_Siswa::where('id_user', $request->id_user)->first(); //mengambil data wali siswa berdasarkan id user
            $daftarSiswa = Siswa::where('id_orang_tua', '=', $waliSiswa->id)->get(); //mengambil data siswa berdasarkan id orang tua
        }

        $daftarKategori = Kategori_Tagihan::get(); //mengambil data kategori tagihan
        $dataKategori = [];
        foreach ($daftarKategori as $kat) {
            $rowKat['id'] = $kat['id'];
            $rowKat['name'] = $kat->nama_kategori;
            array_push($dataKategori, $rowKat);
        }
        $dataSiswa = [];
        $dataIDSiswa = [];
        foreach ($daftarSiswa as $sis) {
            $row['id'] = $sis->nisn;
            $row['name'] = $sis->nama_siswa;
            $row['avatar'] = $file_path . 'avatar/' . $sis->avatar;
            array_push($dataSiswa, $row);

            $rowIDsiswa = $sis->id;
            array_push($dataIDSiswa, $rowIDsiswa);
        }
        $setting = Setting::first(); //mengambil data setting
        $pembayaran = DB::table("pembayarans")->select(DB::raw('YEAR(tanggal_pembayaran) year, MONTH(tanggal_pembayaran) month'))
            ->whereIn('siswa_id', $dataIDSiswa)
            ->where('id_tahun_ajaran', $setting->id_tahun_ajaran)
            ->groupby('year', 'month')
            ->get(); //mengambil data pembayaran berdasarkan siswa id dan berdasarkan tahun ajaran yang berlangsung


        $dataPeriode = [];
        foreach ($pembayaran as $pem) {
            $month = $pem->year . '-' . $pem->month;
            $start = Carbon::parse($month)->startOfMonth();
            $end = Carbon::parse($month)->endOfMonth();

            $rowPer['bulan'] = $this->getBulan($pem->month) . ' ' . $pem->year;
            $rowPer['tgl_mulai'] = $start->format('Y-m-d');
            $rowPer['tgl_akhir'] = $end->format('Y-m-d');
            array_push($dataPeriode, $rowPer);
        }

        return response()->json([
            'kategori' => $dataKategori,
            'siswa' => $dataSiswa,
            'periode' => $dataPeriode,
        ], 200);
    }

    function getBulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }

    public function index()
    {
        //menampilkan data tagihan yang berstatus paid
        $admin = Invoice_Tagihan::with('user', 'kategori_tagihan')->where('status', 'paid')->get(); //mengambil tagihan berdasarkn status paid
        $tagihan = [];
        foreach ($admin as $p) {
            $registeredAt = $p->created_at->isoFormat('D MMMM Y');
            $row['id'] = $p['id'];
            $row['nominal'] = $p['nominal'];
            $row['status'] = $p['status'];
            $row['invoice'] = $p['id_invoice'];
            $row['tanggal'] = $this->tgl_indo($p['tanggal']);
            $row['nama_tagihan'] = $p['kategori_tagihan']['nama_kategori'];
            $row['check'] = false;
            array_push($tagihan, $row);
        }

        return response()->json(
            $tagihan
        );
    }

    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    public function listnilai(Request $request)
    {
        //menampilkan list nilai
        $file_path = 'https://dapurkoding.my.id/';
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil tahun ajaran yang berlangsung
        $semester = Setting::first()->semester;//mengambil semester yang berlangsung
        $siswa = Siswa::where('id_user', $request->id_user)->first(); //mengambil data siswa berdasarkn id user
        $semesterpush = []; 
        $ujian = Ujian::where('tahun_ajaran_id', $tahun)->select('semester')->groupBy('semester')->orderBy('semester', 'ASC')->get(); //mengambil data ujian berdasarkan tahun ajaran 
        foreach ($ujian as $index => $uji) {
            $row['id'] = $index + 1;
            $row['name'] = 'Semester ' . $uji->semester;
            array_push($semesterpush, $row);
        }
        $tampungtanggal = [];
        $absen = Ujian::where('tahun_ajaran_id', $tahun)->select(DB::raw('YEAR(tanggal) year, MONTH(tanggal) month'))->groupby('year', 'month')->get(); //mengambil data ujian berdasarkan tahun ajaran 
        foreach ($absen as $index => $abs) {
            $TanggalAsli = Ujian::whereMonth('tanggal', $abs->month)->whereYear('tanggal', $abs->year)->first()->tanggal; //mengambil data ujian berdasarkan tanggal
            $law['bulan'] = Carbon::createFromFormat('Y-m-d', $TanggalAsli)->isoFormat("MMMM") . ' ' . Carbon::createFromFormat('Y-m-d', $TanggalAsli)->isoFormat("Y");
            $law['tgl_mulai'] = Ujian::whereMonth('tanggal', $abs->month)->whereYear('tanggal', $abs->year)->orderBy('tanggal', 'ASC')->first()->tanggal;//mengambil data ujian berdasarkan tanggal
            $law['tgl_akhir'] = Ujian::whereMonth('tanggal', $abs->month)->whereYear('tanggal', $abs->year)->orderBy('tanggal', 'DESC')->first()->tanggal;//mengambil data ujian berdasarkan tanggal
            array_push($tampungtanggal, $law);
        }

        $tahun_ajaran = Ujian::select('tahun_ajaran_id')->groupBy('tahun_ajaran_id')->orderBy('tahun_ajaran_id', 'ASC')->get(); //mengambil data ujian 
        $tampungtahun = [];
        foreach ($tahun_ajaran as $tahun) {
            $tah['tahun_ajaran_id'] = $tahun->tahun_ajaran_id;
            $tah['tahun_ajaran'] = Tahun_ajaran::where('id', $tahun->tahun_ajaran_id)->first()->tahun_ajaran; //mengambil data tahun ajaran berdasarkan id
            array_push($tampungtahun, $tah);
        }
        
        if($siswa->avatar != null){
            $ava = $file_path . 'avatar/' . $siswa->avatar;
        } else {
            $ava = null;
        }
        
        return response()->json([
            // 'tahun_ajaran' => $tampungtahun,
            'kategori' => $semesterpush,
            "siswa" => [[
                'id' => $siswa->nomor_induk_siswa,
                'name' => $siswa->nama_siswa,
                'avatar' =>  $ava
            ]],
            "periode" => $tampungtanggal
        ]);
    }
}
