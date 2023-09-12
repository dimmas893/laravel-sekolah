@extends('layouts.template.template')
@section('content')
    <div id="tabs">
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Tugas</h1>
                    @if (Auth::user()->role === 1)
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                            <div class="breadcrumb-item active"><a href="{{ route('manage') }}">Manage</a></div>
                            <div class="breadcrumb-item active"><a href="{{ route('manageTugas') }}">Semua kelas</a>
                            </div>
                            <div class="breadcrumb-item active"> <a href="{{ route('manageTugasMataPelajaran') }}"
                                    onclick="event.preventDefault();document.getElementById('manageTugasMataPelajaran_id').submit();">Mata
                                    Pelajaran
                                </a></div>
                            <div class="breadcrumb-item active"> <a href="{{ route('manageTugasMataPelajaran') }}"
                                    onclick="event.preventDefault();document.getElementById('manageTugasMataPelajaranguru_id').submit();">Guru
                                </a></div>
                            <div class="breadcrumb-item active"> <a href="{{ route('manageTugasMataPelajarangurujadwal') }}"
                                    onclick="event.preventDefault();document.getElementById('manageTugasMataPelajarangurujadwal_id').submit();">Kelas
                                </a></div>
                            <div class="breadcrumb-item active"> <a
                                    href="{{ route('manageTugasMataPelajarangurujadwalbuattugas') }}"
                                    onclick="event.preventDefault();document.getElementById('manageTugasMataPelajarangurujadwalbuattugas_id').submit();">Buat
                                    tugas
                                </a></div>
                            <div class="breadcrumb-item"><a class=""
                                    href="/menu/tugas/kelas-detail/admin/{{ $tugas->kelas_id }}/{{ $tugas->mata_pelajaran_id }}">Kumpulan
                                    tugas</a></div>
                            <div class="breadcrumb-item"><a href="{{ route('tugassiswaalladmin', $tugas->id) }}">Detail
                                    tugas </a></div>
                            <div class="breadcrumb-item">Detail tugas {{ $tugas->nama }}
                                {{ $siswa->nama_siswa }}</div>
                        </div>
                    @else
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                            <div class="breadcrumb-item active"><a href="{{ route('tugassiswa') }}">Tugas</a></div>
                            <div class="breadcrumb-item active"><a href="{{ route('menutugasshow') }}">Lihat tugas</a>
                            </div>
                            <div class="breadcrumb-item active"><a href="{{ route('menutugasshowkelas') }}">Kelas</a>
                            </div>
                            <div class="breadcrumb-item active"><a
                                    href="{{ route('menutugasshowkelaslihatdetaillihat', $siswa->kelas) }}">Mata
                                    pelajaran</a>
                            </div>
                            <div class="breadcrumb-item active"><a
                                    href="/menu/tugas/kelas-detail/{{ $siswa->kelas }}/{{ $tugas->mata_pelajaran_id }}">Kumpulan
                                    tugas</a>
                            </div>
                            <div class="breadcrumb-item active"><a href="{{ route('tugassiswaall', $tugas->id) }}">Detail
                                    tugas
                                    {{ $tugas->nama }}</a>
                            </div>
                            <div class="breadcrumb-item">Detail tugas {{ $tugas->nama }} {{ $siswa->nama_siswa }}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="">
                    {{-- <div class="card-header">
                        <label for="">
                            <h4>{{ $tugas->nama }}</h4>
                        </label>
                    </div> --}}
                    <div class="">
                        <div class="row">
                            {{-- @foreach ($tugas as $item) --}}
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-xl-8 col-xxl-8">
                                <div class="card shadow card-primary">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div class=""> <i class="ion-ios-paper h5"></i>
                                            {{ $kumpultugas->tugas->matapelajaran->name }} -
                                            {{-- <a href="{{ asset('file_tugas/' . $tugas->tugas->file_tugas) }}">File PDF</a> --}}

                                            <a href="#" class="text-danger mx-1" data-toggle="collapse"
                                                data-target="#filetugas">file tugas</a> - Kesempatan
                                            ({{ $kumpultugas->kesempatan }})
                                            {{-- <a href="{{ asset('file_tugas/' . $tugas->tugas->file_tugas) }}"
                                            target="_blank">Lihat Tugas</a> --}}

                                        </div>
                                        <div>
                                        </div>
                                        {{-- <div class="text-right">{{ $tugas->jadwal->id }}</div> --}}
                                    </div>
                                    <div class="card-body">
                                        <p>{{ $kumpultugas->tugas->nama }} -
                                            {{ $kumpultugas->tugas->tanggal_pengumpulan }}
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <label>Deskripsi :</label>
                                        <p>{{ $kumpultugas->tugas->deskripsi }}</p>
                                        @if ($kumpultugas->file_upload != null)
                                            {{-- <a href="{{ asset('file_tugas/' . $tugas->file_upload) }}" target="_blank">File
                                            PDF jawaban anda</a> --}}
                                            {{-- <a href="#" class="text-danger mx-1" data-toggle="modal"
                                            data-target="#pdfsiswa">Preview jawaban</a> --}}
                                            <button type="button" class="btn btn-info" data-toggle="collapse"
                                                data-target="#demo">Lihat
                                                Jawaban</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- @endforeach --}}
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 col-xl-4 col-xxl-4">
                                <div class="card shadow card-primary">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4>Form Penilaian</h4>
                                    </div>
                                    <form action="{{ route('pemberiannilaitugas') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $kumpultugas->id }}" name="kumpultugas_id">
                                        <div class="card-body">
                                            <input type="number" class="form-control" placeholder="Pemberian Nilai"
                                                value="{{ $kumpultugas->nilai_tugas ?? '' }}" name="nilai_tugas">
                                        </div>
                                        <div class="card-footer">
                                            <input type="submit" value="Beri Nilai" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div id="demo" class="collapse">
                                <div style="width: 100%; height: 100vh; overflow: hidden; overflow-y: scroll">
                                    <embed src="{{ asset('file_tugas/' . $kumpultugas->file_upload) }}" width="100%"
                                        height="100%">
                                </div>
                            </div>
                            <div id="filetugas" class="collapse">
                                <div style="width: 100%; height: 100vh; overflow: hidden; overflow-y: scroll">
                                    <embed src="{{ asset('file_tugas/' . $kumpultugas->tugas->file_tugas) }}"
                                        width="100%" height="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
