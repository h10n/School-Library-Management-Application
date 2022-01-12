<table class="laporanTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>NIS/NIP</th>
            <th>Nama</th>
            <th>Jenis Pengunjung</th>
            <th>Kelas</th>
            <th>Keperluan</th>        
        </tr>  
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->tgl_terdaftar }}</td>
            <td>{{ $item->no_induk }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->jenis }}</td>
            <td>{{ $item->kelas }}</td>
            <td>{{ $item->keperluan }}</td>
        </tr>
    @endforeach
    </tbody>
</table>