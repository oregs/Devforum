<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/bootswatch.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
    {!! NoCaptcha::renderJs() !!}

</head>
<body>

    @include('layouts.partials.navbar')

    @yield('banner')

    <br>

<div class="container">
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

<script src="{{ asset('js/jquery-1-11-1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-3-3-4.min.js') }}"></script>

 @stack('scripts')
</body>
</html>
