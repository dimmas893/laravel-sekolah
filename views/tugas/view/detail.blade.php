@extends('layouts.template.template')
@section('content')
    <style type="text/css">
        #pdf_container {
            background: #ccc;
            text-align: center;
            display: none;
            padding: auto;
            height: auto;
            overflow: auto;
        }

        #siswa {
            background: #ccc;
            text-align: center;
            display: none;
            padding: auto;
            height: auto;
            overflow: auto;
        }
    </style>
    <form method="get" id="tugassiswaview_id" action="{{ route('tugassiswaview') }}" style="display:none;">
        @csrf
        <input type="hidden" name="kategori" value="{{ $kategori }}">
        {{-- <input type="hidden" name="title" value="{{ $title }}"> --}}
        <input type="submit" class="btn btn-primary" value="Masuk">
    </form>
    <div id="tabs">
        <div class="modal fade" id="editTUModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('tugas_update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $tugas->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Upload jawaban</h5>
                        </div>
                        <div class="modal-body">
                            <div class="my-2">
                                <input type="file" name="file_upload" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="edit_TU_btn" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="pdfguru" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div id="pdf_container">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" value="Preview PDF"
                            onclick="LoadPdfFromUrl('{{ asset('file_tugas/' . $tugas->tugas->file_tugas) }}')">Preview</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Tugas</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                        <div class="breadcrumb-item active"><a href="{{ route('tugassiswa') }}">Tugas</a></div>
                        <div class="breadcrumb-item active"><a href="{{ route('tugassiswaview') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('tugassiswaview_id').submit();">Kumpulan
                                tugas
                                {{ $title }}</a></div>
                        <div class="breadcrumb-item">Upload jawaban</div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="row">
                        {{-- @foreach ($tugas as $item) --}}
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xl-12 col-xxl-12">
                            <div class="card shadow card-primary">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div class=""> <i class="ion-ios-paper h5"></i>
                                        {{ $tugas->tugas->matapelajaran->name }} -
                                        {{-- <a href="{{ asset('file_tugas/' . $tugas->tugas->file_tugas) }}">File PDF</a> --}}

                                        <a href="#" class="text-danger mx-1" data-toggle="collapse"
                                            data-target="#filetugas">file tugas</a> - Kesempatan ({{ $tugas->kesempatan }})
                                        {{-- <a href="{{ asset('file_tugas/' . $tugas->tugas->file_tugas) }}"
                                            target="_blank">Lihat Tugas</a> --}}

                                    </div>
                                    <div>
                                        @if ($tugas->kesempatan != 0)
                                            <a href="#" id="{{ $tugas->id }}"
                                                class="btn btn-primary mx-1 editIcon" data-toggle="modal"
                                                data-target="#editTUModal">Upload jawaban</a>
                                        @endif
                                    </div>
                                    {{-- <div class="text-right">{{ $tugas->jadwal->id }}</div> --}}
                                </div>
                                <div class="card-body">
                                    <p>{{ $tugas->tugas->nama }} - {{ $tugas->tugas->tanggal_pengumpulan }}</p>
                                </div>
                                <div class="card-footer">
                                    <label>Deskripsi :</label>
                                    <p>{{ $tugas->tugas->deskripsi }}</p>
                                    @if ($tugas->file_upload != null)
                                        {{-- <a href="{{ asset('file_tugas/' . $tugas->file_upload) }}" target="_blank">File
                                            PDF jawaban anda</a> --}}
                                        {{-- <a href="#" class="text-danger mx-1" data-toggle="modal"
                                            data-target="#pdfsiswa">Preview jawaban</a> --}}
                                        <button type="button" class="btn btn-info" data-toggle="collapse"
                                            data-target="#demo">Lihat
                                            Jawaban</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- @endforeach --}}
                    </div>
                    <div class="container">
                        <div id="demo" class="collapse">
                            <div style="width: 100%; height: 100vh; overflow: hidden; overflow-y: scroll">
                                <embed src="{{ asset('file_tugas/' . $tugas->file_upload) }}" width="100%"
                                    height="100%">
                            </div>
                        </div>
                        <div id="filetugas" class="collapse">
                            <div style="width: 100%; height: 100vh; overflow: hidden; overflow-y: scroll">
                                <embed src="{{ asset('file_tugas/' . $tugas->tugas->file_tugas) }}" width="100%"
                                    height="100%">
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf_viewer.min.css" rel="stylesheet"
        type="text/css" />
@endsection
@section('js')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#tabs").tabs();
        });


        $(document).on('click', '.editIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
                url: '{{ route('tugas_edit') }}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response.tugas.nama)
                    // $("#matapelajaran").val(response.tugas.matapelajaran.name);
                    $("#tugas").text(response.tugas.nama);
                    $("#pengumpulan").text(response.tugas.tanggal_pengumpulan);
                    $("#deskripsi").text(response.tugas.deskripsi);
                    $("#id").val(response.id);
                }
            });
        });

        $("#edit_TU_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#edit_TU_btn").text('Updating...');
            $.ajax({
                url: '{{ route('tugas_update') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        // Swal.fire(
                        //     'Updated!',
                        //     'Updated Successfully!',
                        //     'success'
                        // )
                        location.reload();
                    }
                }
            });
        });
    </script>
@endsection
