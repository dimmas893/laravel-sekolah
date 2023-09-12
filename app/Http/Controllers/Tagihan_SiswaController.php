<?php

namespace App\Http\Controllers;

use App\Models\CekTotal;
use App\Models\Invoice_Tagihan;
use App\Models\JenjangPendidikan;
use App\Models\Kategori_Tagihan;
use App\Models\Kelas;
use App\Models\Master_Kelas;
use App\Models\Pembayaran;
use App\Models\Rincian_Pembayaran;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\Tagihan_Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Xendit\Invoice;

set_time_limit(10800);

class Tagihan_SiswaController extends Controller
{

    public function tagihan_siswa_web(Request $request)
    {
        // menampilkan data tagihan siswa
        $siswa = Siswa::where('id_user', Auth::user()->id)->first(); //mengambil data siswa berdasarkan yang login
        if ($siswa) {
            return view('siswa.halaman_user.tagihan');
        } else {
            return back()->with('gagalmasuk', 'll');
        }
    }

    public function ajax(Request $request)
    {
        // pilih kelas
        $setting = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $id = $request->id;
        $emps = Kelas::where('id_tahun_ajaran', $setting)->whereHas('kelas', function ($q) use ($id) {
            $q->where('jenjang_pendidikan_id', $id);
        })->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung da jenjang pendidikan


        $output = '';
        $output .= '<script>
                        $(document).ready(function() {
                            $(".select2").select2();
                        });
                    </script>';
        if ($emps->count() > 0) {
            $output = '<div class="iskelas my-2">';
            $output .= '<label>Kelas</label>
            <select class="form-control select2" id="kelas">
						<option value="" selected disabled>---Pilih Kelas---</option>
			';
            foreach ($emps as $emp) {
                $output .= '<option value="' . $emp->id . '" >' . $emp->kelas->name . ' ' .
                    $emp->jurusan .  '</option>';
            }
            $output .= '</select>';

            $output .= '</div>';
            echo $output;
        } else {
            echo '<label for="name">Kelas</label><select class="form-control"><option disabled selected>---kelas tidak ada---</option></select>';
        }
    }

    public function ajaxgetsiswa(Request $request)
    {
        //mengambil data siswa berdasaran kelas id
        $output = '';
        $id = $request->id;
        if ($id) {
            $siswa = Siswa::where('kelas', '!=', null)->where('kelas', $id)->select("id", "nama_siswa", "kelas")->get(); //mengambil data siswa berdasarkan kelas
            if ($siswa->count() > 0) {
                $output .= '<script>
                        $(document).ready(function() {
                            $(".select2").select2();
                        });
                    </script>';
                $output = '<div class="istagihan my-2">';
                $output .= '<label>Siswa</label>';
                $output .= '<select class="form-control select2" id="tagihan">';
                $output .= '<option value="" selected disabled>---Pilih Siswa---</option>';
                foreach ($siswa as $sis) {
                    $output .= '<option value="' . $sis->id . '" > ' . $sis->nama_siswa .  ' - ' . $sis->kelas_siswa->kelas->name . ' </option>';
                }
                $output .= '</select>';
                $output .= '</div>';
                echo $output;
            } else {
                $output .= '<label>Siswa</label>';
                $output .= '<select class="form-control select2">';
                $output .= '<option value="" selected disabled>---siswa tidak ada---</option>';
                $output .= '</select>';
                echo $output;
            }
        }
        if ($id === 0) {
            echo $output;
        }
    }



    public function ajaxgettagihan(Request $request)
    {
        //menampilkan data tagihan
        $id = $request->id;
        $output = '';
        if ($id === 0) {
            echo $output;
        }
        if ($id) {
            $user = Siswa::where('id', $id)->first(); //mengambil data siswa berdasarkan id
            $emps = CekTotal::with('tagihan')->where('id_user', $user->id)->get(); //mengambil data keranjang tagihan berdaarkan id user
            $in = Invoice_Tagihan::where('id_siswa', $user->id)->where('status', 'unpaid')->get(); //mengambil data tagihan berdasarkan di siswa

            if ($in->count() > 0) {
                $output .= '<div class="card shadow-primary card-primary">
                <div class="card-header"><h4>Tagihan Siswa</h4></div><div class="card-body">
                                <div class="row">';
                foreach ($in as $p) {
                    $output .= '<input type="hidden" name="nama" value="Fee Transaksi">
                <input type="hidden" name="id_siswa" value="' . $id . '">
								<div class="form-group col-md-3 col-12">
									<div class="card shadow-success card-success">
										<div class="card-header">';
                    if ($halo = CekTotal::with('tagihan')->where('id_invoice', $p->id_invoice)->first()) { // kondisi jika data keranjang tagihan ada
                        $output .= '<input id="' . $halo->id . '" name="item_bayar" class="deleteIcon" id_siswa="' . $id . '" type="checkbox" checked> <div>
								<label class="form-check-label">
									<h4>' . $p->id_invoice . '
									</h4>
								</label>
							</div>';
                    } else {
                        $output .= '<div><input name="item_bayar" class=""
									type="checkbox"  value="' . $p->id_invoice . '">
								<label class="form-check-label">
									<h4>' . $p->id_invoice . '
									</h4>
								</label>
							</div>';
                    }
                    $output .= '</div>
								<div class="card-body">
                                <div>' . $p->kategori_tagihan->kategori_tagihan->nama_kategori . ' - ' . $p->dataSiswa->nama_siswa . '</div>
									<p>Rp
										' . number_format($p->kategori_tagihan->kategori_tagihan->nominal, 2, ',', '.') . '
									</p>';
                    if ($p->status === 'paid') {
                        $output .= '<p class="text-success">' . $p->status . '</p>';
                    } else {
                        $output .= '<p  class="text-danger">' . $p->status . '</p>';
                    }

                    $output .= '</div>
							</div>
						</div>';
                }
                $output .=  '</div>
                            </div>
                            </div>
                   ';
                echo $output;
            }
        }
        // dd($invoice);
    }
    // public function ajaxgettagihan(Request $request)
    // {
    //     $output = '';
    //     $id = $request->id;
    //     $invoice = Invoice_Tagihan::where('id_siswa', $id)->get();
    //     if ($invoice->count() > 0) {
    //         $output .= '<div class="row">';
    //         foreach ($invoice as $p) {
    //             $output .= '<div class="col-12">';
    //             $output .= '<div class="card my-2 mt-3">';

