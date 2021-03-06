@extends('layouts.app')
@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('/admin/members') }}"> Member</a></li>
    <li class="active">Edit Member</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Edit Member</h3>
      <div class="table-button-custom">
        <a class="btn bg-red" href="{{ route('members.index') }}"><span class="ion-android-arrow-back">
            Back</span></a>
      </div>
    </div>
    <div class="box-body">
      {!! Form::model($member,[
      'url' => route('members.update', $member->id),
      'method' => 'PUT',
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