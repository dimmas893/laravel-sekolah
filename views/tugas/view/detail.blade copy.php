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
    </style>
    <form method="get" id="tugassiswaview_id" action="{{ route('tugassiswaview') }}" style="display:none;">
        @csrf
        <input type="hidden" name="{{ $back }}" value="{{ $back }}">
        <input type="hidden" name="title" value="{{ $title }}">
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
                        <h5 class="modal-title" id="staticBackdropLabel"><input type="button" class="text-danger"
                                id="btnPreview" value="Preview PDF"
                                onclick="LoadPdfFromUrl('{{ asset('file_tugas/' . $tugas->tugas->file_tugas) }}')" /></h5>
                    </div>
                    <div class="modal-body">
                        <div id="pdf_container">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="modal fade" id="pdfsiswa" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Jawaban preview</h5>
                    </div>
                    <div class="modal-body">
                        <iframe id="if1" width="100%" height="900" style="visibility:visible"
                            src="{{ asset('file_tugas/' . $tugas->file_upload) }}"></iframe>
                    </div>
                    <div class="modal-footer">
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
                                    document.getElementById('tugassiswaview_id').submit();">Tugas
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

                                        <a href="#" class="text-danger mx-1" data-toggle="modal"
                                            data-target="#pdfguru">pdf</a> - Kesempatan ({{ $tugas->kesempatan }})
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
                                        <a href="#" class="text-danger mx-1" data-toggle="modal"
                                            data-target="#pdfsiswa">Preview jawaban</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- @endforeach --}}
                    </div>
                </div>
            </section>
        </div>
    </div>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf_viewer.min.css" rel="stylesheet"
        type="text/css" />
    <script type="text/javascript">
        var pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.worker.min.js';
        var pdfDoc = null;
        var scale = 1; //Set Scale for zooming PDF.
        var resolution = 2; //Set Resolution to Adjust PDF clarity.

        function LoadPdfFromUrl(url) {
            //Read PDF from URL.
            pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
                pdfDoc = pdfDoc_;

                //Reference the Container DIV.
                var pdf_container = document.getElementById("pdf_container");
                pdf_container.style.display = "block";

                //Loop and render all pages.
                for (var i = 1; i <= pdfDoc.numPages; i++) {
                    RenderPage(pdf_container, i);
                }
            });
        };

        function RenderPage(pdf_container, num) {
            pdfDoc.getPage(num).then(function(page) {
                //Create Canvas element and append to the Container DIV.
                var canvas = document.createElement('canvas');
                canvas.id = 'pdf-' + num;
                ctx = canvas.getContext('2d');
                pdf_container.appendChild(canvas);

                //Create and add empty DIV to add SPACE between pages.
                var spacer = document.createElement("div");
                spacer.style.height = "20px";
                pdf_container.appendChild(spacer);

                //Set the Canvas dimensions using ViewPort and Scale.
                var viewport = page.getViewport({
                    scale: scale
                });
                canvas.height = resolution * viewport.height;
                canvas.width = resolution * viewport.width;

                //Render the PDF page.
                var renderContext = {
                    canvasContext: ctx,
                    viewport: viewport,
                    transform: [resolution, 0, 0, resolution, 0, 0]
                };

                page.render(renderContext);
            });
        };
    </script>
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
