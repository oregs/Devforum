<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="{{ asset('css/bootswatch.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
    {!! NoCaptcha::renderJs() !!}

    {{-- Scripts --}}
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!}
    </script>

</head>
<body>
<div id="app">

    @include('layouts.partials.navbar')

    @yield('banner')

    <br>

    <div class="container">

        @include('layouts.partials.error')

        @include('layouts.partials.success')

        <div class="row">

            @section('category')

                {{--// Category Section --}}
                @include('layouts.partials.categories')
            @show

            <div class="col-md-9">
                <div class="row content-heading"><h4>@yield('heading')</h4></div>
                <div class="content-wrap-well">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-1-11-1.min.js') }}"></script>
{{-- <script src="{{ asset('js/bootstrap-3-3-4.min.js') }}"></script> --}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
{{-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script> --}}
<script>

// Pusher.logToConsole = true;


// var pusher = new Pusher('{{ config('app.pusher_app_key') }}', {
//     cluster: 'eu',
//     encrypted: true
// });


// Subscribe to the channel we specified in our Laravel Event
// var channel = pusher.subscribe('chatify');

// Bind a function to a Event (the full Laravel class)
// channel.bind('CIS\\Events\\NewMemo', function(data) {
//     $('#memo_count').html('<span class="badge badge-danger badge-notif">'+data.total_notification+'</span>');
//     $('#unapproved').text(data.approval_notification);
//     $('#unattended').text(data.recipient_notification);
//     console.log(data);
// });
</script>

 @stack('scripts')
</body>
</html>
