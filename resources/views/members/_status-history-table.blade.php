<div class="col-md-12">
    <h5>Books on Borrow</h5>
    <table class="table table-condensed table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Borrowing Date</th>
                <th>Max Returning Date</th>
                <th>Fine</th>
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
                <td colspan="2">No Data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <h5>Returned Books</h5>
    <table class="table table-condensed table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Borrowing Date</th>
                <th>Returning Date</th>
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
                <td colspan="2">No data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>