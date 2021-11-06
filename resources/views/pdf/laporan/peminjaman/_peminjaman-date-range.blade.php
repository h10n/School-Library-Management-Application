<h3>Rekapitulasi Peminjaman Buku </h3>
<h5>Periode : {{ $firstKey = array_keys($transaction_bulanan)[0] }} s.d {{ $firstKey = key(array_slice($transaction_bulanan, -1, 1, true)) }}</h5>
{{-- deprecated, min php 7.3--}}
{{-- <h5>Periode : {{ $firstKey = array_key_first($transaction_bulanan) }} s.d {{ $firstKey = array_key_last($transaction_bulanan) }}</h5> --}}
<table class="laporanTable">
    <thead>
    <tr>
        <th>No</th>
        <th>Hari / Tanggal</th>
        <th>Jumlah Buku Dipinjam</th>
        <th>Jumlah Buku Kembali</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
    @php    
    $total_peminjaman = 0;
    $total_pengembalian = 0;
    $no = 0;
    @endphp
    @foreach ($transaction_bulanan as $key => $transaction)
    @if ($transaction['peminjaman']+$transaction['pengembalian'] != 0)
    <tr>
        <td>{{ ++$no }}</td>
        <td>{{ $key }}</td>
        <td>{{ $transaction['peminjaman'] }}</td>
        <td>{{ $transaction['pengembalian'] }}</td>
        <td></td>
    </tr>
    @php
    $total_peminjaman += $transaction['peminjaman'];
    $total_pengembalian += $transaction['pengembalian'];
    @endphp
    @endif
    @endforeach

    <tr>
        <td></td>
        <td>Total</td>
        <td>{{ $total_peminjaman }}</td>
        <td>{{ $total_pengembalian }}</td>
        <td></td>
    </tr>
    </tbody>
</table>