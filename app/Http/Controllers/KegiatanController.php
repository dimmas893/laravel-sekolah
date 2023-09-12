<?php

namespace App\Http\Controllers;

use App\Models\Gambar_Kegiatan;
use App\Models\Kegiatan;
use App\Models\Lampiran_Kegiatans;
use Illuminate\Http\Request;
use Str;
use File;

class KegiatanController extends Controller
{
    // set index page view
    public function index()
    {
        return view('kegiatan.index');
    }

    public function detail($id)
    {
        // detail kegiatan
        $kegiatan = Kegiatan::where('id', $id)->first(); //mengambil data kegiatan berdasarkan id
        $gambarkegiatan = Gambar_Kegiatan::where('kegiatan_id', $kegiatan->id)->get(); //mengambil data gambar kategorii berdasarkan keegiatan id
        $lampirankegiatan = Lampiran_Kegiatans::where('kegiatan_id', $kegiatan->id)->get(); //mengambil data lampiran berdasarkan kegiatan id
        return view('kegiatan.detail', compact('kegiatan', 'lampirankegiatan', 'gambarkegiatan'));
    }

    // handle fetch all eamployees ajax request
    public function all()
    {
        //menamplkan semua data kegiatan
        $emps = Kegiatan::get(); //mengambil data kegiatan
        $output = '';
        $p = 1;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kegiatan</th>
                <th>Deskripsi Kegiatan</th>
                <th>Tanggal Kegiatan</th>
                <th>Jam Mulai Kegiatan</th>
                <th>Jam Berakhir Kegiatan</th>
                <th>Status Kegiatan</th>
                <th>foto Kegiatan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $gambar = Gambar_Kegiatan::where('kegiatan_id', $emp->id)->first();
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->nama_kegiatan . '</td>
                <td>' . $emp->deskripsi . '</td>
                <td>' . $emp->tanggal . '</td>
                <td>' . $emp->jam_mulai . '</td>
                <td>' . $emp->jam_berakhir . '</td>
                <td>' . $emp->status . '</td>
                <td><img src="/kegiatan/' . $gambar->gambar . '" width="50" class="img-thumbnail rounded-circle"></td>
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
            'nama_kegiatan' => $request->nama_kegiatan,
            'status' => $request->status,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_berakhir' => $request->jam_berakhir,
            'deskripsi' => $request->deskripsi,
            'catatan' => $request->catatan,
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'jenis_kontak' => $request->jenis_kontak,
        ];

        $kegiatan = Kegiatan::create($empData); //tambah data


        if (isset($request['filenames'])) { //kondisi jika request filenames ada
            foreach ($request['filenames'] as $gambar) {
                $fotoFile = null;
                $file = $gambar;
                $file_extension = $file->getClientOriginalExtension();
                $lokasiFile = public_path() . '/' . 'kegiatan';
                $this->fotoFile = 'foto-kegiatan-' . Str::random(5) . '.' . $file_extension;
                $gambar->move($lokasiFile, $this->fotoFile);
                $fotoFile = $this->fotoFile;
                Gambar_Kegiatan::create([
                    'kegiatan_id' => $kegiatan->id,
                    'gambar' => $fotoFile
                ]); //tambah data gambar
            }
        }

        if (isset($request['lampiran'])) {  //kondisi jika request lampiran ada
            foreach ($request['lampiran'] as $index => $gambar) {
                $lampirandata = null;
                $file = $gambar;
                $file_extension = $file->getClientOriginalExtension();
                $lokasiFile = public_path() . '/' . 'kegiatan';
                $this->lampirandata = 'foto-lampiran-' . Str::random(5) . '.' . $file_extension;
                $gambar->move($lokasiFile, $this->lampirandata);
                $lampirandata = $this->lampirandata;
                Lampiran_Kegiatans::create([
                    'kegiatan_id' => $kegiatan->id,
                    'nama' => $request['namalampiran'][$index],
                    'lampiran_kegiatan' => $lampirandata
                ]); //tambah data lampiran
            }
        }
        return response()->json([
            'status' => 200
        ]);
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        //edit data
        $id = $request->id;
        $emp = Kegiatan::find($id); //mengambil data kegiatan berdasarkan id
        $Gambar_Kegiatan = Gambar_Kegiatan::where('kegiatan_id', $emp->id)->get(); //mengambil data gambar kegiatan berdasarkan kegiatan id
        $lampiran = Lampiran_Kegiatans::where('kegiatan_id', $emp->id)->get(); //mengambil data lampiran kegiatan berdasarkan kegiatan id
        return response()->json([
            'emp' => $emp,
            'gambar' => $Gambar_Kegiatan,
            'lampiran' => $lampiran
        ]);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        //update data
        $emp = Kegiatan::Find($request->id); //mengambil data kegiatan berdasarkan id
        $empData = [
            'nama_kegiatan' => $request->nama_kegiatan,
            'status' => $request->status,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_berakhir' => $request->jam_berakhir,
            'deskripsi' => $request->deskripsi,
            'catatan' => $request->catatan,
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'jenis_kontak' => $request->jenis_kontak,
        ];
        if (isset($request['filenames'])) { //kondisi jika ada request filenames
            foreach ($request['filenames'] as $gambar) {
                $fotoFile = null;
                $file = $gambar;
                $file_extension = $file->getClientOriginalExtension();
                $lokasiFile = public_path() . '/' . 'kegiatan';
                $this->fotoFile = 'foto-kegiatan-' . Str::random(5) . '.' . $file_extension;
                $gambar->move($lokasiFile, $this->fotoFile);
                $fotoFile = $this->fotoFile;
                Gambar_Kegiatan::create([
                    'kegiatan_id' => $emp->id,
                    'gambar' => $fotoFile
                ]); //tambah gambar
            }
        }

