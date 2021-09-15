@extends('layouts.app')
@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header-dashboard">
      <h3 class="box-title">Dashboard</h3>
    </div>
    <div class="box-body">
      <div class="callout callout-info">
        Selamat Datang di Aplikasi Perpustakaan {{ $nama_perpus }}, Silahkan Isi Form Kunjungan Terlebih Dahulu!
      </div>
      {!! Form::open([
      'route' => 'visitor.store',      
      'class' => 'form-horizontal'
      ])
      !!}
      @include('dashboard._form-visitor')
      {!! Form::close() !!}
    </div>
  </div>
</section>
@endsection