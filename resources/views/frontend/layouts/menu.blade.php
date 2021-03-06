<!-- widget_header end -->
<!-- site-header-menu -->
<div id="site-header-menu" class="site-header-menu cmt-bgcolor-white">
    <div class="site-header-menu-inner cmt-stickable-header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!--site-navigation -->
                    <div class="site-navigation d-flex flex-row align-items-center">
                        <div class="site-branding ">
                            <a class="home-link" href="{{ route('home') }}" title="VisaRequest" rel="home">
                                <img src="{{ asset('images/logo.png') }}" alt="VisaRequest" class="navbar-brand-img">
                            </a>
                        </div>
                        <div class="btn-show-menu-mobile menubar menubar--squeeze">
                            <span class="menubar-box">
                                <span class="menubar-inner"></span>
                            </span>
                        </div>
                        <!-- menu -->
                        <nav class="main-menu menu-mobile m-auto" id="menu">
                            <ul class="menu">
                                <li class="mega-menu-item {{ (request()->is('/')) ? 'active' : '' }}">
                                    <a href="{{ route('home') }}" class="mega-menu-link">Home</a>
                                </li>

                                <li class="mega-menu-item {{ (request()->is('about-us')) ? 'active' : '' }}">
                                    <a href="{{ route('frontend.about-us') }}" class="mega-menu-link">About Us</a>
                                </li>
                                <li class="mega-menu-item {{ (request()->is('service')) ? 'active' : '' }}">
                                    <a href="{{ route('frontend.service') }}" class="mega-menu-link">Our Service</a>
                                </li>
                                <li class="mega-menu-item {{ (request()->is('news')) ? 'active' : '' }}">
                                    <a href="{{ route('frontend.news') }}" class="mega-menu-link">News</a>
                                </li>
                                <li class="mega-menu-item {{ (request()->is('contact-us')) ? 'active' : '' }}">
                                    <a href="{{ route('frontend.contact-us') }}" class="mega-menu-link">Contact</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="header_btn">
                            @if (Auth::check())
                            <a class="cmt-btn cmt-btn-size-sm cmt-btn-shape-round cmt-btn-style-fill cmt-btn-color-grey"
                            href="{{route('frontend.user.profile')}}">Dashboard <i class="fa fa-envelope" aria-hidden="true"><span
                                    class="badge badge-danger">4</span></i></a>
                            <a class="cmt-btn cmt-btn-size-sm cmt-btn-shape-round cmt-btn-style-fill cmt-btn-color-grey"
                                href="{{route('user.logout')}}">Logout</a>
                            @else
                            <a class="cmt-btn cmt-btn-size-sm cmt-btn-shape-round cmt-btn-style-fill cmt-btn-color-grey btn-login"
                                href="#">LOGIN / REGISTER</a>

                            @endif </div>
                    </div>
                    <!-- site-navigation end-->
                </div>
            </div>
        </div>
    </div>
</div>