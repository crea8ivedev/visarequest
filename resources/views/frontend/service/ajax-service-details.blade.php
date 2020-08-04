<div class="cmt-service-single-content-area">
    <div class="featured-icon d-flex flex-wrap justify-content-between align-items-center">
        <div class="cmt-text cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
            <h5>
                {{ $service->name}}
            </h5>
        </div>
        <div class="cmt-text cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
            <h5>
                R{{ $service->discount_price}} <del>{{ $service->normal_price}}</del>
            </h5>
        </div>
    </div>
    <hr />
    <div class="cmt-service-description">
        {{ $service->description}}
        <div class="btn-group mt-30">
            @if (Auth::check())
            <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark mr-30 btnPaymentModal"
                href="javascript:void(0);">Apply</a>
            @else
            <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark mr-30 btn-login"
                href="javascript:void(0);">Apply</a>
            @endif
            <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark m-0 btnContactAgent"
                href="javascript:void(0);">Contact Agent</a>
        </div>
    </div>
</div>