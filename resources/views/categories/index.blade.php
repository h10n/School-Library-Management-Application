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
        <a onclick="add('{{ route('categories.create')}}','Kategori')" class="btn bg-orange"><span
            class="ion-android-add"> Tambah Data</span></a>
      </div>
    </div>
    <div class="box-body">
      {!! $html->table(['class' => 'table table-striped table-hover']) !!}
    </div>
  </div>
</section>
@endsection
@section('scripts')
{!! $html->scripts() !!}
@endsection