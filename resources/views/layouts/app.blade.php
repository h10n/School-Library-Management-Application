<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LaraPus') }}</title>

     <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">

    <!-- Theme style -->

    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css') }}">
    <!-- date picker -->

    <!--link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css') }}"-->
    <!-- AdminLTE Skins. We have chosen the skin-red-light for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/skin-red-light.min.css') }}">
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.bootstrap3.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/apps.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!--link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="{{ asset('css/visitor-form.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/custom.css') }}">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-red-light sidebar-mini">

    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">


            <nav class="navbar" role="navigation">
            <div class="col-md-9">
                <div class="container-marquee">
                                <div class="marquee-sibling">
                                    <i class="ion-speakerphone"></i> Pengumuman</div>
                                <div class="marquee">
                                    <ul class="marquee-content-items">
                                        @foreach($announcements as $announcement)
                                        <li><a href="#">{{$announcement->text}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                </div>
                <div class="col-md-3">
            <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        @if (auth()->check())
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                 @if (auth()->user()->photo)
                                <img src="{{asset('img/admins_photo/'.auth()->user()->photo) }}" class="user-image" alt="User Image">
                                      @endif
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{Auth::user()->name}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                   @if (auth()->user()->photo)
                                    <img src="{{asset('img/admins_photo/'.auth()->user()->photo) }}" class="img-circle" alt="User Image">
                                    @endif
                                    <p>

                                         {{Auth::user()->name}}

                                        <small>Login Terakhir {{auth()->user()->last_login}}</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{url('admin/settings/profile')}}" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="{{ url('admin/settings/general') }}"><i class="fa fa-gears"></i></a>
                        </li>
                        @endif
                    </ul>
                </div>
                </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>

            </nav>


        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar no-pad-top">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <div class="profil thumbnail">
                    <a href="{{ url('/')}}">
                        {!! Html::image(asset('img/logo/'.$logo),null,['class' => 'img-responsive']) !!}
              <div class="caption">
                <h5>Aplikasi Perpustakaan {{ $nama_perpus }}</h5>
              </div>
            </a>
                </div>
                <!-- Profile Image -->
                <!-- /.box -->

                <!-- Sidebar user panel (optional) -->

                <!-- search form (Optional) -->

                <!-- /.search form -->

                <!-- Sidebar Menu -->
                @include('layouts.menu')
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <!--------------------------
        | Your Page Content Here |
        -------------------------->
             @include('layouts._flash')
             @include('errors.customerror')
            @yield('content')

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Aplikasi Perpustakaan {{ $nama_perpus }}
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2018 <a href="#">Nur Hakim</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- modal -->

    <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                <h4 class="modal-title"></h4>
             </div>
             <div class="modal-body">
             </div>
          </div>
       </div>
    </div>


    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="{{asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- date picker -->
    <script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <!--untuk data table -->
    <!-- script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script -->
    <!-- script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script -->
    <!-- SlimScroll -->
    <script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- FastClick -->
    <script src="{{asset('bower_components/fastclick/lib/fastclick.js') }}"></script>

    <!--End untuk data table -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/selectize.min.js') }}"></script>
    <script src="{{ asset('js/apps.js') }}"></script>
    @yield('scripts')
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js') }}"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- page script -->
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})
    </script>
           <script>
        $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Hari Ini'       : [moment(), moment()],
          'Kemarin'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          '7 Hari Terakhir' : [moment().subtract(6, 'days'), moment()],
          '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
          'Bulan Ini'  : [moment().startOf('month'), moment().endOf('month')],
          'Bulan Kemarin'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));

          var from_date = start.format('YYYY-MM-DD');    //baca sesuai format default laravel
          var to_date = end.format('YYYY-MM-DD');


