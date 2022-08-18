const menu = document.getElementsByClassName('menu')[0]
const menuTitle1 = document.getElementsByClassName('menu_title')[0]
const menuTitle2 = document.getElementsByClassName('menu_title')[1]
const menuTitle3 = document.getElementsByClassName('menu_title')[2]
const menuTitle4 = document.getElementsByClassName('menu_title')[3]
const menuTitle5 = document.getElementsByClassName('menu_title')[4]
const menuTitle6 = document.getElementsByClassName('menu_title')[5]
const avatar = document.getElementsByClassName('avatar')[0]
const avatar2 = document.getElementsByClassName('avatar')[1]
const account = document.getElementsByClassName('account')[0]
const accountLink = document.getElementsByClassName('account-link')[0]
const navbar = document.getElementsByClassName('navbar')[0]
const logo = document.getElementsByClassName('logo')[0]
const close1 = document.getElementsByClassName('close')[0]
const close2 = document.getElementsByClassName('close')[1]

    avatar.addEventListener('click', () => {
        menu.classList.toggle('active')
        account.classList.toggle('active')
        accountLink.classList.toggle('active')
        navbar.classList.toggle('active')
        avatar.classList.toggle('active')
        avatar2.classList.toggle('active')
        logo.classList.toggle('active')
        close1.classList.toggle('active')
        close2.classList.toggle('active')

        menuTitle1.classList.toggle('active')
        menuTitle2.classList.toggle('active')
        menuTitle3.classList.toggle('active')
        menuTitle4.classList.toggle('active')
        menuTitle5.classList.toggle('active')
        menuTitle6.classList.toggle('active')
    })
// }

close1.addEventListener('click', () => {
    menu.classList.toggle('active')
    account.classList.toggle('active')
    accountLink.classList.toggle('active')
    navbar.classList.toggle('active')
    avatar.classList.toggle('active')
    avatar2.classList.toggle('active')
    logo.classList.toggle('active')
    close1.classList.toggle('active')
    close2.classList.toggle('active')

    menuTitle1.classList.toggle('active')
    menuTitle2.classList.toggle('active')
    menuTitle3.classList.toggle('active')
    menuTitle4.classList.toggle('active')
    menuTitle5.classList.toggle('active')
    menuTitle6.classList.toggle('active')
})

