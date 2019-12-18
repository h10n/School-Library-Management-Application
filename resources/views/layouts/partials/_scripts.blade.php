<!-- REQUIRED JS SCRIPTS -->
    <script src="{{asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!--untuk data table -->
    <script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!--End untuk data table -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/selectize.min.js') }}"></script>
    <script src="{{ asset('js/apps.js') }}"></script>
    @yield('scripts')    
    <script src="{{asset('dist/js/adminlte.min.js') }}"></script>
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

        function ajaxLaporanBulan(from_date, to_date) {
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
                    console.log('krece');
                },

                success: function (data) {
                    // console.log(data);
                    var output = '';
                    $('#total_records').text(data.length);
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

                }
            });

        }

        function resetTransaksi() {
            //very awful code, fix it in future
            var $select = $('#member_id');
            var control = $select[0].selectize;
            control.clear();

            var $select = $('#book_id');
            var control = $select[0].selectize;
            control.clear();
        }

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

        $(function () {
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
                            console.log('krece');
                        },

                        success: function (data) {
                            // console.log(data);
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

                        }
                    })
                } else {

                }
            });

            $('#filter-transaksi-tahun').click(function () {
                //    console.log("tes");
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
                            console.log('krece');
                        },

                        success: function (data) {
                            // console.log(data);
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

                        }
                    })
                } else {

                }
            });


        });

        function add(link, title) {
            $(".modal-title").html('<span class="glyphicon glyphicon-plus"></span> Tambah Data ' + title);
            save_method = 'add';
            $('#modal_form').modal('show');
            $.get(link,
                function (html) {
                    $(".modal-body").html(html);
                }
            );
        }

        function edit(link, title) {
            $(".modal-title").html('<span class="glyphicon glyphicon-pencil"></span> Edit Data ' + title);
            save_method = 'update';
            $('#modal_form').modal('show');
            $.get(link,
                function (html) {
                    $(".modal-body").html(html);
                }
            );
        }

        $(function () {
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
        $(function () {

            createMarquee({
                duration: 200000
            });
        });
    </script>


@stack('req-scripts')

@stack('custom-scripts')