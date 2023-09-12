@extends('layouts.template.template')
@section('content')
    <div class="main-content">

        <div class="modal fade" id="add_TU_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data kegiatan</h5>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
                    </div>
                    <form action="#" method="POST" id="add_TU_form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="my-2">
                                <label for="name">Nama kegiatan</label>
                                <input type="text" name="nama_kegiatan" class="form-control"
                                    placeholder="Masukan Nama kegiatan">
                            </div>

                            <div class="my-2">
                                <label for="name">Deskripsi kegiatan</label>
                                <textarea name="deskripsi" class="form-control" placeholder="Masukan Deskripsi kegiatan"></textarea>
                            </div>

                            <div class="my-2">
                                <label for="name">Tanggal Kegiatan</label>
                                <input type="date" name="tanggal" class="form-control"
                                    placeholder="Masukan Tanggal Kegiatan">
                            </div>

                            <div class="my-2">
                                <label for="name">Jam Mulai Kegiatan</label>
                                <input type="time" name="jam_mulai" class="form-control"
                                    placeholder="Masukan Jam Mulai Kegiatan">
                            </div>

                            <div class="my-2">
                                <label for="name">Jam Berakhir Kegiatan</label>
                                <input type="time" name="jam_berakhir" class="form-control"
                                    placeholder="Masukan Jam Berakhir Kegiatan">
                            </div>
                            <div class="my-2">
                                <label for="name">Catatan</label>
                                <input type="text" name="catatan" class="form-control"
                                    placeholder="Masukan Catatan Kegiatan">
                            </div>
                            <div class="my-2">
                                <label for="name">Nama Penanggung Jawab</label>
                                <input type="text" name="nama" class="form-control"
                                    placeholder="Masukan Nama Penanggung Jawab">
                            </div>
                            <div class="my-2">
                                <label for="name">Kontak Penanggung Jawab</label>
                                <input type="number" name="kontak" class="form-control"
                                    placeholder="Masukan Kontak Penanggung Jawab">
                            </div>
                            <div class="my-2">
                                <label for="name">Jenis Kontak</label>
                                <input type="text" name="jenis_kontak" class="form-control"
                                    placeholder="Masukan Jenis Kontak">
                            </div>

                            <div class="my-2">
                                <label for="name">Status Kegiatan</label>
                                <select name="status" class="form-control">
                                    <option value="" selected disabled>---Pilih Status---</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>

                            <div class="my-2">
                                <label for="">Gambar</label>
                                <div class="input-group hdtuto control-group lst increment">
                                    <input type="file" name="filenames[]" class="myfrm form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success gambaradd" type="button"><i
                                                class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                    </div>
                                </div>

                                <div class="clone hide">
                                    <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                        <input type="file" name="filenames[]" required class="myfrm form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger" type="button"><i
                                                    class="fldemo glyphicon glyphicon-remove"></i>
                                                Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="my-2">
                                <label for="">Lampiran</label>
                                <div class="input-group hdtutolampiran control-group lst incrementlampiran">
                                    <input type="text" name="namalampiran[]" placeholder="Nama Lampiran"
                                        class="form-control">
                                    <input type="file" name="lampiran[]" class="myfrm form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success lampiranadd" type="button"><i
                                                class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                    </div>
                                </div>

                                <div class="clonelampiran hide">
                                    <div class="hdtutolampiran control-group lst input-group" style="margin-top:10px">
                                        <input type="text" name="namalampiran[]" required placeholder="Nama Lampiran"
                                            class="form-control">
                                        <input type="file" name="lampiran[]" required class="myfrm form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger btn-danger-lampiran" type="button"><i
                                                    class="fldemo glyphicon glyphicon-remove"></i>
                                                Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="add_TU_btn" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- add new employee modal end --}}

        {{-- edit employee modal start --}}
        <div class="modal fade" id="editTUModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            data-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        {{-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <form action="#" method="POST" id="edit_TU_form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="emp_image" id="emp_image">
                        <div class="modal-body">
                            <div class="my-2">
                                <p>Gambar</p>
                                <gambarkegiatan name="dimmas[]"></gambarkegiatan>
                                <hr>
                            </div>
                            <div class="my-2">
                                <p>Lampiran</p>
                                <gambarkegiatanlampiran name="dimmas[]"></gambarkegiatanlampiran>
                                <hr>
                            </div>
                            <div class="my-2">
                                <label for="name">Nama kegiatan</label>
                                <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control"
                                    placeholder="Masukan Nama kegiatan" required>
                            </div>

                            <div class="my-2">
                                <label for="name">Deskripsi kegiatan</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukan Deskripsi kegiatan" required></textarea>
                            </div>

                            <div class="my-2">
                                <label for="name">Tanggal Kegiatan</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control"
                                    placeholder="Masukan Tanggal Kegiatan" required>
                            </div>

                            <div class="my-2">
                                <label for="name">Jam Mulai Kegiatan</label>
                                <input type="time" name="jam_mulai" id="jam_mulai" class="form-control"
                                    placeholder="Masukan Jam Mulai Kegiatan" required>
                            </div>

                            <div class="my-2">
                                <label for="name">Jam Berakhir Kegiatan</label>
                                <input type="time" name="jam_berakhir" id="jam_berakhir" class="form-control"
                                    placeholder="Masukan Jam Berakhir Kegiatan" required>
                            </div>


                            <div class="my-2">
                                <label for="name">Catatan</label>
                                <input type="text" name="catatan" id="catatan" class="form-control"
                                    placeholder="Masukan Catatan Kegiatan" required>
                            </div>
                            <div class="my-2">
                                <label for="name">Nama Penanggung Jawab</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="Masukan Nama Penanggung Jawab" required>
                            </div>
                            <div class="my-2">
                                <label for="name">Kontak Penanggung Jawab</label>
                                <input type="number" name="kontak" id="kontak" class="form-control"
                                    placeholder="Masukan Kontak Penanggung Jawab" required>
                            </div>
                            <div class="my-2">
                                <label for="name">Jenis Kontak</label>
                                <input type="text" name="jenis_kontak" id="jenis_kontak" class="form-control"
                                    placeholder="Masukan Jenis Kontak" required>
                            </div>

                            <div class="my-2">
                                <label for="name">Status Kegiatan</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="" selected disabled>---Pilih Status---</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>


                            <div class="my-2">
                                <label for="">Gambar</label>
                                <div class="input-group hdtuto control-group lst increment">
                                    <input type="file" name="filenames[]" class="myfrm form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success gambaradd" type="button"><i
                                                class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                    </div>
                                </div>

                                <div class="clone hide">
                                    <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                        <input type="file" name="filenames[]" required class="myfrm form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger" type="button"><i
                                                    class="fldemo glyphicon glyphicon-remove"></i>
                                                Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="my-2">
                                <label for="">Lampiran</label>
                                <div class="input-group hdtutolampiran control-group lst incrementlampiran">
                                    <input type="text" name="namalampiran[]" placeholder="Nama Lampiran"
                                        class="form-control">
                                    <input type="file" name="lampiran[]" class="myfrm form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success lampiranadd" type="button"><i
                                                class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                    </div>
                                </div>

                                <div class="clonelampiran hide">
                                    <div class="hdtutolampiran control-group lst input-group" style="margin-top:10px">
                                        <input type="text" name="namalampiran[]" required placeholder="Nama Lampiran"
                                            class="form-control">
                                        <input type="file" name="lampiran[]" required class="myfrm form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger btn-danger-lampiran" type="button"><i
                                                    class="fldemo glyphicon glyphicon-remove"></i>
                                                Remove</button>
                                        </div>
                                    </div>
                                </div>
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
        {{-- edit employee modal end --}}

        <section class="section">
            <div class="section-header">
                <h1>Halaman Data Kegiatan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('manage') }}">Manage</a>
                    </div>
                    <div class="breadcrumb-item">Tabel kegiatan</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row my-5">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                <h3 class="text-light">Tabel Kegiatan</h3>
                                <button class="btn btn-light" data-toggle="modal" data-target="#add_TU_modal"><i
                                        class="bi-plus-circle me-2"></i>Tambah Kegiatan</button>
                            </div>
                            <div>
                                <div class="card-body" id="TU_all">
                                    <h1 class="text-secondary my-5 text-center">
                                        <div class="load-3">
                                            <div class="line"></div>
                                            <div class="line"></div>
                                            <div class="line"></div>
                                        </div>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {

            $(".gambaradd").click(function() {

                var lsthmtl = $(".clone").html();

                $(".increment").after(lsthmtl);
            });

            $("body").on("click", ".btn-danger", function() {

                $(this).parents(".hdtuto").remove();
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $(".lampiranadd").click(function() {

                var lsthmtl = $(".clonelampiran").html();

                $(".incrementlampiran").after(lsthmtl);
            });

            $("body").on("click", ".btn-danger-lampiran", function() {

                $(this).parents(".hdtutolampiran").remove();
            });
        });
    </script>
    <link rel="stylesheet" href="/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="/assets/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/assets/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

    <script src="/assets/modules/cleave-js/dist/cleave.min.js"></script>
    <script src="/assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
    <script src="/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script>
        $(function() {
            // add new employee ajax request
            $("#add_TU_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_TU_btn").text('Adding...');
                $.ajax({
                    url: '{{ route('kegiatan-store') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire(
                                'Added!',
                                'Added Successfully!',
                                'success'
                            )
                            TU_all();
                        }
                        $("#add_TU_btn").text('Save');
                        $("#add_TU_form")[0].reset();
                        $("#add_TU_modal").modal('hide');
                    }
                });
            });
            // edit employee ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('kegiatan-edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response.jam_berakhir)
                        $("#nama_kegiatan").val(response.emp.nama_kegiatan);
                        $("#catatan").val(response.emp.catatan);
                        $("#nama").val(response.emp.nama);
                        $("#jenis_kontak").val(response.emp.jenis_kontak);
                        $("#kontak").val(response.emp.kontak);
                        $("#deskripsi").val(response.emp.deskripsi);
                        $("#jam_mulai").val(response.emp.jam_mulai);
                        $("#jam_berakhir").val(response.emp.jam_berakhir);
                        $("#tanggal").val(response.emp.tanggal);
                        $("#status").val(response.emp.status);
                        $("#id").val(response.emp.id);
                        $.each(response.gambar, function(index, value) {
                            $('gambarkegiatan').append(
                                `<img src="/kegiatan/${value.gambar}" width="100" class="img-fluid img-thumbnail">
                                    <a href="#" dimmaskun="${value.id}" class="text-danger mx-1 deletegambar"><i class="ion-trash-a h4" data-pack="default" data-tags="on, off"></i></a>`
                            );
                        });
                        $.each(response.lampiran, function(index, value) {
                            $('gambarkegiatanlampiran').append(
                                `<div class="row">
                                    <div class="col-8">
                                        <input type="text" class="form-control" name="namalampiran" value="${value.nama}">
                                    </div>
                                    <div class="col-4">
                                        <img src="/kegiatan/${value.lampiran_kegiatan}" width="100" class="img-fluid img-thumbnail">
                                        <a href="#" dimmaskunlampiran="${value.id}" class="text-danger mx-1 deletegambarlampiran"><i class="ion-trash-a h4" data-pack="default" data-tags="on, off"></i></a>
                                     </div>
                                </div> `
                            );
                        });
                    }
                });
            });
            // update employee ajax request
            $("#edit_TU_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_TU_btn").text('Updating...');
                $.ajax({
                    url: '{{ route('kegiatan-update') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        $('gambarkegiatan').text('');
                        $('gambarkegiatanlampiran').text('');
                        // // console.log(response);
                        // $.each(response.gambar, function(index, value) {
                        //     $('gambarkegiatan').append(
                        //         `<img src="/kegiatan/${value.gambar}" width="100" class="img-fluid img-thumbnail">
                    //             <a href="#" dimmaskun="${value.id}" class="text-danger mx-1 deletegambar"><i class="ion-trash-a h4" data-pack="default" data-tags="on, off"></i></a>`
                        //     );
                        // });
                        if (response.status === 200) {
                            Swal.fire(
                                'Updated!',
                                'Updated Successfully!',
                                'success'
                            )
                            TU_all();

                            $("#edit_TU_btn").text('Update');
                            $("#edit_TU_form")[0].reset();
                            // $(".btn-success gambaradd").text('');
                            $("#editTUModal").modal('hide');
                        }
                    }
                });
            });
            // delete employee ajax request
            $(document).on('click', '.deleteIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('kegiatan-delete') }}',
                            method: 'post',
                            data: {
                                id: id,
                                _token: csrf
                            },
                            success: function(response) {

                                // $('gambarkegiatan').text('');
                                console.log(response);
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                TU_all();
                            }
                        });
                    }
                })
            });

            $(document).on('click', '.deletegambar', function(e) {
                e.preventDefault();
                let id = $(this).attr('dimmaskun');
                let csrf = '{{ csrf_token() }}';
                $.ajax({
                    url: '{{ route('deletegambarkegiatan') }}',
                    method: 'post',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function(response) {
                        $('gambarkegiatan').text('');
                        $.each(response, function(index, value) {
                            $('gambarkegiatan').append(
                                `<img src="/kegiatan/${value.gambar}" width="100" class="img-fluid img-thumbnail">
                                    <a href="#" dimmaskun="${value.id}" class="text-danger mx-1 deletegambar"><i class="ion-trash-a h4" data-pack="default" data-tags="on, off"></i></a>`
                            );
                        });
                        console.log(response);
                    }
                });
            });

            $(document).on('click', '.deletegambarlampiran', function(e) {
                e.preventDefault();
                let id = $(this).attr('dimmaskunlampiran');
                let csrf = '{{ csrf_token() }}';
                $.ajax({
                    url: '{{ route('deletegambarkegiatanlampiran') }}',
                    method: 'post',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function(response) {
                        $('gambarkegiatanlampiran').text('');
                        $.each(response, function(index, value) {
                            $('gambarkegiatanlampiran').append(
                                `<div class="row">
                                    <div class="col-8">
                                        <input type="text" class="form-control" name="namalampiran" value="${value.nama}">
                                    </div>
                                    <div class="col-4">
                                        <img src="/kegiatan/${value.lampiran_kegiatan}" width="100" class="img-fluid img-thumbnail">
                                        <a href="#" dimmaskunlampiran="${value.id}" class="text-danger mx-1 deletegambarlampiran"><i class="ion-trash-a h4" data-pack="default" data-tags="on, off"></i></a>
                                     </div>
                                </div> `
                            );
                        });
                        console.log(response);
                    }
                });
            });

            TU_all();

            function TU_all() {
                $.ajax({
                    url: '{{ route('kegiatan-all') }}',
                    method: 'get',
                    success: function(response) {
                        $("#TU_all").html(response);
                        $("table").DataTable({
                            destroy: true,
                            responsive: true
                        });
                    }
                });
            }
        });
    </script>
@endsection
