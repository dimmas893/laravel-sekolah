@extends('layouts.template.template')
@section('content')
    @php
        $role = (int) Auth::user()->role;
    @endphp
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Menu</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item">Informasi siswa</div>
                </div>
            </div>
            <div class="section-body">
                @if ($role === 1)
                    <div class="row">
                        <div class="col-lg-3">
                            <a href="{{ route('siswa') }}">
                                <div class="card shadow card-primary">
                                    <div class="card-body">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <img class="d-block" width="100px"
                                                                src="/icon/childrens-kids-icon.webp" alt="First slide">
                                                        </div>
                                                        <div class="col-6">
                                                            <img class="d-block" width="80px" src="/icon/datasiswa.png"
                                                                alt="First slide">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="{{ route('laporan_absen_admin_view') }}">
                                <div class="card shadow card-primary">
                                    <div class="card-body">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <img class="d-block" width="100px"
                                                                src="/icon/childrens-kids-icon.webp" alt="First slide">
                                                        </div>
                                                        <div class="col-6">
                                                            <img class="d-block" width="80px" src="/icon/laporanabsen.png"
                                                                alt="First slide">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="{{ route('viewTagihanmenu') }}">
                                <div class="card shadow card-primary">
                                    <div class="card-body">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <img class="d-block" width="100px"
                                                                src="/icon/childrens-kids-icon.webp" alt="First slide">
                                                        </div>
                                                        <div class="col-6">
                                                            <img class="d-block" width="80px" src="/icon/tagihan.png"
                                                                alt="First slide">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection
