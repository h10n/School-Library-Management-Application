<table class="laporanTable" style="font-size: 8pt;">
    <thead>
        <tr>
            <th>#</th>
            <th>Input Date</th>
            <th>Book Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Published Location</th>
            <th>Publisher</th>
            <th>Published Year</th>
            <th>Book Year</th>
            <th>Classification Code</th>
            <th>Category</th>
            <th>Source</th>
            <th>Amount</th>                    
            <th>Stock</th>                    
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