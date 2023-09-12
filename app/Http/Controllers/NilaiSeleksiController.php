<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pendaftaran;
use App\Models\PendaftaranSeleksi;
use App\Models\Seleksi;
use App\Models\Setting;
use App\Models\TanggalSeleksi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Models\Tahun_ajaran;

set_time_limit(1000000000000000000);

class NilaiSeleksiController extends Controller
{

    public function NilaiSeleksiView($tanggalseleksi)
    {
        return view('seleksi.nilai.view', compact('tanggalseleksi'));
    }

    public function pemberiannilaiabsen(Request $request)
    {
        $jenjang = (int)$request->jenjang_pendidikan_id;
        $tahun = Setting::first()->id_tahun_ajaran;
        $tahunberlangsung = Tahun_ajaran::where('id', $tahun)->first()->tahun_ajaran;
        $tahunajaranget = Tahun_ajaran::get();
        if ($request->tahunajaran) {
            $tanggalseleksi = TanggalSeleksi::where('tahun_ajaran_id', $request->tahunajaran)->where('jenjang', $jenjang)->get();
        } else {
            $tanggalseleksi = TanggalSeleksi::where('tahun_ajaran_id', $tahun)->where('jenjang', $jenjang)->get();
        }
        if (isset($request->tahunajaran)) {
            $tahunajaran = $request->tahunajaran;
            $tahunpilihan = Tahun_ajaran::where('id', $tahunajaran)->first()->tahun_ajaran;
            return view('seleksi.nilai.absen', compact('tanggalseleksi', 'tahunajaranget', 'tahunajaran', 'jenjang', 'tahunpilihan'));
        } else {
            return view('seleksi.nilai.absen', compact('tanggalseleksi', 'tahunajaranget', 'tahunberlangsung',  'jenjang'));
        }
    }

    public function NilaiSeleksiViewajax($tanggalseleksi)
    {
        $emps = Seleksi::with('pendaftaran')->whereHas('pendaftaran', function ($q) use ($tanggalseleksi) {
            $q->where('status', 'off');
        })->where('tanggalseleksi', $tanggalseleksi)->orderBy('nilai', 'desc')->get();

        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Nomor Pendaftaran</th>
                <th>Nilai</th>
                <th>Hasil</th>
                <th>Diterima</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->nama_siswa . '</td>
                <td>' . $emp->pendaftaran->nomor_pendaftaran . '</td>';
                $output .= '<input type="hidden" name="nomor_pendaftaran[]" value="' . $emp->pendaftaran->nomor_pendaftaran . '">';
                if ($emp->nilai === null) {
                    $output .= '<td><input type="number" placeholder="Masukan Nilai" required name="nilai[]" class="form-control"></td>';
                } else {
                    $output .= '<td>' . $emp->nilai . '</td>';
                }
                if ($emp->hasil === null) {
                    $output .= '<td>Belum ada hasil</td>';
                } else {
                    $output .= '<td>' . $emp->hasil . '</td>';
                }
                if ($emp->diterima === null) {
                    $output .= '<td>Belum ada hasil</td>';
                } else {
                    $output .= '<td>' . $emp->diterima . '</td>';
                }
                $output .= '</tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    public function pemberiannilaitanggalseleksi(Request $request)
    {
        $jenjang = (int)$request->jenjang_pendidikan_id;
        $tahun = Setting::first()->id_tahun_ajaran;
        $tahunberlangsung = Tahun_ajaran::where('id', $tahun)->first()->tahun_ajaran;
        $tahunajaranget = Tahun_ajaran::get();
        if ($request->tahunajaran) {
            $tanggalseleksi = TanggalSeleksi::where('tahun_ajaran_id', $request->tahunajaran)->where('jenjang', $jenjang)->get();
        } else {
            $tanggalseleksi = TanggalSeleksi::where('tahun_ajaran_id', $tahun)->where('jenjang', $jenjang)->get();
        }
        if (isset($request->tahunajaran)) {
            $tahunajaran = $request->tahunajaran;
            $tahunpilihan = Tahun_ajaran::where('id', $tahunajaran)->first()->tahun_ajaran;
            return view('seleksi.nilai.nilai', compact('tanggalseleksi', 'tahunajaranget', 'tahunajaran', 'jenjang', 'tahunpilihan'));
        } else {

            return view('seleksi.nilai.nilai', compact('tanggalseleksi', 'tahunajaranget', 'tahunberlangsung', 'jenjang'));
        }
    }

    public function postpenilaianseleksi(Request $request)
    {
        // dd($request->all());
        $tahun = Setting::first()->id_tahun_ajaran;
        $DataSeleksi = [];
        if (isset($request['nomor_pendaftaran'])) {
            foreach ($request['nomor_pendaftaran'] as $index => $nomorpen) {
                $seleksi = Seleksi::with('pendaftaran')->whereHas('pendaftaran', function ($q) use ($nomorpen) {
                    $q->where('nomor_pendaftaran', $nomorpen);
                })->first();
                $seleksi->update(['nilai' => $request['nilai'][$index]]);
                array_push($DataSeleksi, $seleksi);
            }
        }
        $datajadi = collect($DataSeleksi)->sortByDesc('nilai')->take(count($DataSeleksi));
        $jenjang = $seleksi->jenjang;
        $kelas = Kelas::with('kelas')->where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjang) {
            $q->where('jenjang_pendidikan_id', $jenjang);
        })->get();
        $hitungmax = [];
        $hitungsiswa = [];
        $totsiswa = array_sum($hitungsiswa);
        foreach ($kelas as $hitungkuota) {
            $siswa = Siswa::where('kelas', $hitungkuota->id)->count();
            array_push($hitungsiswa, $siswa);
            array_push($hitungmax, $hitungkuota->max);
        }
        $tot = array_sum($hitungmax);
        foreach ($datajadi as $index => $data) {
            $datahasil = Seleksi::with('pendaftaran')->where('jenjang', $data->jenjang)->where('hasil', '!=', null)->count();
            $totalhasilakhir = $datahasil + array_sum($hitungsiswa);
            // dd($totalhasilakhir);
            if ((int)$tot > (int)$totalhasilakhir) {
                $data->update(['hasil' => 'lulus', 'diterima' => 'diterima']);
            } else {
                $data->update(['hasil' => 'tidaklulus', 'diterima' => 'cadangan']);
            }
        }

