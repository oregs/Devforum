<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/bootswatch.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
</head>
<style>

</style>
<body>

    @include('layouts.partials.navbar')

    @yield('banner')

<div class="container">
    <div class="row">
        <div class="row content-heading">
            <div class="col-md-3"><h4>Category</h4></div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4"><h4 class="main-content-heading">@yield('heading')</h4></div>
                    <div class="col-md-2 offset-6 ">
                        <a class="btn btn-primary" href="{{ route('thread.create') }}">Create Thread</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Category Section --}}
        <div class="col-md-3">
            <ul class="list-group">
                <a href="{{ route('thread.index') }}" class="list-group-item">
                    <span class="badge badge-info">14</span>
                    All Thread
                </a>
                <a href="{{ route('thread.index') }}" class="list-group-item">
                    <span class="badge">2</span>
                    All Thread
                </a>
                <a href="{{ route('thread.index') }}" class="list-group-item">
                    <span class="badge">2</span>
                    Python
                </a>
            </ul>
        </div>

        <div class="col-md-9">
            <div class="content-wrap-well">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/bootstrap-3-1-1.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
