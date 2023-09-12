@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Ujian</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item">Ujian</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow card-primary">
                            <div class="card-header">
                                Ujian
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($ujian->where('score', 0) as $item)
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                            <div class="card shadow card-success">
                                                <div class="card-header justify-content-between">
                                                    {{ $item->ujian->mata_pelajaran->name }} - @if ($item->ujian->mata_pelajaran->jurusan != null)
                                                        {{ $item->ujian->mata_pelajaran->jurusan }}
                                                    @endif
                                                    <a href="{{ route('UjianSoal', $item->ujian->id) }}"
                                                        class="btn btn-primary">Masuk</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach ($ujian->where('score', '!=', 0) as $item)
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                            <div class="card shadow card-success">
                                                <div class="card-header justify-content-between">
                                                    {{ $item->ujian->mata_pelajaran->name }} - @if ($item->ujian->mata_pelajaran->jurusan != null)
                                                        {{ $item->ujian->mata_pelajaran->jurusan }}
                                                    @endif
                                                    <a href="#" class="btn btn-success">Selesai</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
