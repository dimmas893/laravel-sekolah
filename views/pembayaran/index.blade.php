@extends('layouts.template.template')
@section('content')
    <div class="main-content">

        {{-- <div class="modal fade" id="add_TU_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
                    </div>
                    <form action="#" method="POST" id="add_TU_form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="my-2">
                                <label for="name">Nama Mata Pelajaran</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Masukan Nama Mata Pelajaran" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="add_TU_btn" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

        {{-- add new employee modal end --}}

        {{-- edit employee modal start --}}
        {{-- <div class="modal fade" id="editTUModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" id="edit_TU_form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="modal-body">
                            <div class="my-2">
                                <label for="name">Nama Mata Pelajaran</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Masukan Nama Mata Pelajaran" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="edit_TU_btn" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
        {{-- edit employee modal end --}}

        <section class="section">
            <div class="section-header">
                <h1>Halaman Data Pembayaran Siswa</h1>
            </div>


            <div class="section-body">
                <div class="row my-5">
                    <div class="col-12 mb-3">
                        <form action="{{ route('pembayaran-export') }}" method="get" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <label for="">Tanggal Awal</label>
                                <input type="date" class="form-control" name="awal" required>
                            </div>
                            <div class="">
                                <label for="">Tanggal Akhir</label>
                                <input type="date" class="form-control" name="akhir" required>
                            </div>
                            <div class="mt-2">
                                <input type="submit" class="btn btn-success" value="Excel">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                <h3 class="text-light">Tabel Data Pembayaran Siswa</h3>
                                {{-- <button class="btn btn-light" data-toggle="modal" data-target="#add_TU_modal"><i
                                        class="bi-plus-circle me-2"></i>Tambah Mata Pelajaran</button> --}}
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
            // $("#add_TU_form").submit(function(e) {
            //     e.preventDefault();
            //     const fd = new FormData(this);
            //     $("#add_TU_btn").text('Adding...');
            //     $.ajax({
            //         url: '{{ route('mata_pelajaran-store') }}',
            //         method: 'post',
            //         data: fd,
            //         cache: false,
            //         contentType: false,
            //         processData: false,
            //         dataType: 'json',
            //         success: function(response) {
            //             if (response.status == 200) {
            //                 Swal.fire(
            //                     'Added!',
            //                     'Added Successfully!',
            //                     'success'
            //                 )
            //                 TU_all();
            //             }
            //             $("#add_TU_btn").text('Save');
            //             $("#add_TU_form")[0].reset();
            //             $("#add_TU_modal").modal('hide');
            //         }
            //     });
            // });
            // edit employee ajax request
            // $(document).on('click', '.editIcon', function(e) {
            //     e.preventDefault();
            //     let id = $(this).attr('id');
            //     $.ajax({
            //         url: '{{ route('mata_pelajaran-edit') }}',
            //         method: 'get',
            //         data: {
            //             id: id,
            //             _token: '{{ csrf_token() }}'
            //         },
            //         success: function(response) {
            //             $("#name").val(response.name);
            //             $("#id").val(response.id);
            //         }
            //     });
            // });
            // update employee ajax request
            // $("#edit_TU_form").submit(function(e) {
            //     e.preventDefault();
            //     const fd = new FormData(this);
            //     $("#edit_TU_btn").text('Updating...');
            //     $.ajax({
            //         url: '{{ route('mata_pelajaran-update') }}',
            //         method: 'post',
            //         data: fd,
            //         cache: false,
            //         contentType: false,
            //         processData: false,
            //         dataType: 'json',
            //         success: function(response) {
            //             if (response.status == 200) {
            //                 Swal.fire(
            //                     'Updated!',
            //                     'Updated Successfully!',
            //                     'success'
            //                 )
            //                 TU_all();
            //             }
            //             $("#edit_TU_btn").text('Update');
            //             $("#edit_TU_form")[0].reset();
            //             $("#editTUModal").modal('hide');
            //         }
            //     });
            // });
            // delete employee ajax request
            // $(document).on('click', '.deleteIcon', function(e) {
            //     e.preventDefault();
            //     let id = $(this).attr('id');
            //     let csrf = '{{ csrf_token() }}';
            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $.ajax({
            //                 url: '{{ route('mata_pelajaran-delete') }}',
            //                 method: 'delete',
            //                 data: {
            //                     id: id,
            //                     _token: csrf
            //                 },
            //                 success: function(response) {
            //                     console.log(response);
            //                     Swal.fire(
            //                         'Deleted!',
            //                         'Your file has been deleted.',
            //                         'success'
            //                     )
            //                     TU_all();
            //                 }
            //             });
            //         }
            //     })
            // });
            // fetch all employees ajax request

            // $(document).on('click', '.deleteIcon', function(e) {
            //     e.preventDefault();
            //     let id = $(this).attr('id');
            //     let csrf = '{{ csrf_token() }}';
            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $.ajax({
            //                 url: '{{ route('pembayaran-delete') }}',
            //                 method: 'delete',
            //                 data: {
            //                     id: id,
            //                     _token: csrf
            //                 },
            //                 success: function(response) {
            //                     console.log(response);
            //                     Swal.fire(
            //                         'Deleted!',
            //                         'Your file has been deleted.',
            //                         'success'
            //                     )
            //                     TU_all();
            //                 }
            //             });
            //         }
            //     })
            // });
            TU_all();

            function TU_all() {
                $.ajax({
                    url: '{{ route('pembayaran-all') }}',
                    method: 'get',
                    success: function(response) {
                        $("#TU_all").html(response);
                        $("table").DataTable({
                            destroy: true,
                            responsive: true,
                        });
                    }
                });
            }
        });
    </script>
@endsection
