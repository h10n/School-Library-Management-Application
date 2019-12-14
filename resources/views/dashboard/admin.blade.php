@extends('layouts.app')
@section('content')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="#"><i class="ion-ios-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content container-fluid">
    <div class="box">
        <div class="box-header-dashboard">
            <h3 class="box-title">Dashboard</h3>
        </div>
        <div class="box-body">
            <div class="callout callout-info">
                Selamat Datang di Aplikasi Perpustakaan {{ $nama_perpus }}
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-olive">
                    <div class="divider">
                        <i class="fa fa-exchange dashboard-div-icon"></i>
                    </div>
                    <h4>{{$transaksi->count()}} Transaksi</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-orange">
                    <div class="divider">
                        <i class="fa fa-book dashboard-div-icon"></i>
                    </div>
                    <h4>{{$buku->count()}} Buku</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-navy">
                    <div class="divider">
                        <i class="fa fa-pencil dashboard-div-icon"></i>
                    </div>
                    <h4>{{$penulis->count()}} Penulis</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-maroon">
                    <div class="divider">
                        <i class="fa fa-male dashboard-div-icon"></i>
                    </div>
                    <h4>{{$anggota->count()}} Anggota</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-yellow">
                    <div class="divider">
                        <i class="fa fa-clock-o dashboard-div-icon"></i>
                    </div>
                    <h4>{{$pinjam->count()}} Buku Dipinjam</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-aqua">
                    <div class="divider">
                        <i class="fa fa-home dashboard-div-icon"></i>
                    </div>
                    <h4>{{$penerbit->count()}} Penerbit</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-purple">
                    <div class="divider">
                        <i class="fa fa-flag-checkered dashboard-div-icon"></i>
                    </div>
                    <h4>{{$penerbit->count()}} Kategori</h4>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-red">
                    <div class="divider">
                        <i class="fa fa-key dashboard-div-icon"></i>
                    </div>
                    <h4>{{$petugas->count()}} Petugas</h4>
                </div>
            </div>
        </div>

    </div>

</section>
@endsection

@section('scripts')
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script type="text/javascript">
    var data = {
        labels: {
            !!json_encode($authors) !!
        },
        datasets: [{
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,0.8)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            highlightFill: "rgba(151,187,205,0.75)",
            highlightStroke: "rgba(151,187,205,1)",
            data: {
                !!json_encode($books) !!
            }
        }]
    };

    var ctx = document.getElementById("chartPenulis").getContext("2d");
    var myLineChart = new Chart(ctx).Bar(data);
</script>
@endsection