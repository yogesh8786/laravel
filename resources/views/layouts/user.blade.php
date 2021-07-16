<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no, viewport-fit=cover">
        <title>Messenger - @yield('title')</title>
        @notifyCss
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" type="image/x-icon">

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
    	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700" rel="stylesheet">

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/template.bundle.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/template.dark.bundle.css') }}" media="(prefers-color-scheme: dark)">
        @yield('extra_styles')
    </head>
    <body>
        <div class="layout overflow-hidden">

          @include('includes.navbar')

            <aside class="sidebar bg-light">
                <div class="tab-content h-100" role="tablist">

                  {{-- @include('includes.sidebar') --}}

                @yield('content')

                </div>
            </aside>

            @include('includes.modal')

        </div>
        <x:notify-messages />
        @notifyJs
        @yield('extra_scripts')
        <script src="{{ asset('assets/js/vendor.js') }}"></script>
        <script src="{{ asset('assets/js/template.js') }}"></script>
    </body>
</html>
