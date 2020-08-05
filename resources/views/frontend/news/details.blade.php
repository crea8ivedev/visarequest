@extends('frontend.layouts.app')
@section('content')
<!-- page-title -->
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading innerpagetitle text-center">
                        <h2 class="title"><a href="{{ route('frontend.news') }}">Blog Single</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--site-main start-->
<div class="site-main">

    <div class="cmt-row sidebar cmt-sidebar-right cmt-bgcolor-white clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-8 content-area">
                    <!-- post -->
                    <article class="post cmt-blog-single clearfix">
                        <!-- cmt-post-featured-wrapper -->
                        <div class="cmt-post-featured-wrapper cmt-featured-wrapper mb-20">
                            <div class="cmt-post-featured">
                                <img class="img-fluid" src="{{ asset('images/blog/blog-one-720X620.jpg') }}" alt="">
                            </div>
                            <div class="cmt-box-post-date">
                                <span class="cmt-entry-date">
                                    <time class="entry-date"
                                        datetime="{{$news->created_at}}">{{date("y",strtotime($news->created_at))}}<span
                                            class="entry-month">{{date("M",strtotime($news->created_at))}}</span></time>
                                </span>
                            </div>
                        </div>
                        <!-- cmt-post-featured-wrapper end -->
                        <!-- cmt-blog-single-content -->
                        <div class="cmt-blog-single-content">
                            <div class="cmt-post-entry-header">
                                <div class="post-meta">
                                    <span class="cmt-meta-line byline"><i class="fa fa-user"></i>By Admin</span>
                                    {{-- <span class="cmt-meta-line tags-links"><i class="fa fa-comments-o"></i>35
                                        Comments</span> --}}
                                    <span class="cmt-meta-line entry-date"><i class="fa fa-calendar"></i><time
                                            class="entry-date published"
                                            datetime="{{$news->created_at}}">{{date("M d,Y",strtotime($news->created_at))}}</time></span>
                                </div>
                            </div>
                            <div class="entry-content mt-10">
                                <div class="cmt-box-desc-text">
                                    <p>{!! $news->message !!}</p>
                                </div>
                            </div>
                        
                        </div><!-- cmt-blog-single-content -->
                    </article><!-- post end -->
                </div>
                <div
                    class="col-lg-4 widget-area sidebar-right cmt-col-bgcolor-yes cmt-bg cmt-right-span cmt-bgcolor-grey mt_80 pt-50 mb_80 pb-60 res-991-mt-0 res-991-pt-0">
                    <div class="cmt-col-wrapper-bg-layer cmt-bg-layer"></div>
                    <aside class="widget widget-search with-title">
                        <form role="search" method="get" class="search-form" action="#">
                            <label>
                                <span class="screen-reader-text">Search for:</span>
                                <input type="search" class="input-text" placeholder="Search …" value="" name="s">
                            </label>
                            <button class="btn" type="submit" value="Search"> <i class="fa fa-search"
                                    aria-hidden="true"></i> </button>
                        </form>
                    </aside>
                    <aside class="widget widget-Categories with-title">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                            <li><a href="#">Green card</a></li>
                            <li class="active"><a href="#">PR Applicants</a></li>
                            <li><a href="#">Visa Consultancy</a></li>
                            <li><a href="#">Travel Insurance</a></li>
                            <li><a href="#">Work Permits</a></li>
                            <li><a href="#">Abroad Study</a></li>
                            <li><a href="#">International Permit</a></li>
                        </ul>
                    </aside>
                    <aside class="widget widget-recent-post with-title">
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul class="widget-post cmt-recent-post-list">
                            <li>
                                <a href="blog-single.html"><img src="{{ asset('images/blog/blog-one-720X620.jpg') }}" alt="post-img"></a>
                                <div class="post-detail">
                                    <span class="post-date"><i class="fa fa-calendar"></i>Apr 06, 2020</span>
                                    <a href="blog-single.html">Why Indian Students Choose To Study Abroad?</a>
                                </div>
                            </li>
                            <li>
                                <a href="blog-single.html"><img src="{{ asset('images/blog/blog-one-720X620.jpg') }}" alt="post-img"></a>
                                <div class="post-detail">
                                    <span class="post-date"><i class="fa fa-calendar"></i>Apr 24, 2020</span>
                                    <a href="blog-single.html">To Improve Your Express Entry Application</a>
                                </div>
                            </li>
                            <li>
                                <a href="blog-single.html"><img src="{{ asset('images/blog/blog-one-720X620.jpg') }}" alt="post-img"></a>
                                <div class="post-detail">
                                    <span class="post-date"><i class="fa fa-calendar"></i>Apr 24, 2020</span>
                                    <a href="blog-single.html">Employment Insurance for Foreign Nationals</a>
                                </div>
                            </li>
                        </ul>
                    </aside>
                    <aside class="widget widget-download">
                        <ul class="download">
                            <li><i class="fa fa-file-pdf-o"></i>
                                <div>
                                    <h4>Detailed Service Pack</h4><a href="#">Download PDF</a>
                                </div>
                            </li>
                            <li><i class="fa fa-file-pdf-o"></i>
                                <div>
                                    <h4>Detailed Service Pack</h4><a href="#">Download txt</a>
                                </div>
                            </li>
                        </ul>
                    </aside>
                    <aside class="widget widget-contact">
                        <div
                            class="cmt-col-bgcolor-yes cmt-bgcolor-darkgrey col-bg-img-five cmt-col-bgimage-yes cmt-bg pt-50 pl-25 pr-20 pb-50">
                            <div class="cmt-col-wrapper-bg-layer cmt-bg-layer">
                                <div class="cmt-col-wrapper-bg-layer-inner"></div>
                            </div>
                            <div class="layer-content">
                                <h4>Emergency Study Visa.</h4>
                                <p>We Offer a full Line Of Services For All Your Plumbing And Drain Cleaning Needs.</p>
                                <!-- featured-icon-box -->
                                <div class="featured-icon-box icon-align-before-content style5 mt-60 cmt-bgcolor-white">
                                    <div class="featured-icon">
                                        <div
                                            class="cmt-icon cmt-icon_element-fill cmt-icon_element-color-skincolor cmt-icon_element-size-xs cmt-icon_element-style-rounded">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h5>Call Now: <span class="cmt-textcolor-skincolor"> 082-733-5236</span>
                                            </h5>
                                        </div>
                                    </div>
                                </div><!-- featured-icon-box end -->
                            </div>
                        </div>
                    </aside>
                </div>
            </div><!-- row end -->
        </div>
    </div>

</div>

<!--site-main end-->
@include('frontend.layouts.footer')
@endsection()