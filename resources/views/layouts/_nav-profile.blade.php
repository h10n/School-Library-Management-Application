<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        @if (auth()->check())
        @php
        $user = auth()->user();
        if ($user->hasRole('member')) {
        $fullName = $user->member->name;
        $photoData = $user->member->photo;
        $imgDir = 'anggota/';
        }else{
        $fullName = $user->name;
        $photoData = $user->photo;
        $imgDir = 'user/';
        }

        $imgUrl = $photoData ? asset('storage/uploads/'.$imgDir.$photoData) : asset('img/icons8-no-camera.svg');
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
                        <small>{{ $user->last_login ? 'Login Terakhir '.$user->last_login->format('d-m-Y H:i') : '' }}</small>
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