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

            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                @include('backend.layout.base_agent._header')

                <div class="content {{ Metronic::printClasses('content', false) }} d-flex flex-column flex-column-fluid" id="kt_content">

                    @if(config('layout_agent.subheader.display'))
                        @if(array_key_exists(config('layout_agent.subheader.layout'), config('layout_agent.subheader.layouts')))
                            @include('backend.layout.partials_agent.subheader._'.config('layout_agent.subheader.layout'))
                        @else
                            @include('backend.layout.partials_agent.subheader._'.array_key_first(config('layout_agent.subheader.layouts')))
                        @endif
                    @endif

                    @include('backend.layout.base_agent._content')
                </div>

                @include('backend.layout.base_agent._footer')
            </div>
        </div>
    </div>

@endif

@if (config('layout_agent.self.layout') != 'blank')

    @if (config('layout_agent.extras.user.layout') == 'offcanvas')
        @include('backend.layout.partials_agent.extras.offcanvas._quick-user')
    @endif

    @include('backend.layout.partials_agent.extras._scrolltop')

@endif
