<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\Rincian_Siswa;
use App\Models\Ruangan;
use App\Models\Tugas;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Setting;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class AbsensController extends Controller
{

    public function absensi_ulang(Request $request) // daftar siswa yang akan diabsen ulang
    {
        $file_path = 'https://dapurkoding.my.id/';
        $siswaAbsenUlang = Absen::where('jadwal_id', $request['absen']['id_jadwal'])->where('tanggal', $request['absen']['tgl'])->where('tipe_kehadiran', '!=', 0)->get(); //mengambil data absen berdasarkan jadwal id, tanggal dan berdasarkan tipe kehadiran tidak sama dengan 1
        $arrayRincianSiswa = [];
        foreach ($siswaAbsenUlang as $p) {
            $row['id'] = (int) $p->siswa_id;
            $row['name'] = $p->siswa->nama_siswa;
            if ($p->siswa->avatar != 'avatar') {
                $row['avatar'] = $file_path . 'avatar/' . $p->siswa->avatar;
            } elseif ($p->siswa->avatar == 'avatar') {
                $row['avatar'] = 'https://dapurkoding.my.id/assets/img/avatar/avatar-1.png';
            } else {
                $row['avatar'] = 'https://dapurkoding.my.id/assets/img/avatar/avatar-1.png';
            }
            $row['presensi'] = (int) $p->tipe_kehadiran;
            array_push($arrayRincianSiswa, $row);
        }
        return response()->json([
            'siswa' => $arrayRincianSiswa
        ], 200);
    }

    public function simpanAbsensiUlang(Request $request)
    {
        //proses siman absen ulang
        // keterangan kehadiran
        //0 = hadir
        //1 = sakit
        //2 = izin
        //3 = alpha
        //4 = terlambat

        foreach ($request->siswa as $p => $value) { 
            Absen::where([
                ['siswa_id', '=', $value['id']],
                ['jadwal_id', '=', $request['absen']['id_jadwal']],
                ['tanggal', '=', $request['absen']['tgl']],
            ])->update([
                'tipe_kehadiran' => $value['presensi'],
            ]);
        }

        return response()->json([
            'message' => 'Berhasil Absen ulang'
        ]);
    }

    public function absensi_list(Request $request)
    {
        $file_path = 'https://dapurkoding.my.id/';
        $cekAbsenTanggal = Absen::where('jadwal_id', $request->id_jadwal)->where('tanggal', $request->tgl)->first(); //mengambil data absen berdasarkan jadwal id dan berdasarkan tanggal
        if ($cekAbsenTanggal != null) { // sudah absen pada jadwal itu dan tanggal itu
            $siswaAbsenUlang = Absen::where('jadwal_id', $request->id_jadwal)->where('tanggal', $request->tgl)->where('tipe_kehadiran', '!=', 0)->get();
            $arrayRincianSiswa = []; //menampung data dr array push
            foreach ($siswaAbsenUlang as $p) {
                $row['id'] = (int) $p->siswa_id;
                $row['name'] = $p->siswa->nama_siswa;
                if ($p->avatar) {
                    $row['avatar'] = $file_path . 'avatar/' . $p->avatar;
                } else {
                    $row['avatar'] = 'https://dapurkoding.my.id/';
                }
                $row['presensi'] = (int) $p->tipe_kehadiran;
                array_push($arrayRincianSiswa, $row);
            }
        } else { // belum absen pada jadwal itu dan tanggal itu
            $jadwaldata = Jadwal::where('id', $request->id_jadwal)->first(); //mengambil data jadwal id berdasarkan request jadwal id
            $rincianSiswa = Siswa::where('kelas', $jadwaldata->kelas_id)->get(); //mengambil data siswa berdasarka kelas
            $arrayRincianSiswa = []; //menampung data dr array push
            foreach ($rincianSiswa as $p) {
                $row['id'] = (int) $p->id;
                $row['name'] = $p->nama_siswa;
                if ($p->avatar != 'avatar') {
                    $row['avatar'] = $file_path . 'avatar/' . $p->avatar;
                } elseif ($p->avatar == 'avatar') {
                    $row['avatar'] = 'https://dapurkoding.my.id/assets/img/avatar/avatar-1.png';
                } else {
                    $row['avatar'] = 'https://dapurkoding.my.id/assets/img/avatar/avatar-1.png';
                }
                array_push($arrayRincianSiswa, $row); //mengumpulkan data array menjadi 1
            }
        }

        return response()->json([
            'siswa' => $arrayRincianSiswa
        ], 200);
    }

    // public function absensi(Request $request) //mendapatkan jadwal mengajar guru pada hari itu
    // {
    //     $date = new DateTime($request->tgl);
    //     $tanggalni = $date->format('l');
    //     $hari = Hari::where('name', $tanggalni)->first();
    //     $dataGuru = Guru::where('id_user', $request->id_user)->first();
    //     if ($dataGuru != null) {
    //         $jadwalPelajaran = Jadwal::where('guru_id', $dataGuru->id)->where('hari_id', $hari->id)->get();
    //         $arrayJadwalPelajaran = [];
    //         foreach ($jadwalPelajaran as $p) {
    //             $cekAbsenTanggal = Absen::where('jadwal_id', $p->id)->where('tanggal', $request->tgl)->first();
    //             //  dd($cekAbsenTanggal);
    //             if ($cekAbsenTanggal != null) {
    //                 $statusAbsen = 1;
    //             } else {
    //                 $statusAbsen = 0;
    //             }
    //             $tugas = Tugas::where('jadwal_id', $p->id)->count();
    //             //  dd($cekAbsenTanggal);
    //             $row['id'] = $p['id'];
    //             $row['nama'] = $p['mata_pelajaran']['name'];
    //             $row['kelas'] = $p['kelasget']['kelas']['name'];
    //             $row['jam'] = $p['jam_masuk'] . ' - ' . $p['jam_keluar'];
    //             $row['tugas'] = $tugas;
    //             $row['quiz'] = 0;
    //             $row['status_absensi'] = $statusAbsen;
    //             array_push($arrayJadwalPelajaran, $row);
    //         }
    //         return response()->json([
    //             'jampel' => $arrayJadwalPelajaran
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'error' => ['Data tidak ditemukan']
    //         ], 404);
    //     }
    // }

   public function absensi(Request $request) //mendapatkan jadwal mengajar guru pada hari itu
    {
        $setting = Setting::first(); //mengambil data setting
        $siswa = Siswa::where('id_user', $request->id_user)->first(); //mengambil data siswa berdasarkan request id user 
        $absen = Absen::where('tahun_ajaran', $setting->id_tahun_ajaran)->where('siswa_id', $siswa->id)->where('tanggal', $request->tanggal)->get(); //mengambil data absen berdasarkan tahun ajaran, siswa id dan berdasarkan tanggal
        $hadir = Absen::where('tahun_ajaran', $setting->id_tahun_ajaran)->where('siswa_id', $siswa->id)->where('tanggal', $request->tanggal)->where('tipe_kehadiran', '0')->count(); //menghitung data absen berdasarkan tahun ajaran, siswa id dan berdasarkan tanggal dan berdasarkan tipe kehadiran 0
        $sakit = Absen::where('tahun_ajaran', $setting->id_tahun_ajaran)->where('siswa_id', $siswa->id)->where('tanggal', $request->tanggal)->where('tipe_kehadiran', '1')->count(); //menghitung data absen berdasarkan tahun ajaran, siswa id dan berdasarkan tanggal dan berdasarkan tipe kehadiran 1
        $izin = Absen::where('tahun_ajaran', $setting->id_tahun_ajaran)->where('siswa_id', $siswa->id)->where('tanggal', $request->tanggal)->where('tipe_kehadiran', '2')->count(); //menghitung data absen berdasarkan tahun ajaran, siswa id dan berdasarkan tanggal dan berdasarkan tipe kehadiran 2
        $alpha = Absen::where('tahun_ajaran', $setting->id_tahun_ajaran)->where('siswa_id', $siswa->id)->where('tanggal', $request->tanggal)->where('tipe_kehadiran', '3')->count(); //menghitung data absen berdasarkan tahun ajaran, siswa id dan berdasarkan tanggal dan berdasarkan tipe kehadiran 3

        if ($siswa) { //kondisi jika variable siswa ada
            if ($absen) {
                $tampungmapel = [];
                foreach ($absen as $ab) {
                    $row['nama'] = $ab['jadwal']['mata_pelajaran']['name'];
                    $row['jam'] =  substr($ab['jadwal']['jam_masuk'], 0, 5) . ' - ' . substr($ab['jadwal']['jam_keluar'], 0, 5);
                    $row['ket'] = (int)$ab['tipe_kehadiran'];
                    array_push($tampungmapel, $row);
                }
            }
            return response()->json([
                "ringkasan" => [
                    "hadir" => $hadir,
                    "sakit" => $sakit,
                    "izin" => $izin,
                    "alpa" => $alpha,
                    "total" => $hadir + $sakit + $izin + $alpha
                ],
                "presensi_terakhir" => [
                    [
                        "tanggal" => $request->tanggal,
                        "mapel" => $tampungmapel
                    ]
                ]
            ]);
        } else { //kondisi jika data siswa tidak ada
            return response()->json(["error" => ['id user tidak ditemukan']]);
        }
    }
    public function store(Request $request)
    {
        // keterangan kehadiran
        //0 = hadir
        //1 = sakit
        //2 = izin
        //3 = alpha
        //4 = terlambat
        $dataJadwal = Jadwal::where('id', $request['absen']['id_jadwal'])->first(); //mengambil data jadwal id

        $cekAbsenTanggal = Absen::where('jadwal_id', $request['absen']['id_jadwal'])->where('tanggal', $request['absen']['tgl'])->first(); //mengambil data absen berdasarkan jadwal id dan berdasarkan tanggal
        if ($cekAbsenTanggal === null) { // jika belum melakukan absensi
            $cekAbsensiPertemuanPertama = Absen::where('jadwal_id', $request->id_jadwal)->first(); //mengambil data absen berdasarkan jadwal id
            if ($cekAbsensiPertemuanPertama === null) { // jika ini adalah pertemuan pertama
                foreach ($request->siswa as $p => $value) {
                    $create = [
                        'siswa_id' => $value['id'],
                        'jadwal_id' =>     $dataJadwal->id,
                        'tanggal' => $request['absen']['tgl'],
                        'tipe_kehadiran' => $value['presensi'],
                        'pertemuan' => 1,
                        'dibuat_oleh' => $dataJadwal->guru_id,
                    ];
                    $absens = Absen::create($create);
                }
            } else { // jika ini adalah pertemuan selanjutnya
                $absen = Absen::where('jadwal_id', $request['jadwal_id'])->latest()->first(); //mengambil data absen berdasarkan jadwal id berdasarkan data terakhir
                foreach ($request->siswa as $p => $value) {
                    $create = [
                        'siswa_id' => $value['id'],
                        'jadwal_id' => $dataJadwal->id,
                        'tanggal' => $request['absen']['tgl'],
                        'tipe_kehadiran' => $value['presensi'],
                        'pertemuan' => $absen->pertemuan + 1,
                        'dibuat_oleh' => $dataJadwal->guru_id
                    ];
                    $absens = Absen::create($create);
                }
            }

            return response()->json([
                'message' => 'Berhasil Absen'
            ]);
        } else {
            return response()->json([
                'error' => ['Siswa Sudah Absen']
            ], 403);
        }
    }

    //berhasil absensi satuan
    public function absen_satuan(Request $request)
    {
        //tidak dipakai
        $absen = Absen::where('semester', $request->semester)->where('tahun_ajaran', $request->tahun_ajaran)->where('siswa_id', $request->siswa_id)->where('jadwal_id', $request->jadwal_id)->count(); //menghiitung data absen berdasarkan semester. tahun ajaran, siswa_id dan berdasarkan jadwal id
        $absen_tanggal = Absen::where('semester', $request->semester)->where('tahun_ajaran', $request->tahun_ajaran)->where('siswa_id', $request->siswa_id)->where('jadwal_id', $request->jadwal_id)->where('tanggal', Carbon::now()->addDays(3)->Format('Y-m-d'))->latest()->first();

        if ($absen_tanggal == null) {
            if ($absen == 0) {
                $create = [
                    'siswa_id' => $request->siswa_id,
                    'jadwal_id' => $request->jadwal_id,
                    'tipe_kehadiran' => $request->tipe_kehadiran,
                    'tanggal' => Carbon::now()->addDays(3)->Format('Y-m-d'),
                    'pertemuan' => 1,
                    'dibuat_oleh' => $request->dibuat_oleh,
                    'semester' => $request->semester,
                    'kelas_id' => $request->kelas_id,
                    'tahun_ajaran' => $request->tahun_ajaran
                ];

                $absens = Absen::create($create);
                return response()->json($absens);
            }

            if ($absen > 0) {
                $absen = Absen::where('semester', $request->semester)->where('tahun_ajaran', $request->tahun_ajaran)->where('siswa_id', $request->siswa_id)->where('jadwal_id', $request->jadwal_id)->count();
                $create = [
                    'siswa_id' => $request->siswa_id,
                    'jadwal_id' => $request->jadwal_id,
                    'tipe_kehadiran' => $request->tipe_kehadiran,
                    'tanggal' => Carbon::now()->addDays(3)->Format('Y-m-d'),
                    'pertemuan' => $absen + 1,
                    'dibuat_oleh' => $request->dibuat_oleh,
                    'semester' => $request->semester,
                    'kelas_id' => $request->kelas_id,
                    'tahun_ajaran' => $request->tahun_ajaran
                ];

                $absens = Absen::create($create);
                return response()->json($absens);
            }
            return response()->json([
                'message' => 'Berhasil Absen'
            ]);
        }
        if ($absen_tanggal != null) {
            if ($absen_tanggal->tanggal == Carbon::now()->addDays(3)->Format('Y-m-d')) {
                return response()->json([
                    'message' => 'Siswa Sudah Absen'
                ]);
            }
        }
    }


    public function absen_mandiri(Request $request)
    {
        //tidak dipakai tp jangan di hapus
        $ruangan = Rincian_Siswa::where('siswa_id', $request->pin)->first();
        $data_jadwal = Jadwal::where('id', $ruangan->jadwal_id)->first();
        $data_semester = $request->semester;
        $data_tahun_ajaran = $request->tahun_ajaran;
        $tanggal_ini = Carbon::now()->Format('Y-m-d');
        $absen = Absen::where('semester', $data_semester)->where('tahun_ajaran', $data_tahun_ajaran)->where('siswa_id', $data_jadwal->siswa_id)->where('jadwal_id', $data_jadwal->id)->count();
        $absen_tanggal = Absen::where('semester', $data_semester)->where('tahun_ajaran', $data_tahun_ajaran)->where('siswa_id', $data_jadwal->siswa_id)->where('jadwal_id', $data_jadwal->id)->where('tanggal', $tanggal_ini)->latest()->first();

        if ($absen_tanggal == null) {
            if ($absen == 0) {
                $create = [
                    'siswa_id' => $ruangan->siswa_id,
                    'jadwal_id' => $data_jadwal->id,
                    'tipe_kehadiran' => $request->tipe_kehadiran,
                    'tanggal' => $tanggal_ini,
                    'pertemuan' => 1,
                    'dibuat_oleh' => $data_jadwal->dibuat_oleh,
                    'semester' => $data_semester,
                    'kelas_id' => $data_jadwal->kelas_id,
                    'tahun_ajaran' => $data_tahun_ajaran
                ];

                $absens = Absen::create($create);
                return response()->json($absens);
            }

            if ($absen > 0) {
                $absen = Absen::where('semester', $request->semester)->where('tahun_ajaran', $request->tahun_ajaran)->where('siswa_id', $request->siswa_id)->where('jadwal_id', $request->jadwal_id)->count();
                $create = [
                    'siswa_id' => $data_jadwal->siswa_id,
                    'jadwal_id' => $data_jadwal->id,
                    'tipe_kehadiran' => $request->tipe_kehadiran,
                    'tanggal' => $tanggal_ini,
                    'pertemuan' => $absen + 1,
                    'dibuat_oleh' => $data_jadwal->dibuat_oleh,
                    'semester' => $data_semester,
                    'kelas_id' => $data_jadwal->kelas_id,
                    'tahun_ajaran' => $data_tahun_ajaran
                ];

                $absens = Absen::create($create);
                return response()->json($absens);
            }
            return response()->json([
                'message' => 'Berhasil Absen'
            ]);
        }

        if ($absen_tanggal != null) {
            if ($absen_tanggal->tanggal == $tanggal_ini) {
                return response()->json([
                    'message' => 'Siswa Sudah Absen',
                ], 404);
            }
        }
    }
}
