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
                            <div class="breadcrumb-item">Detail tugas</div>
                        </div>
                    @else
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                            <div class="breadcrumb-item active"><a href="{{ route('menutugasshow') }}">Lihat tugas</a>
                            </div>
                            <div class="breadcrumb-item active"><a href="{{ route('menutugasshowkelas') }}">Kelas</a></div>
                            <div class="breadcrumb-item active"><a
                                    href="{{ route('menutugasshowkelaslihatdetaillihat', $kelas_id) }}">Mata pelajaran</a>
                            </div>
                            <div class="breadcrumb-item active"><a
                                    href="/menu/tugas/kelas-detail/{{ $kelas_id }}/{{ $tugas->mata_pelajaran_id }}">Kumpulan
                                    tugas</a>
                            </div>
                            <div class="breadcrumb-item">Detail tugas {{ $tugas->nama }}</div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    @if (count($kumpultugas) > 0)
                        @foreach ($kumpultugas as $item)
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xl-3 col-xxl-12">
                                <div class="card shadow card-primary">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div class="">
                                            {{-- <i class="ion-ios-paper h5"></i> --}}
                                            {{ $item->siswa->nama_siswa }}
                                        </div>
                                        @if ($item->file_upload === null)
                                            <p style="color:red">Belum mengerjakan</p>
                                        @else
                                            <a href="{{ route('KasihNilai', $item->id) }}" class="btn btn-primary">Cek
                                                tugas</a>
                                        @endif
                                    </div>
                                    {{-- <div class="text-right">{{ $item->jadwal->id }}</div> --}}
                                    <div class="card-body">
                                        <p>{{ $item->tugas->nama }} - {{ $item->tugas->tanggal_pengumpulan }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <label>Deskripsi :</label>
                                        <p>{{ $item->tugas->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </section>
        </div>
    </div>
@endsection
