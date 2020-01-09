@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="ion-ios-home"></i> Dashboard</a></li>
    <li class="active">Laporan Peminjaman Buku</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Laporan Peminjaman Buku</h3>
      <div class="table-button-custom">
        <a class="btn bg-olive" onClick="window.location.reload();"><span class="ion-refresh"> Reset</span></a>
        <a class="btn bg-purple" href="{{ route('admin.export.books') }}"><span class="ion-ios-paper"> Export</span></a>
      </div>
    </div>
    <!-- batas-->
    <div class="panel-body">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
          <a href="#report-month-panel" aria-controls="form" role="tab" data-toggle="tab">
            <i class="ion-android-calendar"></i> Bulanan
          </a>
        </li>
        <li role="presentation">
          <a href="#report-year-panel" aria-controls="upload" role="tab" data-toggle="tab">
            <i class="ion-calendar"></i> Tahunan
          </a>
        </li>
        <li role="presentation">
          <a href="#report-per-class" aria-controls="upload" role="tab" data-toggle="tab">
            <i class="ion-android-contacts"></i> Per Kelas
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active add-little-padding-panel" id="report-month-panel">
          <a class="btn bg-blue" id="daterange-btn">
            <span><i class="fa fa-calendar"></i> Pilih Periode Laporan Bulanan</span>
            <i class="fa fa-caret-down"></i>
          </a>
          <div class="box-body">

            <label> Jumlah Data : </label> <b><span id="total_records">0</span></b>
            <table class="table table-striped table-hover" id="laporanBulanan">
              <thead>
                <tr>
                  <th>Hari / Tanggal</th>
                  <th>Jumlah Buku Dipinjam</th>
                  <th>Jumlah Buku Kembali</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
            {{ csrf_field() }}
          </div>

        </div>
        <div role="tabpanel" class="tab-pane add-little-padding-panel" id="report-year-panel">
          <div class="col-md-2">
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input class="form-control" name="report_year" type="text" id="report_year" placeholder="Pilih Tahun">

            </div>
          </div>
          <input type="button" name="filter-transaksi-tahun" id="filter-transaksi-tahun" value="Filter"
            class="btn btn-info" />
          <div class="box-body">

            <label> Jumlah Data : </label> <b><span id="total_records-years">0</span></b>
            <table class="table table-striped table-hover" id="">
              <thead>
                <tr>
                  <th>Bulan</th>
                  <th>Jumlah Buku Di Pinjam </th>
                  <th>Jumlah Buku Kembali</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
            {{ csrf_field() }}
          </div>
        </div>

        <div role="tabpanel" class="tab-pane add-little-padding-panel" id="report-per-class">
          <div class="col-md-2">
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input class="form-control" name="report_year" type="text" id="report_year" placeholder="Pilih Tahun">

            </div>
          </div>
          <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />
          <div class="box-body">

            <label> Jumlah Data : </label> <b><span id="total_records-years">0</span></b>
            <table class="table table-striped table-hover" id="">
              <thead>
                <tr>
                  <th>Kelas </th>
                  <th>Pinjam</th>
                  <th>Tidak Pinjam </th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
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
                   console.log(what_year);
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
                            console.log('krece');
                        },

                        success: function (data) {
                            console.log(data);
                            var output = '';
                            $('#total_records-years').text(data.length);
                            for (var count = 0; count < data.length; count++) {
                                output += '<tr>';
                                output += '<td>' + data[count].no_induk + '</td>';
                                output += '<td>' + data[count].name + '</td>';
                                output += '<td>' + data[count].jenis_anggota + '</td>';
                                output += '<td>' + data[count].kelas + '</td>';
                                output += '<td>' + data[count].keperluan + '</td>';
                                output += '<td>' + data[count].created_at + '</td></tr>';
                            }
                            $('tbody').html(output);



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
                endDate: moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));

                var from_date = start.format('YYYY-MM-DD'); //baca sesuai format default laravel
                var to_date = end.format('YYYY-MM-DD');

                ajaxLaporanBulan(from_date, to_date);                

            }
        );

        function ajaxLaporanBulan(from_date, to_date) {
            // console.log("aman")
            $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: '{{ route('admin.reports.transaction.lihat') }}',
                method: "POST",
                dataType: "json",
                data: {
                    from_date: from_date,
                    to_date: to_date
                },
                cache: false,

                beforeSend: function () {
                    console.log('krece');
                },

                success: function (data) {
                    var output = '';
                    $('#total_records').text(data.length);                    
                      $.each(data, function (key, val) {
                    console.log(key);
                        output += '<tr>';
                        output += '<td>' + key + '</td>';
                        output += '<td>' + val.peminjaman + '</td>';
                        output += '<td>' + val.pengembalian + '</td>';                                             
                        output += '<td>' + '' + '</td></tr>';
                      });                    
                    $('#laporanBulanan tbody').html(output);

                },

                error: function () {

                }
            });

        }

            $('#report_year').datepicker({
                minViewMode: 2,
                format: 'yyyy',
                autoclose: true
            });
</script>
@endpush