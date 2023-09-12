@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Jadwals {{ Auth::user()->name }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item">Jadwal</div>
                </div>
            </div>
        </section>
        <div class="row mb-4">
            @foreach ($datahari as $item)
                <div class="col-1">
                    <a href="{{ route('jadwalpilihguru', $item->id) }}">{{ $item->name }}</a>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-primary card-primary">
                    <div class="card-header">
                        <h4>Jadwal hari {{ $hari->name }}</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($jadwal as $kel)
                            <div class="col-md-12 col-lg-12 col-xl-3 col-xxl-12 col-sm-12">
                                <div class="card card-success shadow-success">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4>{{ $kel->kelasget->kelas->name }} /
                                            {{ $kel->mata_pelajaran->name }} @if ($kel->kelasget->kelas->jurusan != null)
                                                - {{ $kel->kelasget->kelas->jurusan }}
                                            @endif
                                            {{-- ({{ \App\Models\Siswa::where('kelas', $kel->kelas_id)->count() }}
                                        Siswa) --}}
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <p>{{ $kel->hari->name }}</p>
                                        <p>{{ substr($kel->jam_masuk, 0, 5) }} - {{ substr($kel->jam_keluar, 0, 5) }}</p>
                                        <a href="{{ route('jadwal-semua-siswa', $kel->id) }}"
                                            class="btn btn-primary">Masuk</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
