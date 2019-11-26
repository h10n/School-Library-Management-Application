@extends('layouts.app')

@section('content')
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="ion-ios-home"></i> Dashboard</a></li>
        <li><a href="{{ url('/admin/books') }}"> Buku</a></li>
      <li class="active">Edit Buku</li>
    </ol>
  </section>
      <section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Buku</h3>
      <div class="table-button-custom">
      <a class="btn bg-orange" href="{{ route('books.create') }}"><span class="ion-android-add"> Tambah Data</span></a>
      <a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
      <a class="btn bg-purple" href="{{ route('admin.export.books') }}"><span class="ion-ios-paper"> Export</span></a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      {{ Form::model($announcement, array('route' => array('announcements.update', $announcement->id), 'method' => 'PUT')) }}

      <br>
      {{Form::label('text', 'Isi')}}
      {{Form::text('text', null, array('class' => 'form-control'))}}



      <br><br><br>

      {{ Form::submit('Update Slide', array('class' => 'btn btn-success')) }}

      {{Form::close()}}


    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
      </section>
@endsection
