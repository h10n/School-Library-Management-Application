@extends('layouts.app')
@section('content')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
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
                Welcome to {{ $tentang }}
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-olive">
                    <div class="divider">
                        <i class="fa fa-exchange dashboard-div-icon"></i>
                    </div>
                    <h4>{{$transaksi->count()}} Transactions</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-orange">
                    <div class="divider">
                        <i class="fa fa-book dashboard-div-icon"></i>
                    </div>
                    <h4>{{$buku->count()}} Books</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-navy">
                    <div class="divider">
                        <i class="fa fa-pencil dashboard-div-icon"></i>
                    </div>
                    <h4>{{$penulis->count()}} Authors</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-maroon">
                    <div class="divider">
                        <i class="fa fa-male dashboard-div-icon"></i>
                    </div>
                    <h4>{{$anggota->count()}} Members</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-yellow">
                    <div class="divider">
                        <i class="fa fa-clock-o dashboard-div-icon"></i>
                    </div>
                    <h4>{{$pinjam->count()}} Borrowed Books</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-aqua">
                    <div class="divider">
                        <i class="fa fa-home dashboard-div-icon"></i>
                    </div>
                    <h4>{{$penerbit->count()}} Publishers</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-purple">
                    <div class="divider">
                        <i class="fa fa-flag-checkered dashboard-div-icon"></i>
                    </div>
                    <h4>{{$penerbit->count()}} Categories</h4>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bg-red">
                    <div class="divider">
                        <i class="fa fa-user-plus dashboard-div-icon"></i>
                    </div>
                    <h4>{{ $todaysvisit }} Today's Visitors</h4>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
@endsection