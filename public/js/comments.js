$(document).ready(function() {
    $('.alert').hide();
});

$(document).on('click', '.reply-btn', function(e) {
    var body = $(this).siblings('textarea').val();
    // TODO find a better way of ding this. 
    var name = $(this).siblings('input').val();
    var parent_id = $(this).next('input').val();
    var comment = {
        body: body,
        name: name,
        parent_id: parent_id
    };
    save(comment);
});

$(document).on('click', '.submit-comment-btn', function (e) {
    var name = $(this).siblings('input').val();
    var body = $(this).siblings('textarea').val();
    var comment = {
        body: body,
        name: name
    };
    save(comment);
    console.log(name);

});


function save(comment) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: 'comments/create',
        type: 'POST',
        headers: {'X-CSRF-TOKEN': CSRF_TOKEN},
        data: comment

    }).done(function (data) {
        var result = $(data).filter('#app');
        $('body').html(result);
        displayAlert('alert-success', 'Comment Created!');

    }).fail(function (err) {
        console.log(err);
        console.log('Errors');
        displayAlert('alert-danger', err.responseText);

    });
}

function displayAlert(klass, message) {
    $('.alert').addClass(klass).text(message);
    $('.alert').show().delay(3000).fadeOut('slow');
    setTimeout(function() {
        $('.alert').removeClass(klass);
    }, 4000);
    $("html,body").animate({ scrollTop: 0 }, "slow");
}