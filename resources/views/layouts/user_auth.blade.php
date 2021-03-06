<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no, viewport-fit=cover">
        <title>Messenger - @yield('title')</title>
        @notifyCss

        <link rel="shortcut icon" href="./assets/img/favicon/favicon.ico" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.gstatic.com">
    	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/template.bundle.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/template.dark.bundle.css') }}" media="(prefers-color-scheme: dark)">
        @yield('extra_styles')
    </head>

    <body class="bg-light">

        <div class="container">
            <div class="row align-items-center justify-content-center min-vh-100 gx-0">
                @yield('content')
            </div>
        </div>
        <x:notify-messages />
        @notifyJs
        @yield('extra_scripts')
        <script src="{{ asset('assets/js/vendor.js') }}"></script>
        <script src="{{ asset('assets/js/template.js') }}"></script>
    </body>
</html>
