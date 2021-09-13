<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>{{ $nama_perpus }}</title>
    @include('layouts._styles')    
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-red-light layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ url('/')}}" class="navbar-brand"><b>APL</b>Perpustakaan</a>         
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ route('login') }}"><i class="fa fa-unlock"></i> Login <span class="sr-only">(current)</span></a></li>                      
          </ul>         
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">                   
          
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        @include('guest.carousel')  
      </section>
      
      <!-- Main content -->
      <section class="content">        
        <div class="callout callout-warning">
          <h4><i class="icon ion-speakerphone"></i> Pengumuman!</h4>          
            <ul>
              @foreach($announcements as $announcement)
                  <li>{{$announcement->text}}</li>
                  @endforeach
            </ul>
        </div>
                       
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Daftar Buku</h3>
            <div class="table-button-custom">      
              <a class="btn bg-olive" onClick="window.location.reload();"><span class="ion-refresh"> Refresh</span></a>        
            </div>
          </div>
          <div class="box-body">
            {!! $html->table(['class' => 'table table-striped table-hover']) !!}
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts._footer')
</div>
<!-- ./wrapper -->
@include('layouts._scripts')
{!! $html->scripts() !!}
</body>
</html>
