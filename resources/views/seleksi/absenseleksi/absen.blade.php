@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Absensi</h1>
            </div>
            <div class="section-body">
                <input class="form-control searchname mb-3" type="search"
                    placeholder="Pencarian berdasarkan nomor pendaftaran">
                {{ csrf_field() }}
                <div id="data">
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            $(document).ready(function() {
                $('#show_data_table').hide();
                $('.searchname').keyup(function() {
                    var searchname = $('.searchname').val();
                    if (searchname != '') {
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            type: 'post',
                            url: "/autocomplete-search-query/{{ $jenjang }}/{{ $tanggalseleksiid }}",
                            data: {
                                'name': searchname,
                                '_token': _token,
                            },
                            success: function(response) {
                                $('#show_data_table').fadeIn();
                                $('#data').html(response);
                            }
                        });
                    } else {
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            type: 'post',
                            url: "/autocomplete-search-query/{{ $jenjang }}/{{ $tanggalseleksiid }}",
                            data: {
                                '_token': _token,
                            },
                            success: function(response) {
                                $('#show_data_table').fadeIn();
                                $('#data').html(response);
                            }
                        });
                    }
                });
            });


            TU_all()

            function TU_all() {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: 'post',
                    url: "/autocomplete-search-query/{{ $jenjang }}/{{ $tanggalseleksiid }}",
                    data: {
                        '_token': _token,
                    },
                    success: function(response) {
                        $('#show_data_table').fadeIn();
                        $('#data').html(response);
                    }
                });
            }
        });
    </script>
@endsection
