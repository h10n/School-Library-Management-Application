@extends('layouts.app')
@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('users/profile') }}"> Profil</a></li>
    <li class="active">Ganti Password</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Ganti Password</h3>
      <div class="table-button-custom">
        <a class="btn bg-red" href="{{ url('users/profile') }}"><span class="ion-android-arrow-back">
          Kembali</span></a>        
      </div>
    </div>

    <div class="box-body">
      {!! Form::model($item, [
      'url' => route('users.password-update'),
      'method' => 'post',
      'files' => 'true',
      'class' => 'form-horizontal'
      ])
      !!}
        <div class="form-group{{$errors->has('current_password') ? ' has-error' : ''}}">
          {!! Form::label('current_password','Password Saat Ini',['class' => 'col-md-2 control-label']) !!}
          <div class="col-md-4">
            {!! Form::password('current_password',['class' => 'form-control','maxlength' => '15']) !!}
            {!! $errors->first('current_password','<p class="help-block"><strong>:message</strong></p>') !!}
          </div>
        </div>
        <div class="form-group{{$errors->has('new_password') ? ' has-error' : ''}}">
          {!! Form::label('new_password','Password Baru',['class' => 'col-md-2 control-label']) !!}
          <div class="col-md-4">
            {!! Form::password('new_password',['class' => 'form-control','maxlength' => '15']) !!}
            {!! $errors->first('new_password','<p class="help-block"><strong>:message</strong></p>') !!}
          </div>
        </div>
        <div class="form-group{{$errors->has('confirm_password') ? ' has-error' : ''}}">
          {!! Form::label('confirm_password','Ulangi Password Baru',['class' => 'col-md-2 control-label']) !!}
          <div class="col-md-4">
            {!! Form::password('confirm_password',['class' => 'form-control','maxlength' => '15']) !!}
            {!! $errors->first('confirm_password','<p class="help-block"><strong>:message</strong></p>') !!}
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 col-md-offset-2">        
            {!! Form::button('<i class="fa fa-save"></i> Simpan', ['type' => 'submit', 'name' => 'simpan', 'class' => 'btn btn-primary'] )  !!}
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>
@endsection