@push('req-css')
<link href="{{ asset('css/avatar.css') }}" rel="stylesheet" media="screen">
@endpush

@extends('layouts.app')
@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('admin/settings/general') }}"> Pengaturan</a></li>
    <li class="active">Edit Pengaturan</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Edit Pengaturan</h3>
      <div class="table-button-custom">
        <a class="btn bg-red" href="{{ url('admin/settings/general') }}"><span class="ion-android-arrow-back">
            Back</span></a>
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
        <div class="col-md-2">
          <span class="text-muted pull-right"><i class="ion-ios-gear"></i> Umum</span>
        </div>
      </div>

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::label('name', 'Nama', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-4">
          {!! Form::text('name',null,['class' => 'form-control','maxlength' => '50']) !!}
          {!! $errors->first('name','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        {!! Form::label('address', 'Alamat', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-6">
          {!! Form::textarea('address',null,['class' => 'form-control','maxlength' => '100', 'rows' => '4']) !!}
          {!! $errors->first('address','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
        {!! Form::label('website', 'Website', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-4">
          {!! Form::text('website',null,['class' => 'form-control','maxlength' => '60']) !!}
          {!! $errors->first('website','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label('email', 'Email', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-4">
          {!! Form::email('email',null,['class' => 'form-control','maxlength' => '60']) !!}
          {!! $errors->first('email','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('pengelola') ? ' has-error' : '' }}">
        {!! Form::label('pengelola', 'Pengelola', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-6">
          {!! Form::text('pengelola',null,['class' => 'form-control','maxlength' => '100']) !!}
          {!! $errors->first('pengelola','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
        {!! Form::label('about', 'Deskripsi', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-6">
          {!! Form::textarea('about',null,['class' => 'form-control','maxlength' => '100', 'rows' => '4']) !!}
          {!! $errors->first('about','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('kepala_perpustakaan') ? ' has-error' : '' }}">
        {!! Form::label('kepala_perpustakaan', 'Kepala Perpustakaan', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-4">
          {!! Form::text('kepala_perpustakaan',null,['class' => 'form-control','maxlength' => '50']) !!}
          {!! $errors->first('kepala_perpustakaan','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('nip_kepala_perpustakaan') ? ' has-error' : '' }}">
        {!! Form::label('nip_kepala_perpustakaan', 'NIP Kepala Perpustakaan', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-3">
          {!! Form::text('nip_kepala_perpustakaan',null,['class' => 'form-control','maxlength' => '20']) !!}
          {!! $errors->first('nip_kepala_perpustakaan','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      @include('layouts._image-uploader', ['name' => 'logo_file', 'dir' => 'logo','label' => 'Logo', 'data' =>
      $setting->logo ?? null])
      <div class="row">
        <div class="col-md-2">
          <span class="text-muted pull-right"><i class="ion-arrow-swap"></i> Peminjaman</span>
        </div>
      </div>

      <div class="form-group{{ $errors->has('denda') ? ' has-error' : '' }}">
        {!! Form::label('denda', 'Denda (Rp/Hari)', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-2">
          {!! Form::number('denda',null,['class' => 'form-control', 'min' =>'1','max' => '1000000']) !!}
          {!! $errors->first('denda','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('durasi') ? ' has-error' : '' }}">
        {!! Form::label('durasi', 'Durasi (Hari)', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-1">
          {!! Form::number('durasi',null,['class' => 'form-control', 'min' =>'1','max' => '365']) !!}
          {!! $errors->first('durasi','<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group{{ $errors->has('max_peminjaman') ? ' has-error' : '' }}">
        {!! Form::label('max_peminjaman', 'Jumlah', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-1">
          {!! Form::number('max_peminjaman',null,['class' => 'form-control', 'min' =>'1','max' => '100']) !!}
          {!! $errors->first('max_peminjaman','<p class="help-block">:message</p>') !!}
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-4 col-md-offset-2">
          {!! Form::button('<i class="fa fa-save"></i> Simpan', ['type' => 'submit', 'name' => 'simpan', 'class' => 'btn
          btn-primary'] ) !!}
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>
@endsection

@push('req-scripts')
<script src="{{ asset('js/avatar.js') }}"></script>
@endpush