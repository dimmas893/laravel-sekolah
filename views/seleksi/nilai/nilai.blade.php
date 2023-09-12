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
            <div class="section-body">
                @if (isset($berjurusan))
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>keterangan</h4>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card-body">
                                            <div class="card card-primary shadow">
                                                <div class="card-body">
                                                    <p style="color:red">Merah</p><br>
                                                    <p>Cadangan</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card-body">
                                            <div class="card card-primary shadow">
                                                <div class="card-body">
                                                    <p style="color:chartreuse">Hijau</p><br>
                                                    <p>Lulus Seleksi</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Peringkat Seleksi</h4>
                                    <div class="card-header-action">
                                        <a class="btn btn-primary" href="{{ route('tableseleksi', $jenjang) }}">Table
                                            Seleksi</a>
                                    </div>
                                </div>

                                @foreach ($jurusan as $jur)
                                    <div class="card-header">
                                        <h4>Jurusan {{ $jur['jurusan'] }} kuota {{ $jur['kuota'] }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('seleksi-pemberiannilai-post') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="jenang_pendidikan_id" value="{{ $jenjang }}">
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
                                                                // $cek = \App\Models\PendaftaranSeleksi::where('seleksi_id', $item->id)->first();
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

                                                                @if ($item->nilai < 80)
                                                                    <td>
                                                                        <p>Tidak Lulus</p>
                                                                    </td>
                                                                @elseif($item->nilai === 80)
                                                                    <td>
                                                                        <p>Lulus</p>
                                                                    </td>
                                                                @elseif($item->nilai > 80)
                                                                    <td>
                                                                        <p>Lulus</p>
                                                                    </td>
                                                                @endif
                                                            @endif

                                                        </tr>
                                                    @endforeach
                                                </table>
                                                <div>
                                                    @if (isset($cek))
                                                        @if ($cek->nilai != null)
                                                            {{-- <input type="submit" class="btn btn-info" value="Send Email"> --}}
                                                        @else
                                                            <input type="submit" class="btn btn-primary" value="Simpan">
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if (empty($berjurusan))
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>keterangan</h4>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card-body">
                                            <div class="card card-primary shadow">
                                                <div class="card-body">
                                                    <p style="color:red">Merah</p><br>
                                                    <p>Cadangan</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card-body">
                                            <div class="card card-primary shadow">
                                                <div class="card-body">
                                                    <p style="color:chartreuse">Hijau</p><br>
                                                    <p>Lulus Seleksi</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Peringkat Seleksi</h4>
                                </div>
                                <div class="card-header">
                                    <h4>kuota </h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('seleksi-pemberiannilai-post') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="jenang_pendidikan_id" value="{{ $jenjang }}">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-md">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Form Nilai</th>
                                                    <th>Hasil Seleksi</th>
                                                </tr>
                                                @foreach ($seleksi as $item)
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

                                                            @if ($item->nilai < 80)
                                                                <td>
                                                                    <p>Tidak Lulus</p>
                                                                </td>
                                                            @elseif($item->nilai === 80)
                                                                <td>
                                                                    <p>Lulus</p>
                                                                </td>
                                                            @elseif($item->nilai > 80)
                                                                <td>
                                                                    <p>Lulus</p>
                                                                </td>
                                                            @endif
                                                        @endif

                                                    </tr>
                                                @endforeach
                                            </table>
                                            <div>
                                                @if (isset($cek))
                                                    @if ($cek->nilai != null)
                                                        <input type="submit" class="btn btn-info" value="Send Email">
                                                    @else
                                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                                    @endif
                                                @endif

                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                @endif

        </section>
    </div>
@endsection
