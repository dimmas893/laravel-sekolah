@extends('layouts.template.template')
@section('content')
    <div id="tabs">
        <div class="modal fade" id="editTUModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <h5 class="modal-title" id="exampleModalLabel">Edit</h5> --}}
                        {{-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <form action="#" method="POST" id="edit_TU_form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="emp_image" id="emp_image">
                        <div class="modal-body">
                            <div class="my-2">
                                {{-- <i class="ion-ios-paper h5"></i> --}}
                                <div id="tugas"></div>
                                <div id="pengumpulan"></div>
                                <input type="file" name="file_upload" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="edit_TU_btn" class="btn btn-success">Update</button>
                        </div>
                    </form>
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
                        <div class="breadcrumb-item">Kumpulan tugas</div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <label for="">
                            {{-- <h4>{{ $title }}</h4> --}}
                        </label>
                    </div>
                    <div class="">
                        <div class="row">
                            @if (count($tugas) > 0)
                                @foreach ($tugas as $item)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xl-3 col-xxl-12">
                                        <div class="card shadow card-primary">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <div class=""> <i class="ion-ios-paper h5"></i>
                                                    {{ $item->tugas->matapelajaran->name }}
                                                </div>
                                                <div>
                                                    {{-- @if ($title === 'Belum di kerjakan' || $title === 'Dedline' || $title === 'Selesai') --}}
                                                    {{-- <a href="{{ route('tugassiswaviewdetail', $item->id) }}"
                                                            class="btn btn-primary">Masuk</a> --}}
                                                    <form action="{{ route('tugassiswaviewdetail', $item->id) }}"
                                                        method="get">
                                                        @csrf
                                                        <input type="hidden" name="kategori" value="{{ $kategori }}">
                                                        {{-- <input type="hidden" name="back" value="{{ $back }}"> --}}
                                                        <input type="submit" class="btn btn-primary" value="Masuk">
                                                    </form>
                                                    {{-- @endif --}}
                                                </div>
                                                {{-- <div class="text-right">{{ $item->jadwal->id }}</div> --}}
                                            </div>
                                            <div class="card-body">
                                                <p>{{ $item->tugas->nama }} - {{ $item->tugas->tanggal_pengumpulan }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <label>Deskripsi :</label>
                                                <p>{{ $item->tugas->deskripsi }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
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
