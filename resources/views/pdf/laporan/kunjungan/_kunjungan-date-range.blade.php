<h3>Rekapitulasi Jumlah Pengunjung </h3>
<h5>Periode : {{ $firstKey = array_keys($visitor_bulanan)[0] }} s.d {{ $firstKey = key(array_slice($visitor_bulanan, -1, 1, true)) }}
{{-- deprecated, min php 7.3--}}
{{-- <h5>Periode : {{ $firstKey = array_key_first($visitor_bulanan) }} s.d {{ $firstKey = array_key_last($visitor_bulanan) }} --}}
</h5>
<table class="laporanTable">
    <thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Hari/Tanggal</th>
        <th colspan="3">Kelas</th>
        <th rowspan="2">Guru/Karyawan Sekolah</th>
        <th rowspan="2">Jumlah</th>
    </tr>
    <tr>
        <th>X</th>
        <th>XI</th>
        <th>XII</th>
    </tr>
    </thead>
    <tbody>
    @php
    // $total = '';
    $total_kelas_x = 0;
    $total_kelas_xi = 0;
    $total_kelas_xii = 0;
    $total_guru_staff = 0;
    $total_jumlah = 0;
    $no = 0;
    @endphp
    @foreach ($visitor_bulanan as $key => $visitor)
    @if ($visitor['jumlah'] != 0)    
    <tr>
        <td>{{ ++$no }}</td>
        <td>{{ $key }}</td>
        <td>{{ $visitor['kelas_x'] }}</td>
        <td>{{ $visitor['kelas_xi'] }}</td>
        <td>{{ $visitor['kelas_xii'] }}</td>
        <td>{{ $visitor['guru_staff'] }}</td>
        <td>{{ $visitor['jumlah'] }}</td>
    </tr>    
    @php
    $total_kelas_x += $visitor['kelas_x'];
    $total_kelas_xi += $visitor['kelas_xi'];
    $total_kelas_xii += $visitor['kelas_xii'];
    $total_guru_staff += $visitor['guru_staff'];
    $total_jumlah += $visitor['jumlah'];
    @endphp
    @endif
    @endforeach

    <tr>
        <td></td>
        <td>Total</td>
        <td>{{ $total_kelas_x }}</td>
        <td>{{ $total_kelas_xi }}</td>
        <td>{{ $total_kelas_xii }}</td>
        <td>{{ $total_guru_staff }}</td>
        <td>{{ $total_jumlah }}</td>
    </tr>
    </tbody>
</table>