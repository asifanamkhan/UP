<nav style=" height: 10px" class="navbar top-navbar navbar-expand-md navbar-light" >
    <div class="navbar-header">
        <a class="navbar-brand" href="{{route('admin')}}">
            <b><img src="{{asset('images/logo-icon.png')}}" alt="homepage" class="dark-logo" /></b>
            <span>
                 <!-- dark Logo text -->
                 {{--<img  src="{{asset('images/logo-text.png')}}" alt="homepage" class="dark-logo" />--}}
                <!-- Light Logo text -->
                 <img style="margin-top: 18px" src="{{asset('images/Shanda Logo.png')}}" class="light-logo" alt="homepage" />
            </span>
        </a>
    </div>
    <div class="navbar-collapse">
        <ul class="navbar-nav mr-auto mt-md-0 ">
            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li>
        </ul>
        @auth
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('images/users/1.jpg')}}" alt="user" class="profile-pic" /></a>
                    <div style="background-color: white" class="dropdown-menu dropdown-menu-right animated flipInY">
                        <ul class="dropdown-user" style="background-color: white">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{asset('images/users/1.jpg')}}" alt="user"></div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            @endauth

    </div>
</nav>