<table class="laporanTable" style="font-size: 8pt;">
    <thead>
        <tr>
            <th>#</th>
            <th>Registered Date</th>
            <th>Member Id</th>
            <th>Name</th>
            <th>Member Type</th>
            <th>Grade</th>
            <th>Major</th>
            <th>E-mail</th>
            <th>Phone number</th>
            <th>Address</th>
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
            <td>{{ $item->member_type }}</td>
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