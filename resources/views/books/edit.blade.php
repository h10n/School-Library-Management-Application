@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('/admin/books') }}"> Book</a></li>
    <li class="active">Edit Book</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Edit Book</h3>
      <div class="table-button-custom">
        <a class="btn bg-red" href="{{ route('books.index') }}"><span class="ion-android-arrow-back">
            Back</span></a>
      </div>
    </div>

    <div class="box-body">

      {!! Form::model($book,[
      'url' => route('books.update', $book->id),
      'method' => 'PUT',
      'files' => 'true',
      'class' => 'form-horizontal'
      ])
      !!}
      @include('books._form')
      {!! Form::close() !!}


    </div>
  </div>
</section>
@endsection

@push('req-scripts')
<script>
            $('#published-year').datepicker({
              minViewMode: 2,
              format: 'yyyy',
              autoclose: true
            });
            $('#book-year').datepicker({
              minViewMode: 2,
              format: 'yyyy',
              autoclose: true
            });

            function resetBuku() {
              //very awful code, fix it in future
              var $select = $('#author_id');
              var control = $select[0].selectize;
              control.clear();

              var $select = $('#publisher_id');
              var control = $select[0].selectize;
              control.clear();

              var $select = $('#category_id');
              var control = $select[0].selectize;
              control.clear();
            }
</script>
@endpush