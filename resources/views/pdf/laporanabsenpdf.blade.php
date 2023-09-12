{{-- <a href="{{ route('buatPdf') }}">Download PDF</a> --}}
<table>
    <tr>
        {{-- <th>No</th> --}}
        <th>Nama</th>
        <th>Hadir</th>
        <th>sakit</th>
        <th>izin</th>
        <th>Alpha</th>
    </tr>
    {{-- {{ $tampung }} --}}
    {{-- @foreach ($tampung as $key => $item) --}}
    <tr>
        {{-- <td>{{ $loop->iteration }}</td> --}}
        <td>{{ $siswa->nama_siswa }}</td>
        <td>{{ $hadir }}</td>
        <td>{{ $sakit }}</td>
        <td>{{ $izin }}</td>
        <td>{{ $alpha }}</td>
    </tr>
    {{-- @endforeach --}}
</table>
