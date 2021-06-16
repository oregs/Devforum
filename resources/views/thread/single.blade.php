@extends('layouts.front')

@section('content')

    <h4>{{ $thread->subject }}</h4>
    <hr>

    <div class="thread-details">
        {{-- {{$thread->thread}} --}}
        {!! \Michelf\Markdown::defaultTransform($thread->thread) !!}
    </div>
    <br>

@if (auth()->user()->id == $thread->user_id)
    <div class="actions">
        <a href="{{ route('thread.edit', $thread->id) }}" class="btn btn-info btn-xs">Edit</a>

        {{-- //delete form --}}
        <form action="{{ route('thread.destroy', $thread->id) }}" method="POST" class="inline-it">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" class="btn btn-xs btn-danger" id="Delete" value="Delete">
        </form>
    </div>
@endif

    {{-- Answers/Comment --}}

    <div class="comment">
        @foreach ($thread->comments as $comment)

            <h4>{{ $comment->body }}</h4>
            <lead>{{ $comment->user->name }}</lead>

            <div class="actions">
                {{-- <a href="{{ route('thread.edit', $thread->id) }}" class="btn btn-info btn-xs">Edit</a> --}}

                <a class="btn btn-primary btn-xs testU" data-toggle="modal" href="#{{ $comment->id }}">Edit</a>
                <div class="modal fade" id="{{ $comment->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                                <div class="comment-form">
                                    <form action="{{ route('comment.update', $comment->id) }}" method="post" role="form">
                                        @csrf
                                        {{ method_field('put') }}
                                        <legend>Create Comment</legend>

                                        <div class="form-group">
                                            <label for="">
                                                <input type="text" class="form-control" name="body" id="" placeholder="Input..." value="{{ $comment->body }}">
                                            </label>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Comment</button>
                                    </form>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- //delete form --}}
                <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" class="inline-it">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-xs btn-danger" id="Delete" value="Delete">
                </form>
            </div>
        @endforeach
    </div>

    <br><br>

    <div class="comment-form">
        <form action="{{ route('threadComment.store', $thread->id) }}" method="post" role="form">
            @csrf
            <legend>Create Comment</legend>

            <div class="form-group">
                <label for="">
                    <input type="text" class="form-control" name="body" id="" placeholder="Input...">
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Comment</button>
        </form>
    </div>

    
@endsection
@push('scripts')
<script>

    $(document).on('click', '.testU', function(){
        console.log('Yes');
        $('#1').modal('show');
    });

</script>
@endpush
