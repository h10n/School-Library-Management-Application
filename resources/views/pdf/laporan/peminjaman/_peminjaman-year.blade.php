<h3>Rekapitulasi Peminjaman Buku </h3>
<h5>Tahun : {{ $tahun }}</h5>
<table class="laporanTable">
    <tr>
        <th>No</th>
        <th>Bulan</th>
        <th>Jumlah Buku Di Pinjam</th>
        <th>Jumlah Buku Kembali</th>
        <th>Ket</th>
    </tr>
    @php
    $total_peminjaman = 0;
    $total_pengembalian = 0;
    $no = 0;
    @endphp
    @foreach ($transaction_tahunan as $key => $transaction)
    {{-- @if ($transaction['jumlah'] != 0) --}}
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
    {{-- @endif         --}}
    @endforeach

    <tr>
        <td></td>
        <td>Total</td>
        <td>{{ $total_peminjaman }}</td>
        <td>{{ $total_pengembalian }}</td>
        <td></td>
    </tr>
</table>