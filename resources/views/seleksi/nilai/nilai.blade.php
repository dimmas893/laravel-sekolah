@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Penilaian Seleksi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('seleksi-jenjang-absen') }}">Jenjang</a></div>
                    <div class="breadcrumb-item">Tanggal seleksi</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('pemberiannilaitanggalseleksi') }}" method="get">
                            @csrf
                            <input type="hidden" name="jenjang_pendidikan_id" value="{{ $jenjang }}">
                            <div class="mb-2 mt-2">
                                <div class="row">
                                    <div class="col-10">

                                        @if (isset($tahunajaran))
                                            <select name="tahunajaran" class="form-control">
                                                <option value="" selected>---Tahun Yang Berlangsung---</option>
                                                @foreach ($tahunajaranget as $item)
                                                    @if ($item->id == $tahunajaran)
                                                        <option selected value="{{ $item->id }}">
                                                            {{ $item->tahun_ajaran }}
                                                        </option>
                                                    @else
                                                        <option selected value="{{ $item->id }}">
                                                            {{ $item->tahun_ajaran }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        @else
                                            <select name="tahunajaran" class="form-control">
                                                <option value="" selected>---Tahun Yang Berlangsung---</option>
                                                @foreach ($tahunajaranget as $item)
                                                    <option value="{{ $item->id }}">{{ $item->tahun_ajaran }}</option>
                                                @endforeach
                                            </select>
                                        @endif

                                    </div>
                                    <div class="col-2">
                                        <input type="submit" class="btn btn-primary" value="cari">
                                    </div>
                                </div>
                            </div>
                        </form>
                        @if (isset($tahunajaran))
                            <div class="card shadow">
                                <div class="card-header">
                                    Tahun Ajaran yang sedang {{ $tahunpilihan }}
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($tanggalseleksi as $item)
                                            <form method="get" id="seleksi-pemberiannilai_tk"
                                                action="{{ route('seleksi-pemberiannilai') }}" style="display:none;">
                                                @csrf
                                                <input type="hidden" name="jenjang_pendidikan_id"
                                                    value="{{ $jenjang }}">
                                                <input type="submit" class="btn btn-primary" value="Masuk">
                                            </form>
                                            <div class="col-3">
                                                <div class="card shadow card-primary">
                                                    <div class="card-header">
                                                        {{ $item->tanggalmulai }}
                                                        <div class="ml-3">
                                                            <a class="btn btn-primary"
                                                                href="{{ route('NilaiSeleksiView', $item->id) }}">Masuk</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card shadow">
                                <div class="card-header">
                                    Tahun Ajaran yang sedang berlagsung {{ $tahunberlangsung }}
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($tanggalseleksi as $item)
                                            <div class="col-3">
                                                <div class="card shadow card-primary">
                                                    <div class="card-header">
                                                        {{ $item->tanggalmulai }}
                                                        <div class="ml-3">
                                                            <a class="btn btn-primary"
                                                                href="{{ route('NilaiSeleksiView', $item->id) }}">Masuk</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
