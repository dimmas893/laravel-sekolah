<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PencarianController extends Controller
{
    public function show_data(Request $request, $jenjang, $tanggalseleksi)
    {
        $customer_search = $request->name;
        if ($customer_search != '') {
            $output = '';
            $data = DB::table('pendaftarans')
                ->Where('nomor_pendaftaran', 'like', '%' . $customer_search . '%')
                ->where('jenis', 'siswabaru')
                ->where('jenjang', $jenjang)
                ->where('tanggal_seleksi_id', $tanggalseleksi)
                ->where('status', 'paid')
                ->where('status', '!=', 'off')
                ->orderBy('id', 'desc')
                ->get()->take(5);

            $row_data = count($data);
            if ($row_data > 0) {
                foreach ($data as $key => $row) {
                    // if (isset($customer_search)) {
                    $output .= '<div class="row">';
                    $output .= '<div class="col-12">';
                    $output .= '<div class="card">';
                    $output .= '<div class="card-header"><i class="ion-android-person h3"> &nbsp; </i> ' . $row->nama_siswa . ' - ' . $row->nomor_pendaftaran . ' </div>';
                    $output .= '<div class="card-body"><a href="' . route('absen-seleksi-massal-search', $row->id) . '" class="btn btn-primary">Konfirmasi hadir</a>';

                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                }
                echo $output;
                // }
            } else {
                $output .= '<div class="row">';
                $output .= '<div class="col-12">';
                $output .= '<div class="card">';
                $output .= '<div class="card-header">pencarian tidak valid </div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                echo $output;
            }
        } else {
            $output = '';
            $data = DB::table('pendaftarans')
                ->where('jenis', 'siswabaru')
                ->where('jenjang', $jenjang)
                ->where('tanggal_seleksi_id', $tanggalseleksi)
                ->where('status', 'paid')
                ->where('status', '!=', 'off')
                ->orderBy('id', 'desc')
                ->get()->take(5);

            $row_data = count($data);
            if ($row_data > 0) {
                foreach ($data as $key => $row) {
                    // if (isset($customer_search)) {
                    $output .= '<div class="row">';
                    $output .= '<div class="col-12">';
                    $output .= '<div class="card">';
                    $output .= '<div class="card-header"><i class="ion-android-person h3"> &nbsp; </i> ' . $row->nama_siswa . ' - ' . $row->nomor_pendaftaran . ' </div>';
                    $output .= '<div class="card-body"><a href="' . route('absen-seleksi-massal-search', $row->id) . '" class="btn btn-primary">Konfirmasi hadir</a>';

                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                }
                echo $output;
                // }
            } else {
                $output .= '<div class="row">';
                $output .= '<div class="col-12">';
                $output .= '<div class="card">';
                $output .= '<div class="card-header">pencarian tidak valid </div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                echo $output;
            }
        }
    }
}
