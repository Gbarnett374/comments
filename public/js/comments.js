$(document).ready(function () {
    console.log('hello');
    $('.reply-btn').click(function (){
    var test = $(this).next('input').val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    console.log(test);
        $.ajax({
            url : 'comments/create',
            type: 'POST',
            data: {
                "_token" : CSRF_TOKEN,
                "body": "HI Greg"
            }

        }).done(function(data) {
            console.log(data);

        }).fail(function (err) {
            console.log(err);

        });
    });

});