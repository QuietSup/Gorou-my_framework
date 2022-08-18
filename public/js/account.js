$(document).ready(function() {
    $('#password-switch').click(function () {
        console.log(1)
        var password = $('#change-password');
        console.log(password.attr('type'));
        if (password.attr('type') === "password") password.prop('type', "text");
        else password.prop('type', "password");
    });


    var avatarChange = $('.show_acc .main .avatar');

    avatarChange.click(function () {
        $('#imgupload').trigger('click');
    })

    avatarChange.hover(function () {
        avatarChange.css({"transition": 'all 0.3s', 'opacity': 0.6});
    }).mouseleave(function () {
        avatarChange.css('opacity', 1);

    }).click(function () {
        $(this).css({"transition": 'all 0.1s', 'box-shadow': '0 0 10px 10px white'})
    }).mouseleave(function () {
        avatarChange.css({"transition": 'all 0', 'box-shadow': '0 0 0 0 white'});
    })

    $("#imgupload").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $(".avatar")
                    .attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
})