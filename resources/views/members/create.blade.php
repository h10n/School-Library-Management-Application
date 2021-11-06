@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('/admin/members') }}"> Anggota</a></li>
    <li class="active">Tambah Anggota</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Tambah Anggota</h3>
      <div class="table-button-custom">      
      </div>
    </div>
    <div class="box-body">
      {!! Form::open([
      'url' => route('members.store'),
      'method' => 'POST',
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