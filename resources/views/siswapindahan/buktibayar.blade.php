{{-- @if ($pendaftaran->bukti_bayar === null) --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if ($pendaftaran->bukti_bayar === null)
    @else
        <div>
            <img src="{{ asset('bukti_bayar/' . $pendaftaran->bukti_bayar) }}" alt="">
        </div>
    @endif
    <form action="{{ route('bukti-pembayaran-siswa') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $pendaftaran->id }}">
        <input type="file" name="bukti_bayar">
        <input type="submit" value="bukti_bayar">
    </form>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('pembayaranbuktibayar'))
        <script type="text/javascript">
            Swal.fire(
                'Berhasil melakukan pembayaran',
                'Harap menunggu informasi lebih lanjut!',
                'success'
            )
        </script>
    @endif
</body>

</html>
