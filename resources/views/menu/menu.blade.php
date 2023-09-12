@extends('layouts.template.template')
@section('content')
    @php
        $role = (int) Auth::user()->role;
        $wali = (int) Auth::user()->id;
    @endphp
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Menu</h1>
            </div>
            <div class="section-body">
                @if ($role === 5)
                    <div class="row">
                        <div class="col-lg-3">
                            <a href="{{ route('tagihan_siswa_web') }}">
                                <div class="card shadow card-primary">
                                    <div class="card-body">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <img class="d-block" width="90px"
                                                                src="{{ asset('icon/dashboard-line-icon.png') }}"
                                                                alt="First slide">
                                                        </div>
                                                        <div class="col-6">
                                                            <img class="d-block" width="90px"
                                                                src="{{ asset('/icon/tagihan.png') }}" alt="First slide">
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
                            <a href="{{ route('UjianSiswa') }}">
                                <div class="card shadow card-primary">
                                    <div class="card-body">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <img class="d-block" width="90px"
                                                                src="{{ asset('icon/dashboard-line-icon.png') }}"
                                                                alt="First slide">
                                                        </div>
                                                        <div class="col-6">
                                                            <img class="d-block" width="90px"
                                                                src="{{ asset('icon/ujian.png') }}" alt="First slide">
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
                            <a href="{{ route('jadwal-siswa') }}">
                                <div class="card shadow card-primary">
                                    <div class="card-body">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <img class="d-block" width="90px"
                                                                src="{{ asset('icon/dashboard-line-icon.png') }}"
                                                                alt="First slide">
                                                        </div>
                                                        <div class="col-6">
                                                            <img class="d-block" width="90px"
                                                                src="{{ asset('icon/jadwal.png') }}" alt="First slide">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        {{-- <div class="col-lg-3">
                            <a href="{{ route('SiswaTampilTugas') }}">
                                <div class="card shadow card-primary">
                                    <div class="card-body">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <img class="d-block" width="90px"
                                                                src="{{ asset('icon/dashboard-line-icon.png') }}" alt="First slide">
                                                        </div>
                                                        <div class="col-6">
                                                            <img class="d-block" width="90px" src="/icon/tugas.png"
                                                                alt="First slide">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> --}}
                        <div class="col-lg-3">
                            <a href="{{ route('tugassiswa') }}">
                                <div class="card shadow card-primary">
                                    <div class="card-body">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <img class="d-block" width="90px"
                                                                src="{{ asset('icon/dashboard-line-icon.png') }}"
                                                                alt="First slide">
                                                        </div>
                                                        <div class="col-6">
                                                            <img class="d-block" width="90px"
                                                                src="{{ asset('icon/tugas.png') }}" alt="First slide">
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
            </div>
            @endif
            @if ($role === 3)
                <div class="row">
                    <div class="col-lg-3">
                        <a href="{{ route('dashboard') }}">
                            <div class="card shadow-primary card-primary">
                                <div class="card-body">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <img class="d-block" width="90px"
                                                            src="{{ asset('icon/dashboard-line-icon.png') }}"
                                                            alt="First slide">
                                                    </div>
                                                    <div class="col-6">
                                                        <img class="d-block" width="90px"
                                                            src="{{ asset('icon/dashboard.png') }}" alt="First slide">
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
                        <a href="{{ route('jadwal_buat_guru') }}">
                            <div class="card shadow-primary card-primary">
                                <div class="card-body">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <img class="d-block" width="90px" src="/icon/book.png"
                                                            alt="First slide">
                                                    </div>
                                                    <div class="col-6">
                                                        <img class="d-block" width="90px"
                                                            src="{{ asset('icon/jadwal.png') }}" alt="First slide">
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
                        <a href="{{ route('gurunilai') }}">
                            <div class="card shadow-primary card-primary">
                                <div class="card-body">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <img class="d-block" width="90px" src="/icon/book.png"
                                                            alt="First slide">
                                                    </div>
                                                    <div class="col-6">
                                                        <img class="d-block" width="90px"
                                                            src="{{ asset('icon/nilai.png') }}" alt="First slide">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @php
                        $tahun = \App\Models\Setting::first()->id_tahun_ajaran;
                    @endphp
                    @if (\App\Models\Kelas::where('id_tahun_ajaran', $tahun)->where('id_guru', \App\Models\Guru::where('id_user', $wali)->first()->id)->first())
                        <div class="col-lg-3">
                            <a href="{{ route('WaliKelas') }}">
                                <div class="card shadow-primary card-primary">
                                    <div class="card-body">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <div class="col-6 mt-2">
                                                            <img class="d-block" width="90px"
                                                                src="/icon/childrens-kids-icon.webp" alt="First slide">
                                                        </div>
                                                        <div class="col-6">
                                                            <img class="d-block" width="90px"
                                                                src="{{ asset('icon/siswa.png') }}" alt="First slide">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    <div class="col-lg-3">
                        <a href="{{ route('menutugasshow') }}">
                            <div class="card shadow-primary card-primary">
                                <div class="card-body">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="row">
                                                    <div class="col-6 mt-2">
                                                        <img class="d-block" width="90px"
                                                            src="/icon/childrens-kids-icon.webp" alt="First slide">
                                                    </div>
                                                    <div class="col-6">
                                                        <img class="d-block" width="100px"
                                                            src="{{ asset('icon/tugas.png') }}" alt="First slide">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    @if (\App\Models\Kelas::where('id_tahun_ajaran', $tahun)->where('id_guru', \App\Models\Guru::where('id_user', $wali)->first()->id)->first())
                        <div class="col-lg-3">
                            <a href="{{ route('ujianwalikelas') }}">
                                <div class="card shadow-primary card-primary">
                                    <div class="card-body">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <div class="col-6 mt-2">
                                                            <img class="d-block" width="90px"
                                                                src="/icon/childrens-kids-icon.webp" alt="First slide">
                                                        </div>
                                                        <div class="col-6">
                                                            <img class="d-block" width="100px"
                                                                src="{{ asset('icon/ujian.png') }}" alt="First slide">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            @endif
            @if ($role === 1)
                <div class="row">
                    <div class="col-lg-3">
                        <a href="{{ route('selectjenjangkonfirmasibuktibayar-jenjang') }}">
                            <div class="card shadow-primary card-primary">
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
                                                        <img class="d-block" width="90px"
                                                            src="{{ asset('icon/konfirmasipembayaranpendaftaran.png') }}"
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
                        <a href="{{ route('seleksi-jenjang-absen') }}">
                            <div class="card shadow-primary card-primary">
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
                                                        <img class="d-block" width="90px"
                                                            src="{{ asset('icon/absenseleksi.png') }}" alt="First slide">
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
                        <a href="{{ route('seleksi-jenjang-nilai') }}">
                            <div class="card shadow-primary card-primary">
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
                                                        <img class="d-block" width="90px"
                                                            src="{{ asset('icon/nilaiseleksi.png') }}" alt="First slide">
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
                        <a href="{{ route('daftarulangsiswabaru') }}">
                            <div class="card shadow-primary card-primary">
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
                                                        <img class="d-block" width="90px"
                                                            src="{{ asset('icon/daftarulangsiswabaru.png') }}"
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
                        <a href="{{ route('siswa-pindahan-view-jenjang') }}">
                            <div class="card shadow-primary card-primary">
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
                                                        <img class="d-block" width="90px"
                                                            src="{{ asset('icon/daftarsiswapindahan.png') }}"
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
                        <a href="{{ route('daftarulang') }}">
                            <div class="card shadow-primary card-primary">
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
                                                        <img class="d-block" width="90px"
                                                            src="{{ asset('icon/daftarulang.png') }}" alt="First slide">
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
                        <a href="{{ route('siswa-pindahan-jenjang') }}">
                            <div class="card shadow-primary card-primary">
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
                                                        <img class="d-block" width="90px"
                                                            src="{{ asset('icon/siswapindahanoffline.png') }}"
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
                        <a href="{{ route('menukenaikankelas') }}">
                            <div class="card shadow-primary card-primary">
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
                                                        <img class="d-block" width="80px"
                                                            src="{{ asset('icon/kenaikansiswa.png') }}"
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
                        <a href="{{ route('infosiswa') }}">
                            <div class="card shadow-primary card-primary">
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
                                                        <img class="d-block" width="90px"
                                                            src="{{ asset('icon/informasisiswa.png') }}"
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
                        <a href="{{ route('siswatokelas') }}">
                            <div class="card shadow-primary card-primary">
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
                                                        <img class="d-block" width="90px"
                                                            src="{{ asset('icon/pembagiankelas.png') }}"
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
                        <a href="{{ route('penerimaansiswa') }}">
                            <div class="card shadow-primary card-primary">
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
                                                        <img class="d-block" width="90px"
                                                            src="{{ asset('icon/ppdb.png') }}" alt="First slide">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- <div class="col-lg-3">
                            <a href="{{ route('semuakelas') }}">
                                <div class="card shadow-primary card-primary">
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
                                                            <img class="d-block" width="97px"
                                                                src="/icon/semuakelas.png" alt="First slide">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> --}}
                    <div class="col-lg-3">
                        <a href="{{ route('manage') }}">
                            <div class="card shadow-primary card-primary">
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
                                                        <img class="d-block" width="95px"
                                                            src="{{ asset('icon/manage.png') }}" alt="First slide">
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
