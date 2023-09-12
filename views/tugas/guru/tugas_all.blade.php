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
                                href="{{ route('menutugasshowkelaslihatdetaillihat', $kelas) }}">Mata pelajaran</a>
                        </div>
                        <div class="breadcrumb-item">Kumpulan tugas</div>
                    </div>
                </div>
                <div class="">
                    {{-- <div class="card-header">
                        <label for="">
                            <h4>Kumpulan tugas kelas
                                {{ \App\Models\Kelas::with('kelas')->where('id', $kelas)->first()->kelas->name }}</h4>
                        </label>
                    </div> --}}
                    <div class="">
                        <div class="row">
                            @if (count($tugas) > 0)
                                @foreach ($tugas as $item)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xl-3 col-xxl-12">
                                        <div class="card shadow card-primary">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <div class=""> {{ $item->tanggal_pengumpulan }}
                                                </div>
                                                <a href="{{ route('tugassiswaall', $item->id) }}"
                                                    class="btn btn-primary">Masuk</a>
                                            </div>
                                            <div class="card-body">
                                                <p>{{ $item->nama }}</p>
                                                <label>Deskripsi :</label>
                                                <p>{{ $item->deskripsi }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <p>Siswa belum mengerjakan :
                                                    {{ \App\Models\Kumpul_Tugas::where('tugas_id', $item->id)->where('file_upload', null)->count() }}
                                                </p>
                                                <p>Siswa mengerjakan :
                                                    {{ \App\Models\Kumpul_Tugas::where('tugas_id', $item->id)->where('file_upload', '!=', null)->count() }}
                                                </p>
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
