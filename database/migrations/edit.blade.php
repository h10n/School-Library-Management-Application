@extends('layouts.app')

@section('content')
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="ion-ios-home"></i> Dashboard</a></li>
        <li><a href="{{ url('/admin/members') }}"> Anggota</a></li>
      <li class="active">Edit Anggota</li>
    </ol>
  </section>
      <section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Edit Anggota</h3>
      <div class="table-button-custom">
      <a class="btn bg-orange" href="{{ route('books.create') }}"><span class="ion-edit"> Tambah Data</span></a>
      <a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
      <a class="btn bg-purple" href="{{ route('admin.export.books') }}"><span class="ion-ios-paper"> Export</span></a>
      </div>
    </div>
    
    <div class="box-body">

      {!! Form::model($member,[
        'url' => route('members.update', $member->id),
        'method' => 'PUT',
        'files' => 'true',
        'class' => 'form-horizontal'
        ])
      !!}
      @include('members._form')
      {!! Form::close() !!}



    </div>
    
  </div>
  
      </section>
@endsection
