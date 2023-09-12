<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Tagihan;
use Illuminate\Http\Request;

class Kategori_TagihanController extends Controller
{
    // set index page view
    public function index()
    {
        return view('kategori_tagihan.index');
    }

    // handle fetch all eamployees ajax request
    public function all()
    {
        //menampilkan data kategori tagihan ajax
        $emps = Kategori_Tagihan::all(); //mengambil data kategori tagihan
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kategori Tagihan</th>
                <th>Nominal</th>
                <th>Deskripsi</th>
                <th>Batas Bayar</th>
                <th>kategori Cicilan</th>
                <th>Minimum Bayar</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->nama_kategori . '</td>
                <td>' . $emp->nominal . '</td>
                <td>' . $emp->deskripsi . '</td>
                <td>' . $emp->batas_bayar . '</td>
                <td>' . $emp->kategori_cicilan . '</td>
                <td>' . $emp->minimum_bayar . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editTUModal"><i class="ion-edit h4" data-pack="default" data-tags="on, off"></i></a>
                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="ion-trash-a h4" data-pack="default" data-tags="on, off"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    // handle insert a new Tu ajax request
    public function store(Request $request)
    {
        //menambah data
        $empData = [
            'nama_kategori' => $request->nama_kategori,
            'nominal' => $request->nominal,
            'deskripsi' => $request->deskripsi,
            'batas_bayar' => $request->batas_bayar,
            'kategori_cicilan' => $request->kategori_cicilan,
            'minimum_bayar' => $request->minimum_bayar
        ];

        Kategori_Tagihan::create($empData); //tambah data
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        //edit data
        $id = $request->id;
        $emp = Kategori_Tagihan::find($id); //mengambil data kategori tagihan berdasarkan id
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        //update
        $emp = Kategori_Tagihan::Find($request->id); //mengambil data kategori tagihan berdasarkan id

        $empData = [
            'nama_kategori' => $request->nama_kategori,
            'nominal' => $request->nominal,
            'deskripsi' => $request->deskripsi,
            'batas_bayar' => $request->batas_bayar,
            'kategori_cicilan' => $request->kategori_cicilan,
            'minimum_bayar' => $request->minimum_bayar
        ];

        $emp->update($empData); //update data
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        //delete
        $id = $request->id;
        Kategori_Tagihan::destroy($id); //delete data
    }
}
