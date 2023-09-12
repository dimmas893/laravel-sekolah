@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tugas</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('menutugasshow') }}">Lihat tugas</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('menutugasshowkelas') }}">Kelas</a></div>
                    <div class="breadcrumb-item">Mata pelajaran </div>
                </div>
            </div>
            <div class="">
                {{-- <div class="">
                    <label for="">
                        <h4></h4>
                    </label>
                </div> --}}
                <div class="">
                    <div class="row">
                        {{-- @if (count($tugas) > 0) --}}
                        @foreach ($tugas as $item)
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xl-3 col-xxl-12">
                                <div class="card shadow card-primary">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div class="">
                                            {{ $item->matapelajaran->name }}
                                        </div>
                                        <div>
                                            <a href="/menu/tugas/kelas-detail/{{ $kelas_id }}/{{ $item->mata_pelajaran_id }}"
                                                class="btn btn-primary">Masuk</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
@endsection
