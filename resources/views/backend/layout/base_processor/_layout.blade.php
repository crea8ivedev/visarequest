@if(config('layout_processor.self.layout') == 'blank')
    <div class="d-flex flex-column flex-root">
        @yield('content')
    </div>
@else

    @include('backend.layout.base_processor._header-mobile')

    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">

            @if(config('layout_processor.aside.self.display'))
                @include('backend.layout.base_processor._aside')
            @endif

            

            @include('backend.layout.base_processor._content')
               

            @include('backend.layout.base_processor._footer')
           
        </div>
    </div>

@endif

@if (config('layout_processor.self.layout') != 'blank')

    @if (config('layout_processor.extras.user.layout') == 'offcanvas')
        @include('backend.layout.partials_processor.extras.offcanvas._quick-user')
    @endif

    @include('backend.layout.partials_processor.extras._scrolltop')

@endif
