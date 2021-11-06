@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('/admin/books') }}"> Buku</a></li>
    <li class="active">Detail Buku</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Detail Buku</h3>
      <div class="table-button-custom">
        <a class="btn bg-red" href="{{ route('books.index') }}"><span class="ion-android-arrow-back">
            Kembali</span></a>        
      </div>
    </div>

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
            Sumber
          </div>
          <div class="col-md-8">

            @if ($book->source=='hadiah')
            <p>Hadiah</p>
            @elseif ($book->source=='pengadaan')
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
            <p>{!! Html::image(asset('storage/uploads/buku/'.$book->cover),null,['class' => 'img-rounded cover-buku']) !!}</p>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-12">        
        <a class="btn bg-olive" href="{{ route('books.edit',$book->id) }}"><span class="ion-edit"> Edit
            Data</span></a>        
      </div>
    </div>
  </div>
</section>

@endsection