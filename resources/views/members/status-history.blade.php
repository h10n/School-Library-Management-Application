@extends('layouts.app')
@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li class="active">Status & Riwayat</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header-dashboard">
      <h3 class="box-title">Status & Riwayat</h3>
    </div>
    <div class="box-body">
      <div class="callout callout-info">
        Selamat Datang di Aplikasi Perpustakaan {{ $nama_perpus }}
      </div>      
      @include('members._status-history-table')     
    </div>
  </div>
</section>
@endsection