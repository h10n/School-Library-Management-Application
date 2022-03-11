<table class="laporanTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Identity Number</th>
            <th>Name</th>
            <th>Visitor Type</th>
            <th>Grade</th>
            <th>Purpose</th>        
        </tr>  
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->tgl_terdaftar }}</td>
            <td>{{ $item->no_induk }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->visitor_type }}</td>
            <td>{{ $item->kelas }}</td>
            <td>{{ $item->keperluan }}</td>
        </tr>
    @endforeach
    </tbody>
</table>