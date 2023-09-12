@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Penilaian Seleksi</h1>
                {{-- <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('manage') }}">Manage</a></div>
                    <div class="breadcrumb-item">Jenjang</div>
                </div> --}}
            </div>

            <form action="{{ route('seleksi-pemberiannilai-post') }}" method="post">
                @csrf
                <input type="hidden" name="jenang_pendidikan_id" value="{{ $jenjang }}">
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Hasil Seleksi</h4>
                                    <div class="card-header-action">

                                        <input type="submit" class="btn btn-info" value="Send Email">
                                    </div>
                                </div>

                                @foreach ($jurusan as $jur)
                                    <div class="card-header">
                                        <h4>kuota
                                            @if ($jur['jurusan'] != null)
                                                jurusan {{ $jur['jurusan'] }}
                                            @endif
                                            {{ $jur['kuota'] }}
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-md">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Form Nilai</th>
                                                    <th>Hasil Seleksi</th>
                                                </tr>
                                                @foreach ($seleksi->where('jurusan', $jur['jurusan']) as $item)
                                                    @php
                                                        if ($item->jurusan != null) {
                                                            $cek = \App\Models\Seleksi::where('id', $item->id)
                                                                ->where('jurusan', $item->jurusan)
                                                                ->first();
                                                        } else {
                                                            $cek = \App\Models\Seleksi::where('id', $item->id)->first();
                                                        }
                                                    @endphp
                                                    <input type="hidden" name="id[]" value="{{ $item->id }}">
                                                    <tr>

                                                        @if ($item->nilai === null)
                                                            <td>
                                                                <p>{{ $loop->iteration }}</p>
                                                            </td>

                                                            <td>{{ $item->nama_siswa }} @if ($item->jurusan != null)
                                                                    - {{ $item->jurusan }}
                                                                @endif
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    placeholder="Masukan Nilai Seleksi" required
                                                                    name="nilai[]">
                                                            </td>
                                                            <td>
                                                                <p>-</p>
                                                            </td>
                                                        @else
                                                            @if ($jur['kuota'] >= $loop->iteration)
                                                                <input type="hidden" name="lulus[]"
                                                                    value="{{ $item->id }}">
                                                                <td>
                                                                    <p style="color:rgb(0, 255, 47)">
                                                                        {{ $loop->iteration }}
                                                                    </p>
                                                                </td>
                                                            @endif
                                                            @if ($jur['kuota'] < $loop->iteration)
                                                                <input type="hidden" name="tidaklulus[]"
                                                                    value="{{ $item->id }}">
                                                                <td>
                                                                    <p style="color:red">
                                                                        {{ $loop->iteration }}
                                                                    </p>
                                                                </td>
                                                            @endif
                                                            <td>{{ $item->nama_siswa }} @if ($item->jurusan != null)
                                                                    - {{ $item->jurusan }}
                                                                @endif
                                                            </td>
                                                            <input type="hidden" name="nilai[]"
                                                                value="{{ $item->nilai }}">
                                                            <td>{{ $item->nilai }}</td>
                                                            <td>{{ $item->hasil }}</td>
                                                        @endif

                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
