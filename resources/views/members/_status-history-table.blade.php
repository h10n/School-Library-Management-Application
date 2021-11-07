<div class="col-md-12">
    <h5>Buku yang Sedang Dipinjam</h5>
    <table class="table table-condensed table-striped">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Tanggal Peminjaman</th>
                <th>Max Tanggal Pengembalian</th>
                <th>Denda</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($member->borrowLogs()->borrowed()->get() as $log)
            <tr>
                <td>{{ $log->book->title }}</td>
                <td>{{ $log->tgl_peminjaman }}</td>
                <td>{{ $log->tgl_max }}</td>
                <td>{{ $log->total_denda }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="2">Tidak Ada Data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <h5>Buku yang Telah Dikembalikan</h5>
    <table class="table table-condensed table-striped">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Kembali</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($member->borrowLogs()->returned()->get() as $log)
            <tr>
                <td>{{ $log->book->title }}</td>
                <td>{{ $log->tgl_peminjaman }}</td>
                <td>{{ $log->tgl_kembali }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="2">Tidak Ada Data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>