        if (isset($request['lampiran'])) { //kondisi jika ada request lampiran
            foreach ($request['lampiran'] as $index => $gambar) {
                // dd($request['filenames']);
                $lampirandata = null;
                $file = $gambar;
                $file_extension = $file->getClientOriginalExtension();
                $lokasiFile = public_path() . '/' . 'kegiatan';
                $this->lampirandata = 'foto-lampiran-' . Str::random(5) . '.' . $file_extension;
                $gambar->move($lokasiFile, $this->lampirandata);
                $lampirandata = $this->lampirandata;
                Lampiran_Kegiatans::create([
                    'kegiatan_id' => $emp->id,
                    'nama' => $request['namalampiran'][$index],
                    'lampiran_kegiatan' => $lampirandata
                ]); //tambah lampiran
            }
        }
        if (isset($request['hapusgambar'])) { //kondisi jika ada request hapusgambar
            foreach ($request['hapusgambar'] as $index => $gambar) {
                $kegiatan = Gambar_Kegiatan::where('id', $gambar)->first();
                // dd($kegiatan);
                if (File::delete(public_path('/kegiatan/' . $kegiatan->gambar))) {
                    Gambar_Kegiatan::destroy($gambar); //delete data
                } else {
                    Gambar_Kegiatan::destroy($gambar); //delete data
                }
            }
        }
        if (isset($request['hapuslampiran'])) { //kondisi jika ada request hapuslampiran
            foreach ($request['hapuslampiran'] as $index => $gambar) {
                $kegiatan = Lampiran_Kegiatans::where('id', $gambar)->first();
                // dd($kegiatan);
                if (File::delete(public_path('/kegiatan/' . $kegiatan->lampiran_kegiatan))) {
                    Lampiran_Kegiatans::destroy($gambar); //delete data
                } else {
                    Lampiran_Kegiatans::destroy($gambar); //delete data
                }
            }
        }

        $gambar = Gambar_Kegiatan::where('kegiatan_id', $emp->id)->get(); //mengambil data gambar sesuai kegiatan id
        $lampiran = Lampiran_Kegiatans::where('kegiatan_id', $emp->id)->get(); //mengambil data lampiran sesuai kegiatan id

        $emp->update($empData); //update data
        return response()->json([
            'status' => 200,
            'gambar' => $gambar,
            'lampiran' => $lampiran
        ]);
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        $id = $request->id;
        $emp = Kegiatan::find($id); //mengambil data kegiatan berdasarkan id
        $gambar = Gambar_Kegiatan::where('kegiatan_id', $emp->get()); //mengambil data gambar berdasarkan kegiatan id
        foreach ($gambar as $gam) {
            Gambar_Kegiatan::where('id', $gam->id)->delete();
        }
        Kegiatan::destroy($id); //delete data
    }

    public function deletegambarkegiatan(Request $request)
    {
        //delete gambar
        $id = $request->id;
        $emp = Gambar_Kegiatan::find($id); //mengambil data gambar kegiatan berdasarkan id
        $kegiatan = Kegiatan::where('id', $emp->kegiatan_id)->first(); //mengambil data kegiatan berdasarkan id
        if (File::delete(public_path('/kegiatan/' . $emp->gambar))) {
            Gambar_Kegiatan::destroy($id); //delete data
        } else {
            Gambar_Kegiatan::destroy($id); //delete data
        }

        $gambar = Gambar_Kegiatan::where('kegiatan_id', $kegiatan->id)->get(); //mengambil data gambar kegiatan berdasarkan kegiatan id
        return response()->json($gambar);
    }

    public function deletegambarkegiatanlampiran(Request $request)
    {
        // delete lampiran kegiatan
        $id = $request->id;
        $emp = Lampiran_Kegiatans::find($id); //mengambil data lampiran kegiatan berdasarkan id
        $kegiatan = Kegiatan::where('id', $emp->kegiatan_id)->first(); //mengambil data kegiatan berdasarkan id
        if (File::delete(public_path('/kegiatan/' . $emp->lampiran_kegiatan))) {
            Lampiran_Kegiatans::destroy($id); //delete data
        } else {
            Lampiran_Kegiatans::destroy($id); //delete data
        }

        $gambar = Lampiran_Kegiatans::where('kegiatan_id', $kegiatan->id)->get(); //mengambil data lampiran kegiatan berdasarkan kegiatan id
        return response()->json($gambar);
    }
}
