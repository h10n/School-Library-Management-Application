@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="ion-ios-home"></i> Dashboard</a></li>
    <li><a href="{{ url('/admin/books') }}"> Slider</a></li>
    <li class="active">Edit Slider</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Slider</h3>
      <div class="table-button-custom">
        <a class="btn bg-orange" href="{{ route('books.create') }}"><span class="ion-android-add"> Tambah
            Data</span></a>
        <a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
        <a class="btn bg-purple" href="{{ route('admin.export.books') }}"><span class="ion-ios-paper"> Export</span></a>
      </div>
    </div>
    
    <div class="box-body">
      {{ Form::model($carousel, array('route' => array('carousels.update', $carousel->id), 'method' => 'PUT', 'files' => true)) }}
      {{Form::label('title', 'Title')}}
      {{Form::text('title', null, array('class' => 'form-control'))}}
      <br>
      {{Form::label('text', 'Isi')}}
      {{Form::text('text', null, array('class' => 'form-control'))}}
      <br>
      {{Form::label('img', 'img')}}
      {{Form::file('img', array('class' => 'form-control'))}}
      <br>
      <img src="{{url('img/slider')}}/{{$carousel->img}}" alt="image" class="img-rounded cover-buku">
      <br><br><br>
      {{ Form::submit('Update Slide', array('class' => 'btn btn-success')) }}
      {{Form::close()}}
    </div>
  </div>
</section>
@endsection