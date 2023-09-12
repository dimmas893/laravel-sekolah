@extends('layouts.template.template')
@section('content')
    <div class="main-content">

        <div class="modal fade" id="add_TU_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data perpustakaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#" method="POST" id="add_TU_form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="isMember my-2">
                                <label for="name">Jenis Buku</label>
                                <select id="package" name="jenis" class="form-control">
                                    <option value="" selected disabled>---Pilih Jenis---</option>
                                    <option value="ebook">Ebook</option>
                                    <option value="fisik">Fisik</option>
                                </select>
                            </div>

                            <div class="my-2">
                                <label>Katagoti Buku</label>
                                <select class="form-control select2" name="kategoribuku[]" style="width: 100%"
                                    multiple="">
                                    {{-- <option selected disabled>---Pilih Kategori---</option> --}}
                                    @foreach ($kategori_buku as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="my-2 mt-3">
                                <div id="sma">

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
        <div class="modal fade" id="editTUModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit <div class="my-2">
                                <div id="dim"></div>
                            </div>
                        </h5>
                        {{-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <form action="#" method="POST" id="edit_TU_form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="emp_image" id="emp_image">
                        <div class="modal-body">
                            <div class="my-2">
                                <label for="">Jenis Buku</label>
                                <select name="jenis" id="jenis" class="form-control">
                                    <option value="" selected disabled>---Pilih Jenis---</option>
                                    <option value="ebook">Ebook</option>
                                    <option value="fisik">Fisik</option>
                                </select>
                            </div>
                            <div class="my-2">
                                <label>Katagoti Buku</label>
                                <select class="form-control select2" name="dimmas[]" style="width: 100%" multiple="">
                                    {{-- @foreach ($kategori_buku as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach --}}
                                    {{-- <option selected disabled>---Pilih Kategori---</option> --}}

                                </select>
                            </div>
                            <div class="mt-2" id="jenisbuku">

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
                <h1>Halaman Data perpustakaan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('manage') }}">Manage</a>
                    </div>
                    <div class="breadcrumb-item">Tabel perpustakaan</div>
                </div>
            </div>


            <div class="section-body">
                <div class="row my-5">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                <h3 class="text-light">Tabel perpustakaan</h3>
                                <button class="btn btn-light" data-toggle="modal" data-target="#add_TU_modal"><i
                                        class="bi-plus-circle me-2"></i>Tambah perpustakaan</button>
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
    <!-- JS Libraies -->
    <!-- CSS Libraries -->
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
    <script src="/assets/js/page/forms-advanced-forms.js"></script>
    <script>
        $('.isMember').on('change', function(e) {
            const selectedPackage = $('#package').val();
            e.preventDefault();
            $.ajax({
                url: '{{ route('perpustakaanjenis') }}',
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
        $(function() {
            // add new employee ajax request
            $("#add_TU_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_TU_btn").text('Adding...');
                $.ajax({
                    url: '{{ route('perpustakaan-store') }}',
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
                // $('select[name="dimmas"]').text('')
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('perpustakaan-edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },

                    success: function(response) {
                        var tes = response.kategori;

                        $('select[name="dimmas[]"]').text('');
                        $.each(tes, function(index, value) {

                            // console.log(index)
                            // $.each(response.kategoriasli, function(pe, asli) {
                            // if (value.id === asli.id) {
                            $('select[name="dimmas[]"]').append(
                                "<option selected value='" + value
                                .id + "'>" +
                                value.namakategori + "</option>");
                            // }



                            // });
                        });

                        $.each(response.kategori_buku, function(index, value) {

                            // console.log(index)
                            // $.each(response.kategoriasli, function(pe, asli) {
                            // if (value.id === asli.id) {
                            $('select[name="dimmas[]"]').append(
                                "<option value='" + value
                                .id + "'>" +
                                value.nama_kategori + "</option>");
                            // }
                            // });
                        });
                        // `<select class="form-control select2" name="kategoribuku[]" style="width: 100%" multiple="">`

                        // `</select>`

                        // $('select[name="dimmas"]').remove();
                        // $("#dim").html('#kategori');

                        $("#judul_buku").val(response.buku.judul);
                        $("#jenis").val(response.buku.jenis);
                        $("#sinopsis").val(response.buku.sinopsis);
                        $("#isbn_no").val(response.buku.isbn_no);
                        $("#penerbit").val(response.buku.penerbit);
                        $("#penulis").val(response.buku.penulis);
                        $("#rak").val(response.buku.rak);
                        $("#jumlah").val(response.buku.jumlah);
                        $("#harga").val(response.buku.harga);
                        $("#kategori_id").val(response.buku.kategori_id);
                        $("#bahasa").val(response.buku.bahasa);
                        $("#jumlah_halaman").val(response.buku.jumlah_halaman);

                        $("#image").html(
                            `<img src="/sampul/${response.buku.sampul}" width="100" class="img-fluid img-thumbnail">`
                        );
                        console.log(response.buku.jenis);
                        if (response.buku.jenis === 'ebook') {
                            $("#jenisbuku").html(
                                `<div class="my-2">
                                <label for="name">Judul Buku</label>
                                <input type="text" value="${response.buku.judul}" name="judul_buku" class="form-control"
                                    placeholder="Masukan Judul Buku">
                            </div>
                            <div class="my-2">
                                <label for="name">Penerbit</label>
                                <input type="text" name="penerbit" value="${response.buku.penerbit}" class="form-control" placeholder="Masukan Penerbit">
                            </div>
                            <div class="my-2">
                                <label for="name">Penulis</label>
                                <input type="text" name="penulis" value="${response.buku.penulis}" class="form-control" placeholder="Masukan Penulis">
                            </div>
                            <div class="my-2">
                                <label for="name">Bahasa</label>
                                <input type="text" name="bahasa"value="${response.buku.bahasa}" class="form-control" placeholder="Masukan Bahasa">
                            </div>

                            <div class="my-2">
                                <label for="name">Sampul</label>
                                <input type="file" name="sampul" class="form-control" placeholder="Masukan Sampul">
                                <img src="/sampul/${response.buku.sampul}" width="100" class="img-fluid img-thumbnail">
                            </div>
                            <div class="my-2">
                                <label for="name">File Ebook</label>
                                <input type="file" name="file_ebook" value="${response.buku.file_ebook}" class="form-control">
                                <p style="color:red;" >*kosongkan jika tidak ingin mengganti</p>
                                <a href="/bacabukuebook/${response.buku.file_ebook}" target="_blank">${response.buku.file_ebook}</a>
                            </div>
                            <div class="my-2">
                                <label for="name">Jumlah Halaman</label>
                                <input type="number" name="jumlah_halaman" value="${response.buku.jumlah_halaman}" class="form-control"
                                    placeholder="Masukan Jumlah Halaman">
                            </div>`
                            );
                        } else {
                            $("#jenisbuku").html(
                                `<div class="my-2">
                                <label for="name">Judul Buku</label>
                                <input type="text" value="${response.buku.judul}" name="judul_buku" class="form-control"
                                    placeholder="Masukan Judul Buku">
                            </div>
                            <div class="my-2">
                            </div>
                            <div class="my-2">
                                <label for="name">Isbn No</label>
                                <input type="number" value="${response.buku.isbn_no}" name="isbn_no" class="form-control" placeholder="Masukan Isbn No">
                            </div>

                            <div class="my-2">
                                <label for="name">Rak</label>
                                <input type="text" name="rak" value="${response.buku.rak}" class="form-control" placeholder="Masukan No Rak">
                            </div>

                            <div class="my-2">
                                <label for="name">Jumlah Buku</label>
                                <input type="number" name="jumlah" value="${response.buku.jumlah}" class="form-control" placeholder="Masukan Jumlah">
                            </div>

                            <div class="my-2">
                                <label for="name">Harga</label>
                                <input type="number" name="harga" value="${response.buku.harga}" class="form-control" placeholder="Masukan Harga">
                            </div>

                            <div class="my-2">
                                <label for="name">Sampul</label>
                                <input type="file" name="sampul" class="form-control" placeholder="Masukan Sampul">
                                <img src="/sampul/${response.buku.sampul}" width="100" class="img-fluid img-thumbnail">
                            </div>

                            <div class="my-2">
                                <label for="name">Sinopsis</label>
                                <textarea name="sinopsis" value="${response.buku.sinopsis}" class="form-control" placeholder="Masukan Sinopsis"></textarea>
                            </div>
                            <div class="my-2">
                                <label for="name">Penerbit</label>
                                <input type="text" name="penerbit" value="${response.buku.penerbit}" class="form-control" placeholder="Masukan Penerbit">
                            </div>
                            <div class="my-2">
                                <label for="name">Penulis</label>
                                <input type="text" name="penulis" class="form-control" value="${response.buku.penulis}" placeholder="Masukan Penulis">
                            </div>
                            <div class="my-2">
                                <label for="name">Bahasa</label>
                                <input type="text" name="bahasa" value="${response.buku.bahasa}" class="form-control" placeholder="Masukan Bahasa">
                            </div>

                            <div class="my-2">
                                <label for="name">Jumlah Halaman</label>
                                <input type="number" name="jumlah_halaman" value="${response.buku.jumlah_halaman}" class="form-control"
                                    placeholder="Masukan Jumlah Halaman">
                            </div>`
                            )
                        }
                        $("#emp_image").val(response.buku.sampul);
                        $("#id").val(response.buku.id);
                    }
                });
            });
            // update employee ajax request
            $("#edit_TU_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_TU_btn").text('Updating...');
                $.ajax({
                    url: '{{ route('perpustakaan-update') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire(
                                'Updated!',
                                'Updated Successfully!',
                                'success'
                            )
                            TU_all();
                        }
                        $("#edit_TU_btn").text('Update');
                        $("#edit_TU_form")[0].reset();
                        $("#editTUModal").modal('hide');
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
                            url: '{{ route('perpustakaan-delete') }}',
                            method: 'post',
                            data: {
                                id: id,
                                _token: csrf
                            },
                            success: function(response) {
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
            // fetch all employees ajax request
            TU_all();

            function TU_all() {
                $.ajax({
                    url: '{{ route('perpustakaan-all') }}',
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
