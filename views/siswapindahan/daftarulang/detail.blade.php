@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Daftar Ulang Siswa Pindahan</h1>
                <div class="section-header-breadcrumb">
                </div>
            </div>
            <form action="{{ route('konfirmasi-daftar-ulang-post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $pendaftaran->id }}">
                <div class="section-body">
                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nis</label>
                                            <input type="number" disabled value="{{ $pendaftaran->nis }}"
                                                placeholder="Masukan Nis" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nisn</label>
                                            <input type="number" disabled value="{{ $pendaftaran->nisn }}"
                                                placeholder="Masukan Nisn" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nama Siswa</label>
                                            <input type="text" disabled value="{{ $pendaftaran->nama_siswa }}"
                                                placeholder="Masukan Nama" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Tempat Lahir</label>
                                            <input type="text" disabled value="{{ $pendaftaran->tempat_lahir }}"
                                                placeholder="Masukan Tempat Lahir" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" disabled value="{{ $pendaftaran->tgl_lahir }}"
                                                placeholder="Masukan Tanggal Lahir" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Jenis Kelamin</label>
                                            <select disabled class="form-control">
                                                @if ($pendaftaran->jenis_kelamin == 'L')
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
                                            <select disabled class="form-control">
                                                @if ($pendaftaran->agama)
                                                    <option value="">---Pilih Agama---</option>
                                                    <option value="{{ $pendaftaran->agama }}" selected disabled>
                                                        {{ $pendaftaran->agama }}</option>
                                                    <option value="Kristen">Kristen</option>
                                                @else
                                                    <option value="" selected disabled>---Pilih Agama---</option>
                                                    <option value="islam">Islam</option>
                                                    <option value="kristen">Kristen</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>email</label>
                                            <input disabled type="email" value="{{ $pendaftaran->email }}"
                                                placeholder="Masukan email" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>No Telepon</label>
                                            <input disabled type="number" value="{{ $pendaftaran->telp }}"
                                                placeholder="Masukan No Telepon" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Asal Sekolah</label>
                                            <input disabled type="text" value="{{ $pendaftaran->asal_sekolah }}"
                                                placeholder="Masukan Asal Sekolah" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Kelas</label>
                                            <input disabled type="number" value="{{ $pendaftaran->tingkat }}"
                                                placeholder="Masukan Kelas" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Jurusan</label>
                                            <input disabled type="text" value="{{ $pendaftaran->jurusan }}"
                                                placeholder="Masukan Jurusan" class="form-control" />
                                            <p style="color:red">*Kosongkan jika tidak ada</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Alamat</label>
                                            <textarea disabled class="form-control">{{ $pendaftaran->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h4>Biodata Orang Tua</h4>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nama Bapak</label>
                                            <input type="text" value="{{ $pendaftaran->nama_bapak }}"
                                                placeholder="Masukan Nama" disabled class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Pekerjaan Bapak</label>
                                            <input type="text" value="{{ $pendaftaran->pekerjaan_bapak }}"
                                                name="pekerjaan_bapak" disabled placeholder="Masukan Pekerjaan"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Penghasilan Bapak /bulan</label>
                                            <input type="number" disabled value="{{ $pendaftaran->penghasilan_bapak }}"
                                                placeholder="Masukan Penghasilan" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Agama</label>
                                            <select disabled class="form-control">
                                                @if ($pendaftaran->agama_bapak)
                                                    <option value="">---Pilih Agama---</option>
                                                    <option value="{{ $pendaftaran->agama_bapak }}" selected disabled>
                                                        {{ $pendaftaran->agama_bapak }}</option>
                                                    <option value="Kristen">Kristen</option>
                                                @else
                                                    <option value="" selected disabled>---Pilih Agama---</option>
                                                    <option value="islam">Islam</option>
                                                    <option value="kristen">Kristen</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>No Telepon</label>
                                            <input type="number" disabled value="{{ $pendaftaran->no_telp_bapak }}"
                                                placeholder="Masukan Nomor Telepon" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Email</label>
                                            <input type="email" disabled value="{{ $pendaftaran->email_bapak }}"
                                                placeholder="Masukan email" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nama Ibu</label>
                                            <input type="text" value="{{ $pendaftaran->nama_ibu }}"
                                                placeholder="Masukan Nama" disabled class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Pekerjaan Ibu</label>
                                            <input type="text" value="{{ $pendaftaran->pekerjaan_ibu }}"
                                                name="pekerjaan_ibu" disabled placeholder="Masukan Pekerjaan"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Penghasilan Ibu /bulan</label>
                                            <input type="number" disabled value="{{ $pendaftaran->penghasilan_ibu }}"
                                                placeholder="Masukan Penghasilan" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Agama</label>
                                            <select disabled class="form-control">
                                                @if ($pendaftaran->agama_ibu)
                                                    <option value="">---Pilih Agama---</option>
                                                    <option value="{{ $pendaftaran->agama_ibu }}" selected disabled>
                                                        {{ $pendaftaran->agama_ibu }}</option>
                                                    <option value="Kristen">Kristen</option>
                                                @else
                                                    <option value="" selected disabled>---Pilih Agama---</option>
                                                    <option value="islam">Islam</option>
                                                    <option value="kristen">Kristen</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>No Telepon</label>
                                            <input type="number" disabled value="{{ $pendaftaran->no_telp_ibu }}"
                                                placeholder="Masukan Penghasilan" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>email</label>
                                            <input type="email" disabled value="{{ $pendaftaran->email_ibu }}"
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
