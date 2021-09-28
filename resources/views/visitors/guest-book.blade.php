@extends('layouts.app')
@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li class="active">Buku Tamu</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header-dashboard">
      <h3 class="box-title">Buku Tamu</h3>
    </div>
    <div class="box-body">
      <div class="callout callout-info">
        Selamat Datang di {{ $tentang }}, Silahkan Isi Form Kunjungan Terlebih Dahulu!
      </div>
      {!! Form::open([
      'route' => 'visitors.guest-book.store',      
      'class' => 'form-horizontal'
      ])
      !!}
      @include('visitors._form')
      {!! Form::close() !!}
    </div>
  </div>
</section>
@endsection