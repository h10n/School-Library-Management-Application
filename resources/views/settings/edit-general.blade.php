@extends('layouts.app')
@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('admin/settings/general') }}"> Setting</a></li>
    <li class="active">Change Setting</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Ubah Pengaturan</h3>
      <div class="table-button-custom">
        {{-- <a class="btn bg-orange" href="#"><span class="ion-edit"> Tambah Data</span></a>
        <a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
        <a class="btn bg-purple" href="#"><span class="ion-ios-paper"> Export</span></a> --}}
      </div>
    </div>

    <div class="box-body">
      {!! Form::model($setting,[
      'url' => url('admin/settings/general'),
      'method' => 'PUT',
      'files' => 'true',
      'class' => 'form-horizontal'
      ])
      !!}
      <div class="row">
        <div class="col-md-6 col-md-offset-2">
          <span class="text-muted"><i class="ion-ios-gear"></i> Umum</span>
        </div>
      </div>

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::label('name', 'Nama Perpustakaan', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::text('name',null,['class' => 'form-control']) !!}
          {!! $errors->first('name','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        {!! Form::label('address', 'Alamat', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::text('address',null,['class' => 'form-control']) !!}
          {!! $errors->first('address','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
        {!! Form::label('about', 'Deskripsi', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::text('about',null,['class' => 'form-control']) !!}
          {!! $errors->first('about','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('kepala_perpustakaan') ? ' has-error' : '' }}">
        {!! Form::label('kepala_perpustakaan', 'Kepala Perpustakaan', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::text('kepala_perpustakaan',null,['class' => 'form-control']) !!}
          {!! $errors->first('kepala_perpustakaan','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('nip_kepala_perpustakaan') ? ' has-error' : '' }}">
        {!! Form::label('nip_kepala_perpustakaan', 'NIP Kepala Perpustakaan', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::text('nip_kepala_perpustakaan',null,['class' => 'form-control']) !!}
          {!! $errors->first('nip_kepala_perpustakaan','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('pustakawan') ? ' has-error' : '' }}">
        {!! Form::label('pustakawan', 'Pustakawan', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::text('pustakawan',null,['class' => 'form-control']) !!}
          {!! $errors->first('pustakawan','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('nip_pustakawan') ? ' has-error' : '' }}">
        {!! Form::label('nip_pustakawan', 'NIP Pustakawan', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::text('nip_pustakawan',null,['class' => 'form-control']) !!}
          {!! $errors->first('nip_pustakawan','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{$errors->has('logo') ? ' has-error' : ''}}">
        {!! Form::label('logo','Logo Perpustakaan',['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::file('logo') !!}
          @if (isset($setting) && $setting->logo)
          <p>{!! Html::image(asset('img/logo/'.$setting->logo),null,['class' => 'img-rounded cover-buku']) !!}</p>
          @endif
          {!! $errors->first('logo','<p class="help-block"><strong>:message</strong></p>') !!}
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-md-offset-2">
          <span class="text-muted"><i class="ion-arrow-swap"></i> Peminjaman</span>
        </div>
      </div>

      <div class="form-group{{ $errors->has('denda') ? ' has-error' : '' }}">
        {!! Form::label('denda', 'Denda', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::text('denda',null,['class' => 'form-control']) !!}
          {!! $errors->first('denda','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('durasi') ? ' has-error' : '' }}">
        {!! Form::label('durasi', 'Durasi', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::text('durasi',null,['class' => 'form-control']) !!}
          {!! $errors->first('durasi','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('max_peminjaman') ? ' has-error' : '' }}">
        {!! Form::label('max_peminjaman', 'Jumlah', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::text('max_peminjaman',null,['class' => 'form-control']) !!}
          {!! $errors->first('max_peminjaman','<p class="help-block">:message</p>') !!}
        </div>
      </div>

      <a class="btn bg-red" href="{{ url('admin/settings/general') }}"><span class="ion-android-arrow-back"> Kembali</span></a>
      {!! Form::submit('Simpan',['class' => 'btn btn-primary']) !!}
      {!! Form::close() !!}
    </div>
  </div>
</section>
@endsection