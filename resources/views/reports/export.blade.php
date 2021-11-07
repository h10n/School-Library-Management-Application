@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li class="active">Ekspor Data</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    {{ Form::open(['route' => 'admin.export-cetak', 'method' => 'POST', 'target' => '_blank']) }}
    <div class="box-header">
      <h3 class="box-title">Ekspor Data</h3>
      <div class="table-button-custom">
        <a class="btn bg-olive" onClick="window.location.reload();"><span class="ion-refresh"> Reset</span></a>
        {{ Form::hidden('from_date') }}
        {{ Form::hidden('to_date') }}
        {{ Form::hidden('what_year') }}
        {{ Form::hidden('jenis', 'bulanan') }}
        <button type="submit" class="btn bg-purple btn-cetak"><span class="ion-printer"> Cetak</span></button>
      </div>
    </div>
    <div class="box-body">
      <div class="form-group">
        <a class="btn bg-blue" id="daterange-btn" style="margin-left:15px;">
          <span><i class="fa fa-calendar"></i> Pilih Periode</span>
          <i class="fa fa-caret-down"></i>
        </a>
      </div>

      <div class="form-group{{$errors->has('jenis') ? ' has-error' : ''}}">
        {!! Form::label('jenis','Jenis Data :',['class' => 'col-md-12 control-label']) !!}
        <div class="col-md-12">
          <div class="radio">
            <label>
              <input type="radio" name="jenis" id="pengunjung" value="pengunjung" checked>
              Pengunjung
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="jenis" id="anggota" value="anggota">
              Anggota
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="jenis" id="buku" value="buku">
              Buku
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="jenis" id="peminjaman" value="peminjaman">
              Peminjaman
            </label>
          </div>
        </div>
        {!! $errors->first('jenis','<p class="help-block"><strong>:message</strong></p>') !!}
      </div>
    </div>
    {{ Form::close() }}
  </div>
</section>
@endsection

@push('req-scripts')
<script>        
        $('#daterange-btn').daterangepicker({
            ranges: {
              'Hari Ini': [moment(), moment()],
              'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
              '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
              'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
              'Bulan Kemarin': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            autoApply: true
          },
          function (start, end) {
            $('#daterange-btn span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));

            var from_date = start.format('YYYY-MM-DD'); //baca sesuai format default laravel
            var to_date = end.format('YYYY-MM-DD');
            
            $("input[name=from_date]").val(from_date);
            $("input[name=to_date]").val(to_date);
          }
        );
      
        function jenisLaporan(jenis) {
          $("input[name=jenis]").val(jenis);
        }
</script>
@endpush