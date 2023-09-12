<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Jadwal;
use App\Models\JenjangPendidikan;
use App\Models\Kelas;
use App\Models\Rincian_Siswa;
use App\Models\Setting;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{
    public function laporan_absen_admin_view()
    {
        $setting = Setting::first(); //mengambil data yang sedang berjalan (tahun ajaran dan semester)
        $kelas = Kelas::where('id_tahun_ajaran', $setting->id_tahun_ajaran)->get(); //mengambil dat kelas berdasarkan tahun ajaran yang berlaku
        $jenjang_pendidikan = JenjangPendidikan::all(); //mengambil semua data jenjang pendidikan
        return view('admin.halaman_user.laporan_absen', compact('kelas', 'jenjang_pendidikan'));
    }

    public function laporan_absen_admin(Request $request)
    {
        $setting = Setting::first();//mengambil data yang sedang berjalan (tahun ajaran dan semester)
        $kelas = Kelas::where('id', $request->kelas_id)->first();//mengambil data kelas berdasarkan request id kelas
        return view('admin.halaman_user.laporan_absen_tampil', compact('kelas', 'setting'));
    }
    public function laporan_absen(Request $request)
    {
        $siswa = Siswa::where('id_user', Auth::user()->id)->first(); //data siswa berdasarkan siswa yang login
        if ($siswa) { //kalau data siswa ada maka lanjutkan
            $rincian_siswa = Kelas::where('id', $siswa->kelas)->first(); //mengambil data kelas berdasarkan kelas si siswa
            $tampung_absen = [];
            $laporan = []; // menampung semua data absen dr foreach di bawah
            $jadwal = Jadwal::where('kelas_id', $rincian_siswa->id)->get();//mengambil data berdasarkan jadwal siswa tersebut
            foreach ($jadwal as $pe) {
                $hadir = Absen::where('jadwal_id', $pe->id)->where('siswa_id', $siswa->id)->where('tipe_kehadiran', '0')->count();//menghitung data absen siswa tersebut dengan status 0
                $sakit = Absen::where('jadwal_id', $pe->id)->where('siswa_id', $siswa->id)->where('tipe_kehadiran', '1')->count();//menghitung data absen siswa tersebut dengan status 1
                $izin = Absen::where('jadwal_id', $pe->id)->where('siswa_id', $siswa->id)->where('tipe_kehadiran', '2')->count();//menghitung data absen siswa tersebut dengan status 2
                $alpha = Absen::where('jadwal_id', $pe->id)->where('siswa_id', $siswa->id)->where('tipe_kehadiran', '3')->count();//menghitung data absen siswa tersebut dengan status 3
                $terlambat = Absen::where('jadwal_id', $pe->id)->where('siswa_id', $siswa->id)->where('tipe_kehadiran', '4')->count();//menghitung data absen siswa tersebut dengan status 4
                $row['jadwal'] = $pe['kelasget']['kelas']['name'] . ' / ' . $pe['ruangan']['name'] . ' / ' . $pe['mata_pelajaran']['name'];
                $row['pertemuan'] = $hadir + $sakit + $izin + $alpha + $terlambat;//hasil pertemuan dihitung dr pertambahan antara hadir, sakit, izin, alpha
                $row['hadir'] = $hadir;
                $row['sakit'] = $sakit;
                $row['izin'] = $izin;
                $row['alpha'] = $alpha;
                $row['terlambat'] = $terlambat;
                array_push($laporan, $row);
            }
            return view('absen.laporan', compact('laporan'));
        } else {
            //jika data siswa tidak ada maka dialihkan ke halaman sebelumnya
            return back()->with('gagalmasuk', 'h');
        }
    }


    public function laporan_filter_absensi_siswa(Request $request)
    {
        $setting = Setting::first(); //mengambil data yang sedang berjalan (tahun ajaran dan semester)
        $kelas_id = $request->kelas_id; //request kelas_id dr form input
        $rincian_siswa = Kelas::where('id', $kelas_id)->first(); //mengambil data kelas berdasarkan request kelas_id di form input
        $tampung_absen = [];
        $laporan = [];  // menampung semua data absen dr foreach di bawah
        $siswa = Siswa::where('kelas', $kelas_id)->get();//mengambil data siswa berdasarkan request kelas_id dr form input
        foreach ($siswa as $pe) {
            //menghitung total absen siswa berdasarkan siswa tersebut, kelasnya, tahun ajaran yang berlangsung, semester yang berlangsung, dan berdasarkan range tanggal request awal sampai request akhir dengan stasus 0
            $hadir = Absen::where('siswa_id', $pe->id)->where('kelas_id', $rincian_siswa->id)->where('tahun_ajaran', $setting->id_tahun_ajaran)->where('semester', $setting->semester)->whereBetween('tanggal', [$request->awal, $request->akhir])->where('tipe_kehadiran', '0')->count();
            //menghitung total absen siswa berdasarkan siswa tersebut, kelasnya, tahun ajaran yang berlangsung, semester yang berlangsung, dan berdasarkan range tanggal request awal sampai request akhir dengan stasus 1
            $sakit = Absen::where('siswa_id', $pe->id)->where('kelas_id', $rincian_siswa->id)->where('tahun_ajaran', $setting->id_tahun_ajaran)->where('semester', $setting->semester)->whereBetween('tanggal', [$request->awal, $request->akhir])->where('tipe_kehadiran', '1')->count();
            //menghitung total absen siswa berdasarkan siswa tersebut, kelasnya, tahun ajaran yang berlangsung, semester yang berlangsung, dan berdasarkan range tanggal request awal sampai request akhir dengan stasus 2
            $izin = Absen::where('siswa_id', $pe->id)->where('kelas_id', $rincian_siswa->id)->where('tahun_ajaran', $setting->id_tahun_ajaran)->where('semester', $setting->semester)->whereBetween('tanggal', [$request->awal, $request->akhir])->where('tipe_kehadiran', '2')->count();
            //menghitung total absen siswa berdasarkan siswa tersebut, kelasnya, tahun ajaran yang berlangsung, semester yang berlangsung, dan berdasarkan range tanggal request awal sampai request akhir dengan stasus 3
            $alpha = Absen::where('siswa_id', $pe->id)->where('kelas_id', $rincian_siswa->id)->where('tahun_ajaran', $setting->id_tahun_ajaran)->where('semester', $setting->semester)->whereBetween('tanggal', [$request->awal, $request->akhir])->where('tipe_kehadiran', '3')->count();
            //menghitung total absen siswa berdasarkan siswa tersebut, kelasnya, tahun ajaran yang berlangsung, semester yang berlangsung, dan berdasarkan range tanggal request awal sampai request akhir dengan stasus 4
            $terlambat = Absen::where('siswa_id', $pe->id)->where('kelas_id', $rincian_siswa->id)->where('tahun_ajaran', $setting->id_tahun_ajaran)->where('semester', $setting->semester)->whereBetween('tanggal', [$request->awal, $request->akhir])->where('tipe_kehadiran', '4')->count();
            $row['siswa'] = $pe->nama_siswa; 
            $row['pertemuan'] = $hadir + $sakit + $izin + $alpha + $terlambat;
            $row['hadir'] = $hadir;
            $row['sakit'] = $sakit;
            $row['izin'] = $izin;
            $row['alpha'] = $alpha;
            $row['terlambat'] = $terlambat;
            array_push($laporan, $row);
        }
        $awal = $request->awal; //request awal form input
        $akhir = $request->akhir; //request akhir form input
        return view('absen.filter_laporan', compact('laporan', 'kelas_id', 'awal', 'akhir'));
    }
    public function absen_satuan(Request $request)
    {
        //mengambil data absen berdasarkan request siswa_id form input, berdasarkan jadwal id form input berdasarkan tanggal hari ini
        $absen = Absen::where('siswa_id', $request->siswa_id)->where('jadwal_id', $request->jadwal_id)->where('tanggal', Carbon::now()->Format('Y-m-d'))->first();
        $update = [
            'tipe_kehadiran' => $request->tipe_kehadiran
        ];
        $absen->update($update); // update data di atas
        return back();
    }

    public function absen_masal(Request $request)
    {
        $jadwal = $request->jadwal_id; //request jadwal id form input
        $dibuat_oleh = $request->dibuat_oleh; //rewuest dibuat oleh form input
        $semester = $request->semester; //request semester oleh form input
        $kelas_id = $request->kelas_id;  //request kelas_id oleh form input
        $tahun_ajaran = $request->tahun_ajaran;  //request tahun_ajaran oleh form input
        $puuu = []; //menampung dara dr foreach
        
        //foreach berdasarkan siswa_id array oleh form input
        foreach ($request['siswa_id'] as $pu) {
            $aku = $pu;
            array_push($puuu, $aku); //mengumpulkan data menjadi 1 array dr request siswa id
        }
        $setting = Setting::first(); //mengambil data yang sedang berjalan (tahun ajaran dan semester)
        $tanggalhariini = Carbon::now()->Format('Y-m-d'); //tanggal hari ini

        //mengambil data absen berdasarkan request jadwal id, tahun ajaran yang berlangsung, semester yang berlangsung dan tanggal hari ini
        $cek_jadwal = Absen::where('jadwal_id', $jadwal)->where('tahun_ajaran', $setting->id_tahun_ajaran)->where('semester', $setting->semester)->where('tanggal', $tanggalhariini)->first();
        
        
        if ($cek_jadwal === null) { // jika datanya null eksekusi code dibawah ini
            foreach ($request['group'] as $p => $value) { //foreach request group dari form input
            
                //mengambil data absen berdasarkan request jadwal, tahun ajaran yang berlaku, semester yang berlaku, dan berdasarkan siswa is
                $absenaaaaaa_CEK = Absen::where('jadwal_id', $jadwal)->where('tahun_ajaran', $setting->id_tahun_ajaran)->where('semester', $setting->semester)->where('siswa_id', $puuu[$p])->count();
                if ($absenaaaaaa_CEK === 0) { //kondisi jika data absen tidak ada
                    $create = [
                        'siswa_id' => $puuu[$p],
                        'jadwal_id' => $jadwal,
                        'tanggal' => $tanggalhariini,
                        'tipe_kehadiran' => $value,
                        'pertemuan' => $absenaaaaaa_CEK + 1,
                        'dibuat_oleh' => $dibuat_oleh,
                        'semester' => $semester,
                        'kelas_id' => $kelas_id,
                        'tahun_ajaran' => $tahun_ajaran
                    ];
                    $absens = Absen::create($create);
                } else {  //kondisi jika data absen ada
                    $create = [
                        'siswa_id' => $puuu[$p],
                        'jadwal_id' => $jadwal,
                        'tanggal' => $tanggalhariini,
                        'tipe_kehadiran' => $value,
                        'pertemuan' => $absenaaaaaa_CEK + 1,
                        'dibuat_oleh' => $dibuat_oleh,
                        'semester' => $semester,
                        'kelas_id' => $kelas_id,
                        'tahun_ajaran' => $tahun_ajaran
                    ];
                    $absens = Absen::create($create);
                }
            }
        }
        if ($cek_jadwal != null) { //kondisi jika variable cek_jadwal ada datanya
            if ($cek_jadwal->tanggal === $tanggalhariini) { //kondisi jika variable cek_jadwal ada datanya di tanggal hari ini
                return back()->with('sudahabsen', 'd');
            }
        } else {
            return back()->with('berhasilabsen', 'd');
        }
    }
}
