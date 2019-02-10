<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div> <!-- .site-mobile-menu -->


<div class="site-navbar-wrap bg-white">
    <div class="site-navbar-top">
        <div class="container py-3">
            <div class="row align-items-center">
                <div class="col-lg-6 col-3">
                    <img src="{{ asset('front-end/images/loan-logo.png') }}" width="87px" alt="home-loan"/>
                </div>
                <div class="col-9 col-lg-6 ">
                    <div class="col-12 col-lg-5 p-3 text-center mob-hide">
                        <a href="#" class="p-2 pl-0"><i class="social-col fa fa-lg fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" class="p-2 pl-0"><i class="social-col fa fa-lg fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" class="p-2 pl-0"><i class="social-col fa fa-lg fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-12 col-lg-7 bdr-let ">
                        <div class="float-left p-3"><i class="fa fa-phone fa-2x mr-2"></i></div>
                        <div class="d-md-inline-block">+123-456-7890 & 23</div><br/>
                        <div class="d-md-inline-block">loanbay@supportyou.com</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-navbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <nav class="site-navigation" role="navigation">
                        <div class="container">
                            <div class="d-inline-block mob-right d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
                            <div class="col-lg-8">
                                <ul class="site-menu js-clone-nav d-none d-lg-block">
                                    <li class="active">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li> <a href="javascript:void(0)">Services</a></li>
                                    <li><a href="javascript:void(0)">How it works</a></li>
                                    <li><a href="javascript:void(0)">Company</a></li>
                                    <li class="has-children"><a href="services.html">Other loans</a>
                                        <ul class="dropdown arrow-top">
                                            <li><a href="#">Menu One</a></li>
                                            <li><a href="#">Menu Two</a></li>
                                            <li><a href="#">Menu Three</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('contact.index') }}">Contact</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-4 text-right nav-right">
                                @if (Auth::guard('web')->check())
                                    <ul>
                                        <li><a href="{{ route('logout') }}">Logout</a></li>
                                    </ul>
                                @else
                                    <ul>
                                        <li><a href="{{ route('user.login.create') }}">Login</a></li>
                                        <li><a href="{{ route('user.register.create') }}">Register</a></li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>