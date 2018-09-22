@extends('layouts.app')
@section('content')
    <h1>Comments</h1>
    <hr>
        @foreach($comments as $comment)
            <div>
                <div class="body">
                    {{$comment->body}}
                </div>

                <div class="reply">
                    <textarea></textarea>
                    <br>
                    <button>Reply</button>
                </div>
            </div>
        @endforeach
        <h3>Leave a New Comment</h3>
        <div class="new">
            <textarea></textarea>
            <br>
            <button>Submit</button>
        </div>
@stop