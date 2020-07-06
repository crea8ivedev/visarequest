@if(config('layout_agent.self.layout') == 'blank')
    <div class="d-flex flex-column flex-root">
        @yield('content')
    </div>
@else

    @include('backend.layout.base_agent._header-mobile')

    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">

            @if(config('layout_agent.aside.self.display'))
                @include('backend.layout.base_agent._aside')
            @endif

            

            @include('backend.layout.base_agent._content')
               

            @include('backend.layout.base_agent._footer')
           
        </div>
    </div>

@endif

@if (config('layout_agent.self.layout') != 'blank')

    @if (config('layout_agent.extras.user.layout') == 'offcanvas')
        @include('backend.layout.partials_agent.extras.offcanvas._quick-user')
    @endif

    @include('backend.layout.partials_agent.extras._scrolltop')

@endif
