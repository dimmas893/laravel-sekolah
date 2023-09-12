@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Laporan Siswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('infosiswa') }}">Informasi siswa</a>
                    </div>
                    <div class="breadcrumb-item">Pencaarian kelas</div>
                </div>
            </div>

            <div class="">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('laporan_absen_admin') }}" method="get">
                            @csrf

                            <div class="">
                                {{-- <select name="kelas_id" class="form-control">
                                    <option value="">---Pilih Kelas---</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->kelas->name }} @if ($item->jurusan != null)
                                                - {{ $item->jurusan }}
                                            @endif /
                                            {{ $item->tahun_ajaran->tahun_ajaran }}
                                    @endforeach
                                </select> --}}

                                <div class="isMember my-2">
                                    <label for="name">Jenjang</label>
                                    <select id="package" class="form-control">
                                        <option value="null">--- Pilih Jenjang ---</option>
                                        @foreach ($jenjang_pendidikan as $item => $value)
                                            <option value="{{ $value->id }}">{{ $value->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="my-2 mt-3">
                                    <div id="sma">
                                        <label for="name">Kelas</label>
                                        <select class="form-control">
                                            <option disabled selected>Mohon Untuk Memilih Jenjang Pendidikan</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="text-center mt-2">
                                <input type="submit" class="btn btn-primary" value="cari">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
@section('js')
    <script>
        $('.isMember').on('change', function(e) {
            const selectedPackage = $('#package').val();
            e.preventDefault();
            $.ajax({
                url: '{{ route('ajaxlaporan') }}',
                method: 'get',
                data: {
                    id: selectedPackage
                },
                success: function(response) {
                    console.log(response)
                    $("#sma").html(response);
                }
            });
        });
    </script>
@endsection
