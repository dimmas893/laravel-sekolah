@extends('layouts.portal.template_2')
@section('content')
    <div id="contact" class="our-services section">
        <div class="container">
            <div class="main-content">
                <section class="section">
                    <div class="text-center wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">

                        @if ($sudah === 'sudah')
                            <h1><b>{{ $pendaftaran->nama_siswa }}</b> Anda Sudah Mendaftar </h1>
                        @else
                            <h1>Calon Peserta Didik dengan nama <b>{{ $pendaftaran->nama_siswa }}</b> telah teregistrasi di
                                Sekolah
                                Al-Azhar
                                BSD</h1>
                        @endif
                    </div>


                    <br>
                    <div class="wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="card">
                            <div class="card-body">
                                <label>Harap cek email anda buat mendapatkan informasi tanggal seleksi
                                </label>

                                <a href="{{ route('welcome') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection
