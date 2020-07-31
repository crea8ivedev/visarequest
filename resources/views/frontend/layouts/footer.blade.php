 <footer class="footer cmt-bgcolor-darkgrey widget-footer clearfix">
     <div class="second-footer">
         <div class="container">
             <div class="row no-gutters">
                 <div class="widget-area col-xs-12 col-sm-12 col-md-4 col-lg-4">
                     <aside class="widget widget-text">
                         <!--featured-icon-box-->
                         <div class="featured-icon-box icon-align-before-content">
                             <div class="featured-icon">
                                 <div class="cmt-icon cmt-icon_element-fill cmt-icon_element-color-darkgrey cmt-icon_element-size-sm cmt-icon_element-style-square">
                                     <i class="fa fa-envelope-o"></i>
                                 </div>
                             </div>
                             <div class="featured-content">
                                 <div class="featured-title">
                                 <h5><a href="mailto:{{$address[0]->email}}">{{$address[0]->email}}</a></h5>
                                 </div>
                                 <div class="featured-desc">
                                     <p>Drop Us a Line</p>
                                 </div>
                             </div>
                         </div>
                         <!-- featured-icon-box end-->
                     </aside>
                 </div>
                 <div class="widget-area col-xs-12 col-sm-12 col-md-4 col-lg-4">
                     <aside class="widget widget-text cmt-bgcolor-skincolor">
                         <!--featured-icon-box-->
                         <div class="featured-icon-box icon-align-before-content">
                             <div class="featured-icon">
                                 <div class="cmt-icon cmt-icon_element-fill cmt-icon_element-color-darkgrey cmt-icon_element-size-sm cmt-icon_element-style-square">
                                     <i class="fa fa-phone"></i>
                                 </div>
                             </div>
                             <div class="featured-content">
                                 <div class="featured-title">
                                     <h5><a href="tel:{{$address[0]->cell_phone}}">{{$address[0]->cell_phone}}</a></h5>
                                 </div>
                                 <div class="featured-desc">
                                     <p>Call Us Now!</p>
                                 </div>
                             </div>
                         </div>
                         <!-- featured-icon-box end-->
                     </aside>
                 </div>
                 <div class="widget-area col-xs-12 col-sm-12 col-md-4 col-lg-4">
                     <aside class="widget widget-text">
                         <!--featured-icon-box-->
                         <div class="featured-icon-box icon-align-before-content">
                             <div class="featured-icon">
                                 <div class="cmt-icon cmt-icon_element-fill cmt-icon_element-color-darkgrey cmt-icon_element-size-sm cmt-icon_element-style-square">
                                     <i class="fa fa-map-marker"></i>
                                 </div>
                             </div>
                             <div class="featured-content">
                                 <div class="featured-title">
                                     <h5>{{$address[0]->address}}</h5>
                                 </div>
                                 <div class="featured-desc">
                                     <a href="https://www.google.com/maps/place/VisaRequest.co.za/@-25.7461274,28.2357884,17z/data=!3m1!4b1!4m5!3m4!1s0x1e95607829ad0685:0xf469322b7bc3cf79!8m2!3d-25.7461322!4d28.2379771">Get Direction</a>
                                 </div>
                             </div>
                         </div>
                     </aside>
                 </div>
             </div>
         </div>
     </div>
     <div class="bottom-footer-text">
         <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <div class="copyright text-center">
                         <div id="menu-footer-menu">
                             <ul class="footer-nav-menu text-center">
                                 <li><a href="{{ url('/') }}">Home</a></li>
                                 <li><a href="{{ route('frontend.about-us') }}">About</a></li>
                                 <li><a href="{{ route('frontend.contact-us') }}">Contact Us</a></li>
                                 <li><a href="{{ route('frontend.terms-and-conditions') }}">Terms And Conditions</a></li>
                             </ul>
                         </div>
                         <span>Copyright © {{date('Y')}} VisaRequest. All rights reserved.</span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </footer>