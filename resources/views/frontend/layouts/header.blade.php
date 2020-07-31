            <div class="widget_header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-row align-items-center">
                                <div class="site-branding ">
                                    <a class="home-link" href="{{ route('home') }}" title="VisaRequest" rel="home">
                                        <img id="logo-img" class="img-center" src="{{ asset('images/logo.png') }}" alt="VisaRequest">
                                    </a>
                                </div>
                                <div class="widget_info mr-auto">
                                    <div>Get your visa fast, easy and hassle-free</div>
                                </div>
                                <div class="widget_info d-flex flex-row align-items-center justify-content-end">
                                    <div class="widget_social mr-25">
                                        <ul class="social-icons">
                                            <li><a href="@yield('social_link', $address[0]->facebook ?? '#')"><i class="ti ti-facebook"></i></a>
                                            </li>
                                            <li><a href="@yield('social_link', $address[0]->twitter ?? '#')"><i class="ti ti-twitter-alt"></i></a>
                                            </li>
                                            <li><a href="@yield('social_link', $address[0]->google ?? '#')"><i class="ti ti-google"></i></a>
                                            </li>
                                            <li><a href="@yield('social_link', $address[0]->linkedin ?? '#')"><i class="ti ti-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="header_btn">
                                    @if (Auth::check())
                                        <a class="cmt-btn cmt-btn-size-sm cmt-btn-shape-round cmt-btn-style-fill cmt-btn-color-grey" href="#">My Profile</a>
                                        <a class="cmt-btn cmt-btn-size-sm cmt-btn-shape-round cmt-btn-style-fill cmt-btn-color-grey" href="{{route('user.logout')}}">Logout</a>
                                        @else
                                        <a class="cmt-btn cmt-btn-size-sm cmt-btn-shape-round cmt-btn-style-fill cmt-btn-color-grey btn-login" href="#">LOGIN / REGISTER</a>

                                        @endif                                     </div>
                                </div>
                                <div class="widget_info d-flex flex-row align-items-center justify-content-end">
                                    <h5 class="mb-0"><i class="fa fa-phone mr-2 cmt-textcolor-skincolor"></i>+0861 88 88 28</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>