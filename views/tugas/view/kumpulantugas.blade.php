    @extends('layouts.template.template')
    @section('content')
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Tugas</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                        <div class="breadcrumb-item">Tugas</div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                    <div class="card shadow card-primary">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <p>Tugas {{ $tugasBelum }}</p>
                                            <form action="{{ route('menutugasshowkelaslihatdetail') }}" method="get">
                                                @csrf
                                                <input type="hidden" name="tugasBelum" value="tugasBelum">
                                                <input type="submit" class="btn btn-primary" value="Masuk">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                    <div class="card shadow card-primary">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <p>Dedline {{ $dedline }}</p>
                                            <form action="{{ route('menutugasshowkelaslihatdetail') }}" method="get">
                                                @csrf
                                                <input type="hidden" name="dedline" value="dedline">
                                                <input type="submit" class="btn btn-primary" value="Masuk">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                    <div class="card shadow card-primary">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <p>Tugas berakhir {{ $batas }}</p>
                                            <form action="{{ route('menutugasshowkelaslihatdetail') }}" method="get">
                                                @csrf
                                                <input type="hidden" name="batas" value="batas">
                                                <input type="submit" class="btn btn-primary" value="Masuk">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                    <div class="card shadow card-primary">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <p>Total Tugas {{ $sudah }}</p>
                                            <form action="{{ route('menutugasshowkelaslihatdetail') }}" method="get">
                                                @csrf
                                                <input type="hidden" name="sudah" value="sudah">
                                                <input type="submit" class="btn btn-primary" value="Masuk">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    @endsection
