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
                    <textarea name="body"></textarea>
                    <br>
                    <button class='reply-btn'>Reply</button>
                    <input name="parent_id" type="hidden" value=" {{ $comment->parent_id }}">
                </div>
            </div>
        @endforeach
        <h3>Leave a New Comment</h3>
        <div class="new">
            <textarea name="body"></textarea>
            <br>
            <button class="submit-comment-btn">Submit</button>
        </div>
@stop