<h3>Transaction Recapitulation </h3>
<h5>Year : {{ $tahun }}</h5>
<table class="laporanTable">
    <thead>
    <tr>
        <th>#</th>
        <th>Month</th>
        <th>Borrowed Book</th>
        <th>Returned Book</th>
        <th>Note</th>
    </tr>
    </thead>
    <tbody>
    @php
    $total_peminjaman = 0;
    $total_pengembalian = 0;
    $no = 0;
    @endphp
    @foreach ($transaction_tahunan as $key => $transaction)    
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