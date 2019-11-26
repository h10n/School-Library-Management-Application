@extends('layouts.app')

@section('content')
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="ion-ios-home"></i> Dashboard</a></li>
        <li><a href="{{ url('/admin/books') }}"> Buku</a></li>
      <li class="active">Detail Buku</li>
    </ol>
  </section>
      <section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Detail Buku</h3>
      <div class="table-button-custom">
      <a class="btn bg-orange" href="{{ route('books.create') }}"><span class="ion-android-add"> Tambah Data</span></a>
      <a class="btn bg-olive" href="{{ route('books.edit',$book->id) }}"><span class="ion-edit"> Edit Data</span></a>
      <a class="btn bg-purple" href="{{ route('admin.export.books') }}"><span class="ion-ios-paper"> Export</span></a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
<div class="detail-buku">
  <div class="row">
    <div class="col-md-4">
      No Induk
    </div>
          <div class="col-md-8">
            {{ $book->no_induk }}
          </div>
  </div>
<div class="row">
  <div class="col-md-4">
    Judul
  </div>

        <div class="col-md-8">
        {{ $book->title }}
        </div>
</div>
<div class="row">
  <div class="col-md-4">
    Penulis
  </div>
        <div class="col-md-8">
          {{ $book->author->name }}
        </div>
</div>
<div class="row">
  <div class="col-md-4">
    Tempat Terbit
  </div>
        <div class="col-md-8">
          {{ $book->published_location }}
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          Penerbit
        </div>
        <div class="col-md-8">
          {{ $book->publisher->name }}
        </div>
</div>
<div class="row">
  <div class="col-md-4">
    Tahun Terbit
  </div>
      <div class="col-md-8">
        {{ $book->published_year }}

      </div>
</div>
<div class="row">
  <div class="col-md-4">
    Tahun Buku
  </div>
      <div class="col-md-8">
        {{ $book->book_year }}
      </div>
</div>
<div class="row">
  <div class="col-md-4">
    No Klasifikasi
  </div>
        <div class="col-md-8">
          {{ $book->classification_code }}
        </div>
</div>
<div class="row">
  <div class="col-md-4">
    Kategori
  </div>
        <div class="col-md-8">
          {{ $book->category->name }}
        </div>
</div>
<div class="row">
  <div class="col-md-4">
    Inisial Buku
  </div>
        <div class="col-md-8">
          {{ $book->initial }}
        </div>
</div>
    <div class="row">
  <div class="col-md-4">
    Sumber
  </div>
        <div class="col-md-8">
          
            @if ($book->source=='S')
            <p>Hadiah</p>
            @elseif ($book->source=='P')
            <p>Pengadaan</p>
          @endif
        </div>
</div>
<div class="row">
  <div class="col-md-4">
    Jumlah
  </div>
        <div class="col-md-8">
          {{ $book->amount }}
        </div>
</div>
<div class="row">
      <div class="col-md-4">
        cover
      </div>
        <div class="col-md-8">
          @if (isset($book) && $book->cover)
            <p>{!! Html::image(asset('img/'.$book->cover),null,['class' => 'img-rounded cover-buku']) !!}</p>
          @endif
        </div>
</div>


</div>
  <a class="btn bg-red" href="{{ route('books.index') }}"><span class="ion-android-arrow-back"> Kembali ke Daftar Buku</span></a>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
      </section>

@endsection
