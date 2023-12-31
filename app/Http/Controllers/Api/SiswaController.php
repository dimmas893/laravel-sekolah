<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use App\Models\Kurikulum;
use App\Models\Mapel_Guru;
use App\Models\Pengguna;
use App\Models\Rincian_Siswa;
use App\Models\Siswa;
use App\Models\Wali_Dan_Siswa;
use App\Models\Wali_Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SiswaController extends Controller
{
    // public function get_all()
    // {}


    public function profil(Request $request)
    {
        // api profil
        $file_path = 'https://dapurkoding.my.id/';
        $siswa = Siswa::with('kelas_siswa')->where('id_user', $request->id_user)->first(); //mengambil data siswa berdasarkan id user
        $dataGuru = Guru::where('id_user', $request->id_user)->first(); //mengambil data guru berdasarkan id user
        if ($siswa != null) {
            if ($siswa['jenis_kelamin'] === 'L') {
                $jk = 1;
            } elseif ($siswa['jenis_kelamin'] === 'P') {
                $jk = 0;
            }

            $row['id'] = $siswa['id'];
            $row['nis'] = $siswa['nomor_induk_siswa'];
            $row['nama'] = $siswa['nama_siswa'];
            $row['tempat_lahir'] = $siswa['tempat_lahir'];
            $row['tanggal_lahir'] = $siswa['tgl_lahir'];
            $row['jk'] = $jk;
            $row['alamat'] = $siswa['alamat'];
            $row['kelas'] = $siswa['kelas_siswa']['kelas']['name'];
            $row['email'] = $siswa['email'];
            $row['hp'] = $siswa['telp'];
            $row['avatar'] = $file_path . 'avatar/' . $siswa['avatar'];
            $row['jurusan'] = $siswa['jurusan'];

            return response()->json(
                ['data' => $row]
            );
        } elseif ($dataGuru != null) {
            if ($dataGuru['jenis_kelamin'] === 'L') {
                $jk = 1;
            } elseif ($dataGuru['jenis_kelamin'] === 'P') {
                $jk = 0;
            }

            $mapel = Mapel_Guru::with('mapel')->where('guru_id', $dataGuru->id)->get(); //mengambil data mapel guru berdasarkan guruu id

            $tagihan = [];

            foreach ($mapel as $p) {
                if ($p) {
                    $arrayMapel = $p['mapel']['name'];
                } else {
                    $arrayMapel = [];
                }
                $row['id'] = $dataGuru['id'];
                $row['nip'] = $dataGuru['nip'];
                $row['nama'] = $dataGuru['name'];
                $row['tempat_lahir'] = $dataGuru['tempat_lahir'];
                $row['tgl_lahir'] = $dataGuru['tgl_lahir'];
                $row['jk'] = $jk;
                $row['alamat'] = $dataGuru['alamat'];
                $row['email'] = $dataGuru['email'];
                $row['hp'] = $dataGuru['telp'];
                $row['mapel'][] = $arrayMapel;
                $row['avatar'] = $file_path . 'guru/' . $dataGuru['avatar'];
                array_push($tagihan, $row);
            }
            return response()->json(
                ['data' => $row]
            );
        } else {
            return response()->json([
                'error' => [
                    'Data Tidak Ditemukan',
                ],
            ], 404);
        }
    }

    public function profil_wali_siswa(Request $request)
    {
        // profil wali siswa
        $siswa = Wali_Siswa::where('id', $request->id_user)->first(); //mengambil data wali siswa berdasarkan id user
        $rincian_siswa = Wali_Dan_Siswa::with('siswa', 'wali_siswa')->where('wali_siswa_id', $siswa->id)->get(); //mengambil data wali dan siswa berdasarkan wali siswa id
        $tagihan = [];
        foreach ($rincian_siswa as $p) {
            $row['id'] = $p['id'];
            $row['nama'] = $p['siswa']['nama_siswa'];
            $row['avatar'] = $p['siswa']['avatar'];
            array_push($tagihan, $row);
        }
        return response()->json([
            'data' => [
                "id" => $siswa->id,
                "nama" => $siswa->name,
                "alamat" => $siswa->alamat,
                "email" => $siswa->email,
                "telepon" => $siswa->telepon,
            ],
            'data_anak' => $tagihan
        ]);
    }




    public function profil_guru(Request $request)
    {
        $guru = Guru::where('id_user', $request->id_user)->first();
        $mapel = Mapel_Guru::with('mapel')->where('guru_id', $guru->id)->get();
        // 		dd($mapel);
        $tagihan = [];

        foreach ($mapel as $p) {
            $row['id'] = $guru['id'];
            $row['nama'] = $guru['name'];
            $row['tempat_lahir'] = $guru['tempat_lahir'];
            $row['tgl_lahir'] = $guru['tgl_lahir'];
            $row['jk'] = $guru['jenis_kelamin'];
            $row['alamat'] = $guru['alamat'];
            $row['email'] = $guru['email'];
            $row['hp'] = $guru['telp'];
            $row['mapel'][] = $p['mapel']['name'];
            $row['avatar'] = "https://i.pravatar.cc/150?img=4";
            array_push($tagihan, $row);
        }
        return response()->json([
            'data' => $row
        ]);
    }


    public function all()
    {

        $file_path = 'https://dapurkoding.my.id/';
        $admin = Siswa::all();
        $tagihan = [];
        foreach ($admin as $p) {
            $row['id'] = $p['nomor_induk_siswa'];
            $row['name'] = $p['nama_siswa'];
            if ($p->avatar != 'avatar') {
                $row['avatar'] = $file_path . 'avatar/' . $p->avatar;
            } elseif ($p->avatar == 'avatar') {
                $row['avatar'] = 'https://dapurkoding.my.id/assets/img/avatar/avatar-1.png';
            } else {
                $row['avatar'] = 'https://dapurkoding.my.id/assets/img/avatar/avatar-1.png';
            }
            array_push($tagihan, $row);
        }

        return response()->json(
            ['data' => $tagihan]
        );
    }

    public function kurikulum_all()
    {
        $admin = Kurikulum::all();
        $tagihan = [];
        foreach ($admin as $p) {
            $row['id'] = $p['mata_pelajaran_id'];
            $row['nama'] = $p['name'];
            // $row['link'] = $p['link'];
            $row['update_terakhir'] = $p['tanggal'];
            $row['tingkatan'] = $p['tingkatan_id'];
            array_push($tagihan, $row);
        }

        return response()->json(
            ['data' => $tagihan]
        );
    }
    public function store(Request $request)
    {

        $empData = [
            'nomor_induk_siswa' => $request->nomor_induk_siswa,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'alamat' => $request->alamat
        ];
        $emp = Siswa::create($empData);
        return response()->json([
            'data' => $emp,
            'status' => 200
        ]);
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        $id = $request->id;
        $emp = Siswa::Find($id);
        return response()->json([
            'data' => $emp,
            'status' => 200
        ]);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {

        $id = $request->id;
        $emp = Siswa::Find($id);

        $empData = [
            'nomor_induk_siswa' => $request->nomor_induk_siswa,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'alamat' => $request->alamat
        ];

        $emp->update($empData);
        return response()->json([
            'data' => $emp,
            'status' => 200
        ]);
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {

        $id = $request->id;
        Siswa::destroy($id);

        return response()->json([
            'message' => 'Berhasil Mengghapus'
        ], 200);
    }

    public function gantipassword(Request $request)
    {
        $user = User::where('id', $request->id_user)->first();
        $siswa = Siswa::where('id_user', $user->id)->first();
        // dd($siswa);
        if ($siswa) {
            if (Hash::check($request->password_lama, $user->password)) {

                $updatepassword = [
                    'password' => Hash::make($request->password_baru)
                ];
                $user->update($updatepassword);
                return response()->json(["message" => 'Ganti password berhasil']);
            } else {
                return response()->json(["error" => ['Password lama tidak sesuai']]);
            }
        }
    }

    public function resetpassword(Request $request)
    {
        $siswa = User::where('username', $request->username)->first();
        if ($siswa) {

            $siswa->update([
                'password' => Hash::make('password')
            ]);
            $message = view('api.email.resetpassword', compact('siswa'))->render();
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'mail.dapurkoding.my.id';
                $mail->SMTPAuth = true;
                $mail->Username = 'dapurkod@dapurkoding.my.id';
                $mail->Password = 'Anandadimmas,123';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->setFrom("dapurkod@dapurkoding.my.id", "Reset Password");
                $mail->addAddress($siswa->email);
                $mail->isHTML(true);
                $mail->Subject = 'Surat Pemberitahuan';
                $mail->Body    = $message;
                $mail->send();
                return response()->json([
                    "message" => "Silakan cek email untuk instruksi reset password selanjutnya"
                ]);
            } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        } else {
            return response()->json(
                ['error' => ["Username tidak ditemukan"]]
            );
        }
    }
}
