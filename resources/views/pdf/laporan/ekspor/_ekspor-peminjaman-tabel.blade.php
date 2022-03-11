<table class="laporanTable" style="font-size: 8pt;">
    <thead>
        <tr>
            <th>#</th>
            <th>Borrowing Date</th>
            <th>Member Id</th>
            <th>Name</th>
            <th>Book Id</th>
            <th>Title</th>
            <th>Borrow Staff</th>
            <th>Return Staff</th>
            <th>Max Borrowing Date</th>
            <th>Status</th>
            <th>Fine</th>                  
        </tr>  
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->tgl_peminjaman }}</td>
            <td>{{ $item->member->no_induk ?? '-' }}</td>
            <td>{{ $item->member->name ?? '-' }}</td>
            <td>{{ $item->book->no_induk ?? '-' }}</td>
            <td>{{ $item->book->title ?? '-' }}</td>            
            <td>{{ $item->user->name ?? '-' }}</td>
            <td>{{ $item->userReturned->name ?? '-' }}</td>
            <td>{{ $item->tgl_max }}</td>
            <td>{{ $item->status }}</td>            
            <td>{{ $item->total_denda }}</td>            
        </tr>
    @endforeach
    </tbody>
</table>