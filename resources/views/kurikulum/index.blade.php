@extends('layouts.template.template')
@section('content')
    <div class="main-content">

        <div class="modal fade" id="add_TU_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kurikulum</h5>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
                    </div>
                    <form action="#" method="POST" id="add_TU_form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="my-2">
                                <label for="">Kelas</label>
                                <select name="tingkatan_id" class="form-control">
                                    <option value="" selected disabled>--Pilih Kelas--</option>
                                    @foreach ($tingkatan as $item)
                                        @if ($item->tingkat === '14')
                                            <option value="{{ $item->id }}">Tk</option>
                                        @endif
                                        @if ($item->tingkat === '13')
                                        @endif
                                        @if (($item->tingkat != '14') & ($item->tingkat != '13'))
                                            <option value="{{ $item->id }}">{{ $item->tingkat }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="my-2">
                                <label for="">Mata Pelajaran</label>
                                <select name="mata_pelajaran_id" class="form-control">
                                    <option value="" selected disabled>--Pilih Mata Pelajaran--</option>
                                    @foreach ($mata_pelajaran as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="my-2">
                                <label for="name">Nama Kurikulum</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Masukan Nama Kurikulum" required>
                            </div>
                            <div class="my-2">
                                <label for="name">deskripsi</label>
                                <textarea name="deskripsi" class="form-control" placeholder="Masukan deskripsi" required></textarea>
                            </div>
                            <div class="my-2">
                                <label for="image">Select lampiran</label>
                                <input type="file" name="lampiran" class="form-control">
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
                                <label for="">Tingkatan</label>
                                <select name="tingkatan_id" id="tingkatan_id" class="form-control">
                                    <option value="" selected disabled>--Pilih Tingkatan--</option>
                                    @foreach ($tingkatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->tingkat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="my-2">
                                <label for="">Mata Pelajaran</label>
                                <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="form-control">
                                    <option value="" selected disabled>--Pilih Mata Pelajaran--</option>
                                    @foreach ($mata_pelajaran as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="my-2">
                                <label for="name">Nama Kurikulum</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Masukan Nama Kurikulum" required>
                            </div>

                            <div class="my-2">
                                <label for="name">deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukan deskripsi" required></textarea>
                            </div>
                            <div class="my-2">
                                <label for="image">Select lampiran</label>
                                <input type="file" id="emp_image" name="lampiran" class="form-control">
                                <p style="color:red;">Kosongkan jika tidak ingin mengganti file</p>
                            </div>
                            <div class="mt-2" id="image">

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
                <h1>Halaman Data Kurikulum</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('manage') }}">Manage</a>
                    </div>
                    <div class="breadcrumb-item">Tabel kurikulum</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row my-5">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                <h3 class="text-light">Tabel Kurikulum</h3>
                                <button class="btn btn-light" data-toggle="modal" data-target="#add_TU_modal"><i
                                        class="bi-plus-circle me-2"></i>Tambah Kurikulum</button>
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
                    url: '{{ route('kurikulum-store') }}',
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
                    url: '{{ route('kurikulum-edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response.tingkatan_id)
                        $("#tingkatan_id").val(response.tingkatan_id);
                        $("#mata_pelajaran_id").val(response.mata_pelajaran_id);
                        $("#name").val(response.name);
                        $("#deskripsi").val(response.deskripsi);
                        $("#image").html(
                            `<a href="/lampirankurikulum/${response.lampiran}" target="_blank">Open File</a>`
                        );
                        $("#emp_image").val(response.lampiran);
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
                    url: '{{ route('kurikulum-update') }}',
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
                            url: '{{ route('kurikulum-delete') }}',
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
                    url: '{{ route('kurikulum-all') }}',
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
