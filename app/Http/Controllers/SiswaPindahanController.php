<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pendaftaran;
use App\Models\Seleksi;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\Tahun_ajaran;
use App\Models\User;
use App\Models\Wali_Siswa;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Str;

class SiswaPindahanController extends Controller
{
    public function selectjenjang(Request $request)
    {
        //halaman memilih jenjang
        return view('siswapindahan.jenjang');
    }
    public function selectjenjangview(Request $request)
    {
        //menampilkan jenjang
        return view('siswapindahan.jenjangview');
    }

    public function siswapindahan(Request $request)
    {
        // form siswa pindahan
        return view('siswapindahan.index');
    }

    public function buktipembayaransiswaview($idpendaftaran)
    {
        //bukti bayar view
        $pendaftaran = Pendaftaran::where('id', $idpendaftaran)->first(); //mengambil data pendaftaran berdasarkan id
        return view('siswapindahan.buktibayar', compact('pendaftaran'));
    }

    public function buktipembayaransiswa(Request $request)
    {
        $emp = Pendaftaran::Find($request->id); //mengambil data pendaftaran berdasarkan id

        $lampiranFulltextFile = null;
        if ($request->hasFile('bukti_bayar')) {
            if ($emp->bukti_bayar) {
                File::delete(public_path('/bukti_bayar/' . $emp->bukti_bayar));
            }
            $file = $request->file('bukti_bayar');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/bukti_bayar';

            $this->lampiranFulltextFile = 'foto-bukti_bayar-' . $emp->nomor_pendaftaran . Str::random(5) . '.' . $file_extension;
            $request->file('bukti_bayar')->move($lokasiFile, $this->lampiranFulltextFile);
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        } else {
            $this->lampiranFulltextFile = $emp->image;
            $lampiranFulltextFile = $this->lampiranFulltextFile;
        }

        $emp->update(['bukti_bayar' => $lampiranFulltextFile]); //update data
        return back()->with('pembayaranbuktibayar', 'd');
    }

    public function siswapin(Request $request)
    {
        //menampilkan data pendaftaran
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran berdasarkan tahun ajaran yang berjalan
        $tahun_ajaran = Tahun_ajaran::where('id', $tahun)->first()->tahun_ajaran; //mengambil data tahun ajaran berdasarkan id
        $jenjang = (int)  $request->jenjang_pendidikan_id;
        $pendaftaran = Pendaftaran::where('status', null)->where('jenjang', $jenjang)->where('hasil', null)->where('jenis', 'siswapindahan')->get(); //mengambil data pendaftaran berdasarkan status = null , jenis = pindahan, dan berdasarkan jenjang
        return view('siswapindahan.table', compact('pendaftaran', 'tahun_ajaran'));
    }

