<div class="container">
    <!-- row -->
    <div class="row">
        @if($service_list->count()>0)

        @forelse ($service_list as $key => $service)
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="featured-icon-box icon-align-top-content style4 bor_rad_5">
                <div class="bg_icon"><i class="{{ $service->icon}}"></i></div>
                <div class="featured-icon d-flex flex-wrap justify-content-between align-items-center mb-20">
                    <div
                        class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                        <i class="{{ $service->icon}}"></i>
                    </div>
                    <div
                        class="cmt-text cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                        <h5>
                            {{ $service->discount_price}} <del>{{ $service->normal_price}}</del>
                        </h5>
                    </div>
                </div>
                <div class="featured-content">
                    <div class="content-inner">
                        <div class="featured-title">
                            <h5>{{ $service->name}}</h5>
                        </div>
                        <div class="featured-desc">
                            <p>{{ $service->description}}</p>
                        </div>
                    </div>
                    <a class="cmt-btn btn-inline cmt-btn-size-md cmt-icon-btn-left cmt-btn-color-skincolor"
                        href="{{ route('frontend.category.service.details',[$country->slug,$service->category->slug,$service->slug]) }}"
                        title=""><i class="fa fa-minus"></i>Apply</a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <p>No service found for this category.</p>
        @endif
    </div>
</div>