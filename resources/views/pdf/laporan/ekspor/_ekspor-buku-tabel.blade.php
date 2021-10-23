<table class="laporanTable" style="font-size: 8pt;">
    <thead>
        <tr>
            <th>No</th>
            <th>Tgl Input</th>
            <th>No Induk</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tempat Terbit</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Tahun Buku</th>
            <th>No Klasifikasi</th>
            <th>Kategori</th>
            <th>Sumber</th>
            <th>Jumlah</th>                    
            <th>Stok</th>                    
        </tr>  
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->tgl_terdaftar }}</td>
            <td>{{ $item->no_induk }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->author->name ?? '-' }}</td>
            <td>{{ $item->published_location }}</td>            
            <td>{{ $item->publisher->name ?? '-' }}</td>
            <td>{{ $item->published_year }}</td>
            <td>{{ $item->book_year }}</td>
            <td>{{ $item->classification_code }}</td>
            <td>{{ $item->category->name ?? '-' }}</td>
            <td>{{ $item->source }}</td>
            <td>{{ $item->amount }}</td>
            <td>{{ $item->stock }}</td>            
        </tr>
    @endforeach
    </tbody>
    
</table>