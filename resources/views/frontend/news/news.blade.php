@extends('frontend.layouts.app')
@section('content')

<!-- page-title -->
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading innerpagetitle text-center">
                        <h2 class="title"><a href="services.html">News</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page-title end -->



<!--site-main start-->
<div class="site-main">

    <section class="cmt-row grid-section clearfix">
        <div class="container">
            <div class="row">
                @foreach($newsList as $news)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <!-- featured-imagebox-post -->
                    <div class="featured-imagebox featured-imagebox-post style3">
                        {{-- <div class="cmt-post-thumbnail featured-thumbnail">
                            <img class="img-fluid" src="images/blog/blog-one-720X620.jpg" alt="image">
                        </div> --}}
                        <div class="featured-content featured-content-post">
                            <div class="post-header">
                                <div class="post-title featured-title">
                                    <h5><a href="{{ route('frontend.news.details',[$news->slug]) }}">{!! $news->heading
                                            ?? '' !!}</a></h5>
                                </div>
                            </div>
                            <div class="post-meta">
                                <span class="cmt-meta-line post-date"><i
                                        class="fa fa-calendar"></i>{{ date('jS \ M, Y', strtotime($news->created_at)) ?? '' }}</span>
                            </div>
                            <div class="post-desc featured-desc">
                                <p>{!! $news->message ?? '' !!}
                                </p>
                            </div>
                            <div class="post-bottom cmt-post-link">
                                <a class="cmt-btn cmt-btn-size-sm cmt-icon-btn-left cmt-btn-color-skincolor btn-inline"
                                    href="{{ route('frontend.news.details',[$news->slug]) }}" tabindex="0"><i
                                        class="fa fa-minus"></i>Read more</a>
                            </div>
                        </div>
                    </div><!-- featured-imagebox-post end-->
                </div>
                @endforeach

            </div>
            {{-- <div class="pagination-block mb-15 res-991-mb-0">
                <a class="page-numbers current" href="blog-grid.html">1</a>
                <a class="page-numbers" href="blog-grid-2.html">2</a>
                <a class="next page-numbers" href="blog-grid-2.html"><i class="ti ti-arrow-right"></i></a>
            </div> --}}
        </div>
    </section>
</div>
<!--site-main end-->
@include('frontend.layouts.footer')
@endsection()