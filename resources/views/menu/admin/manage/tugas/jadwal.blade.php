@extends('layouts.template.template')
@section('content')
    <form method="get" id="manageTugasMataPelajaran_id" action="{{ route('manageTugasMataPelajaran') }}"
        style="display:none;">
        @csrf
        <input type="hidden" name="jenjang_pendidikan_id" value="{{ $jenjang_pendidikan_id }}">
    </form>
    <form method="get" id="manageTugasMataPelajaranguru_id" action="{{ route('manageTugasMataPelajaranguru') }}"
        style="display:none;">
        @csrf
        <input type="hidden" name="mata_pelajaran_id" value="{{ $mata_pelajaran_id }}">
        <input type="hidden" name="jenjang_pendidikan_id" value="{{ $jenjang_pendidikan_id }}">
    </form>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tugas</h1>
                <div class="section-header-breadcrumb">
                    {{-- <div class="breadcrumb-item active"><a href="{{ route('jadwal') }}">Table Jadwal
                        </a></div> --}}
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('manage') }}">Manage</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('manageTugas') }}">Semua kelas</a></div>
                    <div class="breadcrumb-item active"> <a class="" href="{{ route('manageTugasMataPelajaran') }}"
                            onclick="event.preventDefault();document.getElementById('manageTugasMataPelajaran_id').submit();">Mata
                            Pelajaran
                        </a></div>
                    <div class="breadcrumb-item active"> <a class="" href="{{ route('manageTugasMataPelajaran') }}"
                            onclick="event.preventDefault();document.getElementById('manageTugasMataPelajaranguru_id').submit();">Guru
                        </a></div>
                    <div class="breadcrumb-item">Kelas</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow card-success">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                @php
                                    $tahun = \App\Models\Setting::first()->id_tahun_ajaran; //mengambil data tahun ajaran yang berlangsung
                                @endphp
                                {{ \App\Models\JenjangPendidikan::where('id', $jenjang_pendidikan_id)->first()->nama }} -
                                {{ \App\Models\Mata_Pelajaran::where('tahun_ajaran_id', $tahun)->where('id', $mata_pelajaran_id)->first()->name }}
                                -
                                {{ \App\Models\Guru::where('id', $guru_id)->first()->name }}
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($jadwal as $item)
                                        <div class="col-md-12 col-lg-12 col-xl-3 col-xxl-12 col-sm-12">
                                            <div class="card shadow card-primary">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    {{ \App\Models\Kelas::with('kelas')->where('id', $item->kelas_id)->first()->kelas->name }}
                                                    {{ \App\Models\Kelas::with('kelas')->where('id', $item->kelas_id)->first()->jurusan }}

                                                    <form
                                                        action="{{ route('manageTugasMataPelajarangurujadwalbuattugas') }}"
                                                        method="get">
                                                        @csrf
                                                        <input type="hidden" name="kelas_id"
                                                            value="{{ $item->kelas_id }}">
                                                        <input type="hidden" name="mata_pelajaran_id"
                                                            value="{{ $mata_pelajaran_id }}">
                                                        <input type="hidden" name="guru_id" value="{{ $guru_id }}">
                                                        <input type="hidden" name="jenjang_pendidikan_id"
                                                            value="{{ $jenjang_pendidikan_id }}">
                                                        <input type="submit" class="btn btn-primary" value="Buat tugas">
                                                    </form>
                                                </div>
                                                <div class="card-body">
                                                    {{-- {{ dd($item->mata_pelajaran_id) }} --}}
                                                    <div>Semua Tugas =
                                                        {{ \App\Models\Tugas::where('guru_id', $guru_id)->where('mata_pelajaran_id', $mata_pelajaran_id)->where('tahun_ajaran_id', $tahun)->where('kelas_id', $item->kelas_id)->count() }}
                                                        <a href="/menu/tugas/kelas-detail/admin/{{ $item->kelas_id }}/{{ $mata_pelajaran_id }}"
                                                            class="btn btn-primary">Semua Masuk</a>
                                                    </div>
                                                    <div>Expired =
                                                        {{ \App\Models\Tugas::where('guru_id', $guru_id)->where('mata_pelajaran_id', $mata_pelajaran_id)->where('tahun_ajaran_id', $tahun)->where('kelas_id', $item->kelas_id)->where('tanggal_pengumpulan', '<', $tanggalhariini)->count() }}
                                                        <a href="/menu/tugas/kelas-detail/admin/expired/{{ $item->kelas_id }}/{{ $mata_pelajaran_id }}"
                                                            class="btn btn-primary">Semua Masuk</a>
                                                    </div>
                                                    <div>Berlangsung =
                                                        {{ \App\Models\Tugas::where('guru_id', $guru_id)->where('mata_pelajaran_id', $mata_pelajaran_id)->where('tahun_ajaran_id', $tahun)->where('kelas_id', $item->kelas_id)->where('tanggal_pengumpulan', '>', $tanggalhariini)->count() }}<a
                                                            href="/menu/tugas/kelas-detail/admin/berlangsung/{{ $item->kelas_id }}/{{ $mata_pelajaran_id }}"
                                                            class="btn btn-primary">Semua Masuk</a></div>
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
