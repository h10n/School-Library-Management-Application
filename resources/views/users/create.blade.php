@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('/admin/users') }}"> User</a></li>
    <li class="active">Add User</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Add User</h3>
      <div class="table-button-custom">
      </div>
    </div>

    <div class="box-body">
      {{ Form::open(array('route' => 'users.store', 'files' => true, 'class' => 'form-horizontal')) }}
      @include('users._form')
      {{ Form::close() }}
    </div>
  </div>
</section>
@endsection