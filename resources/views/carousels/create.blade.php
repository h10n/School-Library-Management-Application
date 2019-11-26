@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('/admin/carousels') }}"> Slider</a></li>
    <li class="active">Add Slider</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Add Slider</h3>
      <div class="table-button-custom">
      </div>
    </div>

    <div class="box-body">
      {{ Form::open(array('route' => 'carousels.store', 'files' => true, 'class' => 'form-horizontal')) }}
      @include('carousels._form')
      {{ Form::close() }}
    </div>
  </div>
</section>
@endsection