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
                <h1>Data Pembayaran Pendaftaran</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu</a></div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('selectjenjangkonfirmasibuktibayar-jenjang') }}">Jenjang</a></div>
                    <div class="breadcrumb-item">Konfirmasi pembayaran</div>
                </div>
            </div>
            <div class="section-body">
                @if (count($pendaftaran) > 0)
                    <form name="form1" action="{{ route('absen-seleksi-massal') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Pembayaran Pendaftaran</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            #
                                                        </th>
                                                        <th>Nama</th>
                                                        <th>Nomor Pendaftaran</th>
                                                        <th>Bukti Bayar</th>
                                                        <th>Konfirmasi Pembayaran</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pendaftaran as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->nama_siswa }}</td>
                                                            <td>{{ $item->nomor_pendaftaran }}</td>
                                                            <td>
                                                                @if ($item->bukti_bayar != null)
                                                                    <img alt="Belum melakukan pembayaran"
                                                                        src="{{ asset('bukti_bayar/' . $item->bukti_bayar) }}"
                                                                        class="rounded-circle" width="50"
                                                                        data-toggle="tooltip"
                                                                        title="bukti bayar {{ $item->nama_siswa }}">
                                                                    <a href="#" id="{{ $item->id }}"
                                                                        class="text-success mx-1 editIcon"
                                                                        data-toggle="modal" data-target="#editTUModal">Bukti
                                                                        Pembayaran</a>
                                                                @else
                                                                    Belum melakukan pembayaran
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if ($item->status === 'paid')
                                                                    <div class="badge badge-success">Terbayar</div>
                                                                @else
                                                                    <div class="badge badge-danger">Belum di tinjau</div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($item->status != 'paid' && $item->bukti_bayar != null)
                                                                    <a href="{{ route('ubahstatuskonfirmasi', $item->id) }}"
                                                                        class="btn btn-primary">Konfirmasi pembayaran</a>
                                                                @else
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
                    </form>
                @else
                    <div class="card">
                        <div class="card-header">Tidak ada data pendaftaran</div>
                    </div>
                @endif

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
