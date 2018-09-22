$(document).ready(function () {
    $('.reply-btn').click(function () {
        var body = $(this).siblings('textarea').val();
        var parent_id = $(this).next('input').val();
        var comment = { 
            body: body,
            parent_id: parent_id
        };
        save(comment);
    });

    $('.submit-comment-btn').click(function() {
        var body = $(this).siblings('textarea').val();
        var comment = {body: body};
        save(comment);
        console.log(body);
    });
});

function save(comment) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: 'comments/create',
        type: 'POST',
        headers: {'X-CSRF-TOKEN': CSRF_TOKEN},
        data: comment

    }).done(function (data) {
        console.log(data);

    }).fail(function (err) {
        console.log(err);

    });
}