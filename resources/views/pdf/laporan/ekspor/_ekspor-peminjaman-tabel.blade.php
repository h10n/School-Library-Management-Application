<table class="laporanTable" style="font-size: 8pt;">
    <thead>
        <tr>
            <th>No</th>
            <th>Tgl Peminjaman</th>
            <th>NIS/NIP Peminjam</th>
            <th>Nama Peminjam</th>
            <th>No. Induk Buku</th>
            <th>Judul Buku</th>
            <th>Petugas Peminjaman</th>
            <th>Petugas Pengembalian</th>
            <th>Max Tanggal Pengembalian</th>
            <th>Status</th>
            <th>Denda</th>                  
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