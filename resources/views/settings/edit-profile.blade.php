@extends('layouts.app')
@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('admin/settings/profile') }}"> Profil</a></li>
    <li class="active">Ubah Profil</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Ubah Profil</h3>
      <div class="table-button-custom">
        <a class="btn bg-orange" href="#"><span class="ion-edit"> Tambah Data</span></a>
        <a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
        <a class="btn bg-purple" href="#"><span class="ion-ios-paper"> Export</span></a>
      </div>
    </div>

    <div class="box-body">
      {!! Form::model(auth()->user(), [
      'url' => url('admin/settings/profile'),
      'method' => 'post',
      'files' => 'true',
      'class' => 'form-horizontal'
      ])
      !!}
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::label('name', 'Nama', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::text('name',null,['class' => 'form-control']) !!}
          {!! $errors->first('name','<p class="help-block">:message</p>') !!}
        </div>
      </div>

      <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
        {!! Form::label('username', 'Username', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::text('username',null,['class' => 'form-control']) !!}
          {!! $errors->first('username','<p class="help-block">:message</p>') !!}
        </div>
      </div>

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::email('email',null,['class' => 'form-control']) !!}
          {!! $errors->first('email','<p class="help-block">:message</p>') !!}
        </div>
      </div>

      <div class="form-group{{ $errors->has('telp') ? ' has-error' : '' }}">
        {!! Form::label('telp', 'No Telepon', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::text('telp',null,['class' => 'form-control']) !!}
          {!! $errors->first('telp','<p class="help-block">:message</p>') !!}
        </div>
      </div>


      <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
        {!! Form::label('alamat', 'Alamat', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::text('alamat',null,['class' => 'form-control']) !!}
          {!! $errors->first('alamat','<p class="help-block">:message</p>') !!}
        </div>
      </div>


      <div class="form-group{{$errors->has('photo') ? ' has-error' : ''}}">
        {!! Form::label('photo','Foto',['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          {!! Form::file('photo') !!}
          @if (auth()->user() && auth()->user()->photo)
          <p>{!! Html::image(asset('img/admins_photo/'.auth()->user()->photo),null,['class' => 'img-rounded
            cover-buku']) !!}</p>
          @endif
          {!! $errors->first('photo','<p class="help-block"><strong>:message</strong></p>') !!}
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
          {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>
@endsection