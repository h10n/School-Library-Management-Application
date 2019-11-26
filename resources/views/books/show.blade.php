@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('/admin/books') }}"> Book</a></li>
    <li class="active">Book Details</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Book Details</h3>
      <div class="table-button-custom">
        <a class="btn bg-red" href="{{ route('books.index') }}"><span class="ion-android-arrow-back">
            Back</span></a>
      </div>
    </div>

    <div class="box-body">
      <div class="detail-buku">
        <div class="row">
          <div class="col-md-4">
            Book Id
          </div>
          <div class="col-md-8">
            {{ $book->no_induk }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Title
          </div>
          <div class="col-md-8">
            {{ $book->title }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Author
          </div>
          <div class="col-md-8">
            {{ $book->author->name }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Published Location
          </div>
          <div class="col-md-8">
            {{ $book->published_location }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Publisher
          </div>
          <div class="col-md-8">
            {{ $book->publisher->name }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Published Year
          </div>
          <div class="col-md-8">
            {{ $book->published_year }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Book Year
          </div>
          <div class="col-md-8">
            {{ $book->book_year }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Classification Code
          </div>
          <div class="col-md-8">
            {{ $book->classification_code }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Category
          </div>
          <div class="col-md-8">
            {{ $book->category->name }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Source
          </div>
          <div class="col-md-8">
            @if ($book->source=='hadiah')
            <p>Grant</p>
            @elseif ($book->source=='pengadaan')
            <p>Procurement</p>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Amount
          </div>
          <div class="col-md-8">
            {{ $book->amount }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Cover
          </div>
          <div class="col-md-8">
            @if (isset($book) && $book->cover)
            <p>{!! Html::image(asset('storage/uploads/buku/'.$book->cover),null,['class' => 'img-rounded cover-buku'])
              !!}</p>
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