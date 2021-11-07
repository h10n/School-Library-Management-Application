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
            <a href="{{ url('/')}}" class="navbar-brand"><b>App</b>Perpustakaan</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  @role(['admin', 'staff'])
                  <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                  @endrole
                  @role('member')
                  <li><a href="{{ route('members.status-history') }}">Status & Riwayat</a></li>
                  @endrole
                  @role('visitor')
                  <li><a href="{{ route('visitors.guest-book') }}">Buku Tamu</a></li>
                  @endrole
                  @if (!auth()->check())
                  <li><a href="{{ route('login') }}">Login</a></li>
                  @endif
                </ul>
              </li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          @include('layouts._nav-profile')
          @include('layouts._logout-form')
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
          @include('layouts._announcement')

          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Buku</h3>
              <div class="table-button-custom">
                <a class="btn bg-olive" onClick="window.location.reload();"><span class="ion-refresh">
                    Refresh</span></a>
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                {!! $html->table(['class' => 'table table-striped table-hover']) !!}
              </div>
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