        // dd($datajadi);
        return back();
    }

    public function selectjenjang(Request $request)
    {

        return view('seleksi.nilai.jenjang');
    }

    public function pemberiannilai(Request $request)
    {
        //pemberian nilai view
        $jenjang = (int)$request->jenjang_pendidikan_id;
        if ($jenjang === 4) {
            $tingkatan = 14;
        } elseif ($jenjang === 1) {
            $tingkatan = 1;
        } elseif ($jenjang === 2) {
            $tingkatan = 7;
        } elseif ($jenjang === 3) {
            $tingkatan = 10;
        }

        $berjurusan = $request->berjurusan;
        if ($request->berjurusan) { //jika ada data request berjurusan
            $kelasselect = Kelas::where('tingkatan_id', $tingkatan)->select('jurusan')->groupBy('jurusan')->get(); //mengambil dta kelas berdasarkan tingkatan
            $kuota = [];
            $jurusan = []; //kumpulan data kuota kelas
            foreach ($kelasselect as $kel) {
                $row['jurusan'] = $kel->jurusan;
                $kelas = (int)Kelas::where('tingkatan_id', $tingkatan)->where('jurusan', $kel->jurusan)->sum('max'); //mengambil total jumlah kuota kelas berdasarkan tingkatan  dan jurusan
                $row['kuota'] = $kelas;
                array_push($jurusan, $row);
            }
            $seleksi = Seleksi::where('jenjang', $jenjang)->orderBy('nilai', 'DESC')->get();
            // dd($seleksi);
            if (isset($jurusan[0]['kuota'])) {
                $totalkuota = $jurusan[0]['kuota'];
            }
            return view('seleksi.nilai.nilai', compact('seleksi', 'jurusan', 'berjurusan', 'jenjang',  'tingkatan'));
        } else {
            $kelasselect = Kelas::where('tingkatan_id', $tingkatan)->select('jurusan')->groupBy('jurusan')->get(); //mengambil dta kelas berdasarkan tingkatan
            $kuota = [];
            $jurusan = []; //kumpulan data kuota kelas
            foreach ($kelasselect as $kel) {
                $kelas = (int)Kelas::where('tingkatan_id', $tingkatan)->where('jurusan', $kel->jurusan)->sum('max'); //mengambil total jumlah kuota kelas berdasarkan tingkatan  dan jurusan
                $row['kuota'] = $kelas;
                array_push($jurusan, $kelas);
            }

            $seleksi = Seleksi::where('jenjang', $jenjang)->orderBy('nilai', 'DESC')->get();
            return view('seleksi.nilai.nilai', compact('seleksi', 'jurusan', 'berjurusan', 'jenjang',  'tingkatan'));
        }
    }


    public function pemberiannilaipost(Request $request)
    {
        //pemberian nilai post
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berjalan
        $tanggalseleksi = TanggalSeleksi::where('tahun_ajaran_id', $tahun)->where('status', 'aktif')->first(); //mengambil data tanggal seleksi berdasarkan tahun ajaran yang berlaku dan status yang aktif
        $jenjang = (int)$request->jenang_pendidikan_id;
        if ($jenjang === 4) {
            $tingkatan = 14;
        } elseif ($jenjang === 1) {
            $tingkatan = 1;
        } elseif ($jenjang === 2) {
            $tingkatan = 7;
        } elseif ($jenjang === 3) {
            $tingkatan = 10;
        }

        $kelas = Kelas::where('tingkatan_id', $tingkatan)->get(); //mengambil daata kelas berdasarkan tingkatan
        $kuota = []; //kumpulan data kuota
        foreach ($kelas as $kel) {
            array_push($kuota, $kel->max); // push data
        }
        $totalkuota = array_sum($kuota);

        $tampungid = [];
        foreach ($request['id'] as $p) {
            array_push($tampungid, $p);
        }
        $hitung_peringkat = [];
        $tampungseleksi = [];
        foreach ($request['nilai'] as $p => $nil) {
            if ($nil > 80) {
                $hasil = 'lulus';
            }
            if ($nil === 80) {
                $hasil = 'lulus';
            }
            if ($nil <= 80) {
                $hasil = 'tidak lulus';
            }
            Seleksi::where('id', $tampungid[$p])->update([
                'hasil' => $hasil,
                'nilai' => $nil
            ]); // update data


            // PendaftaranSeleksi::where('seleksi_id', $tampungid[$p])->update([
            //     'seleksi_id' => $tampungid[$p],
            //     'tanggalseleksi_id' => $tanggalseleksi->id,
            //     'nilai' => $nil
            // ]);
            $seleksi = Seleksi::where('id', $tampungid[$p])->first();
            array_push($tampungseleksi, $seleksi); //push data seleksi
        }
        $tes = collect($tampungseleksi)->sortByDesc('nilai')->take($totalkuota); //ambil data sesuai $totalkuota
        $pering = []; //kumpullan data peringkat
        for ($i = 0; $i < count($request['nilai']); $i++) {
            $riw['peringkat'] = $i + 1;
            array_push($pering, $riw);
        }
        foreach ($tes as $p => $tam) {
            $row['nama_siswa'] = $tam->nama_siswa;
            $row['email'] = $tam->email;
            $row['nilai'] = $tam->nilai;
            $row['hasil'] = $tam->hasil;
            array_push($hitung_peringkat, $row);
        }
        $hasilakhir = []; //kumpulan data raw
        foreach ($hitung_peringkat as $index => $per) {
            $raw['nama_siswa'] = $per['nama_siswa'];
            $raw['email'] = $per['email'];
            $raw['nilai'] = $per['nilai'];
            $raw['hasil'] = $per['hasil'];
            $raw['peringkat'] = $pering[$index]['peringkat'];
            array_push($hasilakhir, $raw);
        }
        if (isset($request['lulus'])) { //kondisi jika data request lulus ada
            foreach ($request['lulus'] as $inde => $lulus) {
                $data = $hasilakhir[$inde];
                $seleksi = Seleksi::where('id', $lulus)->first();
                $cekcik = Pendaftaran::where('id', $seleksi->pendaftaran_id)->first(); //mengambil data pendaftaran berdasarkan id
                $cekcik->update(['hasil' => 'lulus']); //update pendaftaran hasil menjadi lulus
                $seleksi->update([
                    'diterima' => 'diterima'
                ]); //update data seleksi kolom diterma menjadi diterima

                // send email
                $message = view('api.email.hasilseleksi', compact('data', 'seleksi'))->render();
                try {
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host = 'mail.dapurkoding.my.id';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'dapurkod@dapurkoding.my.id';
                    $mail->Password = 'Anandadimmas,123';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
                    $mail->setFrom("dapurkod@dapurkoding.my.id", "Pengumuman Ranking Seleksi");
                    $mail->addAddress($seleksi->email);
                    $mail->isHTML(true);
                    $mail->Subject = 'Surat Pemberitahuan Hasil Seleksi';
                    $mail->Body    = $message;
                    $mail->send();
                } catch (Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
        }
        if (isset($request['tidaklulus'])) {
            foreach ($request['tidaklulus'] as $inde => $tidaklulus) {
                $seleksi = Seleksi::where('id', $tidaklulus)->first(); //mengambil data seleksi berdasarkan id
                $cekcik->update(['hasil' => 'lulus']); //update hasil menjadi lulus
                $seleksi->update([
                    'diterima' => 'cadangan'
                ]);  //update data seleksi kolom diterma menjadi cadangan
                $message = view('api.email.hasilseleksitidaklulus', compact('seleksi'))->render(); //email html
                try {
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host = 'mail.dapurkoding.my.id';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'dapurkod@dapurkoding.my.id';
                    $mail->Password = 'Anandadimmas,123';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
                    $mail->setFrom("dapurkod@dapurkoding.my.id", "Pengumuman Ranking Seleksi");
                    $mail->addAddress($seleksi->email);
                    $mail->isHTML(true);
                    $mail->Subject = 'Surat Pemberitahuan Hasil Seleksi';
                    $mail->Body    = $message;
                    $mail->send();
                } catch (Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
        }
        return back();
    }
}
