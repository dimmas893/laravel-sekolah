<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PendaftaranSeleksi;
use App\Models\Seleksi;
use Illuminate\Http\Request;

class SeleksiController extends Controller
{
    //sedang tahap perubahan
    public function index($jenjang_pendidikan_id)
    {
        $jenjang = (int)$jenjang_pendidikan_id;
        if ($jenjang === 4) {
            $tingkatan = 14;
        } elseif ($jenjang === 1) {
            $tingkatan = 1;
        } elseif ($jenjang === 2) {
            $tingkatan = 7;
        } elseif ($jenjang === 3) {
            $tingkatan = 10;
        }
        $kelasselect = Kelas::where('tingkatan_id', $tingkatan)->select('jurusan')->groupBy('jurusan')->get();
        $jurusan = [];
        foreach ($kelasselect as $kel) {
            $row['jurusan'] = $kel->jurusan;
            $kelas = (int)Kelas::where('tingkatan_id', $tingkatan)->where('jurusan', $kel->jurusan)->sum('max');
            $row['kuota'] = $kelas;
            array_push($jurusan, $row);
        }
        $seleksi = Seleksi::where('tingkat', $tingkatan)->where('jenjang', $jenjang_pendidikan_id)->orderBy('nilai', 'DESC')->get();
        return view('seleksi.nilai.nilaihasil', compact('seleksi', 'jurusan', 'jenjang', 'tingkatan'));
    }

    public function seleksidetail($id)
    {
        //menampilkan data detail seleksi
        $seleksi = Seleksi::Find($id);
        $riwayat = PendaftaranSeleksi::where('seleksi_id', $seleksi->id)->get();
        // return view('siswa.seleksi_detail', compact('seleksi'));
        return view('seleksi.detail', compact('seleksi', 'riwayat'));
    }
}
