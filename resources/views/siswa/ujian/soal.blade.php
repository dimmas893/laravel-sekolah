@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Siswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('UjianSiswa') }}">Ujian</a></div>
                    <div class="breadcrumb-item">mengerjakan</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow card-primary">
                            <div class="card-header">
                                SOAL PILIHAN GANDA UJIAN {{ $ujian->mata_pelajaran->name }}
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <form method="post" id="JawabanUjian_id" action="{{ route('JawabanUjian') }}">
                                        @csrf
                                        <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                                        @foreach ($soal as $index => $item)
                                            <div class="col-12">
                                                <input type="hidden" name="kunci[]" value="{{ $item->kunci_jawaban }}">
                                                <input type="hidden" name="id_soal[]" value="{{ $item->id }}">
                                                <input type="hidden" name="ujian_id" value="{{ $item->ujian_id }}">
                                                <ol start="{{ $loop->iteration }}" type="1">
                                                    {{-- <li>{{ $item->soal }}.</li> --}}
                                                    <li>{!! $item->soal !!}.</li>
                                                    <ol start="1" type="a">
                                                        <i>
                                                            <li><input type="radio" name="jawaban[]{{ $index }}"
                                                                    value="a">{!! $item->jawaban_a !!}</li>
                                                            <li><input type="radio" name="jawaban[]{{ $index }}"
                                                                    value="b">{!! $item->jawaban_b !!}</li>
                                                            <li><input type="radio" name="jawaban[]{{ $index }}"
                                                                    value="c">{!! $item->jawaban_c !!}</li>
                                                            <li><input type="radio" name="jawaban[]{{ $index }}"
                                                                    value="d">{!! $item->jawaban_d !!}</li>
                                                        </i>
                                                    </ol>
                                                    <br>
                                                    <br>
                                                </ol>
                                            </div>
                                        @endforeach
                                    </form>
                                    <div class="container">
                                        <a href="{{ route('JawabanUjian') }}"
                                            onclick="event.preventDefault();
                                    document.getElementById('JawabanUjian_id').submit();"
                                            class="btn btn-primary">Kunci
                                            Jawaban</a>
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
