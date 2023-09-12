@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Daftar Ulang Siswa Baru</h1>
                <div class="section-header-breadcrumb">
                </div>
            </div>
            <form action="{{ route('daftarulangsiswabarukonfirmasisiswabaru') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $seleksi->id }}">
                <input type="hidden" name="jenjang_pendidikan_id" value="{{ $seleksi->jenjang }}">
                <input type="hidden" name="tingkat" value="{{ $seleksi->tingkat }}">
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nis</label>
                                            <input type="number" name="nomor_induk_siswa" placeholder="Masukan Nis"
                                                class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nisn</label>
                                            <input type="number" name="nisn" placeholder="Masukan Nisn"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nama Siswa</label>
                                            <input type="text" name="nama_siswa" value="{{ $seleksi->nama_siswa }}"
                                                placeholder="Masukan Nama" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" value="{{ $seleksi->tempat_lahir }}"
                                                placeholder="Masukan Tempat Lahir" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" value="{{ $seleksi->tgl_lahir }}"
                                                placeholder="Masukan Tanggal Lahir" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control">
                                                @if ($seleksi->jenis_kelamin == 'L')
                                                    <option value="L" selected>Laki - Laki</option>
                                                    <option value="P">Perempuan</option>
                                                @else
                                                    <option value="L">Laki - Laki</option>
                                                    <option value="P" selected>Perempuan</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Agama</label>
                                            <select name="agama" class="form-control">
                                                @if ($seleksi->agama)
                                                    <option value="">---Pilih Agama---</option>
                                                    <option value="{{ $seleksi->agama }}" selected>
                                                        {{ $seleksi->agama }}</option>
                                                    <option value="Kristen">Kristen</option>
                                                @else
                                                    <option value="" selected>---Pilih Agama---</option>
                                                    <option value="islam">Islam</option>
                                                    <option value="kristen">Kristen</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>email</label>
                                            <input type="email" name="email" value="{{ $seleksi->email }}"
                                                placeholder="Masukan email" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>No Telepon</label>
                                            <input type="number" name="telp" value="{{ $seleksi->no_telp }}"
                                                placeholder="Masukan No Telepon" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Asal Sekolah</label>
                                            <input type="text" name="asal_sekolah" value="{{ $seleksi->asal_sekolah }}"
                                                placeholder="Masukan Asal Sekolah" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Kelas</label>
                                            <input type="number" name="tingkat" value="{{ $seleksi->tingkat }}"
                                                placeholder="Masukan Kelas" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Jurusan</label>
                                            <input type="text" name="jurusan" value="{{ $seleksi->jurusan }}"
                                                placeholder="Masukan Jurusan" class="form-control" />
                                            <p style="color:red">*Kosongkan jika tidak ada</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat">{{ $seleksi->alamat ?? 'Masukan Alamat' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h4>Biodata Orang Tua</h4>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nama Bapak</label>
                                            <input type="text" name="nama_bapak" value="{{ $seleksi->nama_bapak }}"
                                                placeholder="Masukan Nama" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Pekerjaan Bapak</label>
                                            <input type="text" name="pekerjaan_bapak"
                                                value="{{ $seleksi->pekerjaan_bapak }}" name="pekerjaan_bapak"
                                                placeholder="Masukan Pekerjaan" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Penghasilan Bapak /bulan</label>
                                            <input type="number" name="penghasilan_bapak"
                                                value="{{ $seleksi->penghasilan_bapak }}"
                                                placeholder="Masukan Penghasilan" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Agama</label>
                                            <select name="agama_bapak" class="form-control">
                                                @if ($seleksi->agama_bapak)
                                                    <option value="">---Pilih Agama---</option>
                                                    <option value="{{ $seleksi->agama_bapak }}" selected>
                                                        {{ $seleksi->agama_bapak }}</option>
                                                    <option value="Kristen">Kristen</option>
                                                @else
                                                    <option value="" selected>---Pilih Agama---</option>
                                                    <option value="islam">Islam</option>
                                                    <option value="kristen">Kristen</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>No Telepon</label>
                                            <input type="number" name="no_telp_bapak"
                                                value="{{ $seleksi->no_telp_bapak }}" placeholder="Masukan Nomor Telepon"
                                                class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Email</label>
                                            <input type="email" name="email_bapak" value="{{ $seleksi->email_bapak }}"
                                                placeholder="Masukan email" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nama Ibu</label>
                                            <input type="text" name="nama_ibu" value="{{ $seleksi->nama_ibu }}"
                                                placeholder="Masukan Nama" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Pekerjaan Ibu</label>
                                            <input type="text" name="pekerjaan_ibu"
                                                value="{{ $seleksi->pekerjaan_ibu }}" name="pekerjaan_ibu"
                                                placeholder="Masukan Pekerjaan" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Penghasilan Ibu /bulan</label>
                                            <input type="number" name="penghasilan_ibu"
                                                value="{{ $seleksi->penghasilan_ibu }}" placeholder="Masukan Penghasilan"
                                                class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Agama</label>
                                            <select name="agama_ibu" class="form-control">
                                                @if ($seleksi->agama_ibu)
                                                    <option value="">---Pilih Agama---</option>
                                                    <option value="{{ $seleksi->agama_ibu }}" selected>
                                                        {{ $seleksi->agama_ibu }}</option>
                                                    <option value="Kristen">Kristen</option>
                                                @else
                                                    <option value="" selected>---Pilih Agama---</option>
                                                    <option value="islam">Islam</option>
                                                    <option value="kristen">Kristen</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>No Telepon</label>
                                            <input type="number" name="no_telp_ibu" value="{{ $seleksi->no_telp_ibu }}"
                                                placeholder="Masukan Penghasilan" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>email</label>
                                            <input type="email" name="email_ibu" value="{{ $seleksi->email_ibu }}"
                                                placeholder="Masukan email" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Konfirmasi daftar ulang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
