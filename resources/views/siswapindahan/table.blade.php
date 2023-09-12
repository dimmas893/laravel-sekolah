@extends('layouts.template.template')
@section('content')
    <div class="modal fade" id="editTUModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                    {{-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <form action="#" method="POST" id="edit_TU_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="emp_image" id="emp_image">
                    <div class="modal-body">
                        <div class="mt-2" id="image">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Pendaftaran Siswa Pindahan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('siswa-pindahan-view-jenjang') }}">Jenjang</a>
                    </div>
                    <div class="breadcrumb-item">Daftar ulang</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pendaftaran Siswa Pindahan Tahun Ajaran {{ $tahun_ajaran }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Nama Siswa</th>
                                                <th>Email</th>
                                                <th>Asal Sekolah</th>
                                                <th>Kelas</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Bukti Bayar</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{ dd($pendaftaran) }} --}}
                                            @foreach ($pendaftaran as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama_siswa }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->asal_sekolah }}</td>
                                                    <td>{{ $item->tingkat }}</td>
                                                    <td>{{ $item->jenis_kelamin }}</td>
                                                    <td>
                                                        @if ($item->bukti_bayar != null)
                                                            <img alt=""
                                                                src="{{ asset('bukti_bayar/' . $item->bukti_bayar) }}"
                                                                class="rounded-circle" width="50" data-toggle="tooltip"
                                                                title="bukti bayar {{ $item->nama_siswa }}">
                                                            <a href="#" id="{{ $item->id }}"
                                                                class="text-success mx-1 editIcon" data-toggle="modal"
                                                                data-target="#editTUModal">Bukti
                                                                Pembayaran</a>
                                                        @else
                                                            Belum melakukan pembayaran
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if ($item->bukti_bayar === null)
                                                            Belum melakukan pembayaran
                                                        @else
                                                            <a class="btn btn-info"
                                                                href="{{ route('konfirmasi-diterima-siswa-pindahan', $item->id) }}">Lihat</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('bukti_bayar-edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response.id)
                        $("#image").html(
                            `<img src="/bukti_bayar/${response.bukti_bayar}" width="100%">`
                        );
                        $("#emp_image").val(response.bukti_bayar);
                        $("#id").val(response.id);
                    }
                });
            });

        });
    </script>
@endsection
