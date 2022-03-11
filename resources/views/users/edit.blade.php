@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('/admin/users') }}"> User</a></li>
    <li class="active">Edit User</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Edit User</h3>
      <div class="table-button-custom">
        <a class="btn bg-red" href="{{ route('users.index') }}"><span class="ion-android-arrow-back"> Back</span></a>
      </div>
    </div>

    <div class="box-body">
      {{ Form::model($item, array('route' => array('users.update', $item->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}
      @include('users._form')
      {{Form::close()}}
    </div>
  </div>
</section>
@endsection