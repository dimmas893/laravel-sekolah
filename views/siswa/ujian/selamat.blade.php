@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Siswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('siswa') }}">Tabel Siswa</a></div>
                    <div class="breadcrumb-item">Tambah Siswa</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        Anda berhasil mengerjakan ujian silahkan klik <a href="{{ route('menu') }}"
                            class="btn btn-primary">kembali</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
