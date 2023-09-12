@extends('layouts.template.template')
@section('content')
    <div class="modal fade" id="editTUModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    {{-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <form action="{{ route('tugaseditguruupdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <div class="my-2">
                            <label for="name">Nama Tugas</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                placeholder="Masukan Nama kegiatan" required>
                        </div>
                        <div class="my-2">
                            <label for="name">Tanggal Tugas</label>
                            <input type="date" name="tanggal_tugas" id="tanggal_tugas" class="form-control"
                                placeholder="Masukan Tanggal Tugas" required>
                        </div>
                        <div class="my-2">
                            <label for="name">Tanggal Pengumpulan Tugas</label>
                            <input type="date" name="tanggal_pengumpulan" id="tanggal_pengumpulan" class="form-control"
                                placeholder="Masukan Tanggal Peengumpulan Tugas" required>
                        </div>
                        <div class="my-2">
                            <label for="name">Tanggal Evaluasi Tugas</label>
                            <input type="date" name="tanggal_evaluasi" id="tanggal_evaluasi" class="form-control"
                                placeholder="Masukan Tanggal Evaluasi Tugas" required>
                        </div>
                        <div class="my-2">
                            <label for="name">Deskripsi Tugas</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukan Nama kegiatan" required></textarea>
                        </div>
                        <div class="my-2">
                            <label for="name">File Tugas</label>
                            <div id="file"></div>
                        </div>

                        <div class="my-2">
                            <label for="name">Upload File Tugas</label>
                            <input type="file" name="file_tugas" class="form-control">
                            <p style="color: red;">*kosongkan jika tidak ingin mengganti file tugas</p>
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
    <div id="tabs">
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Tugas</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                        <div class="breadcrumb-item active"><a href="{{ route('menutugasshow') }}">Lihat tugas</a></div>
                        <div class="breadcrumb-item active"><a href="{{ route('menutugasshowkelas') }}">Kelas</a></div>
                        <div class="breadcrumb-item active"><a
                                href="{{ route('menutugasshowkelaslihatdetaillihat', $kelas) }}">Mata pelajaran</a>
                        </div>
                        <div class="breadcrumb-item">Kumpulan tugas</div>
                    </div>
                </div>
                <div class="">
                    {{-- <div class="card-header">
                        <label for="">
                            <h4>Kumpulan tugas kelas
                                {{ \App\Models\Kelas::with('kelas')->where('id', $kelas)->first()->kelas->name }}</h4>
                        </label>
                    </div> --}}
                    <div class="">
                        <div class="row">
                            @if (count($tugas) > 0)
                                @foreach ($tugas as $item)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xl-3 col-xxl-12">
                                        <div class="card shadow card-primary">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <div class=""> {{ $item->tanggal_pengumpulan }}
                                                </div>
                                                <a href="{{ route('tugassiswaall', $item->id) }}"
                                                    class="btn btn-primary">Masuk</a>
                                                <a href="#" id="{{ $item->id }}"
                                                    class="text-success mx-1 editIcon" data-toggle="modal"
                                                    data-target="#editTUModal"><i class="ion-edit h4" data-pack="default"
                                                        data-tags="on, off"></i></a>

                                                <a href="#" id="{{ $item->id }}"
                                                    class="text-danger mx-1 deleteIcon"><i class="ion-trash-a h4"
                                                        data-pack="default" data-tags="on, off"></i></a>
                                            </div>
                                            <div class="card-body">
                                                <p>{{ $item->nama }}</p>
                                                <label>Deskripsi :</label>
                                                <p>{{ $item->deskripsi }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <p>Siswa belum mengerjakan :
                                                    {{ \App\Models\Kumpul_Tugas::where('tugas_id', $item->id)->where('file_upload', null)->count() }}
                                                </p>
                                                <p>Siswa mengerjakan :
                                                    {{ \App\Models\Kumpul_Tugas::where('tugas_id', $item->id)->where('file_upload', '!=', null)->count() }}
                                                </p>
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
    <script>
        $(function() {
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('tugaseditgurudimmas') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response)
                        $("#file").text('');
                        $("#nama").val(response.nama);
                        $("#tanggal_tugas").val(response.tanggal_tugas);
                        $("#tanggal_pengumpulan").val(response.tanggal_pengumpulan);
                        $("#tanggal_evaluasi").val(response.tanggal_evaluasi);
                        $("#deskripsi").val(response.deskripsi);
                        $("#file").append(`
                             <div style="width: 100%; height: 100vh; overflow: hidden; overflow-y: scroll">
                                <embed src="/file_tugas/${response.file_tugas}" width="100%"
                                    height="100%">
                            </div>
                            `);
                        $("#id").val(response.id);
                    }
                });
            });

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
                            url: '{{ route('tugas-delete') }}',
                            method: 'post',
                            data: {
                                id: id,
                                _token: csrf
                            },
                            success: function(response) {
                                // setTimeout()
                                // // location.reload();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                setTimeout((function() {
                                    window.location.reload();
                                }), 3000)
                                // setTimeout(location.reload(), 5000)
                            }
                        });
                    }
                })
            });
        });
    </script>
@endsection
