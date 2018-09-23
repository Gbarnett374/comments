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
        <label>Name:</label>
        <br>
        <input type="text" name='name'>
        <br>

        <label>Body:</label>
        <br>
        <textarea name="body"></textarea>
        <br>
        <button class='reply-btn'>Reply</button>
        <input name="parent_id" type="hidden" value=" {{ $comment->id }}">
    </div>
</div>
<br>
@if (isset($comments[$comment->id]))
        @include ('comments.comment_list', ['collection' => $comments[$comment->id]])
@endif
