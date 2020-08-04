@extends('frontend.layouts.app')
@section('content')
<!-- page-title -->
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading innerpagetitle text-center">
                        <h2 class="title"><a href="services.html">Blog Single</a></h2>
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
                                <img class="img-fluid" src="images/blog/blog-details_06.jpg" alt="">
                            </div>
                            <div class="cmt-box-post-date">
                                <span class="cmt-entry-date">
                                    {{ date('jS \ M, Y', strtotime($news->created_at)) ?? '' }}
                                </span>
                            </div>
                        </div>
                        <!-- cmt-post-featured-wrapper end -->
                        <!-- cmt-blog-single-content -->
                        <div class="cmt-blog-single-content">
                            <div class="cmt-post-entry-header">
                                <div class="post-meta">
                                    <span class="cmt-meta-line byline"><i class="fa fa-user"></i>By Admin</span>
                                    <span class="cmt-meta-line entry-date"><i
                                            class="fa fa-calendar"></i>{{ date('jS \ M, Y', strtotime($news->created_at)) ?? '' }}</span>
                                </div>
                            </div>
                            <div class="entry-content mt-10">
                                <div class="cmt-box-desc-text">
                                    {!! $news->message ?? '' !!}
                                </div>
                            </div>

                        </div><!-- cmt-blog-single-content -->
                    </article><!-- post end -->
                </div>
            
            </div><!-- row end -->
        </div>
    </div>

</div>
<!--site-main end-->
@include('frontend.layouts.footer')
@endsection()