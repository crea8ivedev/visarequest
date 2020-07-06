
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
    <!--begin::Head-->
    <head><base href="">
        <meta charset="utf-8" />
        <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>
        <meta name="description" content="Updates and statistics" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!--begin::Fonts-->
        {{-- Fonts --}}
        {{ Metronic::getGoogleFontsInclude() }}
        <!--end::Fonts-->
        <!--end::Page Vendors Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
          {{-- Global Theme Styles (used by all pages) --}}
        @foreach(config('layout_processor.resources.css') as $style)
            <link href="{{ config('layout_agent.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <!--end::Layout Themes-->
       <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />


        {{-- Includable CSS --}}
         @yield('styles')
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed sidebar-enabled page-loading">
        <!--begin::Main-->
        <!--begin::Header Mobile-->
        <div id="kt_header_mobile" class="header-mobile header-mobile-fixed">

           
            <!--begin::Logo-->
            <a href="{{ url('processor')}}">
                <img alt="Logo" src="{{ asset('public/images/logo.png') }}"/>
            </a>
            <!--end::Logo-->
            <!--begin::Toolbar-->
            <
            <!--end::Toolbar-->
        </div>
        <!--end::Header Mobile-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="d-flex flex-row flex-column-fluid page">
                <!--begin::Aside-->
                @include('backend.layout.base_processor._aside')
                <!--end::Aside-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    <!--begin::Header-->
                     @include('backend.layout.base_processor._header')
                    <!--end::Header-->
                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Entry-->
                        <div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container-fluid">
                                <!--begin::Row-->
                                @yield('content')
                                <!--end::Row-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Footer-->
                    @include('backend.layout.base_processor._footer')
                    <!--end::Footer-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Aside Secondary-->
                
                <!--end::Aside Secondary-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Main-->
        <!-- begin::Notifications Panel-->
        @include('backend.layout.partials_processor.extras.offcanvas._quick-notifications')
        <!-- end::Notifications Panel-->
        <!--begin::Quick Actions Panel-->
       
        <!--end::Quick Actions Panel-->
        <!-- begin::User Panel-->
        @include('backend.layout.partials_processor.extras.offcanvas._quick-user')
      
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop">
            <span class="svg-icon">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </div>
        <!--end::Scrolltop-->
        <!--begin::Sticky Toolbar-->
        
        <!--end::Sticky Toolbar-->
        <!--begin::Demo Panel-->
       
        <!--end::Demo Panel-->
        
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
            var KTAppSettings = {!! json_encode(config('layout_agent.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
        </script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        {{-- Global Theme JS Bundle (used by all pages)  --}}
        @foreach(config('layout_processor.resources.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
        <!--end::Global Theme Bundle-->
        <!--begin::Page Vendors(used by this page)-->
        
        <!--end::Page Vendors-->
        <!--begin::Page Scripts(used by this page)-->
       
        <!--end::Page Scripts-->
        {{-- Includable JS --}}
        @yield('scripts')
        @foreach(config('layout.resources.toastr_js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
        {{-- <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}
        '{!! Toastr::message() !!}';
    </body>
    <!--end::Body-->
</html>