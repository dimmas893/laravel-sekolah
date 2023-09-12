@extends('layouts.template.template')
@section('content')
    <div id="tabs">
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Tugas</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                        <div class="breadcrumb-item active"><a href="{{ route('menutugasshow') }}">Lihat tugas</a></div>
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
                </div>
                <div class="">
                    {{-- <div class="card-header">
                        <label for="">
                            <h4>{{ $tugas->nama }}</h4>
                        </label>
                    </div> --}}
                    <div class="">
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
                                                    <a href="{{ route('KasihNilai', $item->id) }}"
                                                        class="btn btn-primary">Cek tugas</a>
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
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
