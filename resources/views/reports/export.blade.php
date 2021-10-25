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
        <button type="submit" class="btn bg-purple btn-cetak"><span class="ion-ios-paper"> Cetak</span></button>        
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
        // ajax laporan tahunan
        $('#filter').click(function () {
                var what_year = $('#report_year').val();
                if (what_year != '') {
                    $.ajaxSetup({
                        headers: {
                            'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: '{{ route('admin.reports.visitors.lihat.tahun') }}',
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
                            // console.log(data);
                            var output = '';
                            var total = '';                            
                            var total_jumlah = 0;                            
                            var no = 0;                            
                            $.each(data, function (key, val) {
                              no++;
                              output += '<tr>';
                              output += '<td>' + no + '</td>';  
                              output += '<td>' + key + '</td>';
                              output += '<td>' + val.jumlah + '</td>';
                              output += '<td>' + '' + '</td></tr>';

                              total_jumlah += val.jumlah;
                            });
                             //baris total
                            total += '<tr>';
                            total += '<td></<td>';
                            total += '<td>' + 'Total' + '</<td>';
                            total += '<td>' + total_jumlah + '</<td>';                            
                            total += '<td></<td>';
                            total += '</tr>';
                            $('#laporanTahunan tbody').html(output);
                            $('#laporanTahunan tfoot').html(total);
                            $("input[name=what_year]").val(what_year);
                          },

                          error: function () {

                          }
                        })
                        }
                        else {

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
                autoApply:true
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
            // console.log("aman")
            $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: '{{ route('admin.reports.visitors.lihat') }}',
                method: "POST",
                dataType: "json",
                data: {
                    from_date: from_date,
                    to_date: to_date
                },
                cache: false,

                beforeSend: function () {
                    // console.log('krece');
                },

                success: function (data) {
                  // console.log(data);
                  var output = '';
                  var total = '';
                  var total_kelas_x = 0;
                  var total_kelas_xi = 0;
                  var total_kelas_xii = 0;
                  var total_guru_staff = 0;
                  var total_jumlah = 0;
                  var no = 0;
                  $.each(data, function (key, val) {
                    no++;
                    output += '<tr>';
                    output += '<td>' + no + '</td>';
                    output += '<td>' + key + '</td>';
                    output += '<td>' + val.kelas_x + '</td>';
                    output += '<td>' + val.kelas_xi + '</td>';
                    output += '<td>' + val.kelas_xii + '</td>';
                    output += '<td>' + val.guru_staff + '</td>';
                    output += '<td>' + val.jumlah + '</td></tr>';

                    total_kelas_x += val.kelas_x;
                    total_kelas_xi += val.kelas_xi;
                    total_kelas_xii += val.kelas_xii;
                    total_guru_staff += val.guru_staff;
                    total_jumlah += val.jumlah;
                  });
                  //baris total
                  total += '<tr>';
                  total += '<td></<td>';
                  total += '<td>' + 'Total' + '</<td>';
                  total += '<td>' + total_kelas_x + '</<td>';
                  total += '<td>' + total_kelas_xi + '</<td>';
                  total += '<td>' + total_kelas_xii + '</<td>';
                  total += '<td>' + total_guru_staff + '</<td>';
                  total += '<td>' + total_jumlah + '</<td>';                  
                  total += '</tr>';
                  $('#laporanBulanan tbody').html(output);
                  $('#laporanBulanan tfoot').html(total);

                },

                error: function () {

                }
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