$(document).ready(function() {
    var del = $('.delete')

   $('.add-space').click(function (){

       var last = $('.new-term-space:last')

       var lastTerm = $('input:last').prop('name');
       var newTermDef = (parseInt(lastTerm.replace( /^\D+/g, '')) + 1).toString();
       if ($('.new-term-space').length === 0) newTermDef = 1;
       var newField = "    <div class=\"new-term-space\">\n" +
           "      <div class=\"number-delete\">\n" +
           "        <span class=\"title\">1</span>\n" +
           "        <button type='button' class=\"delete\"><img src=\"/public/img/delete.svg\"></button>\n" +
           "      </div>\n" +
           "\n" +
           "      <div class=\"term-definition\">\n" +
           "        <div>\n" +
           "          <label class=\"title\">Term</label>\n" +
           "          <div class=\"input_space\">\n" +
           "            <input name=\"term-"+newTermDef+"\" type=\"text\" class=\"enter\" required>\n" +
           "          </div>\n" +
           "        </div>\n" +
           "        <div>\n" +
           "          <label class=\"title\">Definition</label>\n" +
           "          <div class=\"input_space\">\n" +
           "            <input name=\"definition-"+newTermDef+"\" type=\"text\" class=\"enter\" required>\n" +
           "          </div>\n" +
           "        </div>\n" +
           "      </div>\n" +
           "    </div>\n";
       // $('.add-space').slideDown(5000);
       if (last.length) last.after(newField);
       else $('.enter-name').after(newField);


       $('.delete').on('click', function () {
           $(this).parent().parent().remove();


           $('.new-term-space').each(function(i, obj) {
               $(this).children('.number-delete').children('.title').text(i+1)
           });
       });

       $('.new-term-space').each(function(i, obj) {
           $(this).children('.number-delete').children('.title').text(i+1)
       });

       $('#edit :input').change(function () {
           $("#edit").data("changed",true);
       })

       $('#submit-edit').click(function () {
           if (!$("#edit").data("changed")) {
               alert('🐸No changes applied');
           }
           else $('#edit').submit();
       })
   })

    $('.delete').on('click', function () {
        $(this).parent().parent().remove();


        $('.new-term-space').each(function(i, obj) {
            $(this).children('.number-delete').children('.title').text(i+1)
        });
    });

    $('.save-B').click(function () {
        var me = $(this)
        var value = $(this).val();
        $.ajax({
            type: "POST",
            url: '/set/find',
            data: {'saved': value},
            success: function () {
                console.log(value)
                if (me.css('background-color') === 'rgb(255, 193, 7)')
                me.css('background', 'rgb(120, 211, 178)');
                else me.css('background', 'rgb(255, 193, 7)');
            }
        })
    })

    $('.search-button').click(function () {

        $.ajax({
            type: "POST",
            url: '/set/find',
            data: {'saved': value},
            // success: function () {
            //     if (me.css('background-color') === 'rgb(255, 193, 7)')
            //         me.css('background', 'rgb(120, 211, 178)');
            //     else me.css('background', 'rgb(255, 193, 7)');
            //     console.log()
            // }
        })
    })

    // $('.previous').click(function () {
    //     var value = $(this).val();
    //     var link = $(this).attr('url');
    //     console.log(link)
    //
    //     $.ajax({
    //         type: "POST",
    //         url: link,
    //         data: {'switch': value},
    //         success: function () {
    //             console.log(i);
    //         }
    //     })
    // })
    //
    // $('.next').click(function () {
    //     var value = $(this).val();
    //     var link = $(this).attr('url');
    //
    //     console.log(link)
    //     $.ajax({
    //         type: "POST",
    //         url: link,
    //         data: {'switch': value},
    //         success: function () {
    //             // console.log(i);
    //         }
    //     })
    // })


    $('#password-switch').click(function () {
        console.log(1)
        var password = $('#change-password');
        console.log(password.attr('type'));
        if (password.attr('type') === "password") password.attr('type', "text");
        else password.attr('type', "password");
    })


    $('.new-term-space').each(function(i, obj) {
        $(this).children('.number-delete').children('.title').text(i+1)
    });


    $('.delete-mine').click(function () {
        var me = $(this)
        var value = $(this).val();
        $.ajax({
            type: "POST",
            url: '/',
            data: {'delete': value},
            success: function () {
                // console.log(me.parent('.buttons').parent().parent().parent().html())
                me.parent('.buttons').parent().parent().addClass('closed');
            }
        })
    })


    $('.remove').click(function () {
        var me = $(this)
        var value = $(this).val();
        $.ajax({
            type: "POST",
            url: '/',
            data: {'remove': value},
            success: function () {
                // console.log(me.parent('.buttons').parent().parent().parent().html())
                me.parent('.buttons').parent().parent().addClass('closed');
            }
        })
    })

    $('#edit :input').change(function () {
        $("#edit").data("changed",true);
    })

    $('#submit-edit').click(function () {
        if (!$("#edit").data("changed")) {
            alert('🐸No changes applied');
        }
        else $('#edit').submit();
    })
    //
    // $('#edit').on('submit', function (e) {
    //     // e.preventDefault();
    //     if (!$("#edit").data("changed")) {
    //         alert('🐸No changes applied');
    //     }
    //     else $(this).submit();
    // })

})

submitForms = function(){
    // document.forms["flashcard"].submit();
    document.forms["set-name"].submit();
}

function percentage(partialValue, totalValue) {
    return ((100 * partialValue) / totalValue).toString()+'%';
}