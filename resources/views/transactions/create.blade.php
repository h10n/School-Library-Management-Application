@extends('layouts.app')

@section('content')
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="ion-ios-home"></i> Dashboard</a></li>
        <li><a href="{{ url('/admin/transactions') }}"> Peminjaman</a></li>
      <li class="active">Tambah Peminjaman</li>
    </ol>
  </section>
      <section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Tambah Peminjaman</h3>
      <div class="table-button-custom">
      <a class="btn bg-orange" href="{{ route('transactions.create') }}"><span class="ion-edit"> Tambah Data</span></a>
      <a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
      <a class="btn bg-purple" href="{{ route('admin.export.books') }}"><span class="ion-ios-paper"> Export</span></a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

      {!! Form::open([
    'url' => route('transactions.store'),
    'method' => 'POST',
    'class' => 'form-horizontal'
    ])
  !!}
  @include('transactions._form')
  {!! Form::close() !!}


    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
      </section>
@endsection
