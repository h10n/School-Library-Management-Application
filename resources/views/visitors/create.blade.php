@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('/admin/visitors') }}"> Pengunjung</a></li>
    <li class="active">Tambah Pengunjung</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Tambah Pengunjung</h3>
      <div class="table-button-custom">
        {{-- <a class="btn bg-orange" href="{{ route('books.create') }}"><span class="ion-android-add"> Tambah
            Data</span></a>
        <a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
        <a class="btn bg-purple" href="{{ route('admin.export.books') }}"><span class="ion-ios-paper"> Export</span></a> --}}
      </div>
    </div>
    
    <div class="box-body">
      {{ Form::open(array('route' => 'visitors.store', 'class' => 'form-horizontal')) }}      
      @include('visitors._form')  
      {{ Form::close() }}
    </div>  
  </div>
</section>
@endsection