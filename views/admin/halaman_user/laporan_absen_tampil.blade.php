@extends('layouts.template.template')
@section('content')
    <div class="main-content">

        <section class="section">
            <div class="section-header">
                <h1> Laporan Absensi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('infosiswa') }}">Informasi siswa</a>
                    </div>
                    <div class="breadcrumb-item active"><a href="{{ route('laporan_absen_admin_view') }}">Pencarian
                            kelas</a></div>
                    <div class="breadcrumb-item">Laporan Absen</div>
                </div>
            </div>
            <div class="mb-3">
                <form method="get" action="{{ route('filter_absensi_siswa') }}">
                    @csrf
                    <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <input type="date" name="awal" class="form-control">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <input type="date" name="akhir" class="form-control">
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
                        @php
                            $siswa = \App\Models\Siswa::where('kelas', $kelas->id)->get();
                        @endphp

                        @foreach ($siswa as $item)
                            {{-- {{ dd($item) }} --}}
                            @php
                                $hadir = \App\Models\Absen::where('kelas_id', $kelas->id)
                                    ->where('siswa_id', $item->id)
                                    ->where('semester', $setting->semester)
                                    ->where('tahun_ajaran', $setting->id_tahun_ajaran)
                                    ->where('tipe_kehadiran', '0')
                                    ->count();
                                $sakit = \App\Models\Absen::where('kelas_id', $kelas->id)
                                    ->where('semester', $setting->semester)
                                    ->where('tahun_ajaran', $setting->id_tahun_ajaran)
                                    ->where('siswa_id', $item->id)
                                    ->where('tipe_kehadiran', '1')
                                    ->count();
                                $izin = \App\Models\Absen::where('kelas_id', $kelas->id)
                                    ->where('semester', $setting->semester)
                                    ->where('tahun_ajaran', $setting->id_tahun_ajaran)
                                    ->where('siswa_id', $item->id)
                                    ->where('tipe_kehadiran', '2')
                                    ->count();
                                $alpha = \App\Models\Absen::where('kelas_id', $kelas->id)
                                    ->where('semester', $setting->semester)
                                    ->where('tahun_ajaran', $setting->id_tahun_ajaran)
                                    ->where('siswa_id', $item->id)
                                    ->where('tipe_kehadiran', '3')
                                    ->count();
                                $terlambat = \App\Models\Absen::where('kelas_id', $kelas->id)
                                    ->where('semester', $setting->semester)
                                    ->where('tahun_ajaran', $setting->id_tahun_ajaran)
                                    ->where('siswa_id', $item->id)
                                    ->where('tipe_kehadiran', '4')
                                    ->count();
                            @endphp

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-12">
                                <div class="card">
                                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="ion-android-person h3"></i>
                                            {{ $item->nama_siswa }}
                                        </div>
                                        {{-- <div class="text-right">{{ $item->jadwal->id }}</div> --}}
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <label for="">Total Pertemuan:
                                                {{ $hadir + $sakit + $alpha + $terlambat + $izin }}
                                                {{-- {{ $absen->whereIn('tipe_kehadiran', [0, 1, 2, 3, 4])->count() }} --}}
                                            </label>
                                        </div>
                                        <div class="">
                                            <label for="">Hadir :
                                                {{ $hadir }}</label>
                                        </div>
                                        <div class="">
                                            <label for="">Sakit :
                                                {{ $sakit }}</label>
                                        </div>
                                        <div class="">
                                            <label for="">Izin :
                                                {{ $izin }}</label>
                                        </div>
                                        <div class="">
                                            <label for="">Alpha :
                                                {{ $alpha }}</label>
                                        </div>
                                        <div class="">
                                            <label for="">Terlambat :
                                                {{ $terlambat }}</label>
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
