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