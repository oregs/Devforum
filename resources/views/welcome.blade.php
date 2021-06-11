@extends('layouts.front')

@section('banner')
    <div class="jumbotron">
        <div class="container">
            <h1>Join Oregdevmatics Community</h1>
            <p>Help and get help</p>
            <p><a href="#" class="btn btn-primary btn-lg">Learn More</a></p>
        </div>
    </div>
@endsection

@section('content')
    @include('thread.partials.thread-list')
@endsection
