<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pendaftaran;
use App\Models\PendaftaranSeleksi;
use App\Models\Seleksi;
use App\Models\Setting;
use App\Models\Tahun_ajaran;
use Carbon\Carbon;
use App\Models\TanggalSeleksi;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AbsensiSeleksiController extends Controller
{
    public function selectjenjang(Request $request)
    {
        //memilih jenjang
        $tahun = Setting::first()->id_tahun_ajaran; // mengambil data tahun ajaran yang berlangsung
        return view('seleksi.absenseleksi.jenjang');
    }
    
    public function selectjenjangtingkatan($jenjang, $tanggalseleksiid)
    {
        $pendaftaran = Pendaftaran::where('jenjang', $jenjang)->where('tanggal_seleksi_id', $tanggalseleksiid)->where('status', 'paid')->where('jenis', 'siswabaru')->get();
        return view('seleksi.absenseleksi.absen', compact('pendaftaran', 'jenjang', 'tanggalseleksiid'));
    }

    // public function selectjenjangtingkatan(Request $request)
    // {
    //     //memilih tngkatan
    //     $jenjang = $request->jenjang_pendidikan_id; //mengambil request jenjang_pendidikan_id dari form input
    //     $pendaftaran = Pendaftaran::where('jenjang', $jenjang)->where('status', 'paid')->where('jenis', 'siswabaru')->get(); // mengambil data pendaftaran berdasarkan jenang, status = paid, jenis = siswabaru
    //     return view('seleksi.absenseleksi.absen', compact('pendaftaran'));
    // }

    public function selectjenjangkonfirmasibuktibayar(Request $request)
    {
        return view('seleksi.absenseleksi.buktibayarjenjang');
    }

    public function selectjenjangkonfirmasibuktibayartingkatan(Request $request)
    {
        //konfirmasi bukti bayar pencarian berdasarkan nomor pendaftaran
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data berdasarkan tahun ajaran yang berlangsung
        $nomor_pendaftaran = $request->nomor_pendaftaran; //mengambil request nomor_pendaftaran dr form input
        if ($nomor_pendaftaran) { // kondisi jika request nomor_pendaftaran ada
            $pendaftaran = Pendaftaran::where('nomor_pendaftaran', $nomor_pendaftaran)->where('jenis', 'siswabaru')->get(); //mengambil data pendaftaran berdasarkan nomor pendaftaran dan berdasarkan jenis = siswabaru
            if ($pendaftaran != null) { // kondisi jika data ada
            } else { // kondisi jika data tidak ada
                return back()->with('nomor_pendaftaran', 'dss');
            }
        } else { // kondisi jika request nomor_pendaftaran tidak ada
            $jenjang = $request->jenjang_pendidikan_id; //mengambil request jenjang pendidikan id
            $pendaftaran = Pendaftaran::where('jenjang', $jenjang)->where('tahun_ajaran_id', $tahun)->where('status', null)->where('jenis', 'siswabaru')->get(); //mengambil data pendaftaran berdasarkan jenjang dan tahun ajaran yg berlangsung
        }
        return view('seleksi.absenseleksi.buktibayar', compact('pendaftaran'));
    }

    public function buktibayaredit(Request $request)
    {
        //edit ajax bukti bayar
        $id = $request->id; //mengambil data request id
        $pendaftaran = Pendaftaran::where('id', $id)->first(); // mengambil data pendaftaran berdasarkan id
        return response()->json($pendaftaran);
    }

    // public function ubahstatuskonfirmasi($id)
    // {
    //     //ubah status konfirmasi
    //     $tahun = Setting::first()->id_tahun_ajaran; // mengambil data tahun ajaran yang berlangsung
    //     $pendaftaran = Pendaftaran::where('id', $id)->first(); // mengambil data pendaftaran berdasarkan id
    //     $pendaftaran->update(['status' => 'paid']); // update data pendaftaran status menjadi update
    //     $tanggalseleksi = TanggalSeleksi::where('status', 'aktif')->where('tahun_ajaran_id', $tahun)->first(); // mengambil data tanggl seleksi berdasarkan tahun ajaran yg berlangsung dan staus  aktif
    //     $message = view('api.email.tanggalseleksi', compact('tanggalseleksi'))->render(); // email template
    //     try { //send email
    //         $mail = new PHPMailer(true);
    //         $mail->isSMTP();
    //         $mail->Host = 'mail.dapurkoding.my.id';
    //         $mail->SMTPAuth = true;
    //         $mail->Username = 'dapurkod@dapurkoding.my.id';
    //         $mail->Password = 'Anandadimmas,123';
    //         $mail->SMTPSecure = 'tls';
    //         $mail->Port = 587;
    //         $mail->setFrom("dapurkod@dapurkoding.my.id", "Tanggal seleksi");
    //         $mail->addAddress($pendaftaran->email);
    //         $mail->isHTML(true);
    //         $mail->Subject = 'Surat Pemberitahuan';
    //         $mail->Body    = $message;
    //         $mail->send();
    //     } catch (Exception $e) {
    //         echo 'Message could not be sent.';
    //         echo 'Mailer Error: ' . $mail->ErrorInfo;
    //     }
    //     return back();
    // }
    
     public function ubahstatuskonfirmasi($id)
    {
        $tahun = Setting::first()->id_tahun_ajaran;
        $pendaftaran = Pendaftaran::where('id', $id)->first();
        $hitungkuota = Pendaftaran::where('jenjang', $pendaftaran->jenjang)->count();

        $tanggalseleksi = TanggalSeleksi::where('status', 'aktif')->where('tahun_ajaran_id', $tahun)->orderBy('gelombang', 'ASC')->get();
        $datatanggal = [];
        $hitung = [];
        foreach ($tanggalseleksi as $tanggal) {
            array_push($hitung, $tanggal->kuota);
            $kuotasisa = array_sum($hitung);
            if ($hitungkuota <= $kuotasisa) {
                // dd('masuk');
                array_push($datatanggal, $tanggal->tanggalmulai);
                // dd($kuotasisa);
            }
        }
        if (isset($datatanggal[0])) {
            $tanggalseleksites = TanggalSeleksi::where('status', 'aktif')->where('tanggalmulai', $datatanggal[0])->where('tahun_ajaran_id', $tahun)->first();
            $pendaftaran->update(['status' => 'paid', 'tanggal_seleksi_id' => $tanggalseleksites->id]);
            $message = view('api.email.tanggalseleksi', compact('datatanggal'))->render();
        } else {
            return back()->with('kuotaseleksifull', 'ds');
        }
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'mail.dapurkoding.my.id';
            $mail->SMTPAuth = true;
            $mail->Username = 'dapurkod@dapurkoding.my.id';
            $mail->Password = 'Anandadimmas,123';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom("dapurkod@dapurkoding.my.id", "Tanggal seleksi");
            $mail->addAddress($pendaftaran->email);
            $mail->isHTML(true);
            $mail->Subject = 'Surat Pemberitahuan';
            $mail->Body    = $message;
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

        return back();
    }
    public function selectjenjangtingkatanabsen(Request $request)
    {
        //absen seleksi
        $tahun = Setting::first()->id_tahun_ajaran; // megambil data tahun ajaran yang berlangsung
        $tanggalseleksi = TanggalSeleksi::where('tahun_ajaran_id', $tahun)->where('status', 'aktif')->first(); // mengambil data tanggal seleksi berdasarkan tahun ajaran yang berlangsung dan status yang aktif
        $idpendaftaran = []; // array kumpulan data request siswa id
        foreach ($request['siswa_id'] as $sis) {
            array_push($idpendaftaran, $sis); // mengumpulkan semua data dr request siswa id
        }
        foreach ($request['group'] as $p => $group) { // foreach request group dr form input
            $pendaftaran = Pendaftaran::where('id', $idpendaftaran[$p])->first(); // mengambil data pendaftaran berdasarkan id
            $updatependaftaran = ['status' => 'off']; 
            $pendaftaran->update($updatependaftaran); // update data pendaftaran status menjadi off yang artinya data pendaftarannya sudah tidak aktif/final
            $cek = Seleksi::where('pendaftaran_id', $pendaftaran->id)->first(); // menggambil data seleksi berdasarkan pendaftaran id 
            if ($cek === null) { // kondisi jika data ada
                $seleksi = Seleksi::create([ // membuat data
                    'pendaftaran_id' => $pendaftaran->id,
                    'jurusan' => $pendaftaran->jurusan,
                    'jenjang' => $pendaftaran->jenjang,
                    'email' => $pendaftaran->email,
                    'nama_siswa' => $pendaftaran->nama_siswa,
                    'tempat_lahir' => $pendaftaran->tempat_lahir,
                    'tgl_lahir' => $pendaftaran->tgl_lahir,
                    'jenis_kelamin' => $pendaftaran->jenis_kelamin,
                    'alamat' => $pendaftaran->alamat,
                    'agama' => $pendaftaran->agama,
                    'asal_sekolah' => $pendaftaran->asal_sekolah,
                    'no_telp' => $pendaftaran->no_telp,
                    'tingkat' => $pendaftaran->tingkat,
                    'status' => $group,
                    'tanggalseleksi' => $tanggalseleksi->tanggalmulai,
                ]);
                // PendaftaranSeleksi::create([
                //     'seleksi_id' => $seleksi->id,
                //     'tanggalseleksi_id' => $tanggalseleksi->id,
                //     'nilai' => null,
                // ]);
            }
        }
        return back();
    }
        public function selectjenjangtingkatanabsensearch(Request $request, $id)
    {
        $tanggalhariini = Carbon::now()->Format('Y-m-d');
        $tahun = Setting::first()->id_tahun_ajaran;
        // $tanggalseleksi = TanggalSeleksi::where('tahun_ajaran_id', $tahun)->where('status', 'aktif')->first();
        $pendaftaran = Pendaftaran::where('id', $id)->first();
        $updatependaftaran = ['status' => 'off'];
        $pendaftaran->update($updatependaftaran);
        $cek = Seleksi::where('pendaftaran_id', $pendaftaran->id)->first();
        if ($cek === null) {
            $seleksi = Seleksi::create([
                'pendaftaran_id' => $pendaftaran->id,
                'jurusan' => $pendaftaran->jurusan,
                'jenjang' => $pendaftaran->jenjang,
                'email' => $pendaftaran->email,
                'nama_siswa' => $pendaftaran->nama_siswa,
                'tempat_lahir' => $pendaftaran->tempat_lahir,
                'tgl_lahir' => $pendaftaran->tgl_lahir,
                'jenis_kelamin' => $pendaftaran->jenis_kelamin,
                'alamat' => $pendaftaran->alamat,
                'agama' => $pendaftaran->agama,
                'asal_sekolah' => $pendaftaran->asal_sekolah,
                'no_telp' => $pendaftaran->no_telp,
                'tingkat' => $pendaftaran->tingkat,
                'status' => 'hadir',
                'tanggalseleksi' => $pendaftaran->tanggal_seleksi_id,
            ]);
        }
        return back();
    }
}
