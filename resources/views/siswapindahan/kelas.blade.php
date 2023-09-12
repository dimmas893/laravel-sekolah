@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Ujian</h1>
                <div class="section-header-breadcrumb">
                    {{-- <div class="breadcrumb-item active"><a href="{{ route('jadwal') }}">Table Jadwal
                        </a></div> --}}
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('siswa-pindahan-jenjang') }}">Jenjang</a></div>
                    <div class="breadcrumb-item">Kelas</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow card-success">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                {{-- {{ \App\Models\JenjangPendidikan::where('id', $jenjang_pendidikan_id)->first()->nama }} --}}
                                <h4>Kelas yang masih ada kuota</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($tampunkelas as $item)
                                        @if ($item['kuota'] > 0)
                                            <div class="col-3">
                                                <div class="card shadow card-primary">
                                                    <div
                                                        class="card-header d-flex justify-content-between align-items-center">
                                                        {{ $item['kelas'] }} - (Sisa kuota {{ $item['kuota'] }})
                                                        <a href="{{ route('siswa-pindahan-form-get', $item['id']) }}"
                                                            class="btn btn-primary">Masuk</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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
