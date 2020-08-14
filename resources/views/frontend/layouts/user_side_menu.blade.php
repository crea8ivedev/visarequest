<!-- row -->
<div
    class="h-100 ttm-col-bgcolor-yes cmt-bg cmt-left-span cmt-bgcolor-grey pt-60 pb-60 res-991-mt-0 res-991-pt-0 widget-area sidebar-left">
    <div class="cmt-col-wrapper-bg-layer cmt-bg-layer"></div>

    <nav class="main-menu menu-mobile widget widget-nav-menu mr-20" id="menu">
        <ul class="widget-menu">
            <li class="mega-menu-item service-category">
                <a href="{{ route('frontend.user.profile') }}"
                    class="mega-menu-link   {{ (request()->is('profile')) ? 'active' : '' }}">Profile</a>
            </li>
            <li class="mega-menu-item service-category">
                <a href="{{ route('frontend.user.applications') }}"
                    class="mega-menu-link   {{ (request()->is('applications')) ? 'active' : '' }}">My Application</a>
            </li>
            <li class="mega-menu-item service-category">
                <a href="{{ route('frontend.user.messages') }}"
                    class="mega-menu-link   {{ (request()->is('messages')) ? 'active' : '' }}">Messages</a>
            </li>
        </ul>
    </nav>
</div>