    //             $output .= '<div class="card-header">';
    //             $output .= '<div>' . $p->id_invoice . '</div>';
    //             $output .= '</div>';

    //             $output .= '<div class="card-body">';
    //             $output .= '<div>' . $p->dataSiswa->nama_siswa . '</div>';
    //             $output .= '<div>' . $p->kategori_tagihan->kategori_tagihan->nama_kategori . ' - Rp' . $p->nominal . '</div>';
    //             $output .= '</div>';

    //             $output .= '</div>';
    //             $output .= '</div>';
    //         }
    //         $output .= '</div>';
    //         echo $output;
    //     }
    //     // dd($invoice);
    // }
    public function viewtampil()
    {
        //menampilkan data tagihan yang udah dipilih ajax
        $user = Siswa::where('id_user', Auth::user()->id)->first(); //mengambil data siswa berdasarkan yang login
        $in = Invoice_Tagihan::where('id_siswa', $user->id)->where('status', 'unpaid')->get(); //mengambil data tagihan berdasarkan id siswa dan status unpaid

        $output = '';
        $output .= '<div class="card-body">
                                <div class="row">';
        foreach ($in as $p) {
            $output .= '<input type="hidden" name="nama" value="Fee Transaksi">
								<div class="form-group col-md-3 col-12">
									<div class="card">
										<div class="card-header">';




            if ($halo = CekTotal::with('tagihan')->where('id_invoice', $p->id_invoice)->first()) { //kondisi jika data keranjang tagihan ada
                $output .= '
					<input id="' . $halo->id . '" name="item_bayar" class="deleteIcon" type="checkbox" checked> <div>
								<label class="form-check-label">
									<h4>' . $p->kategori_tagihan->kategori_tagihan->nama_kategori . '
									</h4>
								</label>
							</div>';
            } else {
                $output .= '<div><input name="item_bayar" class=""
									type="checkbox"  value="' . $p->id_invoice . '">
								<label class="form-check-label">
									<h4>' . $p->kategori_tagihan->kategori_tagihan->nama_kategori . '
									</h4>
								</label>
							</div>';
            }
            $output .= '</div>
								<div class="card-body">
									<p>Rp
										' . number_format($p->kategori_tagihan->kategori_tagihan->nominal, 2, ',', '.') . '
									</p>';
            if ($p->status === 'paid') {
                $output .= '<p class="text-success">' . $p->status . '</p>';
            } else {
                $output .= '<p  class="text-danger">' . $p->status . '</p>';
            }

            $output .= '</div>
							</div>
						</div>';
        }
        $output .=  '</div>
                            </div>
                   ';
        echo $output;
    }

    public function ajaxgettagihanview(Request $request)
    {
        //menampilkan data semua tagihan berdasarkan id siswa yang udah dipilih ajax
        $id = $request->id;
        $in = Invoice_Tagihan::where('id_siswa', $id)->where('status', 'unpaid')->get(); //mengambil data tagihan berdasarkan id siswa dan berdasarkan status unpaid

        $output = '';
        $output .= '<div class="card-body">
                                <div class="row">';
        foreach ($in as $p) {
            $output .= '<input type="hidden" name="nama" value="Fee Transaksi">
								<div class="form-group col-md-3 col-12">
									<div class="card">
										<div class="card-header">';




            if ($halo = CekTotal::with('tagihan')->where('id_invoice', $p->id_invoice)->first()) { //kondisi jika data keranjang tagihan ada
                $output .= 'ceklis
					<input id="' . $halo->id . '" name="item_bayar" class="deleteIcon" id_siswa="' . $id . '" type="checkbox" checked> <div>
								<label class="form-check-label">
									<h4>' . $p->kategori_tagihan->kategori_tagihan->nama_kategori . '
									</h4>
								</label>
							</div>';
            } else {
                $output .= 'belum<div><input name="item_bayar" class=""
									type="checkbox"  value="' . $p->id . '">
								<label class="form-check-label">
									<h4>' . $p->kategori_tagihan->kategori_tagihan->nama_kategori . '
									</h4>
								</label>
							</div>';
            }
            $output .= '</div>
								<div class="card-body">
									<p>Rp
										' . number_format($p->kategori_tagihan->kategori_tagihan->nominal, 2, ',', '.') . '
									</p>';
            if ($p->status === 'paid') {
                $output .= '<p class="text-success">' . $p->status . '</p>';
            } else {
                $output .= '<p  class="text-danger">' . $p->status . '</p>';
            }

            $output .= '</div>
							</div>
						</div>';
        }
        $output .=  '</div>
                            </div>
                   ';
        echo 'fdf';
    }

    public function searchNamaSiswa()
    {

        $jenjang_pendidikan = JenjangPendidikan::get(); //mengambil data jenjang pendidikan
        return view('menu.admin.infosiswa.tagihan.bayartagihan.namasiswa', compact('jenjang_pendidikan'));
    }

    public function search(Request $request)
    {
        //menu halaman search
        return view('menu.admin.infosiswa.tagihan.bayartagihan.search');
    }

