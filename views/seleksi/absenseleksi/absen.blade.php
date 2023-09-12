@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Jenjang</h1>
                {{-- <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('manage') }}">Manage</a></div>
                    <div class="breadcrumb-item">Jenjang</div>
                </div> --}}
            </div>
            <div class="section-body">
                @if (count($pendaftaran) > 0)
                    <form name="form1" action="{{ route('absen-seleksi-massal') }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="row mt-3 ml-3 mr-3">
                                @foreach ($pendaftaran as $p => $item)
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="card shadow card-primary">
                                            <div
                                                class="card-header bg-light d-flex justify-content-between align-items-center">
                                                <div class="">
                                                    <i class="ion-android-person h3"></i>
                                                    {{ $item->nama_siswa }} @if ($item->jurusan != null)
                                                        - {{ $item->jurusan }}
                                                    @endif
                                                </div>
                                                <div class="text-right">{{ $item->jenis_kelamin }}</div>
                                            </div>
                                            <div class="card-body">
                                                <input type="hidden" name="siswa_id[]{{ $p }}"
                                                    value="{{ $item->id }}">
                                                <input type="radio" name="group[]{{ $p }}" value="hadir"
                                                    checked="checked">Hadir<br />
                                                <input type="radio" name="group[]{{ $p }}"
                                                    value="tidakhadir">Tidak
                                                Hadir<br />
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row mb-3 ml-3 mr-3">
                                <div class="col-2">
                                    <div class="my-2">
                                        <input type="submit" class="btn btn-primary" value="Absen">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="card">
                        <div class="card-header">Tidak ada data pendaftaran</div>
                    </div>
                @endif

            </div>
        </section>
    </div>
@endsection
