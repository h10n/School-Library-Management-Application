<table class="laporanTable" style="font-size: 8pt;">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Terdaftar</th>
            <th>NIS/NIP</th>
            <th>Nama</th>
            <th>Jenis Anggota</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>E-mail</th>
            <th>No Telepon</th>
            <th>Alamat</th>
            <th>Username</th>            
        </tr>  
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->tgl_terdaftar }}</td>
            <td>{{ $item->no_induk }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->jenis_anggota }}</td>
            <td>{{ $item->kelas }}</td>
            <td>{{ $item->jurusan }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->user->username ?? '-' }}</td>
        </tr>
    @endforeach
    </tbody>
    
</table>