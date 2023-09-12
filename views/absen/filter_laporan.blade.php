@extends('layouts.template.template')
@section('content')
    <div class="main-content">

        <section class="section">
            <div class="section-header">
                <h1> Laporan Absensi</h1>
            </div>
            <div class="mb-3">
                <form method="get" action="{{ route('filter_absensi_siswa') }}">
                    @csrf
                    <input type="hidden" name="kelas_id" value="{{ $kelas_id }}">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <input type="date" name="awal" class="form-control" value="{{ $awal }}" required>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <input type="date" name="akhir" class="form-control" value="{{ $akhir }}" required>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-12">
                            <input type="submit" class="btn btn-primary" value="cari">
                        </div>
                    </div>
                </form>
            </div>
            <div>
                <div class="card">
                    <div class="row mt-3 ml-3 mr-3">
                        @foreach ($laporan as $item)
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                        <div class="">
                                            <i class="ion-android-person h3"></i>
                                            {{ $item['siswa'] }}
                                        </div>
                                        {{-- <div class="text-right">{{ $item->jadwal->id }}</div> --}}
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <label for="">Total Pertemuan: {{ $item['pertemuan'] }}</label>
                                        </div>
                                        <div class="">
                                            <label for="">Hadir : {{ $item['hadir'] }}</label>
                                        </div>
                                        <div class="">
                                            <label for="">Sakit : {{ $item['sakit'] }}</label>
                                        </div>
                                        <div class="">
                                            <label for="">Izin : {{ $item['izin'] }}</label>
                                        </div>
                                        <div class="">
                                            <label for="">Alpha : {{ $item['alpha'] }}</label>
                                        </div>
                                        <div class="">
                                            <label for="">Terlambat : {{ $item['terlambat'] }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
