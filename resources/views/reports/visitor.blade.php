@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="ion-ios-home"></i> Dashboard</a></li>
    <li class="active">Laporan Pengunjung</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Laporan Pengunjung</h3>
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
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active add-little-padding-panel" id="report-month-panel">
          <a class="btn bg-blue" id="daterange-btn">
            <span><i class="fa fa-calendar"></i> Pilih Periode Laporan Bulanan</span>
            <i class="fa fa-caret-down"></i>
          </a>
          <div class="box-body">

            <label> Jumlah Data : </label> <b><span id="total_records">0</span></b>
            <table class="table table-striped table-hover" id="">
              <thead>
                <tr>
                  <th>No Induk</th>
                  <th>Nama</th>
                  <th>Jenis Anggota</th>
                  <th>Kelas</th>
                  <th>Keperluan</th>
                  <th>Tanggal</th>
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
          <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />
          <div class="box-body">

            <label> Jumlah Data : </label> <b><span id="total_records-years">0</span></b>
            <table class="table table-striped table-hover" id="">
              <thead>
                <tr>
                  <th>No Induk</th>
                  <th>Nama</th>
                  <th>Jenis Anggota</th>
                  <th>Kelas</th>
                  <th>Keperluan</th>
                  <th>Tanggal</th>
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