    public function selectjenjangkelas(Request $request)
    {
        // pilih kelas
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang sedang berjalan
        $jenjang = (int)$request->jenjang_pendidikan_id;
        $kelas = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjang) {
            $q->where('jenjang_pendidikan_id', $jenjang);
        })->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung
        $tampunkelas = [];
        foreach ($kelas as $kel) {
            $siswa = (int)Siswa::where('kelas', $kel->id)->count(); //menghitung siswa berdasarkan kelas
            $cek = (int)$kel->max - $siswa;
            // if ($cek != 0) {
            $row['id'] = $kel->id;
            $row['kuota'] = $kel->max - $siswa;
            $row['kelas'] = $kel->kelas->name;
            // }
            array_push($tampunkelas, $row);
        }
        return view('siswapindahan.kelas', compact('tampunkelas'));
    }
    public function selectjenjangkelasform($kelasid)
    {
        //halaman memilih kelas
        $kelas = Kelas::where('id', $kelasid)->first(); //mengambil data kelas berdasarkan id
        return view('siswapindahan.form', compact('kelas'));
    }

    public function selectjenjangkelasformsimpan(Request $request)
    {
        //proses menyimpan data siswa
        $kelas = Kelas::where('id', (int)$request->kelasid)->first(); //mengambil data kelas berdasarkan id
        $tingkatan = (int)$kelas->tingkatan_id;
        if ($tingkatan < 7) {
            $jenjang = 1;
        } elseif ($tingkatan < 10) {
            $jenjang = 2;
        } elseif ($tingkatan < 13) {
            $jenjang = 3;
        } elseif ($tingkatan === 14) {
            $jenjang = 4;
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $file_extension = $file->getClientOriginalExtension();
            $lokasiFile = public_path() . '/avatar';
            $this->fileName = 'avatar-' . $request->name . Str::random(5) . '.' . $file_extension;
            $request->file('avatar')->move($lokasiFile, $this->fileName);
            $fileName = $this->fileName;
        } else {
            $fileName = null;
        }
        $user = [
            'name' => $request->nama_bapak,
            'username' => $request->nama_bapak,
            'email' => $request->email_bapak,
            'role' => 4,
            'password' => Hash::make('password'),
        ];
        $id_user_org = User::create($user); //create data user wali siswa
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
        $wali = Wali_Siswa::create($org); //create data wali siswa

        $user = [
            'name' => $request->nama_siswa,
            'username' => $request->nama_siswa,
            'email' => $request->email,
            'role' => 5,
            'password' => Hash::make('password'),
        ];

        $id_user_siswa = User::create($user); //create user siswa

        $create = [
            'id_orang_tua' => $wali->id,
            'kelas' => $kelas->id,
            'id_user' => $id_user_siswa->id,
            'nomor_induk_siswa' => $request->nomor_induk_siswa,
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'telp' => $request->no_telp,
            'email' => $request->email,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat' => $request->alamat,
            'tingkat' => $kelas->tingkatan_id,
            'jurusan' => $kelas->jurusan,
            'jenjang_pendidikan_id' => $jenjang,
            'avatar' => $fileName,
        ];

        Siswa::create($create); //create siswa
        return back();
    }
    public function siswapindahanindexpost(Request $request)
    {
        // proses menyimpan data siswa
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $tahun_ajaran = Tahun_ajaran::where('id', $tahun)->first()->tahun_ajaran; //mengambil data tahun ajaran berdasarkan id
        $tingkatan = (int)$request->tingkatan_id;
        if ($tingkatan < 7) {
            $jenjang = 1;
        } elseif ($tingkatan < 10) {
            $jenjang = 2;
        } elseif ($tingkatan < 13) {
            $jenjang = 3;
        } elseif ($tingkatan === 14) {
            $jenjang = 4;
        }

        $tahun = Setting::first()->id_tahun_ajaran; // mengambil data tahun ajaran yang berlangsung
        $tanggalini = Carbon::now()->Format('Y-m-d'); //tanggal hari ini
        $create = [
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'tgl_daftar' => $tanggalini,
            'nama_siswa' => $request->nama_siswa,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat' => $request->alamat,
            'tingkat' => $request->tingkatan_id,
            'jurusan' => $request->jurusan,
            'jenjang' => $jenjang,
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
            'jurusan' => $request->jurusan,
            'jenis' => 'siswapindahan',
            'status' => null,
            'tahun_ajaran_id' => $tahun,
            'nomor_pendaftaran' => Str::random(20),
        ];

        $pen = Pendaftaran::create($create); //create data pendaftaran


        //sendmail link buat tempat pembayaran
        $message = view('api.email.buktibayar', compact('pen'))->render();
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
            $mail->addAddress($pen->email);
            $mail->isHTML(true);
            $mail->Subject = 'Surat Pemberitahuan Pembayaran';
            $mail->Body    = $message;
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        // return back();
        return view('siswapindahan.berhasil');
    }

    public function konfirmasiditerima($idpendaftaran)
    {
        //halaman detail pendaftaran
        $pendaftaran = Pendaftaran::where('id', $idpendaftaran)->first(); //mengambil data pendaftaran berdasarkan id
        return view('siswapindahan.konfirmasiadmin', compact('pendaftaran'));
    }

    public function konfirmasiditerimapost(Request $request)
    {
        //proses pengumuman
        $pendaftaran = Pendaftaran::where('id', $request->id)->first();
        $pendaftaran->update([
            'hasil' => $request->hasil,
            'status' => 'paid',
        ]);

        //send mail pemberitahuan kelulusan atau cadangan
        // $message = view('api.email.resetpassword', compact('siswa'))->render();
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
            $mail->addAddress($pendaftaran->email);
            $mail->isHTML(true);
            $mail->Subject = 'Surat Pemberitahuan';
            if ($request->hasil === 'lulus') {
                $mail->Body    = 'anda lulus silahkan daftar ulang';
            } else {
                $mail->Body    = 'anda tidak lulus';
            }
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        return back();
    }
}
