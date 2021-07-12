<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no, viewport-fit=cover">
        <title>Messenger - 2.0.0</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" type="image/x-icon">

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
    	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700" rel="stylesheet">

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/template.bundle.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/template.dark.bundle.css') }}" media="(prefers-color-scheme: dark)">
    </head>

    <body>
        <div class="layout overflow-hidden">

          @include('includes.admin_navbar')

            <aside class="sidebar bg-light">
                <div class="tab-content h-100" role="tablist">

                  {{-- @include('includes.admin_sidebar') --}}

                @yield('content')

                </div>
            </aside>

            <div  id="modal-profile" tabindex="-1" aria-labelledby="modal-profile" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
                        <!-- Modal body -->
                         @yield('modal')
                        <!-- Modal body -->
                </div>
            </div>

        </div>





        <!-- Scripts -->
        <script src="{{ asset('assets/js/vendor.js') }}"></script>
        <script src="{{ asset('assets/js/template.js') }}"></script>
    </body>
</html>
