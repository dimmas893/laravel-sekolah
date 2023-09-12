{{-- <a href="{{ route('buatPdf') }}">Download PDF</a> --}}
<table>
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Nominal</th>
    </tr>
    {{-- {{ $tampung }} --}}
    @foreach ($tampung as $key => $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item['kategori_tagihan'] }}</td>
            <td>Rp. {{ $item['nominal'] }}</td>
        </tr>
    @endforeach
</table>
