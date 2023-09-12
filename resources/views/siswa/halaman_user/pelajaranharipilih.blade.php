@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Jadwal</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item">Jadwal</div>
                </div>
            </div>
            <div class="row mb-4">
                @foreach ($datahari as $item)
                    <div class="col-1">
                        <a href="{{ route('jadwalpilih', $item->id) }}">{{ $item->name }}</a>
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
                            <div class="row">
                                @foreach ($jadwal as $p)
                                    <div class="form-group col-md-3 col-12">
                                        <div class="card shadow-success card-success">
                                            <div class="card-header">
                                                <h4>{{ $p->kelasget->kelas->name }} /
                                                    {{ $p->ruangan->name }} -
                                                    {{ $p->mata_pelajaran->name }}</h4>
                                            </div>
                                            <div class="card-body">
                                                <p>{{ $p->hari->name }}</p>
                                                <p>{{ substr($p->jam_masuk, 0, 5) }} -
                                                    {{ substr($p->jam_keluar, 0, 5) }}</p>
                                                <a href="" class="btn btn-primary">Masuk</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
