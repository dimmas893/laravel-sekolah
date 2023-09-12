@extends('layouts.template.template')
@section('content')
    <div class="main-content">

        <div class="">
            <div class="modal fade" id="add_TU_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tahun Ajaran</h5>
                        </div>
                        <form action="#" method="POST" id="add_TU_form" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="my-2">
                                    <label for="name">Tahun Ajaran</label>
                                    <select name="tahun_ajaran_id" class="form-control">
                                        <option value="" selected disabled>---Pilih Tahun Ajaran---</option>
                                        @foreach ($tahunajaran as $item)
                                            <option value="{{ $item->id }}">{{ $item->tahun_ajaran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="my-2">
                                    <label for="name">Tanggal Mulai</label>
                                    <input type="date" name="tanggalmulai" class="form-control" required>
                                </div>
                                <div class="my-2">
                                    <label for="name">Tanggal Akhir</label>
                                    <input type="date" name="tanggalakhir" class="form-control" required>
                                </div>
                                <div class="my-2">
                                    <label for="name">Gelombang</label>
                                    <input type="number" name="gelombang" placeholder="Masukan Gelombang"
                                        class="form-control" required>
                                </div>
                                <div class="my-2">
                                    <label for="name">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="" disabled selected>---Pilih Status---</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidakaktif">Tidak Aktif</option>
                                    </select>
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
            <div class="modal fade" id="editTUModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                data-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        </div>
                        <form action="#" method="POST" id="edit_TU_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="tahun_ajaran_id" id="tahun_ajaran_id">
                            <div class="modal-body">
                                <div class="my-2">
                                    <label for="name">Tahun Ajaran</label>
                                    <select name="tahun_ajaran_id" id="tahun_ajaran_id" disabled class="form-control"
                                        required>
                                        @foreach ($tahunajaran as $item)
                                            <option value="{{ $item->id }}">{{ $item->tahun_ajaran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="my-2">
                                    <label for="name">Tanggal Mulai</label>
                                    <input type="date" name="tanggalmulai" id="tanggalmulai" class="form-control"
                                        required>
                                </div>
                                <div class="my-2">
                                    <label for="name">Tanggal Akhir</label>
                                    <input type="date" name="tanggalakhir" id="tanggalakhir" class="form-control"
                                        required>
                                </div>
                                <div class="my-2">
                                    <label for="name">Gelombang</label>
                                    <input type="number" name="gelombang" placeholder="Masukan Gelombang" id="gelombang"
                                        class="form-control" required>
                                </div>
                                <div class="my-2">
                                    <label for="name">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="" disabled selected>---Pilih Status---</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidakaktif">Tidak Aktif</option>
                                    </select>
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
        </div>

        <section class="section">
            <div class="section-header">
                <h1>Halaman Data Tanggal Seleksi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('manage') }}">Manage</a>
                    </div>
                    <div class="breadcrumb-item">Tabel tanggal seleksi</div>
                </div>
            </div>


            <div class="section-body">
                <div class="row my-5">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                <h3 class="text-light">Tabel Tanggal Seleksi</h3>
                                <button class="btn btn-light" data-toggle="modal" data-target="#add_TU_modal"><i
                                        class="bi-plus-circle me-2"></i>Tambah Tanggal Seleksi</button>
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
    <script>
        $(function() {
            // add new employee ajax request
            $("#add_TU_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_TU_btn").text('Adding...');
                $.ajax({
                    url: '{{ route('tanggalseleksi-store') }}',
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
                            $("#add_TU_btn").text('Save');
                            $("#add_TU_form")[0].reset();
                            $("#add_TU_modal").modal('hide');
                        } else {
                            Swal.fire(
                                'Opss!',
                                'Tanggal seleksi yang aktif hanya bisa 1!',
                                'info'
                            )
                        }
                    }
                });
            });
            // edit employee ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('tanggalseleksi-edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#tahun_ajaran_id").val(response.tahun_ajaran_id);
                        $("#tanggalmulai").val(response.tanggalmulai);
                        $("#tanggalakhir").val(response.tanggalakhir);
                        $("#gelombang").val(response.gelombang);
                        $("#status").val(response.status);
                        $("#id").val(response.id);
                    }
                });
            });
            // update employee ajax request
            $("#edit_TU_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_TU_btn").text('Updating...');
                $.ajax({
                    url: '{{ route('tanggalseleksi-update') }}',
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
                            $("#edit_TU_btn").text('Update');
                            $("#edit_TU_form")[0].reset();
                            $("#editTUModal").modal('hide')
                        } else {
                            Swal.fire(
                                'Opss!',
                                'Tanggal seleksi yang aktif hanya bisa 1!',
                                'info'
                            )
                        };
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
                            url: '{{ route('tanggalseleksi-delete') }}',
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
                    url: '{{ route('tanggalseleksi-all') }}',
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
