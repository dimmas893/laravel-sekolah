<h1>Laporan nilai</h1>
<table>
    <tr>
        @foreach ($tampungujian as $item)
    <tr>
        <td>|| {{ $item['matapelajaran'] }}, uts = {{ $item['uts'] }} , uas = {{ $item['uas'] }} , tugas =
            {{ $item['tugas'] }} || </td>
    </tr>
    @endforeach
    </tr>
</table>
