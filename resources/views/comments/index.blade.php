@extends('layouts.app')
@section('content')
    <div class="alert" role="alert"></div>
    <h1>Comments</h1>
    <hr>
    @if (isset($comments['root'])) 
        @include ('comments.comment_list', ['collection' => $comments['root']])
    @endif
    <br>
    <hr>
    <h3>Leave a New Comment</h3>
    <div class="new">
        <label>Name:</label>
        <br>
        <input type="text" name="name" class="form-control">
        <br>

        <label>Body:</label>
        <br>
        <textarea name="body" class="form-control"></textarea>
        <br>
        <button class="btn btn-success submit-comment-btn">Submit</button>
    </div>
@stop