const flashcard = document.getElementsByClassName('flashcard')[0]
const term = document.getElementsByClassName('term')[0]
const definition = document.getElementsByClassName('definition')[0]


$(document).ready(function() {
    flashcard.addEventListener('click', () => {
        flashcard.classList.toggle('active')
        term.classList.toggle('show')
        definition.classList.toggle('hide')
    })


    $('.definition').text(flashcards[i]['definition'])
    $('.term').text(flashcards[i]['term'])
    $('.progress .pr').text((parseInt(i)+1)+'/'+flashcards.length)
    $('.progress .top').css('width', percentage(i+1, flashcards.length));

    $('.next').click(function () {
        $.ajax({
            success: function () {
                if (parseInt(i) !== flashcards.length-1) i++;
                $('.progress .pr').text((i+1)+'/'+flashcards.length);
                $('.progress .top').css('width', percentage(i+1, flashcards.length));

                $('.definition').text(flashcards[i]['definition']);
                $('.term').text(flashcards[i]['term'])
                console.log(percentage(i, flashcards.length));
            }
        })
    })

    $('.previous').click(function () {
        $.ajax({
            success: function () {
                if (parseInt(i) !== 0) i--;
                $('.progress .pr').text((i+1)+'/'+flashcards.length);
                $('.progress .top').css('width', percentage(i+1, flashcards.length));

                $('.definition').text(flashcards[i]['definition']);
                $('.term').text(flashcards[i]['term'])
                console.log(percentage(i, flashcards.length));
            }
        })
    })
})