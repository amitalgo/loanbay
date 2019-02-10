<nav class="navbar top-navbar navbar-expand-md navbar-light">
    <!-- Logo -->
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html">
            <!-- Logo icon -->
            {{--<b><h4 class="dark-logo">GB</h4></b>--}}
            <!--End Logo icon -->
            <!-- Logo text -->
            <span><h4 class="dark-logo">Loan Bay</h4></span>
        </a>
    </div>
    <!-- End Logo -->
    <div class="navbar-collapse">
        <ul class="navbar-nav mr-auto mt-md-0">
            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
            <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
        </ul>
        <!-- User profile and search -->
        <ul class="navbar-nav my-lg-0">
            <!-- Profile -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="@if(null!=$profile->getProfileImage()){{$profile->getProfileImage()}}@else{{asset('images/users/5.jpg')}}@endif" alt="user" class="profile-pic" /></a>
                <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                    <ul class="dropdown-user">
                        <li><a href="{{route('admin.account')}}"><i class="fa fa-user"></i> My Account</a></li>
                        <li><a href="{{route('admin.account.change-password')}}"><i class="fa fa-key"></i> Change Password</a></li>
                        <li><a href="#"><i class="fa fa-life-ring"></i> Help</a></li>
                        <li><a href="{{route('admin.logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>