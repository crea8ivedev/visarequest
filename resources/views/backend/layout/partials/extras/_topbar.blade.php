{{-- Topbar --}}
<div class="topbar">

    {{-- Notifications --}}
    @if (config('layout.extras.notifications.display'))
    @if (config('layout.extras.notifications.layout') == 'offcanvas')
    <div class="topbar-item">
        <div class="btn btn-icon btn-clean btn-lg mr-1 pulse pulse-primary" id="kt_quick_notifications_toggle">
            {{ Metronic::getSVG("public/images/icons/Compiling.svg", "svg-icon-xl svg-icon-primary") }}
            <span class="pulse-ring"></span>
        </div>
    </div>
    @else
    <div class="dropdown">
        {{-- Toggle --}}
        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
            <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
                {{ Metronic::getSVG("public/images/icons/Compiling.svg", "svg-icon-xl svg-icon-primary") }}
                <span class="pulse-ring"></span>
            </div>
        </div>

        {{-- Dropdown --}}
        <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
            <form>
                @include('backend.layout.partials.extras.dropdown._notifications')
            </form>
        </div>
    </div>
    @endif
    @endif

    {{-- User --}}
    @if (config('layout.extras.user.display'))
    @if (config('layout.extras.user.layout') == 'offcanvas')
    <div class="topbar-item">
        <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
            <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
            <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->first_name ." ".Auth::user()->last_name }}</span>

        </div>
        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>

    @else
    <div class="dropdown">
        {{-- Toggle --}}
        <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
            <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
                <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->name }}</span>
                <span class="symbol symbol-35 symbol-light-success">
                    <span class="symbol-label font-size-h5 font-weight-bold">S</span>
                </span>
            </div>
        </div>

        {{-- Dropdown --}}
        <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
            @include('backend.layout.partials.extras.dropdown._user')
        </div>
    </div>
    @endif
    @endif


</div>