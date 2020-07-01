<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
    <head>
        <meta charset="utf-8"/>

        {{-- Title Section --}}
        <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

        {{-- Meta Data --}}
        <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

        {{-- Fonts --}}
        {{ Metronic::getGoogleFontsInclude() }}

        {{-- Global Theme Styles (used by all pages) --}}
        @foreach(config('layout.resources.css') as $style)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Layout Themes (used by all pages) --}}
        @foreach (Metronic::initThemes() as $theme)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Includable CSS --}}
        @yield('styles')
        @foreach(config('layout.resources.toastr_css') as $style)
            <link href="{{ asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach
         {{-- <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> --}}
    </head>

    <body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

        @if (config('layout.page-loader.type') != '')
            @include('backend.layout.partials._page-loader')
        @endif

        @include('backend.layout.base._layout')

        {{-- <script>var HOST_URL = "{{ route('quick-search') }}";</script> --}}

        {{-- Global Config (global config for global JS scripts) --}}
        <script>
            var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
        </script>


        {{-- Global Theme JS Bundle (used by all pages)  --}}
        @foreach(config('layout.resources.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
    
       
            
           
        
        

        {{-- Includable JS --}}
        @yield('scripts')

        <script type="text/javascript">
           
        </script>
        @foreach(config('layout.resources.toastr_js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
        {{-- <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}
        '{!! Toastr::message() !!}';

    </body>
</html>