ajaxLaporanBulan(from_date,to_date);
          /*dari sini modfifan

          $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
        type: "POST",
                url   : '{{ route('admin.reports.visitors.lihat') }}',
                method: "POST",
                dataType: "json",
                data: {from_date: from_date, to_date: to_date},
                cache : false,

                beforeSend : function() {
                    console.log('krece');
                },

                success : function(data) {
                   // console.log(data);
                    var output = '';
                     $('#total_records').text(data.length);
                    for(var count = 0; count < data.length; count++)
                        {
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

                error : function() {

                }
            });
          sampe sini gan*/

      }
    )
function ajaxLaporanBulan(from_date, to_date){
  $.ajaxSetup({
        headers: {
            'X-XSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
  type: "POST",
        url   : '{{ route('admin.reports.visitors.lihat') }}',
        method: "POST",
        dataType: "json",
        data: {from_date: from_date, to_date: to_date},
        cache : false,

        beforeSend : function() {
            console.log('krece');
        },

        success : function(data) {
           // console.log(data);
            var output = '';
             $('#total_records').text(data.length);
            for(var count = 0; count < data.length; count++)
                {
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

        error : function() {

        }
    });

}
function resetTransaksi(){
  //very awful code, fix it in future
    var $select = $('#member_id');
     var control = $select[0].selectize;
     control.clear();

     var $select = $('#book_id');
      var control = $select[0].selectize;
      control.clear();
    }

    function resetBuku(){
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

    $(function(){
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
         $('#report_year').datepicker({
      minViewMode: 2,
           format: 'yyyy',
        autoclose: true
      });
        // ajax laporan tahunan

        $('#filter').click(function(){
                var what_year = $('#report_year').val();
                if(what_year != '')
                {
                             $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
        type: "POST",
                url   : '{{ route('admin.reports.visitors.lihat.tahun') }}',
                method: "POST",
                dataType: "json",
                data: {what_year: what_year},
                cache : false,

                beforeSend : function() {
                    console.log('krece');
                },

                success : function(data) {
                   // console.log(data);
                    var output = '';
                     $('#total_records-years').text(data.length);
                    for(var count = 0; count < data.length; count++)
                        {
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

                error : function() {

                }
            })
                }
                else
                {

                }
           });

           $('#filter-transaksi-tahun').click(function(){
            //    console.log("tes");
                var what_year = $('#report_year').val();
                if(what_year != '')
                {
                             $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
        type: "POST",
                url   : '{{ route('admin.reports.transactions.lihat.tahun') }}',
                method: "POST",
                dataType: "json",
                data: {what_year: what_year},
                cache : false,

                beforeSend : function() {
                    console.log('krece');
                },

                success : function(data) {
                   // console.log(data);
                    var output = '';
                     $('#total_records-years').text(data.length);
                    for(var count = 0; count < data.length; count++)
                        {
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

                error : function() {

                }
            })
                }
                else
                {

                }
           });


    });

    function add(link,title)
    {
      $(".modal-title").html('<span class="glyphicon glyphicon-plus"></span> Tambah Data '+title);
       save_method = 'add';
       $('#modal_form').modal('show');
       $.get(link,
            function(html){
                $(".modal-body").html(html);
            }
        );
    }

    function edit(link,title)
    {
      $(".modal-title").html('<span class="glyphicon glyphicon-pencil"></span> Edit Data '+title);
       save_method = 'update';
       $('#modal_form').modal('show');
       $.get(link,
            function(html){
                $(".modal-body").html(html);
            }
        );
    }

        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            });
        })


    </script>
    <script src="{{ asset('js/marquee.js') }}"></script>
    <script>
        $(function() {

            createMarquee({
                duration: 200000
            });

            //example of overwriting defaults:

            // createMarquee({
            // 		duration:30000,
            // 		padding:20,
            // 		marquee_class:'.example-marquee',
            // 		container_class: '.example-container',
            // 		sibling_class: '.example-sibling',
            // 		hover: false});
            // });
        });

    </script>
    <script>
        //script form visitor
    $('#jenis_anggota').change(function() {
    if ($(this).val() === 'siswa/i') {
        $('.kelas').show();
    }else{
        $('.kelas').hide();
    }
});
    </script>


</body>

</html>
