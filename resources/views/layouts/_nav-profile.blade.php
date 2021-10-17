<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        @if (auth()->check())                   
            @php
                $user = auth()->user();
                if ($user->hasRole('member')) {
                    $fullName = $user->member->name;
                    $photoData = $user->member->photo;
                    $imgDir = 'img/members_photo/';
                }else{
                    $fullName = $user->name;
                    $photoData = $user->photo;
                    $imgDir = 'storage/uploads/user/';
                }  

                $imgUrl = $photoData ? asset($imgDir.$photoData) : asset('img/no-avatar-small.svg');                
            @endphp
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">                    
                    <img src="{{ $imgUrl }}" class="user-image" alt="User Image">                    
                    <span class="hidden-xs">{{ $fullName }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">                        
                        <img src="{{ $imgUrl }}" class="img-circle" alt="User Image">                        
                        <p>
                            {{ $user->name }}
                            <small>Login Terakhir {{ $user->last_login }}</small>
                        </p>
                    </li>
                    <!-- Menu Body -->
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{{url('users/profile')}}" class="btn btn-default btn-flat">Profile</a>
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
    </ul>
</div>