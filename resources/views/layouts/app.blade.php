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
               <!-- Logo -->
    <a href="{{ url('/')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>PS</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>APL</b>Perpustakaan</span>
      </a>
            <nav class="navbar" role="navigation">
        <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

                {{-- <div class="col-md-9">
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
                </div> --}}
                
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
                        <li>
                            <a href="{{ route('login') }}"><i class="fa fa-unlock"></i> Login</a>
                        </li>
                        @endif
                    </ul>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </nav>

        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">        
            <section class="sidebar">
                <div class="profil thumbnail">
                    <a href="{{ url('/')}}">
                        {!! Html::image(asset('img/logo/'.$logo),null,['class' => 'img-responsive']) !!}                        
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
            @if (request()->is('/') || request()->is('home'))                        
            <div class="content-header">
                <div class="alert alert-warning">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon ion-speakerphone"></i> Pengumuman!</h4>
                    <ul>
                        @foreach($announcements as $announcement)
                            <li>{{$announcement->text}}</li>
                            @endforeach
                    </ul>
                </div>
            </div>
            @endif
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