<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hari;
use App\Models\Tugas;
use App\Models\Jadwal;
use App\Models\Siswa;
use App\Models\Invoice_Tagihan;
use App\Models\Perpustakaan_Pinjam;
use App\Models\Perpustakaan_Pinjam_Rincian;
use App\Models\PerpustakaanMember;
use App\Models\Kumpul_Tugas;
use App\Models\Kegiatan;
use App\Models\notifikasi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function notifikasi(Request $request)
    {
        //api notifikasi
        $myDate = Carbon::now()->toDateTimeString(); //tgl hari ini beserja jam
        $besok = Carbon::now()->add(3, 'day')->format('Y-m-d'); //tanggal ari ini
        $namaHari = Carbon::now()->isoFormat('dddd');
        // dd($besok);
        $hariJadwal = Hari::where('name', $namaHari)->first(); // mengambil data hari ini
        $dataNotifikasi = [];
        $idUser = $request->id_user;
        $siswa = Siswa::where('id_user', $idUser)->first(); //mengambil data user yang login
        if ($siswa) {
            $idSiswa = $siswa->id;
            $member = PerpustakaanMember::where('user_id', $idUser)->where('status_aktif', 1)->first(); //mengambil data member perpustakan berdasarkan yag login sm status yang aktif
            if ($member) {
                $pengembalian_buku = Perpustakaan_Pinjam::where('member_id', $member->id)->get(); //mengambil data perpustaan pinjam berdasarkan member id
                foreach ($pengembalian_buku->where('batas_waktu', $besok) as $pengembalian) {
                    $rincian_buku = Perpustakaan_Pinjam_Rincian::where('perpustakaan_pinjam_id', $pengembalian->id)->count(); //menghitung data perpustakaan pinjam rincian berdasarkan perpustakaan pinjam id
                   
                    $dataNotifikasiPerpus = Notifikasi::where('id', $pengembalian->id)->where('id_user', $idUser)->latest('created_at')->first(); //mengambil data notifikasi berdassarkan yang login dan data terakhir

                    if ($dataNotifikasiPerpus === null || $dataNotifikasiPerpus->read === 1) {
                        notifikasi::updateOrCreate(['id' => $pengembalian->id],[
                            'nama' => 'Kembalikan buku' . $databuku['relasiBuku']['judul'] . 'dan' . $rincian_buku . ' buku lainnya',
                            'id' => $pengembalian->id,
                            'id_user' => $idUser,
                            'subnama' => 'Pengembalian Buku',
                            'deskripsi' => 'ini Adalah Notifikasi Tanggal Pengembalian Buku siswa',
                            'tgl_notifikasi' => $myDate,
                            'target' => 'detail-pinjam-buku',
                            'id_target' => $pengembalian->id,
                            'read' => 0,
                        ]);
                    }

                    $row['id'] = $pengembalian->id;
                    $row['nama'] = 'Kembalikan buku' . $databuku['relasiBuku']['judul'] . ' dan ' . $rincian_buku . ' buku lainnya';
                    $row['subnama'] = 'Pengembalian Buku';
                    $row['deskripsi'] = 'ini Adalah Notifikasi Tanggal Pengembalian Buku siswa';
                    $row['tgl_notifikasi'] = $myDate;
                    $row['target'] = 'detail-pinjam-buku';
                    $row['id_target'] = $pengembalian->id;
                    $row['read'] = 0;
                    array_push($dataNotifikasi, $row);
                }
            }

            $tagihanSiswa = Invoice_Tagihan::where('id_siswa', $idSiswa)->where('status', 'unpaid')->get(); //mengambil data tagihan berdasarkan status unpaid dan berdaarkan id siswa
            if ($tagihanSiswa != null) {
                foreach ($tagihanSiswa as $tagihan) {
                    $dataNotifikasiInvoice = Notifikasi::where('id', $tagihan->id)->where('id_user', $idUser)->latest('created_at')->first(); //mengambil data notifikasi berdasarkan id, id_user dan berdasarkan data terakhir

                    if ($dataNotifikasiInvoice === null || $dataNotifikasiInvoice->read === 1) {
                        notifikasi::updateOrCreate(['id' => $tagihan->id],[
                            'id' => $tagihan->id,
                            'id_user' => $idUser,
                            'nama' => $tagihan->kategori_tagihan->deskripsi,
                            'subnama' => 'tagihan',
                            'deskripsi' => 'Ada tagihan baru',
                            'tgl_notifikasi' => $myDate,
                            'target' => 'list-tagihan',
                            'id_target' => 0,
                            'read' => 0,
                        ]);
                    }
                    $row['id'] = $tagihan->id;
                    $row['nama'] = $tagihan->kategori_tagihan->deskripsi;
                    $row['subnama'] = 'tagihan';
                    $row['deskripsi'] = 'Ada tagihan baru';
                    $row['tgl_notifikasi'] = $myDate;
                    $row['target'] = 'list-tagihan';
                    $row['id_target'] = 0;
                    $row['read'] = 0;
                    array_push($dataNotifikasi, $row);
                }
            }

            $Kumpul_tugas = Kumpul_Tugas::where('siswa_id', $siswa->id)->get(); //mengambil data kumpul tugas berdasarkan siswa id
            if ($Kumpul_tugas) {
                foreach ($Kumpul_tugas as $kumpultugas) {
                    $tugas = Tugas::with('matapelajaran')->where('id', $kumpultugas->tugas_id)->first(); //mengambil data tugas berdasarkan id 
                    $jadwal = Jadwal::with('mata_pelajaran')->where('mata_pelajaran_id', $tugas->mata_pelajaran_id)->where('kelas_id', $tugas->kelas_id)->first(); //mengambil data jadwal berdasarkan mmata pelajaran dan berdasarkan kelas id
                    $dataNotifikasiTugas = Notifikasi::where('id', $kumpultugas->id)->where('id_user', $idUser)->latest('created_at')->first(); //mengambil data notifikasi berdasarkan id dan berdasarkan id user

                    if ($dataNotifikasiTugas === null || $dataNotifikasiTugas->read === 1) {
                        notifikasi::updateOrCreate(['id' => $kumpultugas->id],[
                            'id' => $kumpultugas->id,
                            'id_user' => $idUser,
                            'nama' => $tugas['matapelajaran']['name'],
                            'subnama' => $tugas['nama'],
                            'deskripsi' => $tugas['deskripsi'],
                            'tgl_notifikasi' => $myDate,
                            'target' => 'detail-tugas',
                            'id_target' =>  $kumpultugas->id,
                            'read' => 0,
                        ]);
                    }
                    $row['id'] = $kumpultugas->id;
                    $row['nama'] = $tugas['matapelajaran']['name'];
                    $row['subnama'] = $tugas['nama'];
                    $row['deskripsi'] = $tugas['deskripsi'];
                    $row['tgl_notifikasi'] = $myDate;
                    $row['target'] = 'detail-tugas';
                    $row['id_target'] = $kumpultugas->id;
                    $row['read'] = 0;
                    array_push($dataNotifikasi, $row);
                }
            }

            $dataKegiatan = Kegiatan::where('tanggal', $myDate)->get(); //mengambil data kegiatan berdasarkan tanggal hari ini
            if ($dataKegiatan) {
                foreach ($dataKegiatan as $kegiatan) {

                    $dataNotifikasikegiatan = Notifikasi::where('id', (int)$kegiatan->id)->where('id_user', $idUser)->first(); //mengambil data notifikasi berdasarkan i dan id user
                    // dd($dataNotifikasikegiatan);
                    if ($dataNotifikasikegiatan === null || $dataNotifikasikegiatan->read === 1) {
                        notifikasi::updateOrCreate(['id' => $kegiatan->id],[
                            'id' => (int)$kegiatan->id,
                            'id_user' => $idUser,
                            'nama' => $kegiatan->nama_kegiatan,
                            'subnama' => $kegiatan->nama_kegiatan,
                            'deskripsi' => $kegiatan->deskripsi,
                            'tgl_notifikasi' => $myDate,
                            'target' => 'detail-kegiatan',
                            'id_target' =>  $kegiatan->id,
                            'read' => 0,
                        ]);
                    }

                    $row['id'] = (int)$kegiatan->id;
                    $row['nama'] = $kegiatan->nama_kegiatan;
                    $row['subnama'] = $kegiatan->nama_kegiatan;
                    $row['deskripsi'] = $kegiatan->deskripsi;
                    $row['tgl_notifikasi'] = $myDate;
                    $row['target'] = 'detail-kegiatan';
                    $row['id_target'] = $kegiatan->id;
                    $row['read'] = 0;
                    array_push($dataNotifikasi, $row);
                }
            }

            if (count($dataNotifikasi) > 0) {
                return response()->json([
                    'notifikasi' => $dataNotifikasi
                ]);
            } else {
                return response()->json([
                    'notifikasi' => 'Data Tidak Tersedia'
                ]);
            }
        } else {
            return response()->json([
                'error' => 'Data Siswa Tidak Ada'
            ], 404);
        }
    }

    public function updatenotif(Request $request)
    {
        //update data notivikasi menjadi sudah dilihat
        $id_user = $request->id_user;
        $notifikasi_id = $request->notifikasi_id;
        $notifikasi = Notifikasi::where('id', (int)$notifikasi_id)->where('id_user', $id_user)->update(['read' => 1]); //update data notifikasi berdasarkan id dan id user
        return response()->json(['message' => 'ok'], 200);
    }
}
