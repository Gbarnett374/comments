<li>
    <div>
        <!-- <div class="name">
            <label>Comment From:</label>
            {{$comment->name}}
        </div>
        <div class="body">
            <label>Body:</label>
            {{$comment->body}}
        </div> -->
        <div class="card">
            <h5 class="card-header">Comment From: {{$comment->name}}</h5>
            <div class="card-body">
                <p class="card-text">{{$comment->body}}</p>
            </div>
        </div>
        <br>

        <div class="reply">
            <h5>Reply</h5>
            <label>Name:</label>
            <br>
            <input type="text" name="name" class="form-control">
            <br>

            <label>Body:</label>
            <br>
            <textarea class="form-control" name="body"></textarea>
            <br>
            <button class="btn btn-success reply-btn">Reply</button>
            <input name="parent_id" type="hidden" value="{{ $comment->id }}">
        </div>
    </div>
</li>
<br>
@if (isset($comments[$comment->id]))
        @include ('comments.comment_list', ['collection' => $comments[$comment->id]])
@endif
