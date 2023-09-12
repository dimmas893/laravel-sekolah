@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Kelas</h1>
                <div class="section-header-breadcrumb">
                    {{-- <div class="breadcrumb-item active"><a href="{{ route('jadwal') }}">Table Masuk
                        </a></div> --}}
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('manage') }}">Manage</a></div>
                    <div class="breadcrumb-item">Semua kelas</div>
                </div>
            </div>
            <div class="section-body">
                <div class="">
                    <div class="">
                        {{-- <div class="card-header">
                            Semua Kelas
                        </div> --}}
                        <div class="">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card shadow card-primary">
                                        <div
                                            class="card-header d-flex justify-content-between bg-secondary align-items-center">
                                            TK
                                            <div> <a href="{{ route('tk') }}" class="badge badge-primary">Masuk</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach ($tk as $item)
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                                        <div class="card shadow card-success">
                                                            <div
                                                                class="card-header d-flex justify-content-between align-items-center">
                                                                {{ $item->kelas->name }} @if ($item->jurusan != null)
                                                                    - {{ $item->jurusan }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card shadow card-primary">
                                        <div
                                            class="card-header d-flex justify-content-between bg-secondary align-items-center">
                                            SD
                                            <div> <a href="{{ route('sd') }}" class="badge badge-primary">Masuk</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach ($sd as $item)
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                                        <div class="card shadow card-success">
                                                            <div
                                                                class="card-header d-flex justify-content-between align-items-center">
                                                                {{ $item->kelas->name }} @if ($item->jurusan != null)
                                                                    - {{ $item->jurusan }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card shadow card-primary">
                                        <div
                                            class="card-header d-flex justify-content-between bg-secondary align-items-center">
                                            SMP
                                            <div> <a href="{{ route('smp') }}" class="badge badge-primary">Masuk</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach ($smp as $item)
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                                        <div class="card shadow card-success">
                                                            <div
                                                                class="card-header d-flex justify-content-between align-items-center">
                                                                {{ $item->kelas->name }} @if ($item->jurusan != null)
                                                                    - {{ $item->jurusan }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card shadow card-primary">
                                        <div
                                            class="card-header d-flex justify-content-between bg-secondary align-items-center">
                                            SMA
                                            <div> <a href="{{ route('sma') }}" class="badge badge-primary">Masuk</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach ($sma as $item)
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                                        <div class="card shadow card-success">
                                                            <div
                                                                class="card-header d-flex justify-content-between align-items-center">
                                                                {{ $item->kelas->name }} @if ($item->jurusan != null)
                                                                    - {{ $item->jurusan }}
                                                                @endif
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
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
