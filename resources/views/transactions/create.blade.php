@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('/admin/transactions') }}"> Transaction</a></li>
    <li class="active">Add Transaction</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Add Transaction</h3>
      <div class="table-button-custom">
        <a class="btn bg-red" href="{{ route('transactions.index') }}"><span class="ion-android-arrow-back">
            Back</span></a>
      </div>
    </div>

    <div class="box-body">
      {!! Form::open([
      'url' => route('transactions.store'),
      'method' => 'POST',
      'class' => 'form-horizontal'
      ])
      !!}
      @include('transactions._form')
      {!! Form::close() !!}
    </div>
  </div>
</section>
@endsection

@push('req-scripts')
<script>
  function resetTransaksi() {
    //very awful code, fix it in future
    var $select = $('#member_id');
    var control = $select[0].selectize;
    control.clear();

    var $select = $('#book_id');
    var control = $select[0].selectize;
    control.clear();
  }
</script>
@endpush