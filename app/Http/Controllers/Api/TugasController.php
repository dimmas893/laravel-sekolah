<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\Siswa;
use App\Models\Kumpul_Tugas;
use App\Models\Rincian_Siswa;
use App\Models\Gambar_Kegiatan;
use App\Models\Tugas;
use App\Models\Guru;
use Carbon\Carbon;
use App\Models\Kegiatan;
use App\Models\Kelas;
use DateTime;
use Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Setting;

class TugasController extends Controller
{
    public function daftar_tugas(Request $request)
    {
        //masih perlu perbaikan
        $siswa = Siswa::where('id_user', $request->id_user)->first();
        $Kumpul_tugas = Kumpul_Tugas::where('siswa_id', $siswa->id)->get();
        $tagihan = [];
        foreach ($Kumpul_tugas as $pe) {
            $tugas = Tugas::where('id', $pe->tugas_id)->first();
            $jadwal = Jadwal::with('mata_pelajaran')->where('mata_pelajaran_id', $tugas->mata_pelajaran_id)->where('kelas_id', $tugas->kelas_id)->first();
            $row['id'] = (int) $pe['id'];
            $row['mapel'] = $jadwal['mata_pelajaran']['name'];
            $row['nama'] = $tugas['nama'];
            $row['deskripsi'] = $tugas['deskripsi'];
            $row['tgl_tugas'] = $tugas['tanggal_tugas'];
            $row['tenggat_waktu'] = $tugas['tanggal_pengumpulan'];
            $row['read'] = 0;
            if ($pe->file_upload != null) {
                $status = 1;
            } else {
                $status = 0;
            }
            $row['status'] = (int) $status;
            array_push($tagihan, $row);
        }
        return response()->json([
            'data' => $tagihan
        ]);
    }

