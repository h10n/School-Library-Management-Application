@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li class="active">Laporan Peminjaman Buku</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Laporan Peminjaman Buku</h3>
      <div class="table-button-custom">
        {{ Form::open(['route' => 'admin.reports.transactions.cetak', 'method' => 'POST', 'target' => '_blank']) }}
        <a class="btn bg-olive" onClick="window.location.reload();"><span class="ion-refresh"> Reset</span></a>
        {{ Form::hidden('from_date') }}
        {{ Form::hidden('to_date') }}
        {{ Form::hidden('what_year') }}
        {{ Form::hidden('jenis', 'bulanan') }}
        <button type="submit" class="btn bg-purple btn-cetak"><span class="ion-printer"> Cetak</span></button>
        {{ Form::close() }}
      </div>
    </div>
    <!-- batas-->
    <div class="panel-body">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
          <a href="#report-month-panel" aria-controls="form" role="tab" data-toggle="tab"
            onClick="jenisLaporan('bulanan');">
            <i class="ion-android-calendar"></i> Bulanan
          </a>
        </li>
        <li role="presentation">
          <a href="#report-year-panel" aria-controls="upload" role="tab" data-toggle="tab"
            onClick="jenisLaporan('tahunan');">
            <i class="ion-calendar"></i> Tahunan
          </a>
        </li>
        {{-- <li role="presentation">
          <a href="#report-per-class" aria-controls="upload" role="tab" data-toggle="tab">
            <i class="ion-android-contacts"></i> Per Kelas
          </a>
        </li> --}}
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active add-little-padding-panel" id="report-month-panel">
          <a class="btn bg-blue" id="daterange-btn" style="margin-left:15px;">
            <span><i class="fa fa-calendar"></i> Pilih Periode</span>
            <i class="fa fa-caret-down"></i>
          </a>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="laporanBulanan">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Hari/Tanggal</th>
                    <th>Jumlah Buku Dipinjam</th>
                    <th>Jumlah Buku Kembali</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>

                </tfoot>
              </table>
              {{ csrf_field() }}
            </div>
          </div>

        </div>
        <div role="tabpanel" class="tab-pane add-little-padding-panel" id="report-year-panel">
          <div class="col-md-2">
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input class="form-control" name="report_year" type="text" id="report_year" placeholder="Pilih Tahun"
                maxlength="4">

            </div>
          </div>
          <input type="button" name="filter-transaksi-tahun" id="filter-transaksi-tahun" value="Filter"
            class="btn btn-info" />
          <div class="box-body">
            <table class="table table-striped table-hover" id="laporanTahunan">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Bulan</th>
                  <th>Jumlah Buku Di Pinjam </th>
                  <th>Jumlah Buku Kembali</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
              <tfoot>

              </tfoot>
            </table>
            {{ csrf_field() }}
          </div>
        </div>
      </div>
    </div>
    <!-- batas -->
  </div>
</section>
@endsection

@push('req-scripts')
<script>
$('#filter-transaksi-tahun').click(function () {
   var what_year = $('#report_year').val();
   if (what_year != '') {
     $.ajaxSetup({
       headers: {
         'X-XSRF-Token': $('meta[name="_token"]').attr('content')
       }
     });

     $.ajax({
       type: "POST",
       url: '{{ route('admin.reports.transactions.lihat.tahun') }}',
       method: "POST",
       dataType: "json",
       data: {
         what_year: what_year
       },
       cache: false,

       beforeSend: function () {
         // console.log('krece');
       },

       success: function (data) {
         var output = '';
         var total = '';
         var total_peminjaman = 0;
         var total_pengembalian = 0;
         var no = 0;
         $.each(data, function (key, val) {
           // console.log(key);
           no++;
           output += '<tr>';
           output += '<td>' + no + '</td>';
           output += '<td>' + key + '</td>';
           output += '<td>' + val.peminjaman + '</td>';
           output += '<td>' + val.pengembalian + '</td>';
           output += '<td>' + '' + '</td></tr>';

           total_peminjaman += val.peminjaman;
           total_pengembalian += val.pengembalian;
         });
         //baris total
         total += '<tr>';
         total += '<td></<td>';
         total += '<td>' + 'Total' + '</<td>';
         total += '<td>' + total_peminjaman + '</<td>';
         total += '<td>' + total_pengembalian + '</<td>';
         total += '<td></<td>';
         total += '</tr>';
         $('#laporanTahunan tbody').html(output);
         $('#laporanTahunan tfoot').html(total);
         $("input[name=what_year]").val(what_year);


       },

       error: function () {
         console.log("gagal");
       }
     })
   } else {

   }
 });

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

     ajaxLaporanBulan(from_date, to_date);
     $("input[name=from_date]").val(from_date);
     $("input[name=to_date]").val(to_date);
   }
 );

 function ajaxLaporanBulan(from_date, to_date) {
   $.ajaxSetup({
     headers: {
       'X-XSRF-Token': $('meta[name="_token"]').attr('content')
     }
   });

   $.ajax({
     type: "POST",
     url: '{{ route('admin.reports.transactions.lihat') }}',
     method: "POST",
     dataType: "json",
     data: {
       from_date: from_date,
       to_date: to_date
     },
     cache: false,

     beforeSend: function () {},

     success: function (data) {
       var output = '';
       var total = '';
       var total_peminjaman = 0;
       var total_pengembalian = 0;
       var no = 0;
       $.each(data, function (key, val) {
         // console.log(key);
         no++;
         output += '<tr>';
         output += '<td>' + no + '</td>';
         output += '<td>' + key + '</td>';
         output += '<td>' + val.peminjaman + '</td>';
         output += '<td>' + val.pengembalian + '</td>';
         output += '<td>' + '' + '</td></tr>';

         total_peminjaman += val.peminjaman;
         total_pengembalian += val.pengembalian;
       });
       //baris total
       total += '<tr>';
       total += '<td></<td>';
       total += '<td>' + 'Total' + '</<td>';
       total += '<td>' + total_peminjaman + '</<td>';
       total += '<td>' + total_pengembalian + '</<td>';
       total += '<td></<td>';
       total += '</tr>';
       $('#laporanBulanan tbody').html(output);
       $('#laporanBulanan tfoot').html(total);
     },
     error: function () {}
   });

 }

 function jenisLaporan(jenis) {
   $("input[name=jenis]").val(jenis);
 }
 $('#report_year').datepicker({
   minViewMode: 2,
   format: 'yyyy',
   autoclose: true
 });
</script>
@endpush