@extends('layouts.app')
@section('content')
    <h1>Comments</h1>
    <hr>
        @foreach($comments as $comment)
            <div>
                <div class="name">
                    Comment from:
                    {{$comment->name}}
                </div>
                <div class="body">
                    Body:
                    {{$comment->body}}
                </div>

                <div class="reply">
                    <input type="text" name='name'>
                    <br>
                    <textarea name="body"></textarea>
                    <br>
                    <button class='reply-btn'>Reply</button>
                    <input name="parent_id" type="hidden" value=" {{ $comment->parent_id }}">
                </div>
            </div>
            <br>
        @endforeach
        <br>
        <hr>
        <h3>Leave a New Comment</h3>
        <div class="new">
            <input type="text" name='name'>
            <br>
            <textarea name="body"></textarea>
            <br>
            <button class="submit-comment-btn">Submit</button>
        </div>
@stop