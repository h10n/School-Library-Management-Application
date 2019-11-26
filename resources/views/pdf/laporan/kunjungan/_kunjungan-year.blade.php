<h3>Recapitulation of Visitors </h3>
<h5>Year : {{ $tahun }}</h5>
<table class="laporanTable">
    <thead>
    <tr>
        <th>#</th>
        <th>Month</th>
        <th>Visitors</th>
        <th>Note</th>
    </tr>
    </thead>
    <tbody>
    @php
    $total_jumlah = 0;
    $no = 0;
    @endphp
    @foreach ($visitor_tahunan as $key => $visitor)
    {{-- @if ($visitor['jumlah'] != 0) --}}
    <tr>
        <td>{{ ++$no }}</td>
        <td>{{ $key }}</td>
        <td>{{ $visitor['jumlah'] }}</td>
        <td></td>
    </tr>
    @php
    $total_jumlah += $visitor['jumlah'];
    @endphp
    {{-- @endif         --}}
    @endforeach

    <tr>
        <td></td>
        <td>Total</td>
        <td>{{ $total_jumlah }}</td>
        <td></td>
    </tr>
    </tbody>
</table>