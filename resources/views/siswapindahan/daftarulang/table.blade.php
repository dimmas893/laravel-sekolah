@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Pendaftaran Daftar Ulang Siswa Pindahan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item">Daftar ulang</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pendaftaran Daftar Ulang Siswa Pindahan Tahun Ajaran {{ $tahun_ajaran }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Nama Siswa</th>
                                                <th>Email</th>
                                                <th>Asal Sekolah</th>
                                                <th>Kelas</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Hasil</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{ dd($pendaftaran) }} --}}
                                            @foreach ($pendaftaran as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama_siswa }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->asal_sekolah }}</td>
                                                    <td>{{ $item->tingkat }}</td>
                                                    <td>{{ $item->jenis_kelamin }}</td>
                                                    <td>{{ $item->hasil }}</td>
                                                    <td>
                                                        <a class="btn btn-info"
                                                            href="{{ route('konfirmasi-daftar-ulang', $item->id) }}">Lihat</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
