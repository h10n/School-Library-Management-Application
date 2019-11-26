@extends('layouts.app')
@section('content')


  <section class="slider-container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
       @foreach($carousel as $carousels)
        <li data-target="#myCarousel" data-slide-to="{{ $loop->index}}" class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach

      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">

       @foreach($carousel as $carousel)
        <div class="item {{ $loop->first ? 'active' : '' }}">
          <img src="img/slider/{{$carousel->img}}" alt="{{$carousel->title}}" class="img-carousel-rule">
          <div class="carousel-caption">
            <h3>{{$carousel->title}}</h3>
            <p>{{$carousel->text}}</p>
          </div>
        </div>
        @endforeach


      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

  </section>
      <section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Daftar Buku</h3>
      <div class="table-button-custom">
      <a class="btn bg-orange" onclick="add('{{ route('books.create') }}','Buku')"><span class="ion-edit"> Tambah Data</span></a>
      <a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
      <a class="btn bg-purple" href="{{ route('admin.export.books') }}"><span class="ion-ios-paper"> Export</span></a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      {!! $html->table(['class' => 'table table-striped table-hover']) !!}
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
      </section>
@endsection
@section('scripts')
  {!! $html->scripts() !!}
@endsection
