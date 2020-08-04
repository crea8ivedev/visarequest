<footer class="footer cmt-bgcolor-darkgrey widget-footer pt-0 clearfix">
    <div class="bottom-footer-text pt-0 mt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-4">
                    <div class="copyright text-lg-left text-center">
                        <span>Copyright © 2020 VisaRequest. All rights reserved.</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div id="menu-footer-menu text-center">
                        <ul class="footer-nav-menu text-center">
                            <li><a href="{{ route('frontend.about-us') }}">About</a></li>
                            <li><a href="{{ route('frontend.terms-and-conditions') }}">T&C</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="social-icons circle text-center text-lg-right">
                        <ul class="list-inline cmt-textcolor-skincolor">
                            @if($comman_address->facebook)
                            <li class="social-facebook"><a class="tooltip-top" target="_blank"
                                    href="{{$comman_address->facebook}}" data-tooltip="Facebook"><i
                                        class="ti ti-facebook"></i></a></li>
                            @endif
                            @if($comman_address->twitter)


                            <li class="social-twitter"><a class="tooltip-top" target="_blank"
                                    href="{{$comman_address->twitter}}" data-tooltip="twitter"><i
                                        class="ti ti-twitter-alt"></i></a></li>
                            @endif

                            @if($comman_address->google)

                            <li class="social-instagram"><a class="tooltip-top" target="_blank"
                                    href="{{$comman_address->google}}" data-tooltip="Google"><i
                                        class="ti ti-google"></i></a></li>
                            @endif

                            @if($comman_address->linkedin)

                            <li class="social-twitter"><a class="tooltip-top" target="_blank"
                                    href="{{$comman_address->linkedin}}" data-tooltip="Linkedin"><i
                                        class="ti ti-linkedin"></i></a></li>
                            @endif


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>