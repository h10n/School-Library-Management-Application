@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li class="active">Transaction</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Transaction List</h3>
      <div class="table-button-custom">
        <a class="btn bg-orange" href="{{ route('transactions.create') }}"><span class="ion-android-add"> Add Data</span></a>
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

@push('req-scripts')
<script type="text/javascript">
  $(function(){
    $('\
    <div id="filter_status" class="dataTables_length" style="display: inline-block; margin-left:10px;">\
      <label>Status \
      <select size="1" name="filter_status" aria-controls="filter_status" \
          class="form-control input-sm" style="width: 140px;">\
              <option value="all" selected="selected">All</option>\
              <option value="returned">Returned</option>\
              <option value="not-returned">Not Yet Returned</option>\
          </select>\
      </label>\
    </div>\
    ').insertAfter('.dataTables_length');

  $("#dataTableBuilder").on('preXhr.dt', function (e, settings, data) {
    data.status = $('select[name="filter_status"]').val();
  });

  $('select[name="filter_status"]').change(function () {
  window.LaravelDataTables["dataTableBuilder"].ajax.reload();
  });
  });
</script>
@endpush