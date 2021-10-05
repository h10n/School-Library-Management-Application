<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        @if (auth()->check())       
            @if (auth()->user()->hasRole('member'))
            @php
                $memberPhoto = auth()->user()->member->photo ? asset('img/members_photo/'.auth()->user()->member->photo) : asset('img/icons8-no-camera.svg');
            @endphp
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">                    
                    <img src="{{ $memberPhoto }}" class="user-image" alt="User Image">                    
                    <span class="hidden-xs">
                        @if (auth()->user()->member->name)
                        {{Auth::user()->member->name}}
                        @endif
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">                        
                        <img src="{{ $memberPhoto }}" class="img-circle" alt="User Image">                        
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
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
            @else
            @php
                $adminPhoto = auth()->user()->photo ? asset('img/admins_photo/'.auth()->user()->photo) : asset('img/icons8-no-camera.svg');
            @endphp
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">                    
                    <img src="{{ $adminPhoto }}" class="user-image" alt="User Image">                    
                    <span class="hidden-xs">{{Auth::user()->name}}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">                        
                        <img src="{{ $adminPhoto }}" class="img-circle" alt="User Image">                        
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
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
            @endif        
        @endif
    </ul>
</div>