    public function uploudfile(Request $request)
    {
        //upload tugas siswa
        $file_path = 'https://dapurkoding.my.id/';
        $siswa = Siswa::where('id_user', $request->id_user)->first(); //mengambil data siswa berdasarkan id user
        $emp = Kumpul_Tugas::where('id', $request->id_tugas)->where('siswa_id', $siswa->id)->first(); //mengambil data kupul tugas berdasarkan id dan siswa id

        //proses upload file
        $lampiranFulltextFile = null;
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/file_tugas';

            $this->lampiranFulltextFile = 'file_tugas-' . $siswa->id  . Str::random(10) . '.' . $file_extension;
            $request->file('file_upload')->move($lokasiFile, $this->lampiranFulltextFile);
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        } else {
            $this->lampiranFulltextFile = $emp->file_upload;
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        }
        //end proses upload file
        $empData = [
            'file_upload' => $lampiranFulltextFile,
            'kesempatan' => $emp->kesempatan - 1
        ];
        $emp->update($empData);
        return response()->json(['berhasil'], 200);
    }

    public function store_biasa(Request $request)
    {
        //tidak dipakai
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

        $empData = [
            'jadwal_id' => $request->jadwal_id,
            'nama' => $request->nama,
            'tanggal_tugas' => $request->tanggal_tugas,
            'tanggal_pengumpulan' => $request->tanggal_pengumpulan,
            'tanggal_evaluasi' => $request->tanggal_evaluasi,
            'evaluasi_oleh' => 14,
            'deskripsi' => $request->deskripsi,
            'status_aktif' => 0,
            'dibuat_oleh' => 14,
            'file_tugas' => $file_tugas
        ];

        $tugas = Tugas::create($empData);
        $datajadwal = Jadwal::where('id', $tugas->jadwal_id)->first();
        $datasiswa = Kelas::where('id', $datajadwal->kelas_id)->first();
        $siswa = Siswa::where('kelas', $datasiswa->id)->get();
        foreach ($siswa as $p) {
            $kumpul_tugas = [
                'tugas_id' => $tugas->id,
                'siswa_id' => $p->id,
                'jadwal_id' => $tugas->jadwal_id,
                'tanggal_pengumpulan' => $tugas->tanggal_pengumpulan,
                'tanggal_evaluasi' => $tugas->tanggal_evaluasi
            ];
            $kumpul_tugass = Kumpul_Tugas::create($kumpul_tugas);
        }

        return response()->json(200);
    }

    public function detail_tugas(Request $request)
    {
        //detail tugas
        $file_path = 'https://dapurkoding.my.id/';
        $siswa = Siswa::where('id_user', $request->id_user)->first(); //mengambil data siswa berdasarkan yang login
        $Kumpul_tugas = Kumpul_Tugas::where('id', $request->id_tugas)->where('siswa_id', $siswa->id)->get(); //mengambil data tugas berdasarkan id user dan id

        foreach ($Kumpul_tugas as $p) {
            if ($p->file_upload === null) {
                $tugas = Tugas::where('id', $p->tugas_id)->first();
                $jadwal = Jadwal::with('mata_pelajaran')->where('mata_pelajaran_id', $tugas->mata_pelajaran_id)->where('kelas_id', $tugas->kelas_id)->first(); //mengambil data jadwal berdasarkan mata pelajaran dan berdasaarkan kelas id
                $row['id'] = (int)$p['tugas_id'];
                $row['mapel'] = $jadwal['mata_pelajaran']['name'];
                $row['nama'] = $tugas['nama'];
                $row['deskripsi'] = $tugas['deskripsi'];
                $row['tgl_tugas'] = $tugas['tanggal_tugas'];
                $row['tenggat_waktu'] = $tugas['tanggal_pengumpulan'];
                $row['status'] = 0;
                $row['kesempatan'] = $p['kesempatan'];

                $lampiran['id'] = (int) $tugas['id'];
                $lampiran['nama'] = $tugas['nama'];
                $lampiran['link'] = $file_path . 'file_tugas/' . $tugas['file_tugas'];
                return response()->json([
                    'detail_tugas' => $row,
                    'lampiran' => [$lampiran],
                    'pekerjaan' => []
                ]);
            }

            if ($p->file_upload != null) {
                $tugas = Tugas::where('id', $p->tugas_id)->first();
                $jadwal = Jadwal::with('mata_pelajaran')->where('mata_pelajaran_id', $tugas->mata_pelajaran_id)->where('kelas_id', $tugas->kelas_id)->first(); //mengambil data jadwal berdasarkan mata pelajaran dan berdasaarkan kelas id
                $row['id'] = (int) $p['tugas_id'];
                $row['mapel'] = $jadwal['mata_pelajaran']['name'];
                $row['nama'] = $tugas['nama'];
                $row['deskripsi'] = $tugas['deskripsi'];
                $row['tgl_tugas'] = $tugas['tanggal_tugas'];
                $row['tenggat_waktu'] = $tugas['tanggal_pengumpulan'];
                $row['status'] = (int) 1;
                $row['kesempatan'] = $p['kesempatan'];

                $lampiran['id'] = (int) $tugas['id'];
                $lampiran['nama'] = $tugas['nama'];
                $lampiran['link'] = $file_path . 'file_tugas/' . $tugas['file_tugas'];

                $pekerjaans['id'] = $p['id'];
                $pekerjaans['nama'] = $tugas['nama'];
                $pekerjaans['link'] = $file_path . 'file_tugas/' . $p['file_upload'];
                $pekerjaans['tgl'] = $tugas['tanggal_evaluasi'];

                return response()->json([
                    'detail_tugas' => $row,
                    'lampiran' => [$lampiran],
                    'pekerjaan' => [$pekerjaans]
                ]);
            }
        }
    }

    public function jadwal_pelajaran(Request $request)
    {
        //api jadwal pelajaran di hari ini
        $file_path = 'https://dapurkoding.my.id/';

        $tanggalhariini = Carbon::now()->Format('Y-m-d'); //tanggal hari ini
        $id_siswa = $request->id_user;
        $date = new DateTime($request->tgl);
        $tanggalni = $date->format('D'); //konvet hari
        $pekerjaan = [];
        $tugass = [];
        $hari = Hari::where('nama', $tanggalni)->first(); //mengambil data hari ini
        $dataSiswa = Siswa::where('id_user', $request->id_user)->first(); //mengambil data siswa berdasarkan id user
        $rincian_siswa = Jadwal::where('kelas_id', $dataSiswa->kelas)->get(); //mengambil data jadwal berdasarkan kelas
        $jadwallllllll = [];
        foreach ($rincian_siswa as $p) {
            $jadwal = Jadwal::with('mata_pelajaran')->where('hari_id', $hari->id)->where('id', $p->id)->first(); //mengambil data jadwal berdasarkan hari ini dan berdasarkan id
            if ($jadwal != null) {
                $tugas = Tugas::where('mata_pelajaran_id', $jadwal->mata_pelajaran_id)->where('tanggal_pengumpulan', '>', $tanggalhariini)->get(); //mengambil data tugas berdasarkan mata pelajaran dan tanggal pengumpulan lebih besar dr pada hari ini
                if (count($tugas) > 0) {
                    $jumlahTugas = count($tugas);
                } else {
                    $jumlahTugas = 0;
                }
                $pekerjaans['id'] = $jadwal['id'];
                $pekerjaans['nama'] = $jadwal['mata_pelajaran']['name'];
                $pekerjaans['jam'] = substr($jadwal['jam_masuk'], 0, 5) . ' - ' . substr($jadwal['jam_keluar'], 0, 5);
                $pekerjaans['tugas'] =  $jumlahTugas;
                $pekerjaans['quiz'] = 0;
                array_push($pekerjaan, $pekerjaans);
                array_push($tugass, $tugas);
                array_push($jadwallllllll, $jadwal['id']);
            }
        }

        return response()->json([
            'pelajaran' => $pekerjaan,
        ]);
    }

    public function jadwal(Request $request)
    {
        //api jadwal
        $setting = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlaku
        $file_path = 'https://dapurkoding.my.id/';
        $id_siswa = $request->id_user;
        $date = new DateTime($request->tgl);
        $tanggalni = $date->format('D'); //konvert hari
        $pekerjaan = [];
        $tugass = [];
        $hari = Hari::where('nama', $tanggalni)->first(); //mengambil data hari ini
        $hariID = $hari->id;
        $dataSiswa = Siswa::where('id_user', $request->id_user)->first(); //mengambil data siswa berdasarkan id user

        $dataGuru = Guru::where('id_user', $request->id_user)->first(); //mengmbil data guru berdasaarkan id user

        if ($dataSiswa) { // jika data siswa ada
            $dataKelas = $dataSiswa->kelas;
            $dataJadwal = Jadwal::where('kelas_id', $dataSiswa->kelas)->where('hari_id', $hariID)->get(); //mengambil data jadwall berdasarkan kelas dan hari ini
            $jadwallllllll = [];
            foreach ($dataJadwal as $p) {
                $tugas = Tugas::with('matapelajaran')->where('mata_pelajaran_id', $p->mata_pelajaran_id)->where('tahun_ajaran_id', $setting)->get(); //mengambil data tugas berdasarkan mata pelajaran dan tahun ajaran yang berlaku
                $pekerjaans['id'] = $p['id'];
                $pekerjaans['nama'] = $p['mata_pelajaran']['name'];
                $pekerjaans['jam'] = substr($p['jam_masuk'], 0, 5) . ' - ' . substr($p['jam_keluar'], 0, 5);
                $pekerjaans['tugas'] = count($tugas);
                $pekerjaans['quiz'] = 0;
                array_push($pekerjaan, $pekerjaans);
                array_push($tugass, $tugas);
                array_push($jadwallllllll, $p['id']);
            }

            $bacod = [];
            foreach ($tugass as $p) {
                foreach ($p as $pu) {
                    $jadwal_1 = Tugas::with('matapelajaran')->where('kelas_id', $dataSiswa->kelas)->first(); //mengambil data tugas berdasarkan kelas id
                    $row['id'] = $pu['id'];
                    $row['mapel'] = $jadwal_1['matapelajaran']['name'];
                    $row['nama'] = $pu['nama'];
                    $row['deskripsi'] = $pu['deskripsi'];
                    $row['tanggal_tugas'] = $pu['tanggal_tugas'];
                    $row['tenggat_waktu'] = $pu['tanggal_pengumpulan'];
                    $cek = Kumpul_Tugas::where('tugas_id', $pu->id)->where('siswa_id', $dataSiswa->id)->first();

                    if ($cek->file_upload != null) {
                        $row['status'] = 1;
                    } else {
                        $row['status'] = 0;
                    }
                    array_push($bacod, $row);
                }
            }
            $dataKegiatan = [];
            $rincian_kegiatan = Kegiatan::where('status', 1)->get(); //megambil data kegiatan berdasarkan status yang aktif
            if ($rincian_kegiatan) {
                foreach ($rincian_kegiatan as $ks) {
                    $gambar = Gambar_Kegiatan::where('kegiatan_id', $ks->id)->first();
                    $rowK['id'] = $ks->id;
                    $rowK['nama'] = $ks->nama_kegiatan;
                    $rowK['jam'] = $ks->jam_mulai . ' - ' . $ks->jam_berakhir;
                    $rowK['jenis'] = 1;
                    if ($gambar) {
                        $rowK['avatar'] = $file_path . 'kegiatan/' . $gambar->gambar;
                    } else {
                        $rowK['avatar'] = '';
                    }
                    array_push($dataKegiatan, $rowK);
                }
            }

            return response()->json([
                'pelajaran' => $pekerjaan,
                'tugas' => $bacod,
                'kegiatan' => $dataKegiatan
            ]);
        }
    }
}
