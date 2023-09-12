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
        <div class="row">
            <div class="col-12">
                {{-- @foreach ($mata_pelajaran as $pu) --}}
                <div class="row">
                    {{-- @foreach ($jadwal->where('mata_pelajaran_id', $pu->id) as $kel) --}}
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
                                    <a href="{{ route('jadwal-semua-siswa', $kel->id) }}" class="btn btn-primary">Masuk</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
@endsection
