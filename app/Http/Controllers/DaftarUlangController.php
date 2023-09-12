<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Seleksi;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\Tahun_ajaran;
use App\Models\User;
use App\Models\Wali_Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class DaftarUlangController extends Controller
{
    public function daftarulang()
    {
        //menampilkan data pendaftaran yang belum dftr ulang
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlaku
        $tahun_ajaran = Tahun_ajaran::where('id', $tahun)->first()->tahun_ajaran; //mengambil data tahun ajaran berdasarkan tahun ajaran yang berlaku
        $pendaftaran = Pendaftaran::where('bukti_bayar', '!=', null)->where('status', '!=', 'off')->where('jenis', 'siswapindahan')->get(); //mengambil data pendaftaran berdasarkan bukti bayar idak null , status selain off, jenis = siswapindahan
        return view('siswapindahan.daftarulang.table', compact('pendaftaran', 'tahun_ajaran'));
    }

    public function konfirmasiditerimadaftarulang($idpendaftaran)
    {
        //konfirmasi dftr ulang
        $pendaftaran = Pendaftaran::where('id', $idpendaftaran)->first(); //mengambil data pendaftaran berdasarkan id
        return view('siswapindahan.daftarulang.detail', compact('pendaftaran'));
    }

    public function konfirmasiditerimapost(Request $request)
    {
        //konfirmasi dftr ulang
        $pendaftaran = Pendaftaran::where('id', $request->id)->first(); //mengambil data pendaftaran berdasarkan id
        $user = [
            'name' => $pendaftaran->nama_bapak,
            'username' => $pendaftaran->nama_bapak,
            'email' => $pendaftaran->email_bapak,
            'role' => 4,
            'password' => Hash::make('password'),
        ];
        $id_user_org = User::create($user); //create dta user
        $org = [
            'id_user' => $id_user_org->id,
            'nama_bapak' => $pendaftaran->nama_bapak,
            'nama_ibu' => $pendaftaran->nama_ibu,
            'pekerjaan_bapak' => $pendaftaran->pekerjaan_bapak,
            'pekerjaan_ibu' => $pendaftaran->pekerjaan_ibu,
            'penghasilan_bapak' => $pendaftaran->penghasilan_bapak,
            'penghasilan_ibu' => $pendaftaran->penghasilan_ibu,
            'agama_bapak' => $pendaftaran->agama_bapak,
            'agama_ibu' => $pendaftaran->agama_ibu,
            'no_telp_bapak' => $pendaftaran->no_telp_bapak,
            'no_telp_ibu' => $pendaftaran->no_telp_ibu,
            'email_bapak' => $pendaftaran->email_bapak,
            'email_ibu' => $pendaftaran->email_ibu,
        ];
        $wali = Wali_Siswa::create($org); //create data wali siswa

        $user = [
            'name' => $pendaftaran->nama_siswa,
            'username' => $pendaftaran->nama_siswa,
            'email' => $pendaftaran->email,
            'role' => 5,
            'password' => Hash::make('password'),
        ];

        $id_user_siswa = User::create($user); // create data user wali kelas

        $create = [
            'id_orang_tua' => $wali->id,
            'kelas' => null,
            'id_user' => $id_user_siswa->id,
            'nomor_induk_siswa' => $pendaftaran->nomor_induk_siswa,
            'nisn' => $pendaftaran->nisn,
            'nama_siswa' => $pendaftaran->nama_siswa,
            'tempat_lahir' => $pendaftaran->tempat_lahir,
            'tgl_lahir' => $pendaftaran->tgl_lahir,
            'jenis_kelamin' => $pendaftaran->jenis_kelamin,
            'agama' => $pendaftaran->agama,
            'telp' => $pendaftaran->no_telp,
            'email' => $pendaftaran->email,
            'asal_sekolah' => $pendaftaran->asal_sekolah,
            'alamat' => $pendaftaran->alamat,
            'tingkat' => $pendaftaran->tingkat,
            'jurusan' => $pendaftaran->jurusan,
            'jenjang_pendidikan_id' => $pendaftaran->jenjang,
        ];

        $infosiswa = Siswa::create($create); //create data siswa
        $pendaftaran->update([
            'status' => 'off'
        ]); //update data pendaftaran menjadi status off yang artinya pendaftaran sudah selesai

        // $message = view('api.email.resetpassword', compact('siswa'))->render();


        //send mail
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'mail.dapurkoding.my.id';
            $mail->SMTPAuth = true;
            $mail->Username = 'dapurkod@dapurkoding.my.id';
            $mail->Password = 'Anandadimmas,123';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom("dapurkod@dapurkoding.my.id", "Pengumuman");
            $mail->addAddress($infosiswa->email);
            $mail->isHTML(true);
            $mail->Subject = 'Surat Pemberitahuan';
            $mail->Body    = "Daftar ulang berhasil ini Email = ' . $infosiswa->email . ' , password = password  akun anda";
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

        return redirect()->route('daftarulang');
    }

    public function daftarulangsiswabaru()
    {
        //menampilkan data siswa yang belum dftr ulang
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahuun ajaran yang berlangsung
        $tahun_ajaran = Tahun_ajaran::where('id', $tahun)->first()->tahun_ajaran; //mengambil data tahun ajaran berdasarkan tahun ajaran yang berlaku
        $seleksi = Seleksi::where('diterima', 'diterima')->whereHas('pendaftaran', function ($q) use ($tahun) {
            $q->where('daftar_ulang', null); //relasi berdasarkan daftar ulang = null
        })->get(); //mengambil data seleksi berdasarkan diterima = diterima
        return view('siswapindahan.daftarulang.tablesiswabaru', compact('seleksi', 'tahun_ajaran'));
    }


    public function daftarulangsiswabarukonfirmasi($idseleksi)
    {
        //detail data seleksi
        $seleksi = Seleksi::where('id', $idseleksi)->first(); //mengambil data seleksi berdasarkan id
        return view('siswapindahan.daftarulang.detailsiswabaru', compact('seleksi'));
    }

    public function daftarulangsiswabarukonfirmasisiswabaru(Request $request)
    {
        //konfirmasi daftar ulang
        $seleksi = Seleksi::where('id', $request->id)->first(); //mengambil data seleksi berdasarkan id
        $pendaftaran = Pendaftaran::where('id', $seleksi->pendaftaran_id)->update(['daftar_ulang' => 'ya']); //update data pendaftaran
        $user = [
            'name' => $request->nama_bapak,
            'username' => $request->nama_bapak,
            'email' => $request->email_bapak,
            'role' => 4,
            'password' => Hash::make('password'),
        ];
        $id_user_org = User::create($user); //create data user wali kelas
        $org = [
            'id_user' => $id_user_org->id,
            'nama_bapak' => $request->nama_bapak,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_bapak' => $request->pekerjaan_bapak,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_bapak' => $request->penghasilan_bapak,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'agama_bapak' => $request->agama_bapak,
            'agama_ibu' => $request->agama_ibu,
            'no_telp_bapak' => $request->no_telp_bapak,
            'no_telp_ibu' => $request->no_telp_ibu,
            'email_bapak' => $request->email_bapak,
            'email_ibu' => $request->email_ibu,
        ];
        $wali = Wali_Siswa::create($org); //create data wali kelas

        $user = [
            'name' => $request->nama_siswa,
            'username' => $request->nama_siswa,
            'email' => $request->email,
            'role' => 5,
            'password' => Hash::make('password'),
        ];

        $id_user_siswa = User::create($user); //create data user siswa

        $create = [
            'id_orang_tua' => $wali->id,
            'kelas' => null,
            'id_user' => $id_user_siswa->id,
            'nomor_induk_siswa' => $request->nomor_induk_siswa,
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'telp' => $request->telp,
            'email' => $request->email,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat' => $request->alamat,
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
            'jenjang_pendidikan_id' => $request->jenjang_pendidikan_id
        ];
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'mail.dapurkoding.my.id';
            $mail->SMTPAuth = true;
            $mail->Username = 'dapurkod@dapurkoding.my.id';
            $mail->Password = 'Anandadimmas,123';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom("dapurkod@dapurkoding.my.id", "Pengumuman");
            $mail->addAddress($seleksi->email);
            $mail->isHTML(true);
            $mail->Subject = 'Surat Pemberitahuan';
            $mail->Body    = "Daftar ulang berhasil ini Email = ' . $seleksi->email . ' , password = password  akun anda";
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        Siswa::create($create); //create data siswa
        return redirect()->route('daftarulangsiswabaru');
        // return view('siswa.index');
    }
}
