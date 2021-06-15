@extends('layouts.front')

@section('heading',"Create Thread")

@section('content')

    @include('layouts.partials.error')

    @include('layouts.partials.success')

    <div class="row">
        <div class="well">
            <form class="form-vertical" action="{{route('thread.update', $thread->id)}}" method="post" role="form"
                  id="update-thread-form">
                @csrf
                {{ method_field('put') }}

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" id="" placeholder="Input..."
                           value="{{ $thread->subject }}">
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" name="type" id="" placeholder="Input..." value="{{ $thread->subject }}">
                    {{-- <select name="tags[]" multiple id="tag" class="form-control"><option value="">TESTING</option> --}}

                        {{-- todo add from db--}}
                        {{-- @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach --}}
                    </select>
                </div>

                <div class="form-group">
                    <label for="thread">Thread</label>
                    <textarea class="form-control" name="thread" id="" placeholder="Input..."
                    > {{ $thread->thread }}</textarea>
                </div>

                <div class="form-group">
                    {!! NoCaptcha::display() !!}
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>

    <script>
        $(function () {
            $('#tag').selectize();
        })
    </script>
@endsection
