@extends('layouts.template.template')
@section('content')
    <form method="get" id="pemberiannilaitanggalseleksi_tk" action="{{ route('pemberiannilaitanggalseleksi') }}"
        style="display:none;">
        @csrf
        <input type="hidden" name="jenjang_pendidikan_id"
            value="{{ \App\Models\TanggalSeleksi::where('id', $tanggalseleksi)->first()->jenjang }}">
        <input type="hidden" name="berjurusan" value="3">
        <input type="submit" class="btn btn-primary" value="Masuk">
    </form>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Penilaian Seleksi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('seleksi-jenjang-absen') }}">Jenjang</a></div>
                    <div class="breadcrumb-item active"> <a href="{{ route('pemberiannilaitanggalseleksi') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('pemberiannilaitanggalseleksi_tk').submit();">Tanggal
                            seleksi</a>
                    </div>
                    <div class="breadcrumb-item">Nilai seleksi</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                <h3 class="text-light">Tabel Penilaian Seleksi</h3>
                            </div>
                            <div>
                                <form action="{{ route('postpenilaianseleksi') }}" method="post">
                                    @csrf
                                    <div class="card-body" id="TU_all">
                                        <h1 class="text-secondary my-5 text-center">
                                            <div class="load-3">
                                                <div class="line"></div>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                            </div>
                                        </h1>
                                    </div>
                                    <div class="mr-2 ml-2 mb-2 mt-2">
                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            TU_all();

            function TU_all() {
                $.ajax({
                    url: '{{ route('NilaiSeleksiViewajax', $tanggalseleksi) }}',
                    method: 'get',
                    success: function(response) {
                        $("#TU_all").html(response);
                        $("table").DataTable({
                            destroy: true,
                            responsive: true,
                            paging: false
                        });
                    }
                });
            }
        });
    </script>
@endsection
