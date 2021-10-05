@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('/admin/visitors') }}"> Pengguna</a></li>
    <li class="active">Edit Pengguna</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Edit Pengguna</h3>
      <div class="table-button-custom">
        <a class="btn bg-red" href="{{ route('users.index') }}"><span class="ion-android-arrow-back"> Kembali</span></a>
        {{-- <a class="btn bg-orange" href="{{ route('books.create') }}"><span class="ion-android-add"> Tambah
            Data</span></a>
        <a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
        <a class="btn bg-purple" href="{{ route('admin.export.books') }}"><span class="ion-ios-paper"> Export</span></a> --}}
      </div>
    </div>
    
    <div class="box-body">
      {{ Form::model($item, array('route' => array('users.update', $item->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
      @include('users._form')    
      {{Form::close()}}
    </div>
  </div>
</section>
@endsection