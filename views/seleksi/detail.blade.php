@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Seleksi </h1>
            </div>
            <input type="hidden" value="{{ $seleksi->jenjang }}" name="jenjang" />
            <div class="section-body">
                <div class="row mt-sm-12">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Nama</label>
                                        <input type="text" name="name" value="{{ $seleksi->nama_siswa }}"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Email</label>
                                        <input type="email" name="email" placeholder="Masukan Email"
                                            value="{{ $seleksi->email }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Jenis Kelamin</label>
                                        <input type="text" name="jenis_kelamin"
                                            value="{{ $seleksi->jenis_kelamin ?: '' }}" placeholder="Masukan Jenis Kelamin"
                                            class="form-control" />
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" value="{{ $seleksi->tempat_lahir }}"
                                            placeholder="Masukan Tempat Lahir" class="form-control" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" placeholder="Masukan Tgl Lahir"
                                            value="{{ $seleksi->tgl_lahir }}" class="form-control" />
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label>Asal Sekolah</label>
                                        <input type="asal_sekolah" name="asal_sekolah" value="{{ $seleksi->asal_sekolah }}"
                                            placeholder="Masukan Asal Sekolah" class="form-control" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Alamat</label>
                                        <textarea type="text" name="alamat" placeholder="Masukan Alamat" value="{{ $seleksi->alamat ?? '' }}"
                                            class="form-control">{{ $seleksi->alamat ?: 'dsds' }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Jurusan</label>
                                        <input type="text" name="jurusan" value="{{ $seleksi->jurusan }}"
                                            placeholder="Masukan Jurusan" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Riwayat Seleksi</div>
                    {{-- @foreach ($riwayat as $item) --}}
                    <div class="card-body">
                        <p>-{{ $seleksi->tanggalseleksi ?? '' }} Mendapat nilai {{ $seleksi->nilai }}
                            {{ $seleksi->hasil }}</p>
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        </section>
    </div>
@endsection
