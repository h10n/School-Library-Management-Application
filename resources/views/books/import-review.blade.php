@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li><a href="{{ url('/admin/books') }}">Buku</a></li>
        <li><a href="{{ url('/admin/books/create') }}">Tambah Buku</a></li>
        <li class="active">Review Buku</li>
      </ul>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Review Buku</h2>
        </div>
        <div class="panel-body">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Jumlah</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($books as $book)
              <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->amount }}</td>
                <td>
                  {!! Form::open([
                  'url' => route('books.destroy',$book->id),
                  'id' => 'form-'.$book->id,
                  'method' => 'delete',
                  'data-confirm' => 'Yakin akan menghapus '.$book->title.' ?',
                  'class' => 'form-inline js-review-delete'
                  ]) !!}
                  {!! Form::submit('Hapus', ['class' => 'btn btn-xs btn-danger']) !!}
                  {!! Form::close() !!}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <p><a class="btn btn-success" href="{{ url('/admin/books') }}">Selesai</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection