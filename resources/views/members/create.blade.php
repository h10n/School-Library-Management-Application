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
        {{-- <a class="btn bg-orange" href="{{ route('members.create') }}"><span class="ion-edit"> Tambah Data</span></a> --}}
        <!-- a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
      <a class="btn bg-purple" href="{{ route('admin.export.books') }}"><span class="ion-ios-paper"> Export</span></a -->
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
@push('custom-scripts')
<script>
      $('#imageDelete').on('click', function () {
        $('#imagePreview').css('background-image', 'url({!! asset('img/icons8-no-camera.svg') !!})');
        $('#imagePreview').css('background-size', 'initial');
        $('#foto').val('');
    });
</script>
@endpush