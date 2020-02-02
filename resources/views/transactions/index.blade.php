@extends('layouts.app')

@section('content')
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
      <li class="active">Data Peminjaman</li>
    </ol>
  </section>
      <section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Peminjaman</h3>
      <div class="table-button-custom">
      <a class="btn bg-orange" href="{{ route('transactions.create') }}"><span class="ion-android-add"> Tambah Data</span></a>
      <!-- a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
      <a class="btn bg-purple" href="#"><span class="ion-ios-paper"> Export</span></a -->
      </div>
    </div>
    
    <div class="box-body">
      {!! $html->table(['class' => 'table table-striped table-hover']) !!}
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
              <option value="all" selected="selected">Semua</option>\
              <option value="returned">Sudah Dikembalikan</option>\
              <option value="not-returned">Belum Dikembalikan</option>\
          </select>\
      </label>\
    </div>\
    ').insertAfter('.dataTables_length');

  $("#dataTableBuilder").on('preXhr.dt', function(e, settings, data){
    data.status = $('select[name="filter_status"]').val();
  });

  $('select[name="filter_status"]').change(function(){
    window.LaravelDataTables["dataTableBuilder"].ajax.reload();
  });
});
</script>
@endpush