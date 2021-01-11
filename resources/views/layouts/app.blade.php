<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>{{ $nama_perpus }}</title>
    <link rel="icon" href="{{ asset('img/logo/'.$logo) }}">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{asset('dist/css/skins/skin-red-light.min.css') }}">
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.bootstrap3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/apps.css') }}" rel="stylesheet">
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
                            @if (auth()->user()->hasRole('member'))
                            <li class="dropdown user user-menu">                                
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">                                    
                                    @if (auth()->user()->member->photo)
                                    <img src="{{asset('img/members_photo/'.auth()->user()->member->photo) }}" class="user-image" alt="User Image">
                                    @endif                                    
                                    <span class="hidden-xs">
                                        @if (auth()->user()->member->name)
                                        {{Auth::user()->member->name}}
                                        @endif
                                    </span>
                                </a>
                                <ul class="dropdown-menu">                                         
                                    <li class="user-header">
                                        @if (auth()->user()->member->photo)
                                        <img src="{{asset('img/members_photo/'.auth()->user()->member->photo) }}"
                                            class="img-circle" alt="User Image">
                                        @endif
                                        <p>
                                            @if (auth()->user()->member->name)
                                            {{Auth::user()->member->name}}
                                            @endif
                                            <small>Login Terakhir {{auth()->user()->last_login}}</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>                            
                            @else
                            <li class="dropdown user user-menu">                                
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">                                    
                                    @if (auth()->user()->photo)
                                    <img src="{{asset('img/admins_photo/'.auth()->user()->photo) }}" class="user-image" alt="User Image">
                                    @endif                                    
                                    <span class="hidden-xs">{{Auth::user()->name}}</span>
                                </a>
                                <ul class="dropdown-menu">                                    
                                    <li class="user-header">
                                        @if (auth()->user()->photo)
                                        <img src="{{asset('img/admins_photo/'.auth()->user()->photo) }}"
                                            class="img-circle" alt="User Image">
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
                            <li>
                                <a href="{{ url('admin/settings/general') }}"><i class="fa fa-gears"></i></a>
                            </li>
                            @endif
                            @else                            
                        <a href="{{ route('login') }}" class="btn btn-warning btn-block btn-flat">Login</a>
                            @endif
                        </ul>
                    </div>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </nav>

        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar no-pad-top">        
            <section class="sidebar">
                <div class="profil thumbnail">
                    <a href="{{ url('/')}}">
                        {!! Html::image(asset('img/logo/'.$logo),null,['class' => 'img-responsive']) !!}
                        <div class="caption">
                            <h5>{{ $nama_perpus }}</h5>
                        </div>
                    </a>
                </div>            
                <!-- Sidebar Menu -->
                @include('layouts.menu')
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('layouts._flash')
            @include('errors.customerror')
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                Aplikasi Perpustakaan {{ $nama_perpus }}
            </div>
            <strong>Copyright &copy; 2018 <a href="#">Nur Hakim</a>.</strong> All rights reserved.
        </footer>
        <div class="control-sidebar-bg"></div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
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
    @include('layouts._scripts')
</body>
</html>