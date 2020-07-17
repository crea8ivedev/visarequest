    <div class="container">
        <div class="row">
            @if($service_list->count()>0)
            <div class="col-lg-4 ttm-col-bgcolor-yes cmt-bg cmt-left-span cmt-bgcolor-grey mt_80 pt-60 mb_80 pb-60 res-991-mt-0 res-991-pt-0 widget-area sidebar-left">
                <div class="cmt-col-wrapper-bg-layer cmt-bg-layer"></div>
                <aside class="widget widget-nav-menu">
                    <ul class="widget-menu">
                        @forelse ($service_list as $list)
                        <li class="{{($service->id===$list->id)?'active':''}} service-category" data-serviceid={{$list->id}} data-id={{$list->category_id}}><a href="javascript:void(0);">{{ $list->name}}</a></li>
                        @endforeach
                    </ul>
                </aside>
            </div>
            <div class="col-lg-8 content-area service-details">
                <div class="cmt-service-single-content-area">
                    <div class="featured-icon d-flex flex-wrap justify-content-between align-items-center">
                        <div class="cmt-text cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                            <h5>{{ $service->name}}</h5>
                        </div>
                        <div class="cmt-text cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                            <h5>
                                {{ $service->discount_price}} <del>{{$service->normal_price}}</del>
                            </h5>
                        </div>
                    </div>
                    <hr/>
                    <div class="cmt-service-description">
                        <p>{{$service->description}}</p>
                        <div class="btn-group mt-30">
                            @if (Auth::check())
                            <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark mr-30 " href="javascript:void(0);">Apply</a>
                            @else
                            <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark mr-30 btn-login" href="javascript:void(0);">Apply</a>
                            @endif
                             <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark m-0" href="javascript:void(0);">Contact Agent</a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <p>No service found for this category.</p>
          @endif
        </div><!-- row end -->
    </div>