    public function bayartagihan(Request $request)
    {
        //menampilkan halaman hasil pencarian / belum mencari
        if ($request->id_invoice) { //kondisi jika data request id invoice ada
            $invoice = Invoice_Tagihan::where('id_invoice', $request->id_invoice)->first(); //mencari data tagihan berdasarkan id invoice

            $siswa = Siswa::get(); //mengambil data siswa
            return view('menu.admin.infosiswa.tagihan.bayartagihan.index', compact('invoice', 'siswa'));
        } else { //kondisi jika request id invoice tidak ada
            $invoice = 0;
            return view('menu.admin.infosiswa.tagihan.bayartagihan.index', compact('invoice'));
        }
    }

    public function PilihJenjang(Request $request)
    {
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data berdasarkan tahun ajaran yang berlangsung
        $jenjangsd = 1;
        $sd = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjangsd) {
            $q->where('jenjang_pendidikan_id', $jenjangsd);
        })->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung dan berdasarkan jenjang pendidikan id 1
        $jenjangsmp = 2;
        $smp = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjangsmp) {
            $q->where('jenjang_pendidikan_id', $jenjangsmp);
        })->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung dan berdasarkan jenjang pendidikan id 2

        $jenjangsma = 3;
        $sma = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjangsma) {
            $q->where('jenjang_pendidikan_id', $jenjangsma);
        })->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung dan berdasarkan jenjang pendidikan id 3
        $jenjangtk = 4;
        $tk = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjangtk) {
            $q->where('jenjang_pendidikan_id', $jenjangtk);
        })->get(); //mengambil data kelas berdasarkan tahun ajaran yang berlangsung dan berdasarkan jenjang pendidikan id 4
        return view('menu.admin.infosiswa.tagihan.buattagihan.pilihjenjang', compact('sd', 'smp', 'sma', 'tk'));
    }


    // public function pembayaran(Request $request)
    // {
    // 	// dd($request->all());

    // 	$pembayaran_last = Pembayaran::latest('created_at')->first();
    // 	if ($pembayaran_last != null) {
    // 		$nopo = substr($pembayaran_last, 4, 5);
    // 		$no_po = intval($nopo);
    // 		do {
    // 			$number = 'PEM-' . str_pad(($no_po++ + 1), 5, "0", STR_PAD_LEFT) . '-' . $this->getRomawi(date('n')) . '-' . date('Y');
    // 		} while ($pembayaran_last->where('id_pembayaran', $number)->exists());
    // 	} else {
    // 		$number = 'PEM-00001' . '-' . $this->getRomawi(date('n')) . '-' . date('Y');
    // 	}
    // 	$tanggalini = Carbon::now()->Format('Y-m-d');
    // 	$empData = [
    // 		'id_pembayaran' => $number,
    // 		'tanggal_pembayaran' => $tanggalini,
    // 		'metode_pembayaran' => 'metode_pembayaran',
    // 		'status' => 'paid'
    // 	];
    // 	$emp = Pembayaran::create($empData);


    // 	$tampung_total = [];
    // 	$tampung_rincian = [];
    // 	$invoice = Invoice_Tagihan::where('id_invoice', $request->id_invoice)->first();
    // 	if ($invoice->status == 'unpaid') {
    // 		$tagihan_siswa = Tagihan_Siswa::where('id', $invoice->id_tagihan)->first();
    // 		$kategori_tagihan = Kategori_Tagihan::where('id', $tagihan_siswa->id_kategori_tagihan)->first();
    // 		// dd($kategori_tagihan);
    // 		$rinciancreate = [
    // 			'id_pembayaran' => $emp->id_pembayaran,
    // 			'id_invoice' => $request->id_invoice,
    // 			'tanggal_pembayaran' => $emp->tanggal_pembayaran,
    // 			'nominal_pembayaran' => $kategori_tagihan->nominal,
    // 			'metode_pembayaran' => $emp->metode_pembayaran,
    // 		];
    // 		// dd($rinciancreate);
    // 		$rincian = Rincian_Pembayaran::create($rinciancreate);


    // 		$get_siswa_id = Invoice_Tagihan::where('id_invoice', $request->id_invoice)->first();
    // 		array_push($tampung_total, $rincian->nominal_pembayaran);
    // 		array_push($tampung_rincian, $rincian);

    // 		$data = [];
    // 		foreach ($tampung_rincian as $p) {
    // 			$tampung_semua = Rincian_Pembayaran::where('id', $p->id)->first();
    // 			$invoice = Invoice_Tagihan::where('id_invoice', $p['id_invoice'])->first();
    // 			$tagihan_siswa = Tagihan_Siswa::where('id', $invoice->id_tagihan)->first();
    // 			$kategori_tagihan = Kategori_Tagihan::where('id', $tagihan_siswa['id_kategori_tagihan'])->first();
    // 			// $registeredAt = $p->created_at->isoFormat('D MMMM Y');
    // 			$row['id'] = $p->id_invoice;
    // 			$row['nama'] = $kategori_tagihan->nama_kategori;
    // 			$row['nominal'] = $kategori_tagihan->nominal;
    // 			array_push($data, $row);
    // 		}
    // 		$dimmasoke = [];
    // 		$rinciancreate = [
    // 			'id_pembayaran' => $emp->id_pembayaran,
    // 			'id_invoice' => 1,
    // 			'tanggal_pembayaran' => $emp->tanggal_pembayaran,
    // 			'nominal_pembayaran' => $request->nominal,
    // 			'metode_pembayaran' => $request->nama,
    // 		];

    // 		$aduh = Rincian_Pembayaran::create($rinciancreate);
    // 		array_push($tampung_total, $request->nominal);
    // 		array_push($dimmasoke, $rinciancreate);

    // 		$total = array_sum($tampung_total);
    // 		$update = [
    // 			'total_pembayaran' => $total,
    // 			'siswa_id' => $get_siswa_id->id_siswa,
    // 			'status' => 'paid',
    // 		];
    // 		$pembayaran_update = Pembayaran::where('id_pembayaran', $emp->id_pembayaran)->update($update);
    // 		$invoice->update(['status' => 'paid']);
    // 	} else {
    // 		return response()->json('sudah dibayar sebelumnya');
    // 	}
    // 	return back();
    // }

    public function CekTotal(Request $request)
    {
        //menambahkan data tagihan ke keranjang ajax
        $invoice = Invoice_Tagihan::where('id_invoice', $request->item_bayar)->first(); //mengambil data tagihan berdasarkan id invoice
        $cek = CekTotal::where('id_invoice', $request->item_bayar)->first(); //mengambil data keranjang berdasarkan id invoice
        CekTotal::create([
            'id_invoice' => $invoice->id_invoice,
            'nominal' => $invoice->nominal,
            'id_user' => Auth::user()->id

        ]); //create data keranjang
        return response()->json([
            'status' => 200,
        ]);
    }

    public function CekTotaladmin(Request $request)
    {
        //menambah data keranjang tagihan admin
        $invoice = Invoice_Tagihan::where('id_invoice', $request->item_bayar)->first(); //mengambil data tagihan berdasarkan id invoice
        $cek = CekTotal::where('id_invoice', $invoice->item_bayar)->first(); //mengambil data keranjang berdasarkan id invoice

        if ($cek == null) {
            $cek = CekTotal::create([
                'id_invoice' => $invoice->id_invoice,
                'nominal' => $invoice->nominal,
                'id_user' => $invoice->id_siswa,

            ]); //create data keranjang
            return response()->json([
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'status' => 400,
            ]);
        }
    }

    public function hapus(Request $request)
    {
        //hapus data keranjang ajax
        $id = $request->id;
        $cek = CekTotal::where('id', $id)->delete(); //menghapus data keranjang tagihan berdasarkan id
    }
    public function hapusadmin(Request $request)
    {
        //menghapus data keranjang tagihan
        $id = $request->id;
        $cek = CekTotal::where('id', $id)->delete(); //menghapus data keranjang tagihan berdasarkan id
    }

    public function cek()
    {
        //cek total nominal ajax
        $emps = CekTotal::with('tagihan')->where('id_user', Auth::user()->id)->get(); //mengambil data keranjang tagihan berdasarkan yang login
        $user = Siswa::where('id_user', Auth::user()->id)->first(); //mengambil data siswa berdasarkan yang login
        $in = Invoice_Tagihan::where('id_siswa', $user->id)->get(); //mengambil data tagihan siswa berdasarkan idsiswa
        $fee = Setting::first(); //mengambil data setting
        $token = csrf_token();
        $output = '';
        $p = 1;
        if ($emps->count() === 0) {
            echo $output;
        } elseif ($emps->count() > 0) {

            $output .= '<div class="">
							<div class="">
								<div class="card">
									<div class="card-header"> <h4>Detail Pembayaran </h4>
                        </div>';
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
						<thead>
						<tr>
							<th>Invoice</th>
							<th>Nama Tagihan</th>
							<th>Nominal</th>
						</tr>
						</thead>
						<tbody>';
            foreach ($emps as $emp) {
                $output .= '
						<input type="hidden" name="nama" value="Fee Transaksi">
						<input type="hidden" name="item_bayar[]" value="' . $emp->id_invoice . '">
					';
                $output .= '<tr>
								<td>' . $emp->id_invoice . '</td>
								<td>' . $emp->tagihan->kategori_tagihan->kategori_tagihan->nama_kategori . '</td>
								<td> Rp ' . number_format($emp->nominal, 2, ',', '.') . '</td>
							</tr>';
            }
            $output .= '</tbody></table>';
            $output .= '<div class="col-12">Tagihan :  <b> Rp ' . number_format($emps->sum('nominal'), 2, ',', '.') . ' </b>
			<br>Fee :<b> Rp ' . number_format($fee->fee, 2, ',', '.') . '</b>
			</div>';

            $output .= '<div class="card-header">Total Tagihan :  <b> Rp ' . number_format($emps->sum('nominal') + $fee->fee, 2, ',', '.') . ' </b></div>

			<a href="/tagihan/Pembayaran" class="btn btn-primary ml-3 mb-2 mr-3 mx-1">Bayar</a>

			<a href="#" class="btn btn-danger ml-3 mb-2 mr-3 mx-1 deleteaku">Hapus ceklis</a>
					<div>
				</div>
			</div>
			';
            echo $output;
        }
    }

    public function cekadmin(Request $request)
    {
        //menampilkan data total pembayaran dr keranjang tagihan
        $id = $request->id;
        $emps = CekTotal::with('tagihan')->where('id_user', $id)->get(); //mengambil data keranjang tagihan berdasarkan id userr
        $fee = Setting::first(); //mengambil data setting
        $token = csrf_token();
        $output = '';
        if ($id === 0) {
            echo $output;
        }
        if ($emps->count() === 0) {
            echo $output;
        } elseif ($emps->count() > 0) {

            $output .= '<div class="card shadow-primary card-primary">
									<div class="card-header"> <h4>Detail Pembayaran </h4>
                        </div>';
            $output .= '<div class="card-body"><div class="card shadow-success card-success">
            <table class="table table-bordered table-md display nowrap" style="width:100%">
						<thead>
						<tr>
							<th>Invoice</th>
							<th>Nama Tagihan</th>
							<th>Nominal</th>
						</tr>
						</thead>
						<tbody>';
            foreach ($emps as $emp) {
                $output .= '
						<input type="hidden" name="nama" value="Fee Transaksi">
						<input type="hidden" name="item_bayar[]" value="' . $emp->id_invoice . '">
					';
                $output .= '<tr>
								<td>' . $emp->id_invoice . ' - ' . $emp->tagihan->dataSiswa->nama_siswa . '</td>
								<td>' . $emp->tagihan->kategori_tagihan->kategori_tagihan->nama_kategori . '</td>
								<td> Rp ' . number_format($emp->nominal, 2, ',', '.') . '</td>
							</tr>';
            }
            $output .= '</tbody></table>';
            $output .= '<div class="col-12">Tagihan :  <b> Rp ' . number_format($emps->sum('nominal'), 2, ',', '.') . ' </b>
			<br>Fee :<b> Rp ' . number_format($fee->fee, 2, ',', '.') . '</b>
			</div>';
            $output .= '<div class="col-12">Total Tagihan :  <b> Rp ' . number_format($emps->sum('nominal') + $fee->fee, 2, ',', '.') . ' </b></div>';
            $output .= '<div class="mt-3"><a href="/tagihan/Pembayaran/admin-massal/' . $id . '" class="btn btn-primary ml-3 mb-2 mr-3 mx-1">Bayar tagihan</a>';
            $output .= '<a href="#" cektotal="' . $id . '" class="btn btn-danger ml-3 mb-2 mr-3 mx-1 deleteadmin">Hapus ceklis</a> </div>';
            $output .= ' </div><div></div>';
            echo $output;
        }
    }

    // public function CekTotalView(Request $request)
    // {
    // 	$cektotal = CekTotal::where('id_user', Auth::user()->id)->count();
    // 	if ($cektotal > 0) {
    // 		$cektotalget = CekTotal::where('id_user', Auth::user()->id)->get();
    // 		$total = [];
    // 		foreach ($cektotalget as $p) {
    // 			array_push($total, $p->nominal);
    // 		}
    // 		$total_nominal = array_sum($total);
    // 		return response()->json([
    // 			'status' => 200,
    // 			'total' => $total_nominal
    // 		]);
    // 	}
    // }

    public function CekTotalViewDelete(Request $request)
    {
        //menghapus semua keranjang ajax
        $cek = CekTotal::where('id_user', Auth::user()->id)->get(); //mengambil data keranjang tagihan berdasarkan id user
        foreach ($cek as $p) {
            CekTotal::where('id', $p->id)->delete(); //delete data
        }
    }

    public function CekTotalViewDeleteadmin(Request $request)
    {
        $id = $request->id;
        $cek = CekTotal::where('id_user', $id)->get(); //mengambil data keranjang tagihan berdasarkan id user
        foreach ($cek as $p) {
            CekTotal::where('id', $p->id)->delete(); //delete data
        }
    }

    public function pembayaran(Request $request)
    {
        //pembayaran tagihan
        $tes = [];
        $fee = Setting::first(); //mengambil data setting
        $cektotal = CekTotal::where('id_user', Auth::user()->id)->get(); //mengambil data keranjang tagihan berdasarkan yang login
        foreach ($cektotal as $key => $value) {
            $url['id_invoice'] = $value->id_invoice;
            array_push($tes, $url);
        }
        $pembayaran_last = Pembayaran::latest('created_at')->first(); //mengambil data pembayaran terakhir
        if ($pembayaran_last != null) {
            $nopo = substr($pembayaran_last, 4, 5);
            $no_po = intval($nopo);
            do {
                $number = 'PEM-' . str_pad(($no_po++ + 1), 5, "0", STR_PAD_LEFT) . '-' . $this->getRomawi(date('n')) . '-' . date('Y');
            } while ($pembayaran_last->where('id_pembayaran', $number)->exists());
        } else {
            $number = 'PEM-00001' . '-' . $this->getRomawi(date('n')) . '-' . date('Y');
        }
        $tanggalini = Carbon::now()->Format('Y-m-d');
        $empData = [
            'id_tahun_ajaran' => $fee->id_tahun_ajaran,
            'id_pembayaran' => $number,
            'tanggal_pembayaran' => $tanggalini,
            'metode_pembayaran' => 'metode_pembayaran',
            'status' => 'paid'
        ];
        $emp = Pembayaran::create($empData); //create data pembayaran


        $tampung_total = [];
        $tampung_rincian = [];
        foreach ($cektotal as $key => $value) {
            $invoice = Invoice_Tagihan::where('id_invoice', $value->id_invoice)->first(); //mengambil data tagihan berdasarkan id invoice
            $invoice->update(['status' => 'paid']); //update data status menjadi paid
            $tagihan_siswa = Tagihan_Siswa::where('id', $invoice->id_tagihan)->first(); //mengambil data tagihan siswa berdasarkan id
            $kategori_tagihan = Kategori_Tagihan::where('id', $tagihan_siswa->id_kategori_tagihan)->first(); //mengambil data kategori tagihan berdasarkan id
            $rinciancreate = [
                'id_pembayaran' => $emp->id_pembayaran,
                'id_invoice' => $value->id_invoice,
                'tanggal_pembayaran' => $emp->tanggal_pembayaran,
                'nominal_pembayaran' => $kategori_tagihan->nominal,
                'metode_pembayaran' => $emp->metode_pembayaran,
            ];
            $rincian = Rincian_Pembayaran::create($rinciancreate); //create rincian pembayaran


            $get_siswa_id = Invoice_Tagihan::where('id_invoice', $value->id_invoice)->first(); //mengambil data tagihan siswa berdasarkan tagihan

            array_push($tampung_total, $rincian->nominal_pembayaran); //total pembayaran
            array_push($tampung_rincian, $rincian);
        }

        $data = [];
        foreach ($tampung_rincian as $p) {
            $invoice_2 = Invoice_Tagihan::where('id_invoice', $p['id_invoice'])->first(); //mengambil data tagihan berdasarkan id invoice
            $tagihan_siswa = Tagihan_Siswa::where('id', $invoice_2->id_tagihan)->first(); //mengambil data tagihan siswa berdasarkan id
            $kategori_tagihan = Kategori_Tagihan::where('id', $tagihan_siswa['id_kategori_tagihan'])->first(); //mengambil data kategori tagihan berdasarkan id
            $row['id'] = $p->id_invoice;
            $row['nama'] = $kategori_tagihan->nama_kategori;
            $row['nominal'] = $kategori_tagihan->nominal;
            array_push($data, $row);
        }
        $dimmasoke = [];
        $rinciancreate = [
            'id_pembayaran' => $emp->id_pembayaran,
            'id_invoice' => 1,
            'tanggal_pembayaran' => $emp->tanggal_pembayaran,
            'nominal_pembayaran' => $fee->fee,
            'metode_pembayaran' => 'Fee Transaksi',
        ];

        $aduh = Rincian_Pembayaran::create($rinciancreate); //create data rincian pembayaran
        array_push($tampung_total, $aduh->nominal_pembayaran); //total pembayaran
        array_push($dimmasoke, $rinciancreate);
        // }
        $total = array_sum($tampung_total);

        $update = [
            'total_pembayaran' => $total,
            'siswa_id' => $get_siswa_id->id_siswa,
            'status' => 'paid',
        ];
        $pembayaran_update = Pembayaran::where('id_pembayaran', $emp->id_pembayaran)->update($update); //update data pembayaran berdasarnya id pembayaran
        $cek = CekTotal::where('id_user', Auth::user()->id)->get();
        foreach ($cek as $p) {
            CekTotal::where('id', $p->id)->delete(); //delete keranjang berdasarkan id
        }
        return back();
    }

    public function pembayaranadmin(Request $request)
    {
        //pembayaran admin
        $fee = Setting::first(); //mengambil data setting
        $id_invoice = Invoice_Tagihan::where('id_invoice', $request->id_invoice)->first(); //mengambil data tagihan berdasarkan id invoice
        if ($id_invoice->status === 'unpaid') { //kondisi jika status unpaid
            $pembayaran_last = Pembayaran::latest('created_at')->first(); //mengambil data pembayaran terakhir
            if ($pembayaran_last != null) {
                $nopo = substr($pembayaran_last, 4, 5);
                $no_po = intval($nopo);
                do {
                    $number = 'PEM-' . str_pad(($no_po++ + 1), 5, "0", STR_PAD_LEFT) . '-' . $this->getRomawi(date('n')) . '-' . date('Y');
                } while ($pembayaran_last->where('id_pembayaran', $number)->exists());
            } else {
                $number = 'PEM-00001' . '-' . $this->getRomawi(date('n')) . '-' . date('Y');
            }

            $tanggalini = Carbon::now()->Format('Y-m-d');
            $empData = [
                'id_tahun_ajaran' => $fee->id_tahun_ajaran,
                'id_pembayaran' => $number,
                'tanggal_pembayaran' => $tanggalini,
                'metode_pembayaran' => 'metode_pembayaran',
                'status' => 'paid'
            ];
            $emp = Pembayaran::create($empData); //create data pembayaran

            $rinciancreate = [
                'id_pembayaran' => $emp->id_pembayaran,
                'id_invoice' => $id_invoice->id_invoice,
                'tanggal_pembayaran' => $emp->tanggal_pembayaran,
                'nominal_pembayaran' => $id_invoice->nominal,
                'metode_pembayaran' => $emp->metode_pembayaran,
            ];
            $rincian = Rincian_Pembayaran::create($rinciancreate); //create data rincian pembayaran
            $rinciancreate = [
                'id_pembayaran' => $emp->id_pembayaran,
                'id_invoice' => 1,
                'tanggal_pembayaran' => $emp->tanggal_pembayaran,
                'nominal_pembayaran' => $fee->fee,
                'metode_pembayaran' => 'Fee Transaksi',
            ];

            $aduh = Rincian_Pembayaran::create($rinciancreate); // create data rincian pembayaran fee
            $total = $rincian->nominal_pembayaran + $aduh->nominal_pembayaran; //total pembayaran
            $update = [
                'total_pembayaran' => $total,
                'siswa_id' => $id_invoice->id_siswa,
                'status' => 'paid',
            ];
            $id_invoice->update(['status' => 'paid']); //update status menjadi paid
            $pembayaran_update = Pembayaran::where('id_pembayaran', $emp->id_pembayaran)->update($update); //update status pembayaran berdasarkan id pembayaran
            return back()->with('pembayaranberhasiladmin', 'd');
        } else {
            return back()->with('pembayarangagaladmin', 'd');
        }
    }

    public function pembayaranadminmassal(Request $request, $id)
    {
        //pembayaran tagihan langsung banyak
        $tes = [];
        $fee = Setting::first(); //mengambil data setting
        $cektotal = CekTotal::where('id_user', $id)->get(); //mengambil data keranjang tagihan
        foreach ($cektotal as $key => $value) {
            $url['id_invoice'] = $value->id_invoice;
            array_push($tes, $url);
        }
        $pembayaran_last = Pembayaran::latest('created_at')->first(); //mengambil data pembayarann terakhir
        if ($pembayaran_last != null) {
            $nopo = substr($pembayaran_last, 4, 5);
            $no_po = intval($nopo);
            do {
                $number = 'PEM-' . str_pad(($no_po++ + 1), 5, "0", STR_PAD_LEFT) . '-' . $this->getRomawi(date('n')) . '-' . date('Y');
            } while ($pembayaran_last->where('id_pembayaran', $number)->exists());
        } else {
            $number = 'PEM-00001' . '-' . $this->getRomawi(date('n')) . '-' . date('Y');
        }
        $tanggalini = Carbon::now()->Format('Y-m-d');
        $empData = [
            'id_tahun_ajaran' => $fee->id_tahun_ajaran,
            'id_pembayaran' => $number,
            'tanggal_pembayaran' => $tanggalini,
            'metode_pembayaran' => 'metode_pembayaran',
            'status' => 'paid'
        ];
        $emp = Pembayaran::create($empData); //create data pembayaran


        $tampung_total = [];
        $tampung_rincian = [];
        foreach ($cektotal as $key => $value) {
            $invoice = Invoice_Tagihan::where('id_invoice', $value->id_invoice)->first();
            $invoice->update(['status' => 'paid']);
            $tagihan_siswa = Tagihan_Siswa::where('id', $invoice->id_tagihan)->first();
            $kategori_tagihan = Kategori_Tagihan::where('id', $tagihan_siswa->id_kategori_tagihan)->first();
            $rinciancreate = [
                'id_pembayaran' => $emp->id_pembayaran,
                'id_invoice' => $value->id_invoice,
                'tanggal_pembayaran' => $emp->tanggal_pembayaran,
                'nominal_pembayaran' => $kategori_tagihan->nominal,
                'metode_pembayaran' => $emp->metode_pembayaran,
            ];
            $rincian = Rincian_Pembayaran::create($rinciancreate); //create data rincian pembayaran


            $get_siswa_id = Invoice_Tagihan::where('id_invoice', $value->id_invoice)->first(); //mengambil data tagihan

            array_push($tampung_total, $rincian->nominal_pembayaran);
            array_push($tampung_rincian, $rincian);
        }

        $data = [];
        foreach ($tampung_rincian as $p) {
            $invoice_2 = Invoice_Tagihan::where('id_invoice', $p['id_invoice'])->first(); //mengambil data tagihan berdasarkan id invoice
            $tagihan_siswa = Tagihan_Siswa::where('id', $invoice_2->id_tagihan)->first(); //mengambil data tagihan siswa berdasarkan id
            $kategori_tagihan = Kategori_Tagihan::where('id', $tagihan_siswa['id_kategori_tagihan'])->first(); //mengambil data kategor tagihan berdasarkan id
            $row['id'] = $p->id_invoice;
            $row['nama'] = $kategori_tagihan->nama_kategori;
            $row['nominal'] = $kategori_tagihan->nominal;
            array_push($data, $row);
        }
        $dimmasoke = [];
        $rinciancreate = [
            'id_pembayaran' => $emp->id_pembayaran,
            'id_invoice' => 1,
            'tanggal_pembayaran' => $emp->tanggal_pembayaran,
            'nominal_pembayaran' => $fee->fee,
            'metode_pembayaran' => 'Fee Transaksi',
        ];

        $aduh = Rincian_Pembayaran::create($rinciancreate); //create data rincian pembayaran
        array_push($tampung_total, $aduh->nominal_pembayaran); //menampung sumua nominal item
        array_push($dimmasoke, $rinciancreate);
        $total = array_sum($tampung_total);

        $update = [
            'total_pembayaran' => $total,
            'siswa_id' => $get_siswa_id->id_siswa,
            'status' => 'paid',
        ];
        $pembayaran_update = Pembayaran::where('id_pembayaran', $emp->id_pembayaran)->update($update); //update data pembayaran berdasarkan id pembayaran
        $cek = CekTotal::where('id_user', $id)->get(); //mengambil data keranjang berdasarkan id user
        foreach ($cek as $p) {
            CekTotal::where('id', $p->id)->delete(); //mengambil data keranjang tagihan
        }
        return back()->with('pembayaranberhasiladmin', 'd');
    }

    public function infotagihan($id)
    {
        // edit kategori tagihan ajax
        $product = Kategori_Tagihan::findOrFail($id); //mengambil data kategori tagihan berdasarkan id
        return response()->json($product, 200);
    }

    public function index(Request $request)
    {
        //menampilkan data tagihan siswa
        $jenjang = (int)$request->jenjang_pendidikan_id;
        $tahun = Setting::first()->id_tahun_ajaran;
        $kelas = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjang) {
            $q->where('jenjang_pendidikan_id', $jenjang);
        })->get(); // mengambil data kelas berdasarkan tahun ajaran yang berlaku dan berdasarkan jenjang pendidikan id
        $Kategori_tagihan  = Tagihan_Siswa::all(); //mengambil data tagihan siswa
        return view('tagihan_siswa.index', compact('Kategori_tagihan', 'jenjang', 'kelas'));
    }

    public function create(Request $request)
    {
        //halaman membuat tagihan siswa
        $jenjang = (int)$request->jenjang_pendidikan_id;
        $Kategori_tagihan = Kategori_Tagihan::all();
        $date = Carbon::now();
        return view('tagihan_siswa.create', compact('Kategori_tagihan', 'date', 'jenjang'));
    }

    public function all($jenjang_id)
    {
        //menampilkan data tagihan siswa
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $emps = Invoice_Tagihan::whereHas('kelas', function ($q) use ($tahun, $jenjang_id) {
            $q->where('id_tahun_ajaran', $tahun)
                ->whereHas('kelas', function ($qu) use ($jenjang_id) {
                    $qu->where('jenjang_pendidikan_id', $jenjang_id);
                });
        })->where('status', 'unpaid')->get(); //mengambil data tagihan berdasarkan tahun ajaran yang berlangsung dan berdasarkan status unpaid
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Kategori Tagihan</th>
                <th>Deskripsi</th>
                <th>tanggal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
								<td>' . $emp->id . '</td>
					<td>' . $emp->kategori_tagihan->kategori_tagihan->nama_kategori . '</td>
                <td>' . $emp->kategori_tagihan->deskripsi . '</td>
                <td>' . $emp->kategori_tagihan->tanggal . '</td>
                <td>
                  <a href="#" id="' . $emp->kategori_tagihan->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editTUModal"><i class="ion-edit h4" data-pack="default" data-tags="on, off"></i></a>
                  <a href="' . url('detail-tagihan-daftar-siswa/' . $emp->kategori_tagihan->id) . '" class="text-info mx-1"><i class="ion-eye"></i></a>
                  <a href="#" id="' . $emp->kategori_tagihan->id . '" class="text-danger mx-1 deleteIcon"><i class="ion-trash-a h4" data-pack="default" data-tags="on, off"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }


    public function store(Request $request)
    {
        //proses pendistribusian tagihan ke siswa
        $jenjangpendidikanid = (int)$request->jenjang_pendidikan_id;
        $tahun = Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
        $kelas = Kelas::where('id_tahun_ajaran', $tahun)->whereHas('kelas', function ($q) use ($jenjangpendidikanid) {
            $q->where('jenjang_pendidikan_id', $jenjangpendidikanid);
        })->select('id')->groupBy('id')->get(); //mengambil data kelas berdasarkan tahun ajaran yaang berlangsung dan berdasarkan jenjang
        $DataSiswa = [];
        foreach ($kelas as $kel) {
            $siswa = Siswa::where('kelas', $kel->id)->get(); //mengambil data siswa berdasarkan kelas id
            array_push($DataSiswa, $siswa);
        }
        foreach ($DataSiswa as $data) {
            foreach ($data as $pe) {
                $pembayaran_last = Invoice_Tagihan::latest('created_at')->first(); //mengambil data tagihan berdasarkan data terakhir
                if ($pembayaran_last != null) { //kondisi jika data tidak kosong
                    $nopo = substr($pembayaran_last, 4, 5);
                    $no_po = intval($nopo);
                    do {
                        $number = 'INV-' . str_pad(($no_po++ + 1), 5, "0", STR_PAD_LEFT) . '-' . $this->getRomawi(date('n')) . '-' . date('Y');
                    } while ($pembayaran_last->where('id_invoice', $number)->exists());
                } else {
                    $number = 'INV-00001' . '-' . $this->getRomawi(date('n')) . '-' . date('Y');
                }

                $empData = [
                    'id_kategori_tagihan' => $request->id_kategori_tagihan,
                    'deskripsi' => $request->deskripsi,
                    'tanggal' => $request->tanggal,
                    'batas_bayar' => $request->batas_bayar,
                    'kategori_cicilan' => $request->kategori_cicilan,
                    'minimum_bayar' => $request->minimum_bayar
                ];
                $emp = Tagihan_Siswa::create($empData); //create tgihan siswa
                $invoice = [
                    'id_tagihan' => $emp->id,
                    'id_invoice' => $number,
                    'id_siswa' => $pe->id,
                    'nominal' => $request->nominal,
                    'kelas_id' => $pe->kelas,
                    'status' => "unpaid"
                ];
                Invoice_Tagihan::create($invoice); //create tagihan
            }
        }
        return back()->with('success');
    }

    public function TestingApi(Request $request)
    {
        //tidak dipakai
        $siswa = Siswa::where('kelas', '!=', null)->get(); //mengambil data siswa berdasarkan kelas tidak null
        foreach ($siswa as $p) {
            $pembayaran_last = Invoice_Tagihan::latest('created_at')->first(); //mengambil data tagihan berdasarkan data terakhir
            if ($pembayaran_last != null) { //kondisi jika tagihan ada
                $nopo = substr($pembayaran_last, 4, 5);
                $no_po = intval($nopo);
                do {
                    $number = 'INV-' . str_pad(($no_po++ + 1), 5, "0", STR_PAD_LEFT) . '-' . $this->getRomawi(date('n')) . '-' . date('Y');
                } while ($pembayaran_last->where('id_invoice', $number)->exists());
            } else {
                $number = 'INV-00001' . '-' . $this->getRomawi(date('n')) . '-' . date('Y');
            }

            $empData = [
                'id_kategori_tagihan' => $request->id_kategori_tagihan,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal,
                'batas_bayar' => $request->batas_bayar,
                'kategori_cicilan' => $request->kategori_cicilan,
                'minimum_bayar' => $request->minimum_bayar
            ];
            $emp = Tagihan_Siswa::create($empData); //create tagihan siswa
            $invoice = [
                'id_tagihan' => $emp->id,
                'id_invoice' => $number,
                'id_siswa' => $p->id,
                'nominal' => $request->nominal,
                'status' => "unpaid"
            ];
            Invoice_Tagihan::create($invoice);
        }
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function edit(Request $request)
    {
        //edit data ajax
        $id = $request->id;
        $emp = Tagihan_Siswa::with('kategori_tagihan')->find($id); //mengambil data tagihan siswa berdasarkan id
        return response()->json($emp);
    }

    public function update(Request $request)
    {
        //update data ajax
        $emp = Tagihan_Siswa::Find($request->id); //mengambil data tagihan siswa berdasarkan id

        $empData = [
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal
        ];

        $emp->update($empData); //update data
        return response()->json([
            'status' => 200,
        ]);
    }
    public function delete(Request $request)
    {
        //delete data ajax
        $id = $request->id;
        $emp = Tagihan_Siswa::find($id); //mengambil data tagihan berdasarkan id
        Invoice_Tagihan::where('id_tagihan', $emp->id)->delete(); //menghapus data tagihan berdasarkan id tagihan
        Tagihan_Siswa::destroy($emp->id); //menghapus data tagihan siswa berdasarkan id
    }



    function getRomawi($bln)
    {
        switch ($bln) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }
}
