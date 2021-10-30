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
        <style>
            .form-select {
                padding-top: 5px;
                padding-bottom: 5px;
            }

            #auth_profile {
                border-radius:inherit;
                height: inherit;
            }
        </style>
        @yield('extra_styles')
    </head>
    <body>
    {{-- <script src="https://cdn.socket.io/socket.io-2.3.0.js"></script> --}}
    <script src="https://cdn.socket.io/4.3.2/socket.io.min.js" integrity="sha384-KAZ4DtjNhLChOB/hxXuKqhMLYvx3b5MlT55xPEiNmREKRzeEm+RVPlTnAn0ajQNs" crossorigin="anonymous"></script>

        <div class="layout overflow-hidden">

          @include('includes.navbar')

                @yield('content')

            @include('includes.modal')

        </div>
        <x:notify-messages />
        @notifyJs
        <script src="{{ asset('assets/js/vendor.js') }}"></script>
        <script src="{{ asset('assets/js/template.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        @yield('extra_scripts')
        <script>
            $('body').on('change', "input[name='profile_photo']", function() {
            var input = $(this)[0];
            if (input.files.length) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#auth_profile').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });

            $(".m-search").on("keyup",function(){
                var e = $(this).val().toLowerCase();
                s=$(this).val().length;
                $(".card-list > a ").each(function(){
                    var d=$(this).attr("data-username");
                    var i=d.toLowerCase();
                    if(i){
                        -1!==i.indexOf(e)?$(this).show():$(this).hide();
                    }
                });
                if($('.card-list a:visible').length == 0){
                    $('.no_user_ajax').show();
                }
                else{
                    $('.no_user_ajax').hide();
                }
            });

        </script>
    </body>
</html>
