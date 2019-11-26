@extends('layouts.app')

@section('content')
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="ion-ios-home"></i> Dashboard</a></li>
      <li class="active">Kategori</li>
    </ol>
  </section>
      <section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Kategori</h3>
      <div class="table-button-custom">
      <a onclick="add('{{ route('categories.create')}}','Kategori')" class="btn bg-orange"><span class="ion-android-add"> Tambah Data</span></a>
      <!-- a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
      <a class="btn bg-purple"><span class="ion-ios-paper"> Export</span></a -->
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
