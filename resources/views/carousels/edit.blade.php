@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('/admin/carousels') }}"> Slider</a></li>
    <li class="active">Edit Slider</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Edit Slider</h3>
      <div class="table-button-custom">
        <a class="btn bg-red" href="{{ route('carousels.index') }}"><span class="ion-android-arrow-back">
            Kembali</span></a>        
      </div>
    </div>

    <div class="box-body">
      {{ Form::model($carousel, array('route' => array('carousels.update', $carousel->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}
      @include('carousels._form')
      {{Form::close()}}
    </div>
  </div>
</section>
@endsection