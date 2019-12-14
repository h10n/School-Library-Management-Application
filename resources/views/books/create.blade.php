@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="ion-ios-home"></i> Dashboard</a></li>
    <li><a href="{{ url('/admin/books') }}"> Buku</a></li>
    <li class="active">Tambah Buku</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Buku</h3>
      <div class="table-button-custom">
        <a class="btn bg-orange" href="{{ route('books.create') }}"><span class="ion-android-add"> Tambah
            Data</span></a>
        <a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
        <a class="btn bg-purple" href="{{ route('admin.export.books') }}"><span class="ion-ios-paper"> Export</span></a>
      </div>
    </div>
    <!-- batas-->
    <div class="panel-body">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
          <a href="#form" aria-controls="form" role="tab" data-toggle="tab">
            <i class="fa fa-pencil-square"></i> Isi Form
          </a>
        </li>
        <li role="presentation">
          <a href="#upload" aria-controls="upload" role="tab" data-toggle="tab">
            <i class="fa fa-cloud-upload"></i> Upload Excel
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="form">
          {!! Form::open([
          'url' => route('books.store'),
          'method' => 'POST',
          'files' => 'true',
          'class' => 'form-horizontal'
          ])
          !!}
          @include('books._form')
          {!! Form::close() !!}
        </div>
        <div role="tabpanel" class="tab-pane" id="upload">
          {!! Form::open([
          'url' => route('admin.import.books'),
          'method' => 'POST',
          'files' => 'true',
          'class' => 'form-horizontal'
          ])
          !!}
          @include('books._import')
          {!! Form::close() !!}
        </div>
      </div>
    </div>  
  </div>
</section>
@endsection