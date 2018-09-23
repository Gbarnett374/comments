@extends('layouts.app')
@section('content')
    <h1>Comments</h1>
    <hr>
    @include ('comments.comment_list', ['collection' => $comments['root']])
    <br>
    <hr>
    <h3>Leave a New Comment</h3>
    <div class="new">
        <label>Name:</label>
        <input type="text" name='name'>
        <br>

        <label>Body:</label>
        <textarea name="body"></textarea>
        <br>
        <button class="submit-comment-btn">Submit</button>
    </div>
@stop