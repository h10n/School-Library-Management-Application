@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li class="active">Buku</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Book List</h3>
      <div class="table-button-custom">
        <a class="btn bg-orange" href="{{ route('books.create') }}"><span class="ion-android-add"> Tambah
            Data</span>
        </a>
      </div>
    </div>

    <div class="box-body">
      <div class="table-responsive">
        {!! $html->table(['class' => 'table table-striped table-hover']) !!}
      </div>
    </div>
  </div>
</section>
@endsection
@section('scripts')
{!! $html->scripts() !!}
@endsection